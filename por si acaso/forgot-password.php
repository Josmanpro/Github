<?php require_once "conexion.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Recuperar contraseña</title>
</head>
<body>

<h2>Recuperar contraseña</h2>

<form method="POST" action="procesar-forgot.php">
    <input type="email" name="email" placeholder="Ingresa tu correo" required>
    <button type="submit">Enviar enlace</button>
</form>

</body>
</html>