<?php

require("regis2.php");

$ndocumento = $_POST['ndocumento'];
$estado = $_POST['estado'];
$rol_id = $_POST['rol_id'];

$sql = "UPDATE usuario 
        SET estado='$estado', rol_id='$rol_id'
        WHERE ndocumento='$ndocumento'";

mysqli_query($enlace,$sql);

header("Location: panel_admin.php");

?>