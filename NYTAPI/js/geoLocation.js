$(document).ready(function () {
    /*
    |--------------------------------------------------------------------------
    | GEOLOCATION
    |--------------------------------------------------------------------------
    */
    //solicita localización
    getLocation();

    //obtiene localización
    function getLocation() {
        navigator.geolocation.getCurrentPosition(enviaDatosGeoLocation);
        navigator.geolocation.watchPosition(function () {

            },
            function (error) {
                if (error.code == error.PERMISSION_DENIED)
                    $("#divTiempo").text("Geolocation is not enabled");
            });
    }


    /*
    |--------------------------------------------------------------------------
    | API OPENWEATHER (tiempo)
    |--------------------------------------------------------------------------
    */

    //envía al servidor los datos de localización
    function enviaDatosGeoLocation(position) {

        var requestURL = "https://api.openweathermap.org/data/2.5/weather?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&APPID=a6ee6410aa83f87221b7ea72233ea33e";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        request.onload = function () {
            var data = request.response;
            datosRecibidosGeolocation(data);
        };

        request.send();
    }

    function datosRecibidosGeolocation(data) {

        $("<div>", {"id": "divTiempo2"}).appendTo($("#divTiempo"));
        $("<div>", {"id": "nombreTiempo"}).appendTo($("#divTiempo2"));
        $("<p>", {"class": "m-0"}).text(data.name).appendTo($("#nombreTiempo"));
        $("<div>", {"id": "imgTiempo"}).appendTo($("#divTiempo2"));
        $("<img class='imgTiempo' src='https://openweathermap.org/img/w/" + data.weather[0].icon + ".png'>").appendTo($("#imgTiempo"));
        $("<div>", {"id": "tempTiempo"}).appendTo($("#divTiempo2"));
        $("<p>", {"class": "m-0"}).text(Math.round(data.main.temp_min - 273.15) + " / " + Math.round(data.main.temp_max - 273.15) + " ºC").appendTo($("#tempTiempo"));
        $("<div>", {"id": "titleTiempo", "class": "hidden"}).appendTo($("#divTiempo2"));
        $("<p>", {"class": "m-0"}).text("OPENWEATHER").appendTo($("#titleTiempo"));

        $("#divTiempo2").click(function () {
            //redirecciona a openweather.org
            window.open(
                'https://openweathermap.org/',
                '_blank'
            );
        });
    }

});