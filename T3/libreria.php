<?php

function deEurosAMoneda(float $cantidad, float $cambio): float {
    return $cantidad / $cambio;
}

function deMonedaAEuros(float $cantidad, float $cambio): float {
    return $cantidad * $cambio;
}

function pasoPorReferencia (float &$can, float $cM){
    echo "<p> >> Al entrar en la función los valores de las variables son cantidad: ".$can." y cambio: ".$cM."</p>";  
    $can *= $cM; // $can = $can * $cM
    $can ++; // $can = $can + 1;
    echo "<p> >> Al salir de la función los valores de las variables son cantidad: ".$can." y cambio: ".$cM."</p>";
}

function pasoPorReferenciaFake (float $can, float $cam){
    echo "<p> >> Al entrar en la función los valores de las variables son cantidad: ".$can." y cambio: ".$cam."</p>";
    $can *= $cam;
    $can ++;
    echo "<p> >> Al salir de la función los valores de las variables son cantidad: ".$can." y cambio: ".$cam."</p>";
}

?>