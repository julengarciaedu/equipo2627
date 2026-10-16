<?php
    $nombre = $_POST["nombre"] ?? "";
    $aceptotyc = $_POST["acepto"] ?? "";
    $rrss = $_POST["rrss"] ?? "";
    $yanoselect = $_POST["yanose"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="equipo.css" />
    <title>Formulario</title>
</head>
<body>
    <h1>Recogemos los datos del formulario</h1>
    <?= $nombre  ?> <br>
    <?php if(!isset($_POST["acepto"])) echo "No se ha pulsado el check"; ?>
    <?= $aceptotyc ?> <br>
    Respuesta de los Check <?php foreach ($rrss as $valor) echo $valor." "; ?> <br>
    <?= $_POST["genero"] ?> <br>
    <?= $_POST["explica"] ?> <br>
    Respuesta del Select <?php foreach ($yanoselect as $valor) echo $valor." "; ?> <br>
</body>
</html>