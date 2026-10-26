<?php

    /** Usamos require si queremos que la ausencia del archivo de error
     *  Usamos include si queremos que la asuencia del archivo de un warning pero siga la ejecución
     *  En ambos casos, usamos _once si queremos que compruebe si el archivo ya está cargado en memoria
     *   (en la página) evitando de esta forma un error de funciones duplicadas.
     */
    require_once "lib/funciones.php";
    //require
    //include
    //include_once "lib/funciones.php";

    $num = $_GET['n'] ?? 1; //Si no hay nada en $_GET['n'], que devuelva un 1, evitamos los errores

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../equipo.css" />
    <title>Ejercicios del Examen Preeval Resueltos</title>
</head>
<body>
    <h1>Ejercicio 4. Bucles</h1>
    <h2>For</h2>
    <table>
        <thead>
            <tr>
                <th>Operacion</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $espar = false;  
                for ($i=1 ; $i<=10; $i++){
                    //if ($i%2 == 0) //Podemos ir mirando si cada posición de la fila es par pero...
                    if ($espar)
                        echo "<tr style='background-color:lightgrey'><td>$num * $i</td><td>".$num * $i."</td></tr>";
                    else 
                       echo "<tr><td>$num * $i</td><td>".$num * $i."</td></tr>";
                    $espar = !$espar; //... lo hacemos alternando una variable entre true y false
                    }
            ?>
        </tbody>
    </table>
    <h2>While</h2>
        <ul>
        <?php
            $saldo = 0;
            $incremento = 150;
            $contador = 0;
            $limite = 1000;

            while($saldo < $limite) {
                $saldo += $incremento;
                $contador++;
                echo "<li>a mes $contador el saldo es $saldo €</li>";
            }
        ?>
        </ul>
    <h2>Foreach</h2>
        <ol> 
        <?php
            $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
            foreach ($dias as $dia) {   
                if ($dia === "Miércoles") continue; //continue rompe el bucle actual, break sale del bucle completo
                echo "<li>$dia</li>";
            }
        ?>  
        </ol>
        <h1>Ejercicio 5. Arrays</h1>
        <?php
            $libros = [
                ['titulo' => 'El Quijote', 'autor' => 'Cervantes', 'año' => 1605, 'prestado' => false],
                ['titulo' => 'La Regenta', 'autor' => 'Clarín', 'año' => 1885, 'prestado' => true],
                ['titulo' => 'Niebla', 'autor' => 'Unamuno', 'año' => 1914, 'prestado' => false],
                ['titulo' => 'Luces de bohemia', 'autor' => 'Valle-Inclán', 'año' => 1924, 'prestado' => true],
                ['titulo' => 'Nada', 'autor' => 'Laforet', 'año' => 1945, 'prestado' => false],
                ];

            $genero = ['terror','ciencia ficción','novela'];
            $genero[] = 'romántica';
            $genero[] = 'fantasia';
            echo implode(", ", $genero); //implode convierte un array en texto, separados los elementos por la cadena que le indique en el primer parámetro
        ?>
        <h2>Antiguo y moderno</h2>
        <?php
            //llamamos a las funciones del archivo funciones que resuelven el ejercicio
            echo libroMasAntiguoMasReciente($libros)."<br>";
            echo libroMasAntiguoMasReciente2($libros)."<br>";
        ?>
        <h1>Ejercicio 6. Funciones</h1>
        <?php
            $base = 2;
            $altura = 4.2;
            echo "El resultado es: ".areaRectangulo($base, $altura)."<br>";
            $nombre = "Eustaquio";
            echo saludar()."<br>"; //llamamos sin parámetro, se muestra el parámetro por defecto.
            echo saludar($nombre)."<br>"; //llamamos con parámetro, se sustituye el valor por defecto por el real.
            $numero = 2;
            echo "El número $numero es par: ".(esPar($numero) ? "PAR" : "IMPAR")."<br>";
            //Usamos el ternario solo para sacar un texto u otro por pantalla, ya que la representación visual de
            // true - false en php es bastante falsaria.
            ++$numero; //incrementamos en 1 el número y volvemos a mostrar
            echo "El número $numero es par: ".(esPar($numero) ? "PAR" : "IMPAR")."<br>";
        ?>
        <h1>Ejercicio 7. GET y POST</h2>
        <h2>GET</h2>
        <?php
            //var_dump($_SERVER);
            //if($_SERVER['REQUEST_METHOD'] == 'GET') { //La carga de la página ya viene de una petición GET así que una primera carga siempre es GET, aunque no lleve parámetros
            if(isset($_GET['ciudad'])) { //Nos permite saber si se ha pulsado el submit, si no, $_GET no tiene ninguna clave 'ciudad' con lo cual el isset devuelve false
                $ciudad = $_GET['ciudad'] ?? ""; //Lo recogemos, y si no viene nada metemos un vacío.
                if ($ciudad !== "") { 
                    echo "Has buscado la ciudad: $ciudad";
                } else {
                    echo "No hay buscado nada, olvidón.";
                }
            } else { //Si entramos al else es por que no se ha pulsado el submit, metiendo o sin meter un dato, así que mostramos el form
        ?>
            <p><strong>Introduce el nombre de una ciudad<strong></p>
            <form action="examen.php" method="GET">
                <label>Ciudad</label>
                <input type="text" name="ciudad">
                <button type="submit">Enviar</button>
            </form>
        <?php } ?>
        <h2>POST</h2>
            <form action="examen.php" method="POST" novalidate>
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email">
                <label for="edad">Edad * (entre 16 y 65)</label>
                <input type="number" id="edad" name="edad" min="16" max="65">
                <label for="curso">Curso *</label>
                <select id="curso" name="curso">
                    <option value="">-- Selecciona un curso --</option>
                    <?php foreach (['1º DAW', '2º DAW', '1º DAM', '2º DAM'] as $c): ?>
                        <option value="<?= $c ?>"><?= $c ?></option>
                    <?php endforeach; ?>
                </select>
                <fieldset>
                    <legend>Turno *</legend>
                    <label>
                        <input type="radio" name="turno" value="Mañana"> Mañana
                    </label>
                    <label>
                        <input type="radio" name="turno" value="Tarde"> Tarde
                    </label>
                </fieldset>
                <fieldset>
                    <legend>Actividades * (marca al menos una)</legend>
                    <?php foreach (['Robótica', 'Ajedrez', 'Teatro', 'Fútbol'] as $a): ?>
                            <label>
                                <input type="checkbox" name="actividades[]" value="<?= $a ?>"> <?= $a ?>
                            </label>
                        <?php endforeach; ?>
                </fieldset>
                <label for="comentarios">Comentarios (opcional, máximo 200 caracteres)</label>
                <textarea id="comentarios" name="comentarios" rows="4" maxlength="200"></textarea>
                <button type="submit">Enviar inscripción</button>
        </form>
</body>
</html>

<!--a href="examen.php">Recarga</a-->