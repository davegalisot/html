<?php
//Incluye los archivos necesarios
require("Controller/ContactoController.php");
require("Model/Contacto.php");

//Instancia el controlador
$controller = new ContactoController();

//Ruta de la HOME
$home = "/poo/ejemplo4Editar/index.php";

//Comprueba lo que m epiden
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

if ($ruta == "/editar"){
    $controller->editar();
}else{
    $controller->index();
}
