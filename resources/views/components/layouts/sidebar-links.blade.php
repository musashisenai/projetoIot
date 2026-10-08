<ul class="nav flex-column gap-2 p-2 fs-6 fw-semibold">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
            <i class="bi bi-grid me-2" aria-hidden="true"></i>Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('ambiente.index') }}" class="nav-link {{ request()->routeIs('ambientes.*') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
            <i class="bi bi-shop-window me-2" aria-hidden="true"></i>Ambientes
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('sensor.index') }}" class="nav-link {{ request()->routeIs('sensores.*') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
            <i class="bi bi-cpu me-2" aria-hidden="true"></i>Sensores
        </a>
    </li>
        <li class="nav-item">
        <a  class="nav-link {{ request()->routeIs('sensores.*') ? 'active bg-dark text-white rounded' : 'text-dark' }}">
            <i class="bi bi-newspaper" aria-hidden="true"></i> Registro
        </a>
    </li>
</ul>