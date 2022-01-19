<?php
include "listadoPersonajesVista.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <header>
        <div>
            <img src="img/listadoPersonajes.png" draggable="false"/>
        </div>
    </header>
    <style>
        .error{
            color: <?php echo $colorError ?>;
        }
    </style>
    <div>
        <h1 id="h1" class="detalle">Edición de personaje</h1>
        <form method="post" enctype="multipart/form-data">
            <table class="tablaDetalle">
                <tr>
                    <td>
                        <p>Nombre:</p>
                        <p>Apellidos:</p>
                    </td>
                    <td>
                        <input type="text" name="nombre" onkeyup="filtroLetras(this)"
                               value="<?php echo $nombre ?>" autocomplete="off">
                        <br/>
                        <input type="text" name="apellidos" onkeyup="filtroLetras(this)"
                               value="<?php echo $apellidos ?>" autocomplete="off">
                    </td>
                    <td>
                        <p>Lugar de origen:</p>
                        <p>Fecha de nacimiento:</p>
                    </td>
                    <td>
                        <input type="text" name="lugar" onkeyup="filtroLetras(this)"
                               value="<?php echo $lugar ?>" autocomplete="off">
                        <br/>
                        <select name="dia"><!-- select de la fecha, día -->
                            <?php
                            $posicion = strpos($fechaNacimiento, "/");
                            $dia = substr($fechaNacimiento, 0, $posicion);
                            for($i = 1; $i <= 31; $i++) { ?>
                                <?php if ($i <= 9) $i = "0".$i ?>
                                <?php if ($i != $dia){ ?>
                                    <option value="<?php echo "$i" ?>"><?php echo "$i" ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo "$i" ?>"<?php echo " selected" ?>>
                                        <?php echo "$i" ?></option>
                                <?php } ?>
                            <?php }
                            ?>
                        </select>
                        <select name="mes"><!-- select de la fecha, mes -->
                            <?php
                            $posicion = strpos($fechaNacimiento, "/");
                            $mes = substr($fechaNacimiento, 3, $posicion);
                            for($i = 1; $i <= 12; $i++) { ?>
                                <?php if ($i <= 9) $i = "0".$i ?>
                                <?php if ($i != $mes){ ?>
                                    <option value="<?php echo "$i" ?>"><?php echo "$i" ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo "$i" ?>"<?php echo " selected" ?>>
                                        <?php echo "$i" ?></option>
                                <?php } ?>
                            <?php }
                            ?>
                        </select>
                        <select class="year" name="year"><!-- select de la fecha, año -->
                            <?php
                            $posicion = strpos($fechaNacimiento, "/");
                            $year = substr($fechaNacimiento, 6, $posicion+4);
                            for($i = 1900; $i <= 2018; $i++) { ?>
                                <?php if ($i <= 9) $i = "0".$i ?>
                                <?php if ($i != $year){ ?>
                                    <option value="<?php echo "$i" ?>"><?php echo "$i" ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo "$i" ?>"<?php echo " selected" ?>>
                                        <?php echo "$i" ?></option>
                                <?php } ?>
                            <?php }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>País:</p>
                    </td>
                    <td><!-- selector del pais -->
                        <select name="pais">
                            <?php
                            foreach( $_SESSION["paises"] as $key => $valor) { ?>
                                <?php if ($key != $selectPais){ ?>
                                    <option value="<?php echo $key ?>"><?php echo $valor ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $key ?>"<?php echo " selected" ?>>
                                        <?php echo $valor ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <p>Foto:</p>
                    </td>
                    <td><!-- foto del personaje -->
                        <img class="foto" src="img/fotos/<?php
                        echo $_SESSION["personajes"][$_SESSION["personaje"]]["foto"] ?>.jpg"/>
                    </td>
                </tr>
            </table>
            <div class="divVolver">
                <div>
                    <p>Subir foto:</p>
                    <input type="file" name="subirFoto" size="42"/>
                    <input type="submit" name="guardarFoto" value="Subir foto al servidor">
                </div>
                <div class="selectorFotoDir">
                    <p>Seleccionar foto del servidor:</p>
                    <select name="fotoDir"><!-- selector de las fotos subidas en el servidor -->
                        <?php
                        $files = glob("img/fotos/*.*");
                        for ($i = 0; $i < count($files); $i++) {
                            $image = $files[$i];
                            $supported_file = array(
                                'gif',
                                'jpg',
                                'jpeg',
                                'png'
                            );
                            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

                            if (in_array($ext, $supported_file)) {
                                if ( substr(basename($image), 0, strpos(basename($image), ".")) ==
                                        $_SESSION["personajes"][$_SESSION["personaje"]]["foto"]){
                                    ?>
                                    <option value="<?php echo substr(basename($image), 0, strpos(basename($image), ".")) ?>"
                                        <?php echo " selected" ?>>
                                    <?php echo basename($image) ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo substr(basename($image), 0, strpos(basename($image), ".")) ?>">
                                    <?php echo basename($image) ?></option>
                            <?php } } else {
                                continue;
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <p class="error"><?php echo $_SESSION["error"]." ".$_SESSION["errorEXT"] ?></p>
                </div>
                <div>
                    <button class="nuevoVolver" type="submit" name="guardarNuevo" title="guardar como nuevo y volver"></button>
                    <button class="guardar" type="submit" name="guardar" title="guardar"></button>
                    <button class="volver" type="button"  onclick="location.href='index.php';" title="volver"></button>
                </div>
            </div>
        </form>
    </div>
    <footer>
        <p id="reloj">Hora actual</p>
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