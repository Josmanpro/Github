<?php
include("../bdd/conexion.php");

$correo = $_POST['correo'];

$token = bin2hex(random_bytes(32));
$expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

$sql = "UPDATE usuario 
        SET token='$token', token_expira='$expira' 
        WHERE correo='$correo'";

mysqli_query($conexion, $sql);

echo "Enlace generado:<br>";
echo "<a href='cambiar_contrasena.php?token=$token'>Cambiar contraseña</a>";
?>