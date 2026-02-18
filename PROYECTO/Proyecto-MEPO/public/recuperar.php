<?php
require 'login.php';
require 'regis2.php';

    $errors = array();

    if(!empty($_POST))
        {
            $correo_tel = mysqli_real_escape_string($enlace, $_POST['recoverEmail']);

            if(!isEmail($correo_tel))
                {
                    $errors[] = "Debe ingresar un correo electronico valido";
                }
        }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Recuperar contraseña</title>
</head>
<body>

<form action="enviar_token.php" method="POST">
    <input type="email" name="recoverEmail" placeholder="Ingresa tu correo" required>
    <button type="submit">Recuperar contraseña</button>
</form>

</body>
</html>
