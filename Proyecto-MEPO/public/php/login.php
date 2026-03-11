<?php

session_start();
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo";


$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

if(isset($_SESSION['mensaje_exito'])){
    echo "<div id='mensajeExito' style='
        position: fixed;
        top: 20px;
        right: 20px;
        background-color:#28a745;
        color:white;
        padding:15px 20px;
        border-radius:8px;
        box-shadow:0 4px 10px rgba(0,0,0,0.2);
        transition: opacity 0.5s ease;
        z-index:1000;
    '>
        ".$_SESSION['mensaje_exito']."
    </div>";

    unset($_SESSION['mensaje_exito']); // 🔥 Esto hace que solo se muestre una vez
}


if(isset($_POST["btn-login-form"])){

    $correo_tel = $_POST["user"];
    $contrasena = sha1($_POST["contrasena"]);

    $sql = "SELECT * FROM usuario
            WHERE correo_tel = '$correo_tel'
            AND contrasena = '$contrasena'"; 
    $resultado = mysqli_query($enlace, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_assoc($resultado);

        $_SESSION ["ndocumento"] = $fila["ndocumento"];
        $_SESSION ["nombre"] = $fila["nombre"];
        $_SESSION["rol_id"] = $fila["rol_id"];

        header("Location: ahorro.php");
        exit();
    }else {
        echo "Datos incorrectos o usuario no activo";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrarse - Mepo</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Nuestros CSS -->
    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <header class="main-header">
        <div class="container">
            <a href="index.php" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="index.php">Inicio</a>
                <a href="comparar.php">Comparar</a>
                <a href="supermercados.php">Supermercados</a>
                <a href="ofertas.php">Ofertas</a>
            </nav>
        </div>
    </header>
    <div class="login-page-wrapper">
        <div class="form-container">
            <div class="form-background">
                <h1>Iniciar sesion</h1>
                <p id="errorMsg" class="error-messsage" style="color: red;"></p>
              <form id="loginForm" method="POST">
                <div class="input-group">
                    <label for="user">Correo</label>
                    <input required type="email" name="user" id="user" placeholder="ejemplo123@gmail.com">

                </div>
                <div class="input-group">
                    <label for="contrasena">Contraseña</label>
                    <input required type="password" name="contrasena" id="contrasena">

                </div>
                 <a href="recuperar.php" class="forgot-password">¿Olvidaste tu contraseña?</a>

                 <button type="submit" name="btn-login-form" class="btn-login-form">Ingresar</button>
              </form>
            <div class="social-divider"><span>o inicia con</span></div>

                    <div class="social-media">
                        <a href="#" class="social-icon google"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                    <p class="sign-up-prompt">¿Necesitas una cuenta? <a href="registro.php">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>

<script>
setTimeout(function() {
    var mensaje = document.getElementById("mensajeExito");
    if(mensaje){
        mensaje.style.opacity = "0";
        setTimeout(function(){
            mensaje.style.display = "none";
        }, 500);
    }
}, 3000); // 3000 = 3 segundos
</script>

</body>