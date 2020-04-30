<script language= "javascript" type="text/javascript">
function AlertaCamposDiferentes(){  
    alert('No coinciden los campos verificar de nuevo...!');
    window.location='Nuevo_usuario.php';
}
function AlertaCambioClaveAdmin(){
    alert('Ok a realizado el cambio de su clave ...!');
    window.location = '/AvantelSoporte_Admin/index.php';
}
function AlertaCambioClaveUser(){
    alert('Ok a realizado el cambio de su clave ...!');
    window.location = '/AvantelSoporte_Users/index.php';
}
function AlertaClaveAvantel(){
    alert('Su clave no puede ser AVANTEL ingresar una nueva...!');
    window.location='Nuevo_usuario.php';
}
function AlertaNoCambio(){
    alert('no hay usuario!');
    window.location='Nuevo_usuario.php';
}
</script>
<?php
@session_start();
include_once ("conexion.php");
$conex2 = oci_connect($user, $pass, $db);

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

    //  elseif ($_SESSION['usuario']):
    else:
      $elusuario = $_SESSION['usuario'];
      //  echo "usuario:".$elusuario;
     //   $usuarito = $_GET['user'];
        $sql ="UPDATE USUARIOS_SOPORTE_SEG SET CLAVE = '$v_clave1' WHERE USUARIO = '$elusuario'";
        $sql2= "select TIPO_USUARIO from usuarios_soporte_seg  WHERE USUARIO = '$elusuario'";

        $queryf= oci_parse($conex2, $sql);
        $queryg= oci_parse($conex2, $sql2);
        oci_execute($queryf);
        oci_execute($queryg);
        oci_commit($conex2);

        while (oci_fetch($queryg)) {
          $tipouser = oci_result($queryg, "TIPO_USUARIO");
        } 

        if ($tipouser == 'ADMIN') :

            echo "<script>";
            echo "AlertaCambioClaveAdmin()";
            echo "</script>"; 
        else:
              echo "<script>";
              echo "AlertaCambioClaveUser()";
              echo "</script>"; 
            
        endif;
         

  endif;
?>