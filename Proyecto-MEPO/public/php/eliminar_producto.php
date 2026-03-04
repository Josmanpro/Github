<?php
$conn = new mysqli("localhost", "root", "", "mepo");

$id = $_GET['id'];

$conn->query("DELETE FROM productos WHERE id=$id");

header("Location: panel_vendedor.php");
?>