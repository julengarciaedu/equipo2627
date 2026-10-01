<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="equipo.css" />
    <title>Mi primer programa PHP</title>
</head>
<body>
    <h1> Saludito </h1>
    <?php
        $nombre = "Julen";
    ?>
    <p>Hola <?php echo $nombre; ?></p>
    <p>Hola otra vez <?= $nombre; ?></p>
    <?php
        echo "<p>Hola por tercera vez $nombre</p>";
    ?>    
</body>
</html>