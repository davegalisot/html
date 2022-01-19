<?php
include "listadoPersonajes.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <form method="post">
        <header>
            <div>
                <button type="submit" name="inicializar" value="Inicializar todo"></button>
            </div>
        </header>
        <div>
            <table class="scroll">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th><input class="ordenador" type="submit" name="nombre" value="Nombre"/>y<input
                            class="ordenador" type="submit" name="apellidos" value="Apellidos"/></th>
                    <th><input class="ordenador" type="submit" title="Ordenar <?php
                        echo ($_SESSION["contLugar"] == 0) ? "ascendente" : "descendente";
                        ?> por país" name="lugar" value="Lugar de Origen"/></th>
                    <th><input class="ordenador" type="submit" name="fecNac" value="Fecha de Nacimiento"/></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php //foreach para cada personaje cada personaje
                foreach ($_SESSION["personajes"] as $key => $valor) { ?>
                    <tr>
                        <td><!-- foto de cada personaje -->
                            <img class="foto" src="img/fotos/<?php echo $valor["foto"] ?>.jpg"
                                 title="<?php echo $valor["nombre"]." ".$valor["apellidos"] ?>"/>
                        </td>
                        <td><!-- nombre y apellidos -->
                            <p><?php echo $valor["nombre"] ?></p>
                            <p><?php echo $valor["apellidos"]?></p>
                        </td>
                        <td><!-- provincia y ciudad -->
                            <p><?php echo $valor["lugar"] ?></p>
                            <p><img class="bandera" src="img/flags/<?php echo $valor["pais"] ?>.png"/>
                                <?php echo " ".$_SESSION["paises"][$valor["pais"]] ?></p>
                        </td>
                        <td><!-- fecha de nacimiento -->
                            <p title="<?php echo (2018-substr($valor["fechaNacimiento"], 6, 4))." " ?>años">
                                <?php echo $valor["fechaNacimiento"]." " ?></p>

                        </td>
                        <td>
                            <div><!-- contenedor de los botones de visualizar perfil imdb, editar y borrar -->
                                <a href="<?php echo "https://www.imdb.com/name/nm".$valor["imdb"] ?>" target="_blank"
                                   title="Perfil de imdb"><button type="button" class="imdb"></button></a>
                                <button class="nuevaVentana" type="submit" title="editar" name="editar"
                                        value="<?php echo $key ?>"></button>
                                <button class="borrar" type="submit" title="borrar" name="borrar"
                                        onclick="return confirm('¿Estás seguro que quieres eliminar este personaje?')"
                                        value="<?php echo $key ?>"></button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
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