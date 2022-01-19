<?php
session_start();//comienzo de sesión

$ciudades = [
    "Madrid",
    "Barcelona",
    "Valencia",
    "Sevilla",
    "Zaragoza",
    "Málaga",
    "Murcia",
    "Palma",
    "Bilbao",
    "Alicante",
    "Córdoba",
    "Valladolid",
    "Vitoria",
    "Granada",
    "Oviedo",
    "Granada",
    "Ciudad Real",
    "Pamplona",
    "Huesca",
    "Burgos",
    "Albacete",
    "Santander",
    "Logroño",
    "Badajoz",
    "Huelva",
    "Salamanca",
    "Las Palmas de Gran Canaria",
    "Lérida",
    "Tarragona",
    "León",
    "Cádiz",
    "Jaén",
    "Teruel",
    "Girona",
    "Lugo",
    "Santiago de Compostela",
    "Cáceres",
    "Melilla",
    "Ceuta",
    "Guadalajara",
    "Toledo",
    "Pontevedra",
    "Palencia",
    "Zamora",
    "Mérida",
    "Ávila",
    "Cuenca",
    "Orense",
    "Segovia",
    "Castellón de la Plana",
    "Soria",
    "Calatayud",
    "San Sebastián",
];//array de ciudades

//array para comprobar con la letra introducida
$letraA = ["A", "a", "Á", "á"];
$letraE = ["E", "e", "É", "é"];
$letraI = ["I", "i", "Í", "í"];
$letraO = ["O", "o", "Ó", "ó"];
$letraU = ["U", "u", "Ú", "ú", "ü", "Ü"];
$letraN = ["ñ", "Ñ"];

$aleatorio = rand(0, count($ciudades) - 1);//genera un numero aleatorio con la longitud del array (como numero max) de ciudades

if (isset($_POST["reiniciar"])) {//reinicio de sesión
    session_destroy();
    header("Location: index.php");
}

//Inicialización de variables
if (!isset($_SESSION["palabra"])) {
    $_SESSION["aleatorio"] = $aleatorio;
    $_SESSION["palabra"] = $ciudades[$_SESSION["aleatorio"]];
    $_SESSION["intentos"] = 0;
    $_SESSION["flag"] = false;//Control para saber si la letra introducida está en la palabra
    $_SESSION["ganado"] = "";
    $_SESSION["intentosRestantes"] = mb_strlen($_SESSION["palabra"], "UTF-8");
    $_SESSION["fallos"] = array();
    $_SESSION["espacios"] = 0;

    for ($i = 0; $i < mb_strlen($_SESSION["palabra"], "UTF-8"); $i++) {//recorre la palabra seleccionada aleatoriamente
        if (mb_substr($_SESSION["palabra"], $i, 1, "UTF-8") === " ") {
            $_SESSION["espacios"]++;
        }
        $_SESSION["letra" . $i] = "";//rellena un array
    }
}

if (isset($_POST["introducido"])) {//Si se ha introducido algun caracter
    $letra = ($_POST["introducido"]);

    for ($i = 0; $i < mb_strlen($_SESSION["palabra"], "UTF-8"); $i++) {
        switch ($letra) {
            case "a":
                foreach ($letraA as $valor) {
                    buscaLetra($valor, $i, $_SESSION["palabra"]);
                }
                break;
            case "e":
                foreach ($letraE as $valor) {
                    buscaLetra($valor, $i, $_SESSION["palabra"]);
                }
                break;
            case "i":
                foreach ($letraI as $valor) {
                    buscaLetra($valor, $i, $_SESSION["palabra"]);
                }
                break;
            case "o":
                foreach ($letraO as $valor) {
                    buscaLetra($valor, $i, $_SESSION["palabra"]);
                }
                break;
            case "u":
                foreach ($letraU as $valor) {
                    buscaLetra($valor, $i, $_SESSION["palabra"]);
                }
                break;
            case "ñ":
                foreach ($letraN as $valor) {
                    buscaLetra($valor, $i, $_SESSION["palabra"]);
                }
                break;
        }
        //compara la letra introducida con la palabra seleccionada tanto mayuscula como minuscula
        if (mb_substr($_SESSION["palabra"], $i, 1, "UTF-8") === strtolower($letra)) {
            $_SESSION["letra" . $i] = strtolower($letra);
            $_SESSION["flag"] = true;
        }
        if (mb_substr($_SESSION["palabra"], $i, 1, "UTF-8") === strtoupper($letra)) {
            $_SESSION["letra" . $i] = strtoupper($letra);
            $_SESSION["flag"] = true;
        }
    }
    if ($_SESSION["flag"] == false) {
        if (!in_array($letra, $_SESSION["fallos"])) {
            array_push($_SESSION["fallos"], $letra);
            $_SESSION["intentos"]++;
        }
    } else {
        $_SESSION["flag"] = false;
    }
    compruebaIntentosRestantes();
    if ($_SESSION["intentos"] >= 6) {//Si se muestra el monigote entero
        $_SESSION["ganado"] = "HAS PERDIDO!";
    }
    if ($_SESSION["intentosRestantes"] - $_SESSION["espacios"] == 0) {
        $_SESSION["ganado"] = "HAS GANADO!";
    }
}

//función para comprobar la letra introducida con sus posibles characteres acentuados
function buscaLetra($a, $b, $c)
{
    if (mb_substr($c, $b, 1, "UTF-8") === $a) {
        $_SESSION["letra" . $b] = $a;
        $_SESSION["flag"] = true;
    }
}

//recorre la palabra y cuenta los huecos vacíos para saber cuántos intentos quedan
function compruebaIntentosRestantes()
{
    $_SESSION["intentosRestantes"] = 0;
    for ($i = 0; $i < mb_strlen($_SESSION["palabra"], "UTF-8"); $i++) {
        if ($_SESSION["letra" . $i] == "") {
            $_SESSION["intentosRestantes"]++;
        }
    }
    return $_SESSION["intentosRestantes"] - $_SESSION["espacios"];

}

?>