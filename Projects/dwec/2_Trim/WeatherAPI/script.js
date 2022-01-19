$(document).ready(function () {

    //obtiene el tag del elemento a través de su id
    var info = document.getElementById("info");

    //array con los valores para escoger en el SELECT
    var arrayCiudades = ["Madrid", "Barcelona", "San José", "Nueva York"];

    //inicialización de variables
    var option, texto;

    //for para rellenar los option del SELECT
    for (var i = 0; i < arrayCiudades.length; i++) {
        option = document.createElement("option");
        texto = document.createTextNode(arrayCiudades[i]);
        option.appendChild(texto);
        info.appendChild(option);
    }

    info.addEventListener("change", enviaDatos);

    function enviaDatos() {

        var ciudad = info.value;
        var ciudadPais;
        switch (ciudad) {
            case "Madrid":
                ciudadPais = "Madrid,es";
                break;
            case "Barcelona":
                ciudadPais = "Barcelona,es";
                break;
            case "San José":
                ciudadPais = "San José,us";
                break;
            case "Nueva York":
                ciudadPais = "New York,us";
                break;
        }

        console.log(ciudad);

        var requestURL = "http://api.openweathermap.org/data/2.5/weather?q=" + ciudadPais + "&APPID=37151540627b1babb7fb64df17775261";

        var request = new XMLHttpRequest();
        request.open('GET', requestURL);
        request.responseType = 'json';

        request.onload = function () {
            var weatherData = request.response;
            datosRecibidos(weatherData);
        };

        request.send();
    }

    function datosRecibidos(wD) {
        var KelvinToCelsius = "273.15";
        var pais = wD.sys.country;

        document.getElementById("name").innerHTML = "Hoy en " + wD.name;
        document.getElementById("flag").src = "img/flags/" + pais + ".png";
        document.getElementById("h2").innerText = Math.round(wD.main.temp-KelvinToCelsius) + "ºC";

        var icon = wD.weather[0].icon;
        var table = document.getElementById("table");
        var tr = document.createElement("tr");

        document.getElementById("icon").src = "img/" + icon + ".png";

        table.appendChild(tr);

        td = document.createElement("td");
        td2 = document.createElement("td");

        td.textContent = "Presión";
        td2.textContent = wD.main.pressure/1000 + "bar";

        tr.appendChild(td);
        tr.appendChild(td2);
    }

});