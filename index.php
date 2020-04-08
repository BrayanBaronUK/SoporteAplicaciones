<?php

include_once("conexion_aranda.php");
$conex2 = oci_connect($user, $pass, $db);

?>
<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8">
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
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <!--Insercion de pie casos Aranda-->
  <style type="text/css">
    /*${demo.css}*/
  </style>
  <script type="text/javascript">
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
            ?>

              ['<?php echo $row[1] ?>', <?php echo $row[2] ?>],

            <?php
            }
            ?>

          ]
        }]
      });
    });
  </script>
  <!--insercion pie mes-->
  <style type="text/css">
    /*${demo.css}*/
  </style>
  <script type="text/javascript">
    $(function() {
      $('#grafico_pie_mes').highcharts({
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false
        },
        title: {
          text: 'Porcentaje de Casos Aranda - Mes'
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
              }
            }
          }
        },
        series: [{
          type: 'pie',
          name: 'Ingeniero',
          data: [

            <?php
            $sql = "SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2
            WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
              AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
            $resultado_set = oci_parse($conex2, $sql);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>

              ['<?php echo $row[1] ?>', <?php echo $row[2] ?>],

            <?php
            }
            ?>

          ]
        }]
      });
    });
  </script>

  <!--insercion de barras mes-->
  <script type="text/javascript">
    $(function() {
      $('#grafico_barras_mes').highcharts({
        chart: {
          type: 'bar'
        },
        title: {
          text: 'Cantidad de Casos Aranda - Mes'
        },
        subtitle: {
          text: 'Cantidad de casos por especialista'
        },
        xAxis: {
          categories: [
            <?php
            $sql = "SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD,TRUNC(DBMS_RANDOM.VALUE(1,count(*))) as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2
                  WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                    AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                      GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
            $resultado_set = oci_parse($conex2, $sql);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>

              ['<?php echo $row[1] ?>'],

            <?php
            }
            ?>

          ],
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
          data: [
            <?php
            $sql = "SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD, TRUNC(DBMS_RANDOM.VALUE(1,count(*))) as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2
                  WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                    AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                      GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
            $resultado_set = oci_parse($conex2, $sql);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>[<?php echo $row[2] ?>],

            <?php
            }
            ?>
          ]
        }, {
          name: 'pend',
          data: [
            <?php
            $sql2 = "SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD,TRUNC(DBMS_RANDOM.VALUE(1,count(*))) as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
            $resultado_set = oci_parse($conex2, $sql2);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>[<?php echo $row[3] ?>],

            <?php
            }
            ?>
          ]
        }]
      });
    });
  </script>
  <!--insercion de barras dia-->
  <script type="text/javascript">
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
          categories: [
            <?php
            $sql = "SELECT GRP_ID,RESPONSABLE,count(*) as CANTIDAD,TRUNC(DBMS_RANDOM.VALUE(1,count(*))) as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2  WHERE GRP_ID IN (64,73)
            AND FECHA_SOLUCION  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
            AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
            GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
            $resultado_set = oci_parse($conex2, $sql);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>

              ['<?php echo $row[1] ?>'],

            <?php
            }
            ?>

          ],
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
          data: [
            <?php
            $sql = "SELECT GRP_ID,RESPONSABLE,count(*) as CANTIDAD, TRUNC(DBMS_RANDOM.VALUE(1,count(*))) as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2  WHERE GRP_ID IN (64,73)
                    AND FECHA_SOLUCION  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
                    AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
                    GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
            $resultado_set = oci_parse($conex2, $sql);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>[<?php echo $row[2] ?>],

            <?php
            }
            ?>
          ]
        }, {
          name: 'pend',
          align: 'left',
          data: [
            <?php
            $sql = "SELECT GRP_ID,RESPONSABLE,count(*) as CANTIDAD, TRUNC(DBMS_RANDOM.VALUE(1,count(*))) as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2  WHERE GRP_ID IN (64,73)
                    AND FECHA_SOLUCION  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
                    AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
                    GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
            $resultado_set = oci_parse($conex2, $sql);
            oci_execute($resultado_set);
            while ($row = oci_fetch_array($resultado_set)) {
            ?>[<?php echo $row[3] ?>],

            <?php
            }
            ?>
          ]
        }]
      });
    });
  </script>
  <script type="text/javascript">
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
            ?>['<?php echo $row[0] ?>'],

            <?php
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
            AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
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
            AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
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
          
          /*
          <?php
            $sql2 = "SELECT MES FROM V_MES_ACTUAL";
            $resultado_set = oci_parse($conex2, $sql2);
            oci_execute($resultado_set);
            while (oci_fetch($resultado_set)) {
              ?>
            name: ['<?php $estado = oci_result($resultado_set, 'MES') ?>'];
            <?php
            }
            ?>*/   
          
          name: 'Mes Anterior',
          data: [
            <?php
            $sql2 = "SELECT RESPONSABLE,COUNT(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2 A
            INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC(ADD_MONTHS(SYSDATE,-1),'MONTH') AND TRUNC(LAST_DAY(ADD_MONTHS(SYSDATE,-1)))
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
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC(ADD_MONTHS(SYSDATE,-2),'MONTH') AND TRUNC(LAST_DAY(ADD_MONTHS(SYSDATE,-2)))
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
  </script>

</head>

<!--<body id="page-top">-->

<body>

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
                  <img class="img-profile rounded-circle" src="./img/imagen1.jpg">
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
          <div id="grafico_barras_dia" style=" width: 640px; height: 500px; float:left; padding-bottom: 15px;"></div>
          <div id="grafico_pie_dia" style="height: 500px; width: 640px; float:right; padding-bottom: 15px;"></div>
        </div>
        <br></br>
        <div style="width: 1300px; padding:3px;">
          <div id="grafico_barras_mes" style=" width: 640px; height: 500px; float:left;"></div>
          <div id="grafico_pie_mes" style="height: 500px; width: 640px; float:right;"></div>
        </div>


        <!-- <div id="linea_meses" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->
        <div id="linea_meses" style="width: 1300px; height: 400px; padding-top:15px; "></div>

        <!--   
        <script src="reportes_graficos/Highcharts-8.0.4/code/highcharts.js"></script>
        <script src="reportes_graficos/Highcharts-8.0.4/code/modules/exporting.js"></script>
        <script src="reportes_graficos/Highcharts-8.0.4/code/modules/export-data.js"></script>
        <script src="reportes_graficos/Highcharts-8.0.4/code/modules/accessibility.js"></script>
        <figure class="highcharts-figure">
          <div id="prueba"></div>
        </figure> -->
        <!--prueba-->
        <!--
        <script type="text/javascript">
          Highcharts.chart('prueba', {
            chart: {
              type: 'bar'
            },
            title: {
              text: 'Historic World Population by Region'
            },
            subtitle: {
              text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
            },
            xAxis: {
              
              categories: [
                <?php
                include_once("conexion_aranda.php");
                $conex2 = oci_connect($user, $pass, $db);
                $sql3 = "SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD,94 as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2
                  WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                    AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                      GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
                $resultado_set = oci_parse($conex2, $sql3);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                ?>

                  ['<?php echo $row["RESPONSABLE"] ?>'],

                <?php
                }
                ?>

              ],
              title: {
                text: null
              }
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Population (millions)',
                align: 'high'
              },
              labels: {
                overflow: 'justify'
              }
            },
            tooltip: {
              valueSuffix: ' millions'
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
              y: 80,
              floating: true,
              borderWidth: 1,
              backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
              shadow: true
            },
            credits: {
              enabled: false
            },
            series: [{
              name: 'Casos solucionados',
              data: [
                <?php
                include_once("conexion_aranda.php");
                $conex2 = oci_connect($user, $pass, $db);
                $sql1 = "SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD,94 as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                 AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
                $resultado_set = oci_parse($conex2, $sql1);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                ?>[<?php echo $row[2] ?>],

                <?php
                }
                ?>
              ]
            }, {
              name: 'Casos pendientes',
              data: [
                <?php
                include_once("conexion_aranda.php");
                $conex2 = oci_connect($user, $pass, $db);
                $sql2 = "SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD,94 as CANTIDAD_3 FROM ARANDA.V_ARA_CASOS_2
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
                $resultado_set = oci_parse($conex2, $sql2);
                oci_execute($resultado_set);
                while ($row = oci_fetch_array($resultado_set)) {
                ?>[<?php echo $row[3] ?>],

                <?php
                }
                ?>
              ]
            }]
          });
        </script> -->

        <!-- </div>-->

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

    <!-- Bootstrap core JavaScript-->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="reportes_graficos/Highcharts-4.1.5/js/highcharts.js"></script>
    <script src="reportes_graficos/Highcharts-4.1.5/js/modules/exporting.js"></script>-->

    <!--prueba-->

    <script src="reportes_graficos/Highcharts-8.0.4/code/highcharts.js"></script>
    <script src="reportes_graficos/Highcharts-8.0.4/code/modules/exporting.js"></script>
    <script src="reportes_graficos/Highcharts-8.0.4/code/modules/export-data.js"></script>
    <script src="reportes_graficos/Highcharts-8.0.4/code/modules/accessibility.js"></script>

</body>
<!--comentariadas 
441 a 726
-->

</html>