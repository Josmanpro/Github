<?php
require_once "conexion.php";

if(!isset($_POST['correo'])){
    header("Location: login.php");
    exit();
}

$email = mysqli_real_escape_string($conexion, $_POST['correo']);

$consulta = mysqli_query($conexion,
"SELECT ndocumento FROM usuario WHERE correo='$email'");

if(mysqli_num_rows($consulta) > 0){

    $token = bin2hex(random_bytes(32));
    $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

    mysqli_query($conexion,
    "UPDATE usuario
     SET reset_token='$token',
         reset_expira='$expira'
     WHERE correo='$email'");

    $enlace = "http://localhost/Github/Proyecto-MEPO/public/php/reset-password.php?token=$token";

    echo "<h3>Simulación de envío de correo</h3>";
    echo "<p>Haz clic en el siguiente enlace:</p>";
    echo "<a href='$enlace'>$enlace</a>";

}else{
    echo "Si el correo existe, se enviará un enlace.";
}
?>