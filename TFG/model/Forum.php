<?php
namespace App\Model;

class Forum
{
    public $id;
    public $id_ususarios;
    public $titulo;
    public $texto;
    public $fecha;

    public function __construct($id=null, $id_ususarios=null, $titulo=null, $texto=null, $fecha=null)
    {
        $this->$id = $id;
        $this->$id_ususarios = $id_ususarios;
        $this->$titulo = $titulo;
        $this->$texto = $texto;
        $this->$fecha = $fecha;
    }

}