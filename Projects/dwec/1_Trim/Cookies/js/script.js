//Modo estricto
"use strict";

$(document).ready(function () {

    //Creo 3 cookies
    document.cookie = "usuario=David";
    document.cookie = "apellido=Galiana";
    document.cookie = "idSession=201811222000";

    //Recoge el id del SELECT y le crea los OPTIONS
    var select = document.getElementById("select");

    var cookieNombres = ["usuario", "apellido", "idSession"];

    for (var i = 0; i < 3; i++) {
        var option = document.createElement("option");
        var nombre = document.createTextNode(cookieNombres[i]);
        option.appendChild(nombre);
        select.appendChild(option);
    }


    var leer = document.getElementById("leer");
    leer.addEventListener("click", function () {
        var nombre = getCookie(select.value);
        alert(nombre);
    });

    var escribir = document.getElementById("escribir");
    escribir.addEventListener("click", function () {
        var texto = prompt("introduce el valor para la cookie");
        setCookie(select.value, texto);
    });

    var borrar = document.getElementById("borrar");
    borrar.addEventListener("click", function () {
        deleteCookie(select.value, getCookie(select.value));
    });

    function setCookie(nombre, valor) {
        document.cookie = nombre + "=" + valor + ";";
    }

    function getCookie(nombre) {
        var nom = nombre + "=";
        var array = document.cookie.split(";");
        for (var i = 0; i < array.length; i++) {
            var c = array[i];
            while (c.charAt(0) == " ") {
               c = c.substring(1);
            }
            if (c.indexOf(nombre) == 0) {
                return c.substring(nom.length, c.length);
            }
        }
        return "";
    }

    function deleteCookie(nombre, valor) {
        document.cookie = nombre + "=" + valor + ";expires=-1";
    }

});