<?php
require 'funcs/login.php';
require 'funcs/conexion.php';

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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar contraseña</title>
</head>
<body>

<h2>Recuperar contraseña</h2>

<p id="msg"></p>

<form id="recoverForm" method="POST">
    <label>Correo:</label>
    <input type="email" id="recoverEmail" required>

    <button type="submit">Enviar enlace</button>
</form>

<script type="module" src="js/recuperar.js"></script>
</body>
</html>