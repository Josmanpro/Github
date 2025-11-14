<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calculadora PHP</title>
</head>
<body>
    <h2>Calculadora de Suma</h2>
    <form method="post">
        Número 1: <input type="number" name="num1" required><br><br>
        Número 2: <input type="number" name="num2" required><br><br>
        <input type="submit" value="Sumar">
    </form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $suma = $num1 + $num2;
        echo "<h3>Resultado: $suma</h3>";
    }
?>
</body>
</html> 