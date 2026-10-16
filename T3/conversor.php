<?php
$tiposCambio = [
    'USD' => [
        'valor' => 0.92,
        'descripcion' => 'Dólar estadounidense'
    ],
    'GBP' => [
        'valor' => 1.17,
        'descripcion' => 'Libra esterlina'
    ],
    'JPY' => [
        'valor' => 0.0060,
        'descripcion' => 'Yen japonés'
    ],
    'CHF' => [
        'valor' => 1.02,
        'descripcion' => 'Franco suizo'
    ],
    'CAD' => [
        'valor' => 0.68,
        'descripcion' => 'Dólar canadiense'
    ],
    'AUD' => [
        'valor' => 0.61,
        'descripcion' => 'Dólar australiano'
    ],
    'CNY' => [
        'valor' => 0.13,
        'descripcion' => 'Yuan chino'
    ],
    'INR' => [
        'valor' => 0.011,
        'descripcion' => 'Rupia india'
    ],
    'BRL' => [
        'valor' => 0.18,
        'descripcion' => 'Real brasileño'
    ],
    'MXN' => [
        'valor' => 0.054,
        'descripcion' => 'Peso mexicano'
    ],
    'RUB' => [
        'valor' => 0.010,
        'descripcion' => 'Rublo ruso'
    ],
    'KRW' => [
        'valor' => 0.00070,
        'descripcion' => 'Won surcoreano'
    ],
    'TRY' => [
        'valor' => 0.030,
        'descripcion' => 'Lira turca'
    ],
    'ZAR' => [
        'valor' => 0.050,
        'descripcion' => 'Rand sudafricano'
    ],
    'SEK' => [
        'valor' => 0.087,
        'descripcion' => 'Corona sueca'
    ],
    'NOK' => [
        'valor' => 0.087,
        'descripcion' => 'Corona noruega'
    ],
    'DKK' => [
        'valor' => 0.13,
        'descripcion' => 'Corona danesa'
    ],
    'PLN' => [
        'valor' => 0.23,
        'descripcion' => 'Zloty polaco'
    ],
    'HUF' => [
        'valor' => 0.0026,
        'descripcion' => 'Florín húngaro'
    ],
    'CZK' => [
        'valor' => 0.040,
        'descripcion' => 'Corona checa'
    ]
];

var_dump($tiposCambio["USD"]);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="equipo.css" />
    <title>Conversor Moneda</title>
</head>

<body>
    <h1>Money makes the world go round, the world go round 🤑</h1>
    <form action="conversorresultado.php" method="POST">
        <label>Cantidad</label>
        <input type="number" step="0.01" name="cantidad">
        <label>Moneda</label>
        <select name="moneda">
        <?php
            foreach($tiposCambio as $codmoneda => $moneda) {
                echo "<option value=".$moneda['valor'].">(".$codmoneda.") ".$moneda['descripcion']."</option>";
            }
        ?>
        </select>
    </form>
</body>

</html>