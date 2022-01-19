<?php
include "logic.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tienda de Deportes</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <form method="post">
        <header>
            <div>
                <button type="submit" name="inicializar">Tienda de deportes</button>
            </div>
        </header>
        <section>
            <div>
                <input type="text" name="busqueda" placeholder="busca aquí respetando mayus"
                       value="<?php echo ($busqueda) ? $busqueda : "" ?>" autocomplete="off"/>
                <input type="submit" name="botonBusqueda" value="Búsqueda"/>
                <input type="submit" name="limpiarBusqueda" value="Limpiar Búsqueda">
            </div>
            <table>
                <tr>
                    <th>Foto</th>
                    <th><input class="ordenador" type="submit" name="nombre" value="Nombre <?php echo ($_SESSION["contNombre"] < 1) ? "&darr;" : "&uarr;" ?>"/></th>
                    <th><input class="ordenador" type="submit" name="precio" value="Precio <?php echo ($_SESSION["contPrecio"] < 1) ? "&darr;" : "&uarr;" ?>"/></th>
                    <th><input class="ordenador" type="submit" name="stock" value="Stock <?php echo ($_SESSION["contStock"] < 1) ? "&darr;" : "&uarr;" ?>"/></th>
                </tr>
                <?php foreach ($_SESSION["productos"] as $key => $valor){ ?>
                <tr>
                    <article>
                        <td>
                            <img class="escala" src="img/<?php echo $valor["img"] ?>.png" alt="<?php $valor["img"] ?>">
                        </td>
                        <td>
                            <h3><?php echo $valor["nombre"] ?></h3>
                        <td>
                            <p><?php echo $valor["precio"]."\xE2\x82\xAc" ?></p>
                        </td>
                        <td>
                            <p><?php echo $valor["stock"] ?></p>
                        </td>
                    </article>
                </tr>
                <?php } ?>
            </table>
        </section>
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