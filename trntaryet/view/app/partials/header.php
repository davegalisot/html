<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>TRNTÁRYET</title>
        <!-- FAVICON -->
        <link rel="shortcut icon" href="public/img/logos/Logo-TRN-Taryet-png.png" type="image/x-icon"/>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <!-- FONTAWESOME CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
              integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
              crossorigin="anonymous">
<!--        <script src="https://kit.fontawesome.com/59c64d8965.js" crossorigin="anonymous"></script>-->
        <!-- BOOTSTRAP TOGGLE CSS -->
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- ODOMETER CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/odometer-theme-default.css">
        <!-- ANIMATE.CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/animate.css">
        <!-- SLICK CSS -->
<!--        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/common.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/index.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/quienes-somos.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/que-hacemos.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/trabaja-con-nosotros.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/contacto.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/mediaQueryMaxWidth1200.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/mediaQueryMaxWidth992.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/mediaQueryMaxWidth768.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["public"] ?>css/mediaQueryMaxWidth576.css">
        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <!-- BOOTSTRAP JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        <!-- BOOTSTRAP TOGGLE JS -->
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <!-- ODOMETER JS -->
        <script src="<?php echo $_SESSION["public"] ?>js/odometer.min.js"></script>
        <!-- SLICK SLIDER -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        <!-- SLICK JS -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <!-- SCROLL TO FIXED PLUGIN -->
        <script src="<?php echo $_SESSION["public"] ?>js/jquery-scrolltofixed-min.js"></script>
        <!-- PACE (LOADING BAR) -->
        <script src="<?php echo $_SESSION["public"] ?>js/pace.min.js"></script>
        <!-- JS -->
        <script src="<?php echo $_SESSION["public"] ?>js/common.js"></script>
        <!-- NO SCALABLE -->
        <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />
    </head>
    <body id="body" class="d-flex flex-column">
       <header>
           <div class="progress-bar" id="myBar"></div>
           <div class="centered_vertically mx-auto width1500px">
               <div id="logo">
                   <a href="<?php echo $_SESSION["public"] ?>">
                       <img src="<?php echo $_SESSION["public"]."img/logos/Logo-TRN-Taryet-positivo-png.png" ?>">
                   </a>
               </div>
               <div class="nav-y-theme-changer">
                   <nav id="navbar" class="navbar-expand-md justify-content-center">
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                       </button>
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