<?php
namespace App\Model;

class Noticia{

    public $id;
    public $web;
    public $titulo;
    public $descripcion;
    public $url;
    public $destacado;

    public function __construct($id=null, $web=null, $titulo=null, $descripcion=null, $url=null, $destacado=null)
    {
        $this->$id = $id;
        $this->$web = $web;
        $this->$titulo = $titulo;
        $this->$descripcion = $descripcion;
        $this->$url = $url;
        $this->$destacado = $destacado;
    }


}