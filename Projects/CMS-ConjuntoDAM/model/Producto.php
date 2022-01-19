<?php
namespace App\Model;

class Producto{

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $fechaalta;
    public $fechamodificacion;
    public $destacado;
    public $texto1;
    public $texto2;
    public $texto3;
    public $texto4;

    public function __construct($id=null, $nombre=null, $descripcion=null, $precio=null, $stock=null, $fechaalta=null,
                                $fechamodificacion=null, $destacado=null ,$texto1=null, $texto2=null, $texto3=null, $texto4=null){

        $this->$id = $id;
        $this->$nombre = $nombre;
        $this->$descripcion = $descripcion;
        $this->$precio = $precio;
        $this->$stock = $stock;
        $this->$fechaalta = $fechaalta;
        $this->$fechamodificacion = $fechamodificacion;
        $this->$destacado = $destacado;
        $this->$texto1 = $texto1;
        $this->$texto2 = $texto2;
        $this->$texto3 = $texto3;
        $this->$texto4 = $texto4;

    }
}