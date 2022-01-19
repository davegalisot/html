<?php
session_start();//inicio de sesión

if (isset($_POST["reiniciar"])) {//comprueba si ha iniciado la partida
    session_destroy();
    session_start();
}

if (!isset($_SESSION["palabra"])){//nueva partida
    //array de palabras desde fichero
    $_SESSION["palabras"] = explode("\n", file_get_contents("files/palabras.txt"));

    //mezcla palabras
    shuffle($_SESSION["palabras"]);

    //extrae la primera palabra
    $_SESSION["palabra"] = array_shift($_SESSION["palabras"]);

    //Búsqueda y reemplazo de caracteres extraños
    $search = ["á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "ü", "Ü", "Ú", "ñ", "Ñ"];
    $replace = ["a", "A", "e", "E", "i", "I", "o", "O", "u", "U", "u", "U", "n", "N"];

    //reemplaza en "palabra" los caracteres acentuados por sus homónimos sin acento.
    $palabra_sin = str_replace($search, $replace, $_SESSION["palabra"]);

    //pasa a minúsculas
    $_SESSION["palabra_sin"] = mb_strtolower($palabra_sin, "utf-8");

    //Array con espacios con la longitud de la palabra
    $resuelta = [];
    for ($i = 0; $i < mb_strlen($_SESSION["palabra_sin"], "utf-8");$i++){
        $resuelta[$i] = "&nbsp;";
    }
    $_SESSION["resuelta"] = $resuelta;

    //array vacio con las letras utilizadas
    $_SESSION["utilizadas"] = [];

    //clase para ocultar el input si ha terminado la partida
    $_SESSION["ocultar"] = "";

    //inicializa los string de fallos para mostrar el monigote
    for ($i = 1; $i <= 6 ;$i++){
        $monigote = "monigote".$i;
        $_SESSION[$monigote] = "";
    }

    //inicializa el mensaje
    $mensaje = "";

    //comprueba si ha escrito una letra
    if (isset($_POST["letra"]) and $_POST["letra"]){
        //la pongo en minúsculas
        $letra = mb_strtolower($_POST["letra"], "utf-8");

        //Si no está en "utilizadas"
        if (!in_array($letra, $_SESSION["utilizadas"])){

            //Si la ha acertado ya
            if (in_array($letra, $_SESSION["resuelta"])){
                $mensaje = "ESA LETRA YA LA HAS ACERTADO";
            }else{
                //inicializa la variable fallo
                $fallo = 1;

                //comprueba si está en la buscada (recursivo)
                for ($i = 0; $i <= mb_strlen($_SESSION["palabra_sin"], "utf-8"); $i++){
                    //si la letra coincide
                    if(mb_strpos($_SESSION["palabra_sin"], $letra,$i, "utf-8") === $i){
                        //rellena la resuelta
                        $_SESSION["resuelta"][$i] = mb_substr($_SESSION["palabra"], $i, 1, "utf-8");
                        $fallo = 0;
                    }
                }
                if ($fallo == 1){
                    //agrega al array de utilizadas
                    array_push($_SESSION["utilizadas"], $letra);

                    //comprueba el nº de errores
                    if(count($_SESSION) == 6){
                        $mensaje = "LO SIENTO, HAS PERDIDO <br/> ERA".$_SESSION["palabra"];
                        $_SESSION["ocultar"] = "ocultar";
                    }else{
                        $mensaje = "LA LETRA NO ESTÁ EN EL ANIMAL";
                    }

                    //Dibuja el monigote
                    for ($i = 1; $i <= count($_SESSION["utilizadas"]); $i++){
                        $monigote = "monigote".$i;
                        $_SESSION["monigote"] = "mostrar";
                    }
                }else{
                    //comprueba si ha terminado
                    if ($_SESSION["palabra"] == implode("", $_SESSION["resuelta"])){
                        $mensaje = "¡ENHORABUENA, HAS TERMINADO!";
                        $_SESSION["ocultar"] = "ocultar";
                    }else{
                        $mensaje = "¡ENHORABUENA, SIGUE ADELANTE!";
                    }
                }
            }

        }else{
            $mensaje = "ESA LETRA YA LA HAS PROBADO";
        }

    }else{
        $mensaje = "NO HAS ESCRITO UNA LETRA";
    }

}else{

}
?>