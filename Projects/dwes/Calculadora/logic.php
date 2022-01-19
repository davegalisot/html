<?php

$selector = [
    "moneda" => "Moneda",
    "decimal" => "Decimal",
    "cientifica" => "Científica"
];

$operandos = [
    "suma" => "+",
    "resta" => "-",
    "multiplicacion" => "*",
    "division" => "/"
];

if (empty($seleccion)){
    $seleccion = "";
}

if (empty($operando)){
    $operando = "suma";
}

if (isset($_POST["selector"])){

    $seleccion = $_POST["selector"];

    if (!empty($_POST["operando"])){
        $op = $_POST["operando"];
    }else{
        $op = null;
    }

    if (!empty($_POST["operando2"])){
        $op2 = $_POST["operando2"];
    }else{
        $op2 = null;
    }

    $operando = $_POST["operacion"];

    switch ($operando){
        case "suma":
            $suma = $op + $op2;
            $resultado = opera($suma, $seleccion);
            break;
        case "resta":
            $resta = $op - $op2;
            $resultado = opera($resta, $seleccion);
            break;
        case "multiplicacion":
            $multiplicacion = $op * $op2;
            $resultado = opera($multiplicacion, $seleccion);
            break;
        case "division":
            $division = $op / $op2;
            $resultado = opera($division, $seleccion);
            break;
    }

}else{
    $resultado = 0;
}

function opera($a, $b){
    switch ($b){
        case "moneda":
            $valor = $a."\xE2\x82\xAc";
            break;
        case "decimal":
            $valor = number_format($a,2,".","");
            break;
        case "cientifica":
            $valor = sprintf("%e", $a);
            break;
    }
    return $valor;
}

?>