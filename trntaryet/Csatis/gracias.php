<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>TRNTÁRYET</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../public/img/logos/Logo-TRN-Taryet-png.png" type="image/x-icon"/>
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
    <link rel="stylesheet" type="text/css" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- ANIMATE.CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/animate.css">
    <!-- SLICK CSS -->
    <!--        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/csatis.css">
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
    <!-- JS -->
    <script charset="utf-8" src="../public/js/csatis.js"></script>
    <!--    <script charset="utf-8" src="../public/js/common.js"></script>-->
    <!-- NO SCALABLE -->
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />
</head>
<body id="body" class="d-flex flex-column">
<header>
    <div class="centered_vertically mx-auto width1500px">
        <div id="logo">
            <img src="../public/img/logos/Logo-TRN-Taryet-positivo-png.png">
        </div>
    </div>
</header>
<!-- SECTION CON IMAGEN DE FONDO Y LETRAS EN BLANCO -->
<section>
    <article class="article-titulo">
        <div class="foto-titulo">
            <h1 class="text-center animated slideInUp faster">satisfacción<span> <?php echo $_SESSION["ok"] ?></span></h1>
            <div class="blanco-tapa-h1"></div>
        </div>
    </article>
</section>
<section class="section-gracias">
    <h1 class="gracias-colab text-center">GRACIAS POR SU COLABORACIÓN</h1>
</section>
<footer id="footer" class="animated fadeIn">
    <div class="footer-flex width1500px mx-auto">
        <div class="footer-isos">
            <img class="isos" src="../public/img/logos/logo-bureau-iso-transparente.png" alt="">
            <a href="../public/img/pdf/POLITICA-CALIDAD-TRNTARYET.pdf" target="_blank">Política de calidad</a>
        </div>
        <div class="footer-info">
            <h4>Información</h4>
            <a href="../view/app/legal.php">Aviso legal</a>
            <a href="../view/app/privacidad">Política de privacidad</a>
            <a href="../view/app/cookies">Política de cookies</a>
            <!--                    <p>Información medioambiental</p>-->
        </div>
        <div class="footer-telfs">
            <h4>Teléfonos</h4>
            <p>Madrid: +34 91 409 60 75</p>
            <p>Barcelona: +34 607 074 890</p>
            <p>Lima: +572 618 05 19</p>
        </div>
        <div class="footer-sobre">
            <h4>Sobre nosotros</h4>
            <p>TRN TÁRYET es la empresa del Grupo TPF especializada en Consultoría del Transporte. TPF Group,
                una de las empresas multidisciplinares de ingeniería más importantes de Europa, con uno de los
                crecimientos más rápidos en el mundo.</p>
        </div>
        <div class="rrss-logos">
            <a href="" target="_blank">
                <img src="../public/img/logos/rrss/linkedin-logo.png">
            </a>
        </div>
        <div class="footer-mQ-576">
            <div class="footer-isos footer-isos-mQ-576">
                <img class="isos" src="../public/img/logos/logo-bureau-iso-transparente.png" alt="">
                <a href="../public/img/pdf/POLITICA-CALIDAD-TRNTARYET.pdf" target="_blank">Política de calidad</a>
            </div>
            <div class="rrss-logos rrss-mQ-576">
                <a href="" target="_blank">
                    <img src="../public/img/logos/rrss/linkedin-logo.png"?>
                </a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>