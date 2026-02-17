<?php
session_start();
<<<<<<< HEAD
=======



if(!isset($_SESSION["ndocumento"])){
    header("Location: perfil.php");
    exit();
}
>>>>>>> 7b64a0b88792f15037d3f217e34b2eb414cbdb09
?>

<div id="panelPerfil" class="panel-perfil">
    
    <p><strong><?php echo $_SESSION["nombre"] ?? "Usuario"; ?></strong></p>
    <p><?php echo $_SESSION["ndocumento"] ?? ""; ?></p>
    
    <hr>

    <a href="perfil.php">Ver Perfil Completo</a>
    <a href="logout.php">Cerrar sesión</a>

</div>