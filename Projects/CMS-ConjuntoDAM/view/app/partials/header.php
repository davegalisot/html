<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Gadgetrón Tienda</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
          crossorigin="anonymous">

    <!-- SUMMERNOTE CSS -->
    <!--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">-->

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
    <!-- SUMMERNOTE JS -->
    <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>-->
    <!-- JS -->
    <script src="<?php echo $_SESSION["public"] ?>js/common.js"></script>

    <!-- Fuentes Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron:400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900&amp;subset=latin-ext"
          rel="stylesheet">
</head>
<body id="body">
<header id="header">
    <div class="volverPrincipal">
        <a class="d-flex justify-content-center" href="https://www.davegalisot.com">
            <img class="flecha" src="<?php echo $_SESSION["public"]."img/flecha_atras.png" ?>">
            <p class="m-0 my-auto">Volver a Davegalisot.com</p>
        </a>
    </div>
    <h1 id="logo" class="titulo">
        <a href="http://www.davegalisot.com/Projects/CMS-ConjuntoDAM/public/index.php/">GADGETR<i class="cogwheel fas fa-cog"></i>N</a>
    </h1>
    <h3 class="eslogan"></h3>
</header>