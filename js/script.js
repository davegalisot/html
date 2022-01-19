/**********************************************************************************************************************
 JAVASCRIPT (MAIN)                                                                          Autor: David Galiana Sotillo
 ***********************************************************************************************************************/
$(document).ready(function () {

    setTimeout(function (){
        $("#title div").css("opacity", 1);
        $("#title div").addClass("animate__bounceIn");
    }, 800);

    setTimeout(function (){
        $("#projector").css("opacity", "40%");
    }, 700);

    //variable para evitar hover on scroll
    var lockTimer;

    //primera llamada al cargar la web
    main_btn_anim();
    $("#div-btn-trabajo img").css("opacity", 1);

    //animación boton y flecha main-btn "mis proyectos"
    function main_btn_anim(){
        setTimeout(function (){
            // $("#btn-trabajo").removeClass("animate__bounce");
            $("#div-btn-trabajo img").removeClass("animate__bounceInUp").addClass("animate__fadeOutDown");
        }, 1500);
        setTimeout(function (){
            // $("#btn-trabajo").addClass("animate__bounce");
        }, 350);
        $("#div-btn-trabajo img").addClass("animate__bounceInUp").removeClass("animate__fadeOutDown");
    }

    setInterval(main_btn_anim, 5000);

    /*** COMPORTAMIENTO BOTONES MENU ***/
    $("#btn-trabajo").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#projects").offset().top
        }, 400);
    });
    $("#btn-home").click(function() {
        $('html,body').animate({scrollTop: 0}, "slow", "swing");
    });
    $("#btn-projects").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: ($("#projects").offset().top)
        }, 400);
    });
    $("#btn-contacto").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: ($("#contacto").offset().top)
        }, 400);
    });    

    // ON SCROLL
    $(window).on("resize scroll", function() {

        // Prevent Hover on Scroll
        clearTimeout(lockTimer);
        if (!$("body").hasClass("disable-hover")) {
            $("body").addClass("disable-hover");
        }

        lockTimer = setTimeout(function() {
            $("body").removeClass("disable-hover");
        }, 500);

        //botón subir al principio de la página
        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            $("#btn-go-to-top").css({"right": "60px"});
        } else {
            $("#btn-go-to-top").css({"right": "-80px"});
        }

        //nav buttons color
        var scrollPos = $(document).scrollTop();
        $(".inView").each(function() {
            var activeItem = $(this).attr("id");
            if ($(this).position().top <= scrollPos && $(this).position().top + $(this).height() > scrollPos) {
                $('#btn-' + activeItem).css("color", "#E67373");
            } else {
                $('#btn-' + activeItem).css("color", "white");
            }
        });

        //si PROYECTOS se ve
        if ($(window).scrollTop() + $(window).height() >= $("#projects").offset().top + 300) {
            if(!$("#projects .section-title").attr('loaded')) {
                $("#projects .section-title").css("opacity", 1);
                $("#projects .section-title").addClass("animate__animated animate__fadeInRight");
                $("#projects .section-title").attr('loaded', true);
            }
            if(!$("#projects .title-line").attr('loaded')) {
                $("#projects .title-line").css("opacity", 1);
                $("#projects .title-line").addClass("animate__animated animate__fadeInLeft");
                $("#projects .title-line").attr('loaded', true);

            }
            if(!$("#portfolio").attr('loaded')) {
                $("#portfolio").css("opacity", 1);
                $("#portfolio").attr('loaded', true);

            }
            if(!$("#portfolio-buttons").attr('loaded')) {
                $("#portfolio-buttons").css("opacity", 1);
                $("#portfolio-buttons").addClass("animate__animated animate__zoomIn");
                $("#portfolio-buttons").attr('loaded', true);

            }
            if(!$("#portfolio figure").attr('loaded')) {
                $("#portfolio figure").css({"opacity": 1, "width": 400});
                $("#portfolio figure").addClass("animate__animated animate__zoomIn");
                $("#portfolio figure").attr('loaded', true);
            }
            setTimeout(function (){
                $("#portfolio figure").removeClass("animate__zoomIn");
            }, 1000);
        }

        //si CONTACTO se ve
        if ($(window).scrollTop() + $(window).height() >= $("#contacto").offset().top + 300) {
            if(!$("#contacto .section-title").attr('loaded')) {
                $("#contacto .section-title").css("opacity", 1);
                $("#contacto .section-title").addClass("animate__animated animate__fadeInRight");
                $("#contacto .section-title").attr('loaded', true);
            }
            if(!$("#contacto .title-line").attr('loaded')) {
                $("#contacto .title-line").css("opacity", 1);
                $("#contacto .title-line").addClass("animate__animated animate__fadeInLeft");
                $("#contacto .title-line").attr('loaded', true);
            }
            if(!$("#contacto .pregunta").attr('loaded')) {
                $("#contacto .pregunta").css("opacity", 1);
                $("#contacto .pregunta").addClass("animate__animated animate__bounceInUp");
                $("#contacto .pregunta").attr('loaded', true);
            }
            if(!$("#contacto form").attr('loaded')) {
                $("#contacto form").css("opacity", 1);
                $("#contacto form").addClass("animate__animated animate__zoomIn");
                $("#contacto form").attr('loaded', true);
            }
        }

        //si el FOOTER se ve
        if ($(window).scrollTop() + $(window).height() >= $("footer").offset().top + 150) {
            if(!$(".rrss").attr('loaded')) {
                $(".rrss").css("opacity", 1);
                $(".rrss").addClass("animate__animated animate__slideInUp");
                $(".rrss").attr('loaded', true);
            }
        }

        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";

    });

    // When the user clicks on the button, scroll to the top of the document
    $("#btn-go-to-top").click(function() {
        $('html,body').animate({scrollTop: 0}, "slow");
    });

    /** PORTFOLIO **/
    //animación informacion tarjeta
    $(".port-img").hover(
        function (){
            $(this).find("h2, h4, h5").addClass("animate__animated animate__fadeInDown");
            $(this).find("h3").addClass("animate__animated animate__fadeInUp");
            $(this).find("p").addClass("animate__animated animate__fadeInLeft");
            $(this).find("i").addClass("animate__animated animate__fadeInRight");
        },
        function (){
            $(this).find("h2, h4, h5").removeClass("animate__animated animate__fadeInDown");
            $(this).find("h3").removeClass("animate__animated animate__fadeInUp");
            $(this).find("p").removeClass("animate__animated animate__fadeInLeft");
            $(this).find("i").removeClass("animate__animated animate__fadeInRight");
        }
    );

    /** CONTACT FORM **/
    $("#contact-form").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'https://formspree.io/f/moqpvrjq',
            method: 'POST',
            data: { message: $('form').serialize() },
            dataType: 'json'
        }).done(function(response) {
            $("#submit-btn").click(false);
            $("#submit-btn").val("Tu mensaje se ha envíado correctamente. Gracias!");
            $("#submit-btn").css({
                "width": "100%",
                "background-color": "var(--color-verde)"
            });
            setTimeout(function (){
                $("#submit-btn").css({
                    "width": "100px",
                    "background-color": "var(--color-salmon)"
                });
                $("#submit-btn").val("ENVIAR");
                $("#submit-btn").click(true);
            }, 2500);
            $('#contact-form')
                .find('input[type=text], input[type=email], textarea')
                .val('');
        });
    });

    /** BARRA ALL/FREELANCE/GRADO **/
    $(function() {
        $(".controls").click( function() {
            $(this).addClass('active').siblings().removeClass('active');
        });
    });

    //invoca función posicionamiento al clickear
    $(".controls").click(function() {
        posFilterBar(this);
    });

    //ajusta tamaño fondo salmón de proyetos
    posFilterBar($(".controls").first());

    //posiciona fondo salmón de proyectos
    function posFilterBar(elem) {
        var origin = $(elem)
            .parent()
            .offset().left;
        var pos = $(elem).offset().left;
        $("#floated-bar").css({
            left: pos - origin,
            width: $(elem).innerWidth()
        });
        $("#floated-hidden-bar").css('left', (pos - origin) * -1);
    }

    var clicked_all = false;
    var clicked_freelance = false;
    var clicked_grado = false;
    /* COMPORTAMIENTO SCREENSHOTS WEBS HECHAS */
    //Botón TODAS
    $("#main-bar-all").click(function (){
        if (!clicked_all){
            $("figure").each(function (){
                if ($(this).hasClass("animate__zoomOut")){
                    $(this).removeClass("animate__zoomOut")
                        .css("width", "400px").css("opacity", 1)
                        .addClass("animate__zoomIn");
                }               
            });
        }
        //control botones
        clicked_all = true;
        clicked_freelance = false;
        clicked_grado = false;
    });

    //Botón PROGRAMADOR
    $("#main-bar-freelance").click(() => {
        if (!clicked_freelance){
            $("figure").each(() => {
                if ($("figure.freelance").hasClass("animate__zoomOut")){
                    $("figure.freelance").removeClass("animate__zoomOut")
                        .css("width", "400px")
                        .css("opacity", 1)
                        .addClass("animate__zoomIn");
                }
            });
            setTimeout(() => {
                $("figure.grado").addClass("animate__zoomOut");
                setTimeout(() => {
                    $("figure.grado").css({"width": 0, "opacity": 0})
                }, 200);
            }, 200);
        }
        //control botones
        clicked_freelance = true;
        clicked_all = false;
        clicked_grado = false;
    });

    //Botón GRADO
    $("#main-bar-grado").click(() => {
        if (!clicked_grado){
            $("figure").each(() => {
                if ($("figure.grado").hasClass("animate__zoomOut")){
                    $("figure.grado").removeClass("animate__zoomOut")
                        .css("width", "400px")
                        .css("opacity", 1)
                        .addClass("animate__zoomIn");
                }
            });
            setTimeout(() => {
                $("figure.freelance").addClass("animate__zoomOut");
                setTimeout(() => {
                    $("figure.freelance").css({"width": 0, "opacity": 0});
                }, 200);
            }, 200);
        }
        //control botones
        clicked_grado = true;
        clicked_all = false;
        clicked_freelance = false;
    });














});