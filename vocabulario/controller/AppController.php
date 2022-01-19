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

        //borra mensajes
        unset($_SESSION["mensaje"]);

        //recoge datos de la base de datos
        $datos = $this->db->query("select * from contenido where habilitado=1 order by rand() limit 1");

        //redirige a la página
        $this->view->vistas("app", "index", $datos);

    }

    public function editar(){

        if (isset($_POST["guardar"])) {
            //recogo los valores del formulario
            $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
            $valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_STRING);
            $valor2 = filter_input(INPUT_POST, "valor2", FILTER_SANITIZE_STRING);
            $valor3 = filter_input(INPUT_POST, "valor3", FILTER_SANITIZE_STRING);
            $categoria = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_STRING);
            $comentario = filter_input(INPUT_POST, "comentario", FILTER_SANITIZE_STRING);

            //compruebo que en "$nombre" ninguno de los valores introducidos contiene números
            if (strcspn($nombre, '0123456789') != strlen($nombre)) {
                $flag_nombre = true;
            }else {
                $flag_nombre = false;
            }

            //compruebo que "$valor" ninguno de los valores introducidos contiene números
            if (strcspn($valor, '0123456789') != strlen($valor)) {
                $flag_valor = true;
            }else {
                $flag_valor = false;
            }

            if ($nombre == "" or $valor == "") {
                //mensaje
                $this->view->mensaje("warning", "No puedo guardar valores vacíos, feo!", "editar");

                //recoge datos de la base de datos
                $datos = $this->db->query("select * from contenido order by nombre asc");

                //redirige a la página
                $this->view->vistas("app", "editar", $datos);

            }elseif ($flag_nombre == true or $flag_valor == true){
                //mensaje
                $this->view->mensaje("warning", "No puedo guardar números, feo!", "editar");

                //recoge datos de la base de datos
                $datos = $this->db->query("select * from contenido order nombre by asc");

                //redirige a la página
                $this->view->vistas("app", "editar", $datos);

            }else{
                //Crea una nueva palabra
                $consulta = $this->db->exec("INSERT INTO contenido (nombre, valor, valor2, valor3, categoria, comentario)
                                                        VALUES (LOWER('$nombre'),LOWER('$valor'),LOWER('$valor2'),LOWER('$valor3'),LOWER('$categoria'),LOWER('$comentario'))");

                //Mensaje
                ($consulta > 0) ?
                    $this->view->mensaje("success", "La palabra se ha añadido correctamente", "editar") :
                    $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos, póngase en contacto con el PUTO AMO aka DAVEGALISOT", "editar");

                //recoge datos de la base de datos
                $datos = $this->db->query("select * from contenido order by nombre asc");

                //redirige a la página
                $this->view->vistas("app", "editar", $datos);
            }

        }else{
            //recoge datos de la base de datos
            $datos = $this->db->query("select * from contenido order by nombre asc");

            //redirige a la página
            $this->view->vistas("app", "editar", $datos);

        }

    }

    public function borrar($id){

        //Borro la palabra
        $consulta = $this->db->exec("DELETE FROM contenido WHERE id='$id'");
        //Mensaje y redirección
        ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
            $this->view->mensaje("success", "La palabra se ha borrado correctamente.", "editar") :
            $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos, póngase en contacto con el PUTO AMO aka DAVEGALISOT", "editar");

    }

    public function habilitar($id){

        //Obtengo la palabra
        $resultado = $this->db->query("SELECT * FROM contenido WHERE id='$id'");

        if ($resultado){
            $palabra = $resultado->fetchObject();

            if ($palabra->habilitado == 1){
                //Quito la palabra de las posibles para adivinar
                $consulta = $this->db->exec("UPDATE contenido SET habilitado=0 WHERE id='$id'");

                //Mensaje
                ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                    $this->view->mensaje("warning", "La palabra " . $palabra->nombre . "/" . $palabra->valor . " NO se generará", "editar") :
                    $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos, póngase en contacto con el PUTO AMO aka DAVEGALISOT", "editar");

            }else{
                //Pongo la palabra entre las posibles para adivinar
                $consulta = $this->db->exec("UPDATE contenido SET habilitado=1 WHERE id='$id'");
                //Mensaje
                ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                    $this->view->mensaje("success","La palabra " . $palabra->nombre . "/" . $palabra->valor . " se generará", "editar") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos, póngase en contacto con el PUTO AMO aka DAVEGALISOT", "editar");

            }
        }
    }

}