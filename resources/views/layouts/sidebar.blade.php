<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a href="{{ route('dashboard') }}" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB ADMIN <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('products') }}" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Producto</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('profile') }}" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Perfil</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="#collapseOperaciones" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseOperaciones">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Operaciones</span>
        </a>
        <div class="collapse" id="collapseOperaciones" aria-labelledby="headingOperaciones" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Selecciona una operación</h6>
                <a href="{{ route('ventas') }}" class="collapse-item">Ventas</a> <!-- Esta ruta ahora es correcta -->
                <a href="{{ route('facturas') }}" class="collapse-item">Facturas</a>
                </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
