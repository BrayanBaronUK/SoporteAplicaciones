<?php
include_once ("conexion.php");
$conex2 = oci_connect($user, $pass, $db);
if (!$conex2) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$mensajeOk=false;
$mensajeError='El sistema no se encuentra disponible';
if (isset($_POST['user'],$_POST['pass'])):
	if ($_POST['user']!=""):
		if ($_POST['pass']!=""):
          //  $var1 = $_POST['user'];
          //  $var2 = $_POST['pass'];
           // $var1 = $_POST["user"];
           // $var2 = $_POST["pass"];
           // $con1="LILIA";
          //  $con2="AVANTEL";
            // $con3="B";
            $consulta = "SELECT * FROM usuarios_soporte_seg";
            $query= oci_parse($conex2, $consulta);
           //$query= oci_parse($conex2, "insert into usuarios_soporte_seg values ('$var1','$var2','$con3')") or die('Cannot parse query oci');
           // $query= oci_parse($conex2, ("select * from USUARIOS_SOPORTE_SEG where usuario='$var1' and clave='$var2'")) or die('Cannot parse query oci');
           // OCIExecute($query);
           // OCICommit($conex2);
           // OCILogoff($conex2);
            $var3 = oci_num_rows($query);
            echo ("filaaaaaaaaas: $var3");
            if (oci_num_rows($query)>0):
                    echo "entro al if";
					$mensajeOk=true;
					$usua=oci_fetch_array($query);
					session_start();
					$_SESSION['usuario']=$usua[0];
					$_SESSION['clave']=$usua[1];
                    $mensajeError='Logueado correctamente ok.';
                else:
                echo "error al if";
				$mensajeError='Usuario o contraseña incorrecta.';	
				endif;
			else:
				$mensajeError='Contraseña incorrecta.';
			endif;
		else:
			$mensajeError='Usuario no existe ok.';
	endif;
else:
	$mensajeError='Todos los datos son requeridos.';
endif; 
$salidaJson=array('respuesta' => $mensajeOk, 'mensaje' => $mensajeError);
echo json_encode($salidaJson);
?>