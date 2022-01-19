<?php

namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Usuario;
use DateTime;
use DateTimeZone;

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

        //local para las fechas
        date_default_timezone_set('Europe/Madrid');
        setlocale(LC_TIME, 'spanish');

        //fecha de ahora
        $creaFecha = new DateTime("now", new DateTimeZone("Europe/Madrid"));
        $fecha = $creaFecha->format("Y-m-d H:i");

        //obtiene el usuario y actualiza la db
        $user = $_SESSION["usuario"]->usuario;
        $_SESSION["ult_acceso"] = $_SESSION["usuario"]->ult_acceso;
        $this->db->exec("UPDATE usuarios SET ult_acceso='$fecha' WHERE usuario='$user'");

        //obtiene los posts del usuario
        $datos = $this->db->query("select * from forum where id_usuarios=(select id from usuarios where usuario='$user')");

        //obtiene las respuestas del usuario
        $data = $this->db->query("select * from respuestas where id_usuario = (select id from usuarios where usuario='$user')");

        //redirecciona a la página de inicio del Panel
        $this->view->vistas("panel", "index", $datos, $data);

    }

    //listado de usuarios
    public function index(){

        //permisos
        $this->view->permisos("admin");

        //recoge los usuarios de la db
        $datos = $this->db->query("select * from usuarios");

        $this->view->vistas("panel", "usuarios/index", $datos);

    }

    public function crear(){

        //permisos
        $this->view->permisos("admin");

        //Crea un nuevo usuario vacío
        $usuario = new Usuario();

        //llama a la ventana de edición
        $this->view->vistas("panel", "usuarios/editar", $usuario);

    }

    public function activar($id){

        //permisos
        $this->view->permisos("admin");

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

        if (isset($_POST["guardar"])) {

            //locale de fechas
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');
            //fecha de ahora
            $creaFecha = new DateTime("now", new DateTimeZone("Europe/Madrid"));
            $fecha = $creaFecha->format("i:H");

            //recupera los datos de un formulario
            $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $clave = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING);
            $admin = (filter_input(INPUT_POST, "admin", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $cambiar_clave = (filter_input(INPUT_POST, 'cambiar_clave', FILTER_SANITIZE_STRING) == 'on') ? 1 : 0;
            $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
            $correo = filter_input(INPUT_POST, "correo", FILTER_SANITIZE_EMAIL);
            $provincia = $_POST["provincias"];
            $ciudad = filter_input(INPUT_POST, "ciudad", FILTER_SANITIZE_STRING);
            $horario_init = filter_input(INPUT_POST, "horario_init", FILTER_SANITIZE_NUMBER_FLOAT);
            $horario_fin = filter_input(INPUT_POST, "horario_fin", FILTER_SANITIZE_NUMBER_FLOAT);
            $dia = (filter_input(INPUT_POST, "dia", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $dia2 = (filter_input(INPUT_POST, "dia2", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $dia3 = (filter_input(INPUT_POST, "dia3", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $dia4 = (filter_input(INPUT_POST, "dia4", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $dia5 = (filter_input(INPUT_POST, "dia5", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $dia6 = (filter_input(INPUT_POST, "dia6", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $dia7 = (filter_input(INPUT_POST, "dia7", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $juego = filter_input(INPUT_POST, "juego", FILTER_SANITIZE_STRING);
            $juego2 = filter_input(INPUT_POST, "juego2", FILTER_SANITIZE_STRING);
            $juego3 = filter_input(INPUT_POST, "juego3", FILTER_SANITIZE_STRING);
            $juego4 = filter_input(INPUT_POST, "juego4", FILTER_SANITIZE_STRING);
            $plat = (filter_input(INPUT_POST, "plat", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $plat2 = (filter_input(INPUT_POST, "plat2", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $plat3 = (filter_input(INPUT_POST, "plat3", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $plat4 = (filter_input(INPUT_POST, "plat4", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $plat5 = (filter_input(INPUT_POST, "plat5", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $plat6 = (filter_input(INPUT_POST, "plat6", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;
            $game_time = (filter_input(INPUT_POST, "game_time", FILTER_SANITIZE_STRING) == "on") ? 1 : 0;

            //encripta la clave
            $claveEncriptada = crypt($clave);

            //Imagen
            $imagen_recibida = $_FILES['foto'];

            if ($id == "nuevo") {

                //crea un nuevo usuario en la db
                $consulta = $this->db->exec("INSERT INTO usuarios (usuario, clave, fecha_alta, destacado, admin, nombre, correo, provincia, ciudad, horario_init, horario_fin, dia, dia2, dia3, dia4, dia5, dia6, dia7, juego, juego2, juego3, juego4, plat, plat2, plat3, plat4, plat5, plat6) VALUES ('$usuario','$claveEncriptada','$fecha','$game_time','$admin','$nombre','$correo','$provincia','$ciudad','$horario_init','$horario_fin','$dia','$dia2','$dia3','$dia4','$dia5','$dia6','$dia7','$juego','$juego2','$juego3','$juego4','$plat','$plat2','$plat3','$plat4','$plat5','$plat6')");

                //Mensaje y redirección
                if ($consulta > 0){
                    //obtiene el ID del usuario recién creada
                    $consulta = $this->db->query("SELECT * FROM usuarios ORDER BY ID DESC LIMIT 1");
                    $resultado = $consulta->fetchObject();

                    //sube la imagen
                    $imagen_subida = $_SESSION['img']."foto/".$resultado->id.".jpg";

                    //texto mensaje error
                    $texto_img = "";

                    //comprueba la subida la imagen
                    if (is_uploaded_file($imagen_recibida['tmp_name'])){
                        $texto_img = (move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)) ?
                            " La imagen se ha subido correctamente" :
                            " Hubo un problema al subir la imagen".$imagen_subida;
                    }

                    //mensaje y redirección
                    ($_SESSION["usuario"]->admin == 1) ?
                    $this->view->mensaje("success","El usuario se ha creado correctamente.".$texto_img, "panel/usuarios") :
                        $this->view->mensaje("success","Te has registrado correctamente.".$texto_img, "panel");
                }else{
                    //mensaje y redirección
                    ($_SESSION["usuario"]->admin == 1) ?
                        $this->view->mensaje("danger","Hubo un error al guardar en la base de datos. Hubo un problema al subir la imagen.", "panel/usuarios") :
                        $this->view->mensaje("danger","Hubo un error al guardar en la base de datos. Hubo un problema al subir la imagen.", "panel");
                }

            }else{

                //locale de fechas
                date_default_timezone_set('Europe/Madrid');
                setlocale(LC_TIME, 'spanish');
                //fecha de ahora
                $creaFecha = new DateTime("now", new DateTimeZone("Europe/Madrid"));
                $fecha = $creaFecha->format("Y-m-d H:i");

                //sube la imagen
                $imagen_subida = $_SESSION['img']."foto/".$id.".jpg";

                //texto mensaje error
                $texto_img = "";

                //comprueba la subida la imagen
                if (is_uploaded_file($imagen_recibida['tmp_name'])){
                    $texto_img = (move_uploaded_file($imagen_recibida['tmp_name'], $imagen_subida)) ?
                        " La imagen se ha subido correctamente" :
                        " Hubo un problema al subir la imagen".$imagen_subida;
                }

                //actualiza el usuario en la db
                $consulta = ($cambiar_clave) ?
                    $this->db->exec("UPDATE usuarios SET usuario='$usuario', clave='$claveEncriptada', ult_acceso='$fecha', destacado='$game_time', admin='$admin', nombre='$nombre', correo='$correo', provincia='$provincia', ciudad='$ciudad', horario_init='$horario_init', horario_fin='$horario_fin', dia='$dia', dia2='$dia2', dia3='$dia3', dia4='$dia4', dia5='$dia5', dia6='$dia6', dia7='$dia7', juego='$juego', juego2='$juego2', juego3='$juego3', juego4='$juego4', plat='$plat', plat2='$plat2', plat3='$plat3', plat4='$plat4', plat5='$plat5', plat6='$plat6' WHERE id='$id'") :
                    $this->db->exec("UPDATE usuarios SET usuario='$usuario', ult_acceso='$fecha', destacado='$game_time', admin='$admin', nombre='$nombre', correo='$correo', provincia='$provincia', ciudad='$ciudad', horario_init='$horario_init', horario_fin='$horario_fin', dia='$dia', dia2='$dia2', dia3='$dia3', dia4='$dia4', dia5='$dia5', dia6='$dia6', dia7='$dia7', juego='$juego', juego2='$juego2', juego3='$juego3', juego4='$juego4', plat='$plat', plat2='$plat2', plat3='$plat3', plat4='$plat4', plat5='$plat5', plat6='$plat6' WHERE id='$id'");

                if ($_SESSION["usuario"]->admin == 1) {
                    ($consulta > 0) ?
                        $this->view->mensaje("success", "El usuario <strong>$usuario</strong> se ha guardado correctamente" . $texto_img, "panel/usuarios") :
                        $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos".$texto_img, "panel/usuarios");
                }else{
                    ($consulta > 0) ?
                        $this->view->mensaje("success", "Tus datos se han guardado correctamente" . $texto_img, "panel") :
                        $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos".$texto_img, "panel");
                }
            }
        }else{

            //obtiene el usuario
            $resultado = $this->db->query("select * from usuarios where id='$id'");
            $usuario = $resultado->fetchObject();

            //llama a la ventana de edición
            $this->view->vistas("panel", "usuarios/editar", $usuario);
        }
    }

    public function entrar(){

        if (isset($_SESSION["usuario"])) {

            $this->inicio();

        } else if (isset($_POST["acceder"])) {

            //recupera los datos de un formulario
            $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $clave = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING);

            //busca al usuario en la db
            $resultado = $this->db->query("select * from usuarios where usuario='$usuario' and activo=1");
            $nombreUsuario = $resultado->fetchObject();

            //Si existe el usuario
            if ($nombreUsuario) {

                //Comprueba la clave
                if (hash_equals($nombreUsuario->clave, crypt($clave, $nombreUsuario->clave))) {
                    //if ($nombreUsuario->clave == $clave) {

                    $_SESSION["usuario"] = $nombreUsuario;

                    if ($_SESSION["usuario"]->admin == 1) {
                        //mensaje y redirección
                        $this->view->mensaje("success", "Bienvenido al Panel de Administración", "panel");
                    }else{
                        //mensaje y redirección
                        $this->view->mensaje("success", "Has iniciado sesión con éxito. Bienvenido $nombreUsuario->usuario", "panel");
                    }
                } else {

                    //mensaje y redirección
                    $this->view->mensaje("danger", "Contraseña incorrecta", "panel");
                }
            } else {

                //mensaje y redirección
                $this->view->mensaje("danger", "No existe ningún usuario con ese nombre", "panel");

            }
        } else if (isset($_POST["registrar"])) {

            //local para las fechas
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

            //fecha de ahora
            $creaFecha = new DateTime("now", new DateTimeZone("Europe/Madrid"));
            $fecha = $creaFecha->format("Y-m-d H:i");

            $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
            $clave = filter_input(INPUT_POST, "clave", FILTER_SANITIZE_STRING);

            $consulta = $this->db->query("select * from usuarios where usuario='$usuario'");
            $usuarioDb = $consulta->fetchObject();

            if (strtolower($usuarioDb->usuario) == strtolower($usuario)){
                $this->view->mensaje("danger", "Ya existe un usuario con ese nombre", "panel/entrar");
            }else {

                //encripta la clave
                $claveEncriptada = crypt($clave);

                //crea un nuevo usuario en la db
                $consulta = $this->db->exec("INSERT INTO usuarios (usuario, clave, fecha_alta, ult_acceso, activo, destacado, admin) VALUES ('$usuario','$claveEncriptada','$fecha','$fecha','1','0','0')");

                if ($consulta > 0) {
                    //busca al usuario en la db
                    $resultado = $this->db->query("select * from usuarios where usuario='$usuario'");
                    $nombreUsuario = $resultado->fetchObject();
                    $_SESSION["usuario"] = $nombreUsuario;
                    $this->view->mensaje("success", "Hola <strong>$usuario</strong>, Bienvenido", "panel");
                } else {
                    $this->view->mensaje("danger", "Hubo un error al guardar en la base de datos", "panel/usuarios");
                }
            }

        } else {

            //redirecciona a la página de acceso
            $this->view->vistas("panel", "usuarios/entrar");
        }
    }

    public function borrar($id){

        //permisos
        $this->view->permisos("admin");

        //actualiza el usuario en la db
        $consulta = $this->db->exec("delete from usuarios WHERE id='$id'");

        ($consulta > 0) ?
            //Mensaje y redirección
            $this->view->mensaje("success", "El usuario ha sido borrado correctamente", "panel/usuarios") :
            //Mensaje y redirección
            $this->view->mensaje("danger", "Hubo un error al borrar el usuario de la base de datos", "panel/usuarios");

    }

    public function salir(){

        //borra al usuario
        unset($_SESSION["usuario"]);

        //mensaje y redirección
        $this->view->mensaje("success", "Te has desconectado con éxito, hasta la próxima!", "index");
    }

}