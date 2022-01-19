<?php

function imprimeArray($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/************************************************************************
 * EJERCICIO 1
 ***********************************************************************/

function diFecha($mes, $dia){
    $mesesLetras = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    $fecha = [1 => range(1, 31),
        2 => range(1, 28),
        3 => range(1, 31),
        4 => range(1, 30),
        5 => range(1, 31),
        6 => range(1, 30),
        7 => range(1, 31),
        8 => range(1, 31),
        9 => range(1, 30),
        10 => range(1, 31),
        11 => range(1, 30),
        12 => range(1, 31)];

    echo $fecha[$mes--][$dia] . " de " . $mesesLetras[$mes--];
}

/************************************************************************
 * CORRECION EJERCICIO 1
 ***********************************************************************/

// inicializa el array con el primer "hueco" vacío
$meses = array(array());

$meses[] = array("nombre" => "Enero", "dias" => 31);
$meses[] = array("nombre" => "Febrero", "dias" => 28);
$meses[] = array("nombre" => "Marzo", "dias" => 31);
$meses[] = array("nombre" => "Abril", "dias" => 30);
$meses[] = array("nombre" => "Mayo", "dias" => 31);
$meses[] = array("nombre" => "Junio", "dias" => 30);
$meses[] = array("nombre" => "Julio", "dias" => 31);
$meses[] = array("nombre" => "Agosto", "dias" => 31);
$meses[] = array("nombre" => "Septiembre", "dias" => 30);
$meses[] = array("nombre" => "Octubre", "dias" => 31);
$meses[] = array("nombre" => "Noviembre", "dias" => 30);
$meses[] = array("nombre" => "Diciembre", "dias" => 31);

//array del año
$anio = array();
//Recorro los meses como clave valor
foreach ($meses as $indice => $mes) {
    //si el índice es mayor que 0, me lo salto
    if ($indice > 0){
        // recorro ese mes desde el dia 1 hasta el último
        for ($dia = 1; $dia <= $mes["dias"]; $dia++) {
            $anio[$indice][$dia] = $dia . " de " . $mes["nombre"];
        }
    }
}

/************************************************************************
 * EJERCICIO 2
 ***********************************************************************/

$descripciones = ['A management information base (MIB) is a database used for managing the entities
                                        in  a communication network.',
                    'Directorio donde el server guarda su configuración', 'directorio donde el servidor guarda su 
                    configuracón', 'Directorio de instalación del framework PEAR', 'Archivo de inicialización de php',
                    'Directorio donde residen los archivos temporales del Servidor',
                    'Host del Servidor', 'Contenido de la cabecera Connection: de la petición actual, si existe. Por 
                    ejemplo: \'Keep-Alive\'.',];

function ejercicio2 ($array, $descripciones){
    $i=0;
    foreach ($array as $indice => $valor){
        if (array_key_exists($i, $descripciones)){
            $descripcion = $descripciones[$i];
        }
        else{
            $descripcion = "No Disponible";
        }
        // esta forma equivale a la anterior COMENTADA
        //compruebo que existe este indice en descripciones
        $descripcion = (array_key_exists($i, $descripciones)) ?
            $descripciones[$i] : "No disponible";
        $array_ejercicio2[$indice] = array(
          "valor" => $valor,
          "descripcion" => $descripcion
        );
        $i++;
    }
    return $array_ejercicio2;
}
$array_ejercicio2 = ejercicio2($_SERVER, $descripciones);

/************************************************************************
 * EJERCICIO 3
 ***********************************************************************/

function ejercicio3(){

    for ($i = 0; $i<=100; $i++) {
        $numeros[] = $i;
    }

    $randoms = array_rand($numeros, 3);

    $suma = 0;
    $texto = "La media de ";
    for ($i = 0; $i < count($randoms); $i++){
        if ($i<(count($randoms)-1)){
            $texto.= $randoms[$i].", ";
        }
        else{
            $texto = substr($texto, 0, -2);
            $texto.= " y ".$randoms[$i];
        }
        $suma+= $randoms[$i];
    }
    $media = round($suma/count($randoms), 2);
    $texto.= " es ".$media;
    return $texto;
}

/************************************************************************
 * EJERCICIO 4
 ***********************************************************************/

$year = [1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"];

function ejercicio4($year){
    uasort($year, "ordenaLongitud");
    return $year;
}

function ordenaLongitud($izquierda,$derecha){
    //Ordena en función de la longitud del valor
    $diferencia = strlen($izquierda) - strlen($derecha);
    if (!$diferencia) { //si tienen la misma longitud
        return strcmp ($izquierda, $derecha); //Devuelvo la comparación de los dos strings a nivel binario
    }
    return $diferencia; //Devuelvo la diferencia en caracteres de los dos strings
}

//Terminado en código HTML más abajo

/************************************************************************
 * EJERCICIO 5
 ***********************************************************************/

function ejercicio5($year){
    uasort($year, "ordenaLongitudDescendente");
    return $year;
}

function ordenaLongitudDescendente($izquierda,$derecha){
    //Ordena en función de la longitud del valor
    $diferencia = strlen($derecha) - strlen($izquierda);
    if (!$diferencia) { //si tienen la misma longitud
        return strcmp ($derecha, $izquierda); //Devuelvo la comparación de los dos strings a nivel binario
    }
    return $diferencia; //Devuelvo la diferencia en caracteres de los dos strings
}


//terminado en código HTML más abajo.

/************************************************************************
 * EJERCICIO 6
 ***********************************************************************/

$productos = [ "agua" => array ( "precio" => 1.02, "iva" => 2),
                "leche" => array ( "precio" => 0.95, "iva" => 1),
                "galletas" => array ( "precio" => 1.23, "iva" => 1),
                "pan" => array ( "precio" => 0.86, "iva" => 4),
                "cereales" => array ( "precio" => 2.30, "iva" => 2),
                "salmón" => array ( "precio" => 5.99, "iva" => 3),
                "solomillo" => array ( "precio" => 6.66, "iva" => 1),
                "yogures" => array ( "precio" => 2.00, "iva" => 3),
                "coca-cola" => array ( "precio" => 0.65, "iva" => 2),
                "sandía" => array ( "precio" => 3.80, "iva" => 1),
                "patatas fritas" => array ( "precio" => 2.99, "iva" => 4)];

$productos2 = array (
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2),
        array ( "nombre" => "agua", "precio" => 1.02, "iva" => 2)
        );

$array_ivas = [ 1, 1.04, 1.10, 1.21];

//Terminado en código HTML más abajo.

/************************************************************************
 * CORRECION EJERCICIO 1
 ***********************************************************************/

$jairoProductos = array(
        array ( "nombre" => "Leche", "precio" => 0.95, "iva" => 1 ),
        array ( "nombre" => "Galletas", "precio" => 2.95, "iva" => 2 ),
        array ( "nombre" => "Azúcar", "precio" => 3.25, "iva" => 0 ),
        array ( "nombre" => "Coca-cola", "precio" => 0.75, "iva" => 2 ),
        array ( "nombre" => "Patatas fritas", "precio" => 3.95, "iva" => 3 ),
        array ( "nombre" => "Cervezas", "precio" => 1.95, "iva" => 3 ),
        array ( "nombre" => "Yogures", "precio" => 1.25, "iva" => 0 ),
        array ( "nombre" => "Edamame", "precio" => 4.95, "iva" => 0 ),
        array ( "nombre" => "Alga Wakame", "precio" => 3.95, "iva" => 3 ),
        array ( "nombre" => "Lechuga", "precio" => 1.15, "iva" => 2 ));

$jairoIvas = array (0, 4, 10, 21);

//Modifico el array para que incluya el precio con iva
foreach ($jairoProductos as $key => $jairoProducto){
    //calculo el precio con iva
    $jairoIva = $jairoIvas[$jairoProducto["iva"]]/100;
    $jairoPrecioIva = $jairoProducto["precio"] * (1 + $jairoIva);
    $jairoProductos[$key]["precioIva"] = $jairoPrecioIva;
}

/************************************************************************
 * EJERCICIO 7
 ***********************************************************************/

//terminado en código HTML más abajo.

/************************************************************************
 * EJERCICIO 8
 ***********************************************************************/

//terminado en código HTML más abajo.

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css\style.css">
    </head>
    <body>
        <header>
            <h1>Programación en PHP</h1>
        </header>
            <div>
                <div>
                    <h3>Ejercicio 1</h3>
                    <h6>Desarrolla un array multidimensional que incluya todos los días del año de modo que se pueda
                        acceder a cada elemento en la forma $array[6][15] y un echo devuelva "15 de Junio".</h6>
                    <p>fecha: <?php diFecha(1, 16) ?></p>

                    <h4>Corrección 1</h4>
                    <p><?php echo "Mi cumpleaños es el " . $anio[1][16] . "." ?></p>
                </div>
                <div>
                    <h3>Ejercicio 2</h3>
                    <h6>Crea una función que muestre en pantalla una tabla con el contenido del array superglobal de
                        PHP $_SERVER, incluyendo el significado de cada índice.</h6>
                        <table>
                            <tr>
                                <th>Comando</th>
                                <th>Resultado</th>
                                <th>Descripción</th>
                            </tr>
                                <?php foreach ($array_ejercicio2 as $indice => $valor){ ?>
                            <tr>
                                <td><?php echo $indice ?></td>
                                <td><?php echo $valor['valor'] ?></td>
                                <td><?php echo $valor['descripcion'] ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                </div>
                <div>
                    <h3>Ejercicio 3</h3>
                    <h6>Crea una función que, dado un array de enteros de 0 a 100, extraiga 3 elementos al azar y
                        devuelva la media de ellos en formato "La media de num1, num2 y num3 es resultado".</h6>
                    <p><?php echo ejercicio3() ?></p>
                </div>
                <div>
                    <h3>Ejercicio 4</h3>
                    <h6>Crea un array asociativo con los nombres y números de los meses del año e imprímelo. A
                        continuación, ordénalo de forma ascendente respetando los índices según el tamaño del texto.</h6>
                    <p><?php imprimeArray($year) ?></p>
                    <p>Se ordena por longitud de texto ascendente</p>
                    <p><?php imprimeArray(ejercicio4($year)) ?></p>
                </div>
                <div>
                    <h3>Ejercicio 5</h3>
                    <h6>Modifica el ejemplo anterior para que el orden sea descendente.
                    </h6>
                    <p>ahora se ordena por longitud de texto descendente</p>
                    <p><?php imprimeArray(ejercicio5($year)) ?></p>
                </div>
                <div>
                    <h3>Ejercicio 6</h3>
                    <h6>Crea un array asociativo de al menos 10 productos con nombre, precio y tipo de
                        iva (1, 2, 3 ó 4). Crea un array de ivas con los tipos de iva como índices y el porcentaje de
                        iva como valores (0%, 4%, 10% y 21%). Recorre el array de productos y muestra en pantalla el
                        listado de productos, su precio sin iva, el tipo de iva y su precio con iva.
                    </h6>
                    <table class="tabla">
                        <tr>
                            <th>Producto</th>
                            <th>precio sin IVA</th>
                            <th>IVA</th>
                            <th>precio con IVA</th>
                        </tr>
                        <?php foreach ($productos as $indice => $valor){ ?>
                            <tr>
                                <td><?php echo $indice ?></td>
                                <td><?php echo number_format($valor["precio"],2)."\xE2\x82\xAc" ?></td>
                                <td><?php if ($valor["iva"] == 1) echo $porcentaje = (($array_ivas[0]-1)*100)."%";
                                          if ($valor["iva"] == 2) echo $porcentaje = (($array_ivas[1]-1)*100)."%";
                                          if ($valor["iva"] == 3) echo $porcentaje = (($array_ivas[2]-1)*100)."%";
                                          if ($valor["iva"] == 4) echo $porcentaje = (($array_ivas[3]-1)*100)."%";
                                          ?>
                                </td>
                                <td><?php if ($valor["iva"] == 1) echo $porcentaje =
                                                round(($valor["precio"]*($array_ivas[0])),2)."\xE2\x82\xAc";
                                            if ($valor["iva"] == 2) echo $porcentaje =
                                                round(($valor["precio"]*($array_ivas[1])),2)."\xE2\x82\xAc";
                                            if ($valor["iva"] == 3) echo $porcentaje =
                                                round(($valor["precio"]*($array_ivas[2])),2)."\xE2\x82\xAc";
                                            if ($valor["iva"] == 4) echo $porcentaje =
                                                round(($valor["precio"]*($array_ivas[3])),2)."\xE2\x82\xAc";
                                            ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div>
                    <fieldset>
                        <legend>Corrección Ejercicio 6</legend>
                        <table class="tabla">
                            <tr>
                                <th>Producto</th>
                                <th>precio sin IVA</th>
                                <th>IVA</th>
                                <th>precio con IVA</th>
                            </tr>
                            <?php foreach ($jairoProductos as $jairoProducto){ ?>
                            <tr>
                                <td><?php echo $jairoProducto["nombre"] ?></td>
                                <td><?php echo number_format($jairoProducto["precio"], 2, ",",
                                        "")."\xE2\x82\xAc" ?></td>
                                <td><?php echo $jairoIvas[$jairoProducto["iva"]]."%" ?></td>
                                <td><?php echo number_format($jairoProducto["precioIva"], 2, ",",
                                        "")."\xE2\x82\xAc" ?></td>
                            </tr>
                        <?php } ?>
                        </table>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 7</h3>
                    <h6>Modifica el ejercicio anterior para que muestre los productos ordenados por nombre.
                    </h6>
                    <?php ksort($productos) ?>
                    <table class="tabla">
                        <tr>
                            <th>Producto</th>
                            <th>precio sin IVA</th>
                            <th>IVA</th>
                            <th>precio con IVA</th>
                        </tr>
                        <?php foreach ($productos as $indice => $valor){ ?>
                            <tr>
                                <td><?php echo $indice ?></td>
                                <td><?php echo number_format($valor["precio"],2)."\xE2\x82\xAc" ?></td>
                                <td><?php if ($valor["iva"] == 1) echo $porcentaje = (($array_ivas[0]-1)*100)."%";
                                    if ($valor["iva"] == 2) echo $porcentaje = (($array_ivas[1]-1)*100)."%";
                                    if ($valor["iva"] == 3) echo $porcentaje = (($array_ivas[2]-1)*100)."%";
                                    if ($valor["iva"] == 4) echo $porcentaje = (($array_ivas[3]-1)*100)."%";
                                    ?>
                                </td>
                                <td><?php if ($valor["iva"] == 1) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[0])),2)."\xE2\x82\xAc";
                                    if ($valor["iva"] == 2) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[1])),2)."\xE2\x82\xAc";
                                    if ($valor["iva"] == 3) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[2])),2)."\xE2\x82\xAc";
                                    if ($valor["iva"] == 4) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[3])),2)."\xE2\x82\xAc";
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div>
                    <h3>Ejercicio 8</h3>
                    <h6>Modifica el ejercicio anterior para que muestre los productos ordenados por su precio con iva.
                    </h6>
                    <?php krsort($productos) ?>
                    <table class="tabla">
                        <tr>
                            <th>Producto</th>
                            <th>precio sin IVA</th>
                            <th>IVA</th>
                            <th>precio con IVA</th>
                        </tr>
                        <?php uasort($productos, function ($a, $b){
                                        return strcmp($a["iva"], $b["iva"]); });

                                foreach ($productos as $indice => $valor){ ?>
                            <tr>
                                <td><?php echo $indice ?></td>
                                <td><?php echo number_format($valor["precio"],2)."\xE2\x82\xAc" ?></td>
                                <td><?php if ($valor["iva"] == 1) echo $porcentaje = (($array_ivas[0]-1)*100)."%";
                                    if ($valor["iva"] == 2) echo $porcentaje = (($array_ivas[1]-1)*100)."%";
                                    if ($valor["iva"] == 3) echo $porcentaje = (($array_ivas[2]-1)*100)."%";
                                    if ($valor["iva"] == 4) echo $porcentaje = (($array_ivas[3]-1)*100)."%";
                                    ?>
                                </td>
                                <td><?php if ($valor["iva"] == 1) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[0])),2)."\xE2\x82\xAc";
                                    if ($valor["iva"] == 2) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[1])),2)."\xE2\x82\xAc";
                                    if ($valor["iva"] == 3) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[2])),2)."\xE2\x82\xAc";
                                    if ($valor["iva"] == 4) echo $porcentaje =
                                        round(($valor["precio"]*($array_ivas[3])),2)."\xE2\x82\xAc";
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div>
                    <fieldset>
                        <legend>Corrección Ejercicio 8</legend>
                        <table class="tabla">
                            <tr>
                                <th>Producto</th>
                                <th>precio sin IVA</th>
                                <th>IVA</th>
                                <th>precio con IVA</th>
                            </tr>
                            <?php imprimeArray($jairoProductos);

                            usort($jairoProductos, function ($a, $b){
                                    return strcmp($a["precioIva"], $b["precioIva"]);
                                    });

                                    foreach ($jairoProductos as $jairoProducto){ ?>
                                <tr>
                                    <td><?php echo $jairoProducto["nombre"] ?></td>
                                    <td><?php echo number_format($jairoProducto["precio"], 2, ",",
                                                "")."\xE2\x82\xAc" ?></td>
                                    <td><?php echo $jairoIvas[$jairoProducto["iva"]]."%" ?></td>
                                    <td><?php echo number_format($jairoProducto["precioIva"], 2, ",",
                                                "")."\xE2\x82\xAc" ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </fieldset>
                </div>
            </div>
    <footer>
        <div>
            <div>
                <p>Clase</p>
                <p>Desarrollo WEB Entorno Servidor</p>
            </div>
            <div>
                <p>Grado</p>
                <p>Desarrollo de Aplicaciones WEB</p>
            </div>
            <div>
                <p>Autor</p>
                <p>David Galiana Sotillo</p>
            </div>
        </div>
    </footer>
    </body>
</html>
