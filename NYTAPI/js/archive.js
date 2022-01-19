$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Selección año
    |--------------------------------------------------------------------------
    */
    var archiveYear, archiveMonth;
    //for para mostrar los años en el selector
    for (var i = 2020; i > 1851; i--) {
        //rellena los options
        $("<option>").text(i).appendTo($("#inputGroupSelect02"));
    }
    //coge el valor del select on change
    $("#inputGroupSelect02").change(function () {
        archiveYear = inputGroupSelect02.value;
    });

    /*
    |--------------------------------------------------------------------------
    | Selección mes
    |--------------------------------------------------------------------------
    */
    //array con meses
    //añade las opciones del array de arriba al select para escoger categorías
    for (var i = 1; i <= 12; i++) {

        $("<option>").text(i).appendTo($("#inputGroupSelect03"));
    }
    //coge el valor del select on change
    $("#inputGroupSelect03").change(function () {
        //elimina los hijos de section y a section
        $("section").remove();

        archiveMonth = inputGroupSelect03.value;

        meses = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        dato = archiveYear + "/" + archiveMonth;
        eleccion = "Archive, Year: " + archiveYear + ", Month: " + meses[archiveMonth-1];

        //llama a la función que envia los datos al server
        enviaDatosArchive(dato);
    });

    /*
    |--------------------------------------------------------------------------
    | función que envia datos a la API (Archive)
    |--------------------------------------------------------------------------
    */
    function enviaDatosArchive(dato) {

        //llama a la función que envía datos
        $("#mostrador").text("Searching... (this may take some time)");

        var requestURL = "https://api.nytimes.com/svc/archive/v1/" + dato + ".json?api-key=69WVGg7OHdrpZCDd97KCnGlFvARE7br8";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        if (request.status == "200"){

            request.onload = function () {
                var data = request.response;
                datosRecibidosTopStories(data);

            };

        }else{
            console.log("There was an error retrieving requested data");
            //Muestro en el título principal lo mostrado
            $("#mostrador").text("There was an error retrieving requested data, loading Most Popular...");
            setTimeout(function (){
                $("#mostPop").click();
            }, 4000);
        }

        request.send();
    }

    /*
    |--------------------------------------------------------------------------
    | función que recibe los datos de la API (Archive)
    |--------------------------------------------------------------------------
    */
    function datosRecibidosTopStories(data) {

        if (data == null || data == ""){

            //Muestro en el título principal lo mostrado
            $("#mostrador").text("There was an error retrieving requested data");

        }else{
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

                $("<a>", {"id": "a" + i, "target": "_blank", "href": noticias[i].web_url}).appendTo($("#noticia" + i));

                //crea un divisor para mostrar fecha publicación y section
                $("<div>", {"id": "divisor" + i, "class": "divisor"}).appendTo($("#a" + i));

                var fechaObtenida = new Date(noticias[i].pub_date);
                var fecha = fechaObtenida.toDateString();

                //fecha_pub
                $("<p>").text(fecha).appendTo($("#divisor" + i));

                var category = "none";
                try {
                    category = noticias[i].news_desk;
                } catch (err) {
                    category = "none";
                }

                //section
                $("<p>").text("Category: " + category).appendTo($("#divisor" + i));

                //crea un h3 con el título de la noticia
                $("<h3>").text(noticias[i].headline.main).appendTo($("#a" + i));

                var imagenURL;
                try {
                    imagenURL = "https://static01.nyt.com/" + noticias[i].multimedia[0].url;
                } catch (err) {
                    imagenURL = "img/404.png";
                }

                //crea un DIV y le asigna una imagen de fondo
                $("<div>", {
                    "class": "div-imagen",
                    "style": "background: url('" + imagenURL + "') no-repeat; background-size:cover"
                }).appendTo($("#a" + i));

                //crea un p con la entradilla de la noticia
                $("<p>", {"class": "entradilla"}).text(noticias[i].snippet).appendTo($("#a" + i));

                var autor;
                try {
                    autor = noticias[i].byline.original;
                } catch (err) {
                    autor = "NO AUTHOR";
                }
                //crea un p con el autor de la noticia
                $("<p>", {"class": "autor"}).text(autor).appendTo($("#a" + i));

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

    }


    /*
    |--------------------------------------------------------------------------
    | función que envia datos a la API (Archive)
    |--------------------------------------------------------------------------
    */

    $("#api-test").click(function (){
        var requestURL = "https://api.nytimes.com/svc/archive/v1/2019/1.json?api-key=69WVGg7OHdrpZCDd97KCnGlFvARE7br8";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';
        var my_header = request.getAllResponseHeaders();
        console.log(my_header)

        if (request.status == "200"){

            request.onload = function () {
                var data = request.response;
                datosRecibidosTopStories(data);
                console.log(my_header);
            };

        }else{
            console.log("There was an error retrieving requested data");
            //Muestro en el título principal lo mostrado
            $("#mostrador").text("There was an error retrieving requested data, loading Most Popular...");
            setTimeout(function (){
                $("#mostPop").click();
            }, 4000);
        }

        request.send();
    });


});