<?php
require("regis2.php");
require_once("valini.php");

if (isset($_SESSION["ndocumento"])) {

    $ndocumento = $usuario["ndocumento"];

    // Verificar si ya existe registro
    $consulta = mysqli_query(
        $enlace,
        "SELECT * FROM ahorro WHERE ndocumento='$ndocumento'"
    );

    if (mysqli_num_rows($consulta) == 0) {

        // Si no existe, lo creamos
        mysqli_query(
            $enlace,
            "INSERT INTO ahorro (ndocumento, objetivo, monto_disp, meta)
             VALUES ('$ndocumento', '', 0, 0)"
        );
    }
    // Si envía formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $objetivo = $_POST["nombre_meta"];
        $meta = $_POST["monto_meta"];

        mysqli_query($enlace, "UPDATE ahorro 
                               SET objetivo='$objetivo', meta='$meta'
                               WHERE ndocumento='$ndocumento'");

        header("Location: ahorro.php");
        exit();
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
        <section class="meta-layout">

            <!-- Lado izquierdo (informativo) -->
            <div class="meta-info">
                <h1>Define tu próxima meta</h1>
                <p>
                    Cada meta comienza con una decisión.
                    Establece tu objetivo, asígnale un propósito
                    y empieza a construirlo paso a paso.
                </p>

                <div class="beneficios">
                    <p>✔ Organización financiera</p>
                    <p>✔ Seguimiento de progreso</p>
                    <p>✔ Motivación visual</p>
                </div>
            </div>
            <!-- Lado derecho (formulario elegante) -->
            <div class="meta-formulario">

                <form method="POST">

                    <div class="campo">
                        <span class="titulo-campo">Tipo de meta</span>
                        <select name="nombre_meta">
                            <option value="">Selecciona una opción</option>
                            <option value="Viaje">Viaje</option>
                            <option value="Casa">Comprar casa</option>
                            <option value="Estudio">Estudios</option>
                            <option value="Vehiculo">Vehículo</option>
                            <option value="Boda">Pareja</option>
                            <option value="Tecnologia">Tecnología</option>
                            <option value="Emergencia">Fondo de emergencia</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label class="titulo-campo">Monto objetivo</label>
                        <div class="input-money">
                            <span class="simbolo">$</span>
                            <input type="text" id="monto" placeholder="0" inputmode="numeric">
                        </div>
                    </div>
                    <button type="submit" class="btn-continuar">
                        Continuar →
                    </button>
                </form>
            </div>
        </section>
    </main>
    <script src="../js/dom.js"></script>
    <script src="../js/ahorro.js"></script>
</body>

</html>