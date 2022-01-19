// con el window.onload hace que Javascript espere a que cargue el HTML entero antes de ejecutarse.
window.onload = function() {
    var boton = document.getElementById("boton"); //obtengo el tag con el id boton
    var texto = document.getElementById("texto"); //obtengo el tag con el id texto
    boton.addEventListener("click", gestionar, false); //añado a boton la accion al hacer click con el ratón
    var flag = false; //booleano para controlar si el texto está mostrado o no.

    /*********************************************************************************************************
     *  Ocultar y Visualizar texto
     */
    function gestionar(){ //funcion que dependiendo del booleano "flag" muestra u oculta el p con id texto
        if (flag === false) { //texto oculto
            boton.innerHTML = "Mostrar Texto";
            texto.style.display = "none";
            flag = true;
        } else { //texto mostrado
            boton.innerHTML = "Ocultar Texto";
            texto.style.display = "block";
            flag = false;
        }
    }

    /*********************************************************************************************************
     *  Visualizar el destino de un enlace
     */

    var links = document.getElementsByTagName("a"); //obtengo todos los tags "a" del html
    for (var i = 0; i < links.length; i++){ //los recorro
        links[i].addEventListener("mouseover", mostrarURL, false); //les agrego la accion al pasar el raton por encima
    }

    function mostrarURL(){
        document.getElementById("URL").value = this.href; /* coge el valor del tag con id URL (un input) y le asigna
                                                             el valor del href del que apuntamos con el raton */
        setTimeout(function () { //se llama a esta funcion cada 3 segundos
            document.getElementById("URL").value = ""; //ponemos el valor del input a vacío
        }, 3000);
    }

    /*********************************************************************************************************
     *  Insertar elementos en una lista
     */

    //array con los productos de la lista
    var productos = ["leche", "galletas", "cola-cao", "azúcar", "solomillo", "pan", "yogures"];
    var li, textoLi;

    var ul = document.getElementById("ul");

    for (var i = 0; i < productos.length; i++){ //recorro los productos les asigno a un LI y éste lo añado a un UL
        li = document.createElement("li");
        textoLi = document.createTextNode(productos[i]);
        li.appendChild(textoLi);
        ul.appendChild(li);
    }

    var input = document.createElement("input"); //creo un input
    var divLista = document.getElementById("divLista"); //obtengo el tag del elemento con id divLista
    var atributoInput = input.setAttribute("id", "inputLista"); //le asigno un id a input
    divLista.appendChild(input); //uno el input a divLista

    var boton = document.createElement("input"); //creo un input
    var atributo = boton.setAttribute("type", "button"); //del tipo boton
    var textoBoton = boton.setAttribute("value", "Añadir a la lista"); //le asigno un value
    var idBoton = boton.setAttribute("id", "botonAñadir"); //le doy atributo id
    boton.addEventListener("click", añadirProducto, false); //le agrego la accion al hacer click sobre él
    divLista.appendChild(boton); //uno el boton a divLista

    function añadirProducto() { //añado productos al final del li creado por el for anterior
        var valor = document.getElementById("inputLista").value; //cojo el valor del input
        if (valor != "") { //si no está vacío
            var texto = document.createTextNode(valor); //creo un nodo de texto con lo obtenido del input
            var liAñadir = document.createElement("li"); //le asigno un li
            liAñadir.appendChild(texto); //agrego el texto obtenido del input a un LI
            ul.appendChild(liAñadir); //añado el LI al UL
        }
        document.getElementById("inputLista").value = ""; //después de agregar el valor al input, lo vacío
    }
}
