/**********************************************************************************************************************
 Javascript / JQuery                                                                       Autor: David Galiana Sotillo
 **********************************************************************************************************************/
//Modo estricto
"use strict";

$(document).ready(function () {

    function reloj(valor) {
        var tiempo = new Date();

        var opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZoneName: 'short',
            hour: 'numeric', minute: 'numeric', second: 'numeric'};

        document.getElementById(valor).innerHTML = tiempo.toLocaleDateString("es-ES", opciones);
    }

    setInterval(reloj, 1000, "reloj");

/** SPAN EN EL HEADER */
    var spanHeader = document.getElementById("spanHeader");

    function opacity1(){
        spanHeader.setAttribute("style", "opacity: 1");
    }

    function opacity2(){
        spanHeader.setAttribute("style", "opacity: 0");
    }

    setInterval(opacity2, 500);
    setInterval(opacity1, 1000);

/** MOSTRAR AL CLICKEAR EN EL CAMPO CONTRASEÑA (SE OCULTA AL CLICKEAR FUERA) */
    var input = document.getElementById("psswrd");

    input.onfocus = function() {
        document.getElementById("password").style.opacity = "1";
    }

    input.onblur = function() {
        document.getElementById("password").style.opacity = "0";
    }

});