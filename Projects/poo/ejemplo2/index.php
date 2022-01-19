<?php

//Crear o definir una clase
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
}

//Instanciar la clase
$mi_contacto = new Contacto("David", "Galiana Sotillo", 34, "davegalisot@gmail.com");
echo "El contacto se llama $mi_contacto->nombre $mi_contacto->apellidos, tiene $mi_contacto->edad años y su email es $mi_contacto->email";
