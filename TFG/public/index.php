<?php

namespace App;

session_start();

use App\Controller\AppController;
use App\Controller\NoticiaController;
use App\Controller\RespuestaController;
use App\Controller\UsuarioController;
use App\Controller\ForumController;

//asigna a sesión las rutas de las carpetas public y home
$_SESSION["public"] = "/TFG/public/";
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
    /noticias
    /gametime
    /forum

    /forum/post
    /forum/crear
    /forum/editar/id
    /forum/borrar/id

    /respuestas/crear
    /respuestas/editar/id
    /respuestas/borrar/id

    /panel/entrar (o solo /panel)
    /panel/salir
    /panel/usuarios
    /panel/usuarios/crear
    /panel/usuarios/editar/id
    /panel/usuarios/activar/id
    /panel/usuarios/borrar/id
    /panel/noticias
    /panel/noticias/crear
    /panel/noticias/editar/id
    /panel/noticias/activar/id
    /panel/noticias/destacado/id
    /panel/noticias/borrar/id
 */

switch($numero){
    case 0:
        controlador()->index();
        break;
    case 1:
        switch($array_ruta[0]){
            case "noticias":
                controlador()->noticias();
                break;
            case "panel":
                controlador("usuarios")->entrar();
                break;
            case "forum":
                controlador("forum")->index();
                break;
            case "game_time":
                controlador()->game_time();
                break;
            case "mensajeria":
                controlador("mensajeria")->index();
                break;
            default:
                controlador()->index();
        }
        break;
    case 2:
        switch ($array_ruta[0] . "/" . $array_ruta[1]) {
            case "panel/entrar":
                controlador("usuarios")->entrar();
                break;
            case "panel/salir":
                controlador("usuarios")->salir();
                break;
            case "panel/usuarios":
                controlador("usuarios")->index();
                break;
            case "panel/noticias":
                controlador("noticias")->index();
                break;
            case "forum/crear":
                controlador("forum")->crear();
                break;
            case "respuestas/crear":
                controlador("respuestas")->crear();
                break;
            default:
                controlador()->index();
        }
        break;
    case 3:
        if ($array_ruta[0] == "forum") {
            switch ($array_ruta[0] . "/" . $array_ruta[1]) {
                case "forum/post":
                case "forum/editar":
                case "forum/borrar":
                    $accion = $array_ruta[1];
                    controlador($array_ruta[0])->$accion($array_ruta[2]);
                    break;
                default:
                    controlador("forum")->index();
            }
        }else if ($array_ruta[0] == "respuestas") {
            switch ($array_ruta[0] . "/" . $array_ruta[1]) {
                case "respuestas/editar":
                    controlador("respuestas")->editar($array_ruta[2]);
                    break;
                default:
                    controlador("respuestas")->index();
            }
        }else if ($array_ruta[0] == "mensajeria") {
            switch ($array_ruta[0] . "/" . $array_ruta[1]) {
                case "mensajeria/mensaje":
                case "mensajeria/editar":
                case "mensajeria/borrar":
                    $accion = $array_ruta[1];
                    controlador($array_ruta[0])->$accion($array_ruta[2]);
                break;
                default:
                    controlador("mensajeria")->index();
            }
        }else{
            switch($array_ruta[0]."/".$array_ruta[1]."/".$array_ruta[2]){
                case "panel/usuarios/crear":
                    controlador("usuarios")->crear();
                    break;
                case "panel/noticias/crear":
                    controlador("noticias")->crear();
                    break;
                default:
                    controlador()->index();
            }
        }
        break;
    case 4:
        switch($array_ruta[0]."/".$array_ruta[1]."/".$array_ruta[2]){
            case "panel/usuarios/editar":
            case "panel/usuarios/activar":
            case "panel/usuarios/borrar":
            case "panel/noticias/editar":
            case "panel/noticias/activar":
            case "panel/noticias/borrar":
            case "panel/noticias/destacado":
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
        case "forum":
            return new ForumController;
            break;
        case "respuestas":
            return new RespuestaController;
            break;
        case "noticias":
            return new NoticiaController;
            break;
        case "usuarios":
            return new UsuarioController;
            break;
        default:
            return new AppController;
    }

}