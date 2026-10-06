<?php
    //var_dump($_POST);
    $resultado = "";
    if(isset($_POST["oper1"])){
        $op1 = $_POST["oper1"];
        //echo "operando 1 es $op1";
        $op2 = $_POST["oper2"];
        $operacion = $_POST["operador"];
        if ($operacion == "dividir" && $op2==0) {
            $resultado = "Error: ningún número es divisible por 0";
        } else {
            match($operacion){
                "sumar" => $resultado = "$op1 + $op2 = ".$op1 + $op2,
                // "sumar" => $resultado = $op1.' + '.$op2.' = '.$op1 + $op2,
                "restar" => $resultado = "$op1 - $op2 = ".$op1 - $op2,
                "multiplicar" => $resultado = "$op1 * $op2 = ".$op1 * $op2,
                "dividir" => $resultado = "$op1 / $op2 = ".$op1 / $op2
            };
        }
    }    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="equipo.css" />
    <title>Dora Calculadora</title>
</head>
<body>
    <h1>Dora Calculadora</h1>
    <p>Introduce dos números y elige la operación que quieres realizar</p>
    <form action="calculadorainteg.php" method="POST">
        <label>Primer operando: </label>
        <input type="number" name="oper1" required>
        <label>Segundo operando: </label>
        <input type="number" name="oper2" required>
        <label>Elige el operador</label>
        <select name="operador">
            <!--option value="">-- Elige una opción --</option-->
            <option value="sumar">+</option>
            <option value="restar">-</option>
            <option value="multiplicar">*</option>
            <option value="dividir">/</option>
        </select>
        <button type="submit">Calcular</button>
        <label>Resultado</label>
        <input type="text" disabled value="<?=$resultado?>">    
    </form>  
</body>
</html>
