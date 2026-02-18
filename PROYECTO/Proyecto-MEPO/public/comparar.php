<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar precios - Mepo</title>
    <link rel="stylesheet" href="css/pagina.css">
    <link rel="stylesheet" href="css/comparar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="container">
        <a href="index.php" class="logo">Mepo</a>
        <nav class="main-nav">
            <a href="index.php">Inicio</a>
            <a href="supermercados.php">Supermercados</a>
            <a href="ofertas.php">Ofertas</a>
        </nav>
        <a href="login.php" class="btn-login">Iniciar Sesión</a>
    </div>
</header>

<main class="container">
    <h1>Comparar precios</h1>
    <p>Selecciona una categoría y descubre dónde te conviene más comprar.</p>

    <div class="controls">
        <label for="categoria">Selecciona una categoría:</label>
        <select id="categoria">
            <option value="lacteos">Lácteos</option>
            <option value="granos">Granos</option>
            <option value="aseo">Aseo</option>
        </select>

        <button onclick="cargarCategoria()">Ver productos</button>
    </div>
    <div id="resultado" class="results-grid">
    </div>
</main>
<script src="js/ajax.js"></script>

</body>
</html>
