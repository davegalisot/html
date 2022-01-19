$(document).ready(function () {

    //elimina la lista
    $("#boton1").click(function () {
        $("ul").empty();
    });

    //restaura la lista
    $("#boton2").click(function () {
        location.reload();
    });

    //añade un elemento al final de la lista
    $("#boton3").click(function () {
        $("<li>Otro item (final)</li>").appendTo("ul");
    });

    //añade un elemento al principio de la lista
    $("#boton4").click(function () {
        $("<li>Otro item (principio)</li>").prependTo("ul");
    });

    //eliminar el último elemento
    $("#boton5").click(function () {
        $("li:last-child").remove();
    });

    //eliminar el primer elemento
    $("#boton6").click(function () {
        $("li:first-child").remove();
    });

    //eliminar el primer elemento y el segundo
    $("#boton7").click(function () {
        $("li:first-child").add($("li:first-child").next()).remove();

    });

    //eliminar los dos últimos elementos
    $("#boton8").click(function () {
        $("li:last-child").add($("li:last-child").prev()).remove();

    });

});