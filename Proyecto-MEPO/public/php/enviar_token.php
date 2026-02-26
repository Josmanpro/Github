<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo";

$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

if(isset($_POST['recoverEmail'])){

    $correo_tel = mysqli_real_escape_string($enlace, $_POST['recoverEmail']);

    $sql = "SELECT * FROM usuario WHERE correo_tel='$correo_tel'";
    $resultado = mysqli_query($enlace, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $token = bin2hex(random_bytes(16));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $update = "UPDATE usuario 
                   SET token='$token', token_expira='$expira'
                   WHERE correo_tel='$correo_tel'";

        mysqli_query($enlace, $update);

        // 🔥 Simulación de envío (como estás en local)
        echo "Enlace de recuperación:<br>";
        echo "<a href='guardar_nueva.php?token=$token'>
                Cambiar contraseña
              </a>";

    } else {
        echo "El correo no existe";
    }
}
?>