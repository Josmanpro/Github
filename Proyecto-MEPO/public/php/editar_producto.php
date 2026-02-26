<?php
$conn = new mysqli("localhost", "root", "", "mepo");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM productos WHERE id=$id");
$row = $result->fetch_assoc();

if($_POST){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "UPDATE productos 
            SET nombre='$nombre', descripcion='$descripcion', precio='$precio'
            WHERE id=$id";
    $conn->query($sql);

    header("Location: panel_vendedor.php");
}
?>

<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
    Descripción: <textarea name="descripcion"><?php echo $row['descripcion']; ?></textarea><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>"><br>
    <button type="submit">Actualizar</button>
</form>