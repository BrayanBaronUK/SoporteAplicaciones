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

$v_fechaini = $_POST["diai"];
$v_fechafin = $_POST["diaf"];
$v_especialista = $_POST["especialista"];
$v_fecha_cre ="SYSDATE";

//$sql = "INSERT INTO COMPENSATORIOS VALUES ('$v_especialista','$v_fecha')";
$sql = "INSERT INTO SOPORTE_UNIDAD SELECT USUARIO, '$v_especialista',$v_fecha_cre,'$v_fechaini','$v_fechafin'FROM USUARIOS_SOPORTE WHERE (NOMBRES||' '||APELLIDOS) = '$v_especialista'";
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