<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Forum;
use DateTime;
use DateTimeZone;

class ForumController{

    var $view;
    var $db;

    function __construct(){

        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;

    }

    public function index(){

        if  ($this->view->isLogged()){
            // DATOS PARA CATEGORIA PRESENTACIÓN
            //Recoge los posts de la base de datos
            $datosPresentación = $this->db->query("SELECT * FROM forum where categoria='presentacion'");

            //Recorre el objeto obtenido
            while ($queryForum = $datosPresentación->fetchObject()) {
                //coge el id
                $id_queryForum = $queryForum->id;
                //consulta y cuenta cuántas respuestas hay con cada id
                $consulta = $this->db->query("select count(*) from respuestas where id_forum='$id_queryForum'");
                //obtiene el número de respuestas
                $num = $consulta->fetch();
                //update de la db con el resultado
                $this->db->query("update forum set replies='$num[0]' where id='$id_queryForum'");
            }

            //Recoge los posts de la base de datos
            $datosPresentación = $this->db->query("SELECT * FROM forum where categoria='presentacion'");

            // DATOS PARA CATEGORIA GENERAL
            //Recoge los posts de la base de datos
            $datosGeneral = $this->db->query("SELECT * FROM forum where categoria='general'");

            //Recorre el objeto obtenido
            while ($queryForum = $datosGeneral->fetchObject()) {
                //coge el id
                $id_queryForum = $queryForum->id;
                //consulta y cuenta cuántas respuestas hay con cada id
                $consulta = $this->db->query("select count(*) from respuestas where id_forum='$id_queryForum'");
                //obtiene el número de respuestas
                $num = $consulta->fetch();
                //update de la db con el resultado
                $this->db->query("update forum set replies='$num[0]' where id='$id_queryForum'");
            }

            //Recoge los posts de la base de datos
            $datosGeneral = $this->db->query("SELECT * FROM forum where categoria='general'");

            // DATOS PARA CATEGORIA CONSOLAS
            //Recoge los posts de la base de datos
            $datosJuegos = $this->db->query("SELECT * FROM forum where categoria='plataformas'");

            //Recorre el objeto obtenido
            while ($queryForum = $datosJuegos->fetchObject()) {
                //coge el id
                $id_queryForum = $queryForum->id;
                //consulta y cuenta cuántas respuestas hay con cada id
                $consulta = $this->db->query("select count(*) from respuestas where id_forum='$id_queryForum'");
                //obtiene el número de respuestas
                $num = $consulta->fetch();
                //update de la db con el resultado
                $this->db->query("update forum set replies='$num[0]' where id='$id_queryForum'");
            }

            //Recoge los posts de la base de datos
            $datosJuegos = $this->db->query("SELECT * FROM forum where categoria='plataformas'");

            // DATOS PARA CATEGORIA PUNTO DE ENCUENTRO
            //Recoge los posts de la base de datos
            $datosGamingpoint = $this->db->query("SELECT * FROM forum where categoria='punto_encuentro'");

            //Recorre el objeto obtenido
            while ($queryForum = $datosGamingpoint->fetchObject()) {
                //coge el id
                $id_queryForum = $queryForum->id;
                //consulta y cuenta cuántas respuestas hay con cada id
                $consulta = $this->db->query("select count(*) from respuestas where id_forum='$id_queryForum'");
                //obtiene el número de respuestas
                $num = $consulta->fetch();
                //update de la db con el resultado
                $this->db->query("update forum set replies='$num[0]' where id='$id_queryForum'");
            }

            //Recoge los posts de la base de datos
            $datosGamingpoint = $this->db->query("SELECT * FROM forum where categoria='punto_encuentro'");

            // DATOS PARA CATEGORIA OFF-TOPIC
            //Recoge los posts de la base de datos
            $datosOfftopic = $this->db->query("SELECT * FROM forum where categoria='off_topic'");

            //Recorre el objeto obtenido
            while ($queryForum = $datosOfftopic->fetchObject()) {
                //coge el id
                $id_queryForum = $queryForum->id;
                //consulta y cuenta cuántas respuestas hay con cada id
                $consulta = $this->db->query("select count(*) from respuestas where id_forum='$id_queryForum'");
                //obtiene el número de respuestas
                $num = $consulta->fetch();
                //update de la db con el resultado
                $this->db->query("update forum set replies='$num[0]' where id='$id_queryForum'");
            }

            //Recoge los posts de la base de datos
            $datosOfftopic = $this->db->query("SELECT * FROM forum where categoria='off_topic'");

            //VISTA
            //redirecciona a la página principal del forum
            $this->view->vistas("forum", "index", $datosPresentación, $datosGeneral, $datosJuegos, $datosGamingpoint, $datosOfftopic);
        }else{

            //recoge las noticias de la base de datos
            $datos = $this->db->query("select * from noticias where destacado=1");
            $this->view->mensaje("danger", "Tienes que estar logeado para poder ver el Foro", "app");
        }

    }

