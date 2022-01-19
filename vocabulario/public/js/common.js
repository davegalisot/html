$(document).ready(function(){

    //sonidos
    var audio = {};
    //correcto
    audio["correcto"] = new Audio();
    audio["correcto"].src = "../sounds/correct.mp3";
    //incorrecto
    audio["incorrecto"] = new Audio();
    audio["incorrecto"].src = "../sounds/incorrect.mp3";
    //palabra introducida
    audio["palabra_anadida"] = new Audio();
    audio["palabra_anadida"].src = "../sounds/word_added.mp3";

    //auto FadeOut mensajes
    window.setTimeout(function() {
        $(".alert").alert('close');
    }, 3000);

    // console.log($("#adivinar1").text());
    // console.log($("#adivinar2").text());
    // console.log($("#adivinar3").text());

    //funcion para quitar acentos
    function RemoveAccents(str) {
        var accents    = 'ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž';
        var accentsOut = "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
        str = str.split('');
        var strLen = str.length;
        var i, x;
        for (i = 0; i < strLen; i++) {
            if ((x = accents.indexOf(str[i])) != -1) {
                str[i] = accentsOut[x];
            }
        }
        return str.join('');
    }

    function adivinado(){
        //reproduce sonido "correcto"
        audio["correcto"].play();
        //asigna colores verdes a lo mostrado en pantalla
        $("#adivinar_h1").addClass("verde");
        $("#texto_adivinar").addClass("verde");
        //muestra la palabra oculta
        $("#texto_adivinar").css({"opacity": 1});
        //a los 3 segundos refresca la web
        setTimeout(function () {
            window.location.reload();
        }, 3000);
    }

    //al pinchar en COMPROBAR(index)
    $("#boton_comprobar").click(function () {
        //obtengo lo introducido por el usuario
        //Si acierta
        if($("#introducido").val().toLowerCase() == "") {
            $("#introducido").focus();
        }else if (RemoveAccents($("#introducido").val().toLowerCase()) == RemoveAccents($("#adivinar1").text().toLowerCase())) {
            adivinado();
        }else if(RemoveAccents($("#introducido").val().toLowerCase()) == RemoveAccents($("#adivinar2").text().toLowerCase())) {
            adivinado()
        }else if (RemoveAccents($("#introducido").val().toLowerCase()) == RemoveAccents($("#adivinar3").text().toLowerCase())){
            adivinado()
        }else{
            //si falla
            //reproduce sonido
            audio["incorrecto"].play();
            //pone el borde del input a rojo
            $("#introducido").addClass("rojo");
            //añade efecto de temblar al article
            $("#adivinar_h1").addClass("rojo");
            //muestra la palabra oculta
            $("#texto_adivinar").css({"opacity": 1});
            $("article").addClass("vibracion");
            //despues de 0.6s quita la clase de temblar
            setTimeout(function () {
                $("article").removeClass("vibracion");
            }, 600);
            setTimeout(function () {
                $("#introducido").css({"border":"5px solid #a5e0ff"});
                $("#adivinar_h1").addClass("normal");
            }, 1500);
            //a los 3 segundos refresca la web
            setTimeout(function () {
                window.location.reload();
            }, 3000);
        }
    });

    //depende de la ruta añade eventListeners
    if (document.location.pathname === "/vocabulario/public/index.php/"){
        //pone el focus
        $("#introducido").focus();
        document.addEventListener("keyup", function(event) {
            if (event.key === "Enter") {
                document.getElementById("boton_comprobar").click();
            }
        });
    }

    //Scroll al final de la web
    scrollingElement = (document.scrollingElement || document.body);

    function scrollToBottom () {
        scrollingElement.scrollTop = scrollingElement.scrollHeight;
    }

    $("#goToBottom").click(function (id) {
        $(scrollingElement).animate({
            scrollTop: document.body.scrollHeight
        }, 500);
    });

    $("#goToTop").click(function (id) {
        $(scrollingElement).animate({
            scrollTop: 0
        }, 500);
    });

    //Copia estilos de la tabla a tabla-falsa
    $("#tabla-falsa tr:first-child th:nth-child(1)").width($("#mi-tabla tr:first-child th:nth-child(1)").width());
    $("#tabla-falsa tr:first-child th:nth-child(2)").width($("#mi-tabla tr:first-child th:nth-child(2)").width());
    $("#tabla-falsa tr:first-child th:nth-child(3)").width($("#mi-tabla tr:first-child th:nth-child(3)").width());
    $("#tabla-falsa tr:first-child th:nth-child(4)").width($("#mi-tabla tr:first-child th:nth-child(4)").width());
    $("#tabla-falsa tr:nth-child(2) td:nth-child(1)").width($("#mi-tabla tr:nth-child(2) td:nth-child(1)").width());
    $("#tabla-falsa tr:nth-child(2) td:nth-child(2)").width($("#mi-tabla tr:nth-child(2) td:nth-child(2)").width());
    $("#tabla-falsa tr:nth-child(2) td:nth-child(3)").width($("#mi-tabla tr:nth-child(2) td:nth-child(3)").width());


    if (document.documentElement.clientWidth > 991.98){
        $(window).on('scroll', function() {
            var scrollTop = $(this).scrollTop();

            var topDistance = $("#mi-tabla").offset().top;

            if ( (topDistance) < scrollTop ) {
                $(".scroll-fixed").css("opacity", 1);
            }else{
                $(".scroll-fixed").css("opacity", 0);
            }
        });
    }

});