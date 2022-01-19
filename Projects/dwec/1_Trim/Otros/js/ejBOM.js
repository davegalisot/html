// El window.onload hace que Javascript espere a que cargue el HTML entero antes de ejecutarse.
window.onload = function() {
    /*********************************************************************************************************
     *  Generar Ventana y cerrarla (desde la propia ventana generada)
     */
    document.getElementById("abrir").addEventListener("click", abrirVentana, false);
    var nuevaVentana;

    function abrirVentana() {
        nuevaVentana = window.open("", "", "height=200,width=300,left=50,top=50");
        nuevaVentana.document.write('<html><head><title>Nueva Ventana</title><link rel="stylesheet" type="text/css" ' +
            'href="css/ejBOMVentana.css"></head><body>');

        var h4 = document.createElement("h3");
        nuevaVentana.document.body.appendChild(h4);
        var textoh3 = document.createTextNode("Se han utilizado las siguientes propiedades");
        h4.appendChild(textoh3);
        var ul = document.createElement("ul");
        nuevaVentana.document.body.appendChild(ul);
        var li = document.createElement("li");
        var texto1 = document.createTextNode("Ancho: " + nuevaVentana.outerWidth);
        li.appendChild(texto1);
        ul.appendChild(li);
        var li2 = document.createElement("li");
        var texto2 = document.createTextNode("Alto: " + nuevaVentana.outerHeight);
        li2.appendChild(texto2);
        ul.appendChild(li2);
        var li3 = document.createElement("li");
        var texto3 = document.createTextNode("Top: " + nuevaVentana.screenTop);
        li3.appendChild(texto3);
        ul.appendChild(li3);
        var li4 = document.createElement("li");
        var texto4 = document.createTextNode("Left: " + nuevaVentana.screenLeft);
        li4.appendChild(texto4);
        ul.appendChild(li4);

        var boton = document.createElement("input");
        boton.setAttribute("type", "button");
        boton.setAttribute("value", "Cerrar Ventana");
        nuevaVentana.document.body.appendChild(boton);
        boton.addEventListener("click", cerrarVentana, false);
    }

    function cerrarVentana() {
        nuevaVentana.close();
    }

}
