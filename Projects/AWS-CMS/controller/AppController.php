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

        $this->view->vistas("app", "index");
    }

    public function acercade(){

        $this->view->vistas("app", "acerca-de");
    }

    public function noticias(){

        //recoge las noticias de la base de datos con el home=1
        $datos = $this->db->query("select * from noticias where home=1");

        $this->view->vistas("app", "noticias", $datos);
    }

    public function noticia($slug){

        //recoge las noticias de la base de datos con el slug pasado
        $datos = $this->db->query("select * from noticias where slug='$slug'");

        $this->view->vistas("app", "noticia", $datos);
    }
}