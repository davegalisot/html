/**********************************************************************************************************************
 Hoja de estilos CSS                                                                       Autor: David Galiana Sotillo
 **********************************************************************************************************************/
//Modo estricto
"use strict";

$(document).ready(function () {//Espera a que se cargue la página para cargar scripts

    function reloj(valor) {//Muestra la fecha en el footer (se actualiza cada segundo (SETINTERVAL))
        var tiempo = new Date();

        var opciones = {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZoneName: 'short',
            hour: 'numeric', minute: 'numeric', second: 'numeric'
        };

        document.getElementById(valor).innerHTML = tiempo.toLocaleDateString("es-ES", opciones);
    }

    setInterval(reloj, 1000, "reloj");//Refresca la fecha.

    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    document.getElementById("entrada").focus();//apunta al input principal

    var flag = false;//controla si se ha ganado o perdido
    var puntos;

    var hidden = document.getElementById("hidden");

    var cabeza = document.getElementById("cabeza");
    var cuerpo = document.getElementById("cuerpo");
    var bra_izq = document.getElementById("bra_izq");
    var bra_dcho = document.getElementById("bra_dcho");
    var pie_izq = document.getElementById("pie_izq");
    var pie_dcho = document.getElementById("pie_dcho");

    if (hidden.innerHTML >= 1) {
        cabeza.className = "opacityOne";
        puntos = 8;
    }
    if (hidden.innerHTML >= 2) {
        cuerpo.setAttribute("class", "opacityOne");
        puntos = 6;
    }
    if (hidden.innerHTML >= 3) {
        bra_izq.setAttribute("class", "opacityOne");
        puntos = 4;
    }
    if (hidden.innerHTML >= 4) {
        bra_dcho.setAttribute("class", "opacityOne");
        puntos = 2;
    }
    if (hidden.innerHTML >= 5) {
        pie_izq.setAttribute("class", "opacityOne");
        puntos = 1;
    }
    if (hidden.innerHTML >= 6) {
        pie_dcho.setAttribute("class", "opacityOne");
        puntos = 0;
    }

    if (puntos == null) {
        puntos = 10;
        if (flag == false){
            document.getElementById("mensaje").innerHTML = "No has fallado aún, llevas ";
            document.getElementById("puntos").innerHTML = puntos + " ";
            document.getElementById("postPuntos").innerHTML = "puntos";
        }
    }

    if (puntos == null) {
    } else {
        if (puntos > 0 && puntos <= 8){
            document.getElementById("mensaje").innerHTML = "Llevas ";
            document.getElementById("puntos").innerHTML = puntos + " ";
            document.getElementById("postPuntos").innerHTML = "puntos";
        }
    }

    var adivinar = document.getElementById("adivinar");
    var div = document.getElementById("contenedor");
    var h3 = document.getElementById("h3");
    if (h3.innerHTML == "HAS GANADO!") {
        div.className = "verde";
        flag = true;
        document.getElementById("entrada").disabled = true;
        document.getElementById("mensaje").innerHTML = "HAS GANADO! conseguiste ";
        document.getElementById("puntos").innerHTML = puntos + " ";
        document.getElementById("postPuntos").innerHTML = "puntos";
    } else if (h3.innerHTML == "HAS PERDIDO!") {
        flag = true;
        div.className = "rojo";
        document.getElementById("entrada").disabled = true;
        adivinar.setAttribute("class", "opacityOne");
        document.getElementById("mensaje").innerHTML = "HAS PERDIDO! No consigues puntos";
    } else {
        div.className = "";
    }

    var reiniciar = document.getElementById("reiniciar");
    if (flag == true) {
        reiniciar.className += " opacityOne";
    }

});