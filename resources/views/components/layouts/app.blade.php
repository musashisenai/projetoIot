<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --content-background: #f3f5f7; }
        body, main { background-color: var(--content-background); }
        .card, .card-body { background-color: #eef1f4; }
        .table { --bs-table-bg: transparent; }
        .table-light { --bs-table-bg: #e7ebef; }
        .sensor-surface { background-color: #eef1f4; }
        .sensor-form-card { background-color: #eef1f4; border: 1px solid #dfe3e8 !important; box-shadow: 0 .65rem 1.75rem rgba(31, 41, 55, .14) !important; }
        @media (max-width: 767.98px) { main { padding-left: 1rem !important; padding-right: 1rem !important; } }
    </style>
    @livewireStyles
</head>

<body>
    <div class="container-fluid px-0">
        <div class="row g-0 min-vh-100">
            <aside class="col-auto d-none d-lg-flex flex-column bg-white border-end vh-100 position-sticky top-0" style="width: 255px;" aria-label="Navegação principal">
                <div class="border-bottom d-flex justify-content-center align-items-center" style="height: 85px;">
                    <h2 class="fw-medium mb-0"><i class="bi bi-cpu" aria-hidden="true"></i> IOT</h2>
                </div>
                @include('components.layouts.sidebar-links')
            </aside>

            <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobile-sidebar" aria-labelledby="mobile-sidebar-title" style="--bs-offcanvas-width: 255px;">
                <div class="offcanvas-header border-bottom" style="height: 85px;">
                    <h2 class="fw-medium mb-0" id="mobile-sidebar-title"><i class="bi bi-cpu" aria-hidden="true"></i> IOT</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar menu"></button>
                </div>
                <div class="offcanvas-body p-0">
                    @include('components.layouts.sidebar-links')
                </div>
            </div>

            <div class="col d-flex flex-column min-vh-100">
                <header class="navbar bg-white border-bottom position-sticky top-0 px-3 px-lg-4" style="height: 85px; z-index: 1000;">
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="btn btn-outline-secondary d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobile-sidebar" aria-controls="mobile-sidebar" aria-label="Abrir menu">
                            <i class="bi bi-list" aria-hidden="true"></i>
                        </button>
                        <h1 class="h5 fw-semibold mb-0">{{ request()->routeIs('dashboard') ? 'Dashboard' : (request()->routeIs('ambiente.*') ? 'Ambientes' : 'Sensores') }}</h1>
                    </div>
                    <span class="small text-secondary">{{ now()->translatedFormat('d \\d\\e M, Y') }}</span>
                </header>

                <main class="container py-4 flex-grow-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>

</html>
