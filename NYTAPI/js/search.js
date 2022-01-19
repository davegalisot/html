$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Búsqueda
    |--------------------------------------------------------------------------
    */
    //variable para mostrar en #mostrador
    var eleccion = "";

    //al pulsar la tecla enter
    $("#searchField").on('keyup', function (e) {
        if (e.key == "Enter") {
            //lama a la función
            trataDatos();
            //pierde el focus
            $("#searchField").blur();
        }
    });

    //al pulsar en el botón de buscar
    $("#searchButton").click(function () {
        //llama a la función
        trataDatos();
    });

    function trataDatos(){

        //elimina los datos presentados
        $("section").remove();

        //recoge datos del input search
        var dato = $("#searchField").val();

        if (dato == ""){
            $("#mostrador").text("Type something to search for!");
        }else{
            //llama a la función que envía datos
            $("#mostrador").text("Searching...");

            enviaDatosSearch(dato);
        }

    }

    /*
    |--------------------------------------------------------------------------
    | función que envia datos a la API (search)
    |--------------------------------------------------------------------------
    */
    function enviaDatosSearch(dato) {

        var requestURL = "https://api.nytimes.com/svc/search/v2/articlesearch.json?q=" + dato + "&api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        request.onload = function () {
            var data = request.response;
            datosRecibidosSearch(data, dato);

        };

        request.send();
    }

    /*
    |--------------------------------------------------------------------------
    | función que recibe los datos de la API (search)
    |--------------------------------------------------------------------------
    */
    function datosRecibidosSearch(data, dato) {

        //Muestro en el título principal lo mostrado
        $("#mostrador").text("- " + eleccion);

        var noticias = data.response.docs;

        //obtiene el contenedor principal
        var contenedorPrincipal = document.getElementById("contenedorPrincipal");

        //crea una section para presentar cada noticia
        $("<section>", {"id": "section"}).appendTo(contenedorPrincipal);

        //variable para separadores
        var j = 1;
        //for para recorrer cada noticia recibida
        for (var i = 0; i < noticias.length; i++) {

            //crea un article por noticia
            $("<article>", {"id": "noticia" + i}).appendTo(section);

            $("<a>", {
                "id": "a" + i,
                "target": "_blank",
                "href": noticias[i].web_url
            }).appendTo($("#noticia" + i));

            //crea un divisor para mostrar fecha publicación y section
            $("<div>", {"id": "divisor" + i, "class": "divisor"}).appendTo($("#a" + i));

            var fechaObtenida = new Date(noticias[i].pub_date);
            var fecha = fechaObtenida.toDateString();

            //fecha_pub
            $("<p>").text(fecha).appendTo($("#divisor" + i));

            //lo buscado
            $("<p>").text("Searched: " + dato).appendTo($("#divisor" + i));

            //crea un h3 con el título de la noticia
            $("<h3>").text(noticias[i].headline.main).appendTo($("#a" + i));

            /**************************************************************************************/
            $("<div>", {"id": ("div-imagen" + i), "class": "div-imagen"}).appendTo("#a" + i);

            try {
                $("<img>", {
                    "class": "a-imagen",
                    "src": "https://static01.nyt.com/" + noticias[i].multimedia[0].url
                }).appendTo("#div-imagen" + i);
            } catch (err) {
                if (temaUsado === "theme-light"){
                    $("<img>", {
                        "class": "a-imagen",
                        "src": "img/404.png"
                    }).appendTo("#div-imagen" + i);
                }else{
                    $("<img>", {
                        "class": "a-imagen",
                        "src": "img/404-negro.png"
                    }).appendTo("#div-imagen" + i);
                }
            }

            try {
                $("<figcaption>").text(noticias[i].multimedia[0].caption).appendTo("#a" + i);
            } catch (err) {
                console.log("Error retrieving caption data, skipping");
            }

            //crea un p con la entradilla de la noticia
            $("<p>", {"class": "entradilla"}).text(noticias[i].lead_paragraph).appendTo($("#a" + i));

            //crea un p con el autor de la noticia
            $("<p>", {"class": "autor"}).text(noticias[i].byline.original).appendTo($("#a" + i));

            //cada tercera noticia no pone el div vertical pero sí el horizontal
            if (j%3 === 0 || i === noticias.length-1){
                if (i <= noticias.length-2){
                    $("<div>", {"class": "div-horizontal"}).appendTo(section);
                }
            }else{
                $("<div>", {"class": "div-vertical"}).appendTo(section);
            }

            j++;

        }

        //muestra el número de noticias encontradas
        $("#mostrador").text("- Items Found for \"" + dato + "\" - (" + noticias.length + " results)");
    }

});
