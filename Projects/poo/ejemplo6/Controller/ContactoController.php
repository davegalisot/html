<?php

namespace App\Controller;

use App\Model\Contacto;

class ContactoController{

    public function index(){

        $contacto = new Contacto("David", "Galiana Sotillo", 34, null);

        $contacto->setEmail("davegalisot@gmail.com");

        //Le paso los datos a la Vista
        require ("View/index.php");

    }
}