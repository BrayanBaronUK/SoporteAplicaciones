<?php


//Incluimos librería y archivo de conexión
require 'Classes/PHPExcel.php';
require 'conexion.php';



//Consulta
    include_once("conexion.php");
    $conex2 = oci_connect($user, $pass, $db);

    $sql = "SELECT USUARIO, ESPECIALISTA, FECHA_CREADO,FECHA_INICIO,FECHA_FIN FROM SOPORTE_UNIDAD";
    $resultado_set = oci_parse($conex2, $sql);
    oci_execute($resultado_set);

    $fila = 2;
    //Objeto de PHPExcel
    $objPHPExcel  = new PHPExcel();

    //propiedades del documento
    $objPHPExcel->getProperties()->setCreator("Brayan Baron")->
    setDescription("Reporte de SoporteUnidad");

    //Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("ReporteSopUnidad");
    
    
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'USUARIO');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'ESPECIALISTA');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'FECHA REGISTRO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'INICIO SOPORTE');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'FIN SOPORTE');
    

    //Recorremos los resultados de la consulta y los imprimimos
    while ($row = oci_fetch_array($resultado_set)) {

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row[0]);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row[1]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row[2]);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row[3]);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row[4]);

        $fila++; //Sumamos 1 para pasar a la siguiente fila
    }       

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="ReporteSopUnidad.xls"');
    header('Cache-Control: max-age=0');
    

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
?>