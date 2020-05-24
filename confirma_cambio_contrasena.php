<script language="javascript" type="text/javascript">
  function AlertaCamposDiferentes() {
    alert('No coinciden los campos verificar de nuevo...!');
    window.location = 'cambio_contrasena.php';
  }

  function IngresoUser() {
    alert('Ok a realizado el cambio de su clave ...!');
    window.location = '/AvantelSoporte/index.php';
  }

  function AlertaClaveAvantel() {
    alert('Su clave no puede ser AVANTEL ingresar una nueva...!');
    window.location = 'cambio_contrasena.php';
  }

  function AlertaNoCambio() {
    alert('no hay usuario!');
    window.location = 'cambio_contrasena.php';
  }

  function AlertaClaveIgual() {
    alert('su clave no debe ser la misma que la actual...!');
    window.location = 'cambio_contrasena.php';
  }
  function IngresoAdmin() {
      alert('Ok a realizado el cambio de su clave ...!');
        window.location = '/AvantelSoporte/index.php';
    }
</script>
<?php
@session_start();
include_once("conexion.php");
$elusuario = $_SESSION['usuario'];


$v_clave1 = $_POST["clave1"];
$v_clave2 = $_POST["clave2"];

$conex2 = oci_connect($user, $pass, $db);
$sqlc = "SELECT CLAVE FROM USUARIOS_SOPORTE_SEG WHERE USUARIO = '$elusuario'";
$queryg = oci_parse($conex2, $sqlc);
oci_execute($queryg);
while (oci_fetch($queryg)) {
  $claveactual = oci_result($queryg, "CLAVE");
  $tipouser = oci_result($queryg, "CLAVE");
}
if ($v_clave1 <> $v_clave2) :

  echo "<script>";
  echo "AlertaCamposDiferentes()";
  echo "</script>";

elseif ($v_clave1 == 'AVANTEL' or $v_clave1 == 'avantel') :

  echo "<script>";
  echo "AlertaClaveAvantel()";
  echo "</script>";

elseif ($claveactual == $v_clave1) :
  $elusuario = $_SESSION['usuario'];
  // echo 'clave actual '.$claveactual .'JAJAJAJ';

  echo "<script>";
  echo "AlertaClaveIgual()";
  echo "</script>";

else :
  $elusuario = $_SESSION['usuario'];
  //  echo "usuario:".$elusuario;
  //   $usuarito = $_GET['user'];
  $sql = "UPDATE USUARIOS_SOPORTE_SEG SET CLAVE = '$v_clave1' WHERE USUARIO = '$elusuario'";
  $sqlc = "SELECT TIPO_USUARIO FROM USUARIOS_SOPORTE_SEG WHERE USUARIO = '$elusuario'";

  $queryf = oci_parse($conex2, $sql);
  $queryg = oci_parse($conex2, $sqlc);
  oci_execute($queryf);
  oci_execute($queryg);
  oci_commit($conex2);
  while (oci_fetch($queryg)) {
    $tipouser = oci_result($queryg, "TIPO_USUARIO");
  }
  
    if ($tipouser=='ADMIN'){
      
      echo "<script>";
      echo "IngresoAdmin()";
      echo "</script>";
    }else{
      echo "<script>";
      echo "IngresoUser()";
      echo "</script>";
    }


endif;
?>