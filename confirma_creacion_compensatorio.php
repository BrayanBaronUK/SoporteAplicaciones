<script language="javascript" type="text/javascript">
  function AlertaCreaCompensatorio() {
    alert('Ok se realizo registro del compensatorio...!');
    window.location = 'Creacion_compensatorio.php';
  }

  function AlertaNoCompensatorio() {
    alert('No se puso crear compensatorio...!');
    window.location = 'Creacion_compensatorio.php';
  }
</script>
<?php
session_start();
include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

$v_fecha = $_POST["dia"];
$v_especialista = $_POST["especialista"];
$v_prueba = $_POST["prueba"];

//$sql = "INSERT INTO COMPENSATORIOS VALUES ('$v_especialista','$v_fecha')";
$sql = "INSERT INTO COMPENSATORIOS SELECT USUARIO, '$v_especialista','$v_fecha' FROM USUARIOS_SOPORTE WHERE (NOMBRES||' '||APELLIDOS) = '$v_especialista'";
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

?>