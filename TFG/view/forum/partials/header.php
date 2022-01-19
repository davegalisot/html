<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Gaming Point</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
              integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
              crossorigin="anonymous">
        <!-- FONTAWESOME CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
              integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
              crossorigin="anonymous">
        <!-- BOOTSTRAP TOGGLE CSS -->
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/app.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/common.css">
        <!-- JS BOOTSTRAP -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
                integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                crossorigin="anonymous"></script>
        <!-- BOOTSTRAP TOGGLE JS -->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <!-- JS -->
        <script src="<?php echo $_SESSION["public"] ?>js/common.js"></script>
    </head>
    <body class="d-flex flex-column">
    <header>
        <div class="row">
            <div id="logo" class="titulo col-2">
                <a href="http://davegalisot.com/TFG/public/index.php/"><img class="imgLogo" src="<?php echo $_SESSION["public"]."img/GamingPoint.png" ?>" alt=""></a>
            </div>
            <nav id="navbar" class="col-7 navbar navbar-expand-md justify-content-center">
                <div class="m_left navbar-collapse collapse justify-content align-items-center">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>">Inicio</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>noticias">Noticias</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>game_time">GameTime</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>forum">Foro</a>
                        </li>
                        <?php if (isset($_SESSION["usuario"])){ ?>
                            <?php if ($_SESSION["usuario"]->admin == 0) { ?>
                                <span class="mt-2 my-auto"> | </span>
                                <li class="nav-item my-auto">
                                    <a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel">Zona Personal</a>
                                </li>
                            <?php }else{ ?>
                                <span class="mt-2 my-auto"> | </span>
                                <li class="nav-item my-auto">
                                    <a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel">Panel de Administración</a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
            <div class="col-3 login text-right pr-5">
                <?php if (isset($_SESSION["usuario"])) { ?>
                    <a href="<?php echo $_SESSION["home"] ?>panel"><?php echo $_SESSION["usuario"]->usuario ?></a>
                    <a class="login" href="<?php echo $_SESSION["home"] ?>panel/salir">Salir</a>
                <?php }else{ ?>
                    <a href="<?php echo $_SESSION["home"] ?>panel">Login</a>
                <?php } ?>
            </div>
        </div>
    </header>