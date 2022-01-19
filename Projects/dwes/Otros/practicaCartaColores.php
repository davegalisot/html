<?php

//control de formulario del Generador
if (isset($_POST["generador"])){
    trim($colorPartida = $_POST["colorPartida"]); //recoge los valores introducidos
    trim($numValores = $_POST["numValores"]);

    if (empty ($colorPartida) || empty($numValores)){ //tratamiento de errores
        $colorAlerta = "red";
        $alerta = "ERROR: Los campos no pueden estar vacíos";
    }else {

        if (strlen($colorPartida) == 4) { //comprueba que el hex introducido es de 3 valores ó 6
            hexCorto($colorPartida);
        }

        if (QueHaIntroducido($colorPartida) == true) { //comprueba si se ha introducido un hex o rgb
            $arrayValoresNuevos = generadorColores($colorPartida, $numValores);
        } else {
            $colorConvertido = rgbHex($colorPartida);
            $arrayValoresNuevos = generadorColores($colorConvertido, $numValores);
        }

        $alerta = "Colores generados";
        $colorAlerta = "#3b9e24";
    }


}else{ //inicialización de variables vacías.
    $colorPartida = "";
    $numValores = "";
}

//control de formulario del Conversor
if (isset ($_POST["conversor"])) {
    trim($recogido = $_POST["recogido"]); //recoge el color introducido

    if (empty ($recogido)){
        $colorAlerta = "red";
        $alerta = "ERROR: Introduce un color";

        $hexadecimal = "#000000";
        $color = "#000000";
        $rgb = "0.0.0";
    }else {
        comprobarRGB($recogido);

        if (strlen($recogido) == 4) { //comprueba que el hex introducido es de 3 valores o 6
            hexCorto($recogido);
        }

        if (QueHaIntroducido($recogido) == true) { //comprueba si se ha introducido un hex o rgb
            $rgb = hexRgb($recogido);
            $hexadecimal = $recogido;
            $color = $recogido;
        } else {
            $rgb = $recogido;
            $hexadecimal = rgbHex($recogido);
            $color = rgbHex($recogido);
        }

        $alerta = "Color convertido";
        $colorAlerta = "#3b9e24";
    }


}else{ //inicialización de variables vacías.
    $hexadecimal = "#000000";
    $color = "#000000";
    $rgb = "0.0.0";
    $recogido = "";
    $alerta = "Color a convertir";
    $colorAlerta = "black";
}

if (isset($_POST["aleatorio"])){ //pulsado el botón de generador aleatorio
    $rnd = rand(0, 16777215);
    $resultado = "#".dechex($rnd);

    //asigna el resultado a los campos correspondientes
    $hexadecimal = $resultado;
    $recogido = $resultado;
    $rgb = hexRgb($resultado);
    $color = $resultado;

    //tratamiento de errores
    $alerta = "Color generado y convertido";
    $colorAlerta = "#3b9e24";

}

if (isset($_POST["restar"])){

    $recogido = $_POST["recogido"]; //recogo el valor introducido

    $nuevo = hexdec($recogido);
    $nuevo--;
    $resultado = "#".dechex($nuevo);

    //asigna el resultado a los campos correspondientes
    $hexadecimal = $resultado;
    $recogido = $resultado;
    $rgb = hexRgb($resultado);
    $color = $resultado;

    $alerta = "Resta realizada";
    $colorAlerta = "#3b9e24";
}

if (isset($_POST["sumar"])){

    $recogido = $_POST["recogido"]; //recoge el valor introducido

    $nuevo = hexdec($recogido); //convierte a decimal el valor pasado en hex
    $nuevo++;
    $resultado = "#".dechex($nuevo); //convierte a hex el valor pasado en decimal, añadiendo la #

    //asigna el resultado a los campos correspondientes
    $hexadecimal = $resultado;
    $recogido = $resultado;
    $rgb = hexRgb($resultado);
    $color = $resultado;

    $alerta = "Suma realizada";
    $colorAlerta = "#3b9e24";
}

function comprobarRGB($color){
    if (strlen($color) > 11){
        $alerta = "Formato de RGB inválido.";
        $colorAlerta = "red";
    }else{
        $alerta = "Color a convertir";
        $colorAlerta = "black";
    }
}

function comprobarHex($color){

}

//función que convierte el color pasado (en hex) a decimal, un FOR rellena un array con esos valores pasados a hex
function generadorColores($color, $numeros){
    $numero = hexdec($color); //convierte a decimal el color pasado
    $hasta = $numero + $numeros; /*obtiene el valor de "numero de colores" y lo suma al color introducido en decimal para */
    $arrayValores = array();     /*saber hasta que número hay que generar */
    $contador = 0; //contador para saber en qué posición guardar los valores en el array
    for ($i = $numero; $i < $hasta; $i++){ //for para rellenar el array
        $arrayValores[$contador] = "#".dechex($i); //convierte a hex los valores para introducirlos en el array
        $contador++;
        if ($i == 16777215){ //comprobador para no salirse de la escala de colores
            break;
        }
    }
    return $arrayValores;
}

