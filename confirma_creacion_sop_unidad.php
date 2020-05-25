<script language="javascript" type="text/javascript">
  function AlertaCreaSopUnidad() {
    alert('Ok se realizo registro de programacion Soporte Unidad...!');
    window.location = 'Creacion_soporte_unidad.php';
  }

  function AlertaNoSopUnidad() {
    alert('No se pudo crear programacion Soporte Unidad...!');
    window.location = 'Creacion_soporte_unidad.php';
  }
</script>
<?php
include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

$cedulas = "";
$arrCedu = array();
$arrDiasi = array();
$arrDiasf = array();

foreach ($_POST as $key => $value) {
  // echo "<br>DEB: "."$key = $value";
  if ($key == 'especialista') {
    $arrCedu = $value;
  } else if ($key == 'diai') {
    $arrDiasi = $value;
  } else if ($key == 'diaf') {
    $arrDiasf = $value;
  }
}

// BUSQUEDA DE USUARIOS
$sql = "SELECT CEDULA, USUARIO, (NOMBRES||' '||APELLIDOS) FROM  USUARIOS_SOPORTE WHERE CEDULA IN (" . implode(',', $arrCedu) . ")";
$queryf = oci_parse($conex2, $sql);
oci_execute($queryf);
oci_commit($conex2);

//validar cantidad de registros de la consulta
$sql2 = "SELECT count(*) as CANTIDAD FROM  USUARIOS_SOPORTE WHERE CEDULA IN (" . implode(',', $arrCedu) . ")";
$queryg = oci_parse($conex2, $sql2);
oci_execute($queryg);
oci_commit($conex2);
while (oci_fetch($queryg)) {
  $cantidadReg = oci_result($queryg, "CANTIDAD");
}

$especSql = "";
$cont = 0;

if ($cantidadReg != count($arrCedu)) {
  while ($cont < count($arrCedu)) {
    $especSql .= " INTO SOPORTE_UNIDAD (USUARIO, ESPECIALISTA, FECHA_CREADO, FECHA_INICIO,FECHA_FIN)
      VALUES ((SELECT USUARIO FROM USUARIOS_SOPORTE WHERE CEDULA IN ($arrCedu[$cont])), (SELECT (NOMBRES||' '||APELLIDOS) 
      FROM USUARIOS_SOPORTE WHERE CEDULA IN ($arrCedu[$cont])), SYSDATE, '$arrDiasi[$cont]', '$arrDiasf[$cont]')";
    $cont++;
  }
} else {
  while ($row = oci_fetch_array($queryf)) {
    //Buscar posicion del especialista
    $posicionEsp = array_search($row[0], $arrCedu, false);
    $especSql .= " INTO SOPORTE_UNIDAD (USUARIO, ESPECIALISTA, FECHA_CREADO, FECHA_INICIO,FECHA_FIN) 
    VALUES ('$row[1]', '$row[2]', SYSDATE, '$arrDiasi[$posicionEsp]', '$arrDiasf[$posicionEsp]')";
  }
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
  echo "AlertaCreaSopUnidad()";
  echo "</script>";


else :

  echo "<script>";
  echo "AlertaNoSopUnidad()";
  echo "</script>";

endif;

?>