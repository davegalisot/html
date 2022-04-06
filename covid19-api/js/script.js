$(document).ready(function () {
    /*
    |--------------------------------------------------------------------------
    | envia datos a la API por defecto al cargar la página
    |--------------------------------------------------------------------------
    */

    var dataWTotal = null;

    var xhrWTotal = new XMLHttpRequest();
    xhrWTotal.withCredentials = true;

    xhrWTotal.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            // console.log("total: " + this.response);

            var receivedWTotal = JSON.parse(this.response);

            //obtiene el contenedor principal
            var mainContainer = $("#mainCont");

            $("<p>", {"class": "mainPDate"}).text("Last updated").appendTo("#dataLastUpdated");
            $("<p>", {"class":"dataPDate"}).text(new Date(receivedWTotal.statistic_taken_at).toLocaleString()).appendTo("#dataLastUpdated");

            $("<div>", {"id":"worldTotal", "class":"rect"}).appendTo(mainContainer);

            $("<div>", {"id":"wTotalData1", "class": "div1"}).appendTo("#worldTotal");
            // $("<h3>", {"class": "Title"}).text("Total").appendTo("#wTotalData1");

            $("<div>", {"id":"wTotalData2", "class": "div2"}).appendTo("#worldTotal");
            $("<p>", {"class": "mainP"}).text("cases").appendTo("#wTotalData2");
            $("<p>", {"class":"dataP"}).text(receivedWTotal.total_cases).appendTo("#wTotalData2");

            $("<div>", {"id": "wTotalData3", "class": "div3"}).appendTo("#worldTotal");
            $("<p>", {"class": "mainP"}).text("recovered").appendTo("#wTotalData3");
            $("<p>", {"class":"dataP"}).text(receivedWTotal.total_recovered).appendTo("#wTotalData3");

            $("<div>", {"id": "wTotalData4", "class": "div4"}).appendTo("#worldTotal");
            $("<p>", {"class": "mainP"}).text("deaths").appendTo("#wTotalData4");
            $("<p>", {"class":"dataP"}).text(receivedWTotal.total_deaths).appendTo("#wTotalData4");

            /****************************  TODAY (NEW CASES)  *******************************/
            // $("<div>", {"id":"worldToday", "class":"rect"}).appendTo(mainContainer);

            $("<div>", {"id":"wTodayData1", "class": "div1"}).appendTo("#worldToday");
            $("<h3>", {"class": "Title"}).text("today").appendTo("#wTodayData1");

            $("<div>", {"id":"wTodayData2", "class": "div2"}).appendTo("#worldToday");
            $("<p>", {"class": "mainP"}).text("cases").appendTo("#wTodayData2");
            $("<p>", {"class":"dataP"}).text(receivedWTotal.new_cases).appendTo("#wTodayData2");

            $("<div>", {"id": "wTodayData3", "class": "div3"}).appendTo("#worldToday");

            $("<div>", {"id": "wTodayData4", "class": "div4"}).appendTo("#worldToday");
            $("<p>", {"class": "mainP"}).text("deaths").appendTo("#wTodayData4");
            $("<p>", {"class":"dataP"}).text(receivedWTotal.new_deaths).appendTo("#wTodayData4");

            var fecha = new Date(receivedWTotal.statistic_taken_at);
            fecha.setDate(fecha.getDate()-7);
            var ayer = fecha.toLocaleDateString("en-GB").split("/").reverse().join("-");

            var dataWToday = null;

            var xhrWToday = new XMLHttpRequest();
            xhrWToday.withCredentials = true;

            xhrWToday.addEventListener("readystatechange", function () {
                if (this.readyState === this.DONE) {
                    // console.log("today: " + this.response);

                    var receivedWToday = JSON.parse(this.response);

                    var datoTotal = parseFloat(receivedWTotal.total_recovered.replace(/,/g, ''), 10);
                    var datoToday = receivedWToday[0].recovered;

                    console.log("total: " + datoTotal);
                    console.log("today: " + datoToday);

                    if (datoToday == 0) {

                    }
                    var resta = parseFloat(receivedWTotal.total_recovered.replace(/,/g, ''), 10)-(receivedWToday[0].recovered);

                    $("<p>", {"class": "mainP"}).text("recovered").appendTo("#wTodayData3");
                    $("<p>", {"class": "dataP"}).text(resta.toLocaleString("en")).appendTo("#wTodayData3");
                }
            });

            xhrWToday.open("GET", "https://covid-19-data.p.rapidapi.com/report/totals?date-format=YYYY-MM-DD&format=json&date=" + ayer);
            xhrWToday.setRequestHeader("x-rapidapi-host", "covid-19-data.p.rapidapi.com");
            xhrWToday.setRequestHeader("x-rapidapi-key", "828cd71173mshe3c0bd147c478c7p17fd35jsnd703bc3aa8aa");

            xhrWToday.send(dataWToday);

        }

    });

    xhrWTotal.open("GET", "https://coronavirus-monitor.p.rapidapi.com/coronavirus/worldstat.php");
    xhrWTotal.setRequestHeader("x-rapidapi-host", "coronavirus-monitor.p.rapidapi.com");
    xhrWTotal.setRequestHeader("x-rapidapi-key", "828cd71173mshe3c0bd147c478c7p17fd35jsnd703bc3aa8aa");

    xhrWTotal.send(dataWTotal);

    /* DATA BY COUNTRY */
    /* FOR SELECT TAG TO SELECT COUNTRY */
    var dataForSelect = null;

    var xhrForSelect = new XMLHttpRequest();
    xhrForSelect.withCredentials = true;

    xhrForSelect.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            // console.log("forSelect: " + this.response);

            var receivedForSelect = JSON.parse(this.response);

            //accede a los datos recibidos
            var countryList = receivedForSelect.affected_countries;

            function compareStrings(a, b) {
                // Assuming you want case-insensitive comparison
                a = a.toLowerCase();
                b = b.toLowerCase();

                return (a < b) ? -1 : (a > b) ? 1 : 0;
            }

            countryList.sort(function(a, b) {
                return compareStrings(a, b);
            })

            for (var i = 0; i < countryList.length; i++) {
                $("<option>", {"text": countryList[i]}).appendTo($("#inputGroupSelect01"));
            }

            //contador para añadir elementos al mainContainer.
            var contador = 0;

            //array para llevar cuenta de los paises mostrados (para no repetirlos)
            var addedCountries = new Array();

            //coge el valor del select on change
            $("#inputGroupSelect01").change(function () {

                var country = inputGroupSelect01.value;

                /* DATA BY COUNTRY */
                var dataByCountry = null;

                var xhrByCountry = new XMLHttpRequest();
                xhrByCountry.withCredentials = true;

                xhrByCountry.addEventListener("readystatechange", function () {
                    if (this.readyState === this.DONE) {
                        // console.log("byCountry: " + this.response);

                        var receivedData = JSON.parse(this.response);

                        var country = receivedData.latest_stat_by_country[0];

                        var byCountryDate = $("#byCountryDate");

                        if (contador == 1 && byCountryDate.children().length == 0){
                            $("<div>", {"id": "byCountryDate1", "class": "div5"}).appendTo(byCountryDate);
                                $("<p>", {"class": "mainPDate"}).text("Last updated").appendTo("#byCountryDate1");
                                $("<p>", {"class":"dataPDate"}).text(new Date(receivedForSelect.statistic_taken_at).toLocaleString()).appendTo("#byCountryDate1");
                        }

                        //obtiene el contenedor principal
                        var mainContainer = $("#byCountryDiv");

                        var mainDataContainer = "#byCountryTotal" + addedCountries.length;

                        if (!addedCountries.includes(receivedData.country)){
                            $("<div>", {"id": ("byCountryTotal" + addedCountries.length), "class":"rect"}).appendTo(mainContainer);

                            $("<div>", {"id": ("byCountryData1" + addedCountries.length), "class": "div1"}).appendTo(mainDataContainer);
                            $("<h3>", {"class": "Title"}).text(receivedData.country).appendTo("#byCountryData1" + addedCountries.length);

                            $("<div>", {"id": ("byCountryData2" + addedCountries.length), "class": "div2"}).appendTo(mainDataContainer);
                            $("<p>", {"class": "mainP"}).text("cases").appendTo("#byCountryData2" + addedCountries.length);
                            $("<p>", {"class":"dataP"}).text(country.total_cases ? country.total_cases : "N/A").appendTo("#byCountryData2" + addedCountries.length);

                            $("<div>", {"id": ("byCountryData3" + addedCountries.length), "class": "div3"}).appendTo(mainDataContainer);
                            $("<p>", {"class": "mainP"}).text("recovered").appendTo("#byCountryData3" + addedCountries.length);
                            $("<p>", {"class":"dataP"}).text(country.total_recovered ? country.total_recovered : "N/A").appendTo("#byCountryData3" + addedCountries.length);

                            $("<div>", {"id": ("byCountryData4" + addedCountries.length), "class": "div4"}).appendTo(mainDataContainer);
                            $("<p>", {"class": "mainP"}).text("deaths").appendTo("#byCountryData4" + addedCountries.length);
                            $("<p>", {"class":"dataP"}).text(country.total_deaths ? country.total_deaths : "N/A").appendTo("#byCountryData4" + addedCountries.length);

                            $("<div>", {"id": ("byCountryData5" + addedCountries.length), "class": "div5"}).appendTo(mainDataContainer);
                            $("<button>", {"id": "clearThisDataButton", "class": "btn btn-outline-secondary", "type": "button"}).text("Remove").click(function () {
                                //elimina la section actual
                                $("#byCountryTotal" + addedCountries.length + " *").remove();
                            }).appendTo("#byCountryData5" + contador);

                            addedCountries.push(receivedData.country);
                        }

                        if (addedCountries.length == 0) {
                            $("#clearDataButtonDiv *").remove();
                        }

                        $("<div>", {"id": "clearDataButtonDiv", "class": "input-group-append"}).appendTo("#clearButton");
                        $("<button>", {"id": "clearDataButton", "class": "btn btn-outline-secondary", "type": "button"}).text("Remove All").click(function () {
                            //elimina la section actual
                            $("#byCountryDiv *").remove();
                            $("#clearDataButtonDiv *").remove();
                            addedCountries = [];
                        }).appendTo("#clearDataButtonDiv");
                    }
                });

                xhrByCountry.open("GET", "https://coronavirus-monitor.p.rapidapi.com/coronavirus/latest_stat_by_country.php?country=" + country);
                xhrByCountry.setRequestHeader("x-rapidapi-host", "coronavirus-monitor.p.rapidapi.com");
                xhrByCountry.setRequestHeader("x-rapidapi-key", "828cd71173mshe3c0bd147c478c7p17fd35jsnd703bc3aa8aa");

                xhrByCountry.send(dataByCountry);
            });
        }
    });

    xhrForSelect.open("GET", "https://coronavirus-monitor.p.rapidapi.com/coronavirus/affected.php");
    xhrForSelect.setRequestHeader("x-rapidapi-host", "coronavirus-monitor.p.rapidapi.com");
    xhrForSelect.setRequestHeader("x-rapidapi-key", "828cd71173mshe3c0bd147c478c7p17fd35jsnd703bc3aa8aa");

    xhrForSelect.send(dataForSelect);

});