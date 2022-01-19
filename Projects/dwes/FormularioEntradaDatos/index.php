<?php require("logic.php") ?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Entrada de Datos</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/javascript.js"></script>
</head>
<body>
<header>
    <h1>Formulario de Entrada de Datos<span id="spanHeader">_</span></h1>
</header>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <fieldset>
            <legend>Datos Personales</legend>
            <div class="flex">
                <div>
                    <p>Nombre</p>
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" autocomplete="off">
                </div>
                <div>
                    <p>Apellidos</p>
                    <input class="ancho" type="text" name="apellidos" value="<?php echo $apellidos ?>" autocomplete="off">
                </div>
            </div>
            <p class="oculto <?php echo $errorNombre ?>"><?php echo $mensajeNombre ?></p>
            <div>
                <p>Teléfono</p>
                <input type="text" name="telf" value="<?php echo $telf ?>" autocomplete="off">
            </div>
            <p class="oculto <?php echo $errorTelf ?>"><?php echo $mensajeTelf ?></p>
            <div>
                <p>Dirección</p>
                <input class="ancho2" type="text" name="address"  value="<?php echo $address ?>" autocomplete="off">
            </div>
            <p class="oculto <?php echo $errorAddress ?>"><?php echo $mensajeAddress ?></p>
            <div class="flex">
                <div>
                    <p>Provincia</p>
                    <?php $provincias = explode("\n",
                        file_get_contents("files/provincias.txt")); ?>
                    <select name="selectProvincias">
                        <?php for ($i = 0; $i < count($provincias); $i++){ ?>
                            <?php if ($i == 0){ ?>
                                <option disabled selected value="">selecciona provincia</option>
                            <?php }else{ ?>
                            <option value="<?php echo substr($provincias[$i], 0, 2) ?>"
                                <?php echo ($selectProvincias == substr($provincias[$i], 0, 2))
                                    ? "selected" : ""?>>
                                <?php echo substr($provincias[$i],3) ?></option>
                        <?php } } ?>
                    </select>
                </div>
                <div>
                    <p>Ciudad</p>
                    <input type="text" name="ciudad" value="<?php echo $ciudad ?>" autocomplete="off">
                </div>
                <div>
                    <p>Código Postal</p>
                    <input class="cp" type="text" name="cp" value="<?php echo $cp ?>" autocomplete="off">
                </div>
            </div>
            <p class="oculto <?php echo $errorCiudad ?>"><?php echo $mensajeCiudad ?></p>
            <div>
                <p>Website</p>
                <input class="ancho2" type="text" name="web" value="<?php echo $web ?>" autocomplete="off">
            </div>
            <p class="oculto <?php echo $errorWeb ?>"><?php echo $mensajeWeb ?></p>
        </fieldset>
        <div class="contenedor">
            <fieldset class="fieldset">
                <legend>Datos de Login</legend>
                <div>
                    <p>email</p>
                    <input class="ancho" type="text" name="email" value="<?php echo $correo ?>" autocomplete="off">
                </div>
                <p class="oculto <?php echo $errorCorreo ?>"><?php echo $mensajeCorreo ?></p>
                <div>
                    <p>Password</p>
                    <input id="psswrd" type="password" name="pass" value="<?php echo $pass ?>" autocomplete="off">
                    <span id="contSpan"></span>
                </div>
                <p class="oculto <?php echo $errorPass ?>"><?php echo $mensajePass ?></p>
            </fieldset>
            <div id="password">
                <p>Requisitos de contraseña</p>
                <ul>
                    <li>Entre 8 y 16 caracteres</li>
                    <li>Al menos un número</li>
                    <li>Al menos una mayúscula</li>
                    <li>Al menos una minúscula</li>
                    <li>Al menos un caracter (!@#$%*)</li>
                </ul>
            </div>
        </div>
        <div class="botonEnviar">
        <input class="enviar" type="submit" name="enviar"/>
        </div>
    </form>
    <?php require("php/footer.php") ?>
</body>
</html>
