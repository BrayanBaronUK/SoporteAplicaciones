<?php


//Incluimos librería y archivo de conexión
require 'Classes/PHPExcel.php';
require 'conexion_aranda.php';



//Consulta
    include_once("conexion_aranda.php");
    $conex2 = oci_connect($user, $pass, $db);

    $sql = "SELECT NO_CASO,AUTOR,FECHA_REGISTRO,RESPONSABLE,DESCRIPCION,ESTADO,CATEGORIA,SOLUCION,FECHA_SOLUCION 
    FROM ARANDA.V_ARA_CASOS_2 WHERE GRP_ID IN (64,73)
    AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
    ORDER BY 3 DESC";
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
    
    
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'No CASO');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'AUTOR');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'FECHA REGISTRO');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'RESPONSABLE');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'DESCRIPCION');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'ESTADO');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'CATEGORIA');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'SOLUCION');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'FECHA SOLUCION');

    //Recorremos los resultados de la consulta y los imprimimos
    while ($row = oci_fetch_array($resultado_set)) {

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $row[0]);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $row[1]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $row[2]);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $row[3]);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $row[4]);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $row[5]);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $row[6]);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $row[7]);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $row[8]);
        

        $fila++; //Sumamos 1 para pasar a la siguiente fila
    }       

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="DetalladoArandaMes.xls"');
    header('Cache-Control: max-age=0');
    

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('php://output');



?>