<?php
require_once("valini.php");

if(!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 3){
    echo "Acceso denegado";
    exit();
}

$sql = "SELECT
usuario.ndocumento,
usuario.nombre,
usuario.apellido,
usuario.correo_tel,
usuario.estado,
usuario.rol_id,
roles.nombre AS rol
FROM usuario
INNER JOIN roles
ON usuario.rol_id = roles.id";

$resultado = mysqli_query($enlace,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Panel Super Administrador</title>
<link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/panel_admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<header class="main-header">
        <div class="container">
            <a href="index.php" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="comparar.php" class="button">Comparar</a>
                <a href="supermercados.php" class="button">Supermercados</a>
                <a href="ofertas.php" class="button">Ofertas</a>
               
        <?php if (($usuario['rol_id'] == 1 && $usuario['estado'] == 'activo') || $usuario['rol_id'] == 3): ?>
        <!-- Vendedor aprobado: botón activo -->
        <a href="panel_vendedor.php" class="button" id="pvendedor">
            Vendedor
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

<h1>Panel Super Administrador</h1>

<h2>Lista de Usuarios</h2>

<table border="1">

<tr>
<th>Documento</th>
<th>Nombre</th>
<th>Correo</th>
<th>Estado</th>
<th>Rol</th>
<th>Guardar</th>
</tr>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<form action="upusu.php" method="POST">

<tr>

<td>
<?php echo $fila['ndocumento']; ?>
<input type="hidden" name="ndocumento" value="<?php echo $fila['ndocumento']; ?>">
</td>

<td>
<?php echo $fila['nombre']." ".$fila['apellido']; ?>
</td>

<td>
<?php echo $fila['correo_tel']; ?>
</td>

<td>
<select name="estado">

<option value="activo" <?php if($fila['estado']=="activo") echo "selected"; ?>>Activo</option>

<option value="bloqueado" <?php if($fila['estado']=="bloqueado") echo "selected"; ?>>Bloqueado</option>

<option value="pendiente" <?php if($fila['estado']=="pendiente") echo "selected"; ?>>Pendiente</option>

</select>
</td>

<td>
<select name="rol_id">

<option value="3" <?php if($fila['rol_id']==3) echo "selected"; ?>>
Superadministrador
</option>

<option value="1" <?php if($fila['rol_id']==1) echo "selected"; ?>>
Administrador
</option>

<option value="2" <?php if($fila['rol_id']==2) echo "selected"; ?>>
Cliente
</option>

</select>
</td>

<td>
<button type="submit">💾 Guardar</button>
</td>

</tr>

</form>

<?php } ?>

</table>

<script src="../js/dom.js"></script>
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