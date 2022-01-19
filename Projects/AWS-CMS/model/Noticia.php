<?php
namespace App\Model;

class Noticia
{
    public $id;
    public $titulo;
    public $slug;
    public $entradilla;
    public $texto;
    public $activo;
    public $home;
    public $fecha;
    public $autor;
    public $imagen;

    function __construct($id=null, $titulo=null, $slug=null ,$entradilla=null, $texto=null, $activo=null, $home=null, $fecha=null, $autor=null, $imagen=null){

        $this->$id = $id;
        $this->$titulo = $titulo;
        $this->$slug = $slug;
        $this->$entradilla = $entradilla;
        $this->$texto = $texto;
        $this->$activo = $activo;
        $this->$home = $home;
        $this->$fecha = $fecha;
        $this->$autor = $autor;
        $this->$imagen = $imagen;

    }
}