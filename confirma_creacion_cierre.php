<script language="javascript" type="text/javascript">
  function AlertaCreaCierre() {
    confirm('Ok se realizo registro de programacion de Cierre Maestra...!');
    window.location = 'Creacion_horarios_cierre.php';
  }

  function AlertaNoCierre() {
    confirm('No se pudo crear cierre...!');
    window.location = 'Creacion_horarios_cierre.php';
  }
</script>
<?php
include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

$cedulas = "";
$arrCedu = array();
$arrDias = array();

foreach ($_POST as $key => $value) {
  // echo "<br>DEB: "."$key = $value";
  if ($key == 'especialista') {
    $arrCedu = $value;
  } else if ($key == 'dia') {
    $arrDias = $value;
  }
}


// BUSQUEDA DE USUARIOS
$sql = "SELECT CEDULA, USUARIO, (NOMBRES||' '||APELLIDOS) FROM  USUARIOS_SOPORTE WHERE CEDULA IN (" . implode(',', $arrCedu) . ")";
$queryf = oci_parse($conex2, $sql);
oci_execute($queryf);
oci_commit($conex2);
$especSql = "";


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

    $especSql .= " INTO CIERRES (USUARIO, ESPECIALISTA, FECHA_CREADO, FECHA_CIERRE)
      VALUES ((SELECT USUARIO FROM USUARIOS_SOPORTE WHERE CEDULA IN ($arrCedu[$cont])), (SELECT (NOMBRES||' '||APELLIDOS) 
      FROM USUARIOS_SOPORTE WHERE CEDULA IN ($arrCedu[$cont])), SYSDATE, '$arrDias[$cont]')";
    $cont++;
  }
} else {
  while ($row = oci_fetch_array($queryf)) {

    //Buscar posicion del especialista
    $posicionEsp = array_search($row[0], $arrCedu, false);
    $especSql .= " INTO CIERRES (USUARIO, ESPECIALISTA, FECHA_CREADO, FECHA_CIERRE) 
    VALUES ('$row[1]', '$row[2]', SYSDATE, '$arrDias[$posicionEsp]')";
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
  echo "AlertaCreaCierre()";
  echo "</script>";


else :

  echo "<script>";
  echo "AlertaNoCierre()";
  echo "</script>";

endif;

?>