<?php
$conn = new mysqli("localhost", "root", "", "mepo");

if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['name'];

    $nombreImagen = $_FILES['imagen']['name'];
    $ruta = "../imagenes/" . $nombreImagen;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

    $categoria_id = $_POST['categoria_id'];

    $sql = "INSERT INTO productos (nombre, precio, imagen, categoria_id)
    VALUES ('$nombre','$precio','$nombreImagen','$categoria_id')";
    $conn->query($sql);

    header("Location: panel_vendedor.php");
}
?>

<form method="POST" enctype="multipart/form-data">
    
    Nombre:
    <input type="text" name="nombre" required><br><br>

    Precio:
    <input type="number" step="0.01" name="precio" required><br><br>

    Categoría:
    <select name="categoria_id" required>
        <?php
        $categorias = $conn->query("SELECT * FROM categoria");
        while($cat = $categorias->fetch_assoc()){
            echo "<option value='".$cat['id']."'>".$cat['nombre']."</option>";
        }
        ?>
    </select><br><br>

    Imagen:
    <input type="file" name="imagen" required><br><br>

    <button type="submit">Guardar</button>

</form>