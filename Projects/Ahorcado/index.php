<?php
require("logic.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no"/>
    <title>Ahorcado</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<p>
    <header>
        <form method="post">
            <button class="headerButton" type="submit" name="reiniciar">
                <h1>Juego del ahorcado</h1>
            </button>
        </form>
    </header>
    <form id="form" method="post"><!-- form para reiniciar la sesion -->
        <div class="contEntrada"><!-- contenedor del input único de la web -->
            <h1 class="tema">Ciudades españolas</h1><!-- Indica el tema sobre el que se juega -->
            <p>Introduce una letra:</p>
            <input id="entrada" type="text" name="introducido"
                   onkeyup="this.form.submit()" autocomplete="off">
        </div>
        <div id="contenedor"><!-- contenedor (oculto por defecto) mensaje ganado o perdido -->
            <h3 id="h3"><?php echo $_SESSION["ganado"] ?></h3>
        </div>
        <div class="contReiniciar"><!-- botoón reiniciar (solo se muestra al ganar o perder) -->
            <input id="reiniciar" class="reiniciarJuego opacity" type="submit" name="reiniciar" value="Reiniciar juego">
        </div>
        <p id="hidden" class="opacity"><?php echo $_SESSION["intentos"] ?></p><!-- p oculto para coger valores desde javascript -->
        <div id="adivinar" class="opacity"><!-- mensaje que muestra la palabra que habia que acertar (oculto hasta que se pierde) -->
            <p>Tenías que adivinar:</p>
            <p><strong><?php echo $_SESSION["palabra"] ?></strong></p>
        </div>
    </form>
    <table class="contLetras"><!-- muestra "_" para adivinar la palabra -->
        <?php for ($i = 0; $i < mb_strlen($_SESSION["palabra"], "UTF-8"); $i++){ ?>
            <?php if (mb_substr($_SESSION["palabra"], $i, 1, "UTF-8") == " "){ ?>
                <tr></tr>
            <?php }else{ ?>
                <?php if ($_SESSION["letra".$i] != ""){ ?>
                    <td class="spanContenido noborde"><?php echo $_SESSION["letra".$i] ?></td>
                <?php }else{ ?>
                    <td class="spanContenido"><?php echo $_SESSION["letra".$i] ?></td>
                <?php } } } ?>
    </table>
    <div id="fallos"><!-- Muestra las palabras falladas -->
        <span>Fallos: </span>
        <?php if ($_SESSION["fallos"] != ""){ ?>
            <?php foreach ($_SESSION["fallos"] as $key => $valor){ ?>
                <b><?php echo $valor ?></b>
            <?php } } ?>
    </div>
    <p id="score"><span id="mensaje"></span><span id="puntos"></span><span id="postPuntos"></span></p>
    <div class="posteMonigote">
        <div class="poste">
            <img src="img/poste.png">
        </div>
        <div class="monigote">
            <img id="cabeza" class="opacity" src="img/cabeza.png">
            <img id="cuerpo" class="opacity" src="img/cuerpo.png">
            <img id="bra_izq" class="opacity" src="img/bra_izq.png">
            <img id="bra_dcho" class="opacity" src="img/bra_dcho.png">
            <img id="pie_izq" class="opacity" src="img/pie_izq.png">
            <img id="pie_dcho" class="opacity" src="img/pie_dcho.png">
        </div>
    </div>
    <?php
    include("php/footer.php");
    ?>
    </body>
</html>