<?php

namespace App\Controller;

use App\Model\Contacto;
use App\Helper\ViewHelper;

class ContactoController{

    public function index(){

        $contacto = new Contacto("David", "Galiana Sotillo", 34, null);

        $contacto->setEmail("davegalisot@gmail.com");

        //Invoca el View Helper
        $view = new ViewHelper();

        //Le paso los datos a la Vista
        $view->vista("index", $contacto);

    }
}