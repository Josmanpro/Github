<?php
session_start();


// Verificar si el usuario está logueados
if(!isset($_SESSION["ndocumento"])){
    // Si no está logueado, redirigir al login o página principal
    header("Location: login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Contenedor del perfil -->
    <div class="perfil">
        
        <!-- Imagen que activa el panel -->
        <img 
            src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION["nombre"] ?? 'U'); ?>&background=random" 
            class="foto-perfil" 
            alt="Foto de perfil" 
            id="btnPerfil"
        >

        <!-- Panel Desplegable -->
        <div id="panelPerfil" class="panel-perfil">
            
            <!-- Cabecera con datos del usuario -->
            <div class="panel-header">
                <p class="nombre"><?php echo htmlspecialchars($_SESSION["nombre"] ?? "Usuario"); ?></p>
                <p class="documento">Doc: <?php echo htmlspecialchars($_SESSION["ndocumento"] ?? ""); ?></p>
            </div>

            <!-- Opciones del menú -->
            <div class="panel-body">
                <a href="perfil.php">
                    <span>👤</span> Ver Perfil Completo
                </a>
                <a href="configuracion.php">
                    <span>⚙️</span> Configuración
                </a>
            </div>

            <!-- Botón de cierre de sesión -->
            <button class="btn-logout" onclick="location.href='logout.php'">
                <span>🚪</span> Cerrar sesión
            </button>
        </div>
    </div>

    <!-- Enlace al archivo JavaScript -->
    <script src="script.js"></script>
</body>
</html>



<div id="panelPerfil" class="panel-perfil">
    
    <p><strong><?php echo $_SESSION["nombre"] ?? "Usuario"; ?></strong></p>
    <p><?php echo $_SESSION["ndocumento"] ?? ""; ?></p>
    
    <hr>

    <a href="perfil.php">Ver Perfil Completo</a>
    <a href="logout.php">Cerrar sesión</a>

</div>