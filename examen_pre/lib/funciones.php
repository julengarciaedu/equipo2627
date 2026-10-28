<?php
/* Función AreaRectangulo, ejercicio 6.1 */
function areaRectangulo(float $base, float $altura):float {
    return $base * $altura;
}

/* Función AreaRectangulo, ejercicio 6.2 */
function saludar(string $nombre = 'invitado'):string{
    return "Hola, $nombre ".PHP_EOL;
}

/* Función AreaRectangulo, ejercicio 6.3 */
function esPar(int $numero):bool {
    return ($numero % 2 === 0);
}

/* Función que plantemos en clase para el Ejercicio 3.5 */
function elegirColor(float $nota, float $asistencia): string{
    if ($nota < 0 || $nota > 10) return "red";
    elseif ($asistencia < 80) return "orange";
    else return "green";
}

/* Función que devuelve una cadena de texto con el título del libro más antiguo y el más reciente */
function libroMasAntiguoMasReciente(array $libros):string {
    $aniomenor = $aniomayor = $libros[0]['año']; //recogemos el primer año que aparece en el array y lo fijamos como el mayor y el menor para empezar a comparar
    $titulomenor = $titulomayor = $libros[0]['titulo']; //el primer título es el más antiguo y el más reciente; si no hacemos esto y casualmente el primer título fuese el mayor o el menor, como su valor se mete solo dentro del if, no se cargaría.
    foreach ($libros as $libro) {
        if ($libro["año"] < $aniomenor) { //Si el año del registro actual es menor que el que tengo guardado "como menor", es que no lo tengo bien, lo actualizo
            $aniomenor = $libro["año"];
            $titulomenor = $libro["titulo"];
        }
        if ($libro["año"] > $aniomayor) { //Lo mismo para el mayor
            $aniomayor = $libro["año"];
            $titulomayor = $libro["titulo"];
        }
    }
    return "El título más antiguo es $titulomenor ($aniomenor) y el título más reciente es $titulomayor ($aniomayor)";
}

/* Función alternativa que devuelve una cadena de texto con el título del libro más antiguo y el más reciente */
function libroMasAntiguoMasReciente2(array $libros):string {
    $anios = array_column($libros, "año"); //Me devuelve un array solo con los años
    $mayor = max($anios); //de ese array, extraigo el valor mayor
    $menor = min($anios); //y el menor
    $posmayor = array_search($mayor,$anios); //me devuelve la posición donde se encuentra ese valor, el mayor
    $posmenor = array_search($menor,$anios); //me devuelve la posición donde se encuentra ese valor, el menor
    return "El título más antiguo es ".$libros[$posmenor]['titulo']." ($menor) y el título más reciente es ".$libros[$posmayor]['titulo']." ($mayor)";
}

/* Función que valida los posibles errores del formulario POST del ejercicio 7 */
// Devuelve un array asociativo $errores con el posible error de cada campo
function validarErrores(array $post): array {
    $errores=[];
    
    // Nombre: Obligatorio, mínimo 3 caracteres
    if ($post['nombre'] !== ""){
        if (strlen($post['nombre']) < 3) 
            $errores['nombre'] = "El nombre debe tener más de tres caracteres";    
    } else 
        $errores['nombre'] = "El nombre es obligatorio";
    
    //Email: Obligatorio
    if ($post['email'] === "") $errores['email'] = "El email es obligatorio";
    
    //Edad: Obligatorio, entre 16 y 65
    if ($post['edad'] === "") $errores['edad'] = "La edad es obligatoria";
    elseif (!is_numeric($post['edad'])) $errores['edad'] = "La edad no es numérica";
    elseif ($post['edad']<16 && $post['edad']<65) $errores['edad'] = "La edad debe estar entre 16 y 65";

    //Curso: Uno de los valores de la lista
    if(!in_array($post['curso'],['1º DAW', '2º DAW', '1º DAM', '2º DAM'])) $errores['curso'] = "El valor del curso no es válido, elija uno de la lista";

    //Turno: Uno de los valores de la lista
    if(!isset($post['turno']) || !in_array($post['turno'],['Mañana', 'Tarde'])) $errores['turno'] = "El valor del turno no es válido, elija una de las opciones";

    //Actividades: Alguna
    if(!isset($post['actividades'])) $errores['actividades'] = "No ha seleccionado ninguna actividad y debe seleccionar por lo menos una"; 
    
    //Comentarios: no más de 200 caracteres
    if(isset($post['comentarios']) && strlen($post['comentarios'])>200) $errores['comentarios'] = "El comentario no puede superar los 200 caracteres. Acórtelo, por favor";  
    return $errores;
}

?>