<?php

namespace App;

session_start();

use App\Controller\AppController;

//asigna a sesión las rutas de las carpetas public y home
$_SESSION["public"] = "/trntaryet/public/";
$_SESSION["home"] = $_SESSION["public"]."index.php/";

//asigna a la sesión la carpeta de img del servidor
$_SESSION["img"] = "/var/www/html/".$_SESSION["public"]."img/";

//Define la función que autocargará las clases cuando se instancien
spl_autoload_register("App\autoload");

function autoload($clase,$dir=null){

    //Directorio raíz del proyecto
    if (is_null($dir)){
        $dirname = str_replace('/public', '', dirname(__FILE__));
        $dir = realpath($dirname);
    }

    //Escanea en busca de la clase de forma recursiva
    foreach (scandir($dir) as $file){
        //Si es un directorio (y no es de sistema) accedo y
        //busca la clase dentro de él
        if (is_dir($dir."/".$file) AND substr($file, 0, 1) !== '.'){
            autoload($clase, $dir."/".$file);
        }
        //Si es un fichero y el nombre conicide con el de la clase
        else if (is_file($dir."/".$file) AND $file == substr(strrchr($clase, "\\"), 1).".php"){
            require($dir."/".$file);
        }
    }
}

//Quita la home a la ruta que me están pidiendo
$ruta = str_replace($_SESSION["home"], '', $_SERVER["REQUEST_URI"]);

//Crea el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));

//Número de componentes de la ruta
$numero = count($array_ruta);

//Enrutamientos
/*
    /
    /inicio
    /quienes somos
    /qué hacemos
    /contacto

 */

switch($numero){
    case 0:
        controlador()->index();
        break;
    case 1:
        switch($array_ruta[0]){
            case "trabaja_con_nosotros":
                controlador()->trabaja_con_nosotros();
                break;
            case "quienes_somos":
                controlador()->quienes_somos();
                break;
            case "contacto":
                controlador()->contacto();
                break;
            case "portfolio":
                controlador()->portfolio();
                break;
            case "movilidad":
                controlador()->movilidad();
                break;
            case "logistica":
                controlador()->logistica();
                break;
            case "infraestructura":
                controlador()->infraestructura();
                break;
            case "analisis":
                controlador()->analisis();
                break;
            case "consultoria":
                controlador()->consultoria();
                break;
            case "cookies":
                controlador()->cookies();
                break;
            case "privacidad":
                controlador()->privacidad();
                break;
            case "legal":
                controlador()->legal();
                break;
            default:
                controlador()->index();
        }
        break;
    default:
        controlador()->index();
}

//Para invocar el controlador en cada caso
function controlador(){
    return new AppController;
}