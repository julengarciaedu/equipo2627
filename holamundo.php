<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuleta de PHP</title>
    <link rel="stylesheet" href="equipo.css" />
</head>

<body>
    <h1>Chuleta PHP</h1>
    <h2>Info PHP 👾</h2>
    <!-- Esto es un comentario en html -->
    <?php
    /* phpinfo(); */
    echo "<p>He ocultado la chapa del phpinfo</p>";
    ?>
    <h2>Ejercicio 1</h2>
    <summary>Programa que te diga si el producto de dos números es mayor igual o menor a su suma</summary>
    <?php
    $num1 = 5;
    $num2 = 5;
    $addition = $num1 + $num2;
    $multiply = $num1 * $num2;
    echo "<p>El resultado de la suma de $num1 + $num2 es $addition</p>";
    echo '<p>El resultado de la multiplicacion de ' . $num1 . ' * ' . $num2 . ' es ' . $multiply . '</p>';
    if ($addition > $multiply)
        echo "<p>La suma es mayor que la multiplicación</p>";
    elseif ($addition < $multiply)
        echo "<p>La suma es menor que la multiplicación</p>";
    else
        echo "<p>La suma es igual a la multiplicación</p>";
    ?>
    <!-- versión con match -->
    <?php
    //$resultado = match(true) {
    echo match (true) {
        $addition > $multiply => "<p>La suma es mayor que la multiplicación</p>",
        $addition < $multiply => "<p>La suma es menor que la multiplicación</p>",
        $addition == $multiply => "<p>La suma es igual que la multiplicación</p>",
    };
    //echo $resultado;   
    ?>
    <h2>Ejercicio 2</h2>
    <summary>Con una variable “día” y una “mes” verificar si es fin de año. Utilizar operadores lógicos</summary>
    <?php
    $day = "31";
    $month = "12";
    echo "<p>¿El día $day del mes $month es fin de año?</p>";
    //Resuelto con if-else
    /* if ($day==31 && $month==12) 
            echo "<p>Es fin de año 🎉</p>";
        else
            echo "<p><b>No</b>es fin de año</p>";
        */
    //Vamos a resolverlo con un ternario
    echo ($day == 31 && $month == 12) ? "<p>Es fin de año 🎉</p>" : "<p><b>No</b>es fin de año</p>";
    ?>
    <h2>Ejercicio 3</h2>
    <summary>Inicializar una nota con un número entero. Si la nota está entre 5 y 6 visualizar “aprobado”, si la nota está entre 6 y 7 visualizar “bien”, y entre 7 y 8 “notable” y 8 por encima “sobresaliente”.</summary>
    <?php
    $nota = 9;
    echo match (true) {
        $nota >= 5 && $nota < 6  => "<p>$nota es APROBADO</p>",
        $nota >= 6 && $nota < 7 => "<p>$nota es BIEN</p>",
        $nota >= 7 && $nota < 8  => "<p>$nota es NOTABLE</p>",
        $nota >= 8 => "<p>$nota es SOBRESALIENTE</p>"
    };
    ?>
    <h2>Ejercicio 4</h2>
    <summary>Declarar 3 variables: $opcion, $n1, $n2
        <ul>
            <li>Si opción contiene una s, visualizar la suma de $n1 más $n2.</li>
            <li>Si opción contiene una r, visualizar la resta de $n1 menos $n2.</li>
            <li>Si opción contiene una m, visualizar el producto de $n1 por $n2,</li>
            <li>Si opción contiene una d, visualizar el cociente de $n1 entre $n2,</li>
            <li>Si opción no contiene ninguno de los valores anteriores, visualizar un mensaje de error.</li>
        </ul>
    </summary>
    <br>
    <?php
    //Comentar código Ctrl+k Ctrl+c
    // $haystack = "Y aquí escribimos una cadena de texto completa";
    // $needle = "X";
    // echo strstr($haystack, $needle);
    // echo "<br>";
    // $needle = "aqui";
    // echo strstr($haystack, $needle);
    // echo "<br>";
    // $needle = "aquí";
    // echo strstr($haystack, $needle);
    // echo "<br>";
    // $needle = "x";
    // echo strstr($haystack, $needle, true);
    // echo "<br>";
    // echo strpos($haystack, $needle);
    $opcion = "j";
    $n1 = 3;
    $n2 = 4;
    echo match (true) {
        str_contains($opcion, "s") => "<p>El resultado es $n1 + $n2 = " . ($n1 + $n2) . "</p>",
        str_contains($opcion, "r") => "<p>El resultado es $n1 - $n2 = " . ($n1 - $n2) . "</p>",
        str_contains($opcion, "m") => "<p>El resultado es $n1 * $n2 = " . ($n1 * $n2) . "</p>",
        str_contains($opcion, "d") => "<p>El resultado es $n1 / $n2 = " . ($n1 / $n2) . "</p>",
        default => "<p>ERROR, no ha elegido una opción válida</p>"
    };
    // if (strstr($opcion,"s")) echo "true";
    // else echo "false";
    ?>
    <h2>Ejercicio 5</h2>
    <summary>Imprime los múltiplos de 5 comenzando en 100 y terminando en 250.</summary>
    <?php


    ?>

    <h2>Ejercicio 6</h2>
    <summary>Muestra los días que han pasado desde el día 1 de Enero hasta el día actual del mes. Para obtener el día actual: date(“d”); y mes date (“m”); Utilizar estructura do while.</summary>
    <?php
    $dia = date("d");
    $mes = date("m");
    // echo "<p>Hoy es $dia del $mes de ".date("Y")."</p>";
    $diasmes = [$dia, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $contadormes = $diastotales = 0;
    do {
        $diastotales += $diasmes[$contadormes++];
    } while ($mes > $contadormes); //condición de salida del dowhile
    echo "<p>El número de días transcurridos desde el 1 de Enero hasta el $dia del $mes son " . $diastotales-- . "</p>";
    ?>
    <?php
    // Definimos unos arrays con valores para los ejercicios de Arrays/Vectores
    // Array unidimensional numérico 
    $alumnos = ["Paquita", "Salas", "Mawi", "Belin", "Estela", "Reynolds"];
    // Array bidimensional asociativos 
    /* Primera forma de definirlo 
        $notas ["Paquita"] = [9, 8, 5, 10]; 
        $notas ["Salas"] = [10, 8, 7, 6]; 
        $notas ["Mawi"] = [5, 5, 2, 4]; */
    /* Segunda forma */
    $notas = ["Paquita" => [9, 8, 5, 10], 
                "Salas" => [10, 8, 7, 6], 
                "Mawi" => [5, 5, 2, 4], 
                "Belin" => [10, 10, 10, 9], 
                "Estela" => [1, 2, 3, 1], 
                "Reynolds" => [10, 9, 8, 9]];
    ?>
    <h2>Ejercicio 12 (arrays)</h2>
    <summary>Sacar por pantalla un listado de alumnos.</summary>
    <ul>Nombres de los alumnos 
    <?php
        foreach($alumnos as $alumno) {
            echo "<li>$alumno</li>";
        }
    ?>
    </ul>
    <h2>Ejercicio 13 (arrays)</h2>
    <summary>Sacar por pantalla la nota media de cada alumno y del curso completo.</summary>
    <?php
        foreach($notas as $alumno => $anotas) {
            //Tengo que recorrer el array $anotas y hacer cosas con él;
        }
    ?>

</body>

</html>