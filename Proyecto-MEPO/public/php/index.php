<?php
require_once("valini.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEPO - Mercando con Propósito</title>
    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/perfil.css">
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
        </div>
    </header>
    <main>
        <section class="hero">
            <div class="container">         
                <h1>Ahorra en cada compra. Compara precios de supermercados en Ibagué.</h1>
                <p>Encuentra los mejores precios de Éxito, D1, SurtiPlaza y más, ¡en un solo lugar!</p>
                <input type="text" id="buscadorIndex" placeholder="Buscar producto...">
                <button onclick="buscarProducto()">Buscar</button>
                <div id="resultados"></div>
            </div>
        </section>

        <section class="how-it-works">
            <div class="container">
                <h2>¿Cómo funciona?</h2>
                <div class="steps">
                    <div class="step">
                        <div class="icon">🔍</div>
                        <h3>1. Busca</h3>
                        <p>Escribe el producto de tu interes.</p>
                    </div>
                    <div class="step">
                        <div class="icon">⚖️</div>
                        <h3>2. Compara</h3>
                        <p>Revisa los precios en todos los supermercados.</p>
                    </div>
                    <div class="step">
                        <div class="icon">💰</div>
                        <h3>3. Ahorra</h3>
                        <p>Elige la mejor opción y optimiza tu dinero.</p>
                    </div>
                </div>
                <div class="boton-ahorra">
<?php
if (!isset($_SESSION["ndocumento"])) {
    $destino = "login.php";
} else {
    $ndocumento = $_SESSION["ndocumento"];
    $consulta = mysqli_query(
    $enlace,
    "SELECT * FROM ahorro WHERE ndocumento='$ndocumento' AND meta > 0"
    );
    if(mysqli_num_rows($consulta) > 0){
        $destino = "panel_meta.php";
    }else{
        $destino = "ahorro.php";
    }
}
?>
                    <a href="<?php echo $destino; ?>" class="btn-ahorro">
                        Empieza tu ahorro ahora
                    </a>
                </div>
            </div>
        </section>
        <section class="stores">
            <div class="container">
                <h2>Comparamos en los mejores supermercados de Ibagué</h2>
                <div class="logos-grid">
                    <img src="../imagenes/tiendas/exito.png" alt="Logo Éxito">
                    <img src="../imagenes/tiendas/d1.png" alt="Logo D1">
                    <img src="../imagenes/tiendas/surti.png" alt="Logo Surtiplaza">
                    <img src="../imagenes/tiendas/merca.png" alt="Logo Mercacentro">
                    <img src="../imagenes/tiendas/olimpica.png" alt="Logo Olimpica">
                    <img src="../imagenes/tiendas/ara.png" alt="Logo Ara">
                </div>
            </div>
        </section>
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
    <script src="../js/ajax.js"></script>
    <script src="../js/dom.js"  ></script>
</body>

</html>