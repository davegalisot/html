<?php

namespace App;

session_start();

use App\Controller\AppController;
use App\Controller\ProductoController;
use App\Controller\UsuarioController;

//asigna a sesión las rutas de las carpetas public y home
$_SESSION["public"] = "/Projects/CMS-ConjuntoDAM/public/";
$_SESSION["home"] = $_SESSION["public"]."index.php/";

//asigna a la sesión la carpeta de img del servidor
$_SESSION["img"] = "/var/www/html".$_SESSION["public"]."img/";

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
        //Si es un fichero y el nombr conicide con el de la clase
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
    /acerca-de
    /productos
    /producto/id

    /panel/entrar (o solo /panel)
    /panel/salir
    /panel/usuarios
    /panel/usuarios/crear
    /panel/usuarios/editar/id
    /panel/usuarios/activar/id
    /panel/usuarios/borrar/id
    /panel/productos
    /panel/productos/crear
    /panel/productos/editar/id
    /panel/productos/activar/id
    /panel/productos/destacado/id
    /panel/productos/borrar/id
 */

switch($numero){
    case 0:
        controlador()->index();
        break;

    case 1:
        switch($array_ruta[0]){
            case "productos":
                controlador()->productos();
                break;
            case "acerca":
                controlador()->acerca();
                break;
            case "contacto":
                controlador()->contacto();
                break;
            case "panel":
                controlador("usuarios")->entrar();
                break;
            default:
                controlador()->index();
        }
        break;

    case 2:
        if ($array_ruta[0] == "producto"){
            controlador()->producto($array_ruta[1]);
        }
        else{
            switch($array_ruta[0]."/".$array_ruta[1]){
                case "panel/entrar":
                    controlador("usuarios")->entrar();
                    break;
                case "panel/salir":
                    controlador("usuarios")->salir();
                    break;
                case "panel/usuarios":
                    controlador("usuarios")->index();
                    break;
                case "panel/productos":
                    controlador("productos")->index();
                    break;
                default:
                    controlador()->index();
            }
        }
        break;
    case 3:
        switch($array_ruta[0]."/".$array_ruta[1]."/".$array_ruta[2]){
            case "panel/usuarios/crear":
                controlador("usuarios")->crear();
                break;
            case "panel/productos/crear":
                controlador("productos")->crear();
                break;
            default:
                controlador()->index();
        }
        break;
    case 4:
        switch($array_ruta[0]."/".$array_ruta[1]."/".$array_ruta[2]){
            case "panel/usuarios/editar":
            case "panel/usuarios/activar":
            case "panel/usuarios/borrar":
            case "panel/productos/editar":
            case "panel/productos/activar":
            case "panel/productos/borrar":
            case "panel/productos/destacado":
                $accion = $array_ruta[2];
                controlador($array_ruta[1])->$accion($array_ruta[3]);
                break;
            default:
                controlador()->index();
        }
        break;
    default:
        controlador()->index();
}

//Para invocar el controlador en cada caso
function controlador($texto=null){

    switch($texto){
        default: return new AppController;
        case "productos": return new ProductoController;
        case "usuarios": return new UsuarioController;
    }

}