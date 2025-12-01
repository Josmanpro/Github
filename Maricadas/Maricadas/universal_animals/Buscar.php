<?php
$query = isset($_GET['query']) ? strtolower($_GET['query']) : '';

$paginas = [
    "Perro" => "Perro.html",
    "Gato" => "Gato.html",
    "Pez" => "Pez.html",
    "Hamster" => "Hamster.html",
    "Conejo" => "Conejo.html",
    "Aves Ornamentales" => "Aves_Ornamentales.html",
    "Top Perro" => "TopPerro.html",
    "Top Gato" => "TopGato.html"
];

$resultados = [];

foreach ($paginas as $nombre => $archivo) {
    $contenido = strtolower(file_get_contents($archivo));

    if (strpos($contenido, $query) !== false) {
        $resultados[] = [
            "nombre" => $nombre,
            "archivo" => $archivo
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<h2>Resultados para: <b><?php echo htmlspecialchars($query); ?></b></h2>

<?php if (count($resultados) > 0): ?>
    <ul>
        <?php foreach ($resultados as $r): ?>
            <li>
                <a href="<?php echo $r['archivo']; ?>"><?php echo $r['nombre']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No se encontraron resultados.</p>
<?php endif; ?>

<br>
<a href="universalanimals.html">Volver al inicio</a>

</body>
</html>
