<script language="javascript" type="text/javascript">
  function AlertaCreaCompensatorio() {
    alert('Ok se realizo registro del compensatorio...!');
    window.location = 'Creacion_compensatorio.php';
  }

  function AlertaNoCompensatorio() {
    alert('No se pudo crear compensatorio...!');
    window.location = 'Creacion_compensatorio.php';
  }
</script>

<?php
include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);


$cedulas = "";
$arrCedu = array();
$arrDias = array();

foreach($_POST as $key => $value) {
  // echo "<br>DEB: "."$key = $value";
  if($key == 'especialista') {
    $arrCedu = $value;
  } else if($key == 'dia') {
    $arrDias = $value;
  }
}

      
    // BUSQUEDA DE USUARIOS
    $sql = "SELECT CEDULA, USUARIO, (NOMBRES||' '||APELLIDOS) FROM  USUARIOS_SOPORTE WHERE CEDULA IN (". implode(',', $arrCedu). ")";
    $queryf = oci_parse($conex2, $sql);
    oci_execute($queryf);
    oci_commit($conex2);

    $especSql = "";
    while ($row = oci_fetch_array($queryf)){
      
      //Buscar posicion del especialista
      $posicionEsp = array_search($row[0],$arrCedu,false);
      $especSql .= " INTO COMPENSATORIOS (USUARIO, ESPECIALISTA, FECHA_CREADO, FECHA_COMPENSATORIO) VALUES ('$row[1]', '$row[2]', SYSDATE, '$arrDias[$posicionEsp]')";
    }
   
    
  
    $sql = "INSERT ALL $especSql SELECT * FROM DUAL";
   //echo "CONSULTA ".$sql;
   //  exit();
    
      $queryf = oci_parse($conex2, $sql);
      oci_execute($queryf);
      oci_commit($conex2);
  

      $filas = oci_num_rows($queryf);

      if ($filas > 0) :

        echo "<script>";
        echo "AlertaCreaCompensatorio()";
        echo "</script>";


      else :

        echo "<script>";
        echo "AlertaNoCompensatorio()";
        echo "</script>";

      endif;
    
//}

?>