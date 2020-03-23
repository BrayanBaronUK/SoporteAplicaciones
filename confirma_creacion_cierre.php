<script language="javascript" type="text/javascript">
  function AlertaCreaCierre() {
    alert('Ok se realizo registro de programacion de Cierre Maestra...!');
    window.location = 'Creacion_horarios_cierre.php';
  }

  function AlertaNoCierre() {
    alert('No se puso crear cierre...!');
    window.location = 'Creacion_horarios_cierre.php';
  }
</script>
<?php
include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

$v_fecha = $_POST["dia"];
$v_especialista = $_POST["especialista"];
$v_fecha_cre ="SYSDATE";

//$sql = "INSERT INTO COMPENSATORIOS VALUES ('$v_especialista','$v_fecha')";
$sql = "INSERT INTO CIERRES SELECT USUARIO, '$v_especialista',$v_fecha_cre,'$v_fecha' FROM USUARIOS_SOPORTE WHERE (NOMBRES||' '||APELLIDOS) = '$v_especialista'";
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