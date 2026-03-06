<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "mepo";

$enlace = mysqli_connect($servidor,$usuario,$clave,$basededatos);

if(isset($_GET['token'])){
    $token = $_GET['token'];
} else {
    die("Token inválido");
}

if(isset($_POST['nueva_pass'])){

    $nueva = sha1($_POST['nueva_pass']);

    $sql = "UPDATE usuario 
            SET contrasena='$nueva',
                token=NULL,
                token_expira=NULL
            WHERE token='$token'";

    mysqli_query($enlace, $sql);

    session_start();
    $_SESSION['mensaje_exito'] = "✔ Contraseña actualizada correctamente";

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Cambiar contraseña - Mepo</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

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

<h1>Cambiar contraseña</h1>

<form method="POST">

<div class="input-group">
<label>Nueva contraseña</label>
<input type="password" name="nueva_pass" required>
</div>

<button type="submit" class="btn-login-form">
Cambiar contraseña
</button>

</form>

</div>
</div>
</div>

</body>
</html>