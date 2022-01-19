//Modo estricto
"use strict";

$(document).ready(function () {

    setInterval(reloj, 1000, "reloj");

    var clockInterval = setInterval(clock, 1000);

    $("<div>", {"id": "contReloj"}).appendTo("#botonera");
    $("<div>", {"id": "contCrono"}).appendTo("#botonera");
    $("<div>", {"id": "contCA"}).appendTo("#botonera");

    var cronoPlayInterval;
    var CAPlayInterval;
    var contadorSegundos = 0;
    var contadorMinutos = 0;
    var contadorHoras = 0;

/* input RELOJ */
    $("<input id='relojDisplay' type='button' value='Reloj'>").appendTo("#contReloj");
    $("#relojDisplay").click(function () {
        clearInterval(cronoPlayInterval);
        clearInterval(CAPlayInterval);
        clockInterval = setInterval(clock, 1000);
    });

/* input CRONO */
    $("<input id='crono' type='button' value='Cronómetro'>").appendTo("#contCrono");
    $("#crono").click(function () {
        clearInterval(clockInterval);
        crono();
    });

/* input CRONO PLAY */
    $("<input id='cronoPlay' type='button' >").appendTo("#contCrono");
    $("#cronoPlay").click(function () {
        cronoPlayInterval = setInterval(cronoPlay, 1000);
        protectionClickSpam("#cronoPlay");
        contadorSegundos = 55;
    });

/* input CRONO PAUSE */
    $("<input id='cronoPause' type='button'>").appendTo("#contCrono");
    $("#cronoPause").click(function () {
        clearInterval(cronoPlayInterval);
    });

/* input CRONO RESTART */
    $("<input id='cronoRestart' type='button'>").appendTo("#contCrono");
    $("#cronoRestart").click(function () {
        clearInterval(cronoPlayInterval);
        setACero();
    });

/* input CUENTA ATRÁS */
    $("<input id='CA' type='button' value='Cuenta Atrás'>").appendTo("#contCA");
    $("#CA").click(function () {
        clearInterval(clockInterval);
        setACero();
        CA();
    });

/* input CUENTA ATRÁS PLAY */
    $("<input id='CAPlay' type='button'>").appendTo("#contCA");
    $("#CAPlay").click(function () {
        CAPlayInterval = setInterval(CAPlay, 1000);
    });

/* input CUENTA ATRÁS PAUSE */
    $("<input id='CAPause' type='button'>").appendTo("#contCA");
    $("#CAPause").click(function () {
        clearInterval(CAPlayInterval);
    });

/* input CUENTA ATRÁS RESTART */
    $("<input id='CARestart' type='button'>").appendTo("#contCA");
    $("#CARestart").click(function () {
        clearInterval(CAPlayInterval);
        setACero();
    });

    function reloj(valor) {
        var tiempo = new Date();

        var opciones = {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZoneName: 'short',
            hour: 'numeric', minute: 'numeric', second: 'numeric'
        };

        document.getElementById(valor).innerHTML = tiempo.toLocaleDateString("es-ES", opciones);

    }

    function clock() {
        var tiempo = new Date();
        var segundos = tiempo.getUTCSeconds();
        var minutos = tiempo.getUTCMinutes();
        var horas = tiempo.getUTCHours();

        if (segundos <= 9) {
            $("#segundos").val("0" + segundos);
        } else {
            $("#segundos").val(segundos);
        }

        if (minutos <= 9) {
            $("#minutos").val("0" + minutos);
        } else {
            $("#minutos").val(minutos);
        }

        if (horas <= 9) {
            $("#horas").val("0" + horas+1);
        } else {
            $("#horas").val(horas+1);
        }

        $("#CAPlay").css({"display": "none"});
        $("#CAPause").css({"display": "none"});
        $("#CARestart").css({"display": "none"});

        $("#CA").css({"display": "block"});

        $("#cronoPlay").css({"display": "none"});
        $("#cronoPause").css({"display": "none"});
        $("#cronoRestart").css({"display": "none"});

        $("#crono").css({"display": "block"});
    }

    function crono() {
        $("#crono").css({"display": "none"});

        $("#CAPlay").css({"display": "none"});
        $("#CAPause").css({"display": "none"});
        $("#CARestart").css({"display": "none"});

        $("#CA").css({"display": "block"});

        $("#cronoPlay").css({"display": "block"});
        $("#cronoPause").css({"display": "block"});
        $("#cronoRestart").css({"display": "block"});

        $("#horas").val("00");
        $("#minutos").val("00");
        $("#segundos").val("00");
    }

    function CA() {
        $("#CA").css({"display": "none"});

        $("#cronoPlay").css({"display": "none"});
        $("#cronoPause").css({"display": "none"});
        $("#cronoRestart").css({"display": "none"});

        $("#crono").css({"display": "block"});

        $("#CAPlay").css({"display": "block"});
        $("#CAPause").css({"display": "block"});
        $("#CARestart").css({"display": "block"});
    }

    function cronoPlay() {
        contadorSegundos++;

        console.log("Secs: " + contadorSegundos);
        console.log("Mins: " + contadorMinutos);
        console.log("Horas: " + contadorHoras);

        if (contadorSegundos == 60) {
            contadorSegundos = 0;
            contadorMinutos++;
        }

        if (contadorMinutos == 60) {
            contadorMinutos = 0;
            contadorHoras++;
        }

        if (contadorHoras == 24){
            clearInterval(cronoPlayInterval);
        }

        if (contadorSegundos <= 9) {
            $("#segundos").val("0" + contadorSegundos);
        } else {
            $("#segundos").val(contadorSegundos);
        }

        if (contadorMinutos <= 9) {
            $("#minutos").val("0" + contadorMinutos);
        } else {
            $("#minutos").val(contadorMinutos);
        }

        if (contadorHoras <= 9) {
            $("#horas").val("0" + contadorHoras);
        } else {
            $("#horas").val(contadorHoras);
        }

    }

    function CAPlay() {
        contadorSegundos = $("#segundos").val();
        contadorMinutos = $("#minutos").val();
        contadorHoras = $("#horas").val();

        console.log("Secs: " + contadorSegundos);
        console.log("Mins: " + contadorMinutos);
        console.log("Horas: " + contadorHoras);

        if (contadorSegundos == 0){
            contadorMinutos--;
            contadorSegundos = 60;
        }

        contadorSegundos--;

        /*if (contadorMinutos == 0){
            contadorHoras--;
            contadorMinutos = 59;
        }

        if (contadorHoras == 0){
            contadorMinutos = 59;
        }*/

        if (contadorHoras == 0 && contadorMinutos == 0 && contadorSegundos == 0){
            clearInterval(CAPlayInterval)
        }

        if (contadorSegundos <= 9) {
            $("#segundos").val("0" + contadorSegundos);
        } else {
            $("#segundos").val(contadorSegundos);
        }

        if (contadorMinutos <= 9) {
            $("#minutos").val("0" + contadorMinutos);
        } else {
            $("#minutos").val(contadorMinutos);
        }

        if (contadorHoras <= 9) {
            $("#horas").val("0" + contadorHoras);
        } else {
            $("#horas").val(contadorHoras);
        }

    }

    function setACero() {
        contadorSegundos = 0;
        contadorMinutos = 0;
        contadorHoras = 0;
        $("#segundos").val("00");
        $("#minutos").val("00");
        $("#horas").val("00");
    }

    function protectionClickSpam(input) {

    }
});