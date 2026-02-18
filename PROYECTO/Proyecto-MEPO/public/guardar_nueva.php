<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo";

$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

if(isset($_GET['token'])){
    $token = $_GET['token'];
} else {
    die("Token inválido");
}

if(isset($_POST['nueva_pass'])){

    $nueva = sha1($_POST['nueva_pass']);

    $sql = "UPDATE usuario 
            SET contrasena='$nueva',
                token=NULL,
                token_expira=NULL
            WHERE token='$token'";

    mysqli_query($enlace, $sql);

    echo "Contraseña actualizada correctamente";
    exit();
}
?>

<form method="POST">
    <input type="password" name="nueva_pass" placeholder="Nueva contraseña" required>
    <button type="submit">Cambiar contraseña</button>
</form>
