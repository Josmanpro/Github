<?php
require_once("valini.php");

$meta = 0;
$monto_disp = 0;
$objetivo = "";

if ($usuario) {
    $ndocumento = $usuario["ndocumento"];
    $consulta = mysqli_query($enlace, "SELECT * FROM ahorro WHERE ndocumento = '$ndocumento'");
    if (mysqli_num_rows($consulta) > 0) {
        $fila = mysqli_fetch_assoc($consulta);
        $meta = $fila["nombre_meta"];
        $monto_disp = $fila["monto_meta"];
        $objetivo = $fila["descripcion"];
    } else {
        mysqli_query($enlace, "INSERT INTO ahorro (ndocumento , objetivo, monto_disp, meta) VALUES ('$ndocumento', 'Mi meta', 0, 0)");

    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="visewport" content="width=device-width, initial-scale=1.0">
    <title>MEPO - Mercando con Propósito</title>
    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/ahorro.css">
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
        </div>
    </header>
    <main>
        <section class="meta-section">
            <div class="meta-card">
                <h1>Crea tu meta de ahorro</h1>
                <p class="subtexto">Define tu objetivo y comienza a construirlo paso a paso.</p>

                <form method="POST" action="">

                    <div class="campo">
                        <label for="nombre_meta">Nombre de la meta</label>
                        <input type="text" name="nombre_meta" placeholder="Ej: Viaje a Cartagena" required>
                    </div>

                    <div class="campo">
                        <label for="monto_meta">Monto objetivo</label>
                        <input type="number" name="monto_meta" placeholder="Ej: 1500000" required>
                    </div>

                    <div class="campo">
                        <label for="descripcion">¿Para qué es esta meta?</label>
                        <textarea name="descripcion" placeholder="Describe tu objetivo..."></textarea>
                    </div>

                    <div class="campo">
                        <label>Elige un ícono para tu meta</label>
                        <div class="iconos">
                            <label><input type="radio" name="icono" value="✈️" required> ✈️</label>
                            <label><input type="radio" name="icono" value="🏠"> 🏠</label>
                            <label><input type="radio" name="icono" value="🎓"> 🎓</label>
                            <label><input type="radio" name="icono" value="🚗"> 🚗</label>
                            <label><input type="radio" name="icono" value="💍"> 💍</label>
                            <label><input type="radio" name="icono" value="💻"> 💻</label>
                        </div>
                    </div>

                    <button type="submit" class="btn-guardar">
                        Guardar Meta
                    </button>

                </form>
            </div>
        </section>
    </main>
    <script src="../js/dom.js"></script>
</body>

</html>