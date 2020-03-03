<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Soporte IT - Recordar Clave</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">¿Olvido su contraseña?</h1>
                    <p class="mb-4">Por favor ingrese el correo electronico registrado...su contraseña llegara a su correo!</p>
                  </div>
                  <form class="user" action="recordar_clave.php" method="POST">
                  <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" placeholder="Ingrese su correo..."/>
                   </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Recordar contraseña"/>
                  
                  </form>
                  <hr>
                  <!--
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>-->
                  <div class="text-center">
                    <a class="small" href="login.php">¿Ya recuerda su clave? Ingresar!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php  
		try{
			if(isset($_POST['email']) && !empty($_POST['email'])){
                $passw = substr( md5(microtime()), 1, 10);
                $mail = $_POST['email'];

                //Conexion con la base
                include_once ("conexion.php");
                $conex2 = oci_connect($user, $pass, $db);
                //$conn = new mysqli("127.0.0.1", "UserBD", "PassBD", "NameBD");
                // Check connection
                if ($conex2->connect_error) {
                    die("Connection failed: " . $conex2->connect_error);
                } 

                //$sql = "Update usuarios_soporte_seg set clave = '$var3'";
                $sql = "Update usuarios_soporte_seg set clave = '$passw' where usuario in (select usuario from usuarios_soporte where correo_electronico = '$mail')";

                $query= oci_parse($conex2,$sql);
                oci_execute($query);
                oci_commit($conex2);   
                
                /*
                if ($conex2->oci_execute($sql) == TRUE) {
                    echo "usuario modificado correctamente ";
                } else {
                    echo "Error modificando: " . $conex2->error;
                }*/
                $to = $_POST['email'];//"destinatario@email.com";
                //$from = "From: " . "Masterhouse" ;
                $from = "soportetigestion@gmail.com" ;
                $subject = "Recordar contraseña";
                $message = "El sistema le asigno la siguiente clave " . $passw;

                mail($to, $subject, $message, $from);
                echo 'Correo enviado satisfactoriamente a ' . $_POST['email'];

               
                OCICommit($conex2);

                date_default_timezone_set('Etc/UTC');
                require '../PHPMailerAutoload.php';
                //Create a new PHPMailer instance
                $mail = new PHPMailer;
                //Tell PHPMailer to use SMTP
                $mail->isSMTP();
                //Enable SMTP debugging
                // 0 = off (for production use)
                // 1 = client messages
                // 2 = client and server messages
                $mail->SMTPDebug = 2;
                //Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';
                //Set the hostname of the mail server
                $mail->Host = 'smtp.gmail.com';
                // use
                // $mail->Host = gethostbyname('smtp.gmail.com');
                // if your network does not support SMTP over IPv6
                //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = 587;
                //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';
                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
                //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username = "soportetigestion@gmail.com";
                //Password to use for SMTP authentication
                $mail->Password = "Avantel2020*";
                //Set who the message is to be sent from
                $mail->setFrom('soportetigestion@gmail.com', 'Brayan Baron');
                //Set who the message is to be sent to
                $mail->addAddress($_POST['email'], 'Brayan Baron Amaya');
                //Set the subject line
                $mail->Subject = 'PHPMailer GMail SMTP test';
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body
                $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
                //Replace the plain text body with one created manually
                $mail->AltBody = 'This is a plain-text message body';
                //Attach an image file
               // $mail->addAttachment('images/phpmailer_mini.png');
                //send the message, check for errors
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    echo "Message sent!";
                }

    
            }
            else 
                echo 'Informacion incompleta';
		}
		catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}           
        ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


</body>

</html>
