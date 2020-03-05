<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through, dominio
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'soportetigestion@gmail.com';                    // SMTP username
    $mail->Password   = 'Avantel2020*';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       =  587;                                 // TCP port to connect to

    //Recipients
    $mail->setFrom('soportetigestion@gmail.com', 'Soporte');
    $mail->addAddress('soportetigestion@gmail.com');     // Add a recipient-- aca el destino


    // Content
    $mail->isHTML(true);                               // Set email format to HTML
    $mail->Subject = 'Correo muy importante!!';  //Asunto
    $mail->Body    = 'Hola correo de prueba';

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo 'Hubo un error al enviar el mensaje: ',$mail->ErrorInfo;
}
?>