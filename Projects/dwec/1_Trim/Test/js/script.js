/**********************************************************************************************************************
 Hoja de estilos CSS                                                                       Autor: David Galiana Sotillo
 **********************************************************************************************************************/
//Modo estricto
"use strict";

window.onload = function () {
    //reloj para el footer
    function reloj(valor) {
        var tiempo = new Date();

        var year = tiempo.getUTCFullYear();
        tiempo.setFullYear(year);
        document.getElementById(valor).innerHTML = tiempo;
    }

    setInterval(reloj, 1000, "reloj");

    //array con respuestas correctas
    var respuestasOK = [
        "",
        "italia",//1
        "granada",
        "leon",//3
        "ovina",
        "jemelo",//5
        "biomasa",
        "caballo",
        "riga",//8
        "segunda",
        "pacenses"//10
    ];

    //apunta al botón envíar y le asigna un eventlistener onclick
    document.getElementById("enviar").addEventListener("click", validar);

    function valida1() {//valida la primera pregunta/respuesta (SE REPITE CON LAS DEMAS)
        var elemento = document.getElementById("1");
        if (elemento.value === respuestasOK[1]) {
            document.getElementById("span1").className = "ok";
            return true;
        } else {
            document.getElementById("span1").className = "error";
            return false;
        }
    }

    function valida2() {
        var elemento = document.getElementById("2");
        if (elemento.value === respuestasOK[2]) {
            document.getElementById("span2").className = "ok";
            return true;
        } else {
            document.getElementById("span2").className = "error";
            return false;
        }
    }

    function valida3() {
        var elemento = document.getElementById("3");
        if (elemento.value === respuestasOK[3]) {
            document.getElementById("span3").className = "ok";
            return true;
        } else {
            document.getElementById("span3").className = "error";
            return false;
        }
    }

    function valida4() {
        var elemento = document.getElementById("4");
        if (elemento.value === respuestasOK[4]) {
            document.getElementById("span4").className = "ok";
            return true;
        } else {
            document.getElementById("span4").className = "error";
            return false;
        }
    }

    function valida5() {
        var elemento = document.getElementById("5");
        if (elemento.value === respuestasOK[5]) {
            document.getElementById("span5").className = "ok";
            return true;
        } else {
            document.getElementById("span5").className = "error";
            return false;
        }
    }

    function valida6() {
        var elemento = document.getElementById("6");
        if (elemento.value === respuestasOK[6]) {
            document.getElementById("span6").className = "ok";
            return true;
        } else {
            document.getElementById("span6").className = "error";
            return false;
        }
    }

    function valida7() {
        var elemento = document.getElementById("7");
        if (elemento.value === respuestasOK[7]) {
            document.getElementById("span7").className = "ok";
            return true;
        } else {
            document.getElementById("span7").className = "error";
            return false;
        }
    }

    function valida8() {
        var elemento = document.getElementById("8");
        if (elemento.value === respuestasOK[8]) {
            document.getElementById("span8").className = "ok";
            return true;
        } else {
            document.getElementById("span8").className = "error";
            return false;
        }
    }

    function valida9() {
        var elemento = document.getElementById("9");
        if (elemento.value === respuestasOK[9]) {
            document.getElementById("span9").className = "ok";
            return true;
        } else {
            document.getElementById("span9").className = "error";
            return false;
        }
    }

    function valida10() {
        var elemento = document.getElementById("10");
        if (elemento.value === respuestasOK[10]) {
            document.getElementById("span10").className = "ok";
            return true;
        } else {
            document.getElementById("span10").className = "error";
            return false;
        }
    }

    //Crea una lista con las respuestas dadas
    function textoValidar() {
        var div = document.getElementById("respuestas");
        var h = document.createElement("h2");
        var textoH = document.createTextNode("Repuestas");
        h.appendChild(textoH);
        div.appendChild(h);
        var ul = document.createElement("ul");
        div.appendChild(ul);

        for (var i = 1; i <= 10; i++) {
            var li = document.createElement("li");
            var textoLi = document.createTextNode(i + ": " + respuestasOK[i]);
            li.appendChild(textoLi);
            ul.appendChild(li);
        }
        //añado el borde al recuadro donde se muestran las respuestas
        div.setAttribute("style", "border: 1px solid #333");
    }

    //validar formulario
    function validar(e) {
        if (valida1() && valida2() && valida3() && valida4() && valida5() && valida6() &&
            valida7() && valida8() && valida9() && valida10() && confirm("Pulsa aceptar para enviar el formulario")) {
            textoValidar();
            e.preventDefault();
        } else {
            alert("No has respondido a todas las preguntas");
            e.preventDefault();
        }
    }
}




