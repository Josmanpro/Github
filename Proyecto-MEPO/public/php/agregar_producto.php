<?php
$conn = new mysqli("localhost", "root", "", "mepo");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria_id'];

    // Imagen
    $nombreImagen = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];

    // Carpeta donde se guardan las imágenes
    $ruta = "../img/productos/" . $nombreImagen;

    move_uploaded_file($tmp, $ruta);

    $sql = "INSERT INTO productos (nombre, precio, imagen, categoria_id)
            VALUES ('$nombre','$precio','$nombreImagen','$categoria_id')";

    if($conn->query($sql)){
        header("Location: panel_vendedor.php");
        exit();
    }else{
        echo "Error al guardar producto";
    }
}
?>
<style>
    .upload-box{
    width:250px;
    height:150px;
    border:2px dashed #999;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    cursor:pointer;
    background:#f9f9f9;
}

.upload-box:hover{
    background:#f0f0f0;
}
</style>

<form method="POST" enctype="multipart/form-data">

    <h2>Agregar Producto</h2>

    Nombre:<br>
    <input type="text" name="nombre" required><br><br>

    Precio:<br>
    <input type="number" name="precio" required><br><br>

    Categoría:<br>
    <select name="categoria_id" required>
        <?php
        $categorias = $conn->query("SELECT * FROM categoria");
        while($cat = $categorias->fetch_assoc()){
            echo "<option value='".$cat['id']."'>".$cat['nombre']."</option>";
        }
        ?>
    </select><br><br>

    Imagen:<br>
    <div class="upload-box" id="drop-area">
        <p>Arrastra la imagen aquí o haz clic</p>
        <input type="file" name="imagen" id="imagenInput" hidden required>
    </div>

    <img id="preview" style="display:none; max-width:200px; margin-top:10px; cursor:pointer;">
    <p id="cambiarTexto" style="display:none;">Haz clic en la imagen para cambiarla</p>


    <button type="submit">Guardar Producto</button>

</form>

<script>

const dropArea = document.getElementById("drop-area");
const input = document.getElementById("imagenInput");
const preview = document.getElementById("preview");
const cambiarTexto = document.getElementById("cambiarTexto");

dropArea.addEventListener("click", () => input.click());

// permitir cambiar imagen dando clic al preview
preview.addEventListener("click", () => input.click());

input.addEventListener("change", function(){
    const file = this.files[0];
    if(file){
        mostrarPreview(file);
    }
});

dropArea.addEventListener("dragover", (e)=>{
    e.preventDefault();
});

dropArea.addEventListener("drop", (e)=>{
    e.preventDefault();

    const file = e.dataTransfer.files[0];
    input.files = e.dataTransfer.files;

    mostrarPreview(file);
});

function mostrarPreview(file){
    const reader = new FileReader();

    reader.onload = function(e){
        preview.src = e.target.result;
        preview.style.display = "block";

        dropArea.style.display = "none";
        cambiarTexto.style.display = "block";
    }

    reader.readAsDataURL(file);
}

// Permitir arrastrar imagen sobre el preview para reemplazarla
preview.addEventListener("dragover", (e)=>{
    e.preventDefault();
});

preview.addEventListener("drop", (e)=>{
    e.preventDefault();

    const file = e.dataTransfer.files[0];
    input.files = e.dataTransfer.files;

    mostrarPreview(file); // reemplaza la imagen
});



</script>