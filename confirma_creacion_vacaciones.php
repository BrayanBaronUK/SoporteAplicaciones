<script language="javascript" type="text/javascript">
  function AlertaCreaVacaciones() {
    alert('Ok se realizo registro de programacion de vacaciones...!');
    window.location = 'Creacion_vacaciones.php';
  }

  function AlertaNoVacaciones() {
    alert('No se pudo crear programacion de vacaciones...!');
    window.location = 'Creacion_vacaciones.php';
  }
</script>
<?php
include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

$v_fechainiv = $_POST["diavi"];
$v_fechafinv = $_POST["diavf"];
$v_especialista = $_POST["especialista"];
$v_fecha_cre ="SYSDATE";

//$sql = "INSERT INTO COMPENSATORIOS VALUES ('$v_especialista','$v_fecha')";
$sql = "INSERT INTO VACACIONES SELECT USUARIO, '$v_especialista',$v_fecha_cre,'$v_fechainiv','$v_fechafinv'FROM USUARIOS_SOPORTE WHERE (NOMBRES||' '||APELLIDOS) = '$v_especialista'";
$queryf = oci_parse($conex2, $sql);
oci_execute($queryf);
oci_commit($conex2);

$filas = oci_num_rows($queryf);

if ($filas > 0) :

  echo "<script>";
  echo "AlertaCreaVacaciones()";
  echo "</script>";


else :

  echo "<script>";
  echo "AlertaNoVacaciones()";
  echo "</script>";

endif;

?>