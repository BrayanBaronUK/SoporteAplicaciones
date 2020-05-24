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
            <?php @session_start();
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
        <div style="width: 1300px; padding:2px;">
          <div style="float: left; width: 640px; height: 20px;">
            <form action="index2.php">
              <input type="submit" style="float: left;" value="Resumen Mes" class="next_window"></input>
            </form>
          </div>
          <div style="float: right; width: 640px; height: 20px;">
          </div>
        </div>
        <div id="linea_meses" style="width: 1300px; height: 400px; padding-top:15px; "></div>
        <div id="tabla_analisis" style="width: 1300px; padding-top:15px;">
          <p style="color: #C019A6;" align="center"><strong>Tabla de Analisis del día</strong></p>
          <table class="table table-bordered" id="dataTable_" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Cantidad Max Casos</th>
                <th>Ingeniero Max</th>
                <th>Cantidad Min Casos</th>
                <th>Ingeniero Min</th>
                <th>Diferencia de Max a Min</th>
                <th>Prom Casos Grupo</th>
                <th>Porcentaje Rend Grupo</th>
                <th>Total Cerrados</th>
                <th>Total Pendientes</th>
              </tr>
            </thead>
            <tbody>

              <?php
              include_once("conexion_aranda_2.php");
              $conex3 = oci_connect($user, $pass, $db);
              //ini_set('max_execution_time', 100);
              //set_time_limit(100);
              $consultap = 'SELECT MAXIMO,INGE_MAX,MINIMO,INGE_MIN,DIFERENCIA,PROMEDIO,CUMPLIMIENTO,CERRADOS_TOTAL,PENDIENTE_TOTAL
              FROM ARANDA.V_ANALISIS_GES';
              $resultado_tab = oci_parse($conex3, $consultap);
              oci_execute($resultado_tab);
              while ($fila = oci_fetch_array($resultado_tab)) {
              ?>
                <tr>
                  <td><?php echo $fila[0] ?></td>
                  <td><?php echo $fila[1] ?></td>
                  <td><?php echo $fila[2] ?></td>
                  <td><?php echo $fila[3] ?></td>
                  <td><?php echo $fila[4] ?></td>
                  <td><?php echo $fila[5] ?></td>
                  <td><?php echo $fila[6] ?></td>
                  <td><?php echo $fila[7] ?></td>
                  <td><?php echo $fila[8] ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
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
            <a class="btn btn-primary" href="login.php">Salir</a>
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
        // Grafica de lineas Historico
        $(function() {
          $('#linea_meses').highcharts({
            title: {
              text: 'Historico de casos ultimos 3 Meses',
              x: -20 //center
            },
            subtitle: {
              text: 'Historico por especialista',
              x: -20
            },
            xAxis: {
              categories: [
                <?php
                $sql2 = "SELECT DISTINCT(RESPONSABLE) FROM ARANDA.V_ARA_CASOS_2 A
            INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
            WHERE GRP_ID IN (64,73)
            AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323) ORDER BY 1 ASC";
                $resultado_set = oci_parse($conex2, $sql2);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                  echo "'" . $row[0] . "',";
                }
                ?>

              ]
            },
            yAxis: {
              title: {
                text: 'Cantidad de casos'
              },
              plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
              }]
            },
            tooltip: {
              valueSuffix: ' casos'
            },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle',
              borderWidth: 0
            },
            series: [{
              name: 'Mes Actual',
              data: [
                <?php
                $sql2 = "SELECT  RESPONSABLE,COUNT(*) AS CANTIDAD 
                FROM ARANDA.V_ARA_CASOS_2 A
                LEFT JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO')
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_SOLUCION) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY RESPONSABLE
                UNION ALL
                SELECT DISTINCT(RESPONSABLE),0 FROM ARANDA.V_ARA_CASOS_2 A
                INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73)
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                MINUS
                SELECT  RESPONSABLE,0 
                FROM ARANDA.V_ARA_CASOS_2 A
                LEFT JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO')
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_SOLUCION) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY RESPONSABLE ORDER BY 1 ASC";
                $resultado_set = oci_parse($conex2, $sql2);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                ?>[<?php echo $row[1] ?>],

                <?php
                }
                ?>

              ]

            }, {
              name: 'Mes Anterior',
              data: [
                <?php
                $sql2 = "SELECT RESPONSABLE,COUNT(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2 A
                INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_SOLUCION) BETWEEN TRUNC(ADD_MONTHS(SYSDATE,-1),'MONTH') AND TRUNC(LAST_DAY(ADD_MONTHS(SYSDATE,-1)))
                GROUP BY RESPONSABLE ORDER BY 1 ASC";
                $resultado_set = oci_parse($conex2, $sql2);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                ?>[<?php echo $row[1] ?>],

                <?php
                }
                ?>

              ]


            }, {
              name: 'Dos meses antes',
              data: [
                <?php
                $sql2 = "SELECT RESPONSABLE,COUNT(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2 A
                INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_SOLUCION) BETWEEN TRUNC(ADD_MONTHS(SYSDATE,-2),'MONTH') AND TRUNC(LAST_DAY(ADD_MONTHS(SYSDATE,-2)))
                GROUP BY RESPONSABLE ORDER BY 1 ASC";
                $resultado_set = oci_parse($conex2, $sql2);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                ?>[<?php echo $row[1] ?>],

                <?php
                }
                ?>

              ]

            }]
          });
        });

      });
    </script>
</body>

</html>