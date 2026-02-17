<?php
// perfil.php
session_start();

session_start();



// 1. Verificar si el usuario está logueado
if(!isset($_SESSION["ndocumento"])){


    // Si no está logueado, redirigir al login o página principal

    header("Location: login.php"); 
    exit();
}

 $nombreUsuario = $_SESSION["nombre"] ?? "Usuario";
 $correoUsuario = $_SESSION["email"] ?? $_SESSION["correo"] ?? "correo@ejemplo.com"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="styles.css">

    <!-- Estilos específicos para el Modal (Estilo Google) -->
    <style>
        /* Fondo oscuro semi-transparente (El Overlay) */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85); /* Fondo oscuro como Google */
            display: none; /* Oculto por defecto */
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Encima de todo */
        }

        /* Tarjeta blanca central */
        .modal-card {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 8px;
            text-align: center;
            width: 100%;
            max-width: 350px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            position: relative;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Avatar Grande dentro del modal */
        .modal-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 2px solid #e0e0e0;
        }

        .modal-title {
            font-size: 24px;
            color: #202124;
            margin: 10px 0 5px;
            font-weight: 400;
        }

        .modal-email {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 25px;
        }

        /* Botón estilo Google */
        .btn-google {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s;
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
        }

        .btn-google:hover {
            background-color: #1557b0;
        }

        /* Contenedor de opciones dentro del modal */
        .modal-opciones {
            text-align: left;
            margin-top: 20px;
            border-top: 1px solid #e0e0e0;
            padding-top: 15px;
        }

        .modal-opciones a, .modal-opciones button {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px;
            text-decoration: none;
            color: #333;
            font-size: 15px;
            background: none;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .modal-opciones a:hover, .modal-opciones button:hover {
            background-color: #f1f3f4;
        }

        .modal-opciones span {
            margin-right: 15px;
            font-size: 18px;
        }

        /* Botón para cerrar el modal (X) */
        .close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            color: #80868b;
            cursor: pointer;
            background: none;
            border: none;
        }
        .close-modal:hover {
            color: #000;
        }

        /* Estilos para tu avatar de disparo original (el de la esquina) */
        .foto-perfil {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border 0.2s;
        }
        .foto-perfil:hover {
            border-color: #3498db;
        }
    </style>
</head>
<body>

    <!-- 1. AVATAR DISPARADOR (El que está en tu barra de navegación) -->
    <div class="perfil">
        <img 
            src="https://ui-avatars.com/api/?name=<?php echo urlencode($nombreUsuario); ?>&background=3498db&color=fff&bold=true" 
            class="foto-perfil" 
            alt="Foto de perfil" 
            id="btnPerfil"
            title="Ver mi perfil"
        >
    </div>

    <!-- 2. VENTANA MODAL (Oculta por defecto) -->
    <div id="miModal" class="modal-overlay">
        <div class="modal-card">
            <!-- Botón cerrar (X) -->
            <button class="close-modal" id="cerrarModal">&times;</button>

            <!-- Contenido Estilo Google -->
            <img 
                src="https://ui-avatars.com/api/?name=<?php echo urlencode($nombreUsuario); ?>&background=202124&color=fff&size=128" 
                class="modal-avatar" 
                alt="Avatar"
            >
            <h2 class="modal-title">¡Hola, <?php echo htmlspecialchars($nombreUsuario); ?>!</h2>
            <p class="modal-email"><?php echo htmlspecialchars($correoUsuario); ?></p>

            <a href="perfil.php" class="btn-google">Gestionar tu cuenta</a>

            <!-- Opciones adicionales dentro del modal -->
            <div class="modal-opciones">
                <a href="perfil.php">
                    <span>👤</span> Mi Perfil
                </a>
                <a href="configuracion.php">
                    <span>⚙️</span> Configuración
                </a>
                <button onclick="location.href='logout.php'">
                    <span>👋</span> Cerrar sesión
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript para abrir y cerrar -->
    <script>
        const oli = document.getElementById('oli');
        const modal = document.getElementById('miModal');
        const cerrarModal = document.getElementById('cerrarModal');

        // Abrir modal al hacer clic en la foto
        oli.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        // Cerrar modal al hacer clic en la X
        cerrarModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Cerrar modal si se hace clic fuera de la tarjeta (en el fondo oscuro)
        window.addEventListener('click', (e) => {
            if (e.target == modal) {
                modal.style.display = 'none';
            }
        });
    </script>
    
</body>
<<<<<<< HEAD
</html>



<div id="panelPerfil" class="panel-perfil">
    
    <p><strong><?php echo $_SESSION["nombre"] ?? "Usuario"; ?></strong></p>
    <p><?php echo $_SESSION["ndocumento"] ?? ""; ?></p>
    
    <hr>

    <a href="perfil.php">Ver Perfil Completo</a>
    <a href="logout.php">Cerrar sesión</a>

</div>
=======
</html>
>>>>>>> f719c429efd323bfb0b00d70ad587b1851006c13
