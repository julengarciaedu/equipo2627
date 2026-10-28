<?php
// Ejercicio 8 - funciones.php
// Contiene solo funciones: index.php las incluye con require.

// 1. Escapa un texto para mostrarlo en HTML de forma segura.
function esc(string $texto)
{
    //return htmlspecialchars($texto); //Forma básica, con esta es suficiente
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'); //Forma más completa, para que lo tengáis en cuenta
}

// 2. Recibe el array de notas de un alumno y devuelve su media.
function media(array $notas)
{
    // gestionamos la posibilidad de que no haya notas, lo veremos más adelante en gestión de errores, 
    // y validaciones, pero ya deberíamos saber de programación que es más correcto.
    if (count($notas) === 0) {
        return 0;
    }

    $suma = 0;
    foreach ($notas as $nota) {
        $suma += $nota;
    }

    return $suma / count($notas);
}

// 3. Traduce una nota numérica a texto usando match.
function calificacion(float $nota)
{
    return match (true) {
        $nota < 5 => 'Insuficiente',
        $nota < 6 => 'Suficiente',
        $nota < 7 => 'Bien',
        $nota < 9 => 'Notable',
        default   => 'Sobresaliente',
    };
}

// 4. Devuelve true solo si TODAS las notas son 5 o más.
function estaAprobado(array $notas)
{
    foreach ($notas as $nota) {
        if ($nota < 5) {
            return false; // con una sola suspensa ya no está aprobado
        }
    }
    return true;
}

// 5. Valida lo que llega por POST. Devuelve un array de errores
//    (clave = nombre del campo). Array vacío = todo correcto.
function validarAlumno(array $datos)
{
    $errores = [];

    // Nombre obligatorio
    $nombre = trim($datos['nombre'] ?? '');
    if ($nombre === '') {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }

    // Las tres notas: obligatorias, numéricas y entre 0 y 10
    $modulos = ['DWES', 'DWEC', 'DAW']; //Lo hacemos con un array, y así es dinámico
    foreach ($modulos as $modulo) {
        $valor = trim($datos[$modulo] ?? '');

        if ($valor === '') {
            $errores[$modulo] = "La nota de $modulo es obligatoria.";
        } elseif (!is_numeric($valor)) { //si el valor es numérico devuelve true (cambiamos el sentido con !)
            $errores[$modulo] = "La nota de $modulo debe ser un número.";
        } elseif ($valor < 0 || $valor > 10) {
            $errores[$modulo] = "La nota de $modulo debe estar entre 0 y 10.";
        }
    }

    return $errores;
}