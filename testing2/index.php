<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Testing 2</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
    <!-- CSS FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
          crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- AJAX JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="script.js"></script>
</head>
<body>
<header>
    <div class="centered_vertically mx-auto width1500px">
        <div id="logo">
            <a href="<?php echo $_SESSION["public"] ?>">
                <img src="<?php echo $_SESSION["public"]."img/logos/Logo-TRN-Taryet-positivo-png.png" ?>">
            </a>
        </div>
        <div class="nav-y-theme-changer">
            <nav id="navbar" class="navbar-expand-md justify-content-center">
                <div class="navbar-collapse collapse justify-content align-items-center">
                    <ul class="navbar-nav mx-auto text-center">
                        <a href="<?php echo $_SESSION["public"] ?>">
                            <li class="nav-item my-auto">
                                <p>inicio</p>
                            </li>
                        </a>
                        <a href="<?php echo $_SESSION["home"] ?>quienes_somos">
                            <li class="nav-item my-auto">
                                <p>Quiénes somos</p>
                            </li>
                        </a>
                        <div class="dropdown nav-item">
                            <p class="dropbtn">qué hacemos</p>
                            <i id="chevron" class="chevron fas fa-chevron-up"></i>
                            <div class="dropdown-content">
                                <a href="<?php echo $_SESSION["home"] ?>movilidad">movilidad</a>
                                <a href="<?php echo $_SESSION["home"] ?>logistica">logística</a>
                                <a href="<?php echo $_SESSION["home"] ?>infraestructura">infraestructura</a>
                                <a href="<?php echo $_SESSION["home"] ?>analisis">análisis</a>
                                <a href="<?php echo $_SESSION["home"] ?>consultoria">consultoría</a>
                            </div>
                        </div>
                        <a href="<?php echo $_SESSION["home"] ?>contacto">
                            <li class="nav-item my-auto">
                                <p>contacto</p>
                            </li>
                        </a>
                        <a href="<?php echo $_SESSION["home"] ?>portfolio">
                            <li class="nav-item my-auto">
                                <p>portfolio</p>
                            </li>
                        </a>
                    </ul>
                </div>
            </nav>
            <div class="div-theme-changer">
                <label id="switch" class="switch">
                    <input type="checkbox" id="slider">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</header>
<div id="navbar-movil">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">movilidad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">logística</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">infraestructura</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">analisis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">consultoría</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<footer>
</footer>
</body>
</html>