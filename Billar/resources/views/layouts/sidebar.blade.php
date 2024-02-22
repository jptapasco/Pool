<div>
    @php
        $usuario_actual = Auth::user();
    @endphp
    <ul class="navbar-nav bg-success sidebar sidebar-dark accordion text" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ $usuario_actual->nombres }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Inicio -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fa fa-house mr-1"></i>
                <span>Inicio</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fa-solid fa-cash-register mr-1"></i>
                <span>Registro Ventas</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fa-solid fa-boxes-stacked mr-1"></i>
                <span>Inventario</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fa-solid fa-user mr-2"></i>
                <span>Usuarios</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fa-solid fa-user-check mr-1"></i>
                <span>Clientes</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div>
                    
                    <button class="nav-link" type="submit"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>Cerrar Sesión</button>
                </div>
            </form>
        </li>

    </ul>

</div>
