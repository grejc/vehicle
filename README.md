# Veículos

Este projeto é um sistema de gerenciamento de frotas desenvolvido com Laravel 13, PostgreSQL e Tailwind CSS. Ele permite o cadastro, listagem, edição e exclusão (com suporte a Soft Delete) de veículos.

## Sumário

- [Visão geral](#visão-geral)
- [Tecnologias utilizadas](#tecnologias-utilizadas)
- [Como executar o projeto](#como-executar-o-projeto)
- [Como testar a aplicação](#como-testar-a-aplicação)
- [Estrutura do projeto](#estrutura-do-projeto)

## Visão geral

O projeto fornece uma interface intuitiva e moderna para gerenciar informações de veículos. A aplicação utiliza o padrão de arquitetura MVC do Laravel e garante a integridade dos dados através de validações robustas em Form Requests.

A entidade principal, **Vehicle**, contém os seguintes atributos:
- Marca
- Modelo
- Ano
- Placa (Única)
- Cor

## Tecnologias utilizadas

O projeto foi construído utilizando as seguintes ferramentas:

- **Laravel 13**: Framework PHP para o desenvolvimento da lógica de backend.
- **PostgreSQL**: Banco de dados relacional para persistência dos dados.
- **Tailwind CSS v4**: Framework CSS para a criação de uma interface responsiva e moderna.
- **Laravel Sail**: Ambiente de desenvolvimento baseado em Docker.
- **Pest/PHPUnit**: Ferramentas para automação de testes.

## Como executar o projeto

Para rodar a aplicação localmente, você deve ter o Docker instalado em sua máquina. Siga os passos abaixo:

1. Clone o repositório para o seu ambiente local.
2. Certifique-se de que o arquivo `.env` esteja configurado com as credenciais do banco de dados (o projeto já vem pré-configurado para o Laravel Sail).
3. Suba os containers do Docker utilizando o Sail:
   ```bash
   ./vendor/bin/sail up -d
   ```
4. Execute as migrations para criar as tabelas no banco de dados:
   ```bash
   ./vendor/bin/sail artisan migrate
   ```
5. Acesse a aplicação em seu navegador através do endereço `http://localhost`.

## Como testar a aplicação

O projeto inclui uma suíte de testes de funcionalidade para garantir que todas as operações do CRUD e o Soft Delete estejam funcionando corretamente.

Para executar os testes, utilize o seguinte comando:

```bash
./vendor/bin/sail artisan test
```

Este comando executará todos os testes definidos no diretório `tests/Feature`, incluindo a validação do ciclo de vida completo dos veículos.

## Estrutura do projeto

- `app/Models/Vehicle.php`: Model com suporte a Soft Delete.
- `app/Http/Controllers/VehicleController.php`: Controller que gerencia a lógica de negócio.
- `app/Http/Requests/`: Contém o `StoreVehicleRequest` e `UpdateVehicleRequest` para validação.
- `resources/views/vehicles/`: Contém as interfaces da aplicação (Index, Create, Edit).
- `database/migrations/`: Arquivos de definição do esquema do banco de dados.

## Endpoints da aplicação

A aplicação utiliza as rotas padrão de um recurso RESTful do Laravel:

| Método | Endpoint | Ação | Descrição |
| :--- | :--- | :--- | :--- |
| **GET** | `/` | `redirect` | Redireciona automaticamente para `/vehicles`. |
| **GET** | `/vehicles` | `index` | Lista todos os veículos ativos. |
| **GET** | `/vehicles/create` | `create` | Exibe o formulário de cadastro de novo veículo. |
| **POST** | `/vehicles` | `store` | Salva um novo veículo no banco de dados. |
| **GET** | `/vehicles/{id}/edit` | `edit` | Exibe o formulário de edição de um veículo existente. |
| **PUT/PATCH** | `/vehicles/{id}` | `update` | Atualiza os dados de um veículo no banco de dados. |
| **DELETE** | `/vehicles/{id}` | `destroy` | Remove um veículo (exclusão lógica via Soft Delete). |

