<?php
    //Si no meto un nombre, me llega como vacío "nombreusu" existe, pero no lleva nada dentro
    $nombre = $_POST["nombreusu"] ?? "Anonimo";
    $codigo = $_POST["code"];
    $mail = $_POST["emailusu"] ?? "No puedo recoger un disabled";
    $password = $_POST["passusu"];
    $dato = $_POST["datoculto"];
    //var_dump($nombre);
    //var_dump($_GET);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="equipo.css" />
    <title>Welcome to Tijuana</title>
</head>
<body>
    <header><h1>Hello, it's me! </h1></header>
    <main>
        <h2>Hola <?php echo $nombre ?></h2>
        <p>Estamos haciendo pruebas, <?php echo $_POST["nombreusu"] ?><p>
        <h2>Recogida de datos del formulario</h2>
        <p>Nombre, <?php echo $nombre ?><p>
        <p>Código, <?php echo $codigo ?><p>
        <p>Email, <?php echo $mail ?><p>
        <p>Password, <?php echo $password ?><p>
        <p>Y el dato oculto contiene <?= $dato ?><p>  
    </main>
</body>
</html>