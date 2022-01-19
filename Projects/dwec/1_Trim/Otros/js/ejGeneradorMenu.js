//Modo estricto;
"use strict";
// El window.onload hace que Javascript espere a que cargue el HTML entero antes de ejecutarse.
window.onload = function() {
    /*********************************************************************************************************
     *  Generador de Menu
     */

    //obtengo el tag del elemento con id "numeroItems"
    var numeroItems = document.getElementById("numeroItems");

    //creo el numero de items para escoger
    var option, texto;
    for (var i = 1; i <= 10; i++) {
        option = document.createElement("option");
        texto = document.createTextNode(i);
        option.appendChild(texto);
        numeroItems.appendChild(option);
    }

    //obtengo el tag del elemento con sus ids
    var radio = document.getElementsByName("distribucion");
    var estilo = document.getElementById("estilo");

    //Asigno el listner al boton para abrir la nueva ventana
    document.getElementById("generarMenu").addEventListener("click", abrirVentana);

    //inicializo variables para la ventana nueva
    var nuevaVentana, valorRadio, valorNumeroItems, valorEstilo;

    //Función que crea la nueva ventana
    function abrirVentana() {
        nuevaVentana = window.open("","", "height=600,width=1200,left=50,top=50");
        nuevaVentana.document.write('<html><head><title>Ventana con Menú</title><link rel="stylesheet" type="text/css" ' +
            'href="css/ejGeneradorMenu.css"></head><body>');


        /** COMENTADO PORQUE NO FUNCIONA
        var link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = "css/ejGeneradorMenu.css";
        nuevaVentana.document.head.appendChild(link);

        //for para buscar qué Radio está marcado
        for (var i = 0; i < radio.length; i++) {
            if (radio[i].checked){
                valorRadio = radio[i].value;
                break;
            }
        }
        */

        //creo el menú
        var div = document.createElement("div");
        nuevaVentana.document.body.appendChild(div);
        var ul = document.createElement("ul");
        ul.setAttribute("class", "vertical");
        div.appendChild(ul);

        //asigno clase a UL
        if (valorRadio === "horizontal"){
            ul.setAttribute("class", "horizontal");
        }

        //asigno clase con += para que no borre la anterior
        valorEstilo = estilo.value;
        switch (valorEstilo) {
            case "profesional":
                ul.className += " profesional";
                console.log(valorEstilo);
                break;
            case "particular":
                ul.className += " particular";
                console.log(valorEstilo);
                break;
            case "creativa":
                ul.className += " creativa";
                console.log(valorEstilo);
                break;
        }

        //creo los submenús
        var menuLi = document.createElement("li");
        var textoMenu = document.createTextNode("Menu");
        menuLi.appendChild(textoMenu);
        ul.appendChild(menuLi);

        //número de items del menu
        for (var i = 1; i <= numeroItems.value; i++) {
            var li = document.createElement("li");
            var texto = document.createTextNode("Item"+i);
            li.appendChild(texto);
            ul.appendChild(li);
        }

        //creación de botón inferior
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

}
