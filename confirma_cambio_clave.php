<script language= "javascript" type="text/javascript">
function AlertaCamposDiferentes(){  
    alert('No coinciden los campos verificar de nuevo...!');
    window.location='Nueva_clave.php';
}
function AlertaCambioClave(){
    alert('Ok a realizado el cambio de su clave ...!');
    window.location='index.php';
}
function AlertaClaveAvantel(){
    alert('Su clave no puede ser AVANTEL ingresar una nueva...!');
    window.location='Nueva_clave.php';
}
function AlertaNoCambio(){
    alert('no hay usuario!');
    window.location='Nueva_clave.php';
}
function AlertaClaveIgual() {
    alert('su clave no debe ser la misma que la actual...!');
    window.location = 'Nueva_clave.php';
  }
</script>
<?php
@session_start();
include_once ("conexion.php");
$elusuario = $_SESSION['usuario'];

$conex2 = oci_connect($user, $pass, $db);
$sqlc = "SELECT CLAVE FROM USUARIOS_SOPORTE_SEG WHERE USUARIO = '$elusuario'";
$queryg = oci_parse($conex2, $sqlc);
oci_execute($queryg);
while (oci_fetch($queryg)) {
  $claveactual = oci_result($queryg, "CLAVE");
}

  $v_clave1=$_POST["clave1"];
  $v_clave2=$_POST["clave2"];

  if ($v_clave1 <> $v_clave2):

    echo "<script>";
    echo "AlertaCamposDiferentes()";
    echo "</script>";

  elseif($v_clave1=='AVANTEL' or $v_clave1=='avantel'):

          echo "<script>";
          echo "AlertaClaveAvantel()";
          echo "</script>";

          elseif ($claveactual == $v_clave1) :
            $elusuario = $_SESSION['usuario'];
            // echo 'clave actual '.$claveactual .'JAJAJAJ';
          
            echo "<script>";
            echo "AlertaClaveIgual()";
            echo "</script>";
    else:
      $elusuario = $_SESSION['usuario'];
      //  echo "usuario:".$elusuario;
     //   $usuarito = $_GET['user'];
        $sql ="UPDATE USUARIOS_SOPORTE_SEG SET CLAVE = '$v_clave1' , ESTADO = 'A' WHERE USUARIO = '$elusuario'";

        $queryf= oci_parse($conex2, $sql);
        oci_execute($queryf);
        oci_commit($conex2);
        echo "<script>";
        echo "AlertaCambioClave()";
        echo "</script>";

  endif;
?>