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
include_once("conexion.php");
$conex2 = oci_connect($user, $pass, $db);
//$filas = json_decode($_POST['dia'], true);
//$filas = json_decode($_POST['especialista'], true);

      
     // $filas = json_decode($_POST['valores'], true);
      $v_dia = $_POST["dia"];
      $v_especialista = $_POST["especialista"];
      $v_fecha_cre ="SYSDATE";

    //  $long = count($v_especialista);
    
      
    //   $sql = "INSERT INTO COMPENSATORIOS SELECT USUARIO, '$v_especialista[$i]',$v_fecha_cre,'$v_fecha_cre' FROM USUARIOS_SOPORTE WHERE (NOMBRES||' '||APELLIDOS) = '$v_especialista[$i]'";
      $sql = "INSERT INTO COMPENSATORIOS SELECT USUARIO, '$v_especialista',$v_fecha_cre,'$v_dia' FROM USUARIOS_SOPORTE WHERE (NOMBRES||' '||APELLIDOS) = '$v_especialista'";
      $queryf = oci_parse($conex2, $sql);
      oci_execute($queryf);
      oci_commit($conex2);  
    
//    $sql = "INSERT INTO COMPENSATORIOS SELECT USUARIO, '$v_especialista',$v_fecha_cre,'$v_dia' FROM USUARIOS_SOPORTE WHERE (NOMBRES||' '||APELLIDOS) = '$v_especialista'";

/*
    $inserciones = 0;
    foreach ($filas as $fila) {
        $v_dia   = $fila['v_dia'];
        $v_especialista   = $fila['v_especialista'];
        $queryf = oci_parse($conex2, $sql);
        oci_execute($queryf);
        oci_commit($conex2);  
        if($queryf) {
            $inserciones++;
        }
    }
    
    echo "Se insertaron $inserciones registros";
*/

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
    
//}

?>