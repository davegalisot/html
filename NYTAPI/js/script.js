var temaUsado;

$(document).ready(function () {
    //************************************** EJEMPLOS **************************************
    /*

    https://api.nytimes.com/svc/topstories/v2/science.json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V

    https://api.nytimes.com/svc/mostpopular/v2/viewed/1.json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V

    https://api.nytimes.com/svc/search/v2/articlesearch.json?q=election&api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V

    get list of books categories
    https://api.nytimes.com/svc/books/v3/lists/names.json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V

    */

    /***************** THEME CHANGER *****************/

    function setTheme(themeName) {
        localStorage.setItem('theme', themeName);
        document.documentElement.className = themeName;
        temaUsado = themeName;
    }

    // function to toggle between light and dark theme
    $(".theme-changer-input").click(function () {
        if (localStorage.getItem('theme') === 'theme-dark') {
            setTheme('theme-light');
            document.getElementById('slider').checked = true;
            $.each($(".a-imagen"), function (){
                var imagen = $(this).attr("src");
                if (imagen == "img/404-negro.png"){
                    $(this).attr("src","img/404.png");
                }
            });
        } else {
            setTheme('theme-dark');
            document.getElementById('slider').checked = false;
            $.each($(".a-imagen"), function (){
                var imagen = $(this).attr("src");
                if (imagen == "img/404.png"){
                    $(this).attr("src","img/404-negro.png");
                }
            });
        }
    });

    // Immediately invoked function to set the theme on initial load
    (function () {
        if (localStorage.getItem('theme') === 'theme-dark') {
            setTheme('theme-dark');
            document.getElementById('slider').checked = false;
        } else {
            setTheme('theme-light');
            document.getElementById('slider').checked = true;
        }
    })();

    /***************** COOKIES *****************/

    var cookies_accepted = false;

    checkCookie_eu();


    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";

        //botón subir al principio de la página
        // When the user scrolls down 20px from the top of the document, show the button
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            $("#btn-go-to-top").css({"bottom": "171px"});
            // $(".progress-container, .progress-bar").css("height", "6px");
            if (!cookies_accepted){
                $("#cookies").css("bottom", 0);
            }
        } else {
            $("#btn-go-to-top").css({"bottom": "-60px"});
            // $(".progress-container, .progress-bar").css("height", "2px");
            if (!cookies_accepted){
                $("#cookies").css("bottom", 0);
            }
        }

    }

    // When the user clicks on the button, scroll to the top of the document
    $("#btn-go-to-top").click(function() {
        $('html,body').animate({scrollTop: 0}, "slow");
    });

    function checkCookie_eu() {
        var consent = getCookie_eu("cookies_consent");
        if (consent == null || consent == "" || consent == undefined){
            //show notification bar
            $("#cookies").css({"bottom": 0});
            cookies_accepted = false;
        }else{
            cookies_accepted = true;
        }
    }

    function setCookie_eu(cname, cvalue, exdays){
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

        $("#cookies").css({"bottom": "-100px"});
        cookies_accepted = true;
        setTimeout(function (){
            $("#cookies").remove()
        }, 500);
    }

    function getCookie_eu(cname){
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++){
            var c = ca[i];
            while (c.charAt(0) == ' '){
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0){
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    $("#cookie-accept").click(function(){
        setCookie_eu("cookies_consent", 1, 30);
        $("cookies").remove();
        cookies_accepted = true;
    });

    /*
    |--------------------------------------------------------------------------
    | envia una petición por defecto (Most Popular las 14 days)
    |--------------------------------------------------------------------------
    */
    //variable que almacena
    var dato = "mostpopular/v2/viewed/1";

    //muestra en pantalla la seleccion
    var eleccion = "Most Popular";

    //llama a la funcion que envia los datos a la API
    enviaDatos(dato);

    /*
    |--------------------------------------------------------------------------
    | crea botones del menu de la web, MOST POPULAR TODAY
    |--------------------------------------------------------------------------
    */
    //crea un boton en el NAV
    $("#mostPop").on("click", function () {

        $("section").remove();

        dato = "mostpopular/v2/viewed/1";
        eleccion = "Most Popular today";

        enviaDatos(dato);
    });

    /*
    |--------------------------------------------------------------------------
    | crea botones del menu de la web, POST POPULAR LAST 7 DAYS
    |--------------------------------------------------------------------------
    */
    //crea un boton en el NAV
    $("#mostPop7").on("click", function () {

        $("section").remove();

        dato = "mostpopular/v2/viewed/7";
        eleccion = "Most Popular this Week";

        enviaDatos(dato);
    });

    /*
    |--------------------------------------------------------------------------
    | función que envia datos a la API para BOOKS
    |--------------------------------------------------------------------------
    */
    //funcion que envia datos a la API
    function enviaDatos(dato) {

        //llama a la función que envía datos
        $("#mostrador").text("Searching...");

        //URL que se envia a la API
        var requestURL = "https://api.nytimes.com/svc/" + dato + ".json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";

        //Request ajax
        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        //Acción al recibir datos de la API
        request.onload = function () {
            //alamacena los datos en la variable
            var data = request.response;
            //llama a al funcion y le pasa los datos
            datosRecibidos(data);
        };

        //envia la peticion AJAX con los datos anteriores
        request.send();

        //URL con lista de categorías de Best Sellers de libros
        var requestBSBooksURL = "https://api.nytimes.com/svc/books/v3/lists/names.json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";

        //Request ajax con datos de BSBooks
        var requestBSBooks = new XMLHttpRequest();
        requestBSBooks.open('GET', requestBSBooksURL);
        requestBSBooks.responseType = 'json';

        //Acción al recibir datos BSBooks de la API
        requestBSBooks.onload = function () {
            //alamacena los datos en la variable
            var dataBSBooks = requestBSBooks.response;
            //llama a al funcion y le pasa los datos
            datosRecibidosBSBooks(dataBSBooks);
        };

        //envía la petición de BSBooks AJAX con los datos anteriores
        requestBSBooks.send();

    }

    /*
    |--------------------------------------------------------------------------
    | función que recibe los datos de la API (Request 1)
    |--------------------------------------------------------------------------
    */
    //recibe los datos de data
    function datosRecibidos(data) {

        //Muestro en el título principal lo mostrado
        $("#mostrador").text("- " + eleccion + " -");

        //accede a los datos recibidos
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

            $("<a>", {"id": "a" + i, "target": "_blank", "href": noticias[i].url}).appendTo("#noticia" + i)
                .hover(
                    function (){
                        if (localStorage.getItem('theme') === 'theme-dark') {
                            if ($(this).find("img").attr("src") !== "img/404-negro.png"){
                                $(this).find(".source").css({"opacity":1, "transform":"rotateX(0deg)"});
                            }
                        } else {
                            if ($(this).find("img").attr("src") !== "img/404.png"){
                                $(this).find(".source").css({"opacity":1, "transform":"rotateX(0deg)"});
                            }
                        }
                    },
                    function (){
                        $(".source").css({"opacity":0, "transform":"rotateX(90deg)"});
                    });

            //crea un divisor para mostrar fecha publicación y section
            $("<div>", {"id": "divisor" + i, "class": "divisor"}).appendTo("#a" + i);

            var fechaObtenida = new Date(noticias[i].published_date);
            var fecha = fechaObtenida.toDateString();

            //fecha_pub
            $("<p>").text(fecha).appendTo("#divisor" + i);

            $("<p>", {"id": "cat" + i}).text("Category: " + noticias[i].section).appendTo("#divisor" + i);

            //span
            if (noticias[i].subsection != ""){
                $("<span>").text(" - " + noticias[i].subsection).appendTo("#cat" + i);
            }

            //crea un h3 con el título de la noticia
            $("<h3>").text(noticias[i].title).appendTo("#a" + i);

            $("<div>", {"id": ("div-imagen" + i), "class": "div-imagen"}).appendTo("#a" + i);

            try {
                $("<img>", {
                    "class": "a-imagen",
                    "src": noticias[i].media[0]["media-metadata"][2].url
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

            $("<p>", {"class": "source"}).text("Source: " + noticias[i].source).appendTo("#a" + i);

            try {
                $("<p>", {"class":"under-fig"}).text("source: " + noticias[i].media[0].copyright).appendTo("#a" + i);
            } catch (err) {
                console.log("copyright not found (" + i + ")");
            }

            try {
                $("<figcaption>", {"id":"fig" + i, "class": "figcap"}).text(noticias[i].media[0].caption).appendTo("#a" + i);
            } catch (err) {
                console.log("figcaption not found (" + i + ")");
            }

            //crea un p con la entradilla de la noticia
            $("<p>", {"class": "entradilla"}).text(noticias[i].abstract).appendTo("#a" + i);

            //crea un p con el autor de la noticia
            $("<p>", {"class": "autor"}).text(noticias[i].byline).appendTo("#a" + i);

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
        $("#mostrador").text($("#mostrador").text() + " (" + noticias.length + " results)");
    }

    /*
    |--------------------------------------------------------------------------
    | función que recibe los datos de la API (Request BSBooks)
    |--------------------------------------------------------------------------
    */
    //recibe los datos de data
    function datosRecibidosBSBooks(dataBSBooks) {

        //accede a los datos recibidos
        var listaCategorías = dataBSBooks.results;

        listaCategorías.sort(function(a, b) {
            a = a.list_name.toLowerCase();
            b = b.list_name.toLowerCase();

            return a < b ? -1 : a > b ? 1 : 0;
        })

        for (var i = 0; i < listaCategorías.length; i++) {
            $("<option>", {
                "value": listaCategorías[i].list_name_encoded,
                "text": listaCategorías[i].list_name
            }).appendTo($("#inputGroupSelect04"));
        }

        $("#inputGroupSelect04").change(function () {

            var categoria = inputGroupSelect04.value;
            var texto = $("#inputGroupSelect04 option:selected").text();

            dato = categoria;
            eleccion = "Best Seller Books, " + texto;

            //llama a la función que envia los datos al server
            enviaDatosLBSBooks(dato);
        });

    }

    /*
    |------------------------------------------------------------------------------------------
    | función que envia datos a la API con la categoría de la lista de Best Sellers de Libros
    |------------------------------------------------------------------------------------------
    */
    function enviaDatosLBSBooks(dato) {

        //llama a la función que envía datos
        $("#mostrador").text("Searching...");

        var requestURL = "https://api.nytimes.com/svc/books/v3/lists/current/" + dato + ".json?api-key=LT94VGilZlx3IWZTLzsRhfQge727qk0V";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        request.onload = function () {
            var data = request.response;
            datosRecibidosLBSBooks(data);

        };

        request.send();
    }

    /*
    |--------------------------------------------------------------------------
    | función que recibe los datos de la API (Request Categoria Lista Best Sellers Books)
    |--------------------------------------------------------------------------
    */
    //recibe los datos de data
    function datosRecibidosLBSBooks(data) {

        //Muestro en el título principal lo mostrado
        $("#mostrador").text("- " + eleccion + " -");

        //elimina la section actual
        $("section").remove();

        //accede a los datos recibidos
        var libros = data.results.books;

        //obtiene el contenedor principal
        var contenedorPrincipal = document.getElementById("contenedorPrincipal");

        //crea una section para presentar cada noticia
        $("<section>", {"id": "section", "class": "libros"}).appendTo(contenedorPrincipal);

        //variable para separadores
        var j = 1;
        //for para recorrer cada noticia recibida
        for (var i = 0; i < libros.length; i++) {

            //crea un article por noticia
            $("<article>", {"id": "libro" + i}).appendTo(section);

            $("<a>", {"id": "a" + i, "target": "_blank", "href": libros[i].amazon_product_url}).appendTo($("#libro" + i));

            //crea un divisor para mostrar fecha publicación y section
            $("<div>", {"id": "divisor" + i, "class": "divisor"}).appendTo($("#a" + i));

            //fecha_pub
            $("<p>", {"class":"rank"}).text(libros[i].rank).appendTo($("#divisor" + i));

            //section
            var num = libros[i].weeks_on_list;

            if (num > 0) {
                $("<p>").text("Weeks on list: " + libros[i].weeks_on_list).appendTo($("#divisor" + i));
            }else{
                $("<p>").text("First Week on List").appendTo($("#divisor" + i));
            }

            $("<div>", {
                "id":"divImgLibro" + i,
                "class":"divImagenLibro"
            }).appendTo($("#a" + i));

            //crea una IMG y le asigna un src
            $("<img>", {"src": libros[i].book_image}).appendTo($("#divImgLibro" + i));

            //Publicador del libro
            $("<figcaption>", {"class":"publisher"}).text("Publisher: " + libros[i].publisher).appendTo($("#a" + i));

            //crea un h3 con el título de la noticia
            $("<h3>", {"class":"h3Libro"}).text(libros[i].title).appendTo($("#a" + i));

            //crea un p con una breve descripción del libro
            $("<p>", {"class": "entradilla"}).text(libros[i].description).appendTo($("#a" + i));

            //crea un p con el autor del libro
            $("<p>", {"class": "autor autorLibro"}).text("Author: " + libros[i].author).appendTo($("#a" + i));

            //COMENTADO PORQUE EL NYT YA NO DEVUELVE EN EL JSON EL N DE VIEWS
            //crea un p con las visitas de la noticia
            // $("<p>", {"id": "views" + i, "style": "text-align:right; margin: 2px 0"}).appendTo($("#a" + i));

            //crea un icono para las visitas de la noticia
            // $("<i>", {"class": "fas fa-eye"}).text(" " + noticias[i].views).appendTo($("#views" + i));

            //cada tercera noticia no pone el div vertical pero sí el horizontal
            if (j%6 === 0 || i == libros.length-1){
                if (i <= libros.length-2){
                    $("<div>", {"class": "div-horizontal"}).appendTo(section);
                }
            }else{
                $("<div>", {"class": "div-vertical"}).appendTo(section);
            }

            j++;
        }

        //muestra el número de noticias encontradas
        $("#mostrador").text($("#mostrador").text() + " (" + libros.length + " results)");
    }

    /*
    |--------------------------------------------------------------------------
    | Reloj
    |--------------------------------------------------------------------------
    */
    function reloj(valor) {
        var tiempo = new Date();

        var opciones = {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZoneName: 'short',
            hour: 'numeric', minute: 'numeric', second: 'numeric'
        };

        document.getElementById(valor).innerHTML = tiempo.toLocaleDateString("en-US", opciones);

    }

    setInterval(reloj, 1000, "reloj");


});