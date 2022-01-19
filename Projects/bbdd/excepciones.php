<?php

$dividendo = 3;
$divisor = 1;

try {
    if ($divisor == 0){
        throw new Exception("División por cero.");

    }
    echo $dividendo / $divisor;
}
catch (Exception $e) {
    echo "Se ha producido el siguiente error: ".$e->getMessage();
}