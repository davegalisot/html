<?php
namespace App\Model;

class Producto{

    public $foto;
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $codigo_barras;
    public $fecha_alta;
    public $fecha_modificacion;

    public function __construct($foto=null, $id, $nombre=null, $descripcion=null, $precio=null, $stock=null, $codigo_barras=null, $fecha_alta=null, $fecha_modificacion=null){

        $this->$foto = $foto;
        $this->$id = $id;
        $this->$nombre = $nombre;
        $this->$descripcion = $descripcion;
        $this->$precio = $precio;
        $this->$stock = $stock;
        $this->$codigo_barras = $codigo_barras;
        $this->$fecha_alta = $fecha_alta;
        $this->$fecha_modificacion = $fecha_modificacion;

    }
}