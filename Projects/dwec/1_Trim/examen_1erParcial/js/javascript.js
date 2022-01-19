//Modo estricto
"use strict";

$(document).ready(function () {

    //función que muestra un reloj con el id pasado como argumento "valor"
    function reloj(valor) {
        var tiempo = new Date();//Crea un objeto Date
        var segundos = tiempo.getSeconds();//obtiene los segundos del objeto Date
        var minutos = tiempo.getMinutes();//obtiene los minutos
        var horas = tiempo.getHours();//obtiene las horas

        if (segundos <= 9) {//Si segundos es menor de 9, añade un cero delante
            segundos = "0" + segundos;
        } else {
            segundos = segundos;
        }

        if (minutos <= 9) {//Si minutos es menor de 9, añade un cero delante
            minutos = "0" + minutos;
        } else {
            minutos = minutos;
        }

        if (horas <= 9) {//Si horas es menor de 9, añade un cero delante
            horas = "0" + horas;
        } else {
            horas = horas;
        }

        //obtiene el elemento con id pasado como argumento "valor"
        document.getElementById(valor).innerHTML = horas + ":" + minutos + ":" + segundos;
    }

    //llama a la función reloj cada segundo y el tercer argumento se refiere a "valor"
    setInterval(reloj, 1000, "reloj");//Reloj del punto 1 del examen

    //pattern para comprobar el teléfono
    var patternTelf = /^[679]\d{8}$/;

    //asigna al botón "comprobador" el evento "click"
    document.getElementById("comprobador").addEventListener("click", validaTelf, false);

    //función para validar el teléfono introducido
    function validaTelf(){
        var elemento = document.getElementById("telf");

        if (patternTelf.test(elemento.value)){
            elemento.style.borderColor = "green";//si es correcto le asigna un border de color "verde"
        }else{
            elemento.style.borderColor = "red";//Si no es correcto le asigna un color "rojo"
        }
    }

    //obtiene el tag del elemento con id "configuraciones"
    var config = document.getElementById("configuraciones");

    /** CREACIÓN DE CONFIGURACIONES */
    //inicialización de variables
    var option, texto;

    //array con los valores para escoger en el SELECT
    var arrayConfig = ["pequeña", "mediana", "grande"];

    //for para rellenar los option del SELECT
    for (var i = 0; i < arrayConfig.length; i++) {
        option = document.createElement("option");
        texto = document.createTextNode(arrayConfig[i]);
        option.appendChild(texto);
        config.appendChild(option);
    }

    /** VENTANA */
    //Asigno el listner al boton para abrir la nueva ventana
    document.getElementById("generador").addEventListener("click", abrirVentana);

    //inicializo variables para la ventana nueva
    var nuevaVentana;

    //función que crea la nueva ventana
    function abrirVentana() {

        //recoge los valores del select
        var valorConfig = config.value;

        console.log(valorConfig);

        var configNuevaVentana;
        switch (valorConfig) {
            case "pequeña":
                configNuevaVentana = "height=200,width=200";
                break;
            case "mediana":
                configNuevaVentana = "height=400,width=400";
                break;
            case "grande":
                configNuevaVentana = "height=600,width=600";
                break;
        }

        nuevaVentana = window.open("", "", configNuevaVentana + ",left=50,top=50");
        nuevaVentana.document.write('<html><head><title>Ventana con Menú</title><link rel="stylesheet" type="text/css" ' +
            'href="css/estilo.css"></head><body>');

        console.log(configuraciones.value);
        console.log(configNuevaVentana);

        //crea un botón inferior de la ventana para cerrarla al pulsar en él
        var boton = document.createElement("input");
        boton.setAttribute("type", "button");
        boton.setAttribute("class", "botonCerrar");
        boton.setAttribute("value", "Cerrar Ventana");
        nuevaVentana.document.body.appendChild(boton);
        boton.addEventListener("click", cerrarVentana, false);

    }

    //función para cerrar la ventana
    function cerrarVentana() {
        nuevaVentana.close();
    }

});
