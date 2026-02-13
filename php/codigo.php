<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuraciones del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'danaperro15@gmail.com';  // Tu dirección de correo electrónico
    $mail->Password   = 'frvs agau rvls dazn';  // Tu contraseña de aplicación generada
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $comentarios = $_POST['comentarios'];

    // Remitente
    $mail->setFrom($email, $nombre);
    // Destinatario
    $mail->addAddress('danaperro15@gmail.com', 'Dana Perro');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Mail desde el formulario wwwapas';
    $mail->Body    = "
    <html>
    <head>
    <title>HTML</title>
    </head>
    <body>
    <h1>Información del formulario</h1>
    <p>Nombre: $nombre </p>
    <p>Email: $email </p>
    <p>Comentarios: $comentarios </p>
    </body>
    </html>";

    $mail->send();
    echo 'Gracias por comunicarse con nosotros';
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
}
?>