    public function post($id){

        //aumenta las visitas cada vez que carga el post
        $this->aumentaVisita($id);

        //obtiene los usuarios
        $masDatos = $this->db->query("select * from usuarios");
        $id_users = $this->db->query("select id from usuarios");


        while ($users = $masDatos->fetchObject()){
            $obtiene_id_users = $id_users->fetch();
            $users_array[$obtiene_id_users[0]] = $users->usuario;
        }
        $_SESSION["arrayUsers"] = $users_array;

        //obtiene el usuario que escribió el post
        $consulta = $this->db->query("select * from usuarios where id=(select id_usuarios from forum where id='$id');");
        $moreData = $consulta->fetchObject();

        //recoge el post de la base de datos con el id pasado
        $datos = $this->db->query("select * from forum where id='$id'");

        //recoge las respuestas del post actual
        $data = $this->db->query("select * from respuestas where id_forum='$id'");

        //vista
        $this->view->vistas("forum", "post", $datos, $data, $moreData);

    }

    public function crear(){

        //Crea un nuevo post vacío
        $post = new Forum();

        //Llama a la ventana de edición
        $this->view->vistas("forum","editar", $post);

    }

    public function editar($id){

        //locale de fechas
        date_default_timezone_set('Europe/Madrid');
        setlocale(LC_TIME, 'spanish');
        //fecha de ahora
        $creaFecha = new DateTime("now", new DateTimeZone("Europe/Madrid"));
        $fecha = $creaFecha->format("Y-m-d H:i");

        if  ($this->view->isLogged()){

            if (isset($_POST["guardar"])){
                //Recupera los datos del formulario
                $categoria = $_POST["categoria"];
                $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING);
                $texto = filter_input(INPUT_POST, "texto", FILTER_SANITIZE_STRING);

                if ($id == "nuevo"){
                    //Toma el usuario de la sesión actual
                    $user = $_SESSION["usuario"]->usuario;
                    //obtiene el id de usuario para almacenarlo al post y relacionarlo con su autor
                    $consultaID = $this->db->query("select id from usuarios where usuario='$user'");
                    $res = $consultaID->fetch();
                    //Crea un nuevo Post
                    $consulta = $this->db->exec("INSERT INTO forum (id_usuarios, titulo, texto, fecha, categoria) VALUES ('$res[0]','$titulo','$texto','$fecha','$categoria')");
                    //Mensaje y redirección
                    ($consulta > 0) ?
                        $this->view->mensaje("success","El post se ha creado correctamente.", "forum") :
                        $this->view->mensaje("danger","Hubo un error al guardar en la base de datos", "forum");
                }
                else{
                    //Actualiza el post
                    $consulta = $this->db->exec("UPDATE forum SET titulo='$titulo',texto='$texto',fecha='$fecha',categoria='$categoria' WHERE id='$id'");

                    //Mensaje y redirección
                    ($consulta > 0) ?
                        $this->view->mensaje("success","El post se ha actualizado correctamente.", "forum") :
                        $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "forum");
                }
            }else{
                //Obtiene el post
                $resultado2 = $this->db->query("SELECT * FROM forum WHERE id='$id'");
                $post = $resultado2->fetchObject();

                //Llama a la ventana de edición
                $this->view->vistas("forum", "editar", $post);
            }
        }else{
            //recoge los noticias de la base de datos
            $datos = $this->db->query("select * from noticias where destacado=1");
            $this->view->mensaje("danger", "Tienes que estar logeado para poder ver el Foro", "app");
        }

    }

    public function aumentaVisita($id){

        $this->db->exec("update forum set views = views +1 WHERE id='$id'");

    }

    public function cuentaRespuestas($id){

        $this->db->exec("update forum set replies = (select count(*) from respuestas where id_forum='$id')");

    }

    public function borrar($id){

        if  ($this->view->isLogged()){

            //Borro el post y sus respuestas
            $consulta = $this->db->exec("delete from respuestas where id_forum='$id'");
            $consulta2 = $this->db->exec("DELETE FROM forum WHERE id='$id'");
            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->mensaje("success","El Post se ha borrado correctamente.", "forum") :
                $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "forum");

        }

    }

}