<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Usuario;

class UsuarioController{

    var $view;
    var $db;

    function __construct()
    {

        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;

        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;
    }

    public function inicio(){

        //Permisos
        $this->view->permisos();

        //redirecciona a la página de inicio del Panel
        $this->view->vistas("panel", "index");
    }

    //listado de usuarios
    public function index(){

        //permisos
        $this->view->permisos("usuarios");

        //recoge los usuarios de la db
        $datos = $this->db->query("select * from usuarios");

        $this->view->vistas("panel", "usuarios/index", $datos);
    }

    public function crear(){

        //permisos
        $this->view->permisos("usuarios");

        //Crea un nuevo usuario vacío
        $usuario = new Usuario();

        //llama a la ventana de edición
        $this->view->vistas("panel", "usuarios/editar", $usuario);

    }

    public function activar($id){

        //permisos
        $this->view->permisos("usuarios");

        //obtiene el usuario
        $resultado = $this->db->query("select * from usuarios where id='$id'");

        if ($resultado){

            $usuario = $resultado->fetchObject();

            if ($usuario->activo == 1) {

                //actualiza el usuario en la db
                $consulta = $this->db->exec("UPDATE usuarios SET activo=0 WHERE id='$id'");

                ($consulta > 0) ?
                    //Mensaje y redirección
                    $this->view->mensaje("success", "El usuario <strong>$usuario->usuario</strong> se desactivado correctamente", "panel/usuarios") :
                    //Mensaje y redirección
                    $this->view->mensaje("danger", "Hubo un error al modificar el usuario en la base de datos", "panel/usuarios");

            } else {

                //actualiza el usuario en la db
                $consulta = $this->db->exec("UPDATE usuarios SET activo=1 WHERE id='$id'");

                ($consulta > 0) ?
                    //Mensaje y redirección
                    $this->view->mensaje("success", "El usuario <strong>$usuario->usuario</strong> se activado correctamente", "panel/usuarios") :
                    //Mensaje y redirección
                    $this->view->mensaje("danger", "Hubo un error al modificar el usuario en la base de datos", "panel/usuarios");

            }
        }

    }

    public function editar($id){

        //permisos
        $this->view->permisos("usuarios");

        if (isset($_POST["usuario"])){

            //recupera los datos de un formulario
            $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
            $productos = (filter_input(INPUT_POST, "productos", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $usuarios = (filter_input(INPUT_POST, "usuarios", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $cambiar_clave = (filter_input(INPUT_POST, 'cambiar_clave', FILTER_SANITIZE_STRING) == 'on') ? 1 : 0;

            //encripta la clave
            $claveEncriptada = crypt($password);

            if ($id == "nuevo"){

                //crea un nuevo usuario en la db
                $consulta = $this->db->exec("INSERT INTO usuarios (usuario, clave, productos, usuarios) VALUES ('$usuario','$claveEncriptada',$productos,$usuarios)");

                ($consulta > 0) ? $this->view->mensaje("success", "El usuario <strong>$usuario</strong> se ha creado correctamente\"", "panel/usuarios") :
                $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos", "panel/usuarios");

            } else {

                //actualiza el usuario en la db
                $consulta = $this->db->exec("UPDATE usuarios SET usuario='$usuario', clave='$claveEncriptada', productos=$productos, usuarios=$usuarios WHERE id='$id'");

                ($consulta > 0) ?
                    $this->view->mensaje("success", "El usuario <strong>$usuario</strong> se ha guardado correctamente", "panel/usuarios") :
                    $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos", "panel/usuarios");
            }

        } else {

            //obtiene el usuario
            $usuario = new Usuario();
            $resultado = $this->db->query("select * from usuarios where id='$id'");
            $usuario = $resultado->fetchObject();

            //llama a la ventana de edición
            $this->view->vistas("panel", "usuarios/editar", $usuario);
        }
    }

    public function borrar($id){

        //permisos
        $this->view->permisos("usuarios");

        //actualiza el usuario en la db
        $consulta = $this->db->exec("delete from usuarios WHERE id='$id'");

        ($consulta > 0) ?
            //Mensaje y redirección
            $this->view->mensaje("success", "El usuario ha sido borrado correctamente", "panel/usuarios") :
            //Mensaje y redirección
            $this->view->mensaje("danger", "Hubo un error al borrar el usuario de la base de datos", "panel/usuarios");

    }

    public function entrar(){

        if (isset($_SESSION["usuario"])) {

            //redirecciona a la página del Panel
            $this->inicio();

        } else if (isset($_POST["acceder"])) {

            //recupera los datos de un formulario
            $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

            //busca al usuario en la db
            $resultado = $this->db->query("select * from usuarios where usuario='$usuario' and activo=1");
            $nombreUsuario = $resultado->fetchObject();

            //Si existe el usuario
            if ($nombreUsuario) {

                //Comprueba la clave
                if (hash_equals($nombreUsuario->clave, crypt($password, $nombreUsuario->clave))) {

                    $_SESSION["usuario"] = $nombreUsuario;

                    //mensaje y redirección
                    $this->view->mensaje("success", "Bienvenido al Panel de Administración", "panel");

                } else {

                    //mensaje y redirección
                    $this->view->mensaje("danger", "Contraseña incorrecta", "panel");
                }

            } else {

                //mensaje y redirección
                $this->view->mensaje("danger", "No existe ningún usuario con ese nombre", "panel");

            }
        } else {

            //redirecciona a la página de acceso
            $this->view->vistas("panel", "usuarios/entrar");
        }
    }

    public function salir(){

        //borra al usuario
        unset($_SESSION["usuario"]);

        //mensaje y redirección
        $this->view->mensaje("success", "Te has desconectado con éxito", "panel");
    }

}