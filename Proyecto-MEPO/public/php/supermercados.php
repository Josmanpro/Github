<?php
require_once("valini.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Supermercados Aliados - Mepo</title>
    <!-- Enlazamos al archivo CSS -->
     <link rel="stylesheet" href="../css/pagina.css">
     <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/supermercados.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){

                $("#mapexito").click(function(){
                    $("#exito").slideToggle(600);
                });
                $("#mapd").click(function(){
                    $("#done").slideToggle(600);
                });
                $("#mapsurti").click(function(){
                    $("#surtiplaza").slideToggle(600);
                });
                $("#mapara").click(function(){
                    $("#ara").slideToggle(600);
                });
                $("#mapmerca").click(function(){
                    $("#mercacentro").slideToggle(600);
                });
                $("#mapolim").click(function(){
                    $("#olimpica").slideToggle(600);
                });
            });
        </script>
</head>
<body>

<header class="main-header">
    <div class="container">
        <a href="index.php" class="logo">Mepo</a>
        <nav class="main-nav">
            <a href="index.php">Inicio</a>
            <a href="comparar.php">Comparar</a>
            <a href="ofertas.php">Ofertas</a>
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
    <h1>Nuestros Supermercados Aliados</h1>

    <div id="supermercados-grid" class="superrkets-grid"></div>
