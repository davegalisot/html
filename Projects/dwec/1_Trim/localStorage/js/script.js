//Modo estricto
"use strict";

$(document).ready(function () {

    //Creo 3 ls's
    localStorage.setItem("usuario", "David");
    localStorage.setItem("apellido", "Galiana");
    localStorage.setItem("idSession", "2018.11.27");

    //Recoge el id del SELECT y le crea los OPTIONS
    var select = document.getElementById("select");


    for (var key in localStorage) {
        var option = document.createElement("option");
        var nombre = document.createTextNode(key);
        option.appendChild(nombre);
        select.appendChild(option);
    }

    var leer = document.getElementById("leer");
    leer.addEventListener("click", function () {
        if (select.value){
            var nombre = getLS(select.value);
            alert(nombre);
        }
    });

    var escribir = document.getElementById("escribir");
    escribir.addEventListener("click", function () {
        var texto = prompt("introduce el valor para el localStorage");
        setLS(select.value, texto);
    });

    var borrar = document.getElementById("borrar");
    borrar.addEventListener("click", function () {
        deleteLS(select.value);
    });

    var boton = document.getElementById("crearILS").addEventListener("click", function () {
        var name = document.getElementById("name").value;
        var valor = document.getElementById("valor").value;
        setLS(name, valor);
    });


    function mostrarNames() {
        var textoP = document.getElementById("mostrar").innerHTML = lSNames;
    }

    function setLS(nombre, valor) {
        localStorage.setItem(nombre, valor);
    }

    function getLS(nombre) {
        return localStorage.getItem(nombre);
    }

    function deleteLS(nombre) {
        localStorage.removeItem(nombre);
    }

});