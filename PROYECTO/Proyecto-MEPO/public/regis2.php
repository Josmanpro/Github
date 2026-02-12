<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo";


$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

if(isset($_POST["boton"])){

$ndocumento = $_POST["docu"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo_tel = $_POST["user"];
$contrasena = $_POST["contrasena"];
}