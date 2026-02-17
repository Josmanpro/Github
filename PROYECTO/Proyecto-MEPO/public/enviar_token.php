<?php
include("../bdd/conexion.php");

$correo = $_POST['correo'];

$sql = "SELECT * FROM usuario WHERE correo='$correo'";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) == 1){

    $token = bin2hex(random_bytes(32));
    $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $update = "UPDATE usuario 
               SET token='$token', token_expira='$expira' 
               WHERE correo='$correo'";

    mysqli_query($conexion, $update);

    echo "Enlace generado:<br>";
    echo "<a href='cambiar_contrasena.php?token=$token'>Cambiar contraseña</a>";

}else{
    echo "Correo no registrado";
}
?>