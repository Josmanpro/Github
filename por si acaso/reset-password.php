<?php
require_once "conexion.php";

if(!isset($_GET['token'])){
    die("Token inválido");
}

$token = mysqli_real_escape_string($conexion, $_GET['token']);

$consulta = mysqli_query($conexion,
"SELECT ndocumento FROM usuario
 WHERE reset_token='$token'
 AND reset_expira > NOW()");

if(mysqli_num_rows($consulta) == 0){
    die("Token inválido o expirado");
}
?>

<h2>Nueva contraseña</h2>

<form method="POST">
    <input type="password" name="password" placeholder="Nueva contraseña" required>
    <button type="submit">Cambiar contraseña</button>
</form>

<?php
if(isset($_POST['password'])){

    $password = sha1($_POST['password']);

    mysqli_query($conexion,
    "UPDATE usuario
     SET contrasena='$password',
         reset_token=NULL,
         reset_expira=NULL
     WHERE reset_token='$token'");

    echo "<p>Contraseña actualizada correctamente.</p>";
}
?>