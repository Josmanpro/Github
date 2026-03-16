<?php
require_once("valini.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas del Día - Mepo</title>
    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/ofertas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="container">
        <a href="index.php" class="logo">Mepo</a>
        <nav class="main-nav">
            
            <a href="index.php" class="button">Inicio</a>
            <a href="comparar.php">Comparar</a>
            <a href="supermercados.php">Supermercados</a>
            <?php
                require_once("pvendedor.php");
            ?>
        </nav>
        <?php if (!$usuario): ?>
                <a href="login.php" class="btn-login">Iniciar Sesión</a>
            <?php endif; ?>

            <?php if ($usuario): ?>
                <div class="perfil" id="perfilUsuario">

                    <img id="imgPerfil" src="../imagenes/perfil/Perfil.jpg" class="foto-perfil">

<div id="panelPerfil" class="panel-perfil">

    <img src="../imagenes/perfil/Perfil.jpg" class="avatar-panel">

    <div class="nombre">
        <?php echo $usuario["nombre"]; ?>
    </div>

    <div class="info">
        <?php echo $usuario["correo_tel"]; ?>
    </div>

    <div class="info">
        Documento: <?php echo $usuario["ndocumento"]; ?>
    </div>

    <a href="logout.php" class="btn-logout">
        Cerrar sesión
    </a>

</div>
</div>
<?php endif;
 ?>
    </div>
</header>

<main class="container">
    <h1>Ofertas Imperdibles</h1>
    <p>Aprovecha las mejores ofertas y descuentos de hoy en los supermercados de Ibagué.</p>
    <div id="ofertas-grid" class="offers-grid">
    </div>
</main>
<footer class="main-footer">
        <div class="container">
            <p>&copy; 2026 - MEPO - Mercando con Propósito.</p>
            <div class="social-links">
                <a href="https://www.facebook.com/?locale=es_LA">Facebook</a>
                <a href="https://www.instagram.com/">Instagram</a>
            </div>
        </div>
    </footer>
<script src="../js/ofertas.js"></script>
<script src="../js/dom.js"></script>
</body>
</html>