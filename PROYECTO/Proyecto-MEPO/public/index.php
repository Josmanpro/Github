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
            <a href="index.html" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="comparar.html" class="button">Comparar</a>
                <a href="supermercados.html" class="button">Supermercados</a>
                <a href="ofertas.html" class="button">Ofertas</a>
                <a href="usuarios.html" class="button">Tabla-Usuarios</a>
            </nav>
            <a href="login.php" class="btn-login">Iniciar Sesión</a>

            <div class="perfil oculto" id="perfilUsuario">


                <img id="imgPerfil" src="imagenes/perfil/Perfil.jpg" class="foto-perfil">

                <div id="panelPerfil" class="panel-perfil">
                    <p id="nombreUsuario"></p>
                    <hr>
                    <button onclick="miModal()">Ver Perfil</button>
                    <button onclick="cerrarSesion()" class="btn-logout">Salir</button>
                </div>

            </div>
        </div>
    </header>
    <main>
        <section class="hero">
            <div class="container">
                <h1>Ahorra en cada compra. Compara precios de supermercados en Ibagué.</h1>
                <p>Encuentra los mejores precios de Éxito, D1, SurtiPlaza y más, ¡en un solo lugar!</p>
                <div class="search-box">
                    <input type="text" placeholder="¿Qué estás buscando? Ej: Arroz, Leche, Jabón...">
                    <button class="btn-search">Buscar</button>
                </div>
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
                        if (isset($_SESSION["id"]));
                    ?>
                    <a href="ahorro.php">
                        <button>
                            Empieza tu ahorro ahora!
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <section class="stores">
            <div class="container">
                <h2>Comparamos en los mejores supermercados de Ibagué</h2>
                <div class="logos-grid">
                    <img src="imagenes/exito.png" alt="Logo Éxito">
                    <img src="imagenes/d1.png" alt="Logo D1">
                    <img src="imagenes/surti.png" alt="Logo Surtiplaza">
                    <img src="imagenes/merca.png" alt="Logo Mercacentro">
                    <img src="imagenes/olimpica.png" alt="Logo Olimpica">
                    <img src="imagenes/ara.png" alt="Logo Ara">
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2025 - MEPO - Mercando con Propósito.</p>
            <div class="social-links">
                <a href="https://www.facebook.com/?locale=es_LA">Facebook</a>
                <a href="https://www.instagram.com/">Instagram</a>
            </div>
        </div>
    </footer>

    <script src="js/dom.js"></script>
</body>

</html>