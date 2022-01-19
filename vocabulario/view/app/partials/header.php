<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <!-- TÍTULO -->
        <title>Vocabulario - Aprende Inglés</title>
        <!-- NO SCALABLE -->
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
              integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
              crossorigin="anonymous">
        <!-- FONTAWESOME CSS -->
<!--        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"-->
<!--              integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"-->
<!--              crossorigin="anonymous">-->
        <script src="https://kit.fontawesome.com/59c64d8965.js" crossorigin="anonymous"></script>
        <!-- BOOTSTRAP TOGGLE CSS -->
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- CSS -->
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
    <body class="mx-auto">
       <header>
           <script type="text/javascript">
               //Mantiene la posición del scroll al refrescar la página
               document.addEventListener("DOMContentLoaded", function(event) {
                   var scrollpos = localStorage.getItem('scrollpos');
                   if (scrollpos) window.scrollTo(0, scrollpos);
               });

               window.onbeforeunload = function(e) {
                   localStorage.setItem('scrollpos', window.scrollY);
               };
           </script>
       </header>