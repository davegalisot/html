$(window).scroll(function() {
    sessionStorage.scrollTop = 450;
    console.log($(this).scrollTop());
});

$(document).ready(function(){

    if (sessionStorage.scrollTop != "undefined") {
        $(window).scrollTop(sessionStorage.scrollTop);
    }

    $("#enviar").click(function() {
        $('html,body').animate({
                scrollTop: $("#enviar").offset().top},
            'slow');
    });

    function cambio_cara(id_div_radio, input_name, carita_class){
        $(id_div_radio).click(function (){
            seleccionado = $("input[name=" + input_name + "]").filter(":checked").val();

            switch (seleccionado){
                case "1":
                    $(carita_class).attr("src", "../public/img/csatis/emoji-mal.png");
                    break;
                case "2":
                    $(carita_class).attr("src", "../public/img/csatis/emoji-regular.png");
                    break;
                case "3":
                    $(carita_class).attr("src", "../public/img/csatis/emoji-bien.png");
                    break;
                case "4":
                    $(carita_class).attr("src", "../public/img/csatis/emoji-muy-bien.png");
                    break;
            }
        });
    }

    //ATENCIÓN AL CLIENTE
    cambio_cara("#at_cli_rb", "at_cli", ".at_cli_carita");

    //PLAZO DE ENTREGA
    cambio_cara("#pla_en_rb", "pla_en", ".pla_en_carita");

    //RESPUESTA PROBLEMAS
    cambio_cara("#res_prob_rb", "res_prob", ".res_prob_carita");

    //ASESORAMIENTO TÉCNICO
    cambio_cara("#ase_tec_rb", "ase_tec", ".ase_tec_carita");

    //CONFIANZA
    cambio_cara("#conf_rb", "conf", ".conf_carita");

    //PROFESIONALIDAD
    cambio_cara("#prof_rb","prof",".prof_carita");

    //CALIDAD PRODUCTO
    cambio_cara("#cal_prod_rb","cal_prod",".cal_prod_carita");

    //CALIDAD SERVICIO
    cambio_cara("#cal_ser_rb","cal_ser",".cal_ser_carita");

});