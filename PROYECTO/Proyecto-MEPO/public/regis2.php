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
$contrasena = sha1($_POST["contrasena"]);
$rol_id = 2;



$insertardatos= "INSERT INTO usuario (ndocumento, nombre, apellido, correo_tel, contrasena, rol_id)   VALUES ('$ndocumento','$nombre','$apellido','$correo_tel','$contrasena','$rol_id')";

$ejecutarInsertar = mysqli_query($enlace,$insertardatos);

if($ejecutarInsertar){
    echo"Datos almacenados correctamente";
}else{
    echo "error".mysqli_error($enlace);;
}


}
?>
