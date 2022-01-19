<?php

class ContactoController{

    public function index(){

        $contacto = new Contacto("David", "Galiana Sotillo", 34, null);

        $contacto->setEmail("davegalisot@gmail.com");

        //Le paso los datos a la Vista
        require ("View/index.php");

    }

    public function editar(){

        //Coge los datos de la Vista
        require("View/editar.php");

    }
}