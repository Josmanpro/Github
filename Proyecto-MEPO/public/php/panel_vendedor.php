<?php

require_once("valini.php");


if(!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 1 && $_SESSION['rol_id'] != 3){
    echo "Acceso denegado";
    exit();
}

$conn = new mysqli("localhost", "root", "", "mepo");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Vendedor</title>
    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .results-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:30px;
    margin-top:30px;
}

.product-card{
    background:white;
    border-radius:12px;
    padding:20px;
    text-align:center;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.product-card:hover{
    transform:translateY(-5px);
}

.product-img{
    width:120px;
    height:120px;
    object-fit:contain;
    margin-bottom:15px;
}

.precio{
    font-size:20px;
    font-weight:bold;
    color:#2e7d32;
}

.acciones{
    margin-top:15px;
    display:flex;
    justify-content:center;
    gap:10px;
}

.btn-editar{
    background:#4CAF50;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
}

.btn-eliminar{
    background:#e53935;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
}
    </style>
</head>
<body>

    <header class="main-header">
        <div class="container">
            <a href="index.php" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="comparar.php" class="button">Comparar</a>
                <a href="supermercados.php" class="button">Supermercados</a>
                <a href="ofertas.php" class="button">Ofertas</a>

                <?php if ($usuario['rol_id'] == 3): ?>
        <!-- Vendedor aprobado: botón activo -->
        <a href="panel_admin.php" class="button" id="padmin">
            Administrador
        </a>
    <?php endif; ?>

                
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
    <div class="container">
<div class="container mt-4">
    <h2>Panel del Vendedor</h2>

    <a href="agregar_producto.php" class="btn btn-success mb-3">Agregar Producto</a>

    <div class="results-grid">

<?php while($row = $result->fetch_assoc()) { ?>

<div class="product-card">

    <img src="../img/productos/<?php echo $row['imagen']; ?>" class="product-img">

    <h3><?php echo $row['nombre']; ?></h3>

    <p class="precio">$<?php echo $row['precio']; ?></p>

    <div class="acciones">
        <a href="editar_producto.php?id=<?php echo $row['id']; ?>" class="btn-editar">Modificar</a>
        <a href="eliminar_producto.php?id=<?php echo $row['id']; ?>" class="btn-eliminar">Eliminar</a>
    </div>

</div>

<?php } ?>

</div>
</div>
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