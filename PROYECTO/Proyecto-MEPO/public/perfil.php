<?php
session_start();




if(!isset($_SESSION["ndocumento"])){
    header("Location: perfil.php");
    exit();
}

?>

<div id="panelPerfil" class="panel-perfil">
    
    <p><strong><?php echo $_SESSION["nombre"] ?? "Usuario"; ?></strong></p>
    <p><?php echo $_SESSION["ndocumento"] ?? ""; ?></p>
    
    <hr>

    <a href="perfil.php">Ver Perfil Completo</a>
    <a href="logout.php">Cerrar sesión</a>

</div>