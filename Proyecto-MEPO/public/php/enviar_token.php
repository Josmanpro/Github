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

$mensaje = "";

if(isset($_POST['recoverEmail'])){

    $correo_tel = mysqli_real_escape_string($enlace, $_POST['recoverEmail']);

    if(!filter_var($correo_tel, FILTER_VALIDATE_EMAIL)){
        $mensaje = "Debe ingresar un correo válido";
    }else{

        $sql = "SELECT * FROM usuario WHERE correo_tel='$correo_tel'";
        $resultado = mysqli_query($enlace, $sql);

        if(mysqli_num_rows($resultado) > 0){

            do{
                $token = bin2hex(random_bytes(16));
                $check = mysqli_query($enlace, "SELECT token FROM usuario WHERE token='$token'");
            }while(mysqli_num_rows($check) > 0);

            $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

            $update = "UPDATE usuario 
                       SET token='$token', token_expira='$expira'
                       WHERE correo_tel='$correo_tel'";

            mysqli_query($enlace, $update);

            $enlace_recuperacion = "http://localhost/Github/Proyecto-MEPO/public/php/guardar_nueva.php?token=$token";

            $mail = new PHPMailer(true);

            try{

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'adminmepo@gmail.com';
                $mail->Password   = 'ykkj lxmi wsvh jelc';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom('adminmepo@gmail.com', 'MEPO');
                $mail->addAddress($correo_tel);

                $mail->isHTML(true);
                $mail->Subject = 'Recuperación de contraseña - MEPO';

                $mail->Body = "
                <h2>Recuperación de contraseña</h2>
                <p>Haz clic en el siguiente enlace:</p>
                <a href='$enlace_recuperacion'>$enlace_recuperacion</a>
                <p>Este enlace expirará en 1 hora.</p>
                ";

                $mail->send();

                $mensaje = "✔ Correo de recuperación enviado correctamente";

            }catch(Exception $e){

                $mensaje = "Error al enviar el correo";

            }

        }else{

            $mensaje = "El correo no existe en el sistema.";

        }

    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>

    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>

    <div class="login-page-wrapper">

        <div class="form-container">

            <div class="form-background">

                <h1>Recuperar contraseña</h1>

                    <?php if($mensaje != ""){ ?>
                    <p><?php echo $mensaje; ?></p>
                    <?php } ?>

                    <form action="https://mail.google.com/mail/" method="POST">
                            <button class="btn-login-form" type="submit">
                                Revisa tu Correo
                            </button>
                        </a>

                    </form>

            </div>
        </div>
    </div>

</body>
</html>