<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <link rel="icon" href="./img/favicon2.ico">
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
  <link href="tabla_dinamica/estilos_tab/botones_estilos.css" rel="stylesheet">

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
                      <input type="email" name="email" class="form-control form-control-user" placeholder="Ingrese su correo..." />
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Recordar contraseña" />

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
  echo '<link href="botones_estilos.css" type="text/css" rel="stylesheet">';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
//require 'PHPMailer/PHPMailerAutoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();
  try {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
      //Conexion con la base
      include_once("conexion.php");
      $conex2 = oci_connect($user, $pass, $db);
      // $varexi=0;
      $varcorr = $_POST['email'];
      $sql = "SELECT * FROM USUARIOS_SOPORTE WHERE CORREO_ELECTRONICO = '$varcorr'";
      //  echo 'resultadooooo '.$varexi;
      $consulta = oci_parse($conex2, $sql);
      oci_execute($consulta);
      oci_commit($conex2);

      if ($row = oci_fetch_array($consulta)) {


        $passw = substr(md5(microtime()), 1, 10);
        $maile = $_POST['email'];

        //Conexion con la base
        include_once("conexion.php");
        $conex2 = oci_connect($user, $pass, $db);

        //aca actualiza la clave en la tabla de seguridad
        $sql = "Update usuarios_soporte_seg set clave = '$passw', estado='P' 
                      where usuario in (select usuario from usuarios_soporte where correo_electronico = '$maile')";

        $query = oci_parse($conex2, $sql);
        oci_execute($query);
        oci_commit($conex2);

            //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.office365.com';                     // Set the SMTP server to send through, dominio
        $mail->SMTPAuth   =  true;                                   // Enable SMTP authentication
        $mail->Username   = 'brayan.baron@hotmail.com';                    // SMTP username
        $mail->Password   = 'pitufo9405';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       =  587;                                 // TCP port to connect to

        //Recipients
        $mail->setFrom('brayan.baron@hotmail.com', 'Gestor Soporte TI');
        $mail->addAddress($_POST['email']);     // Add a recipient-- aca el destino


        // Content
        //$mail->isHTML(true);                               // Set email format to HTML
        $mail->Subject = 'Correo de recuperacion de clave - Avantel soporte IT';  //Asunto
        $mail->Body    =  "El sistema le asigno la siguiente clave " . $passw;

        $mail->send();
        echo "<p class='avisoclave'style='color:#EEDAD5' align='center'>Correo enviado satisfactoriamente a $maile </p>";

       // OCICommit($conex2);
      } else {

        echo "<p class='avisoclave'style='color:#EEDAD5' align='center'>Correo indicado no esta registrado en el sistema</p>";
      }
    } else
      echo "<p class='avisoclave'style='color:#EEDAD5' align='center'>Indique el correo, debe estar registrado en el sistema</p>";
  } catch (Exception $e) {

    echo "<p class='avisoclave'style='color:#EEDAD5' align='center'>Hubo un error al enviar el mensaje: </p>", $mail->ErrorInfo;
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