</main>
<div class="supermarkets-grid"> 
<!-- SUPERMERCADO 1 --> 
    <div class="supermarket-card"> 
        <div class="card-logo-container"> 
        <img src="../imagenes/tiendas/exito.png" alt="Éxito" class="card-logo">
        </div> 
        <div class="card-info"> 
            <h3>Éxito</h3> 
            <div class="card-detail"> 
                <span class="icon">🏬</span> 
                <p>Tu tienda, tu vida. Siempre con los mejores precios.</p> 
            </div> 
            <div class="card-detail"> 
                <span class="icon">📍</span> 
                <p>Cra. 24 # 40-53, Ibagué, Tolima</p> 
            </div> 
            <div class="card-detail">
                <span class="icon">⏰</span> 
                <p>Lunes a Sábado: 8:00 AM - 9:00 PM<br> Domingo y Festivos: 9:00 AM - 8:00 PM</p>
            </div> 
        </div> 
        <div id="mapexito" class="card-actions">
            <a href="https://www.exito.com" class="btn btn-primary" target="_blank">Página Web</a> 
            <!-- Botón que abre el mapa --> 
            <button id="mapexito" class="btn btn-secondary">Ver Mapa</button>
        </div> 
        <div id="exito" class="mapo" style="display: none;">
             <iframe 
            src="https://www.google.com/maps/d/embed?mid=1619EnBY76AoqEjHCA7W0rOiq9kf10So&ehbc=2E312F" 
            width="100%" 
            height="300">

            </iframe>
      
        </div>
    </div> 

    <div class="supermarket-card"> 
        <div class="card-logo-container"> 
            <img src="../imagenes/tiendas/d1.png" alt="D1" class="card-logo"> 
        </div> 
        <div class="card-info">
            <h3>D1</h3> 
            <div class="card-detail">
                <span class="icon">🏬</span> 
                <p>Los precios más bajos, siempre.</p> 
            </div> 
            <div class="card-detail">
                <span class="icon">📍</span> 
                <p>Calle 50 # 4-45, Ibagué, Tolima</p>
            </div>
            <div class="card-detail">
                <span class="icon">⏰</span>
                <p> Lunes a Sábado: 8:00 AM - 8:00 PM<br> Domingo: 9:00 AM - 6:00 PM </p> 
            </div> 
        </div> 
        <div class="card-actions"> 
            <a href="https://www.d1.com.co" class="btn btn-primary" target="_blank">Página Web</a>
            <button id="mapd" class="btn btn-secondary" target="_blank">Ver Mapa</button> 
        </div>
        <div id="done" style="display: none;">
            <iframe src="https://www.google.com/maps/d/embed?mid=1yBAaI1scyIsjUEqRSXGL7hXZQbKQJF4&ehbc=2E312F" 
                width="100%" 
           height="300">
            </iframe>
        </div> 
    </div>

    <div class="supermarket-card"> 
        <div class="card-logo-container"> 
            <img src="../imagenes/tiendas/surti.png" alt="Surtiplaza" class="card-logo"> 
        </div> 
        <div class="card-info">
            <h3>Surtiplaza</h3> 
            <div class="card-detail"> 
                <span class="icon">🏬</span> 
                <p>La plaza de tu hogar.</p> 
            </div> 
            <div class="card-detail"> 
                <span class="icon">📍</span>
                <p>Cra. 3 # 5-70, Ibagué, Tolima</p> 
            </div> 
            <div class="card-detail"> 
                <span class="icon">⏰</span> 
                <p> Lunes a Sábado: 8:00 AM - 8:00 PM<br> Domingo: 9:00 AM - 1:00 PM </p>
            </div> 
        </div> 
        <div class="card-actions"> 
            <a href="https://www.surtiplaza.co/" class="btn btn-primary" target="_blank">Página Web</a> 
            <button id="mapsurti" class="btn btn-secondary">Ver Mapa</button> 
        </div> 
    
    <div id="surtiplaza" style="display: none;"> 
        <iframe src="https://www.google.com/maps/d/embed?mid=10kORHmVVkuUkfLfEw1sSUD9ePe8Sggk&ehbc=2E312F" 
            width="100%" 
            height="300">
        </iframe>
        </div> 
    </div>

    <div class="supermarket-card"> 
        <div class="card-logo-container"> 
            <img src="../imagenes/tiendas/ara.png" alt="Ara" class="card-logo"> 
        </div> 
        <div class="card-info">
            <h3>Ara</h3> 
            <div class="card-detail">
                <span class="icon">🏬</span> 
                <p>Alegria al mejor precio.</p> 
            </div> 
            <div class="card-detail">
                <span class="icon">📍</span> 
                <p> Avenida Guabinal Mz 1 CL 53 y CR 9B, Ibagué, Tolima</p>
            </div>
            <div class="card-detail">
                <span class="icon">⏰</span>
                <p> Lunes a Domingo: 8:00 AM - 9:00 PM</p> 
            </div> 
        </div> 
        <div class="card-actions"> 
            <a href="https://aratiendas.com/" class="btn btn-primary" target="_blank">Página Web</a>
            <button id="mapara" class="btn btn-secondary" target="_blank">Ver Mapa</button> 
        </div>
        <div id="ara" style="display: none;">
            <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1NdOCnSqzLTtY2n5VTt-xJBtt0iIbe9M&ehbc=2E312F" width="100%" height="300"></iframe>
        </div> 
    </div>

    <div class="supermarket-card"> 
        <div class="card-logo-container"> 
            <img src="../imagenes/tiendas/merca.png" alt="Mercacentro" class="card-logo"> 
        </div> 
        <div class="card-info">
            <h3>Mercacentro</h3> 
            <div class="card-detail">
                <span class="icon">🏬</span> 
                <p>Es de todos, es de aqui.</p> 
            </div> 
            <div class="card-detail">
                <span class="icon">📍</span> 
                <p> Carrera 16 Sur, El Poblado #96-48, Ibagué, Tolima</p>
            </div>
            <div class="card-detail">
                <span class="icon">⏰</span>
                <p> Lunes a Domingo: 7:30 AM - 9:30 PM</p> 
            </div> 
        </div> 
        <div class="card-actions"> 
            <a href="https://www.mercacentro.com/?utm_source=google&utm_medium=cpa&utm_campaign=mercacentro__marca__google_conversion_aon_search&utm_term=conversion&utm_source=google&utm_medium=cpa&utm_campaign=mercacentro__marca__google_conversion_aon_search&utm_term=conversion&gad_source=1&gad_campaignid=16523441195&gbraid=0AAAAAodr9nl_LSazWtY5Ltehba1zJWyyh&gclid=Cj0KCQiAubrJBhCbARIsAHIdxD_j4XZ9eFhz38Dkm0XhdTDO6ZgqauulmMGXlmssOiLrWCoHWkG-f20aAmvqEALw_wcB" class="btn btn-primary" target="_blank">Página Web</a>
            <button id="mapmerca" class="btn btn-secondary" target="_blank">Ver Mapa</button> 
        </div>
        <div id="mercacentro"  style="display: none;">
            <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1D2zLCfMJw1MCLCZ4POG8A-f5uOtiLN0&ehbc=2E312F" width="100%" height="300"></iframe>
        </div> 
    </div>

    <div class="supermarket-card"> 
        <div class="card-logo-container"> 
            <img src="../imagenes/tiendas/olimpica.png" alt="Olimpica" class="card-logo"> 
        </div> 
        <div class="card-info">
            <h3>Olimpica</h3> 
            <div class="card-detail">
                <span class="icon">🏬</span> 
                <p>Precios bajos siempre.</p> 
            </div> 
            <div class="card-detail">
                <span class="icon">📍</span> 
                <p> Av Colombia CC La Estación, Ibagué, Tolima</p>
            </div>
            <div class="card-detail">
                <span class="icon">⏰</span>
                <p> Lunes a Domingo: 8:00 AM - 9:00 PM</p> 
            </div> 
        </div> 
        <div class="card-actions"> 
            <a href="https://www.olimpica.com/" class="btn btn-primary" target="_blank">Página Web</a>
            <button id="mapolim" class="btn btn-secondary" target="_blank">Ver Mapa</button> 
        </div>
        <div id="olimpica" style="display: none;">
            <iframe src="https://www.google.com/maps/d/embed?mid=1yBAaI1scyIsjUEqRSXGL7hXZQbKQJF4&ehbc=2E312F" 
                width="100%"
                height="300">
            </iframe>
        </div> 
    </div>
</div>
<script src="../js/supermer.js"></script>
<script src="../js/dom.js"></script>

</body>
</html>