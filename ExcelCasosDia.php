<?php


//Incluimos librería y archivo de conexión
require 'Classes/PHPExcel.php';
require 'conexion_aranda.php';



//Consulta
    include_once("conexion_aranda.php");
    $conex2 = oci_connect($user, $pass, $db);

    $sql = "SELECT GRP_ID,RESPONSABLE,count(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2  WHERE GRP_ID IN (64,73)
    AND FECHA_SOLUCION  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
    AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
    GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC";
    $resultado_set = oci_parse($conex2, $sql);
    oci_execute($resultado_set);

    $fila = 2;
    //Objeto de PHPExcel
    $objPHPExcel  = new PHPExcel();

    //propiedades del documento
    $objPHPExcel->getProperties()->setCreator("Brayan Baron")->
    setDescription("Reporte de Casos");

    //Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("CasosAranda");
    
    
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'GRUPO ID');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'RESPONSABLE');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'CASOS PENDIENTES');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'CASOS CERRADOS');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'TOTAL CASOS');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'CUMPLIMIENTO');
    

    //Recorremos los resultados de la consulta y los imprimimos
    while ($row = oci_fetch_array($resultado_set)) {

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row[0]);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row[1]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, '10');
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, '20');
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row[2]);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, '70%');

        $fila++; //Sumamos 1 para pasar a la siguiente fila
    }       

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="CasosArandaDia.xls"');
    header('Cache-Control: max-age=0');
    

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');



?>