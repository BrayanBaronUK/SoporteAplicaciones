<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Soporte IT AVANTEL</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

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
          <i class="fas fa-fw fa-cog" ></i>
          <span>Contraseña</span></a>

          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Configuraciones:</h6>
              <a class="collapse-item" href="#">Login</a>
              <a class="collapse-item" href="#">Registrar</a>
              <a class="collapse-item" href="#">Olvido contraseña</a>
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
        Parametrización
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Creación de Especialista</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Configuración:</h6>
            <a class="collapse-item" href="Especialista_creacion.php">Creación</a>
            <a class="collapse-item" href="Especialista_visualizacion.php">Visualización</a>
         <!--  <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a> --> 
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="Creacion_turnos.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>Creación de Turnos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Creación de compensatorio</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Creación de horarios de cierre</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Creación de horarios de unidad</span>
        </a>
      </li>
      
      

      <!-- Nav Item - Utilities Collapse Menu -->
      <!--
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>
      -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        ACTIVIDADES
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">-->
          <a class="nav-link collapsed" href="#">

          <i class="fas fa-fw fa-folder"></i>
          <span>Registrar Actividad Turno</span>
        </a>
        <!--
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.php">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>-->
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">

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

      <!-- Nav Item - Charts -->
      <!--
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>-->

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Consulta de Turnos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Consulta de Compensatorios</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Consulta de horas extra</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Consulta de Variable</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Repositorio de claves</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!--REPORTES-->
      <div class="sidebar-heading">
        REPORTES
      </div>

      <li class="nav-item">
        <a class="nav-link" href="#">
      <!--<a class="nav-link" href="charts.html">-->
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Reporte de Casos</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Reporte de Actividades</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">1+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pendientes
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">fecha1</div>
                    <span class="font-weight-bold">alerta1</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">fecha2</div>
                    alerta2
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">fecha3</div>
                    alerta3
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Mostrar alertas</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">1</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  centro de mensajes
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">mensaje1</div>
                    <div class="small text-gray-500">mensaje1</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">mensaje2</div>
                    <div class="small text-gray-500">menasaje2</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">mensaje3</div>
                    <div class="small text-gray-500">mensaje3</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">mensaje4</div>
                    <div class="small text-gray-500">mensaje4</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Mensajes</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Brayan Baron</span>
                <img class="img-profile rounded-circle" src="./img/imagen1.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuración
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Actividades
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>
          </ul>
        </nav>

              <!-- Begin Page Content -->
              <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Soporte Aplicaciones TI - Registro Actividades Cierre</h1>
<p class="mb-4"></p>



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registrar actividad de cierre</h6>
  </div>

  
  <div class="card-body">
  <!--SELECCIONADOR DE CICLO-->
