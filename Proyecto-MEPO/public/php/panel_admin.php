<?php
session_start();
require("regis2.php");

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
</head>

<body>

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

<option value="inactivo" <?php if($fila['estado']=="pendiente") echo "selected"; ?>>Pendiente</option>

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