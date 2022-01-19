$(document).ready(function () {

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const id = entry.target.getAttribute('id');
            if (entry.intersectionRatio > 0) {
                document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.add('active');
            } else {
                document.querySelector(`nav li a[href="#${id}"]`).parentElement.classList.remove('active');
            }
        });
    });

    // Track all sections that have an `id` applied
    document.querySelectorAll('section[id]').forEach((section) => {
        observer.observe(section);
    });

    /*
    |--------------------------------------------------------------------------
    | envia datos a la API por defecto al cargar la página
    |--------------------------------------------------------------------------
    */

    var data = null;

    var xhr = new XMLHttpRequest();
    // xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            // console.log("data: " + this.response);

            var received_data = JSON.parse(this.response);

            var contSpain = contEng = contGer = contIta = contPort = contOther = 0;

            for (var i = 0; i < received_data.length; i++) {

                var mainCont, cont, competition;

                if (received_data[i].competition.name.includes("SPAIN")) {

                    contSpain++;
                    $("#span-spain").text(" (" + contSpain + ")");

                    $("#spain-data h3").remove();

                    mainCont = $("#spain-data");
                    cont = "#spain-cont-" + i;
                    $("<div>", {"id": ("spain-cont-" + i), "class": "rect"}).appendTo(mainCont);
                    $(cont).append(received_data[i].videos[0].embed);
                    $(cont).children().css({"height": "160px", "width": "350px"});
                    $("<p>", {"class": "mainP", "id": ("partido-" + i)}).appendTo(cont);
                    $("<a>", {"href": received_data[i].side1.url, "target": "_blank"}).text(received_data[i].side1.name).appendTo("#partido-" + i);
                    $("<span>").text(" - ").appendTo("#partido-" + i);
                    $("<a>", {"href": received_data[i].side2.url, "target": "_blank"}).text(received_data[i].side2.name).appendTo("#partido-" + i);
                    $("<div>", {"id": ("spain-div2-" + i), "class": "div2"}).appendTo(cont);
                    
                    competition = received_data[i].competition.name.substr(7);
                    $("<a>", {"id": ("spain-comp-a-" + i), "class": "comp-a", "href": received_data[i].competition.url, "target": "_blank"}).text(competition).appendTo("#spain-div2-" + i);
                    $("<p>", {"class": "fecha-vid"}).text(new Date(received_data[i].date).toLocaleDateString() + " - " + new Date(received_data[i].date).toLocaleTimeString() + "h").appendTo("#spain-div2-" + i);
                    
                }else if (received_data[i].competition.name.includes("ENGLAND")) {

                    contEng++;
                    $("#span-england").text(" (" + contEng + ")");

                    $("#england-data h3").remove();

                    mainCont = $("#england-data");
                    cont = "#england-cont-" + i;
                    $("<div>", {"id": ("england-cont-" + i), "class": "rect"}).appendTo(mainCont);
                    $(cont).append(received_data[i].videos[0].embed);
                    $(cont).children().css({"height": "160px", "width": "350px"});
                    $("<p>", {"class": "mainP", "id": ("partido-" + i)}).appendTo(cont);
                    $("<a>", {"href": received_data[i].side1.url, "target": "_blank"}).text(received_data[i].side1.name).appendTo("#partido-" + i);
                    $("<span>").text(" - ").appendTo("#partido-" + i);
                    $("<a>", {"href": received_data[i].side2.url, "target": "_blank"}).text(received_data[i].side2.name).appendTo("#partido-" + i);
                    $("<div>", {"id": ("england-div2-" + i), "class": "div2"}).appendTo(cont);
                    
                    competition = received_data[i].competition.name.substr(9);
                    $("<a>", {"id": ("england-comp-a-" + i), "class": "comp-a", "href": received_data[i].competition.url, "target": "_blank"}).text(competition).appendTo("#england-div2-" + i);
                    $("<p>", {"class": "fecha-vid"}).text(new Date(received_data[i].date).toLocaleDateString() + " - " + new Date(received_data[i].date).toLocaleTimeString() + "h").appendTo("#england-div2-" + i);
                    
                }else if (received_data[i].competition.name.includes("GERMANY")) {

                    contGer++;
                    $("#span-germany").text(" (" + contGer + ")");

                    $("#germany-data h3").remove();

                    mainCont = $("#germany-data");
                    cont = "#germany-cont-" + i;
                    $("<div>", {"id": ("germany-cont-" + i), "class": "rect"}).appendTo(mainCont);
                    $(cont).append(received_data[i].videos[0].embed);
                    $(cont).children().css({"height": "160px", "width": "350px"});
                    $("<p>", {"class": "mainP", "id": ("partido-" + i)}).appendTo(cont);
                    $("<a>", {"href": received_data[i].side1.url, "target": "_blank"}).text(received_data[i].side1.name).appendTo("#partido-" + i);
                    $("<span>").text(" - ").appendTo("#partido-" + i);
                    $("<a>", {"href": received_data[i].side2.url, "target": "_blank"}).text(received_data[i].side2.name).appendTo("#partido-" + i);
                    $("<div>", {"id": ("germany-div2-" + i), "class": "div2"}).appendTo(cont);
                    
                    competition = received_data[i].competition.name.substr(9);
                    $("<a>", {"id": ("germany-comp-a-" + i), "class": "comp-a", "href": received_data[i].competition.url, "target": "_blank"}).text(competition).appendTo("#germany-div2-" + i);
                    $("<p>", {"class": "fecha-vid"}).text(new Date(received_data[i].date).toLocaleDateString() + " - " + new Date(received_data[i].date).toLocaleTimeString() + "h").appendTo("#germany-div2-" + i);
                    
                }else if (received_data[i].competition.name.includes("ITALY")) {

                    contIta++;
                    $("#span-italy").text(" (" + contIta + ")");

                    $("#italy-data h3").remove();

                    mainCont = $("#italy-data");
                    cont = "#italy-cont-" + i;
                    $("<div>", {"id": ("italy-cont-" + i), "class": "rect"}).appendTo(mainCont);
                    $(cont).append(received_data[i].videos[0].embed);
                    $(cont).children().css({"height": "160px", "width": "350px"});
                    $("<p>", {"class": "mainP", "id": ("partido-" + i)}).appendTo(cont);
                    $("<a>", {"href": received_data[i].side1.url, "target": "_blank"}).text(received_data[i].side1.name).appendTo("#partido-" + i);
                    $("<span>").text(" - ").appendTo("#partido-" + i);
                    $("<a>", {"href": received_data[i].side2.url, "target": "_blank"}).text(received_data[i].side2.name).appendTo("#partido-" + i);
                    $("<div>", {"id": ("italy-div2-" + i), "class": "div2"}).appendTo(cont);
                    
                    competition = received_data[i].competition.name.substr(7);
                    $("<a>", {"id": ("italy-comp-a-" + i), "class": "comp-a", "href": received_data[i].competition.url, "target": "_blank"}).text(competition).appendTo("#italy-div2-" + i);
                    $("<p>", {"class": "fecha-vid"}).text(new Date(received_data[i].date).toLocaleDateString() + " - " + new Date(received_data[i].date).toLocaleTimeString() + "h").appendTo("#italy-div2-" + i);
                    
                }else if (received_data[i].competition.name.includes("PORTUGAL")) {

                    contPort++;
                    $("#span-portugal").text(" (" + contPort + ")");

                    $("#portugal-data h3").remove();
                    
                    mainCont = $("#portugal-data");
                    cont = "#portugal-cont-" + i;
                    $("<div>", {"id": ("portugal-cont-" + i), "class": "rect"}).appendTo(mainCont);
                    $(cont).append(received_data[i].videos[0].embed);
                    $(cont).children().css({"height": "160px", "width": "350px"});
                    $("<p>", {"class": "mainP", "id": ("partido-" + i)}).appendTo(cont);
                    $("<a>", {"href": received_data[i].side1.url, "target": "_blank"}).text(received_data[i].side1.name).appendTo("#partido-" + i);
                    $("<span>").text(" - ").appendTo("#partido-" + i);
                    $("<a>", {"href": received_data[i].side2.url, "target": "_blank"}).text(received_data[i].side2.name).appendTo("#partido-" + i);
                    $("<div>", {"id": ("portugal-div2-" + i), "class": "div2"}).appendTo(cont);

                    competition = received_data[i].competition.name.substr(10);
                    $("<a>", {"id": ("portugal-comp-a-" + i), "class": "comp-a", "href": received_data[i].competition.url, "target": "_blank"}).text(competition).appendTo("#portugal-div2-" + i);
                    $("<p>", {"class": "fecha-vid"}).text(new Date(received_data[i].date).toLocaleDateString() + " - " + new Date(received_data[i].date).toLocaleTimeString() + "h").appendTo("#portugal-div2-" + i);
                    
                }else{

                    contOther++;
                    $("#span-other").text(" (" + contOther + ")");

                    $("#other-data h3").remove();
                    
                    mainCont = $("#other-data");
                    cont = "#other-cont-" + i;
                    $("<div>", {"id": ("other-cont-" + i), "class": "rect"}).appendTo(mainCont);
                    $(cont).append(received_data[i].videos[0].embed);
                    $(cont).children().css({"height": "160px", "width": "350px"});
                    $("<p>", {"class": "mainP", "id": ("partido-" + i)}).appendTo(cont);
                    $("<a>", {"href": received_data[i].side1.url, "target": "_blank"}).text(received_data[i].side1.name).appendTo("#partido-" + i);
                    $("<span>").text(" - ").appendTo("#partido-" + i);
                    $("<a>", {"href": received_data[i].side2.url, "target": "_blank"}).text(received_data[i].side2.name).appendTo("#partido-" + i);
                    $("<div>", {"id": ("other-div2-" + i), "class": "div2"}).appendTo(cont);
                    $("<a>", {"id": ("other-comp-a-" + i), "class": "comp-a", "href": received_data[i].competition.url, "target": "_blank"}).text(received_data[i].competition.name).appendTo("#other-div2-" + i);
                    $("<p>", {"class": "fecha-vid"}).text(new Date(received_data[i].date).toLocaleDateString() + " - " + new Date(received_data[i].date).toLocaleTimeString() + "h").appendTo("#other-div2-" + i);
                    
                }

            }

        }

    });

    xhr.open("GET", "https://free-football-soccer-videos.p.rapidapi.com/");
    xhr.setRequestHeader("x-rapidapi-host", "free-football-soccer-videos.p.rapidapi.com");
    xhr.setRequestHeader("x-rapidapi-key", "828cd71173mshe3c0bd147c478c7p17fd35jsnd703bc3aa8aa");

    xhr.send(data);

});