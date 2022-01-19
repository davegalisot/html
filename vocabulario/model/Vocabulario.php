<?php
namespace App\Model;

class Vocabulario
{
    public $id;
    public $nombre;
    public $valor;
    public $valor2;
    public $valor3;
    public $categoria;

    public function __construct($id=null, $nombre=null, $valor=null, $valor2=null, $valor3=null, $categoria=null)
    {
        $this->$id = $id;
        $this->$nombre = $nombre;
        $this->$valor = $valor;
        $this->$valor2 = $valor2;
        $this->$valor3 = $valor3;
        $this->$categoria = $categoria;
    }

}