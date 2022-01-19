<?php

//Crear o definir una clase
class Contacto{
    //Variables o atributos
    var $nombre;
    var $apellidos;
    var $edad;
    var $email;

    //Funciones o métodos
    function setNombre($miNombre){
        $this->nombre = $miNombre;
    }

    function getNombre(){
        return $this->nombre;
    }
}

//Insertar o utilizar una clase
$mi_contacto = new Contacto;

//Accedo a las funciones
$mi_contacto->setNombre("David");
echo "El contacto se llama ".$mi_contacto->setNombre().".";

//or
$mi_contacto->nombre = "Pepe";
echo "El contacto se llama ".$mi_contacto->nombre.".";
echo "a";