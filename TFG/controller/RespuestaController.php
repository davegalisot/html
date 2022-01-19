<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Respuesta;
use DateTime;
use DateTimeZone;

class RespuestaController{

    var $view;
    var $db;

    function __construct(){

        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;

    }

    public function crear(){

        //Crea un nuevo post vacío
        $post = new Respuesta();

        //Llama a la ventana de edición
        $this->view->vistas("respuestas","editar", $post);

    }

    public function editar($id){

        date_default_timezone_set('Europe/Madrid');
        setlocale(LC_TIME, 'spanish');
        //fecha de ahora
        $creaFecha = new DateTime("now", new DateTimeZone("Europe/Madrid"));
        $fecha = $creaFecha->format("Y-m-d H:i");
        //id del post (guardado en post.php)
        $id2 = $_SESSION["id"];
        //obtiene el id de usuario para guardarlo en la respuestas
        $id_usuario = $_SESSION["usuario"]->id;

        if  ($this->view->isLogged()){

            if (isset($_POST["guardar"])){
                //Recupera los datos del formulario
                $texto = filter_input(INPUT_POST, "texto", FILTER_SANITIZE_STRING);

                if ($id == "nuevo"){

                    //Crea un nueva Respuesta
                    $consulta = $this->db->exec("INSERT INTO respuestas (id_forum, id_usuario, texto, fecha) VALUES ('$id2', '$id_usuario','$texto','$fecha')");
                    //Mensaje y redirección
                    ($consulta > 0) ?
                        $this->view->mensaje("success","La respuesta se ha creado correctamente.", "forum/post/$id2") :
                        $this->view->mensaje("danger","Hubo un error al crear la respuesta", "forum/post/$id2");
                }
            }else{
                //Obtiene la respuestas
                $resultado = $this->db->query("SELECT * FROM forum WHERE id='$id2'");
                $post = $resultado->fetchObject();

                //Llama a la ventana de edición
                $this->view->vistas("respuestas", "editar", $post);
            }
        }else{
            //recoge los noticias de la base de datos
            $datos = $this->db->query("select * from noticias where destacado=1");
            $this->view->mensaje("danger", "Tienes que estar logeado para poder ver el Foro", "app");
        }


    }

}