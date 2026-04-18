<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Veículos</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />

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

<body
    class="bg-surface text-on-surface font-body antialiased selection:bg-primary-container selection:text-on-primary-container">
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">

                    @if (session('success'))
                        <div
                            class="mb-4 p-4 bg-secondary-container text-on-secondary-container rounded-lg border border-outline-variant font-medium text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex flex-wrap justify-between items-center gap-3 p-4">
                        <p
                            class="text-on-surface font-headline tracking-tight text-[32px] font-bold leading-tight min-w-72">
                            Veículos Cadastrados</p>
                        <a href="{{ route('vehicles.create') }}"
                            class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded h-10 px-6 bg-gradient-to-br from-primary to-primary-dim text-on-primary font-label text-sm font-medium leading-normal transition-opacity hover:opacity-90">
                            <span class="truncate">Novo Veículo</span>
                        </a>
                    </div>
                    <div class="px-4 py-3 @container">
                        <div
                            class="flex overflow-hidden rounded-lg bg-surface-container-lowest shadow-[0_0_32px_rgba(42,52,57,0.06)]">
                            <table class="flex-1 w-full border-collapse">
                                <thead>
                                    <tr class="bg-surface-container-lowest border-b border-surface-container">
                                        <th
                                            class="px-6 py-4 text-left text-on-surface-variant w-[10%] font-label text-xs uppercase tracking-[0.05em] font-semibold leading-normal">
                                            ID</th>
                                        <th
                                            class="px-6 py-4 text-left text-on-surface-variant w-[20%] font-label text-xs uppercase tracking-[0.05em] font-semibold leading-normal">
                                            Placa</th>
                                        <th
                                            class="px-6 py-4 text-left text-on-surface-variant w-[20%] font-label text-xs uppercase tracking-[0.05em] font-semibold leading-normal">
                                            Modelo</th>
                                        <th
                                            class="px-6 py-4 text-left text-on-surface-variant w-[20%] font-label text-xs uppercase tracking-[0.05em] font-semibold leading-normal">
                                            Marca</th>
                                        <th
                                            class="px-6 py-4 text-left text-on-surface-variant w-[15%] font-label text-xs uppercase tracking-[0.05em] font-semibold leading-normal">
                                            Ano</th>
                                        <th
                                            class="px-6 py-4 text-right text-on-surface-variant w-[15%] font-label text-xs uppercase tracking-[0.05em] font-semibold leading-normal px-10">
                                            Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($vehicles as $vehicle)
                                        <tr
                                            class="transition-colors hover:bg-surface-container-high cursor-default border-b border-surface-container/50 last:border-0">
                                            <td
                                                class="h-[64px] px-6 py-3 text-on-surface font-body text-sm font-normal leading-normal">
                                                {{ $vehicle->id }}</td>
                                            <td
                                                class="h-[64px] px-6 py-3 text-on-surface font-body text-sm font-medium leading-normal">
                                                {{ $vehicle->placa }}</td>
                                            <td
                                                class="h-[64px] px-6 py-3 text-on-surface-variant font-body text-sm font-normal leading-normal">
                                                {{ $vehicle->modelo }}</td>
                                            <td
                                                class="h-[64px] px-6 py-3 text-on-surface-variant font-body text-sm font-normal leading-normal">
                                                {{ $vehicle->marca }}</td>
                                            <td
                                                class="h-[64px] px-6 py-3 text-on-surface-variant font-body text-sm font-normal leading-normal">
                                                {{ $vehicle->ano }}</td>
                                            <td class="h-[64px] px-6 py-3">
                                                <div class="flex justify-end items-center space-x-4 px-4">
                                                    <a href="{{ route('vehicles.edit', $vehicle) }}"
                                                        class="text-primary hover:text-primary-dim transition-colors"
                                                        title="Editar">
                                                        <span class="material-symbols-outlined text-xl">edit</span>
                                                    </a>
                                                    <form action="{{ route('vehicles.destroy', $vehicle) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Deseja realmente excluir este veículo?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-error hover:text-error-dim transition-colors flex items-center"
                                                            title="Excluir">
                                                            <span
                                                                class="material-symbols-outlined text-xl">delete</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"
                                                class="h-[128px] px-6 py-3 text-center text-on-surface-variant font-body text-sm italic">
                                                Nenhum veículo cadastrado.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
