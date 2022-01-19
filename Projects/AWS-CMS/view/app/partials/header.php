<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Mi primer Blog</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
              integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
              crossorigin="anonymous">
        <!-- FONTAWESOME CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
              integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
              crossorigin="anonymous">
        <!-- SUMMERNOTE CSS -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/app.css">

        <!-- JS Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
                integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
                integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
                crossorigin="anonymous"></script>
        <!-- SUMMERNOTE JS -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
        <!-- JS -->
        <script src="<?php echo $_SESSION["public"] ?>js/panel.js"></script>
    </head>
    <body>
        <header>
            <h1>Mi primer Blog</h1>
            <h2>con POO, MVC y MYSQL</h2>
        </header>