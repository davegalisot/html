<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;

class AppController{

    var $view;
    var $db;

    function __construct(){

        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;
    }

    public function index(){

        //recoge las noticias de la base de datos con el id pasado
        $datos = $this->db->query("select * from productos where destacado=1");

        $this->view->vistas("app", "index", $datos);
    }

    public function acerca(){

        $this->view->vistas("app", "acerca");
    }

    public function contacto(){

        $this->view->vistas("app", "contacto");
    }

    public function productos(){

        //recoge los productos de la base de datos
        $datos = $this->db->query("select * from productos");

        $this->view->vistas("app", "productos", $datos);
    }

    public function producto($id){

        //recoge las noticias de la base de datos con el id pasado
        $datos = $this->db->query("select * from productos where id='$id'");

        $this->view->vistas("app", "producto", $datos);
    }
}