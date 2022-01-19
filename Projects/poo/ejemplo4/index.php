<?php
//Incluye los archivos necesarios
require("Controller/ContactoController.php");
require("Model/Contacto.php");

//Instancia el controlador
$controller = new ContactoController();

//Ejecuta el método por defecto del controlador (podía hacer un construct)
$controller->index();