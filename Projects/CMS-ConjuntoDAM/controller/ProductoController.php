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

        //Recojo los productos de la base de datos
        $datos = $this->db->query("SELECT * FROM productos");

        //Llama a la vista donde muestra todas los productos recogidas
        $this->view->vistas("panel","productos/index", $datos);

    }

    public function crear(){

        //Permisos
        $this->view->permisos("productos");

        //Creo un nuevo producto vacío
        $producto = new Producto();

        //Llamo a la ventana de edición
        $this->view->vistas("panel","productos/editar", $producto);
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
            $fechaalta = filter_input(INPUT_POST, "fechaalta", FILTER_SANITIZE_STRING);
            $fechamodificacion = filter_input(INPUT_POST, "fechamodificacion", FILTER_SANITIZE_STRING);
            $texto1 = filter_input(INPUT_POST, "texto1", FILTER_SANITIZE_STRING);
            $texto2 = filter_input(INPUT_POST, "texto2", FILTER_SANITIZE_STRING);
            $texto3 = filter_input(INPUT_POST, "texto3", FILTER_SANITIZE_STRING);
            $texto4 = filter_input(INPUT_POST, "texto4", FILTER_SANITIZE_STRING);

            //Imagen
            $imagen_recibida = $_FILES['imagen'];
            //crea un id2 (para no tocar el id original
            $id2 = $id;
            //le asigna 0 por delante del id
            $id2 = ($id2 < 9) ? ("0000000000".$id2) : ("000000000".$id2);
            //recibe el dato elegido en el select de imagen
            $destino_imagen = $_POST["destino_imagen"];
                switch ($destino_imagen){
                    case "principal":
                        $imagen_subida = $_SESSION['img'].$id2.".png";
                        break;
                    case 0:
                        $imagen_subida = $_SESSION['img']."png/".$id2."-0.png";
                        break;
                    case 1:
                        $imagen_subida = $_SESSION['img']."png/".$id2."-1.png";
                        break;
                    case 2:
                        $imagen_subida = $_SESSION['img']."png/".$id2."-2.png";
                        break;
                    default:
                        $imagen_subida = $_SESSION['img'].$id2.".png";
                }
            $texto_img = "";

            if ($id == "nuevo"){
                //Creo un nuevo producto
                $consulta = $this->db->exec("INSERT INTO productos (nombre, descripcion, precio, stock, fechaalta, fechamodificacion, texto1, texto2, texto3, texto4) VALUES ('$nombre','$descripcion','$precio','$stock','$fechaalta','$fechamodificacion', '$texto1', '$texto2', '$texto3', '$texto4')");
                //Mensaje y redirección
                ($consulta > 0) ?
                    $this->view->mensaje("success","El producto <strong>$nombre</strong> se ha creado correctamente.", "panel/productos") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos", "panel/productos");
            }
            else{
                //Actualiza el producto
                $consulta = $this->db->exec("UPDATE productos SET nombre='$nombre',descripcion='$descripcion',precio='$precio',stock='$stock',fechaalta='$fechaalta',fechamodificacion='$fechamodificacion', texto1='$texto1', texto2='$texto2', texto3='$texto3', texto3='$texto3' WHERE id='$id'");

                //sube la imagen
                if (is_uploaded_file($imagen_recibida['tmp_name'])){
                    $texto_img = (move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)) ?
                        " La imagen se ha subido correctamente" :
                        " Hubo un problema al subir la imagen".$imagen_subida;
                }

                //Mensaje y redirección
                ($consulta > 0) ?
                    $this->view->mensaje("success","El producto <strong>$nombre</strong> se ha actualizado correctamente.".$texto_img, "panel/productos") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.".$texto_img, "panel/productos");
            }
        }
        else{
            //Obtiene el producto
            $resultado = $this->db->query("SELECT * FROM productos WHERE id='$id'");
            $producto = $resultado->fetchObject();

            //Llamo a la ventana de edición
            $this->view->vistas("panel", "productos/editar", $producto);
        }
    }

    public function destacado($id){

        //Permisos
        $this->view->permisos("productos");

        //Obtengo el producto
        $resultado = $this->db->query("SELECT * FROM productos WHERE id='$id'");
        if ($resultado){
            $producto = $resultado->fetchObject();
            if ($producto->destacado == 1){
                //Quito el producto del Inicio
                $consulta = $this->db->exec("UPDATE productos SET destacado=0 WHERE id='$id'");
                //Mensaje y redirección
                ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                    $this->view->mensaje("success","El producto <strong>$producto->nombre </strong> NO saldrá en el inicio", "panel/productos") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "panel/productos");
            }
            else{
                //Pongo el producto en Inicio
                $consulta = $this->db->exec("UPDATE productos SET destacado=1 WHERE id='$id'");
                //Mensaje y redirección
                ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                    $this->view->mensaje("success","El producto <strong>$producto->nombre</strong> saldrá en el inicio", "panel/productos") :
                    $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "panel/productos");
            }
        }
    }

    public function borrar($id){

        //Permisos
            $this->view->permisos("productos");

            //Borro el producto
            $consulta = $this->db->exec("DELETE FROM productos WHERE id='$id'");
            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->mensaje("success","El producto se ha borrado correctamente.", "panel/productos") :
                $this->view->mensaje("danger","Hubo un error al guardar en la base de datos.", "panel/productos");



    }

}