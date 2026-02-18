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
            <a href="login.php" class="btn-login">Iniciar Sesión</a>

            <div class="perfil oculto" id="perfilUsuario">


                <img id="imgPerfil" src="imagenes/perfil/Perfil.jpg" class="foto-perfil">

                <div id="panelPerfil" class="panel-perfil">
                    <p id="nombreUsuario"></p>
                    <hr>
                    <button id="oli" class="oli">Ver Perfil</button>
                    <button onclick="cerrarSesion()" class="btn-logout">Salir</button>
                </div>

            </div>
        </div>
    </header>
    <main>
        <section class="hero">
            <div class="container">
                <h1>Escribe el monto de tu ahorro.</h1>
                <p>Encuentra los mejores precios de Éxito, D1, SurtiPlaza y más, ¡en un solo lugar!</p>
                <div class="search-box">
                    <input type="text" placeholder="¿Qué estás buscando? Ej: Arroz, Leche, Jabón...">
                    <button class="btn-search">Buscar</button>
                </div>
            </div>
        </section>