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

    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/registro.css">


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
                        <label for="docu">Numero de Identificacion</label>
                        <input type="text" name="docu" id="docu" oninput="soloNumeros(this)" required> 
                    </div>
                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" oninput="soloLetras(this)" required> 
                    </div>
                    <div class="input-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" oninput="soloLetras(this)" required>
                    </div>
                    <div class="input-group">
                        <label for="user">Correo</label>
                        <input type="email" name="user" id="user" required>
                    </div>
                    <div class="input-group">
                        <label for="pass1">Crea tu Contraseña </label>
                        <div class="password-box">
                            <input type="password" name="contrasena" id="pass1" required>
                            <i class="fa-solid fa-eye ojo" onclick="mostrarPasswords(this)"></i>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="pass2">Confirma tu Contraseña </label>
                        <div class="password-box">
                            <input type="password" name="contrasena" id="pass2" required>
                        </div>
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
<script>

    // --- VALIDACIÓN DE CONTRASEÑAS EN TIEMPO REAL ---
    document.addEventListener("DOMContentLoaded", function () {
        const pass1 = document.getElementById("pass1");
        const pass2 = document.getElementById("pass2");
        const mensaje = document.createElement("p");

        mensaje.id = "mensajePass";
        mensaje.style.fontWeight = "bold";
        mensaje.style.marginTop = "5px";

        pass2.insertAdjacentElement("afterend", mensaje);

        function verificarContraseñas() {
            if (pass2.value.length === 0) {
                mensaje.textContent = "";
                return;
            }

            if (pass1.value === pass2.value) {
                mensaje.textContent = "💕 Las contraseñas coinciden 💕";
                mensaje.style.color = "green";
            } else {
                mensaje.textContent = "💔 Las contraseñas no coinciden 💔";
                mensaje.style.color = "red";
            }
        }

        pass1.addEventListener("input", verificarContraseñas);
        pass2.addEventListener("input", verificarContraseñas);
    });

    function soloNumeros(input) {
        input.value = input.value.replace(/[^0-9]/g, ''); 
    }
    function soloLetras(input) {
        input.value = input.value.replace(/[^a-zA-Z\s]/g, ''); 
    }

    function mostrarPasswords(icono){

        const pass1 = document.getElementById("pass1");
        const pass2 = document.getElementById("pass2");

        if(pass1.type === "password"){
            pass1.type = "text";
            pass2.type = "text";
            icono.classList.replace("fa-eye","fa-eye-slash");
        }else{
            pass1.type = "password";
            pass2.type = "password";
            icono.classList.replace("fa-eye-slash","fa-eye");
        }

    }
</script>
</html>