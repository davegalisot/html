<?php

class Contacto{
    //Variables o atributos
    var $nombre;
    var $apellidos;
    var $edad;
    var $email;

    //Constructor
    function __construct($miNombre, $misApellidos, $miEdad, $miEmail){
        $this->nombre = $miNombre;
        $this->apellidos = $misApellidos;
        $this->edad = $miEdad;
        $this->email = $miEmail;
    }

    public function setEmail($miEmail){

        $this->email = $miEmail;
    }

    public function getEmail(){
        return $this->email;
    }
}