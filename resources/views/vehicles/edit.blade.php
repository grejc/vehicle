<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Editar Veículo</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Theme Configuration -->
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface-dim": "#cfdce3",
                    "primary-fixed-dim": "#c5d4fa",
                    "tertiary-container": "#d5d1f2",
                    "error": "#9f403d",
                    "on-secondary-container": "#3c5561",
                    "tertiary-fixed-dim": "#c7c3e3",
                    "secondary-container": "#cbe7f5",
                    "surface": "#f8f9fb",
                    "tertiary": "#5e5c78",
                    "secondary-dim": "#3d5762",
                    "error-container": "#fe8983",
                    "surface-container-high": "#e1e9ee",
                    "inverse-primary": "#c7d7fd",
                    "secondary": "#49636f",
                    "error-dim": "#4e0309",
                    "surface-container-highest": "#d9e4ea",
                    "outline-variant": "#a9b4b9",
                    "on-tertiary-fixed": "#35334d",
                    "on-background": "#2a3439",
                    "primary-dim": "#435272",
                    "on-tertiary": "#fcf7ff",
                    "on-primary-fixed-variant": "#4c5c7b",
                    "on-error": "#fff7f6",
                    "on-primary-fixed": "#303f5d",
                    "tertiary-fixed": "#d5d1f2",
                    "background": "#f8f9fb",
                    "on-error-container": "#752121",
                    "on-primary": "#f7f7ff",
                    "surface-container-lowest": "#ffffff",
                    "surface-bright": "#f8f9fb",
                    "surface-variant": "#d9e4ea",
                    "surface-container": "#e8eff3",
                    "on-surface-variant": "#566166",
                    "on-secondary-fixed-variant": "#455f6b",
                    "tertiary-dim": "#52506b",
                    "inverse-surface": "#0b0f10",
                    "on-primary-container": "#425271",
                    "outline": "#717c82",
                    "secondary-fixed": "#cbe7f5",
                    "primary-container": "#d7e2ff",
                    "on-secondary-fixed": "#29434e",
                    "inverse-on-surface": "#9a9d9f",
                    "on-tertiary-container": "#484661",
                    "on-secondary": "#f2faff",
                    "surface-tint": "#4f5e7e",
                    "primary": "#4f5e7e",
                    "surface-container-low": "#f0f4f7",
                    "on-surface": "#2a3439",
                    "secondary-fixed-dim": "#bdd9e6",
                    "primary-fixed": "#d7e2ff",
                    "on-tertiary-fixed-variant": "#52506b"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "fontFamily": {
                    "headline": ["Manrope"],
                    "body": ["Inter"],
                    "label": ["Inter"]
            }
          },
        },
      }
    </script>
</head>
<body class="bg-surface text-on-surface font-body antialiased selection:bg-primary-container selection:text-on-primary-container">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[640px] flex-1">

<div class="flex items-center gap-3 p-4 mb-2">
    <a href="{{ route('vehicles.index') }}" class="text-on-surface-variant hover:text-primary transition-colors flex items-center">
        <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <p class="text-on-surface font-headline tracking-tight text-[28px] font-bold leading-tight">Editar Veículo</p>
</div>

<div class="px-4 py-3">
    <div class="bg-surface-container-lowest p-8 rounded-lg shadow-[0_0_32px_rgba(42,52,57,0.06)] border border-surface-container">
        <form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Marca -->
                <div class="flex flex-col gap-2">
                    <label for="marca" class="text-on-surface font-label text-sm font-semibold uppercase tracking-wider">Marca</label>
                    <input type="text" name="marca" id="marca" value="{{ old('marca', $vehicle->marca) }}" placeholder="Ex: Toyota"
                           class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-on-surface focus:outline-none focus:ring-0 border border-outline-variant bg-surface-container-low h-12 placeholder:text-on-surface-variant/50 p-4 font-body text-base font-normal leading-normal @error('marca') border-error @enderror">
                    @error('marca')
                        <p class="text-error font-label text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Modelo -->
                <div class="flex flex-col gap-2">
                    <label for="modelo" class="text-on-surface font-label text-sm font-semibold uppercase tracking-wider">Modelo</label>
                    <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $vehicle->modelo) }}" placeholder="Ex: Corolla"
                           class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-on-surface focus:outline-none focus:ring-0 border border-outline-variant bg-surface-container-low h-12 placeholder:text-on-surface-variant/50 p-4 font-body text-base font-normal leading-normal @error('modelo') border-error @enderror">
                    @error('modelo')
                        <p class="text-error font-label text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <!-- Ano -->
                    <div class="flex flex-col gap-2">
                        <label for="ano" class="text-on-surface font-label text-sm font-semibold uppercase tracking-wider">Ano</label>
                        <input type="number" name="ano" id="ano" value="{{ old('ano', $vehicle->ano) }}" placeholder="2024"
                               class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-on-surface focus:outline-none focus:ring-0 border border-outline-variant bg-surface-container-low h-12 placeholder:text-on-surface-variant/50 p-4 font-body text-base font-normal leading-normal @error('ano') border-error @enderror">
                        @error('ano')
                            <p class="text-error font-label text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Placa -->
                    <div class="flex flex-col gap-2">
                        <label for="placa" class="text-on-surface font-label text-sm font-semibold uppercase tracking-wider">Placa</label>
                        <input type="text" name="placa" id="placa" value="{{ old('placa', $vehicle->placa) }}" placeholder="ABC1D23"
                               class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-on-surface focus:outline-none focus:ring-0 border border-outline-variant bg-surface-container-low h-12 placeholder:text-on-surface-variant/50 p-4 font-body text-base font-bold uppercase tracking-widest leading-normal @error('placa') border-error @enderror">
                        @error('placa')
                            <p class="text-error font-label text-xs font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Cor -->
                <div class="flex flex-col gap-2">
                    <label for="cor" class="text-on-surface font-label text-sm font-semibold uppercase tracking-wider">Cor</label>
                    <input type="text" name="cor" id="cor" value="{{ old('cor', $vehicle->cor) }}" placeholder="Ex: Branco Pérola"
                           class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-on-surface focus:outline-none focus:ring-0 border border-outline-variant bg-surface-container-low h-12 placeholder:text-on-surface-variant/50 p-4 font-body text-base font-normal leading-normal @error('cor') border-error @enderror">
                    @error('cor')
                        <p class="text-error font-label text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6">
                    <button type="submit" class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-gradient-to-br from-primary to-primary-dim text-on-primary font-label text-base font-bold uppercase tracking-widest leading-normal transition-opacity hover:opacity-90 shadow-md">
                        Atualizar Veículo
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
</div>
</div>
</div>
</body>
</html>