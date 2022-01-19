<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Producto;

class ProductoController{

    var $view;
    var $db;

    function __construct(){

        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;
    }

    public function index(){

        //Permisos
        $this->view->permisos("productos");

        //Recojo las noticias de la base de datos
        $datos = $this->db->query("SELECT * FROM tabla1");

        //Llama a la vista donde muestra todas las noticias recogidas
        $this->view->vistas("panel","productos/index", $datos);

    }

    public function crear(){

        //Permisos
        $this->view->permisos("productos");

        //Creo una nueva noticia vacía
        $noticia = new Producto();

        //Llamo a la ventana de edición
        $this->view->vistas("panel","productos/editar", $noticia);
    }

    public function editar($id){

        //Permisos
        $this->view->permisos("productos");

        if (isset($_POST["guardar"])){

            //Recupero los datos del formulario
            $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING);
            $precio = filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING);
            $stock = filter_input(INPUT_POST, "stock", FILTER_SANITIZE_STRING);
            $fecha_alta = filter_input(INPUT_POST, "fecha_alta", FILTER_SANITIZE_STRING);
            $fecha_modif = filter_input(INPUT_POST, "fecha_modif", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //Genero el slug
            //$slug = $this->view->getSlug($nombre);
            //Chequeo el slug
            //$slug = $this->checkSlug($slug,$id);
            //Imagen
            /*$imagen_recibida = $_FILES['imagen'];
            $imagen_subida = $_SESSION['img'].$id.".jpg";
            $texto_img = "";*/

            if ($id == "nuevo"){
                //Creo una nueva noticia
                $consulta = $this->db->exec("INSERT INTO tabla1 (nombre, descripcion, precio, stock, fecha_alta, fecha_modif) VALUES ('$nombre','$descripcion','$precio','$stock','$fecha_alta','$fecha_modif')");
                //Mensaje y redirección
                ($consulta > 0) ?
                    $this->view->mensaje("success","La noticia <strong>$nombre</strong> se creado correctamente.", "panel/noticias") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos", "panel/noticias");
            }
            else{
                //Actualiza la noticia
                $consulta = $this->db->exec("UPDATE noticias SET nombre='$nombre',descripcion='$descripcion',precio='$precio',stock='$stock',fecha_alta='$fecha_alta',fecha_modif='$fecha_modif' WHERE id='$id'");

                //sube la imagen
                /*if (is_uploaded_file($imagen_recibida['tmp_name'])){
                    $texto_img = (move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)) ?
                        " La imagen se ha subido correctamente." :
                        " Hubo un problema al subir la imagen.";
                }*/

                //Mensaje y redirección
                ($consulta > 0) ?
                    $this->view->mensaje("success","La noticia <strong>$nombre</strong> se ha actualizado correctamente."/*.$texto_img*/, "panel/noticias") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos."/*.$texto_img*/, "panel/noticias");
            }
        }
        else{
            //Obtengo el producto
            $resultado = $this->db->query("SELECT * FROM tabla1 WHERE id='$id'");
            $producto = $resultado->fetchObject();

            //Llamo a la ventana de edición
            $this->view->vistas("panel", "productos/editar", $producto);
        }
    }

    public function checkSlug($slug,$id){


    }

    public function activar($id){


    }

    public function home($id){


    }

    public function borrar($id){


    }
}