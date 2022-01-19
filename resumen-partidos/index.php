<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resumen de partidos de fútbol</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
          crossorigin="anonymous">
    <!-- BOOTSTRAP TOGGLE CSS -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- ODOMETER CSS -->
<!--    <link rel="stylesheet" type="text/css" href="odometer-theme-default.css">-->
    <!-- ANIMATE.CSS -->
<!--    <link rel="stylesheet" type="text/css" href="animate.css">-->
    <!-- SLICK CSS -->
    <!--        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
    <!-- PACE (LOADING BAR) -->
    <script type="text/javascript" src="js/pace.min.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <header>
    </header>
    <article id="mainArticle">
        <div class="main-title">
            <h1>Resumen de partidos de fútbol</h1>
            <p>Premier League, La Liga, Bundesliga y demás</p>
        </div>
        <nav>
            <ul>
                <li><a href="#section-spain-data">España<span id="span-spain"></span></a></li>
                <li><a href="#section-england-data">Inglaterra<span id="span-england"></span></a></li>
                <li><a href="#section-germany-data">Alemania<span id="span-germany"></span></a></li>
                <li><a href="#section-italy-data">Italia<span id="span-italy"></span></a></li>
                <li><a href="#section-portugal-data">Portugal<span id="span-portugal"></span></a></li>
                <li><a href="#section-other-data">Otras ligas<span id="span-other"></span></a></li>
            </ul>
        </nav>
        <section id="section-spain-data">
            <div class="liga">
                <img src="img/flags/spain.svg" class="flag">
                <div class="pais-liga">
                    <h1>España</h1>
                    <p>La Liga</p>
                </div>
            </div>
            <div id="spain-data" class="mainData">
                <h3 class="mensaje_error">No hay resúmenes recientes</h3>
            </div>
        </section>
        <section id="section-england-data">
            <div class="liga">
                <img src="img/flags/england.svg" class="flag">
                <div class="pais-liga">
                    <h1>Inglaterra</h1>
                    <p>Premier League</p>
                </div>
            </div>
            <div id="england-data" class="mainData">
                <h3 class="mensaje_error">No hay resúmenes recientes</h3>
            </div>
        </section>
        <section id="section-germany-data">
            <div class="liga">
                <img src="img/flags/germany.svg" class="flag">
                <div class="pais-liga">
                    <h1>Alemania</h1>
                    <p>Bundesliga</p>
                </div>
            </div>
            <div id="germany-data" class="mainData">
                <h3 class="mensaje_error">No hay resúmenes recientes</h3>
            </div>
        </section>
        <section id="section-italy-data">
            <div class="liga">
                <img src="img/flags/italy.svg" class="flag">
                <div class="pais-liga">
                    <h1>Italia</h1>
                    <p>Serie A</p>
                </div>
            </div>
            <div id="italy-data" class="mainData">
                <h3 class="mensaje_error">No hay resúmenes recientes</h3>
            </div>
        </section>
        <section id="section-portugal-data">
            <div class="liga">
                <img src="img/flags/portugal.svg" class="flag">
                <div class="pais-liga">
                    <h1>Portugal</h1>
                    <p>Primeira Liga</p>
                </div>
            </div>
            <div id="portugal-data" class="mainData">
                <h3 class="mensaje_error">No hay resúmenes recientes</h3>
            </div>
        </section>
        <section id="section-other-data">
            <div id="div-other-data" class="liga">
                <h1>Otras ligas</h1>
            </div>
            <div id="other-data" class="mainData">
                <h3 class="mensaje_error">No hay resúmenes recientes</h3>
            </div>
        </section>
    </article>
    <footer>
        <div class="width1500px m-auto">
            <div class="footer-separator mx-auto"></div>
            <div class="d-flex flex-row justify-content-between firma">
                <p class="m-0">davegalisot@gmail.com</p>
                <a href="https://www.davegalisot.com">
                    <img src="../img/logos/davegalisot-wd-logo-grande-fondo-negro.png">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>