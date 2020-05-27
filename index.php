<?php include_once("LoginValidate.php"); ?>

<?php
include_once("conexion_aranda.php");
$conex2 = oci_connect($user, $pass, $db);
ini_set('max_execution_time', 100);
set_time_limit(100);
?>

<!DOCTYPE html>
<html lang="es">


<head>

  <meta charset="utf-8">
  <link rel="icon" href="./img/favicon2.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Soporte IT AVANTEL</title>

  <!-- Custom fonts for this template-->

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!--estilos botones del dashboard-->
  <link href="tabla_dinamica/estilos_tab/botones_estilos.css" rel="stylesheet">

</head>

<!--<body id="page-top">-->

<body>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    include_once("validador_menu.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <div style="width: 850px;">
            <div style="float: right; width: 400px;">
              <font SIZE=4 style="color: #C019A6;">BIENVENIDO AL GESTOR DE SOPORTE IT</font>
            </div>
          </div>

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>
            <?php 
            @session_start();
            include_once("conexion.php");
            $conex1 = oci_connect($user, $pass, $db);
            $elusuario = $_SESSION['usuario'];
            $sql = "SELECT NOMBRES||' '||APELLIDOS FROM USUARIOS_SOPORTE WHERE USUARIO = '$elusuario'";
            $resultado_set = oci_parse($conex1, $sql);
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


        <!--<div class="container-fluid">-->
        <div style="width: 1300px; padding:3px;">
          <div style="float: right; width: 640px; height: 30px;">
            <form action="index2.php">
              <input type="submit" style="float: right;" value="Resumen Mes" class="next_window"></input>
            </form>
          </div>
          <div style="float: left; width: 640px; height: 30px;">
          </div>
        </div>
        <br>

        <div style="width: 1300px; padding:3px;">
          <div id="grafico_barras_dia" style="width: 640px;height: 500px;float:left;padding-bottom: 15px;"></div>
          <div id="grafico_pie_dia" style="height: 500px; width: 640px; float:right; padding-bottom: 15px;"></div>
        </div>


        <!-- DataTales Example -->
        <div style="width: 1300px; padding:3px;">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border=1>
              <thead>
                <tr>
                  <th>Ingeniero</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Usuario Turno</td>
                  <td id="userTurn">Cargando...</td>
                </tr>
                <tr>
                  <td>Usuario Compensatorio</td>
                  <td>Compensatorio</td>
                </tr>
                <tr>
                  <td>Usuario Vacaciones</td>
                  <td>Vacaciones</td>
                </tr>
                <tr>
                  <td>Usuario Cierre</td>
                  <td>Cierre</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- End of Main Content -->

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
            <a class="btn btn-primary" href="logout.php">Salir</a>
            <!--  <a class="btn btn-primary" href="login.php">Logout</a>-->
          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <script src="vendor/chart.js/Chart.min.js"></script>

    <script src="reportes_graficos/Highcharts-8.0.4/code/highcharts.js"></script>
    <script src="reportes_graficos/Highcharts-8.0.4/code/modules/exporting.js"></script>
    <script src="reportes_graficos/Highcharts-8.0.4/code/modules/export-data.js"></script>
    <script src="reportes_graficos/Highcharts-8.0.4/code/modules/accessibility.js"></script>


    <!--Insercion de pie casos Aranda-->

    <!--insercion pie mes-->
    <style type="text/css">
      /*${demo.css}*/
    </style>

    <script type="text/javascript">
      $(document).ready(function() {

        // Insercion de barras dia
        <?php
        $arrResp = array();
        $arrCant = array();
        $arrPend = array();

        $sql = "SELECT GRP_ID,RESPONSABLE,CANTIDAD,PENDIENTES FROM ARANDA.V_GESTION_DIA_GRAF";
        $resultado_set = oci_parse($conex2, $sql);
        oci_execute($resultado_set);
        while ($row = oci_fetch_array($resultado_set)) {
          array_push($arrResp, $row[1]);
          array_push($arrCant, $row[2]);
          array_push($arrPend, $row[3]);
        }
        ?>
        $(function() {
          $('#grafico_barras_dia').highcharts({
            chart: {
              type: 'bar'
            },
            title: {
              text: 'Cantidad de Casos Aranda - Día'
            },
            subtitle: {
              text: 'Cantidad de casos por especialista'
            },
            xAxis: {
              categories: [<?php echo "'" . implode("','", $arrResp) . "'"; ?>],
              title: {
                text: null
              }
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Cantidad casos',
                align: 'high'
              },
              labels: {
                overflow: 'justify'
              }
            },
            tooltip: {
              valueSuffix: ' casos'
            },
            plotOptions: {
              bar: {
                dataLabels: {
                  enabled: true
                }
              }
            },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'top',
              x: -40,
              y: 100,
              floating: true,
              borderWidth: 1,
              backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
              shadow: true
            },
            credits: {
              enabled: false
            },
            series: [{
              name: 'cerr',
              align: 'left',
              data: [<?php echo implode(",", $arrCant); ?>],
            }, {
              name: 'pend',
              align: 'left',
              data: [<?php echo implode(",", $arrPend); ?>],
            }]
          });
        });

        // Insercion de pie casos Aranda
        $(function() {
          $('#grafico_pie_dia').highcharts({
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false
            },
            title: {
              text: 'Porcentaje de Casos Aranda - Día'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                  style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    //  color: 'blue' || 'black'
                  }
                }
              }
            },
            series: [{
              type: 'pie',
              name: 'Ingeniero',
              data: [

                <?php
                $sql = "SELECT GRP_ID,RESPONSABLE,count(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2  WHERE GRP_ID IN (64,73)
            AND FECHA_SOLUCION  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
            AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
            GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
                $resultado_set = oci_parse($conex2, $sql);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                ?>['<?php echo $row[1] ?>', <?php echo $row[2] ?>],
                <?php
                }
                ?>

              ]
            }]
          });
        });
      });
    </script>

    <script src="js/index.js"></script>
</body>

</html>