<?php

namespace Tests\Feature;

use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_vehicles(): void
    {
        Vehicle::create([
            'marca'  => 'Toyota',
            'modelo' => 'Corolla',
            'ano'    => 2024,
            'placa'  => 'ABC1D23',
            'cor'    => 'Prata',
        ]);

        $response = $this->get('/vehicles');

        $response->assertStatus(200);
        $response->assertSee('Toyota');
        $response->assertSee('ABC1D23');
    }

    public function test_can_create_a_vehicle(): void
    {
        $dados = [
            'marca'  => 'Toyota',
            'modelo' => 'Corolla',
            'ano'    => 2024,
            'placa'  => 'ABC1D23',
            'cor'    => 'Prata',
        ];

        $response = $this->post('/vehicles', $dados);

        $response->assertRedirect('/vehicles');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('vehicles', ['placa' => 'ABC1D23']);
    }

    public function test_can_update_a_vehicle(): void
    {
        $vehicle = Vehicle::create([
            'marca'  => 'Toyota',
            'modelo' => 'Corolla',
            'ano'    => 2024,
            'placa'  => 'ABC1D23',
            'cor'    => 'Prata',
        ]);

        $response = $this->put("/vehicles/{$vehicle->id}", [
            'marca'  => 'Toyota',
            'modelo' => 'Corolla',
            'ano'    => 2025,
            'placa'  => 'ABC1D23',
            'cor'    => 'Azul',
        ]);

        $response->assertRedirect('/vehicles');
        $this->assertDatabaseHas('vehicles', [
            'id' => $vehicle->id,
            'ano' => 2025,
            'cor' => 'Azul'
        ]);
    }

    public function test_can_soft_delete_a_vehicle(): void
    {
        $vehicle = Vehicle::create([
            'marca'  => 'Honda',
            'modelo' => 'Civic',
            'ano'    => 2023,
            'placa'  => 'XYZ9K99',
            'cor'    => 'Preto',
        ]);

        $response = $this->delete("/vehicles/{$vehicle->id}");

        $response->assertRedirect('/vehicles');
        $response->assertSessionHas('success');
        
        // Verifica se foi removido da listagem padrão (Soft Deleted)
        $this->assertSoftDeleted($vehicle);
        
        // Garante que não aparece mais no index
        $this->get('/vehicles')->assertDontSee('XYZ9K99');
    }
}