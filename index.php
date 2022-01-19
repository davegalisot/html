<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>DaVeGaLiSoT | Web Developer</title>
        <meta name="Description" content="This is my Web Portfolio.">
        <!-- FAVICON -->
        <link rel="shortcut icon" href="img/icons/favicon.jpg" type="image/x-icon"/>
        <!-- HOSTED CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
        <!-- HOSTED JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
                integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/0.7.8/pace.min.js"
                integrity="sha512-t3TewtT7K7yfZo5EbAuiM01BMqlU2+JFbKirm0qCZMhywEbHZWWcPiOq+srWn8PdJ+afwX9am5iqnHmfV9+ITA=="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/EaselJS/1.0.2/easeljs.min.js"
                integrity="sha512-LFVrDRb8AtfnlgyB/CDam6ESv7P88EdiUApUYYOv8T7/RT5M05ogumlzPegCPqHk/SqeBjW/0F/FbbyBenCkKg=="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
                integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
                crossorigin="anonymous"></script>
        <!-- LOCAL CSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- LOCAL JS -->
        <script src="js/script.js"></script>
        <script src="js/particle-engine.js"></script>
    </head>
    <body>
        <header>
        </header>
        <!-- HOME -->
        <section id="home" class="inView">
            <!-- LOGO -->
            <div id="title">
                <div class="animate__animated"></div>
            </div>
            <!-- MAIN BUTTON -->
            <div id="div-btn-trabajo">
                <p id="btn-trabajo" class="animate__animated">MIS PROYECTOS</p>
                <img class="animate__animated" src="img/buttons/flecha-abajo.png"/>
            </div>
            <canvas id="projector"></canvas>
        </section>
        <!-- NAV -->
        <nav>
            <div id="menu-links">
                <div id="btn-home" class="page-link">home</div>
                <div id="btn-projects" class="page-link">proyectos</div>
                <div id="btn-contacto" class="page-link">contacto</div>
            </div>
            <div id="myBar"></div>
        </nav>
        <!-- PROYECTOS -->
        <section id="projects" class="inView">
            <div class="section-title">
                <p>PROYECTOS</p>
            </div>
            <div class="title-line"></div>
            <div id="portfolio">
                <div id="portfolio-buttons">
                    <div id="main-bar">
                        <div id="main-bar-all" class="controls active">Todo</div>
                        <div id="main-bar-freelance" class="controls">Programador</div>
                        <div id="main-bar-grado" class="controls">Grado</div>
                    </div>
                    <div id="floated-bar" class="float-bar">
                        <div id="floated-hidden-bar">
                            <div class="controls active">Todo</div>
                            <div class="controls">Programador</div>
                            <div class="controls">Grado</div>
                        </div>
                    </div>
                    <div id="fondo-bars"></div>
                </div>
                <div id="portfolio-content" class="container">
                    <figure id="fig1" class="freelance port-img">
                        <img src="img/screenshots/trntaryet.jpg"/>
                        <figcaption>
                            <h5>Trabajo para</h5>
                            <h4>Lizando</h4>
                            <h2>TRNTÁRYET</h2>
                            <h3>Javascript</h3>
                            <div class="fig-link">
                                <p>visitar web</p>
                                <i class="far fa-arrow-alt-circle-right" style="font-size: 25px"></i>
                            </div>
                        </figcaption>
                        <a href="https://trntaryet.com/" target="_blank"></a>
                    </figure>
                    <!--<figure id="fig2" class="freelance port-img">
                        <img src="img/screenshots/hogar-del-movil.jpg"/>
                        <figcaption>
                            <h5>Trabajo para</h5>
                            <h4>Lizando</h4>
                            <h2>Hogar del móvil</h2>
                            <h3>Wordpress</h3>
                            <h3>Woocommerce</h3>
                            <div class="fig-link">
                                <p>visitar web</p>
                                <i class="far fa-arrow-alt-circle-right" style="font-size: 25px"></i>
                            </div>
                        </figcaption>
                        <a href="https://hogardelmovil.com/" target="_blank"></a>
                    </figure>-->
                    <figure id="fig3" class="grado port-img">
                        <img src="img/screenshots/NYTAPI.jpg"/>
                        <figcaption>
                            <h4>Práctica de</h4>
                            <h4>Grado</h4>
                            <h2>New York Times API</h2>
                            <h3>api rest</h3>
                            <div class="fig-link">
                                <p>visitar web</p>
                                <i class="far fa-arrow-alt-circle-right" style="font-size: 25px"></i>
                            </div>
                        </figcaption>
                        <a href="https://www.davegalisot.com/NYTAPI/" target="_blank"></a>
                    </figure>
                </div>
            </div>
        </section>
        <!-- CONTACTO -->
        <section id="contacto" class="inView">
            <div class="section-title">
                <p>CONTACTO</p>
            </div>
            <div class="title-line"></div>
            <div class="pregunta">
                <p>¿Tienes alguna pregunta?</p>
            </div>
            <form id="contact-form">
                <input placeholder="Nombre" type="text" name="name" required="">
                <input placeholder="Email" type="Email" name="email" required="">
                <textarea placeholder="Tu mensaje" type="text" name="message"></textarea>
                <input id="submit-btn" type="submit" value="ENVIAR">
            </form>
        </section>
        <!-- go to top button -->
        <div id="btn-go-to-top">
            <img src="img/buttons/flecha-arriba.jpg"/>
        </div>
        <footer>
            <div class="rrss">
                <a href="pdf/CurriculumVitae.pdf" target="_blank">
                    <img id="rrss-mi-cv" src="img/buttons/mi-cv.png"/>
                </a>
                <a href="https://www.linkedin.com/in/david-galiana-sotillo/" target="_blank">
                    <img id="rrss-linked-in" src="img/buttons/linked-in-logo.png"/>
                </a>
                <a href="https://twitter.com/DaVeGaLiSoT" target="_blank">
                    <img id="rrss-twitter" src="img/buttons/twitter-logo.png"/>
                </a>
                <a href="https://www.instagram.com/davegalisot/" target="_blank">
                    <img id="rrss-instagram" src="img/buttons/instagram-logo.png"/>
                </a>
            </div>
            <div class="firma">
                <p>DAVEGALISOT <span class="c-salmon">&copy;2021</span></p>
            </div>
        </footer>
    </body>
</html>