<?php

require_once("valini.php");

$conn = new mysqli("localhost", "root", "", "mepo");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria_id = $_POST['categoria_id'];

    $nombreImagen = $_FILES['imagen']['name'];
    $tmp = $_FILES['imagen']['tmp_name'];

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
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg,#f5f7fa,#e4e7ec);
            margin:0;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .form-container{
            background:white;
            padding:35px;
            width:380px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }
        h2{
            text-align:center;
            margin-bottom:25px;
        }

        label{
            font-weight:bold;
            font-size:14px;
        }

        input, select{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:6px;
            font-size:14px;
        }

        input:focus, select:focus{
            outline:none;
            border-color:#4CAF50;
        }

        .upload-box{
            width:100%;
            height:150px;
            border:2px dashed #bbb;
            border-radius:10px;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
            cursor:pointer;
            background:#fafafa;
            transition:all .25s ease;
        }

        .upload-box:hover{
            background:#f0f0f0;
            border-color:#4CAF50;
        }

        .upload-box p{
            color:#777;
            font-size:14px;
        }

        /* animación cuando arrastran archivo */
        .upload-box.dragover{
            border-color:#4CAF50;
            background:#e8f5e9;
            transform:scale(1.03);
        }
        .upload-content{
            display:flex;
            flex-direction:column;
            align-items:center;
        }

        .cloud-icon{
            font-size:40px;
            margin-bottom:8px;
            animation:flotar 2s infinite ease-in-out;
        }

        @keyframes flotar{
            0%{transform:translateY(0);}
            50%{transform:translateY(-5px);}
            100%{transform:translateY(0);}
        }
        .preview-container{
            position:relative;
            width:100%;
        }
        #preview{
            display:none;
            width:100%;
            border-radius:10px;
            margin-top:10px;
            border:1px solid #ddd;
        }

        #removeBtn{
            position:absolute;
            top:15px;
            right:10px;
            background:red;
            color:white;
            border:none;
            border-radius:50%;
            width:25px;
            height:25px;
            cursor:pointer;
            display:none;
        }

        #cambiarTexto{
            font-size:12px;
            color:#777;
            text-align:center;
        }

        button{
            width:100%;
            padding:12px;
            background:#4CAF50;
            border:none;
            border-radius:6px;
            color:white;
            font-size:15px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#45a049;
        }

    </style>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <a href="index.php" class="logo">Mepo</a>
            <nav class="main-nav">
                <a href="index.php">Inicio</a>
                <a href="comparar.php" class="button">Comparar</a>
                <a href="supermercados.php" class="button">Supermercados</a>
                <a href="ofertas.php" class="button">Ofertas</a>
               
                <?php
                require_once("pvendedor.php");
                ?>

            </nav>
            <?php if (!$usuario): ?>
                <a href="login.php" class="btn-login">Iniciar Sesión</a>
            <?php endif; ?>

            <?php if ($usuario): ?>
                <div class="perfil" id="perfilUsuario">

                    <img id="imgPerfil" src="../imagenes/perfil/Perfil.jpg" class="foto-perfil">

                    <div id="panelPerfil" class="panel-perfil">

                        <img src="../imagenes/perfil/Perfil.jpg" class="avatar-panel">

                        <div class="nombre">
                            <?php echo $usuario["nombre"]; ?>
                        </div>

                        <div class="info">
                            <?php echo $usuario["correo_tel"]; ?>
                        </div>

                        <div class="info">
                            Documento: <?php echo $usuario["ndocumento"]; ?>
                        </div>

                        <a href="logout.php" class="btn-logout">
                            Cerrar sesión
                        </a>

                    </div>
                </div>
            <?php endif;
            ?>
        </div>
    </header>

    <div class="form-container">

        <form method="POST" enctype="multipart/form-data">

            <h2>Agregar Producto</h2>

        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Precio</label>
        <input type="number" name="precio" required>

        <label>Categoría</label>
        <select name="categoria_id" required>
        <?php
        $categorias = $conn->query("SELECT * FROM categoria");
        while($cat = $categorias->fetch_assoc()){
        echo "<option value='".$cat['id']."'>".$cat['nombre']."</option>";
        }
        ?>
        </select>

        <label>Imagen</label>

        <br><br>

        <div class="upload-box" id="drop-area">
            <div class="upload-content">
                <div class="cloud-icon">☁️</div>
                <p>Arrastra la imagen aquí<br>o haz clic para subir</p>
            </div>
            <input type="file" name="imagen" id="imagenInput" hidden required>
        </div>

        <div class="preview-container">
            <img id="preview">
            <button type="button" id="removeBtn">✖</button>
        </div>

        <p id="cambiarTexto" style="display:none;">
        Haz clic o arrastra otra imagen para cambiarla
        </p>
        <br>

        <button type="submit">Guardar Producto</button>

        </form>

    </div>
</body>
    <script>

    const removeBtn = document.getElementById("removeBtn");
    const dropArea = document.getElementById("drop-area");
    const input = document.getElementById("imagenInput");
    const preview = document.getElementById("preview");
    const cambiarTexto = document.getElementById("cambiarTexto");

    dropArea.addEventListener("click", () => input.click());

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

    // cuando entra el archivo al área
    dropArea.addEventListener("dragenter", () => {
        dropArea.classList.add("dragover");
    });

    // mientras se mueve dentro
    dropArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropArea.classList.add("dragover");
    });

    // cuando sale del área
    dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("dragover");
    });

    // cuando se suelta el archivo
    dropArea.addEventListener("drop", (e) => {
        e.preventDefault();

        dropArea.classList.remove("dragover");

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
            removeBtn.style.display = "block";
        }

        reader.readAsDataURL(file);
    }

    preview.addEventListener("dragover", (e)=>{
    e.preventDefault();
    });

    preview.addEventListener("drop", (e)=>{
    e.preventDefault();

    const file = e.dataTransfer.files[0];
    input.files = e.dataTransfer.files;

    mostrarPreview(file);
    });

    removeBtn.addEventListener("click", () => {

        preview.src = "";
        preview.style.display = "none";

        input.value = "";

        dropArea.style.display = "flex";
        cambiarTexto.style.display = "none";
        removeBtn.style.display = "none";
    });

    </script>
</html>