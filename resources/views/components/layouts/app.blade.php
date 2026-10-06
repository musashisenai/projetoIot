<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireStyles
</head>

<body>
    <div class="d-flex">
        @if (!Route::is('login'))
            <aside class="bg-white border-end position-fixed top-0 start-0 vh-100" style="width: 255px;">

                <div class="border-bottom d-flex justify-content-center align-items-center" style="height: 85px;">
                    <h2 class="fw-medium">
                        <i class="bi bi-cpu"></i>
                        IOT
                    </h2>
                </div>

                <ul class="nav flex-column gap-2 p-2 fs-5 fw-semibold">


                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
                            <i class="bi bi-grid"></i>
                            Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('ambiente') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
                            <i class="bi bi-shop-window"></i>
                            Ambientes</a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('registro') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
                            <i class="bi bi-card-text"></i>
                            Registros</a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('sensor') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
                            <i class="bi bi-music-player"></i>
                            Sensores</a>
                    </li>




                </ul>


            </aside>

            <div class="flex-grow-1" style="margin-left: 255px; min-width: 0;">

                            <nav class="navbar bg-white border-bottom position-sticky top-0 px-4 justify-content-end"
                style="height: 85px; z-index: 1000;">

                <div class="d-flex text-end align-items-center gap-3">
                    <a class="btn btn-secondary" > Logout </a>
                </div>

            </nav>

        @endif
        <div class="container">
            {{ $slot }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
        @livewireScripts
</body>

</html>
