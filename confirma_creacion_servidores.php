<script language="javascript" type="text/javascript">
  function AlertaCreaServidor() {
    alert('Ok se realizo registro de credenciales de servidor...!');
    window.location = 'Creacion_claves_servidores.php';
  }

  function AlertaNoServidor() {
    alert('No se pudo crear registro de credenciales de servidor...!');
    window.location = 'Creacion_claves_servidores.php';
  }
</script>
<?php

include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

$arrnombreser= array();
$arrip = array();
$arrusua = array();
$arrclave = array();

foreach($_POST as $key => $value) {
  if($key == 'nombreser') {
    $arrnombreser = $value;
  } else if($key == 'ip') {
    $arrip = $value;
  }else if($key == 'usua') {
    $arrusua = $value;
  }else if($key == 'clave') {
    $arrclave = $value;
  }
}

//definiendo tamaño del arreglo
$tamaño = sizeof($arrnombreser);

//recorriendo los arreglos e ir insertando
for ($i=0; $i < $tamaño; $i++) { 
$sql = "INSERT INTO CLAVES_SERVIDORES VALUES ('$arrnombreser[$i]','$arrip[$i]','$arrusua[$i]','$arrclave[$i]',SYSDATE)";
$queryf = oci_parse($conex2, $sql);
oci_execute($queryf);
oci_commit($conex2);
}


$filas = oci_num_rows($queryf);

if ($filas > 0) :

  echo "<script>";
  echo "AlertaCreaServidor()";
  echo "</script>";


else :

  echo "<script>";
  echo "AlertaNoServidor()";
  echo "</script>";

endif;

?>