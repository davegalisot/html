/**********************************************************************************************************************
                                                                                           Autor: David Galiana Sotillo
 **********************************************************************************************************************/
//Modo estricto
"use strict";

window.onload = function () {
    //reloj
    function reloj(valor) {
        var tiempo = new Date();

        var year = tiempo.getUTCFullYear();
        tiempo.setFullYear(year);
        document.getElementById(valor).innerHTML = tiempo;
    }
    setInterval(reloj, 1000, "reloj");

    document.getElementById("enviar").addEventListener("click", validar);

    var patternDNI = /\d{8}\D{1}/;
    var patternNombre = /\D/;
    var patternTelf = /^[679]\d{8}$/;
    var patternMat = /\d{4}\D{3}/;
    var patternCorr = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    function validaDni(){
        var elemento = document.getElementById("dni");
        if (patternDNI.test(elemento.value)){
            return true;
        }else{
            return false;
        }
    }

    function validaNombre() {
        var elemento = document.getElementById("nombre");
        if (patternNombre.test(elemento.value)){
            return true;
        }else{
            return false;
        }
    }

    function validaMat() {
        var elemento = document.getElementById("matricula");
        if (patternMat.test(elemento.value)){
            return true;
        }else{
            return false;
        }
    }

    function validaCorreo() {
        var elemento = document.getElementById("correo");
        if (patternCorr.test(elemento.value)){
            return true;
        }else{
            return false;
        }
    }

    function validar(e){
        if (validaDni() && validaNombre() && validaMat() && validaCorreo() &&
            confirm("Pulsa aceptar para enviar el formulario")){

        }else{
            e.preventDefault()
        }
    }

}




