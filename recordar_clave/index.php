<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="index.php" method="POST">
            <input type="text" name="email" value="" placeholder="email" /> <br/>
            <input type="submit" value="Recordar contraseña" />
        </form>
        
        <?php
        
		try{
			if(isset($_POST['email']) && !empty($_POST['email'])){
                $pass = substr( md5(microtime()), 1, 10);
                $mail = $_POST['email'];
                
                //Conexion con la base
                $conn = new mysqli("127.0.0.1", "UserBD", "PassBD", "NameBD");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql = "Update tbl_mh_usuario Set password='$pass' Where correo='$mail'";

                if ($conn->query($sql) === TRUE) {
                    echo "usuario modificado correctamente ";
                } else {
                    echo "Error modificando: " . $conn->error;
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
    </body>
</html>