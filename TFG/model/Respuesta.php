<?php
namespace App\Model;

class Respuesta
{
    public $id;
    public $id_forum;
    public $id_ususario;
    public $texto;
    public $fecha;

    public function __construct($id=null, $id_forum=null, $id_ususario=null, $texto=null, $fecha=null)
    {
        $this->$id = $id;
        $this->$id_forum = $id_forum;
        $this->$id_ususario = $id_ususario;
        $this->$texto = $texto;
        $this->$fecha = $fecha;
    }

}