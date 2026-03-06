<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Mepo</title>
    
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

    <div class="login-page-wrapper">

        <div class="form-container">

            <div class="form-background">

                <h1>Recuperar contraseña</h1>

                    
                    <form action="../php/enviar_token.php" method="POST">

                        <div class="input-group">
                            <label>Correo electrónico</label>
                            <input type="email" name="recoverEmail" placeholder="Ingresa tu correo" required>
                        </div>

                        <button class="btn-login-form" type="submit">
                            Enviar correo
                        </button>

                    </form>

            </div>
        </div>
    </div>

</body>
</html>
