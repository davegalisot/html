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

        //recoge los noticias de la base de datos
        $datos = $this->db->query("select * from noticias where destacado=1");

        $this->view->vistas("app", "index", $datos);
    }

    public function noticias(){

        //recoge los noticias de la base de datos
        $datos = $this->db->query("select * from noticias");

        $this->view->vistas("app", "noticias", $datos);
    }

    public function game_time(){

        //recoge de la db los días marcados por los usuarios
        $data = $this->db->query("select dia, dia2, dia3, dia4, dia5, dia6, dia7 from usuarios where destacado='1'");

        //recoge los datos de los usuarios con el perfil público
        $datos = $this->db->query("select * from usuarios where destacado='1'");

        //recoge los juegos del usuario
        $moreData = $this->db->query("select juego, juego2, juego3, juego4 from usuarios where destacado='1'");

        //recoge de la db las plataformas de los usuarios
        $evenMoreData = $this->db->query("select plat, plat2, plat3, plat4, plat5, plat6 from usuarios where destacado='1'");


        $this->view->vistas("app", "game_time", $datos, $data, $moreData, $evenMoreData);
    }

}