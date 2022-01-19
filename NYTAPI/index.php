<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>New York Times API</title>
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
        <!-- ANIMATE.CSS -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
              integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
              crossorigin="anonymous" />
        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
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
        <!-- PACE (loading bar) -->
        <script type="text/javascript" src="js/pace.min.js"></script>
        <!-- JS -->
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/archive.js"></script>
        <script type="text/javascript" src="js/search.js"></script>
        <script type="text/javascript" src="js/topStories.js"></script>
        <script type="text/javascript" src="js/geoLocation.js"></script>
    </head>
    <body>
    <header class="animate__animated animate__fadeIn animate__delay-1s animate_slow">
<!--        <div class="volverPrincipal">-->
<!--            <a class="d-flex" href="https://www.davegalisot.com">-->
<!--                <img class="flecha" src="img/flecha_atras.png">-->
<!--                <p class="m-0 my-auto">Volver a Davegalisot.com</p>-->
<!--            </a>-->
<!--        </div>-->
        <div>
            <div class="logo"></div>
            <div>
                <!-- Logo New York Times API -->
                <img src="img/NYTAPI.png">
            </div>
        </div>
        <div class="covid-api-and-theme-changer">
            <div class="div-covid-api">
                <a href="..\covid19-api" target="_blank">
                    <h4>COVID-19 API</h4>
                </a>
            </div>
            <!--<div class="div-api-test">
                <a id="api-test">test</a>
            </div>-->
            <div class="div-theme-changer">
                <label id="switch" class="switch">
                    <input type="checkbox" id="slider" class="theme-changer-input">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <div class="divFlex">
            <div class="divColumn">
                <!-- muestra la hora -->
                <p id="reloj">loading the time...</p>
            </div>
            <!-- muestra el tiempo -->
            <div id="divTiempo">

            </div>
        </div>
    </header>
    <div class="nav animate__animated animate__fadeIn animate__delay-1dot2s animate_slow">
        <ul>
<!--            <li>-->
<!--                <div class="input-group">-->
<!--                    <div class="input-group-prepend">-->
<!--                        <label class="btn input-group-text" for="inputGroupSelect02">Archive</label>-->
<!--                    </div>-->
<!--                    <select class="custom-select select-height" id="inputGroupSelect02">-->
<!--                        <option selected disabled>Choose year</option>-->
<!--                    </select>-->
<!--                    <select class="custom-select select-height" id="inputGroupSelect03">-->
<!--                        <option selected disabled>Choose month</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </li>-->
            <li>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="btn input-group-text " for="inputGroupSelect01">Top Stories</label>
                    </div>
                    <select class="custom-select select-height" id="inputGroupSelect01">
                        <option selected disabled>Choose category</option>
                    </select>
                </div>
            </li>
            <li>
                <div class="btn" id="mostPop">Most Popular</div>
            </li>
            <li>
                <div class="btn" id="mostPop7">Most Popular this Week</div>
            </li>
            <li>
                <div class="input-group mb-3">
                    <input id="searchField" class="form-control select-height" type="text"  placeholder="Search for news here..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button id="searchButton" class="btn btn-outline-secondary" type="button" >Search</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="nav animate__animated animate__fadeIn animate__delay-1dot4s animate_slow">
        <ul>
            <li>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="btn input-group-text " for="inputGroupSelect04">Best Sellers Books per Category</label>
                    </div>
                    <select class="custom-select select-height" id="inputGroupSelect04">
                        <option selected disabled>Choose category</option>
                    </select>
                </div>
            </li>
        </ul>
    </div>
    <div class="divMostrador animate__animated animate__fadeIn animate__delay-1dot6s animate_slow">
        <h2 id="mostrador"></h2>
    </div>
    <div class="mantenedor-altura-pc animate__animated animate__fadeIn animate__delay-1dot8s animate_slow">
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </div>
    <div id="contenedorPrincipal" class="animate__animated animate__fadeIn animate__delay-2s animate_slow"></div>
    <!-- button go to top & Theme Changer -->
    <div id="btn-go-to-top">
        <img src="img/arrow-circle-up-solid-black.svg">
    </div>
    <!-- cookies banner -->
    <div id="cookies">
        <div>
            <h3>Cookies!</h3>
            <p>We use cookies to personalise content and make your browsing experience better.
                By continuing to use our website, you agree to their use</p>
        </div>
        <a id="cookie-accept">Accept</a>
    </div>
    <footer>
        <div class="dataNYT">
            <img class="dataNYT" src="img/dataNYTBlack.png" alt="">
        </div>
        <div>
            <div>
                <p>Grado</p>
                <p>Desarrollo de aplicaciones WEB</p>
            </div>
            <div>
                <p>Clase</p>
                <p>Desarrollo WEB Entorno Cliente</p>
            </div>
            <div>
                <p>Profesor</p>
                <p>Nacho Barnes</p>
            </div>
            <div>
                <p>Autor</p>
                <p>David Galiana Sotillo</p>
            </div>
        </div>
    </footer>
    </body>
</html>