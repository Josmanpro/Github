<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo";

$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["docu"])){

    $ndocumento = $_POST["docu"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo_tel = $_POST["user"];
    $contrasena = sha1($_POST["contrasena"]);
    $rol_id = 2;

    $insertardatos = "INSERT INTO usuario 
    (ndocumento, nombre, apellido, correo_tel, contrasena, rol_id) 
    VALUES 
    ('$ndocumento','$nombre','$apellido','$correo_tel','$contrasena','$rol_id')";

    $ejecutarInsertar = mysqli_query($enlace,$insertardatos);

    if($ejecutarInsertar){
        // 🔥 Creamos el mensaje en sesión
        $_SESSION['mensaje_exito'] = "Usuario registrado correctamente";

        // 🔥 Redirigimos al login
        header("Location: login.php");
        exit();
    }else{
        echo "Error: " . mysqli_error($enlace);
    }
}
?>