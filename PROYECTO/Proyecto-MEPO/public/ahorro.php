<?php
session_start();
require("regis2.php"); // conexión a la base de datos

$usuario = null;

if (isset($_SESSION["ndocumento"])) {
    $ndocumento = $_SESSION["ndocumento"];

    // Consulta segura
    $stmt = mysqli_prepare($enlace, "SELECT * FROM usuario WHERE ndocumento = ?");
    mysqli_stmt_bind_param($stmt, "s", $ndocumento);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    $usuario = mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="visewport" content="width=device-width, initial-scale=1.0">
    <title>MEPO - Mercando con Propósito</title>
    <link rel="stylesheet" href="css/pagina.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <header class="main-header">
        <div class="container">
            <a href="index.php" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="comparar.php" class="button">Comparar</a>
                <a href="supermercados.php" class="button">Supermercados</a>
                <a href="ofertas.php" class="button">Ofertas</a>
            </nav>
            <?php if (!$usuario): ?>
                <a href="login.php" class="btn-login">Iniciar Sesión</a>
            <?php endif; ?>

            <?php if ($usuario): ?>
                <div class="perfil" id="perfilUsuario">

                    <img id="imgPerfil" src="imagenes/perfil/Perfil.jpg" class="foto-perfil">

                    <div id="panelPerfil" class="panel-perfil">

    <img src="imagenes/perfil/Perfil.jpg" class="avatar-panel">

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
            <?php endif; ?>

        </div>
        </div>
    </header>
    <main>
        <section class="hero">
            <div class="container">
                <h1>Escribe el monto de tu ahorro</h1>
                <p>¡Te ayudamos a completar tus metas y ideas en mente!</p>
                <div class="search-box">
                    <input type="text" placeholder="$0.000">
                    <button class="btn-search">Guardar ahorro</button>
                </div>
            </div>
        </section>
    </main>
    <script src="js/dom.js"></script>
</body>

</html>