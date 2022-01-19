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

    //mantiene el nav visible cuando haces scroll
    window.onscroll = function() {myFunction()};

    function myFunction() {

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

    // //variables themeChanger
    // var blanco = "#fff";
    // var naranja = "#FFAE1B";
    // var azulOscuro = "#455A64";
    // var negro = "#000";
    //
    // var fondoClaro = "#ECEFF1";
    // var fondoOscuro = "#333";
    //
    // //themeChanger
    // $(function() {
    //     $('#themeChanger').change(function() {
    //         if ($(this).prop('checked') == true){
    //             $("#header").css({background: naranja});
    //             $("#body").css({background: fondoClaro});
    //             $(".encabezado").css({color: negro});
    //             $("article *").css({color: negro});
    //             $(".tituloNoticia").css({color: naranja});
    //             $("nav").css({background: naranja});
    //             $("nav *").css({color: negro});
    //         }else{
    //             $("#header").css({background: azulOscuro});
    //             $("#body").css({background: fondoOscuro});
    //             $(".encabezado").css({color: blanco});
    //             $("article *").css({color: blanco});
    //             $(".tituloNoticia").css({color: naranja});
    //             $("nav").css({background: azulOscuro});
    //             $("nav *").css({color: blanco});
    //         }
    //     })
    // })

});