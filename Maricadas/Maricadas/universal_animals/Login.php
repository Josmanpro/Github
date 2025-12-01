<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$BaseDeDatos = "universal_animals_pet_shop";


$conexion = new mysqli($servidor, $usuario, $clave, $BaseDeDatos);


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $Correo_electronico = $_POST['Correo_electronico'] ?? '';
    $Correo_electronico = $conexion->real_escape_string($Correo_electronico);
    $insertarDatos = "INSERT INTO cliente (Correo_electronico) VALUES ('$Correo_electronico')";

    if ($conexion->query($insertarDatos) === TRUE) {
        echo "<script>alert('Correo registrado correctamente');
        window.location.href = 'universalanimals.html';
        </script>";
        
    } else {
        echo "Error al insertar: " . $conexion->error;
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="StyleFormulario.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <img class="logo" src="imagenes/Empresa.jpg" alt="Logo">
      <h2>Iniciar Sesión</h2>
      <p class="descripcion">Introduce tu correo electrónico y te enviaremos un código de verificación</p>
    </div>

    <form class="formulario" method = "POST" action = "">
      <input type="email" name="Correo_electronico" placeholder="Correo electrónico" required>
      <button type="submit">Continuar</button>
    </form>

    <div class="footer">
      <a href="#">Política de Privacidad</a> |
      <a href="#">Términos del Servicio</a>
    </div>
  </div>
</body>
</html>

