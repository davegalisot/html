<?php

namespace App\Controller;

use App\Helper\ViewHelper;

class AppController{

    var $view;

    function __construct(){

        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }

    public function index(){

        $this->view->vistas("app", "index");
    }

    public function quienes_somos(){

        $this->view->vistas("app", "quienes_somos");
    }

    public function contacto(){

        if (isset($_POST))
        $this->view->vistas("app", "contacto");
    }

    public function portfolio(){

        $this->view->vistas("app", "portfolio");
    }

    public function movilidad(){

        $this->view->vistas("app", "movilidad");
    }

    public function logistica(){

        $this->view->vistas("app", "logistica");
    }

    public function infraestructura(){

        $this->view->vistas("app", "infraestructura");
    }

    public function analisis(){

        $this->view->vistas("app", "analisis");
    }

    public function consultoria(){

        $this->view->vistas("app", "consultoria");
    }

    public function cookies(){

        $this->view->vistas("app", "cookies");
    }

    public function privacidad(){

        $this->view->vistas("app", "privacidad");
    }

    public function legal(){

        $this->view->vistas("app", "legal");
    }

}