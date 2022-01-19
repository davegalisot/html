//TODO rellenar tags en el array productos

<?php
session_start();

//He utilizado sesiones, para reiniciarla click en "Tienda de Deportes" en el HEADER

$busqueda = "";

//Array de productos
$productos = [
    array(
        "nombre" => "Set de Raqueta de tenis + pelota",
        "precio" => "49,95",
        "stock" => "27",
        "img" => "tenis",
        "tags" => "set-raqueta-tenis-pelota"
    ),
    array(
        "nombre" => "Set de pesas",
        "precio" => "59,95",
        "stock" => "14",
        "img" => "pesas"
    ),
    array(
        "nombre" => "Set de bate de béisbol + pelota",
        "precio" => "29,95",
        "stock" => "12",
        "img" => "beisbol"
    ),
    array(
        "nombre" => "Set de bolos",
        "precio" => "129,95",
        "stock" => "8",
        "img" => "bolos"
    ),
    array(
        "nombre" => "Diana",
        "precio" => "89,95",
        "stock" => "16",
        "img" => "diana"
    ),
    array(
        "nombre" => "Bicicleta",
        "precio" => "249,95",
        "stock" => "3",
        "img" => "bicicleta"
    ),
    array(
        "nombre" => "Monopatín",
        "precio" => "69,95",
        "stock" => "1",
        "img" => "monopatin"
    ),
    array(
        "nombre" => "Balón de fútbol",
        "precio" => "19,95",
        "stock" => "28",
        "img" => "futbol"
    ),
    array(
        "nombre" => "Balón de baloncesto",
        "precio" => "19,95",
        "stock" => "26",
        "img" => "baloncesto"
    ),
    array(
        "nombre" => "Balón de rugby",
        "precio" => "25,95",
        "stock" => "4",
        "img" => "rugby"
    ),
];

if (!isset($_SESSION["productos"])){//Inicialización de variables
    $_SESSION["productos"] = $productos;//Introduce en sesión el array de productos.
    $_SESSION["contNombre"] = 0;//Contador para saber cuántas veces se ha clickeado en los botones de ordenación
    $_SESSION["contPrecio"] = 0;//Contador para saber cuántas veces se ha clickeado en los botones de ordenación
    $_SESSION["contStock"] = 0;//Contador para saber cuántas veces se ha clickeado en los botones de ordenación
    $busqueda = "";
}

if (isset($_POST["inicializar"])){//Botón usado para reinicializar la sesión (en el HEADER)
    session_destroy();
}

//Ordena los precios de menor a mayor con MULTISORT, si se clickea una segunda vez, ordena de mayor a menor
if (isset($_POST["precio"])){
    //Contadores
    $_SESSION["contPrecio"]++;//Cuenta el número de veces que se ha hecho click en el botón nombre
    //Reseta los otros contadores
    $_SESSION["contNombre"] = 0;
    $_SESSION["contStock"] = 0;

    if ($_SESSION["contPrecio"] == 2){
        foreach ($_SESSION["productos"] as $key => $valor) {
            $precio[$key] = $valor["precio"];
        }
        array_multisort($precio, SORT_DESC, $_SESSION["productos"]);
        $_SESSION["contPrecio"] = 0;//Si se ha clickeado una vez entra y lo resetea para la siguiente
    }else{
        foreach ($_SESSION["productos"] as $key => $valor) {
            $precio[$key] = $valor["precio"];
        }
        array_multisort($precio, SORT_NUMERIC, $_SESSION["productos"]);
    }
}else{
    usort($_SESSION["productos"], function ($a, $b){//ordena mediante función de comparación por NOMBRE
        return strcmp($a["nombre"], $b["nombre"]);
    });
}

//Ordena los precios de menor a mayor con MULTISORT, si se clickea una segunda vez, ordena de mayor a menor
if (isset($_POST["stock"])){
    //Contadores
    $_SESSION["contStock"]++;//Cuenta el número de veces que se ha hecho click en el botón nombre
    //Reseta los otros contadores
    $_SESSION["contNombre"] = 0;
    $_SESSION["contPrecio"] = 0;

    if($_SESSION["contStock"] == 2){
        foreach ($_SESSION["productos"] as $key => $valor) {
            $stock[$key] = $valor["stock"];
        }
        array_multisort($stock, SORT_DESC, $_SESSION["productos"]);
        $_SESSION["contStock"] = 0;//Si se ha clickeado una vez entra y lo resetea para la siguiente
    }else{
        foreach ($_SESSION["productos"] as $key => $valor) {
            $stock[$key] = $valor["stock"];
        }
        array_multisort($stock, SORT_NUMERIC, $_SESSION["productos"]);
    }
}

if (isset($_POST["nombre"])){
    //Contadores
    $_SESSION["contNombre"]++;//Cuenta el número de veces que se ha hecho click en el botón nombre
    //Reseta los otros contadores
    $_SESSION["contPrecio"] = 0;
    $_SESSION["contStock"] = 0;

    if ($_SESSION["contNombre"] == 2){//Ordena descentemente si ya se ha clickeado
        usort($_SESSION["productos"], function ($b, $a){//ordena mediante función de comparación
            return strcmp($a["nombre"], $b["nombre"]);
        });
        $_SESSION["contNombre"] = 0;//Si se ha clickeado una vez entra y lo resetea para la siguiente
    }else{
        usort($_SESSION["productos"], function ($a, $b){
            return strcmp($a["nombre"], $b["nombre"]);
        });
    }
}

if (isset($_POST["botonBusqueda"])){//Al hacer click en el botón de buscar

    $buscar = filter_input(INPUT_POST, "busqueda", FILTER_SANITIZE_SPECIAL_CHARS);

    $filtro = explode(" ", $buscar);

    $array_filtrado = array_filter($productos, function ($var) use ($buscar) {
        return ($var['nombre'] != preg_match("/\b".$buscar."\b/",$var['nombre']));
    });

    $_SESSION["productos"] = $array_filtrado;

}else{
    $busqueda = "";
}

if (isset($_POST["limpiarBusqueda"])){
    session_destroy();
}

?>