//función para saber si lo que ha introducido el usuario es un hex o RGB
function QueHaIntroducido($valor){
    $thisIs = substr($valor, 0, 1);
    if ($thisIs == "#"){
        return true;
    }
}

//función para convertir hexadecimal de 3 valores a 6
function hexCorto($valor){
    return "#".$valor[1].$valor[1].$valor[2].$valor[2].$valor[3].$valor[3];
}

//función que convierte a RGB el valor pasado en hexadecimal
function hexRgb($valor){
    $primerosDos = hexdec(substr($valor, 1, 2));
    $segundosDos = hexdec(substr($valor, 3, 2));
    $tercerosDos = hexdec(substr($valor, 5, 2));
    return ($primerosDos . "." . $segundosDos . "." . $tercerosDos);
}
//función que covierte a Hexadecimal el valor pasado en RGB
function rgbHex($valor){
    if ($valor != "") {
        $rgbarr = explode(".", $valor, 3);
        return sprintf("#%02x%02x%02x", $rgbarr[0], $rgbarr[1], $rgbarr[2]);
    }else{

    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Práctica Carta de Colores</title>
    <link rel="stylesheet" href="css/practicaCartaColores.css">
</head>
<body>
    <header>
        <img src="img/CdC.png">
        <h1>Carta de Colores</h1>
    </header>
    <style>
        .rojo{
            color:<?php echo $colorAlerta ?>;
        }
    </style>
    <fieldset>
        <legend>Conversor</legend>
        <form action="practicaCartaColores.php" method="post" enctype="multipart/form-data">
            <div>
                <div>
                    <p>Color</p>
                    <input style="background-color: <?php echo $color ?>" class="colorPhp noEditable" type="text" readonly/>
                </div>
                <div class="divBotones">
                    <p>Hexadecimal</p>
                        <input class="noEditable" type="text" value="<?php echo trim($hexadecimal); ?>" readonly/>
                </div>
                <div class="divBotones">
                    <p>RGB</p>
                    <input class="noEditable" type="text" name="rgb" value="<?php echo trim($rgb) ?>" readonly/>
                </div>
            </div>
            <div>
                <div class="divInput">
                    <img src="img/flechas.png" alt="">
                    <p id="textoConversor" class="convierte rojo"><?php echo $alerta ?></p>
                    <input class="input convierteIzq" type="text" name="recogido" value="<?php echo trim($recogido) ?>"
                           autocomplete="off"/>
                    <input id="conversor" class="boton dcha" type="submit" name="conversor" value="Conviértelo"/>
                </div>
            </div>
            <div>
                <input class="boton izq" type="submit" name="restar" value="-1">
                <input id="aleatorio" class="boton" type="submit" name="aleatorio" value="Convierte uno aleatorio">
                <input class="boton dcha" type="submit" name="sumar" value="+1">
            </div>
        </form>
    </fieldset>
    <fieldset>
        <legend>Generador</legend>
        <form action="practicaCartaColores.php" method="post" enctype="multipart/form-data">
            <div>
                <div>
                    <p>Color</p>
                    <p class="pregunta">hexadecimal o RGB</p>
                    <input class="input" type="text" name="colorPartida" value="<?php echo trim($colorPartida) ?>"
                           autocomplete="off">
                </div>
                <div>
                    <p class="numeroColores">número</p>
                    <p class="numeroColores">de colores</p>
                    <input class="input" type="text" name="numValores" value="<?php echo trim($numValores) ?>"
                           autocomplete="off">
                </div>
                <div class="divGenerador">
                    <input id="generador" class="boton generador" type="submit" name="generador" value="Genéralos">
                </div>
            </div>
            <div>
                <?php if ($colorPartida != ""){ ?><!-- si no se ha introducido nada, oculta la tabla -->
                <table>
                    <tr>
                        <th></th>
                        <th>color</th>
                        <th>hexadecimal</th>
                        <th>RGB</th>
                    </tr>
                    <?php foreach ($arrayValoresNuevos as $key => $valores){ ?>
                    <tr>
                        <td><?php echo ($key+1) ?></td>
                        <td style="background-color:<?php echo $arrayValoresNuevos[$key] ?>"></td>
                        <td><?php echo $arrayValoresNuevos[$key] ?></td>
                        <td><?php echo hexRgb($arrayValoresNuevos[$key]) ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <?php } ?>
            </div>
        </form>
    </fieldset>
    <footer>
        <div>
            <div>
                <p>Grado</p>
                <p>Desarrollo de aplicaciones WEB</p>
            </div>
            <div>
                <p>Clase</p>
                <p>Desarrollo WEB Entorno Servidor</p>
            </div>
            <div>
                <p>Profesor</p>
                <p>Jairo García Rincón</p>
            </div>
            <div>
                <p>Autor</p>
                <p>David Galiana Sotillo</p>
            </div>
        </div>
    </footer>
</body>
</html>
