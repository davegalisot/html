<?php


$_SESSION["ok"] = "";

//Conexión mediante PDO
$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

try {
    $db = new PDO('mysql:host=localhost;dbname=trntaryet_csatis', 'root', 'dgsMysql1601**', $opciones);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $success = "Falló la conexión: " . $e->getMessage();
}

$fecha = date('Y-m-d');

if (isset($_POST["enviar"])){

    if(isset($_POST["trabajo"]) && !empty($_POST["trabajo"]) ){
        $trabajo = filter_input(INPUT_POST, "trabajo", FILTER_SANITIZE_STRING);
        $_SESSION["error_trabajo"] = "";
    }else{
        $_SESSION["error_trabajo"] = "borde_rojo";
    }

    if(isset($_POST["at_cli"]) && !empty($_POST["at_cli"]) ){
        $at_cli = $_POST["at_cli"];
        $_SESSION["error_at_cli"] = "";
    }else{
        $_SESSION["error_at_cli"] = "borde_rojo";
    }

    if(isset($_POST["pla_en"]) && !empty($_POST["pla_en"]) ){
        $pla_en = $_POST["pla_en"];
        $_SESSION["error_pla_en"] = "";
    }else{
        $_SESSION["error_pla_en"] = "borde_rojo";
    }

    if(isset($_POST["res_prob"]) && !empty($_POST["res_prob"]) ){
        $res_prob = $_POST["res_prob"];
        $_SESSION["error_res_prob"] = "";
    }else{
        $_SESSION["error_res_prob"] = "borde_rojo";
    }

    if(isset($_POST["ase_tec"]) && !empty($_POST["ase_tec"]) ){
        $ase_tec = $_POST["ase_tec"];
        $_SESSION["error_ase_tec"] = "";
    }else{
        $_SESSION["error_ase_tec"] = "borde_rojo";
    }

    if(isset($_POST["conf"]) && !empty($_POST["conf"]) ){
        $conf = $_POST["conf"];
        $_SESSION["error_conf"] = "";
    }else{
        $_SESSION["error_conf"] = "borde_rojo";
    }

    if(isset($_POST["prof"]) && !empty($_POST["prof"]) ){
        $prof = $_POST["prof"];
        $_SESSION["error_prof"] = "";
    }else{
        $_SESSION["error_prof"] = "borde_rojo";
    }

    if(isset($_POST["cal_prod"]) && !empty($_POST["cal_prod"]) ){
        $cal_prod = $_POST["cal_prod"];
        $_SESSION["error_cal_prod"] = "";
    }else{
        $_SESSION["error_cal_prod"] = "borde_rojo";
    }

    if(isset($_POST["cal_ser"]) && !empty($_POST["cal_ser"]) ){
        $cal_ser = $_POST["cal_ser"];
        $_SESSION["error_cal_ser"] = "";
    }else{
        $_SESSION["error_cal_ser"] = "borde_rojo";
    }

        $comentarios = filter_input(INPUT_POST, "comentarios", FILTER_SANITIZE_STRING);

    if ($trabajo && $at_cli && $pla_en && $res_prob && $ase_tec && $conf && $prof && $cal_prod && $cal_ser){
        if (empty($_POST["comentarios"])){
            $comentarios = "--Sin comentarios--";
        }
        $db->exec("INSERT INTO csatis (trabajo, at_cli, pla_en, res_prob, ase_tec, conf, cal_prod, cal_ser, prof, fecha, comentarios)
                                                        VALUES (LOWER('$trabajo'),LOWER('$at_cli'),LOWER('$pla_en'),LOWER('$res_prob'),LOWER('$ase_tec'),LOWER('$conf'),LOWER('$cal_prod'),LOWER('$cal_ser'),LOWER('$prof'),LOWER('$fecha'),LOWER('$comentarios'))");
        header('Location: gracias.php');
    }else{
        $_SESSION["escritura_db"] = "por favor, rellene todos los campos marcados con el borde rojo";
        $_SESSION["error_formulario"] = "rojo";
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>TRNTÁRYET</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../public/img/logos/Logo-TRN-Taryet-png.png" type="image/x-icon"/>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
          crossorigin="anonymous">
    <!--        <script src="https://kit.fontawesome.com/59c64d8965.js" crossorigin="anonymous"></script>-->
    <!-- BOOTSTRAP TOGGLE CSS -->
    <link rel="stylesheet" type="text/css" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- ANIMATE.CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/animate.css">
    <!-- SLICK CSS -->
    <!--        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>-->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/csatis.css">
    <link rel="stylesheet" type="text/css" href="../public/css/mediaQueryMaxWidth1200.css">
    <link rel="stylesheet" type="text/css" href="../public/css/mediaQueryMaxWidth992.css">
    <link rel="stylesheet" type="text/css" href="../public/css/mediaQueryMaxWidth768.css">
    <link rel="stylesheet" type="text/css" href="../public/css/mediaQueryMaxWidth576.css">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!-- BOOTSTRAP TOGGLE JS -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- JS -->
    <script charset="utf-8" src="../public/js/csatis.js"></script>
    <!--    <script charset="utf-8" src="../public/js/common.js"></script>-->
    <!-- NO SCALABLE -->
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />
</head>
    <body id="body" class="d-flex flex-column">
        <header class="csatis-trn">
            <div class="centered_vertically mx-auto width1500px">
                <div id="logo">
                    <img src="../public/img/csatis/taryet_trasparente.png">
                </div>
            </div>
        </header>
        <!-- SECTION CON IMAGEN DE FONDO Y LETRAS EN BLANCO -->
        <section>
            <article class="article-titulo">
                <div class="foto-titulo">
                    <h1 class="text-center animated slideInUp faster">satisfacción<span> <?php echo $_SESSION["ok"] ?></span></h1>
                    <div class="blanco-tapa-h1"></div>
                </div>
            </article>
        </section>
        <!-- SECTION DE LA ENCUESTA -->
        <section id="satis_mostrado" class="section-satis animated">
            <form id="formulario_csatis" method="post" action="csatisv1.php" enctype="multipart/form-data">
                <article class="article-satis width1500px">
                    <div>
                        <p class="text-center">por favor, valore los siguientes aspectos de muy malo (1) a excelente (4)</p>
                    </div>
                    <div class="estudio">
                        <textarea id="trabajo" name="trabajo" class="mi-borde-radio nuevo_radio <?php echo $_SESSION["error_trabajo"] ?>" cols="80" rows="1" placeholder="nombre del estudio o asistencia técnica..."><?php echo $trabajo ?></textarea>
                    </div>
                    <div class="bloque">
                        <div class="div-conjunto">
                            <p class="sobretexto">gestión comercial</p>
                            <div class="mi-borde-radio">
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center">
                                        <p class="text-right texto-izq-encuesta">atención</p>
                                        <p class="text-right texto-izq-encuesta">al cliente</p>
                                    </div>
                                    <div id="at_cli_rb" class="mi-bloque-radio <?php echo $_SESSION["error_at_cli"] ?>">
                                        <img class="carita at_cli_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="at_cli" value="1" <?php echo $at_cli == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="at_cli" value="2" <?php echo $at_cli == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="at_cli" value="3" <?php echo $at_cli == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="at_cli" value="4" <?php echo $at_cli == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center">
                                        <p class="text-right texto-izq-encuesta">plazo</p>
                                        <p class="text-right texto-izq-encuesta">de entrega</p>
                                    </div>
                                    <div id="pla_en_rb" class="mi-bloque-radio <?php echo $_SESSION["error_pla_en"] ?>">
                                        <img class="carita pla_en_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="pla_en" value="1" <?php echo $pla_en == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="pla_en" value="2" <?php echo $pla_en == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="pla_en" value="3" <?php echo $pla_en == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="pla_en" value="4" <?php echo $pla_en == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="div-conjunto">
                            <p class="sobretexto">gestión técnica</p>
                            <div class="mi-borde-radio fondo-gris">
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center ">
                                        <p class="text-right texto-izq-encuesta">respuesta</p>
                                        <p class="text-right texto-izq-encuesta">ante problemas</p>
                                    </div>
                                    <div id="res_prob_rb" class="mi-bloque-radio <?php echo $_SESSION["error_res_prob"] ?>">
                                        <img class="carita res_prob_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="res_prob" value="1" <?php echo $res_prob == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="res_prob" value="2" <?php echo $res_prob == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="res_prob" value="3" <?php echo $res_prob == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="res_prob" value="4" <?php echo $res_prob == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="linea_separadora"></div>
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center">
                                        <p class="text-right texto-izq-encuesta">asesoramiento</p>
                                        <p class="text-right texto-izq-encuesta">técnico</p>
                                    </div>
                                    <div id="ase_tec_rb" class="mi-bloque-radio <?php echo $_SESSION["error_ase_tec"] ?>">
                                        <img class="carita ase_tec_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="ase_tec" value="1" <?php echo $ase_tec == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="ase_tec" value="2" <?php echo $ase_tec == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="ase_tec" value="3" <?php echo $ase_tec == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="ase_tec" value="4" <?php echo $ase_tec == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bloque">
                        <div class="div-conjunto">
                            <p class="sobretexto">imagen de empresa</p>
                            <div class="mi-borde-radio fondo-gris">
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center">
                                        <p class="text-right texto-izq-encuesta">confianza en</p>
                                        <p class="text-right texto-izq-encuesta">nuestra empresa</p>
                                    </div>
                                    <div id="conf_rb" class="mi-bloque-radio <?php echo $_SESSION["error_conf"] ?>">
                                        <img class="carita conf_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="conf" value="1" <?php echo $conf == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="conf" value="2" <?php echo $conf == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="conf" value="3" <?php echo $conf == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="conf" value="4" <?php echo $conf == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="linea_separadora"></div>
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center">
                                        <p class="text-right texto-izq-encuesta">profesionalidad</p>
                                    </div>
                                    <div id="prof_rb" class="mi-bloque-radio <?php echo $_SESSION["error_prof"] ?>">
                                        <img class="carita prof_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="prof" value="1" <?php echo $prof == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="prof" value="2" <?php echo $prof == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="prof" value="3" <?php echo $prof == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="prof" value="4" <?php echo $prof == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="div-conjunto">
                            <p class="sobretexto">calidad</p>
                            <div class="mi-borde-radio">
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center">
                                        <p class="text-right texto-izq-encuesta">calidad del</p>
                                        <p class="text-right texto-izq-encuesta">producto</p>
                                    </div>
                                    <div id="cal_prod_rb" class="mi-bloque-radio <?php echo $_SESSION["error_cal_prod"] ?>">
                                        <img class="carita cal_prod_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="cal_prod" value="1" <?php echo $cal_prod == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="cal_prod" value="2" <?php echo $cal_prod == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="cal_prod" value="3" <?php echo $cal_prod == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="cal_prod" value="4" <?php echo $cal_prod == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="flex-column align-self-center ">
                                        <p class="text-right texto-izq-encuesta">calidad</p>
                                        <p class="text-right texto-izq-encuesta">del servicio</p>
                                    </div>
                                    <div id="cal_ser_rb" class="mi-bloque-radio <?php echo $_SESSION["error_cal_ser"] ?>">
                                        <img class="carita cal_ser_carita" src="../public/img/csatis/emoji-bien.png" alt="">
                                        <label class="rad">
                                            <p>1</p>
                                            <input type="radio" name="cal_ser" value="1" <?php echo $cal_ser == 1 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>2</p>
                                            <input type="radio" name="cal_ser" value="2" <?php echo $cal_ser == 2 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>3</p>
                                            <input type="radio" name="cal_ser" value="3" <?php echo $cal_ser == 3 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                        <label class="rad">
                                            <p>4</p>
                                            <input type="radio" name="cal_ser" value="4" <?php echo $cal_ser == 4 ? "checked" : ""?>>
                                            <i></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="mt-4 text-center <?php echo $_SESSION["error_formulario"] ?>"><?php echo $_SESSION["escritura_db"] ?></p>
                    </div>
                    <div class="observaciones">
                        <div class="div-comentarios">
                            <p class="sobretexto">observaciones, sugerencias de mejora o comentarios sobre algún aspecto que considere necesario añadir</p>
                            <textarea id="comentarios" class="mi-borde-radio" name="comentarios" cols="50" rows="6" ><?php echo $comentarios ?></textarea>
                            <div class="div-enviar">
                                <div class="div-gracias">
                                    <p class="gracias">muchas gracias por su colaboración</p>
                                </div>
                                <input type="submit" id="enviar" name="enviar" value="enviar">
                            </div>
                        </div>
                    </div>
                </article>
            </form>
        </section>
        <!--<section id="satis_oculto">-->
        <!--    <h1 class="text-center">GRACIAS!</h1>-->
        <!--</section>-->
        <footer id="footer" class="animated fadeIn">
            <div class="footer-flex width1500px mx-auto">
                <div class="footer-isos">
                    <img class="isos" src="../public/img/csatis/Sello_AENOR_ISO_9001_POS.png" alt="">
                </div>
            </div>
        </footer>
    </body>
</html>