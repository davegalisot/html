/**********************************************************************************************************************
 Hoja de estilos CSS                                                                       Autor: David Galiana Sotillo
 **********************************************************************************************************************/
//Modo estricto
"use strict";

function reloj(valor) {
    var tiempo = new Date();

    var year = tiempo.getUTCFullYear();
    tiempo.setFullYear(year);
    document.getElementById(valor).innerHTML = tiempo;
}

setInterval(reloj, 1000, "reloj");

function filtroLetras(input) {
    var regex = /[^a-z\s]/gi;
    input.value = input.value.replace(regex, "");
}
