$(document).ready(function(){

    //console.log(document.location.href);
    
    //variable home para location
    var home = "https://davegalisot.com/trntaryet/public/";

    function setTheme(themeName) {
        localStorage.setItem('theme', themeName);
        document.documentElement.className = themeName;
    }

    // function to toggle between light and dark theme
    $("#slider").click(function () {
        if (localStorage.getItem('theme') === 'theme-dark') {
            setTheme('theme-light');
        } else {
            setTheme('theme-dark');
        }
    });

    // Immediately invoked function to set the theme on initial load
    (function () {
        if (localStorage.getItem('theme') === 'theme-dark') {
            setTheme('theme-dark');
            document.getElementById('slider').checked = false;
        } else {
            setTheme('theme-light');
            document.getElementById('slider').checked = true;
        }
    })();

    /* al cargar o refrescar la página se va arriba */
    $(window).on(function() {
        $('html,body').animate({scrollTop: 0}, "slow");
    });

    // When the user clicks on the button, scroll to the top of the document
    $("#btn-go-to-top").click(function() {
        $('html,body').animate({scrollTop: 0}, "slow");
    });

    /************************************************************************************************/
    /**************************** Al hacer Scroll se activa la función ******************************/
    /************************************************************************************************/
    window.onscroll = function(){

        //botón subir al principio de la página
        // When the user scrolls down 20px from the top of the document, show the button
        if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
            $("#btn-go-to-top").css({"opacity": 1, "right": "30px"});
            $("header, header .nav-item, .progress-bar").css("height", "50px");
            $("#navbar-movil").css("top", "50px");
            $("header img").css("width", "80px");
            $("#logo").css("padding", "5px 0 0 0");
            $("header nav li p, .dropbtn").css({"top": "28%", "font-size": "14px"});
            $(".dropdown").css("width", "165px");
            $(".dropdown-content").css({"width": "165px", "top": "50px"});
            $(".dropdown-content a").css({"font-size": "12px", "height": "42px"});
            $(".dropbtn").css("width", "120px");
            $(".dropdown p").css("top", "28%");
            $(".chevron").css({"bottom": "28px", "left": "60px"});
            $(".switch").css("top", 2);

            $(".dropdown").hover(
                function () {
                    $(".dropdown-content").css("height", "210px");
                },
                function () {
                    $(".dropdown-content").css("height", 0);
                }
            );

        } else {
            if (window.matchMedia("(max-width: 1199.98px)").matches) {
                $("header nav li p, .dropbtn").css("font-size","15px");
            }else{
                $("header nav li p, .dropbtn").css("font-size","18px");
            }
            $("#btn-go-to-top").css({"opacity": 0, "right": "-80px"});
            $("header, header .nav-item, .progress-bar").css("height", "100px");
            $("#navbar-movil").css("top", "100px");
            $("header img").css("width", "160px");
            $("#logo").css("padding", "10px 0 0 0");
            $("header nav li p, .dropbtn").css("top","38%");
            $(".dropdown").css("width", "205.67px");
            $(".dropdown-content").css({"width": "205.67px", "top": "100px"});
            $(".dropdown-content a").css({"font-size": "16px", "height": "48px"});
            $(".dropbtn").css("width", "155.67px");
            $(".dropdown p").css("top", "38%");
            $(".chevron").css({"bottom":"5px", "left": "75px"});
            $(".switch").css("top", 5);

            $(".dropdown").hover(
                function () {
                    $(".dropdown-content").css("height", "240px");
                },
                function () {
                    $(".dropdown-content").css("height", 0);
                }
            );
        }

        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";

    };

    /**************************************************************************************************************/
    /**************************** cambia el "chevron" al hacer hover sobre "INICIOS" ******************************/
    /**************************************************************************************************************/
    $(".dropdown").hover(
        function () {
            $("#chevron").removeClass("fa-chevron-up");
            $("#chevron").addClass("fa-chevron-down");
        },
        function () {
            $("#chevron").removeClass("fa-chevron-down");
            $("#chevron").addClass("fa-chevron-up");
        });

    /****************************************************************************************************/
    /**************************** Subraya el menu en la pagina que estemos ******************************/
    /****************************************************************************************************/
    if (document.location.href == home){
        $("#navbar a:first-child p").addClass("border-bottom-white");
    }else if(document.location.pathname.includes("quienes_somos")){
        $("#navbar a:nth-child(2) p").addClass("border-bottom-white");
    }else if(document.location.pathname.includes("contacto")) {
        $("#navbar a:nth-child(4) p").addClass("border-bottom-white");
    }else if(document.location.pathname.includes("portfolio")) {
        $("#navbar a:last-child p").addClass("border-bottom-white");
    }
    //subraya QUE HACEMOS
    else if(document.location.pathname.includes("movilidad")) {
        $(".dropbtn").addClass("border-bottom-white");
    }else if(document.location.pathname.includes("logistica")) {
        $(".dropbtn").addClass("border-bottom-white");
    }else if(document.location.pathname.includes("infraestructura")) {
        $(".dropbtn").addClass("border-bottom-white");
    }else if(document.location.pathname.includes("analisis")) {
        $(".dropbtn").addClass("border-bottom-white");
    }else if(document.location.pathname.includes("consultoria")) {
        $(".dropbtn").addClass("border-bottom-white");
    }

    if (document.location.pathname.includes("quienes_somos")){
        odometer.innerHTML = 4200;
        odometer2.innerHTML = 49;
        odometer3.innerHTML = 237000000;
    }

    /*****************************************************************************/
    /**************************** ODOMETER EN INDEX ******************************/
    /*****************************************************************************/
    if (document.location.href == home){
        $(window).scroll(function() {
            //check if your div is visible to user
            // CODE ONLY CHECKS VISIBILITY FROM TOP OF THE PAGE
            // ODOMETER
            if ($(window).scrollTop() + $(window).height() >= $(".contadores").offset().top) {
                if(!$(".contadores").attr('loaded')) {
                    odometer.innerHTML = 4200;
                    odometer2.innerHTML = 49;
                    odometer3.innerHTML = 237000000;
                    $(".contadores").attr('loaded', true);
                }
            }

            //SLICK SLIDE
            if ($(window).scrollTop() + $(window).height() >= $(".fondo-slider").offset().top) {
                if(!$(".fondo-slider").attr('loaded')) {
                    $(".customer-logos").addClass("animated slideInRight");
                    $(".fondo-slider").attr('loaded', true);
                }
            }

        });
    }

    /* SEDES EN EL MAPA DE CONTACTO */
    if (document.location.pathname.includes("contacto")){

        //crea un div con la clase sedes y lo ahiere al div principal
        $("<div>", {"class": "sedes"}).appendTo($(".div_sedes"));

        /*** SEDE MEXICO ***/
        $("<div>", {"id": "div_mexico", "class": "pulse"}).appendTo($(".sedes"));
        $("<div>", {"class": "circulo animacion_corta"}).appendTo($("#div_mexico"));
        $("<div>", {"id": "v_mexico", "class": "vertical"}).appendTo($("#div_mexico"));
        $("<div>", {"id": "h_mexico", "class": "horizontal"}).appendTo($("#v_mexico"));
        $("<div>", {"id": "s_mexico", "class": "sede disabled"}).appendTo($("#h_mexico"));
        $("<img>").attr("src","../img/sedes/trntaryet_mexico.png").appendTo($("#s_mexico"));
        $("<div>", {"id": "d_mexico", "class": "detalle disabled"}).appendTo($("#h_mexico"));
        $("<p>").text("C/Guanajuato, 100 2º Piso").appendTo($("#d_mexico"));
        $("<p>").text("Colonia Roma Norte, Cuauhtemoc").appendTo($("#d_mexico"));
        $("<p>").text("06700 México D.F.").appendTo($("#d_mexico"));

        /*** SEDE COLOMBIA ***/
        $("<div>", {"id": "div_colombia", "class": "pulse"}).appendTo($(".sedes"));
        $("<div>", {"class": "circulo animacion_corta"}).appendTo($("#div_colombia"));
        $("<div>", {"id": "v_colombia", "class": "vertical"}).appendTo($("#div_colombia"));
        $("<div>", {"id": "h_colombia", "class": "horizontal"}).appendTo($("#v_colombia"));
        $("<div>", {"id": "s_colombia", "class": "sede disabled"}).appendTo($("#h_colombia"));
        $("<img>").attr("src","../img/sedes/trntaryet_bogota.png").appendTo($("#s_colombia"));
        $("<div>", {"id": "d_colombia", "class": "detalle disabled"}).appendTo($("#h_colombia"));
        $("<p>").text("Cra. 13 A Nº 86 A – 40 Of. 402").appendTo($("#d_colombia"));
        $("<p>").text("Bogotá – Colombia").appendTo($("#d_colombia"));
        $("<p>").text("Tel: +571 6180519").appendTo($("#d_colombia"));

        /*** SEDE PERÚ ***/
        $("<div>", {"id": "div_peru", "class": "pulse"}).appendTo($(".sedes"));
        $("<div>", {"class": "circulo animacion_corta"}).appendTo($("#div_peru"));
        $("<div>", {"id": "v_peru", "class": "vertical"}).appendTo($("#div_peru"));
        $("<div>", {"id": "h_peru", "class": "horizontal"}).appendTo($("#v_peru"));
        $("<div>", {"id": "s_peru", "class": "sede disabled"}).appendTo($("#h_peru"));
        $("<img>").attr("src","../img/sedes/trntaryet_lima.png").appendTo($("#s_peru"));
        $("<div>", {"id": "d_peru", "class": "detalle disabled"}).appendTo($("#h_peru"));
        $("<p>").text(" Av. Andrés Reyes 437, of. 1302").appendTo($("#d_peru"));
        $("<p>").text("San Isidro – Lima").appendTo($("#d_peru"));
        $("<p>").text("Tel. +511 717 29 77").appendTo($("#d_peru"));

        /*** SEDE BARCELONA ***/
        $("<div>", {"id": "div_barcelona", "class": "pulse"}).appendTo($(".sedes"));
        $("<div>", {"class": "circulo animacion_corta"}).appendTo($("#div_barcelona"));
        $("<div>", {"id": "v_barcelona", "class": "vertical"}).appendTo($("#div_barcelona"));
        $("<div>", {"id": "h_barcelona", "class": "horizontal"}).appendTo($("#v_barcelona"));
        $("<div>", {"id": "s_barcelona", "class": "sede disabled"}).appendTo($("#h_barcelona"));
        $("<img>").attr("src","../img/sedes/trntaryet_barcelona.png").appendTo($("#s_barcelona"));
        $("<div>", {"id": "d_barcelona", "class": "detalle disabled"}).appendTo($("#h_barcelona"));
        $("<p>").text("C/ Consell de Cent, 308, 4º 1º").appendTo($("#d_barcelona"));
        $("<p>").text("08007 Barcelona (España)").appendTo($("#d_barcelona"));
        $("<p>").text("Tel. +34 607 074 890").appendTo($("#d_barcelona"));

        /*** SEDE MADRID ***/
        $("<div>", {"id": "div_madrid", "class": "pulse"}).appendTo($(".sedes"));
        $("<div>", {"class": "circulo animacion_corta"}).appendTo($("#div_madrid"));
        $("<div>", {"id": "v_madrid", "class": "vertical"}).appendTo($("#div_madrid"));
        $("<div>", {"id": "h_madrid", "class": "horizontal"}).appendTo($("#v_madrid"));
        $("<div>", {"id": "s_madrid", "class": "sede disabled"}).appendTo($("#h_madrid"));
        $("<img>").attr("src","../img/sedes/trntaryet_madrid.png").appendTo($("#s_madrid"));
        $("<div>", {"id": "d_madrid", "class": "detalle disabled"}).appendTo($("#h_madrid"));
        $("<p>").text("C/ Vizconde de Matamala, nº1, 2ªPl").appendTo($("#d_madrid"));
        $("<p>").text("28028 Madrid (España)").appendTo($("#d_madrid"));
        $("<p>").text("Tel. +34 91 409 60 75").appendTo($("#d_madrid"));
        $("<p>").text("Fax. +34 91 557 04 11").appendTo($("#d_madrid"));

        /*** SEDE MARRUECOS ***/
        $("<div>", {"id": "div_marruecos", "class": "pulse"}).appendTo($(".sedes"));
        $("<div>", {"class": "circulo animacion_corta"}).appendTo($("#div_marruecos"));
        $("<div>", {"id": "v_marruecos", "class": "vertical"}).appendTo($("#div_marruecos"));
        $("<div>", {"id": "h_marruecos", "class": "horizontal"}).appendTo($("#v_marruecos"));
        $("<div>", {"id": "s_marruecos", "class": "sede disabled"}).appendTo($("#h_marruecos"));
        $("<img>").attr("src","../img/sedes/trntaryet_maroc.png").appendTo($("#s_marruecos"));
        $("<div>", {"id": "d_marruecos", "class": "detalle disabled"}).appendTo($("#h_marruecos"));
        $("<p>").text("21, Avenue Bin Ouidan- Appt nº 6. Agdadl").appendTo($("#d_marruecos"));
        $("<p>").text("0 RABAT (Maroc)").appendTo($("#d_marruecos"));

        $(".circulo").hover(
            function () {
                $(this).addClass("animacion_larga");
                $(this).removeClass("animacion_corta");
            },
            function () {
                $(this).removeClass("animacion_larga");
                $(this).addClass("animacion_corta");
            }
        );
    }

    /* HOME */
    if (document.location.href == home){
        /* SLICK SLIDER */
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });

        // /* CAROUSEL */
        $('.carousel').carousel({
            interval: 6000
        });

        /*********************************************************************************************************/
        /**************************** AL HACER HOVER EN LAS IMÁGENES DE ACTIVIDADES ******************************/
        /*********************************************************************************************************/
        $(".actividad").hover(
            function () {
                $(this).css({"background":"var(--corporate-red)"});
            },
            function () {
                $(this).css({"background":"white"});
            });

        /*********************************************************************************************************/
        /**************************** AL HACER CLICK EN LAS IMÁGENES DE ACTIVIDADES ******************************/
        /*********************************************************************************************************/
        $(".actividad").click(function () {
            /* selecciona la clase de la imagen */
            var clase = $(this).attr("class");

            //al hacer click en la imagen de nuestras actividades, desplaza el scroll al texto
            setTimeout(function () {
                $("html, body").animate({
                    scrollTop: $("#texto-actividades").offset().top - 48
                }, 500);
            }, 500);

            //cambia el borde a la imagen pulsada
            $(".actividad").css({"border":"4px solid var(--main-bgcolor)"});

            /* switch para mostrar cada texto al hacer click en la imagen superior */
            switch(clase) {
                case "actividad a-movilidad":
                    //altura del texto en línea azul debajo de las imágenes de actividades
                    setTimeout(function () {
                        $("#texto-actividades").css("height", 40);

                        if (window.matchMedia("(max-width: 575.98px)").matches) {
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 767.98px)").matches){
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 1200px)").matches){
                            $("#parrafo-actividades").css("height", 650);
                        }else{
                            $("#parrafo-actividades").css("height", 550);
                        }
                    }, 500);

                    //quita las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").removeClass("animated bounceInLeft fast");
                    $("#parrafo-actividades .col-xl-8").removeClass("animated bounceInRight fast");

                    //añade las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").addClass("animated bounceOutLeft fast");
                    $("#parrafo-actividades .col-xl-8").addClass("animated bounceOutRight fast");

                    setTimeout(function () {
                        //opacity 0 a los elementos
                        $("#texto-actividades *").css("opacity", 0);
                        $("#parrafo-actividades *").css("opacity", 0);

                        $("#texto-actividades *").remove();
                        $("#parrafo-actividades *").remove();

                        setTimeout(function () {
                            //texto principal (en div azul)
                            $("<h4>").text(
                                "movilidad"
                            ).appendTo("#texto-actividades");

                            //párrafo principal para usar el sistema de GRID de bootstrap
                            $("<div>", {
                                "id": "parrafo-actividades-row",
                                "class": "row"
                            }).appendTo("#parrafo-actividades");

                            //párrafo con ancho columna 4 donde va la imagen
                            $("<div>", {
                                "class": "centra-img col-xl-4 col-lg-4 col-md-4 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<img>", {
                                "class": "img-actividades",
                                "src": "../img/cellular.png"
                            }).appendTo("#parrafo-actividades .col-xl-4");

                            //párrafo con ancho columna 8 donde va el texto
                            $("<div>", {
                                "class": "col-xl-8 col-lg-8 col-md-8 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<h1>", {
                                "class": "titulo-h1"
                            }).html(
                                "departamento de movilidad"
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<div>", {
                                "class": "separa_h1p"
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>", {
                                "class": "primer-p"
                            }).text(
                                "El departamento de movilidad de TRN TÁRYET está especializado en la prestación de servicios " +
                                "de consultoría integral de transporte y en la búsqueda de modelos de desarrollo sostenible."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>").text(
                                "Nuestros más de 25 años de experiencia nos avalan como una de las experiencias más sólidas y " +
                                "destacadas tanto en España como a nivel internacional, ámbito en " +
                                "el que la empresa viene desarrollando desde prácticamente sus inicios una gran parte de su actividad."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>").text(
                                "Las especialidades desarrolladas por este departamento abarcan todas las etapas, modalidades y " +
                                "aspectos que comprenden la planificación y el estudio de la movilidad y los " +
                                "sistemas ...:"
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            //div botones
                            $("<div>", {
                                "id": "div-botones-actividades",
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            //boton leer más
                            $("<a>", {
                                "href": "http://www.trntaryet.com/index.php/movilidad"
                            }).html("leer más").appendTo("#div-botones-actividades");

                            //botón subir a imágenes
                            //<i class="fas fa-arrow-up"></i>
                            $("<a>", {
                                "id": "sube-imagenes",
                            }).html("volver").appendTo("#div-botones-actividades").click(function () {
                                $("html, body").animate({
                                    scrollTop: $("#nuestras-actividades").offset().top - 48
                                }, 500);
                            });

                            /* temporizador con efecto de fade-in */
                            setTimeout(function () {
                                //añade la clase de animate.css para el efecto de entrada
                                $("#parrafo-actividades .col-xl-4").addClass("animated bounceInLeft fast");
                                $("#parrafo-actividades .col-xl-8").addClass("animated bounceInRight fast");

                                $("#texto-actividades *").css("opacity", 1);
                                $("#parrafo-actividades *").css("opacity", 1);

                                $("figure.a-movilidad").css({"border":"4px solid var(--corporate-" + "blue" + ")"});

                            }, 200);
                        }, 200);

                    }, 300);

                    break;

                case "actividad a-logistica":
                    //altura del texto en línea azul debajo de las imágenes de actividades
                    setTimeout(function () {
                        $("#texto-actividades").css("height", 40);

                        if (window.matchMedia("(max-width: 575.98px)").matches) {
                            $("#parrafo-actividades").css("height", 700);
                        }else if (window.matchMedia("(max-width: 767.98px)").matches){
                            $("#parrafo-actividades").css("height", 750);
                        }else if (window.matchMedia("(max-width: 1199.98px)").matches){
                            $("#parrafo-actividades").css("height", 500);
                        }else{
                            $("#parrafo-actividades").css("height", 400);
                        }

                    }, 500);

                    //quita las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").removeClass("animated bounceInLeft fast");
                    $("#parrafo-actividades .col-xl-8").removeClass("animated bounceInRight fast");

                    //añade las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").addClass("animated bounceOutLeft fast");
                    $("#parrafo-actividades .col-xl-8").addClass("animated bounceOutRight fast");

                    setTimeout(function () {
                        //opacity 0 a los elementos
                        $("#texto-actividades *").css("opacity", 0);
                        $("#parrafo-actividades *").css("opacity", 0);

                        $("#texto-actividades *").remove();
                        $("#parrafo-actividades *").remove();

                        setTimeout(function () {
                            //texto principal (en div azul)
                            $("<h4>").text(
                                "logística y transporte de mercancías"
                            ).appendTo("#texto-actividades");

                            //párrafo principal para usar el sistema de GRID de bootstrap
                            $("<div>", {
                                "id": "parrafo-actividades-row",
                                "class": "row"
                            }).appendTo("#parrafo-actividades");

                            //párrafo con ancho columna 4 donde va la imagen
                            $("<div>", {
                                "class": "centra-img col-xl-4 col-lg-4 col-md-4 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<img>", {
                                "class": "img-actividades",
                                "src": "../img/furgoneta-trn.png"
                            }).appendTo("#parrafo-actividades .col-xl-4");

                            //párrafo con ancho columna 8 donde va el texto
                            $("<div>", {
                                "class": "col-xl-8 col-lg-8 col-md-8 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<h1>", {
                                "class": "titulo-h1"
                            }).text(
                                "departamento de logística y transporte de mercancías"
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<div>", {
                                "class": "separa_h1p"
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>", {
                                "class": "primer-p"
                            }).text(
                                "TRN TÁRYET cuenta con una amplia experiencia en el campo de la consultoría e ingeniería " +
                                "relacionada con las infraestructuras lineales y nodales al servicio de la logística y el " +
                                "transporte de mercancías."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>").text(
                                "La compañía ofrece en este campo un asesoramiento técnico especializado a los agentes del " +
                                "sector público y/o privado, apoyando la toma de decisiones y la búsqueda de soluciones " +
                                "sostenibles y adaptadas a las circunstancias específicas de cada caso..."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            //div botones
                            $("<div>", {
                                "id": "div-botones-actividades",
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            //boton leer más
                            $("<a>", {
                                "href": "http://www.trntaryet.com/index.php/logistica"
                            }).html("leer más").appendTo("#div-botones-actividades");

                            //botón subir a imágenes
                            //<i class="fas fa-arrow-up"></i>
                            $("<a>", {
                                "id": "sube-imagenes",
                            }).html("volver").appendTo("#div-botones-actividades").click(function () {
                                $("html, body").animate({
                                    scrollTop: $("#nuestras-actividades").offset().top - 48
                                }, 500);
                            });

                            /* temporizador con efecto de fade-in */
                            setTimeout(function () {
                                //añade la clase de animate.css para el efecto de entrada
                                $("#parrafo-actividades .col-xl-4").addClass("animated bounceInLeft fast");
                                $("#parrafo-actividades .col-xl-8").addClass("animated bounceInRight fast");

                                $("#texto-actividades *").css("opacity", 1);
                                $("#parrafo-actividades *").css("opacity", 1);

                                $("figure.a-logistica").css({"border":"4px solid var(--corporate-" + "blue" + ")"});

                            }, 200);
                        }, 200);
                    }, 300);
                    break;

                case "actividad a-infraestructura":
                    //altura del texto en línea azul debajo de las imágenes de actividades
                    setTimeout(function () {
                        $("#texto-actividades").css("height", 40);

                        if (window.matchMedia("(max-width: 575.98px)").matches) {
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 767.98px)").matches){
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 1200px)").matches){
                            $("#parrafo-actividades").css("height", 650);
                        }else{
                            $("#parrafo-actividades").css("height", 550);
                        }

                    }, 500);

                    //quita las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").removeClass("animated bounceInLeft fast");
                    $("#parrafo-actividades .col-xl-8").removeClass("animated bounceInRight fast");

                    //añade las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").addClass("animated bounceOutLeft fast");
                    $("#parrafo-actividades .col-xl-8").addClass("animated bounceOutRight fast");

                    //espera 400 segundos para quitar lo que hubiera mostrando y poner el de la imagen clickeada
                    setTimeout(function () {
                        $("#texto-actividades *").remove();
                        $("#parrafo-actividades *").remove();

                        setTimeout(function () {
                            //texto principal (en div azul)
                            $("<h4>").text(
                                "infraestructura del transporte"
                            ).appendTo("#texto-actividades");

                            //párrafo principal para usar el sistema de GRID de bootstrap
                            $("<div>", {
                                "id": "parrafo-actividades-row",
                                "class": "row"
                            }).appendTo("#parrafo-actividades");

                            //párrafo con ancho columna 4 donde va la imagen
                            $("<div>", {
                                "class": "centra-img col-xl-4 col-lg-4 col-md-4 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<img>", {
                                "class": "img-actividades",
                                "src": "../img/ecofriendly-bus.png"
                            }).appendTo("#parrafo-actividades .col-xl-4");

                            //párrafo con ancho columna 8 donde va el texto
                            $("<div>", {
                                "class": "col-xl-8 col-lg-8 col-md-8 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<h1>", {
                                "class": "titulo-h1"
                            }).text(
                                "departamento de infraestructura del transporte"
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<div>", {
                                "class": "separa_h1p"
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>", {
                                "class": "primer-p"
                            }).text(
                                "TRN TÁRYET cuenta con una dilatada experiencia en la planificación y definición de las " +
                                "infraestructuras asociadas al transporte, abarcando todos los modos y los diferentes " +
                                "ámbitos geográficos: urbano, regional, nacional e internacional."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>").text(
                                "Esta experiencia se ha desarrollado, además, en las diferentes etapas del ciclo de vida de " +
                                "un proyecto lo que confiere a TRN TÁRYET una visión global del problema permitiendo " +
                                "aportar las soluciones óptimas en cada caso basándose en la experiencia obtenida en las " +
                                "diferentes etapas de un proyecto..."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            //div botones
                            $("<div>", {
                                "id": "div-botones-actividades",
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            //boton leer más
                            $("<a>", {
                                "href": "http://www.trntaryet.com/index.php/infraestructura"
                            }).html("leer más").appendTo("#div-botones-actividades");

                            //botón subir a imágenes
                            //<i class="fas fa-arrow-up"></i>
                            $("<a>", {
                                "id": "sube-imagenes",
                            }).html("volver").appendTo("#div-botones-actividades").click(function () {
                                $("html, body").animate({
                                    scrollTop: $("#nuestras-actividades").offset().top - 48
                                }, 500);
                            });

                            /* temporizador con efecto de fade-in */
                            setTimeout(function () {
                                //añade la clase de animate.css para el efecto de entrada
                                $("#parrafo-actividades .col-xl-4").addClass("animated bounceInLeft fast");
                                $("#parrafo-actividades .col-xl-8").addClass("animated bounceInRight fast");

                                $("#texto-actividades *").css("opacity", 1);
                                $("#parrafo-actividades *").css("opacity", 1);

                                $("figure.a-infraestructura").css({"border":"4px solid var(--corporate-" + "blue" + ")"});

                            }, 200);
                        }, 200);
                    }, 300);
                    break;

                case "actividad a-analisis":
                    //altura del texto en línea azul debajo de las imágenes de actividades
                    setTimeout(function () {
                        $("#texto-actividades").css("height", 40);

                        if (window.matchMedia("(max-width: 575.98px)").matches) {
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 767.98px)").matches){
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 1200px)").matches){
                            $("#parrafo-actividades").css("height", 650);
                        }else{
                            $("#parrafo-actividades").css("height", 550);
                        }

                    }, 500);

                    //quita las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").removeClass("animated bounceInLeft fast");
                    $("#parrafo-actividades .col-xl-8").removeClass("animated bounceInRight fast");

                    //añade las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").addClass("animated bounceOutLeft fast");
                    $("#parrafo-actividades .col-xl-8").addClass("animated bounceOutRight fast");

                    //espera 400 segundos para quitar lo que hubiera mostrando y poner el de la imagen clickeada
                    setTimeout(function () {
                        $("#texto-actividades *").remove();
                        $("#parrafo-actividades *").remove();

                        setTimeout(function () {
                            //texto principal (en div azul)
                            $("<h4>").text(
                                "análisis economico-financiero"
                            ).appendTo("#texto-actividades");

                            //párrafo principal para usar el sistema de GRID de bootstrap
                            $("<div>", {
                                "id": "parrafo-actividades-row",
                                "class": "row"
                            }).appendTo("#parrafo-actividades");

                            //párrafo con ancho columna 4 donde va la imagen
                            $("<div>", {
                                "class": "centra-img col-xl-4 col-lg-4 col-md-4 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<img>", {
                                "class": "img-tablet",
                                "src": "../img/gif/tablet-trn.gif"
                            }).appendTo("#parrafo-actividades .col-xl-4");

                            //párrafo con ancho columna 8 donde va el texto
                            $("<div>", {
                                "class": "col-xl-8 col-lg-8 col-md-8 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<h1>", {
                                "class": "titulo-h1"
                            }).text(
                                "departamento de análisis economico-financiero"
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<div>", {
                                "class": "separa_h1p"
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>", {
                                "class": "primer-p"
                            }).text(
                                "TRN TÁRYET presenta una gran experiencia en la evaluación de políticas y proyectos de inversión " +
                                "en transporte, tanto desde un punto de vista económico social como financiero. Asimismo es " +
                                "especialista en la estructuración de proyectos de participación público-privada, como instrumento " +
                                "al servicio de la política de desarrollo del sistema de infraestructuras."
                            ).appendTo("#parrafo-actividades .col-xl-8");
                            $("<p>").html(
                                "Todo ello le permite seleccionar en cada caso la alternativa óptima para maximizar la " +
                                "eficiencia del sistema y encontrar soluciones de movilidad sostenible..."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            //div botones
                            $("<div>", {
                                "id": "div-botones-actividades",
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            //boton leer más
                            $("<a>", {
                                "href": "http://www.trntaryet.com/index.php/analisis"
                            }).html("leer más").appendTo("#div-botones-actividades");

                            //botón subir a imágenes
                            //<i class="fas fa-arrow-up"></i>
                            $("<a>", {
                                "id": "sube-imagenes",
                            }).html("volver").appendTo("#div-botones-actividades").click(function () {
                                $("html, body").animate({
                                    scrollTop: $("#nuestras-actividades").offset().top - 48
                                }, 500);
                            });

                            /* temporizador con efecto de fade-in */
                            setTimeout(function () {
                                //añade la clase de animate.css para el efecto de entrada
                                $("#parrafo-actividades .col-xl-4").addClass("animated bounceInLeft fast");
                                $("#parrafo-actividades .col-xl-8").addClass("animated bounceInRight fast");

                                $("#texto-actividades *").css("opacity", 1);
                                $("#parrafo-actividades *").css("opacity", 1);

                                $("figure.a-analisis").css({"border":"4px solid var(--corporate-" + "blue" + ")"});

                            }, 200);
                        }, 200);
                    }, 300);
                    break;

                case "actividad a-consultoria":
                    //altura del texto en línea azul debajo de las imágenes de actividades
                    setTimeout(function () {
                        $("#texto-actividades").css("height", 40);

                        if (window.matchMedia("(max-width: 575.98px)").matches) {
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 767.98px)").matches){
                            $("#parrafo-actividades").css("height", 1100);
                        }else if (window.matchMedia("(max-width: 1200px)").matches){
                            $("#parrafo-actividades").css("height", 650);
                        }else{
                            $("#parrafo-actividades").css("height", 550);
                        }

                    }, 500);

                    //quita las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").removeClass("animated bounceInLeft fast");
                    $("#parrafo-actividades .col-xl-8").removeClass("animated bounceInRight fast");

                    //añade las clases a los párrafos
                    $("#parrafo-actividades .col-xl-4").addClass("animated bounceOutLeft fast");
                    $("#parrafo-actividades .col-xl-8").addClass("animated bounceOutRight fast");

                    //espera 400 segundos para quitar lo que hubiera mostrando y poner el de la imagen clickeada
                    setTimeout(function () {
                        $("#texto-actividades *").remove();
                        $("#parrafo-actividades *").remove();

                        setTimeout(function () {
                            //texto principal (en div azul)
                            $("<h4>").text(
                                "consultoría de operación y mantenimiento"
                            ).appendTo("#texto-actividades");

                            //párrafo principal para usar el sistema de GRID de bootstrap
                            $("<div>", {
                                "id": "parrafo-actividades-row",
                                "class": "row"
                            }).appendTo("#parrafo-actividades");

                            //párrafo con ancho columna 4 donde va la imagen
                            $("<div>", {
                                "class": "centra-img col-xl-4 col-lg-4 col-md-4 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<img>", {
                                "class": "img-actividades",
                                "src": "../img/cuaderno-trn.png"
                            }).appendTo("#parrafo-actividades .col-xl-4");

                            //párrafo con ancho columna 8 donde va el texto
                            $("<div>", {
                                "class": "col-xl-8 col-lg-8 col-md-8 col-12"
                            }).appendTo("#parrafo-actividades-row");

                            $("<h1>", {
                                "class": "titulo-h1"
                            }).text(
                                "consultoría de operación y mantenimiento"
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            $("<div>", {
                                "class": "separa_h1p"
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            $("<p>", {
                                "class": "primer-p"
                            }).text(
                                "TRN TÁRYET es una empresa de consultoría e ingeniería con una especial sensibilidad por " +
                                "lautilidad de los proyectos de infraestructuras y por la forma como éstas constituyen el " +
                                "soporte de servicios de transporte, articulándose al mismo tiempo entre sí, formando las " +
                                "redes de transporte y los sistemas multimodales."
                            ).appendTo("#parrafo-actividades .col-xl-8");
                            $("<p>").text(
                                "Entendemos la operación y el mantenimiento en un sentido amplio, desde las fases iniciales " +
                                "de la planificación de la movilidad y los servicios que le dan soporte..."
                            ).appendTo("#parrafo-actividades .col-xl-8");

                            //div botones
                            $("<div>", {
                                "id": "div-botones-actividades",
                            }).appendTo("#parrafo-actividades .col-xl-8");

                            //boton leer más
                            $("<a>", {
                                "href": "http://www.trntaryet.com/index.php/consultoria"
                            }).html("leer más").appendTo("#div-botones-actividades");

                            //botón subir a imágenes
                            //<i class="fas fa-arrow-up"></i>
                            $("<a>", {
                                "id": "sube-imagenes",
                            }).html("volver").appendTo("#div-botones-actividades").click(function () {
                                $("html, body").animate({
                                    scrollTop: $("#nuestras-actividades").offset().top - 48
                                }, 500);
                            });

                            /* temporizador con efecto de fade-in */
                            setTimeout(function () {
                                //añade la clase de animate.css para el efecto de entrada
                                $("#parrafo-actividades .col-xl-4").addClass("animated bounceInLeft fast");
                                $("#parrafo-actividades .col-xl-8").addClass("animated bounceInRight fast");

                                $("#texto-actividades *").css("opacity", 1);
                                $("#parrafo-actividades *").css("opacity", 1);

                                $("figure.a-consultoria").css({"border":"4px solid var(--corporate-" + "blue" + ")"});

                            }, 200);
                        }, 200);
                    }, 300);

            }

            // $("#sube-imagenes").click(function () {
            //     $("html, body").animate({
            //         scrollTop: $("#nuestras-actividades").offset().top - 48
            //     }, 500);
            // });
        });

    }
    /***************************************** ANIMACIONES **************************************************/
    /********************* SOLO CUANDO EL ELEMENTO QUE QUEREMOS ESTÁ A LA VISTA *****************************/
    //QUIENES SOMOS
    if (document.location.pathname.includes("quienes_somos")){
        $(window).scroll(function() {
            //check if your div is visible to user
            // CODE ONLY CHECKS VISIBILITY FROM TOP OF THE PAGE
            // FORMULARIO
            if ($(window).scrollTop() + $(window).height() >= $(".fundaciones").offset().top) {
                if(!$(".fundaciones").attr('loaded')) {
                    $(".fundaciones img").addClass("animated fadeInLeft fast");
                    $(".fundaciones").attr('loaded', true);
                }
            }

        });
    }

    //Animaciones en Contacto
    if (document.location.pathname.includes("contacto")){
        $(window).scroll(function() {
            //check if your div is visible to user
            // CODE ONLY CHECKS VISIBILITY FROM TOP OF THE PAGE
            // FORMULARIO
            if ($(window).scrollTop() + $(window).height() >= $(".foto-debajo-mapa").offset().top) {
                if(!$(".foto-debajo-mapa").attr('loaded')) {
                    $(".formulario-contacto").addClass("animated bounceInRight");
                    $(".foto-debajo-mapa").attr('loaded', true);
                }
            }

        });
    }


    /***************************************** PLACEHOLDER **************************************************/
    // if (document.location.pathname.includes("analisis") ||
    //     document.location.pathname.includes("consultoria") ||
    //     document.location.pathname.includes("quienes_somos")) {
    //     var long_palabra = $(".cambia-color-h1").text().length;
    //
    //     var placeholder = $(".cambia-color-h1"),
    //         placeholderSpans = placeholder.text()
    //             .split("")
    //             .map(function (char) {
    //                 return $('<span>' + char + '</span>');
    //             });
    //
    //     placeholder.html(placeholderSpans);
    //
    //     setInterval(function () {
    //
    //         var largo_palabra = Math.floor(Math.random() * long_palabra);
    //
    //         var numRandom = Math.floor(Math.random() * 7);
    //
    //         switch (numRandom) {
    //             case 0:
    //                 placeholderSpans[largo_palabra].css("color", "var(--corporate-blue)");
    //                 break;
    //             case 1:
    //                 placeholderSpans[largo_palabra].css("color", "var(--corporate-blue)");
    //                 break;
    //             case 2:
    //                 placeholderSpans[largo_palabra].css("color", "white");
    //                 break;
    //             case 3:
    //                 placeholderSpans[largo_palabra].css("color", "var(--corporate-red)");
    //                 break;
    //             case 4:
    //                 placeholderSpans[largo_palabra].css("color", "white");
    //                 break;
    //             case 5:
    //                 placeholderSpans[largo_palabra].css("color", "white");
    //                 break;
    //             case 6:
    //                 placeholderSpans[largo_palabra].css("color", "white");
    //                 break;
    //         }
    //     }, 2000);
    // }

    /***************************************** PORTFOLIO **************************************************/
    //Array con los textos mostrados en el popup
    var textos = [
        "",
        //imagen 1
        "La Autoridad del Transporte Metropolitano ha adjudicado a TRN TÁRYET el contrato de consultoría: Asistencia " +
        "técnica para las tareas de soporte técnico al Servicio de Gestión del Transporte de la Autoridad del Transporte" +
        " Metropolitano de Barcelona”. El grupo de investigación Cenit colabora en este encargo en los aspectos relacionados " +
        "con el transporte de mercancías." +
        "<br><br>" +
        "El objeto del Contrato es dar soporte en el día a día del Servicio de Gestión del Transporte de la Autoridad del " +
        "Transporte Metropolitano de Barcelona. Entre las tareas a las que se da soporte se encuentran:" +
        "<br><br>" +
        "- Informes y estudios para la mejora de la red de transporte de viajeros (regular y discrecional) y de mercancías.\n" +
        "<br><br>"+
        "- Puesta en marcha del protocolo para la activación de los refuerzo del transporte público en caso de episodio" +
        " ambiental de alta contaminación: refuerzo de la oferta de transporte público, infraestructuras de apoyo a la " +
        "oferta y activación de la venta y uso del título T-aire.\n" +
        "<br><br>" +
        "- Asesoramientos especializados puntuales sobre aspectos concretos que surgen durante los trabajos. Ejemplos de " +
        "temas tratados: taxi, vtc, plataforma busup, cambio en los límites de velocidad del RGC, encuestas ISC, sensorización" +
        " de P&R, ordenanzas DUM, realización de pliegos, entre otros.\n" +
        "<br><br>" +
        "- Participación en proyectos y redes europeas, así como observatorios y varias comisiones nacionales e internacionales.\n" +
        "<br><br>" +
        "- Participación en la organización de jornadas a nivel técnico y administrativo, también como ponentes.\n" +
        "<br><br>" +
        "- Preparación de documentación y asistencia  a las comisiones de trabajo de Calidad del Transporte y de Nomenclatura.\n" +
        "<br><br>" +
        "<div class='div-img-pop-up'>" +
        "<img src='/img/fotos/portfolio/barna1y2.png'>" +
        "</div>",
        //imagen 2
        "TRN TÁRYET ha realizado para el Instituto Metropolitano PROTRANSPORTE de Lima el Estudio de Demanda de la Interconexión " +
        "del Proyecto Teleférico Independencia – San Juan De Lurigancho, COSAC I y Línea 1 del Metro de Lima" +
        "<br><br>" +
        "El Ministerio de Vivienda, Construcción y Saneamiento está desarrollando un proyecto de transporte por cable que " +
        "conecte los Distritos de Independencia y San Juan de Lurigancho, en la Provincia de Lima, con el objetivo mejorar " +
        "la conectividad y accesibilidad de la población asentada en las zonas altas de difícil acceso y establecer una " +
        "conexión directa entre los sistemas de transporte masivo de la ciudad, ayudando a solventar el importante obstáculo " +
        "que representa la cadena de Cerros Amancaes." +
        "<br><br>" +
        "Según el estudio de factibilidad, este proyecto tendrá aproximadamente 6 km de longitud y contará con 5 estaciones." +
        "<br><br>" +
        "El trabajo realizado por TRN TÁRYET ha tenido como objetivo fundamental estimar la demanda potencial del teleférico, " +
        "analizando tanto las áreas actualmente pobladas con pendientes de difícil acceso, como la interconexión con la línea " +
        "1 del Metro de Lima y el BRT COSAC I (Metropolitano). " +
        "<br><br>" +
        "Para ello, ha sido necesario establecer cuáles son las pautas de movilidad actual, tanto en el área de influencia" +
        "directa del proyecto como en el conjunto de la ciudad, y cómo se comportarían los potenciales usuarios ante los " +
        "diferentes escenarios posibles para el proyecto." +
        "<div class='div-img-pop-up'>" +
        "<img src='/img/fotos/portfolio/teleferico.png'>" +
        "</div>",
        //imagen 3
        "OHL Construcción ha contratado a TRN TÁRYET el Estudio de Tráfico para las concesiones de autopista de peaje Santo " +
        "Domingo de los Colorados - Buena Fe y Buena Fe - Babahoyo - Jujan (Ecuador)." +
        "<br><br>" +
        "Estas dos concesiones afectan al corredor Quito-Guayaquil, uno de los más importantes de Ecuador. El trabajo tiene como " +
        "objetivo principal establecer una previsión de los tráficos en los puestos de peaje de las dos concesiones, obteniendo " +
        "así una estimación de los ingresos durante un período de treinta años." +
        "<br><br>" +
        "Igualmente, se aportarán datos de tráfico para el dimensionamiento de firmes y enlaces en las dos concesiones." +
        "<br><br>" +
        "Para ello se ha calibrado un modelo de red (con el soporte lógico TransCAD), un modelo de peaje y un modelo de " +
        "crecimiento para proyectar la situación actual en el tiempo." +
        "<div class='div-img-pop-up'>" +
        "<img src='/img/fotos/portfolio/ecuador.png'>" +
        "</div>",
        //imagen 4
        "ADIF otorga a TRN-TÁRYET la redacción del estudio informativo y de los proyectos básicos y constructivos del " +
        "soterramiento de la línea R2 de Cercanías de Barcelona a su paso por el casco urbano de Montcada i Reixac (Barcelona)" +
        "<br><br>" +
        "El municipio de Montcada i Reixac es atravesado en la actualidad por 4 líneas ferroviarias siendo una de ella " +
        "la línea convencional Barcelona – Por Bou con una estación denominada Montcada i Reixac utilizada actualmente " +
        "por los servicios de la línea de Cercanías R2." +
        "<br><br>" +
        "Esta barrera, que en su momento contribuyó al desarrollo del municipio al posibilitar la comunicación con " +
        "Barcelona, se ha convertido con el tiempo en una barrera que divide en dos al núcleo de población." +
        "<br><br>" +
        "El presente trabajo se redacta con el objeto de suprimir esta barrera ferroviaria y de esta manera eliminar los " +
        "dos pasos a nivel existentes en el centro de la ciudad próximos a la estación de Montcada i Reixac citada con " +
        "anterioridad que revisten una alta peligrosidad para peatones y vehículos por el denso tráfico que lo atraviesa " +
        "diariamente." +
        "<br><br>" +
        "La actuación conlleva la ejecución de una nueva estación soterrada, la cual se situará en las proximidades de " +
        "la actual." +
        "<br><br>" +
        "Por otra parte, mediante la actuación desarrollada, se elimina el cizallamiento que se produce en la actualidad " +
        "entre la Línea R2 y los ramales de Bifurcación Aguas en la zona de conexión entre ambas líneas, proyectándose " +
        "un salto de carnero que permite el cruce del ramal de Bifurcación Aguas lado mar sobre la línea R2, justo después " +
        "de que esta se ha soterrado." +
        "<br><br>",
        //imagen 5
        "Metro de Málaga ha contratado a TRN TÁRYET la realización del Estudio de Demanda para la ampliación de su red." +
        "<br><br>" +
        "Metro de Málaga opera actualmente dos líneas, con una longitud total de 11,3 km y una demanda esperada para 2018 " +
        "en torno a 6,2 millones de pasajeros." +
        "<br><br>" +
        "A corto plazo está prevista la extensión de esta red hasta penetrar al centro urbano, con una longitud total de " +
        "14 km." +
        "<br><br>" +
        "Los estudios previos realizados hasta la fecha pronostican que la demanda del Metro aumentará con la extensión " +
        "de la red de forma considerable, hasta alcanzar los 15-20 millones de viajeros." +
        "<br><br>" +
        "El trabajo contratado a TRN TÁRYET tiene como objetivo fundamental calibrar un modelo completo de demanda para " +
        "el sistema de transporte urbano de Málaga, que permita estimar la demanda de la red de Metro ampliada, considerando " +
        "diferentes escenarios que tengan en cuenta las variables siguientes: itinerarios y paradas de la red de Metro, " +
        "estaciones de Metro en superficie o subterráneas (lo que afecta a los tiempos de acceso/dispersión), configuración " +
        "de la red de autobuses, frecuencias de servicio, velocidades comerciales y sistema tarifario." +
        "<br><br>" +
        "<div class='div-img-pop-up'>" +
        "<img src='/img/fotos/portfolio/metro_malaga.png'>" +
        "</div>",
        //imagen 6
        "El Ministerio de Fomento otorga a TRN-TÁRYET un proyecto de Estudio Informativo ferroviario en la ciudad de Avilés, " +
        "cuyos trabajos empezarán este mes de julio" +
        "<br><br>" +
        "El Estudio Informativo tiene como objeto dar respuesta a los problemas de falta de integración del ferrocarril " +
        "en Avilés, buscando alternativas compatibles con el planeamiento urbanístico previsto por ese Ayuntamiento. Se " +
        "trata asimismo de suprimir la barrera que representa el ferrocarril en cuanto a las relaciones de la ciudad con " +
        "la Ría y con los nuevos desarrollos." +
        "<br><br>" +
        "Asociados a este objetivo básico aparecen otras posibles mejoras en relación a la seguridad de la red ferroviaria, " +
        "tanto por la supresión de pasos a nivel existentes como por la optimización de las instalaciones de Renfe y FEVE, " +
        "no solo en cuanto a una reubicación más idónea sino también a la redefinición funcional de las mismas." +
        "<br><br>" +
        "Se prevén dos estaciones, al menos una de ellas subterránea." +
        "<br><br>" +
        "<div class='div-img-pop-up'>" +
        "<img src='/img/fotos/portfolio/elaviles.png'>" +
        "</div>",
        //imagen 7
        "TRN-TÁRYET elabora el Plan de Desarrollo Intermodal de la Autoridad Portuaria de Valencia" +
        "<br><br>" +
        "En el marco de las actuaciones desarrolladas por la Autoridad Portuaria de Valencia para impulsar el transporte " +
        "ferroviario de mercancías con los puertos de Gandía, Sagunto y Valencia, la empresa TRN-TÁRYET elaboró el “Plan " +
        "de desarrollo intermodal” de dicha Autoridad Portuaria. El objetivo de este Plan incluyó la potenciación de los " +
        "tráficos ferroportuarios existentes así como la ampliación del hinterland a través de las mejoras tanto de la " +
        "red ferroviaria interior de los puertos como de la RFIG, y en particular en la línea 610 que conecta el Puerto " +
        "de Sagunto con Zaragoza." +
        "<br><br>" +
        "Los trabajos desarrollados por TRN-TÁRYET incluyeron, entre otros, la estimación cualitativa del hinterland de " +
        "la APV, un análisis de los corredores ferroviarios que conectan con los puertos de la APV, la cuantificación y " +
        "prognosis de la demanda captable por el modo ferroviario de su hinterland actual y potencial, la determinación " +
        "de actuaciones orientadas a lograr el objetivo junto al estudio económico coste-beneficio de algunas de ellas. " +
        "Igualmente se realizó una propuesta de gobernanza basada en un benchmarking internacional." +
        "<br><br>" +
        "<div class='div-img-pop-up'>" +
        "<img src='/img/fotos/portfolio/valencia.png'>" +
        "</div>",
        //imagen 8
        "Actualmente TRN Taryet está trabajando en los siguiente proyectos:" +
        "<br><br>" +
        "1 -" +
        "<br><br>" +
        "2 -" +
        "<br><br>"/*,*/
        // //imagen 9
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 9",
        // //imagen 10
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 10",
        // //imagen 11
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 11",
        // //imagen 12
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 12 ",
        // //imagen 13
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 13",
        // //imagen 14
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 14",
        // //imagen 15
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 15",
        // //imagen 16
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 16 ",
        // //imagen 17
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 17",
        // //imagen 18
        // "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi culpa distinctio doloribus enim, eos eum ex " +
        // "fugit incidunt inventore minus non quasi totam voluptas? Aspernatur incidunt natus quam quibusdam voluptatum! 18",
    ];

    //pop-up
    $(".box img").click(function () {
        $(".pop-up").css({"visibility": "visible", "opacity": 1});
        $(".pop-up p").html(textos[$(this).attr("id")]);

        var id = $(this).attr("id");

        if (id == 1 || id == 2 || id == 3 || id == 5 || id == 6 || id == 7){
            $(".pop-up").css("height", "70%");
        }else{
            $(".pop-up").css("height", "auto");
        }

        $(".box").css("pointer-events", "none");
    });

    //botón cerrar en pop-up
    $(".cerrar-texto").click(function () {
        $(".pop-up").css({"visibility": "hidden", "opacity": 0});
        $(".box").css("pointer-events", "auto");
    });
});