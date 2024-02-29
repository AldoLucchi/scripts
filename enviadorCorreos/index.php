<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Obtener la ruta absoluta del directorio actual
$dir = __DIR__;

// Incluir las clases de PHPMailer con rutas absolutas
require $dir . '/PHPMailer/Exception.php';
require $dir . '/PHPMailer/PHPMailer.php';
require $dir . '/PHPMailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // SECCION DE ENTORNO LOCAL
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
        );
    //Server settings
    // $mail->SMTPDebug = 0;                                       // DEBUGGER, CAMBIAR A "0" CUANDO SE PASE A PRODUCCION //Enable verbose debug output
    $mail->isSMTP();                                            // NO TOCAR //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                // SERVIDOR DE CORREO //Set the SMTP server to send through 
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'correotestbaltazarcepeda@gmail.com';                    // CORREO REMITENTE //SMTP username 
    $mail->Password   = 'dxgilkzmivzdrhya';                       // CLAVE DEL CORREO REMITENTE //SMTP password 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;               // SEGURIDAD, CAMBIAR VARIABLE A SSL EN CASO DE CONFIRMACION, TLS EN CASO DE NO POSEERLO //Enable implicit TLS encryption
    $mail->Port       = 465;                                    // COLOCAR  NUMERO DE PUERTO //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` 

    //Recipients
    $mail->setFrom('correotestbaltazarcepeda@gmail.com', 'Test Aldo');           // CORREO Y NOMBRE DEL REMITENTE - CAMBIAR AL CORREO DE EMPRESA y NOMBRE
    $mail->addAddress('baltazarcepeda@gmail.com');             // AGREGAR EN ESTE PARAMETRO QUIENES RECIBEN EL CORREO 
    $mail->addAddress('baltazar.cepeda@pdgsa.com');          // AGREGAR EN ESTE PARAMETRO QUIENES RECIBEN EL CORREO O COMENTAR
    // $mail->addAddress('contacto@terracreativa.net');            // AGREGAR EN ESTE PARAMETRO QUIENES RECIBEN EL CORREO O COMENTAR

    //ADJUNTAR ARCHIVOS PARA ENVIAR ACA
     $mail->addAttachment('img-test.jpg');                    //RUTA DE RECEPCION DE ARCHIVOS ADJUNTOS
    //  $mail->addAttachment('/tmp/image.jpg');                    //RUTA DE RECEPCION DE ARCHIVOS ADJUNTOS, Opcional

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto test';                       // ASUNTO
    $mail->Body    = 'ESTO ES UN TEST';                   // CUERPO DEL MENSAJE
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensaje enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}