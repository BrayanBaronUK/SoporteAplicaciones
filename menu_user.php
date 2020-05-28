<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SOPORTE IT<sup>1.0</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Inicio</span></a>
</li>

<li class="nav-item active">
  <a class="nav-link" href="index.php" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-cog"></i>
    <span>Contraseña</span></a>

  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Configuraciones:</h6>
      <a class="collapse-item" href="cambio_contrasena.php">Cambiar contraseña</a>
      <!-- <a class="collapse-item" href="login.php">Login</a>
        <a class="collapse-item" href="register.html">Register</a>
        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>-->
      <div class="collapse-divider"></div>
      <!-- <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="404.html">404 Page</a>
        <a class="collapse-item" href="blank.html">Blank Page</a> -->
    </div>
  </div>

</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  ACTIVIDADES
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">-->
  <a class="nav-link collapsed" href="RegistroActividadesTurno.php">

    <i class="fas fa-fw fa-folder"></i>
    <span>Registrar Actividad Turno</span>
  </a>

</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="RegistroActividadesCierre.php">

    <i class="fas fa-fw fa-folder"></i>
    <span>Registrar Actividad Cierre</span>
  </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  CONSULTAS
</div>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="Consulta_turnos.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Consulta de Turnos</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Consulta_compensatorio.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Consulta de Compensatorios</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Consulta_horas_extra.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Consulta de horas extra</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Consulta_casos_aranda.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Consulta de Variable</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Consulta_cierres.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Consulta de Cierres</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Consulta_soporte_unidad.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Consulta de Soporte Unidad</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="Consulta_vacaciones.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Consulta de vacaciones</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="Consulta_claves_servidores.php">
    <i class="fas fa-fw fa-table"></i>
    <span>Repositorio de claves</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->