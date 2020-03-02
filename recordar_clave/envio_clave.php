<?php  
    echo "entro a recordar pass ";

		try{
			if(isset($_POST['email']) && !empty($_POST['email'])){
                $pass = substr( md5(microtime()), 1, 10);
                $mail = $_POST['email'];
                
                //Conexion con la base
                include_once ("conexion.php");
                $conex2 = oci_connect($user, $pass, $db);
                //$conn = new mysqli("127.0.0.1", "UserBD", "PassBD", "NameBD");
                // Check connection
                if ($conex2->connect_error) {
                    die("Connection failed: " . $conex2->connect_error);
                } 
                
                $sql = "update usuarios_soporte_seg set clave = $pass where usuario in (select usuario from usuarios_soporte where correo_electronico = $mail)";
                OCIExecute($sql);
                OCICommit($conex2);    
                if ($conex2->query($sql) === TRUE) {
                    echo "usuario modificado correctamente ";
                } else {
                    echo "Error modificando: " . $conex2->error;
                }
                
                $to = $_POST['email'];//"destinatario@email.com";
                $from = "From: " . "Masterhouse" ;
                $subject = "Recordar contraseña";
                $message = "El sistema le asigno la siguiente clave " . $pass;

                mail($to, $subject, $message, $from);
                echo 'Correo enviado satisfactoriamente a ' . $_POST['email'];
            }
            else 
                echo 'Informacion incompleta';
		}
		catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}           
        ?>