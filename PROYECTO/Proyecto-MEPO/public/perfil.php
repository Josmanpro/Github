<?php

session_start();



if(!isset($_SESSION["ndocumento"])){
    header("Location: perfil.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel</title>
</head>
<body>

    
<div id="panelPerfil" class="panel">
    <h1>Bienvenido <?php echo $_SESSION["nombre"]; ?></h1>

    <p>Identificacion: <?php echo $_SESSION["ndocumento"]; ?></p>

    <br>

    <a href="logout.php">Cerrar sesion</a>
</div>
<script src="js/perfil.js"></script>
</body>
</html>
