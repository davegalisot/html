<?php

namespace App\Helper;

class ViewHelper{

    public function vistas($carpeta, $archivo){

        require("../view/$carpeta/partials/header.php");
        require("../view/$carpeta/partials/menu.php");
        require("../view/$carpeta/$archivo.php");
        require("../view/$carpeta/partials/footer.php");

    }

}