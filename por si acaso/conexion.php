<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo"; // tu base de datos

$conexion = mysqli_connect($servidor, $usuario, $clave, $basededatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>