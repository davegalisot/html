$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | envia una petición por defecto (Most Popular)
    |--------------------------------------------------------------------------
    */
    var dato = "mostpopular/v2/viewed/1";
    var eleccion = "Most Popular";
    enviaDatos();

    /*
    |--------------------------------------------------------------------------
    | crea botones del menu de la web, MOST POPULAR
    |--------------------------------------------------------------------------
    */
    $("#mostPop").on("click", function () {
        $("section").remove();
        dato = "mostpopular/v2/viewed/1";
        eleccion = "Most Popular";
        enviaDatos();
    });

    /*
    |--------------------------------------------------------------------------
    | crea botones del menu de la web, POST POPULAR LAST 7 DAYS
    |--------------------------------------------------------------------------
    */
    $("#mostPop7").on("click", function () {
        $("section").remove();
        dato = "mostpopular/v2/viewed/7";
        eleccion = "Most Popular, Last 7 days";
        enviaDatos();
    });

    /*
    |--------------------------------------------------------------------------
    | Sección categorías
    |--------------------------------------------------------------------------
    */
    //array con categorias
    var categoriesArray = ["arts", "automobiles", "books", "business", "fashion", "food", "health", "home", "insider",
        "magazine", "movies", "national", "nyregion", "obituaries", "opinion", "politics", "realestate", "science",
        "sports", "sundayreview", "technology", "theater", "tmagazine", "travel", "upshot", "world"];

    //añade las opciones del array de arriba al select para escoger categorías
    for (var i = 0; i < categoriesArray.length; i++) {

        $("<option>").text(categoriesArray[i]).appendTo($("#categories"));
    }

    $("#categories").change(function () {

        $("section").remove();

        var categoria = categories.value;

        dato = "topstories/v2/" + categoria;
        eleccion = "Top Stories, " + categoria;

        console.log("dato: "+dato);
        console.log("elecc: "+eleccion);
        console.log("cat: "+categoria);

        //llama a la función que envia los datos al server
        enviaDatosTopStories();
    });

    function enviaDatos() {

        //Muestro en el título principal lo mostrado
        $("#mostrador").text(eleccion);

        var requestURL = "https://api.nytimes.com/svc/" + dato + ".json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        request.onload = function () {
            var data = request.response;
            datosRecibidos(data);
        };

        request.send();
    }

    function enviaDatosTopStories() {

        //Muestro en el título principal lo mostrado
        $("#mostrador").text(eleccion);

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

    //************************************** EJEMPLOS **************************************
    /*"https://api.nytimes.com/svc/topstories/v2/science.json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";

    "https://api.nytimes.com/svc/mostpopular/v2/viewed/1.json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";*/

    function datosRecibidos(data) {

        var noticias = data.results;

        //obtiene el contenedor principal
        var contenedorPrincipal = document.getElementById("contenedorPrincipal");

        //crea una section para presentar cada noticia
        $("<section>", {"id": "section"}).appendTo(contenedorPrincipal);

        //for para recorrer cada noticia recibida
        for (var i = 0; i < noticias.length; i++) {

            //crea un article por noticia
            $("<article>", {"id": "noticia" + i}).appendTo(section);

            $("<a>", {"id": "a" + i, "href": noticias[i].url}).appendTo($("#noticia" + i));

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

            //crea un DIV y le asigna una imagen de fondo
            $("<div>", {
                "class": "divImagen",
                "style": "background: url('" + noticias[i].media[0]["media-metadata"][2].url + "') no-repeat; background-size:cover"
            }).appendTo($("#a" + i));

            $("<figcaption>").text(noticias[i].media[0].caption).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<p>", {"class": "entradilla"}).text(noticias[i].abstract).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<p>", {"class": "autor"}).text(noticias[i].byline).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<p>", {"id": "views" + i, "style": "text-align:right; margin: 2px 0"}).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<i>", {"class": "fas fa-eye"}).text(" " + noticias[i].views).appendTo($("#views" + i));
        }
    }

    function datosRecibidosTopStories(data) {

        var noticias = data.results;

        //obtiene el contenedor principal
        var contenedorPrincipal = document.getElementById("contenedorPrincipal");

        //crea una section para presentar cada noticia
        $("<section>", {"id": "section"}).appendTo(contenedorPrincipal);

        //for para recorrer cada noticia recibida
        for (var i = 0; i < noticias.length; i++) {

            //crea un article por noticia
            $("<article>", {"id": "noticia" + i}).appendTo(section);

            $("<a>", {"id": "a" + i, "href": noticias[i].url}).appendTo($("#noticia" + i));

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

            //crea un DIV y le asigna una imagen de fondo
            $("<div>", {
                "class": "divImagen",
                "style": "background: url('" + noticias[i].multimedia[3].url + "') no-repeat; background-size:cover"
            }).appendTo($("#a" + i));

            $("<figcaption>").text(noticias[i].media[0].caption).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<p>", {"class": "entradilla"}).text(noticias[i].abstract).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<p>", {"class": "autor"}).text(noticias[i].byline).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<p>", {"id": "views" + i, "style": "text-align:right; margin: 2px 0"}).appendTo($("#a" + i));

            //crea un p con la entradilla de la noticia
            $("<i>", {"class": "fas fa-eye"}).text(" " + noticias[i].views).appendTo($("#views" + i));
        }
    }

});