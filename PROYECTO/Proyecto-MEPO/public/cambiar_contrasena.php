<?php
include("../bdd/regis2.php");

$token = $_GET['token'];

$sql = "SELECT * FROM usuario 
        WHERE token='$token' 
        AND token_expira > NOW()";

$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) == 1){
?>

<form action="guardar_nueva.php" method="POST">
    <input type="hidden" name="token" value="<?php echo $token; ?>">
    <input type="password" name="nueva_contrasena" placeholder="Nueva contraseña" required>
    <button type="submit">Guardar</button>
</form>

<?php
}else{
    echo "Token inválido o expirado";
}
?>