<div class="small mb-1">Seleccione un ciclo:</div>
                  <div class="dropdown mb-4">
                  
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false">Ciclo</button>
                    
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" >Ciclo A - 1</a>
                    <a class="dropdown-item" href="#">Ciclo B - 15</a>
                    <a class="dropdown-item" href="#">Ciclo G - 05</a>
                    <a class="dropdown-item" href="#">Ciclo H - 10</a>
                    <a class="dropdown-item" href="#">Ciclo I - 20</a>
                    <a class="dropdown-item" href="#">Ciclo J - 25</a>
                    
                    </div>
                    <div id="resultbox"></div>
                  </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <td><strong>Actividad Cierre</strong></td>
            <td><strong>Hora</strong></td>
            <td><strong>Realizado SI/NO</strong></td>
            <td><strong>Descripcion</strong></td>
            <td><strong>Observaciones</strong></td>
          </tr>
        </thead>
 
     <tbody>

           <tr>
            <td>Lanzamiento del Proceso de Paso  de Postpago a Prepago de Lotus</td>
            <td>4:00:00 p. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Plazo Maximo de ejecucion antes de las 4:30</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Lanzamiento del Proceso de Paso  de Postpago a Prepago.</td>
            <td>5:00:00 p. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Plazo Maximo de ejecución hasta las 18:30</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Envio de correo con las lineas que se pasaron de Post  a Pre.</td>
            <td>9:00:00 p. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Enviar correo adjuntando el archivo con la informacion de las lineas que se pasaron de post a Pre (enviar los tres archivos)
                1. Archivo de los anexos programados.
                2. Archivo con las cuentas que se crearon para los anexos que fueron pasados a prepago
                3. Anexos  Virtuales que se dieron de baja</td>
                <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Validacion del inicio de las cargas de LTE FASE 1</td>
            <td>10:30:00 p. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Validar que las recargas de la fase 1 de Lte inicien en normalidady validar los logs de las recargas</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Validacion del inicio de las cargas de LTE FASE 2</td>
            <td>12:02:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Validar que las recargas de la fase 2 de Lte inicien en normalidad y validar los logs de las recargas </td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Revisa Logs STC</td>
            <td>Permanente</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Cada intervalo de 30 mins se deben estar revisando los logs. Primera validacion a la 24:00 </td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Configuracion de Cierre Maestra en la URL de Cierre</td>
            <td>12:30:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Revisar y configurar los procesos a ejecutar en el cierre.</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Verificar procesos en el STCAPPSERVER</td>
            <td>Permanente</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Cada intervalo de 30 mins se deben estar revisando la ejecucion de los procesos de STC. Primera validacion 24:00</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Envíar Proceso Cierre de Maestra por la URL de Cierre</td>
            <td>12:45:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Enviar por STC el proceso de cierre. Verificando que se envie la fecha y ciclo correcto.</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Verificar  Correo de Alerta con notificacion confirmando el cierre enviado.</td>
            <td>12:46:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Verificar  el correo para confirmar que el cierre configurado  es el correcto.</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Envío de Correo indicando Inicio del proceso de Cierre Maestra</td>
            <td>12:50:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Redactar el correo indicando el inicio de cierre  maestra.</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Notificar el inicio del proceso de Cierre  Maestra al grupo de Facturacion</td>
            <td>12:50:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>se notifica a las personas por medio de correo que se envia informando el incio de cierre maestra, por que no tienen grupo creado</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Seguimiento proceso Cierre de Maestra</td>
            <td>Permanente</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Realizar las validaciones de cada proceso del cierre con el fin de monitorear la ejecucion del mismo</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Envio Correo notificando finalizacion de  las recargas de Lte face 1 y fase 2</td>
            <td>2:00 a .m. - 3:00 a .m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Enviar correo notificando  la finalización del proceso de recargas despues de la validacion de los logs que se hayan realizado en normalidad </td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Validar las Exoneraciones</td>
            <td>4:45:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Revisar la correcta ejecucion del proceso de exoneraciones que se ejecuta finalizando el cierre maestra. Tener encuenta tambien los hilos de las exoneraciones en caso de fallas enviar correo  y notificar inmediatamente a Byte.
              Nuevo paso para evidenciar que en el momento de la ejecución efectuó todas las actualizaciones de manera  correcta.
              Ver archivo ""Exonerar anexos con bloqueo temporal.txt"" dentro de la carpeta de cierre maestra ciclo A y B  ejecutar   Query que hay que ejecutar y la instrucción a seguir. 
              </td>
              <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Activacion  Exoneracion por  Mora</td>
            <td>4:46:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>ejecutar el update UPDATE V4SERVI SET TCFLA2='S' ,  TCFLA4='S' WHERE TCCSER=808</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
            <td>Envío de Correo indicando Finalización del proceso de Cierre Maestra</td>
            <td>5:00:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Redactar y enviar   el correo indicando la finalización de cierre  maestra </td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Notificar la finalización del proceso de Cierre de Maestra al grupo de Facturacion</td>
            <td>5:15:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>se notifica a las personas por medio de correo que se envia informando el fin del cierre maestra, por que no tienen grupo creado</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Validacion de OAS</td>
            <td>Permanente</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>Validar el procesamiento de OAS.</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
          <tr>
          <td>Validacion de recargas IDEN y  LTE, Hotbilling, eliminación de suplementarios</td>
            <td>5:30:00 a. m.</td>
            <td><input type="checkbox" checked data-toggle="toggle" data-on="NO" data-off="SI" data-onstyle="danger" data-offstyle="success"></td>
            <td>CICLO A Para  IDEN Y LTE CICLO  B  Solo LTE</td>
            <td><input type="text" name="observaciones" style="height: 100px;"></td>
          </tr>
     </tbody>
      </table>
    </div>

    <div>
    <a href="#" class="btn btn-primary btn-icon-split"  style="float:right;" >
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Guardar</span>
      </a>

    </div>


  </div>

</div>

</div>
<!-- /.container-fluid -->


      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Website 2020 by Brayan Baron</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Seguro quiere salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Salir" si desea cerrar la aplicación si no seleccione "Cancelar"</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.php">Salir</a>
        <!--  <a class="btn btn-primary" href="login.php">Logout</a>-->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  

  <!-- Page level plugins -->
  <!--<script src="vendor/datatables/jquery.dataTables.min.js"></script>-->
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

    <!-- js del dropdown -->
  <script src="js/demo/dropdown.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

<!--JS Para el switch-->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>
<!--COMETARIADAS
Lineas 450 a 732
-->

</html>
