$(document).ready(function () {

    $('#add_border').on('click', function() {
        $("table").attr("border","1");
    });
    $('#mostrar_attr').on('click', function() {
        if ($("table").attr("border") == null){
            alert("No hay bordes definidos")
        }
        if ($("table").attr("border") == 1){
            alert("La propiedad borde es 1");
        }
    });
    $('#borrar_border').on('click', function() {
        $("table").removeAttr("border","1");
    });
});