<?php
include("../bdd/conexion.php");

$token = $_POST['token'];
$nueva = sha1($_POST['nueva_contrasena']);

$sql = "UPDATE usuario 
        SET contrasena='$nueva',
            token=NULL,
            token_expira=NULL
        WHERE token='$token'";

mysqli_query($conexion, $sql);

echo "Contraseña actualizada correctamente.";
?>