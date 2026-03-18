<?php
require("regis2.php");
require_once("valini.php");

/* verificar sesión */
if (!isset($_SESSION["ndocumento"])) {
    header("Location: login.php");
    exit();
}

$ndocumento = $_SESSION["ndocumento"];

/* obtener meta del usuario */
$consulta = mysqli_query(
    $enlace,
    "SELECT * FROM ahorro WHERE ndocumento='$ndocumento'"
);

$datos = mysqli_fetch_assoc($consulta);

/* si no tiene meta creada */
if(!$datos || $datos["meta"] == 0){
    header("Location: ahorro.php");
    exit();
}

$objetivo = $datos["objetivo"];
$meta = $datos["meta"];
$ahorrado = $datos["monto_disp"];

/* calcular progreso */
$porcentaje = 0;

if ($meta > 0) {
    $porcentaje = ($ahorrado / $meta) * 100;
}

if ($porcentaje > 100) {
    $porcentaje = 100;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mi Meta - MEPO</title>

<link rel="stylesheet" href="../css/pagina.css">
<link rel="stylesheet" href="../css/perfil.css">
<link rel="stylesheet" href="../css/panel_meta.css">

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

<?php require_once("pvendedor.php"); ?>

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

<?php endif; ?>

</div>

</header>

<main>
    <div class="container">

<section class="panel-meta">

<div class="meta-card">

<h1>Tu meta de ahorro</h1>

<h2><?php echo $objetivo; ?></h2>

<p class="meta-texto">
Meta total: $<?php echo number_format($meta); ?>
</p>

<p class="meta-texto">
Ahorrado: $<?php echo number_format($ahorrado); ?>
</p>

<div class="barra">

<div class="progreso"
style="width: <?php echo $porcentaje; ?>%">
</div>

</div>

<p class="porcentaje">
<?php echo round($porcentaje); ?>% completado
</p>

</div>

</section>
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
<script src="../js/dom.js"></script>

</body>
</html>