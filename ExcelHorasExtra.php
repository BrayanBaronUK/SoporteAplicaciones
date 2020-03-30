<?php


//Incluimos librería y archivo de conexión
require 'Classes/PHPExcel.php';
require 'conexion.php';



//Consulta
    include_once("conexion.php");
    $conex2 = oci_connect($user, $pass, $db);

    $sql = "SELECT USUARIO, ESPECIALISTA, HORAS,VALOR_PAGAR FROM HORAS_EXTRA";
    $resultado_set = oci_parse($conex2, $sql);
    oci_execute($resultado_set);

    $fila = 2;
    //Objeto de PHPExcel
    $objPHPExcel  = new PHPExcel();

    //propiedades del documento
    $objPHPExcel->getProperties()->setCreator("Brayan Baron")->
    setDescription("Reporte de horas extra");

    //Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("HorasExtra");
    
    
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'USUARIO');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'ESPECIALISTA');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'HORAS');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'VALOR A PAGAR');
    

    //Recorremos los resultados de la consulta y los imprimimos
    while ($row = oci_fetch_array($resultado_set)) {

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row[0]);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row[1]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row[2]);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row[3]);

        $fila++; //Sumamos 1 para pasar a la siguiente fila
    }       

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="ReporteHorasExtra.xls"');
    header('Cache-Control: max-age=0');
    

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');
    
?>