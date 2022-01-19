<?php

namespace App\Helper;

class ViewHelper{

    public function vistas($carpeta, $archivo, $datos=null){

        require("../view/$carpeta/partials/header.php");
        require("../view/$carpeta/partials/mensajes.php");
        require("../view/$carpeta/$archivo.php");
        require("../view/$carpeta/partials/footer.php");

    }

    //mensaje y redirección
    public function mensaje($tipo, $texto, $redireccion){

        $_SESSION['mensaje'] = array("tipo" => $tipo, "texto" => $texto);
        header("Location:" . $_SESSION["home"] . $redireccion);

    }

}