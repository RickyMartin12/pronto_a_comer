<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="logo_center">
            <img src="logo/teste-admin.png" class="img-responsive" alt="Cinque Terre">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($activePage == 'index') ? 'active':''; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tipos de Pratos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($activePage == 'novo-tipo-prato' || $activePage == 'listar-tipo-prato') ? 'active':''; ?>">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseTipoPrato"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-utensils"></i>
            <span>Tipo de Prato</span>
        </a>
        <div id="collapseTipoPrato" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-pers py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($activePage == 'novo-tipo-prato') ? 'active':''; ?>" href="novo-tipo-prato.php"><i class="fas fa-plus-circle"></i> Novo Tipo de Prato</a>
                <a class="collapse-item <?= ($activePage == 'listar-tipo-prato') ? 'active':''; ?>" href="listar-tipo-prato.php"><i class="fas fa-list-alt"></i> Listar Tipos de Pratos</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Pratos do Dia
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($activePage == 'novo-prato' || $activePage == 'listar-prato') ? 'active':''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePratos"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-hamburger"></i>
            <span>Pratos</span>
        </a>
        <div id="collapsePratos" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-pers py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($activePage == 'novo-prato') ? 'active':''; ?>" href="novo-prato.php"><i class="fas fa-plus-circle"></i> Novo Prato do Dia</a>
                <a class="collapse-item <?= ($activePage == 'listar-prato') ? 'active':''; ?>" href="listar-prato.php"><i class="fas fa-list-alt"></i> Listar Pratos do dia</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Reservas dos pratos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($activePage == 'nova-reserva' || $activePage == 'listar-reservas') ? 'active':''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReserva"
           aria-expanded="true" aria-controls="collapseRese">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Reserva</span>
        </a>
        <div id="collapseReserva" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-pers py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($activePage == 'nova-reserva') ? 'active':''; ?>" href="nova-reserva.php"><i class="fas fa-plus-circle"></i> Nova Reserva</a>
                <a class="collapse-item <?= ($activePage == 'listar-reservas') ? 'active':''; ?>" href="listar-reservas.php"><i class="fas fa-list-alt"></i> Listar Reservas</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Comentarios
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($activePage == 'novo-comentario' || $activePage == 'listar-comentarios') ? 'active':''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComentarios"
           aria-expanded="true" aria-controls="collapseRese">
            <i class="fas fa-fw fa-comment"></i>
            <span>Comentarios</span>
        </a>
        <div id="collapseComentarios" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-pers py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($activePage == 'novo-comentario') ? 'active':''; ?>" href="novo-comentario.php"><i class="fas fa-plus-circle"></i> Nova Comentário</a>
                <a class="collapse-item <?= ($activePage == 'listar-comentarios') ? 'active':''; ?>" href="listar-comentarios.php"><i class="fas fa-list-alt"></i> Listar Comentários</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
