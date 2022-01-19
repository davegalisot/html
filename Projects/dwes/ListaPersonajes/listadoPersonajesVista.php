<?php session_start();

if (isset($_FILES["subirFoto"]) and isset($_POST["guardarFoto"])){/* Si se seleccionado un archivo y se ha pulsado en
                                                                                                  "subir al servidor" */
    $flag = false;//Booleano para llevar el control de errores
    $file_name = $_FILES["subirFoto"]["name"];
    $file_size = $_FILES["subirFoto"]["size"];
    $file_tmp = $_FILES["subirFoto"]["tmp_name"];
    $upload_dir = "img/fotos/";
    $file_ext = substr(strrchr($file_name, "."), 1);//Selecciono solo la extensión del archivo

    $extensions = array("gif", "jpeg","jpg","png");//Array de extensiones para comparar con la seleccionada

    if(in_array($file_ext, $extensions) === false){//Comprueba si la exensión esta en el array de comparación
        $flag = true;//Hay un error
        $_SESSION["errorEXT"] = "Extensión no permitida. Selecciona un arhivo del tipo \"JPEG\", \"PNG\" o \"GIF\"";
        $colorError = "red";
    }

    if ($flag === false){//Si no hay errores
        move_uploaded_file($file_tmp, $upload_dir.basename($file_name));
        $fotoSubida = substr($file_name, 0, strpos($file_name, "."));
        $_SESSION["error"] = "El archivo se ha subido satisfactoriamente";
        $colorError = "green";
    }else{//Si los hay
        $_SESSION["error"] = "Ha ocurrido un error. ";
        $colorError = "red";
    }
}else{
    $_SESSION["error"] = "";
    $_SESSION["errorEXT"] = "";
    $colorError = "black";
}

if (isset ($_POST["guardar"])){//Guarda los datos editados (si no están vacíos)
    if (!empty($_POST["nombre"])) $_SESSION["personajes"][$_SESSION["personaje"]]["nombre"] = $_POST["nombre"];
    if (!empty($_POST["apellidos"])) $_SESSION["personajes"][$_SESSION["personaje"]]["apellidos"] = $_POST["apellidos"];
    if (!empty($_POST["lugar"])) $_SESSION["personajes"][$_SESSION["personaje"]]["lugar"] = $_POST["lugar"];
    $_SESSION["personajes"][$_SESSION["personaje"]]["fechaNacimiento"] = $_POST["dia"]."/".$_POST["mes"]."/".$_POST["year"];
    $_SESSION["personajes"][$_SESSION["personaje"]]["pais"] = $_POST["pais"];
    $_SESSION["personajes"][$_SESSION["personaje"]]["foto"] = $_POST["fotoDir"];
    //header("Location: listadoPersonajes.php");
}

if (isset($_POST["guardarNuevo"])){//Guarda los cambios como un personaje nuevo
    $keys = array_keys($_SESSION["personajes"]);
    $last = end($keys)+1;
    $_SESSION["personajes"][$last]["nombre"] = $_POST["nombre"];
    $_SESSION["personajes"][$last]["apellidos"] = $_POST["apellidos"];
    $_SESSION["personajes"][$last]["lugar"] = $_POST["lugar"];
    $_SESSION["personajes"][$last]["pais"] = $_POST["pais"];
    $_SESSION["personajes"][$last]["imdb"] = "";
    $_SESSION["personajes"][$last]["fechaNacimiento"] = $_POST["dia"]."/".$_POST["mes"]."/".$_POST["year"];
    $_SESSION["personajes"][$last]["foto"] = $_POST["fotoDir"];
    header("Location: index.php");
}

//Muestra los valores guardados
$nombre = $_SESSION["personajes"][$_SESSION["personaje"]]["nombre"];
$apellidos = $_SESSION["personajes"][$_SESSION["personaje"]]["apellidos"];
$lugar = $_SESSION["personajes"][$_SESSION["personaje"]]["lugar"];
$fechaNacimiento = $_SESSION["personajes"][$_SESSION["personaje"]]["fechaNacimiento"];
$selectPais = $_SESSION["personajes"][$_SESSION["personaje"]]["pais"];
$fotoSubida = $_SESSION["personajes"][$_SESSION["personaje"]]["foto"];


