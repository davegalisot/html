<?php

if (isset($_POST["enviar"])){

    //Recoge las variables con saneamiento
    $nombre = limpiaVariable($_POST["nombre"]);
    $apellidos = limpiaVariable($_POST["apellidos"]);
    $address = limpiaVariable($_POST["address"]);
    $telf = limpiaVariable($_POST["telf"]);
    $ciudad = limpiaVariable($_POST["ciudad"]);
    $cp = limpiaVariable($_POST["cp"]);
    $web = limpiaVariable($_POST["web"]);
    $correo = limpiaVariable($_POST["email"]);
    $pass = limpiaVariable($_POST["pass"]);

    //Inicializa los mensajes de error con "." para que mantengan su hueco (ocultos por defecto)
    $mensajeNombre = $mensajeAddress = $mensajeCiudad = $mensajeTelf = $mensajeWeb = $mensajeCorreo = $mensajePass = ".";


/** NOMBRE Y APELLIDOS **/

    //Si NOMBRE contiene números
    if (!filtraLetras($nombre)){
        $errorNombre = "error";
        $mensajeNombre = "el campo nombre no puede contener números";
    }

    //Si APELLIDOS contiene números
    if (!filtraLetras($apellidos)){
        $errorNombre = "error";
        $mensajeNombre = "el campo apellidos no puede contener números";
    }

    //Si NOMBRE y APELLIDOS contienen números
    if (!filtraLetras($nombre) && (!filtraLetras($apellidos))){
        $errorNombre = "error";
        $mensajeNombre = "el campo nombre y el campo apellido no pueden contener números";
    }

/** TELÉFONO **/


    if ($telf != "" && strlen($telf) < 9){
        $errorTelf = "error";
        $mensajeTelf = "el campo teléfono debe contener al menos 9 caracteres";
    }

    //Si TELÉFONO contiene letras
    if (filtraNumeros($telf)){
        $errorTelf = "error";
        $mensajeTelf = "el campo teléfono no puede contener letras ni espacios";
    }

/** PROVINCIA, CIUDAD Y CÓDIGO POSTAL **/

    //Si CIUDAD contiene números
    if (!filtraLetras($ciudad)){
        $errorCiudad = "error";
        $mensajeCiudad = "el campo ciudad no puede contener números";
    }

    //Si CÓDIGO POSTAL contiene más de 5 caracteres
    if(strlen($cp) < 5){
        $errorCiudad = "error";
        $mensajeCiudad = "el campo Código Postal debe contener 5 caracteres";
    }

    //Si CÓDIGO POSTAL contiene más de 5 caracteres
    if(strlen($cp) > 5){
        $errorCiudad = "error";
        $mensajeCiudad = "el campo Código Postal no puede contener más de 5 caracteres";
    }

    //Si CÓDIGO POSTAL contiene letras
    if (filtraNumeros($cp)){
        $errorCiudad = "error";
        $mensajeCiudad = "el campo código postal no puede contener letras";
    }

    //Si no se ha seleccionado ninguna PROVINCIA del select
    if (!isset($_POST["selectProvincias"])) {
        $selectProvincias = "";
        $errorCiudad = "error";
        $mensajeCiudad = "debe seleccionar una provincia";
    }else{
        $selectProvincias = $_POST["selectProvincias"];
    }

    //Si el código postal introducido no coincide con el de la provincia seleccionada
    if ($selectProvincias != substr($cp, 0, 2)) {
        $errorCiudad = "error";
        $mensajeCiudad = "El código postal no corresponde con esa provincia";
    }

/** WEBSITE **/

    if ($web){
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) {
            $errorWeb = "error";
            $mensajeWeb = "formato de URL inválido";
        }
    }


/** CORREO **/

    if ($correo){
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errorCorreo = "error";
            $mensajeCorreo = "formato de correo electrónico inválido";
        }
    }

/** PASSWORD **/

    if(!empty($_POST["pass"])) {
        $pass = limpiaVariable($_POST["pass"]);
        if(!preg_match("/[!@#$%*]/",$pass)) {
            $errorPass = "error";
            $mensajePass = "debe tener al menos un caracter (!@#$%*)";
        }
        if (strlen($_POST["pass"]) < 8) {
            $errorPass = "error";
            $mensajePass = "debe tener al menos 8 caracteres";
        }
        if (strlen($_POST["pass"]) > 16) {
            $errorPass = "error";
            $mensajePass = "no puede ser mayor de 16 caracteres";
        }
        if(!preg_match("/[0-9]+/",$pass)) {
            $errorPass = "error";
            $mensajePass = "debe tener al menos un número";
        }
        if(!preg_match("/[A-Z]+/",$pass)) {
            $errorPass = "error";
            $mensajePass = "debe tener al menos una mayúscula";
        }
        if(!preg_match("/[a-z]+/",$pass)) {
            $errorPass = "error";
            $mensajePass = "debe tener al menos una minúscula";
        }
    }

}else{
    //Inicializa las variables a vacías
    $nombre = "";
    $apellidos = "";
    $address = "";
    $telf = "";
    $selectProvincias = "";
    $ciudad = "";
    $cp = "";
    $web = "";
    $correo = "";
    $pass = "";


    //Inicializa la clase de los errores por defecto
    $errorNombre = "";
    $errorApellido = "";
    $errorAddress = "";
    $errorCiudad = "";
    $errorTelf = "";
    $errorWeb = "";
    $errorCorreo = "";
    $errorPass = "";

    //Inicializa los mensajes de error por defecto (oculto por defecto)
    $mensajeNombre = ".";//Inicializa con un "." para que "guarde" el espacio
    $mensajeAddress = ".";
    $mensajeCiudad = ".";
    $mensajeTelf = ".";
    $mensajeWeb = ".";
    $mensajeCorreo = ".";
    $mensajePass = ".";
}

function filtraLetras($a){//función para comprobar que sólo se han introducido números
    $pattern = "/^[a-zA-Z ]*$/";//letras mayus y minus, y espacios
    return preg_match($pattern, $a);
}

function filtraNumeros($a){//función para comprobar que sólo se han introducido letras
    $pattern = "/[^0-9\+]/";//los 9 dígitos y "+"
    return preg_match($pattern, $a);
}

function limpiaVariable($data) {//Limpia las variables recogidas en el formulario
    $data = trim($data);//quita los espacios por ambos lados
    $data = stripslashes($data);//quita las barras con comillas escapadas
    $data = htmlspecialchars($data);//convierte caracteres especiales en entidades HTML
    return $data;
}

