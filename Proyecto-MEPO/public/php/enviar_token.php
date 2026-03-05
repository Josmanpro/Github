<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo";

$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

if(isset($_POST['recoverEmail'])){

    $correo_tel = mysqli_real_escape_string($enlace, $_POST['recoverEmail']);

    $sql = "SELECT * FROM usuario WHERE correo_tel='$correo_tel'";
    $resultado = mysqli_query($enlace, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $token = bin2hex(random_bytes(16));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $update = "UPDATE usuario 
                   SET token='$token', token_expira='$expira'
                   WHERE correo_tel='$correo_tel'";

        mysqli_query($enlace, $update);

        $enlace_recuperacion = "http://localhost/Proyecto-MEPO/public/php/guardar_nueva.php?token=$token";

        $mail = new PHPMailer(true);

        try {

            // CONFIGURACIÓN SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'josephalfonsoforero@gmail.com';
            $mail->Password   = 'yiwv hpvc sdnv bcqx';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // REMITENTE Y DESTINO
            $mail->setFrom('josephalfonsoforero@gmail.com', 'MEPO');
            $mail->addAddress($correo_tel);

            // CONTENIDO
            $mail->isHTML(true);
            $mail->Subject = 'Recuperacion de contraseña - MEPO';
            $mail->Body    = "
                <h3>Recuperacion de contraseña</h3>
                <p>Haz clic en el siguiente enlace:</p>
                <a href='$enlace_recuperacion'>$enlace_recuperacion</a>
                <p>Este enlace expira en 1 hora.</p>
            ";

            $mail->send();
            echo "Se ha enviado el correo correctamente.";

        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }

    } else {
        echo "El correo no existe";
    }
}
?>