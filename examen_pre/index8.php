<?php
// Ejercicio 8 - index.php
// Datos, procesamiento del formulario y HTML del gestor de notas.

require 'funciones8.php';

date_default_timezone_set('Europe/Madrid');

// 1. DATOS INICIALES (array multidimensional)
$alumnos = [
    ['nombre' => 'Lucía Pérez',  'notas' => ['DWES' => 7.5, 'DWEC' => 8,   'DAW' => 6]],
    ['nombre' => 'Mario Gil',    'notas' => ['DWES' => 4,   'DWEC' => 5.5, 'DAW' => 3]],
    ['nombre' => 'Irene Sáinz',  'notas' => ['DWES' => 9,   'DWEC' => 9.5, 'DAW' => 8.5]],
    ['nombre' => 'Óscar Ruiz',   'notas' => ['DWES' => 5,   'DWEC' => 6,   'DAW' => 5]],
    ['nombre' => 'Nerea Ortiz',  'notas' => ['DWES' => 6.5, 'DWEC' => 4.5, 'DAW' => 7]],
];

$modulos = ['DWES', 'DWEC', 'DAW'];

// 2. PROCESAMIENTO DEL FORMULARIO (POST)
// Valores del formulario: vacíos en la primera visita, para repoblarlo después.
$form = ['nombre' => '', 'DWES' => '', 'DWEC' => '', 'DAW' => ''];
$errores = [];
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogemos lo enviado (con ?? por si falta algún campo)
    $form['nombre'] = trim($_POST['nombre'] ?? '');
    $form['DWES']   = trim($_POST['DWES'] ?? '');
    $form['DWEC']   = trim($_POST['DWEC'] ?? '');
    $form['DAW']    = trim($_POST['DAW'] ?? '');

    $errores = validarAlumno($form);

    if (empty($errores)) {
        // Correcto: añadimos el alumno al final del array con []
        $alumnos[] = [
            'nombre' => $form['nombre'],
            'notas'  => [
                'DWES' => $form['DWES'],
                'DWEC' => $form['DWEC'],
                'DAW'  => $form['DAW'],
            ],
        ];
        $mensaje = 'Alumno añadido: ' . $form['nombre'];

        // Vaciamos el formulario para poder añadir otro
        $form = ['nombre' => '', 'DWES' => '', 'DWEC' => '', 'DAW' => ''];
    }
}


// 3. FILTRO POR GET (?ver=aptos | ?ver=noaptos)

$ver = $_GET['ver'] ?? 'todos';
if ($ver !== 'aptos' && $ver !== 'noaptos') {
    $ver = 'todos'; // valor desconocido o ausente: se muestran todos
}

$filtrados = [];
foreach ($alumnos as $alumno) {
    $apto = estaAprobado($alumno['notas']);

    if ($ver === 'todos'
        || ($ver === 'aptos' && $apto)
        || ($ver === 'noaptos' && !$apto)) {
        $filtrados[] = $alumno;
    }
}

// 4. ESTADÍSTICAS (sobre todo el grupo, no solo las filas filtradas)
$totalAlumnos = count($alumnos);
$totalAptos = 0;
$sumaMedias = 0;
$mejorMedia = -1;
$mejorAlumno = '';

foreach ($alumnos as $alumno) {
    $m = media($alumno['notas']);
    $sumaMedias = $sumaMedias + $m;

    if (estaAprobado($alumno['notas'])) {
        $totalAptos++;
    }

    if ($m > $mejorMedia) {
        $mejorMedia = $m;
        $mejorAlumno = $alumno['nombre'];
    }
}

$mediaGrupo = $totalAlumnos > 0 ? $sumaMedias / $totalAlumnos : 0;


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de notas del grupo</title>
    <link rel="stylesheet" href="../../equipo.css" />
</head>
<body>
    <h1>Gestor de notas del grupo</h1>

    <!-- FORMULARIO PARA AÑADIR UN ALUMNO -->
    <h2>Añadir alumno</h2>

    <?php if ($mensaje !== ''): ?>
        <p class="ok"><?= esc($mensaje) ?></p>
    <?php endif; ?>

    <form method="post" action="" novalidate>
        <label>Nombre:
            <input type="text" name="nombre" value="<?= esc($form['nombre']) ?>">
        </label>
        <?php if (isset($errores['nombre'])): ?>
            <span class="error"><?= esc($errores['nombre']) ?></span>
        <?php endif; ?>
        <br>

        <?php foreach ($modulos as $modulo): ?>
            <label><?= $modulo ?>:
                <input type="number" name="<?= $modulo ?>" step="0.1" min="0" max="10"
                       value="<?= esc($form[$modulo]) ?>">
            </label>
        <?php endforeach; ?>

        <?php foreach ($modulos as $modulo): ?>
            <?php if (isset($errores[$modulo])): ?>
                <div class="error"><?= esc($errores[$modulo]) ?></div>
            <?php endif; ?>
        <?php endforeach; ?>

        <p><button>Añadir</button></p>
    </form>

    <!-- FILTROS POR GET -->
    <h2>Notas</h2>
    <p class="filtros">
        <a href="index.php" class="<?= $ver === 'todos' ? 'activo' : '' ?>">Todos</a>
        <a href="?ver=aptos" class="<?= $ver === 'aptos' ? 'activo' : '' ?>">Aptos</a>
        <a href="?ver=noaptos" class="<?= $ver === 'noaptos' ? 'activo' : '' ?>">No aptos</a>
    </p>

    <!-- TABLA DE NOTAS -->
    <?php if (empty($filtrados)): ?>
        <p>No hay alumnos que mostrar con este filtro.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <?php foreach ($modulos as $modulo): ?>
                        <th><?= $modulo ?></th>
                    <?php endforeach; ?>
                    <th>Media</th>
                    <th>Calificación</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filtrados as $alumno): ?>
                    <?php
                    $m = media($alumno['notas']);
                    $apto = estaAprobado($alumno['notas']);
                    ?>
                    <tr>
                        <td class="nombre"><?= esc($alumno['nombre']) ?></td>

                        <?php foreach ($alumno['notas'] as $nota): ?>
                            <td class="<?= $nota < 5 ? 'suspensa' : '' ?>"><?= esc($nota) ?></td>
                        <?php endforeach; ?>

                        <td class="<?= $m < 5 ? 'suspensa' : '' ?>"><?= number_format($m, 2, ',', '.') ?></td>
                        <td><?= calificacion($m) ?></td>
                        <td class="<?= $apto ? 'apto' : 'noapto' ?>"><?= $apto ? 'APTO' : 'NO APTO' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- ESTADÍSTICAS -->
    <h2>Estadísticas del grupo</h2>
    <ul>
        <li>Número de alumnos: <?= $totalAlumnos ?></li>
        <li>Número de aptos: <?= $totalAptos ?></li>
        <li>Media del grupo: <?= number_format($mediaGrupo, 2, ',', '.') ?></li>
        <li>Mejor media: <?= esc($mejorAlumno) ?> (<?= number_format($mejorMedia, 2, ',', '.') ?>)</li>
    </ul>

    <!-- PIE DE PÁGINA -->
    <footer>
        Página generada el <?= date('d/m/Y') ?> a las <?= date('H:i:s') ?>
    </footer>
</body>
</html>