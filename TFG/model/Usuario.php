<?php
namespace App\Model;

class Usuario
{
    public $id;
    public $usuario;
    public $clave;
    public $fecha_alta;
    public $ult_acceso;
    public $activo;
    public $admin;
    public $nombre;
    public $correo;
    public $provincia;
    public $ciudad;
    public $horario_init;
    public $horario_fin;
    public $dia1;
    public $dia2;
    public $dia3;
    public $dia4;
    public $dia5;
    public $dia6;
    public $dia7;
    public $juego1;
    public $juego2;
    public $juego3;
    public $juego4;

    public function __construct($id=null, $usuario=null, $clave=null, $fecha_alta=null, $ult_acceso=null, $activo=null,
                                $admin=null, $nombre=null, $correo=null, $provincia=null, $ciudad=null, $horario_init=null,
                                $horario_fin=null, $dia1=null, $dia2=null, $dia3=null, $dia4=null, $dia5=null, $dia6=null,
                                $dia7=null, $juego1=null, $juego2=null, $juego3=null, $juego4=null)
    {
        $this->$id = $id;
        $this->$usuario = $usuario;
        $this->$clave = $clave;
        $this->$fecha_alta = $fecha_alta;
        $this->$ult_acceso = $ult_acceso;
        $this->$activo = $activo;
        $this->$admin = $admin;
        $this->$nombre = $nombre;
        $this->$correo = $correo;
        $this->$provincia = $provincia;
        $this->$ciudad = $ciudad;
        $this->$horario_init = $horario_init;
        $this->$horario_fin = $horario_fin;
        $this->$dia1 = $dia1;
        $this->$dia2 = $dia2;
        $this->$dia3 = $dia3;
        $this->$dia4 = $dia4;
        $this->$dia5 = $dia5;
        $this->$dia6 = $dia6;
        $this->$dia7 = $dia7;
        $this->$juego1 = $juego1;
        $this->$juego2 = $juego2;
        $this->$juego3 = $juego3;
        $this->$juego4 = $juego4;
    }

}