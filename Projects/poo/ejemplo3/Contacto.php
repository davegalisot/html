<?php

class Contacto{
    //Variables o atributos
    var $nombre;
    var $apellidos;
    var $edad;
    var $email;

    /*function Contacto($miNombre, $misApellidos, $miEdad, $miEmail){//Comentado porque ya no se usa
        $this->nombre = $miNombre;
        $this->apellidos = $misApellidos;
        $this->edad = $miEdad;
        $this->email = $miEmail;
    }*/

    function __construct($miNombre, $misApellidos, $miEdad, $miEmail){
        $this->nombre = $miNombre;
        $this->apellidos = $misApellidos;
        $this->edad = $miEdad;
        $this->email = $miEmail;
    }

    function setEmail($miEmail){

        $this->email = $miEmail;
    }
}