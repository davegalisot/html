var carta1 = "", carta2 = "", contador = 0, intentos = 0;
window.onload = function() {
    var imagenes = document.getElementsByTagName("img");
    for (var i = 0; i < imagenes.length; i++) {
        imagenes[i].addEventListener("click", pintar, false);
    }

    //Añado la funcion resetear al boton que aparece cuando acabas la partida
    document.getElementById("boton").addEventListener("click", resetear, false);

    //Array con las cartas
    var cartas = ["img/chrome.png", "img/chrome.png", "img/firefox.png", "img/firefox.png", "img/safari.png",
        "img/safari.png", "img/opera.png", "img/opera.png", "img/edge.png", "img/edge.png", "img/dolphin.png",
        "img/dolphin.png", ];

    // Barajar el array
    var currentInd = cartas.length, tempValue, randomInd;
    // Mientras queden elementos a mezclar
    while (0 !== currentInd){
        //Seleccion de un elemento sin mezclar
        randomInd = Math.floor(Math.random() * currentInd);
        currentInd--;

        //Intercambio de elementos del array con el actual
        tempValue = cartas[currentInd];
        cartas[currentInd] = cartas[randomInd];
        cartas[randomInd] = tempValue;
    }

    function pintarReverso(id){
        document.getElementById(id).src = "img/reverso.png";
    }

    function quitarEventListener(id) {
        document.getElementById(id).removeEventListener("click", pintar, false);
    }

    function pintar(e) {
        if (carta1 === "") {
            e.target.src = cartas[e.target.id];
            carta1 = cartas[e.target.id];
            idCarta1 = e.target.id;
        } else if (carta2 === "") {
            e.target.src = cartas[e.target.id];
            carta2 = cartas[e.target.id];
            idCarta2 = e.target.id;
        } else {
            if (carta1 === carta2) {
                quitarEventListener(idCarta1);
                quitarEventListener(idCarta2);
                carta1 = "";
                carta2 = "";
                contador++;
            } else {
                pintarReverso(idCarta1);
                pintarReverso(idCarta2);
                carta1 = "";
                carta2 = "";
                //intentos++;
            }
        }
        if (contador == 6) {
            ganar();
        }
    }

    function ganar() {
        document.getElementById("salida").style.visibility = "visible";
        document.getElementById("boton").style.visibility = "visible";
    }
    
    function resetear(){
        window.location.reload();
    }

    /*function animarCarta(id){
        var animado = document.getElementById(id);
        var pos = 0;
        var i = setInterval(frame, 1);
        function frame() {
            if (pos == 100) {
                clearInterval(i);
            }else{
                pos++;
                animado.style.width = pos + 'px';
            }
        }
    }
    function DesAnimarCarta(id){
        var animado = document.getElementById(id);
        var pos = 100;
        var i = setInterval(frame, 1);
        function frame() {
            if (pos == 0) {
                clearInterval(i);
            }else{
                pos--;
                animado.style.width = pos + 'px';
            }
        }
    }*/
}


