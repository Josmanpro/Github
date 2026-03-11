<?php

if(!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 1){
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

</head>
<body>

    <header class="main-header">
        <div class="container">
            <a href="index.php" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="comparar.php" class="button">Comparar</a>
                <a href="supermercados.php" class="button">Supermercados</a>
                <a href="ofertas.php" class="button">Ofertas</a>
                <a href="panel_vendedor.php" class="button">Panel Vendedor</a>
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


<div class="container mt-4">
    <h2>Panel del Vendedor</h2>

    <a href="agregar_producto.php" class="btn btn-success mb-3">Agregar Producto</a>

    <div class="row">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="imagenes/<?php echo $row['imagen']; ?>" class="card-img-top" height="200">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                        <p class="card-text"><?php echo $row['descripcion']; ?></p>
                        <p><strong>$<?php echo $row['precio']; ?></strong></p>

                        <a href="editar_producto.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Modificar</a>
                        <a href="eliminar_producto.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>