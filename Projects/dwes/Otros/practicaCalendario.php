<?php
// Selecciono el idioma para la variable strftime
setlocale(LC_ALL, 'es_ES');

//Array del año con los meses y sus días correspondientes
$year = [ array ( "nombre" => "Enero", "dias" => 31),
            array ( "nombre" => "Febrero", "dias" => 28),
            array ( "nombre" => "Mazro", "dias" => 31),
            array ( "nombre" => "Abril", "dias" => 30),
            array ( "nombre" => "Mayo", "dias" => 31),
            array ( "nombre" => "Junio", "dias" => 30),
            array ( "nombre" => "Julio", "dias" => 31),
            array ( "nombre" => "Agosto", "dias" => 31),
            array ( "nombre" => "Septiembre", "dias" => 30),
            array ( "nombre" => "Octubre", "dias" => 31),
            array ( "nombre" => "Noviembre", "dias" => 30),
            array ( "nombre" => "Diciembre", "dias" => 31) ];

//array con los días de la semana acortado a 3 letras para el encabezado de la tabla.
$dias = ["Lun", "Mar", "Mie", "Jue", "vie", "Sab", "Dom"];
//Variable de control para el inicio del calendario.
$contador = 0;

//Variables para controlar fechas
$mesActual = date("n")-1;
$diaActual = date("j");
$diaActualLetra = strftime("%A");
$mesActualLetra = strftime("%B");
$hora = strftime("%H:%M");

//Variable para iniciar el calendario en el año 2018
$header = 2018;
//3 ifs llamados por los botones para cambiar el calendario de año
if (isset($_REQUEST ["2016"] )){
    $header = 2016;
    $contador = 4;
}
if (isset($_REQUEST ["2017"] )){
    $header = 2017;
    $contador = 6;
}
if (isset($_REQUEST ["2018"] )){
    $header = 2018;
    $contador = 0;
}
if (isset($_REQUEST ["2019"] )){
    $header = 2019;
    $contador = 1;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!-- link a la hoja de estilo -->
    <link rel="stylesheet" href="css/practicaCalendario.css">
</head>
<body>
    <header>
        <div>
            <img src="img/pergamino.png">
            <h1>Calendario <?php echo $header ?></h1>
        </div>
    </header>
    <nav class="navbar">
        <form action="practicaCalendario.php" method="post">
            <input type="submit" name="2016" value="2016"/>
            <input type="submit" name="2017" value="2017"/>
            <input type="submit" name="2018" value="2018"/>
            <input type="submit" name="2019" value="2019"/>
        </form>
    </nav>
    <div>
        <div class="practicaCalendario">
            <?php //recorro el array del año para obtener los valores del mes y los días de cada mes
                    foreach ($year as $key => $valor) { ?>
                    <!-- tabla que engloba cada mes -->
                    <div class="bordeTablas">
                        <table class="tablaCalendario">
                            <!-- El nombre del mes en la tabla -->
                            <caption><?php echo $valor["nombre"] ?></caption>
                            <tr>
                                <!-- array con los días de la semana acortados a 3 letras para encabezar los días del mes -->
                                <?php foreach ($dias as $dia){ ?>
                                    <!-- llamo al valor que corresponda del array anterior -->
                                    <th><?php echo $dia ?></th>
                               <?php } ?>
                            </tr>
                            <tr>
                                <?php // variable que guarda cuántos días se han mostrado para, posteriormente, insertar un <tr>
                                        $cuentaDias = 0;
                                        // guarda el número espacios se han pintado antes de empezar a pintar el día 1 de cada mes
                                        $controlMesAnterior = 0;
                                // recorro el for hasta el número de días de cada mes, sacado del array $year
                                for ($i = 1; $i <= $valor["dias"]; $i++) {
                                    // guardo el número de días pintado para en el mes siguiente dejar ese espacio
                                    if ($contador > 0) {
                                        // pinta huecos vacíos al inicio de cada mes
                                        for ($j = 1; $j <= $contador; $j++) { ?>
                                            <td class="diaAnterior"></td>
                                            <!-- cuento cuantos espacios he pintado para saber cuando cambiar de fila -->
                                            <?php $controlMesAnterior++;
                                        }
                                        // una vez pintado del mes anterior la inicio a 0 para el siguiente mes
                                        $contador = 0;
                                    }
                                    //condiciones para pintar el día actual
                                    if ($header == 2018 and $mesActual == $key and $diaActual == $i){ ?>
                                        <td class="diaActual"><?php echo $i ?></td>
                                    <?php }
                                    else {?>
                                        <!-- pinta el día del mes -->
                                        <td><?php echo $i ?></td>
                                    <!-- control de dias pintados para saber cuando saltar de fila -->
                                    <?php }
                                    $cuentaDias++;
                                    // Si el número de dias pintados es 7 o los dias pintados mas los pintados en blanco suman 7
                                    if ($cuentaDias == 7 or $i + $controlMesAnterior == 7){ ?>
                                        </tr><tr>
                                    <!-- resetea el contador de días para saber cuándo hacer el proximo salto de fila -->
                                    <?php $cuentaDias = 0;
                                    }
                                } ?>
                            </tr>
                        </table>
                    </div>
                <!-- al terminar el mes asigno a contador los dias pintados para el proximo mes -->
            <?php $contador = $cuentaDias;  } ?>
        </div>
    </div>
    <h6><?php echo "Hoy es ".$diaActualLetra.", ".$diaActual." de ".$mesActualLetra." de 2018 a las ".$hora ?></h6>
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
