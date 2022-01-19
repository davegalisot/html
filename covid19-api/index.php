<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>COVID-19 API</title>
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
    <article>
        <section>
            <div class="covid-data">
                <h1>COVID REALTIME DATA</h1>
                <p>data obtained from rapidapi.com</p>
            </div>
        </section>
        <section>
            <h2>Global data</h2>
            <p id="dataLastUpdated" class="rect"></p>
        </section>
        <section class="mainData">
            <div id="mainCont" class="apiData"></div>
        </section>
        <section>
            <div id="byCountrySelect">
                <h2>Data per country</h2>
                <h3 class="mini-info">(please, refresh if no countries are shown in the list)</h3>
<!--                <p>(you can choose multiple)</p>-->
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected disabled>Choose country</option>
                </select>
            </div>
        </section>
<!--        <section id="byCountryDate" class="rect"></section>-->
        <section class="mainData">
            <div id="byCountryDiv" class="apiData"></div>
        </section>
        <section id="clearButton" class="mainData"></section>
    </article>
    <footer>
    </footer>
</body>
</html>