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
  <link href="tabla_dinamica/estilos_tab/botones_estilos.css" rel="stylesheet">
  <!--	<link rel="stylesheet" href="./tabla_dinamica/css/bootstrap.css">  -->
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      <?php @session_start();
            include_once("conexion.php");
            $conex2 = oci_connect($user, $pass, $db);
            ?>
      /**
       * Funcion para añadir una nueva fila en la tabla
       */
      //	<td><select name='especialista[]'><option>Carlos Palacios</option><option>Brayan Baron</option><option>Wilson Castro</option></select></td> \
      $("#add").click(function() {
        var nuevaFila = `<tr> \
        <td><select name='especialista' id='especialista'><?php $sql = "SELECT NOMBRES||' '||APELLIDOS FROM USUARIOS_SOPORTE"; $resultado_set = oci_parse($conex2, $sql); oci_execute($resultado_set); while ($row = oci_fetch_array($resultado_set)){ echo '<option value="'.$row[0].'">'.$row[0].'</option>'; } ?></select></td> \
				<td><input type='date' name='dia'></td> \
				<td><input type='button' class='del' value='Eliminar Fila'></td> \
			</tr>`;
        $("#tabla tbody").append(nuevaFila);
      });

      // evento para eliminar la fila
      $("#tabla").on("click", ".del", function() {
        $(this).parents("tr").remove();
      });
    });
  </script>
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
  <a class="nav-link collapsed" href="Creacion_compensatorio.php">
    <i class="fas fa-fw fa-cog"></i>
    <span>Creación de compensatorio</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="Creacion_horarios_cierre.php">
    <i class="fas fa-fw fa-cog"></i>
    <span>Creación de horarios de cierre</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="Creacion_soporte_unidad.php">
    <i class="fas fa-fw fa-cog"></i>
    <span>Creación soporte de unidad</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="Creacion_vacaciones.php">
    <i class="fas fa-fw fa-cog"></i>
    <span>Creación de vacaciones</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="Creacion_claves_servidores.php">
    <i class="fas fa-fw fa-cog"></i>
    <span>Creación claves de servidores</span>
  </a>
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

<!--REPORTES-->
<div class="sidebar-heading">
  REPORTES
</div>

<li class="nav-item">
  <a class="nav-link" href="Reporte_casos_aranda.php">
    <!--<a class="nav-link" href="charts.html">-->
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Reporte de Casos</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="Reporte_actividades.php">
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
         <div style="width: 850px;"> 
          <div style="float: right; width: 400px;">
            <font size=4 style="color: #C019A6;">BIENVENIDO AL GESTOR DE SOPORTE IT</font>
          </div>
         </div>

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <?php @session_start();
            include_once("conexion.php");
            $conex2 = oci_connect($user, $pass, $db);
            $elusuario = $_SESSION['usuario'];
            $sql = "SELECT NOMBRES||' '||APELLIDOS FROM USUARIOS_SOPORTE WHERE USUARIO = '$elusuario'";
            $resultado_set = oci_parse($conex2, $sql);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>


              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row[0] ?></span>
                  <img class="img-profile rounded-circle" src="./img/imagenlogin.png">
                </a>
              <?php
            }
              ?>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="cambio_contrasena.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cambiar clave
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
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Soporte Aplicaciones TI - Creación de compensatorio por Especialista</h1>
          <p class="mb-4"></p>



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registrar compensatorio</h6>
            </div>

            <?php
            include_once("conexion.php");
            $conex2 = oci_connect($user, $pass, $db);
            ?>
            
            <div class="card-body">
              <!--tabla compensatorio-->
              <p>
                <form action="confirma_creacion_compensatorio.php" method="POST">
                  <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <table id="tabla" class="tabla" border=1>
                      <thead>
                        <tr>
                          <th>Especialista</th>
                          <th>Dia</th>
                          <th><input type="button" id="add" class="btn-primary" value="añadir fila"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                           <select name='especialista' id="especialista">
                           <?php
                           $sql = "SELECT NOMBRES||' '||APELLIDOS FROM USUARIOS_SOPORTE";
                           $resultado_set = oci_parse($conex2, $sql);
                           oci_execute($resultado_set);
                           while ($row = oci_fetch_array($resultado_set)){
                            echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                           }  
                            ?>
                            </select>
                          </td>
                          <td><input type="date" name='dia' id="fecha"></td>
                          <td><input type='button' class='del' value='Eliminar Fila'></td>
                        </tr>
                      </tbody>
                    </table>
                    <div>
                      <input type="submit" value="Guardar" id="enviar" style="float:right;" class="guard_comp">
                    </div>
                  </form>
                </form>
              </p>
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
    <script src="js/registra_compensatorio.js"></script>

    <!--js de la tabla-->
    <!--<script src="./tabla_dinamica/js/jquery-2.1.1.min.js"></script>
	<script src="./tabla_dinamica/js/bootstrap.js"></script> -->

    <!--JS Para el switch-->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>
<!--COMETARIADAS
Lineas 450 a 732
-->

</html>