<?php

include_once("conexion_aranda.php");
 $conex2 = oci_connect($user, $pass, $db);

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Casos Aranda 2020</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">/*${demo.css}*/</style>
    <script type="text/javascript">
        $(function() {
            $('#grafico_pie').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'GRAFICA DE CASOS ARANDA'
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
                    name: 'Ingenieros',
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
</head>

<body>
    <script src="reportes_graficos/Highcharts-4.1.5/js/highcharts.js"></script>
    <script src="reportes_graficos/Highcharts-4.1.5/js/modules/exporting.js"></script>

    <div id="grafico_pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
   
    <!--<center><a href="ejemplo2.php">Ver ejemplo 2</a></center>-->

</body>

</html>