/**********************************************************************************************************************
 Hoja de estilos CSS                                                                       Autor: David Galiana Sotillo
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


});