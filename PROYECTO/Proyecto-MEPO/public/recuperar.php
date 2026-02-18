<?php
require 'funcs/login.php';
require 'funcs/regis2.php';

    $errors = array();

    if(!empty($_POST))
        {
            $correo_tel = $mysqli->real_escape_string($_POST['recoverEmail']);

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
    <input type="email" name="correo" placeholder="Ingresa tu correo" required>
    <button type="submit">Recuperar contraseña</button>
</form>

</body>
</html>
