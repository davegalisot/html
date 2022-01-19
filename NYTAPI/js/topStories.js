$(document).ready(function () {
    /*
    |--------------------------------------------------------------------------
    | Sección categorías
    |--------------------------------------------------------------------------
    */
    //array con categorias
    var categoriesArray = ["arts", "automobiles", "books", "business", "fashion", "food", "health", "home", "insider",
        "magazine", "movies", "nyregion", "obituaries", "opinion", "politics", "realestate", "science",
        "sports", "sundayreview", "technology", "theater", "t-magazine", "travel", "upshot", "world"];

    //añade las opciones del array de arriba al select para escoger categorías
    for (var i = 0; i < categoriesArray.length; i++) {

        $("<option>").text(categoriesArray[i]).appendTo($("#inputGroupSelect01"));
    }

    $("#inputGroupSelect01").change(function () {

        //elimina la section actual
        $("section").remove();

        var categoria = inputGroupSelect01.value;

        dato = "topstories/v2/" + categoria;
        eleccion = "Top Stories, " + categoria;

        //llama a la función que envia los datos al server
        enviaDatosTopStories(dato);
    });

    /*
    |--------------------------------------------------------------------------
    | función que envia datos a la API (top Stories)
    |--------------------------------------------------------------------------
    */
    function enviaDatosTopStories(dato) {

        //llama a la función que envía datos
        $("#mostrador").text("Searching...");

        var requestURL = "https://api.nytimes.com/svc/" + dato + ".json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        request.onload = function () {
            var data = request.response;
            datosRecibidosTopStories(data);

        };

        request.send();
    }

    /*
    |--------------------------------------------------------------------------
    | función que recibe los datos de la API (top Stories)
    |--------------------------------------------------------------------------
    */
    function datosRecibidosTopStories(data) {

        //Muestro en el título principal lo mostrado
        $("#mostrador").text("- " + eleccion);

        var noticias = data.results;

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

            $("<a>", {"id": "a" + i, "target": "_blank", "href": noticias[i].url}).appendTo($("#noticia" + i));

            //crea un divisor para mostrar fecha publicación y section
            $("<div>", {"id": "divisor" + i, "class": "divisor"}).appendTo($("#a" + i));

            var fechaObtenida = new Date(noticias[i].published_date);
            var fecha = fechaObtenida.toDateString();

            //fecha_pub
            $("<p>").text(fecha).appendTo($("#divisor" + i));

            //section
            $("<p>").text("Category: " + noticias[i].section).appendTo($("#divisor" + i));

            //crea un h3 con el título de la noticia
            $("<h3>").text(noticias[i].title).appendTo($("#a" + i));

            $("<div>", {"id": ("div-imagen" + i), "class": "div-imagen"}).appendTo("#a" + i);

            try {
                $("<img>", {
                    "class": "a-imagen",
                    "src": noticias[i].multimedia[0].url
                }).appendTo("#div-imagen" + i);
            } catch (err) {
                $("<img>", {
                    "class": "a-imagen",
                    "src": "img/404.png"
                }).appendTo("#div-imagen" + i);
            }

            var caption;

            try {
                caption = noticias[i].multimedia[0].caption;
            } catch (err) {
                caption = "";
            }

            //el texto de la foto
            $("<figcaption>").text(caption).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<p>", {"class": "entradilla"}).text(noticias[i].abstract).appendTo($("#a" + i));

            //crea un p con el autor de la noticia
            $("<p>", {"class": "autor"}).text(noticias[i].byline).appendTo($("#a" + i));

            //cada tercera noticia no pone el div vertical pero sí el horizontal
            if (j%3 === 0 || i == noticias.length-1){
                if (i <= noticias.length-2){
                    $("<div>", {"class": "div-horizontal"}).appendTo(section);
                }
            }else{
                $("<div>", {"class": "div-vertical"}).appendTo(section);
            }

            j++;

        }

        //muestra el número de noticias encontradas
        $("#mostrador").text($("#mostrador").text() + " (" + noticias.length + " results) -");
    }

});