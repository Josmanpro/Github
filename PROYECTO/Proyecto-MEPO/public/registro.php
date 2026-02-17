<?php



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Mepo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="css/pagina.css">
    <link rel="stylesheet" href="css/registro.css">


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
                <h1>Registro</h1>
                <p id="errorMsg" class="error-message" style="color: red;"></p>
                <p id="successMsg" class="success-message"></p>
                <form id="miFormulario" action="regis2.php" method="POST">
                    <div class="input-group">
                        <label for="docu">numero de identificacion</label>
                        <input type="text" name="docu" id="docu" required> 
                    </div>
                    <div class="input-group">
                        <label for="nombre">nombre</label>
                        <input type="text" name="nombre" id="nombre" required> 
                    </div>
                    <div class="input-group">
                        <label for="apellido">apellido</label>
                        <input type="text" name="apellido" id="apellido" required>
                    </div>
                    <div class="input-group">
                        <label for="user">numero de celular o correo</label>
                        <input type="text" name="user" id="user" required>
                    </div>
                    <div class="input-group">
                        <label for="contrasena">crea tu contraseña </label>
                        <input type="password" name="contrasena" id="contrasena" required>
                        </div>
                        <button type="submit" name="boton" id="boton" class="btn-login-form">Registrarse</button>

                </form>
                <p class="sign-up-prompt">¿Ya tienes una cuenta? 
                    <a href="login.php">Inicia sesión</a>
                </p>
            </div> 
        </div>
    </div>





</body>
</html>