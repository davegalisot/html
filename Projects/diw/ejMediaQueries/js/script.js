$(document).ready(function () {

    var menu = document.getElementById("nav");
    var navDiv = document.createElement("div");
    var ul = document.createElement("ul");
    menu.appendChild(navDiv);
    navDiv.appendChild(ul);

    for (var i = 1; i <= 8; i++){
        var li = document.createElement("li");
        var texto = document.createTextNode("item " + i);
        li.appendChild(texto);
        ul.appendChild(li);
    }

    var section = document.getElementById("section");

    var titles = ["Neo", "Morpheus", "Trinity", "Cypher", "Agent Smith", "Oracle", "Tank", "Mouse"];
    var actors = ["Keanu Reeves", "Lawrence Fishburne", "Carrie-Anne Moss", "Joe Pantoliano", "Hugo Weaving",
        "Gloria Foster", "Marcus Chong", "Matt Doran"];

    var fotos = ["KReeves", "LFishbourne", "CAMoss", "JPantoliano", "HWeaving", "GFoster", "MChong", "MDoran"];

    var textoPersonajes = [
        "Keanu Charles Reeves, whose first name means \"cool breeze over the mountains\" in Hawaiian, was born " +
        "September 2, 1964 in Beirut, Lebanon. He is the son of Patricia Taylor, a showgirl and costume designer, and " +
        "Samuel Nowlin Reeves, a geologist.",
        "One of Hollywood's most talented and versatile performers and the recipient of a truckload of NAACP Image " +
        "awards, Laurence John Fishburne III was born in Augusta, Georgia on July 30, 1961, to Hattie Bell (Crawford), " +
        "a teacher, and Laurence John Fishburne, Jr., a juvenile corrections officer. ",
        "Carrie-Anne Moss was born on August 21, 1967, in Vancouver, British Columbia, the youngest of two children of " +
        "Barbara and Melvyn Moss. At age 20, she moved to Europe to pursue a career in modeling; in Spain she was cast " +
        "in a regular role in the TV show Justicia ciega (1991), which was produced in Barcelona for its first season, " +
        "and she followed it...",
        "With more than 100 film, television and stage credits to his name, Joseph Peter Pantoliano is a prolific " +
        "American character actor who has played many diverse and memorable roles, from Guido in Risky business (1983) " +
        "to Eddie Moscone in Huida a medianoche (1988), Cosmo Renfro in El fugitivo (1993), Cypher in Matrix (1999) and " +
        "Teddy in Memento (2000). ...",
        "Hugo Wallace Weaving was born on April 4, 1960 in Nigeria, to English parents Anne (Lennard), a tour guide and " +
        "teacher, and Wallace Weaving, a seismologist. Hugo has an older brother, Simon, and a younger sister, Anna, " +
        "who both also live and work in Australia. During his early childhood, the Weaving family spent most of their " +
        "time traveling ...",
        "Gloria Foster will always be best known for her performance as The Oracle in Matrix (1999) and Matrix Reloaded " +
        "(2003), but the actress's career spanned four decades on the stage and screen. Born on November 15, 1933 in " +
        "Chicago, Illinois, Foster was put in the custody of her grandparents and raised on a farm. She returned to " +
        "Chicago to attend the ...",
        "Marcus Chong began as a child actor in Roots II- The Second Generation as Frankie Warner where he met Alex Haley. " +
        "Marcus then went on to work on 'Little House on the Prairie' directed by Michael Landon. As a young adult " +
        "Marcus did the lead on Broadway in 'Stand Up Tragedy' where he won the Theater World Award. In film Marcus " +
        "debuted in Jeff Bridges...",
        "Born in Sydney in 1976, Matt Doran is an experienced film and television actor who had his first lead role in " +
        "the film Pirates' Island at age 14. After graduating from the Australian Film and TV Academy, he became a " +
        "core cast member on Australia's most successful television show Home and Away. He has worked on an array of " +
        "Australian film and ..."];

    for (var i = 0; i < 8; i++) {
        var article = document.createElement("article");
        var div = document.createElement("div");
        var div2 = document.createElement("div");
        var imagen = document.createElement("img");
        imagen.src = "img/fotos/" + fotos[i] + ".jpg";
        var titulo = document.createElement("h1");
        var textoTitulo = document.createTextNode(titles[i]);
        titulo.appendChild(textoTitulo);
        var subtitulo = document.createElement("h4");
        var textoSub = document.createTextNode(actors[i]);
        subtitulo.appendChild(textoSub);
        var p = document.createElement("p");
        var textoArticle = document.createTextNode(textoPersonajes[i]);

        section.appendChild(article);
        article.appendChild(div);
        div.appendChild(imagen);
        div.appendChild(div2);
        div2.appendChild(titulo);
        div2.appendChild(subtitulo);
        div2.appendChild(p);
        p.appendChild(textoArticle);
    }

    //Mostrar menú
    $("nav span").click(function(){
        $("nav ul").slideToggle(100);
    });
    //Compruebo si redimensiona
    $(window).resize(function() {
        if ($(window).width() > 767.97) {
            $("nav ul").css('display','flex');
        }
        else{
            $("nav ul").css('display','none');
        }
    });

});