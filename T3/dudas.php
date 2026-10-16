<?php

require_once "libreria.php";

$cantidad = 1.0;
$cambio = 0.92;

$resultado = deEurosAMoneda($cantidad, $cambio);

//pasoPorReferencia($cantidad, $cambio);

//pasoPorReferenciaFake($cantidad, $cambio);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="equipo.css" />
    <title>Página de dudas</title>
</head>
<body>
    <h1>Dudas sobre funciones</h1>
    <h2>Primer ejemplo</h2>
    <p>El resultado de la operación es <?= $resultado ?>
    y el resultado de la otra operación es <?php echo deMonedaAEuros($cantidad, $cambio); ?></p>
    <p>Ahora mismo los valores de las variables son cantidad: <?=  $cantidad ?> y cambio: <?=  $cambio ?></p>
    <p>Ahora voy a llamar a la función que pasa por referencia, y los valores son: cantidad: <?=  $cantidad ?> y cambio: <?=  $cambio ?></p>
    <h2>Segundo ejemplo</h2>
    <?php 
        $cantidad = 2.0;
        $cambio = 5.0; 
        pasoPorReferencia($cantidad, $cambio); ?>
        <p>Ahora mismo los valores de las variables son cantidad: <?=  $cantidad ?> y cambio: <?=  $cambio ?></p>
        <?php
        $cantidad = 2.0;
        $cambio = 5.0;
        pasoPorReferenciaFake($cantidad, $cambio); ?>
        <p>Ahora mismo los valores de las variables son cantidad: <?=  $cantidad ?> y cambio: <?=  $cambio ?></p>
    <h2>Laboratorio fallido </h2>
    <?php
        $a = [1, 2, 3];
        foreach ($a as &$v) {
            $v = $v * 2;
            echo $v;
            echo "<br>";
            var_dump($a);
            echo "<br>";
        }
        var_dump($a);
        echo "<br>";
        foreach ($a as $v) {
            echo $v . ' ';
        }
    ?>
    <h3>Cosillas con los formularios</h3>
    <form action="recogerform.php" method="POST">
        <label>Nombre: </label>
        <input type="text" name="nombre">
        <input type="checkbox" name="acepto"><label>Acepto T&C</label>
        <label>¿Qué rrss usas?:</label>
        <input type="checkbox" name="rrss[]" value="Eltiktok">Eltiktok
        <input type="checkbox" name="rrss[]" value="Elinsta">Elinsta
        <input type="checkbox" name="rrss[]" value="Whatsappy">Whatsappy
        <input type="checkbox" name="rrss[]" value="Snapchat">Snapchat
        <label>Genero</label>
        <input type="radio" name="genero" value="Masculino">Masculino
        <input type="radio" name="genero" value="Femenino">Femenino
        <input type="radio" name="genero" value="No" checked>No espec
        <label>Julen explica</label>
        <input type="radio" name="explica" value="Fatal">Fatal
        <input type="radio" name="explica" value="Garrafal">Garrafal
        <input type="radio" name="explica" value="Baja" checked>Que se pille la baja
        <select size="5" name="yanose[]" multiple>Es que ya no se que preguntar
            <option value="AA">AA</option>
            <option value="BB">BB</option>
            <option value="CC" selected>CC</option>
            <option value="DD">DD</option>
            <option value="EE">EE</option>
            <option value="FF">FF</option>
            <option value="GG">GG</option>
        </select>

        <button type="submit">Envia</button>
    </form>
    <h2>Orientaciones sobre PPT</h2>
    <?php
        //$elementos = ["piedra","papel","tijera"];
        //shuffle($elementos);
        //echo $elementos[0];
        $elementos = ["piedra" => "pi", "papel" => "pa", "tijera" => "ti"];
        $claveelems = array_keys($elementos);
        var_dump($claveelems);
        shuffle($claveelems);
        echo $claveelems[0];
        echo $claveelems[rand(0,2)];
    ?>
    </body>
</html>