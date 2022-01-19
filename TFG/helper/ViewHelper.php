<?php

namespace App\Helper;

class ViewHelper
{

    public function vistas($carpeta, $archivo, $datos=null, $data=null, $moreData=null, $evenMoreData=null,
                           $dataEverywhere=null){

        require("../view/$carpeta/partials/header.php");
        require("../view/$carpeta/partials/menu.php");
        require("../view/$carpeta/partials/mensajes.php");
        require("../view/$carpeta/$archivo.php");
        require("../view/$carpeta/partials/footer.php");

    }

    public function mensaje($tipo, $texto, $redireccion){

        $_SESSION['mensaje'] = array("tipo" => $tipo, "texto" => $texto);
        header("Location:".$_SESSION["home"].$redireccion);

    }

    public function permisos($permiso=null){


        if (isset($_SESSION['usuario']) and ($permiso == null or $_SESSION['usuario']->$permiso == 1)){
            return true;
        }
        else{
            $this->mensaje("warning", "No tienes permiso para realizar esta operación", "panel");
        }

    }

    public function isLogged(){

        return (isset($_SESSION['usuario'])) ? true : false;

    }

}