<?php
session_start();
require("regis2.php"); // conexión a la base de datos

$usuario = null;

if (isset($_SESSION["ndocumento"])) {
    $ndocumento = $_SESSION["ndocumento"];

    // Consulta segura
    $stmt = mysqli_prepare($enlace, "SELECT * FROM usuario WHERE ndocumento = ?");
    mysqli_stmt_bind_param($stmt, "s", $ndocumento);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    $usuario = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar precios - Mepo</title>
    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/comparar.css">
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
                <a href="index.php">Inicio</a>
                <a href="supermercados.php">Supermercados</a>
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
            <!-- tabla de ahorro varios productos -->
        <h2>Productos seleccionados</h2>

        <table class="tabla-compras">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio seleccionado</th>
                    <th>Precio más caro</th>
                    <th>Ahorro</th>
                </tr>
            </thead>
            <tbody id="listaCompras">
            </tbody>
        </table>

        <div class="total-ahorro">
            Total ahorrado: $<span id="totalAhorro">0</span>
        </div>
    </main>
    <div id="modalConfirmacion" class="modal">
        <div class="modal-contenido">
            <p>¿Estás seguro de seleccionar este precio?</p>
            <div class="modal-botones">
                <button id="btnConfirmar">Sí, seleccionar</button>
                <button id="btnCancelar">Cancelar</button>
            </div>
        </div>
    </div>
    <script src="../js/ajax.js"></script>
    <script src="../js/dom.js"></script>
<script>

const params = new URLSearchParams(window.location.search);
const busqueda = params.get("buscar");

if(busqueda){

document.getElementById("buscador").value = busqueda;

let texto = busqueda.toLowerCase();
let resultados = document.getElementById("resultados");

for(let categoria in productos){

productos[categoria].forEach(producto => {

if(producto.nombre.toLowerCase().includes(texto)){

let html = `
<div class="producto">
<img src="${producto.imagen}" width="80">
<h3>${producto.nombre}</h3>
<p>Éxito: $${producto.precios["Éxito"]}</p>
<p>D1: $${producto.precios["D1"]}</p>
<p>Mercacentro: $${producto.precios["Mercacentro"]}</p>
<p>Surtiplaza: $${producto.precios["Surtiplaza"]}</p>
</div>
`;

resultados.innerHTML += html;

}

});

}

}

</script>
</body>

</html>