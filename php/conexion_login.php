<?php
include_once('conexion.php');
$mensajeOk=false;
$mensajeError='El sistema no se encuentra disponible';
if (isset($_POST['usuario'],$_POST['contrasena'])):
	if ($_POST['usuario']!=""):
		if ($_POST['contrasena']!=""):
			$usuario=$_POST['usuario'];
			$contrasena=$_POST['contrasena'];
			$consulta=pg_query($conexion,("select * from credenciales where usuario='$usuario' and contrasena='$contrasena'"));
			if (pg_num_rows($consulta)>0):
					$mensajeOk=true;
					$usua=pg_fetch_array($consulta);
					session_start();
					$_SESSION['id_usuario']=$usua[0];
					$_SESSION['usuario']=$usua[1];
					$mensajeError='Logueado correctamente ok.';
				else:
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



