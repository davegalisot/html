<?php

namespace App\Helper;

class ViewHelper{

    public function vista($vista, $datos){

        $archivo = "View/$vista.php";
        require($archivo);

    }
}