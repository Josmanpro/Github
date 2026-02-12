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
    <link rel="stylesheet" href="css/pagina.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <header class="main-header">
        <div class="container">
            <a href="index.html" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="index.html">Inicio</a>
                <a href="comparar.html">Comparar</a>
                <a href="supermercados.html">Supermercados</a>
                <a href="ofertas.html">Ofertas</a>
            </nav>
        </div>
    </header>
    <div class="login-page-wrapper">
        <div class="form-container">
            <div class="form-background">
                <h1>Iniciar sesion</h1>
                <p id="errorMsg" class="error-messsage" style="color: red;"></p>
              <form id="loginForm">
                <div class="input-group">
                    <label for="user">User</label>
                    <input required type="text" name="user" id="user" placeholder="ejemplo123@gmail.com">

                </div>
                <div class="input-group">
                    <label for="contrasena">Contraseña</label>
                    <input required type="password" name="password" id="password">

                </div>
                 <a href="recuperar.php" class="forgot-password">¿Olvidaste tu contraseña?</a>

                 <button type="submit" class="btn-login-form">Ingresar</button>
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

</body>