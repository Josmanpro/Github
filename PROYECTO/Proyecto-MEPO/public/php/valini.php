<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require("regis2.php"); // conexión a la base de datos

$usuario = null;

if (isset($_SESSION["ndocumento"])) {
    $ndocumento = $_SESSION["ndocumento"];

    // Consulta segura
    $stmt = mysqli_prepare($enlace, "SELECT * FROM usuario WHERE ndocumento = ?");
    mysqli_stmt_bind_param($stmt, "s", $ndocumento);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    $usuario = mysqli_fetch_assoc($resultado);
}
?>