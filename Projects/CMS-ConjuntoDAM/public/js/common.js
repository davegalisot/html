$(document).ready(function(){

    //Mensaje borrar
    $('.boton_borrar').click(function () {
        var id = $(this).attr('data-id');
        $("#"+id).slideToggle();
    });

    //Cambiar clave
    $("input[type=checkbox][name=cambiar_clave]").click(function () {
        $("input[type=password]").toggleClass( "d-none" );
    });

    //carrousel
    $('#carouselExampleIndicators').carousel({
        interval: 2000
    });

    //lama a la funcion llamaRotate cada 5s
    setTimeout(llamaRotate, 5000);

    //llama a la funcion rotate aleatoriamente
    function llamaRotate() {
        var num = Math.floor((Math.random() * 1000) + 50);

        setTimeout(rotate, num);
    }

    //rota el engranaje unos grados aleatorios
    function rotate() {
        var num = Math.floor((Math.random() * 1000) - 1000);

        $(".cogwheel").css({"transform": "rotate("+num+"deg)", "transition": "all 1s ease-out"});
    }

    //mantiene el nav visible cuando haces scroll
    window.onscroll = function() {myFunction()};

    var miniLogo = document.getElementById("miniLogo");
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky");
            navbar.classList.add("smaller");
            miniLogo.classList.remove("opacity0");
            miniLogo.classList.add("opacity1");
        } else {
            navbar.classList.remove("sticky");
            navbar.classList.remove("smaller");
            miniLogo.classList.add("opacity0");
            miniLogo.classList.remove("opacity1");
        }

        // When the user scrolls down 20px from the top of the document, show the button
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    $("#myBtn").click(function() {
        $('html,body').animate({scrollTop: 0}, 'slow');
    });

    //variables themeChanger
    var blanco = "#fff";
    var naranja = "#ff6000";
    var azulOscuro = "#455A64";

    var fondoClaro = "#ECEFF1";
    var fondoOscuro = "#333";

    //themeChanger
    $(function() {
        $('#themeChanger').change(function() {
            if ($(this).prop('checked') == true){
                $("#header").css({background: naranja});
                $("#body").css({background: fondoClaro});
                $("section a").css({background: blanco, border : "4px solid" + blanco});
                $("section a div h3").css({color: azulOscuro});
                $(".encabezado").css({color: azulOscuro});
            }else{
                $("#header").css({background: azulOscuro});
                $("#body").css({background: fondoOscuro});
                $("section a").css({background: azulOscuro, border : "4px solid" + azulOscuro});
                $("section a div h3").css({color: blanco});
                $(".encabezado").css({color: blanco});
            }
        })
    })

});