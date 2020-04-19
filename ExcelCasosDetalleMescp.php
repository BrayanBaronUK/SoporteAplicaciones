<?php


//Incluimos librería y archivo de conexión
require 'Classes/PHPExcel.php';
require 'conexion_aranda.php';
require 'Classes/PHPExcel/IOFactory.php';



//Consulta
    include_once("conexion_aranda.php");
    $conex2 = oci_connect($user, $pass, $db);

    $sql = "SELECT NO_CASO,AUTOR,FECHA_REGISTRO,RESPONSABLE,DESCRIPCION,ESTADO,CATEGORIA,SOLUCION,FECHA_SOLUCION 
    FROM ARANDA.V_ARA_CASOS_2 WHERE GRP_ID IN (64,73)
    AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
    ORDER BY 3 DESC";
    $resultado_set = oci_parse($conex2, $sql);
    oci_execute($resultado_set);

    $fila = 7;


    $gdImage = imagecreatefrompng('img/logo.png');//Logotipo
    //Objeto de PHPExcel
    $objPHPExcel  = new PHPExcel();
    //$objPHPExcel = $this->get('phpexcel')->createPHPExcelObject();

    //propiedades del documento
    $objPHPExcel->getProperties()->setCreator("Brayan Baron")->
    setDescription("Reporte de Casos");

    //Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("CasosAranda");

    $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
    $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    
    $estiloTituloReporte = array(
        'font' => array(
        'name'      => 'Arial',
        'bold'      => true,
        'italic'    => false,
        'strike'    => false,
        'size' =>13
        ),
        'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_NONE
        )
        ),
        'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
        );
        
        $estiloTituloColumnas = array(
        'font' => array(
        'name'  => 'Arial',
        'bold'  => true,
        'size' =>10,
        'color' => array(
        'rgb' => 'FFFFFF'
        )
        ),
        'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '538DD5')
        ),
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
        )
        ),
        'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
        );
        
        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray( array(
        'font' => array(
        'name'  => 'Arial',
        'color' => array(
        'rgb' => '000000'
        )
        ),
        'fill' => array(
        'type'  => PHPExcel_Style_Fill::FILL_SOLID
        ),
        'borders' => array(
        'allborders' => array(
        'style' => PHPExcel_Style_Border::BORDER_THIN
        )
        ),
        'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
        ));

        
	$objPHPExcel->getActiveSheet()->getStyle('A1:I4')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A6:I6')->applyFromArray($estiloTituloColumnas);
    
    $objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE CASOS DETALLADO MES');
    $objPHPExcel->getActiveSheet()->mergeCells('B3:F3');
    
    
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'No CASO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'AUTOR');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'FECHA REGISTRO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'RESPONSABLE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
    $objPHPExcel->getActiveSheet()->setCellValue('E6', 'DESCRIPCION');
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('F6', 'ESTADO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
    $objPHPExcel->getActiveSheet()->setCellValue('G6', 'CATEGORIA');
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(50);
    $objPHPExcel->getActiveSheet()->setCellValue('H6', 'SOLUCION');
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', 'FECHA SOLUCION');
    

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
    $fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:I".$fila);
	
    $filaGrafica = $fila+2;  
    
    	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Productos!$E$7:$D$'.$fila);
	
	// definir origen de los rotulos
    $categories = new PHPExcel_Chart_DataSeriesValues('String', 'Productos!$B$7:$B$'.$fila);
    

    // definir  gráfico
	$series = new PHPExcel_Chart_DataSeries(
        PHPExcel_Chart_DataSeries::TYPE_BARCHART, // tipo de gráfico
        PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
        array(0),
        array(),
        array($categories), // rótulos das columnas
        array($values) // valores
        );
        $series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

    // inicializar gráfico
	$layout = new PHPExcel_Chart_Layout();
    $plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
    
    	// inicializar o gráfico
	$chart = new PHPExcel_Chart('exemplo', null, null, $plotarea);
	
	// definir título de gráfico
	$title = new PHPExcel_Chart_Title(null, $layout);
    $title->setCaption('Gráfico Casos del Mes');
    
    	// definir posiciondo gráfico y título
	$chart->setTopLeftPosition('B'.$filaGrafica);
	$filaFinal = $filaGrafica + 10;
	$chart->setBottomRightPosition('I'.$filaFinal);
    $chart->setTitle($title);
    
    	// adicionar o gráfico à folha
	$objPHPExcel->getActiveSheet()->addChart($chart);
	
    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    
    
   // $writer -> createWriter($objPHPExcel, 'Excel2007');
   //$objPHPExcel = PHPExcel_IOFactory::load("prueba.xlsx");
   //$objPHPExcel->setIncludeCharts(true);  
	
	// incluir gráfico
   //$writer->setIncludeCharts(TRUE);


    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="DetalladoArandaMes.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');



?>