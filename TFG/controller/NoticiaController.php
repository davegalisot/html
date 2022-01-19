<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Noticia;
use DateTime;
use DateTimeZone;

class NoticiaController{

    var $view;
    var $db;

    function __construct(){

        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;
    }

    public function index(){

        //locale de fechas
        date_default_timezone_set('Europe/Madrid');
        setlocale(LC_TIME, 'spanish');

        //Permisos
        $this->view->permisos("admin");

        //Recojo las noticias de la base de datos
        $datos = $this->db->query("SELECT * FROM noticias");

        //Llama a la vista donde muestra todas los noticias recogidas
        $this->view->vistas("panel","noticias/index", $datos);

    }

    public function crear(){

        //Permisos
        $this->view->permisos("admin");

        //Creo una nueva noticia vacía
        $noticia = new Noticia();

        //Llamo a la ventana de edición
        $this->view->vistas("panel","noticias/editar", $noticia);
    }

    public function editar($id){

        //Permisos
        $this->view->permisos("admin");

        if (isset($_POST["guardar"])){

            //locale de fechas
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');
            //fecha de ahora
            $creaFecha = new DateTime("now", new DateTimeZone("Europe/Madrid"));
            $fecha = $creaFecha->format("Y-m-d H:i");

            //Recupero los datos del formulario
            $web = filter_input(INPUT_POST, "web", FILTER_SANITIZE_STRING);
            $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING);
            $url = filter_input(INPUT_POST, "url", FILTER_SANITIZE_STRING);

            //Imagen
            $imagen_recibida = $_FILES['imagenNoticia'];

            if ($id == "nuevo"){

                //Crea una nueva noticia
                $consulta = $this->db->exec("INSERT INTO noticias (web, titulo, descripcion, url, fecha_alta, fecha_modificacion) VALUES ('$web','$titulo','$descripcion','$url','$fecha','$fecha')");

                //Mensaje y redirección
                if ($consulta > 0){
                    //obtiene el ID de la noticia recién creada
                    $consulta = $this->db->query("SELECT * FROM noticias ORDER BY ID DESC LIMIT 1");
                    $resultado = $consulta->fetchObject();

                    //sube la imagen
                    $imagen_subida = $_SESSION['img']."noticias/".$resultado->id.".jpg";

                    //texto mensaje error
                    $texto_img = "";

                    //comprueba la subida la imagen
                    if (is_uploaded_file($imagen_recibida['tmp_name'])){
                        $texto_img = (move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)) ?
                            " La imagen se ha subido correctamente" :
                            " Hubo un problema al subir la imagen".$imagen_subida;
                    }

                    //mensaje y redirección
                    $this->view->mensaje("success","La noticia se ha creado correctamente.".$texto_img, "panel/noticias");
                }else{
                    //mensaje y redirección
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos. Hubo un problema al subir la imagen.", "panel/noticias");
                }

            }else{

                //sube la imagen
                $imagen_subida = $_SESSION['img']."noticias/".$id.".jpg";

                //texto mensaje error
                $texto_img = "";

                //comprueba la subida la imagen
                if (is_uploaded_file($imagen_recibida['tmp_name'])){
                    $texto_img = (move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)) ?
                        " La imagen se ha subido correctamente" :
                        " Hubo un problema al subir la imagen".$imagen_subida;
                }

                //Actualiza la noticia
                $consulta = $this->db->exec("UPDATE noticias SET web='$web',titulo='$titulo',descripcion='$descripcion',url='$url' WHERE id='$id'");

                //Mensaje y redirección
                ($consulta > 0) ?
                    $this->view->mensaje("success","La noticia se ha actualizado correctamente.".$texto_img, "panel/noticias") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.".$texto_img, "panel/noticias");
            }
        }else{
            //Obtiene la noticia
            $resultado = $this->db->query("SELECT * FROM noticias WHERE id='$id'");
            $noticia = $resultado->fetchObject();

            //Llamo a la ventana de edición
            $this->view->vistas("panel", "noticias/editar", $noticia);
        }
    }

    public function destacado($id){

        //Permisos
        $this->view->permisos("admin");

        //Obtengo la noticia
        $resultado = $this->db->query("SELECT * FROM noticias WHERE id='$id'");
        if ($resultado){
            $noticia = $resultado->fetchObject();
            if ($noticia->destacado == 1){
                //Quito la noticia del Inicio
                $consulta = $this->db->exec("UPDATE noticias SET destacado=0 WHERE id='$id'");
                //Mensaje y redirección
                ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                    $this->view->mensaje("success","La noticia NO saldrá en el inicio", "panel/noticias") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "panel/noticias");
            }
            else{
                //Pongo la noticia en Inicio
                $consulta = $this->db->exec("UPDATE noticias SET destacado=1 WHERE id='$id'");
                //Mensaje y redirección
                ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                    $this->view->mensaje("success","La noticia saldrá en el inicio", "panel/noticias") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "panel/noticias");
            }
        }
    }

    public function borrar($id){

        //Permisos
        $this->view->permisos("admin");

        //Borro la noticia
        $consulta = $this->db->exec("DELETE FROM noticias WHERE id='$id'");
        //Mensaje y redirección
        ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
            $this->view->mensaje("success","La noticia se ha borrado correctamente.", "panel/noticias") :
            $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "panel/noticias");

    }

}