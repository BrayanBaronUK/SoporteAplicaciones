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

$v_nombreser = $_POST["nombreser"];
$v_ip = $_POST["ip"];
$v_usua = $_POST["usua"];
$v_clave= $_POST["clave"];
$v_fecha_cre ="SYSDATE";
//$clave_cifrada = password_hash($v_clave, PASSWORD_DEFAULT, array("cost"=>15));

//$sql = "INSERT INTO COMPENSATORIOS VALUES ('$v_especialista','$v_fecha')";
$sql = "INSERT INTO CLAVES_SERVIDORES VALUES ('$v_nombreser','$v_ip','$v_usua','$v_clave',$v_fecha_cre)";
$queryf = oci_parse($conex2, $sql);
oci_execute($queryf);
oci_commit($conex2);

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