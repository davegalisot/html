<?php

$_SESSION["success"] = "datos recibidos de la base de datos";

//Conexión mediante PDO
$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

try {
    $db = new PDO('mysql:host=localhost;dbname=trntaryet_csatis', 'root', 'dgsMysql1601**', $opciones);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $_SESSION["success"] = "Falló la conexión: " . $e->getMessage();
}

function fecha_formateada($fecha){
    $meses = array('','enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
        'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

    $mes = $meses[(string)((int)(strftime("%m", strtotime($fecha))))];
    $dia = strftime("%d", strtotime($fecha));
    $anio = strftime("%Y", strtotime($fecha));;

    return $dia." ".$mes." ".$anio;
}

$fecha_actual = date('Y-m-d');
$meses = array('','enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
    'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
$resultexto = "";

if (isset($_POST["mostrar_todo"])){
    $resultado = $db->query('select * from csatis order by id DESC');
//si no se introduce nombre de estudio -> solo fechas
}else if (isset($_POST["buscar"]) && empty($_POST["nombre_estudio"])){

    $mes_seleccionado = $_POST["mes"];
    $year_seleccionado = $_POST["year"];

    //si no se selecciona mes
    if ($mes_seleccionado == 0){
        $resultexto = " - para año ".$year_seleccionado;
        $resultado = $db->query('select * from csatis where fecha between "'.$year_seleccionado.'/01/01" and "'.$year_seleccionado.'/12/31"');
    }

    //si no se selecciona año
    if ($year_seleccionado == 0){
        $resultexto = " - para ".$meses[$mes_seleccionado];
        $resultado = $db->query('select * from csatis where Month(fecha)="'.$mes_seleccionado.'"');
    }

    //seleccionando año y mes
    if ($mes_seleccionado != 0 && $year_seleccionado != 0){
        $resultexto = " - para ".$meses[$mes_seleccionado]." de ".$year_seleccionado;
        $resultado = $db->query('select * from csatis where Month(fecha)="'.$mes_seleccionado.'" && YEAR(fecha)="'.$year_seleccionado.'"');
    }

    //si no se selecciona año ni mes, muestra todos
    if ($mes_seleccionado == 0 && $year_seleccionado == 0) {
        $resultado = $db->query('select * from csatis order by id DESC');
    }

//solo busca nombre de estudio/trabajo
}else if (isset($_POST["buscar"]) && !empty($_POST["nombre_estudio"])){
    $mes_seleccionado = $_POST["mes"];
    $year_seleccionado = $_POST["year"];

    $nombre_estudio = filter_input(INPUT_POST, "nombre_estudio", FILTER_SANITIZE_STRING);

    echo $year_seleccionado." - ".$mes_seleccionado." - ".$nombre_estudio;

    if ($mes_seleccionado == 0){
        $resultado = $db->query('select * from csatis where trabajo like "%'.$nombre_estudio.'%" && YEAR(fecha)="'.$year_seleccionado.'"');
    }

    if ($year_seleccionado == 0){
        $resultado = $db->query('select * from csatis where trabajo like "%'.$nombre_estudio.'%" && Month(fecha)="'.$mes_seleccionado.'"');
    }

    if ($mes_seleccionado != 0 && $year_seleccionado != 0){
        $resultado = $db->query('select * from csatis where trabajo like "%'.$nombre_estudio.'%" && Month(fecha)="'.$mes_seleccionado.'" && YEAR(fecha)="'.$year_seleccionado.'"');
    }

    if ($mes_seleccionado == 0 && $year_seleccionado == 0){
        $resultado = $db->query('select * from csatis where trabajo like "%'.$nombre_estudio.'%"');
    }

}else{
    $resultado = $db->query('select * from csatis order by id DESC');
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
        <script charset="utf-8" src="../public/js/common.js"></script>
        <!-- NO SCALABLE -->
        <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />
    </head>
    <body id="body" class="d-flex flex-column">
        <header>
         <div class="centered_vertically mx-auto width1500px">
          <div id="logo">
           <img src="../public/img/logos/Logo-TRN-Taryet-positivo-png.png">
          </div>
         </div>
        </header>
        <!-- SECTION CON IMAGEN DE FONDO Y LETRAS EN BLANCO -->
        <section>
         <article class="article-titulo">
          <div class="foto-titulo">
           <h1 class="text-center animated slideInUp faster">registro</h1>
           <div class="blanco-tapa-h1"></div>
          </div>
         </article>
        </section>
        <!-- SECTION DE LA ENCUESTA -->
        <section class="section-satis">
         <article class="article-satis width1500px">
              <form id="formulario_csatreg" method="post" action="csatreg.php" enctype="multipart/form-data">
                  <div class="search mi-search">
                      <div class="d-flex flex-column">
                          <div class="d-flex flex-row">
                              <label><p class="p-registro">Año:</p>
                                  <select name="year" id="year-selection">
                                      <option value="0" class="select" selected>todos</option>
                                      <option value="2021" <?php echo $year_seleccionado == "2021" ? "selected" : ""?>>2021</option>
                                      <option value="2020" <?php echo $year_seleccionado == "2020" ? "selected" : ""?>>2020</option>
                                      <option value="2019" <?php echo $year_seleccionado == "2019" ? "selected" : ""?>>2019</option>
                                      <option value="2018" <?php echo $year_seleccionado == "2018" ? "selected" : ""?>>2018</option>
                                      <option value="2017" <?php echo $year_seleccionado == "2017" ? "selected" : ""?>>2017</option>
                                  </select>
                              </label>
                              <label><p class="p-registro ml-3">mes:</p>
                                  <select name="mes" id="mes-selection">
                                      <option value="0" class="select" selected>todos</option>
                                      <option value="1" <?php echo $mes_seleccionado == "1" ? "selected" : ""?>>enero</option>
                                      <option value="2" <?php echo $mes_seleccionado == "2" ? "selected" : ""?>>febrero</option>
                                      <option value="3" <?php echo $mes_seleccionado == "3" ? "selected" : ""?>>marzo</option>
                                      <option value="4" <?php echo $mes_seleccionado == "4" ? "selected" : ""?>>abril</option>
                                      <option value="5" <?php echo $mes_seleccionado == "5" ? "selected" : ""?>>mayo</option>
                                      <option value="6" <?php echo $mes_seleccionado == "6" ? "selected" : ""?>>junio</option>
                                      <option value="7" <?php echo $mes_seleccionado == "7" ? "selected" : ""?>>julio</option>
                                      <option value="8" <?php echo $mes_seleccionado == "8" ? "selected" : ""?>>agosto</option>
                                      <option value="9" <?php echo $mes_seleccionado == "9" ? "selected" : ""?>>septiembre</option>
                                      <option value="10" <?php echo $mes_seleccionado == "10" ? "selected" : ""?>>octubre</option>
                                      <option value="11" <?php echo $mes_seleccionado == "11" ? "selected" : ""?>>noviembre</option>
                                      <option value="12" <?php echo $mes_seleccionado == "12" ? "selected" : ""?>>diciembre</option>
                                  </select>
                              </label>
                          </div>
                              <label>
                                  <p class="p-registro">Nombre estudio:</p>
                                  <input type="text" name="nombre_estudio" value="<?php echo $nombre_estudio ?>">
                              </label>
                      </div>
                      <div class="d-flex flex-column justify-content-end">
                          <button class="button-corp" type="submit" name="buscar">Buscar</button>
                      </div>
                  </div>
                  <div class="search todos-datos">
                      <button class="button-corp" type="submit" name="mostrar_todo">Todos los datos</button>
                  </div>
              </form>
              <p class="text-center"><?php echo $_SESSION["success"] ?><span><?php echo $resultexto ?></span><span> (<?php echo $resultado->rowCount() ?>)</span></p>
              <table id="registro_encuesta">
                  <tr>
                      <th>
                          <p>nº</p>
                      </th>
                      <th>
                          <p>Trabajo</p>
                      </th>
                      <th>
                          <p>Atención</p>
                          <p>Cliente</p>
                      </th>
                      <th>
                          <p>Plazo</p>
                          <p>Entrega</p>
                      </th>
                      <th>
                          <p>Respuesta</p>
                          <p>Problemas</p>
                      </th>
                      <th>
                          <p>Asesoram.</p>
                          <p>Técnico</p>
                      </th>
                      <th>
                          <p>Calidad</p>
                          <p>Producto</p>
                      </th>
                      <th>
                          <p>Calidad</p>
                          <p>Servicio</p>
                      </th>
                      <th>
                          <p>Confianza</p>
                      </th>
                      <th>
                          <p>Profesion.</p>
                      </th>
                      <th>
                          <p>Fecha</p>
                      </th>
                      <th>
                          <p>Comentarios</p>
                      </th>
                  </tr>
                  <?php
                  if ($resultado->rowCount() == 0){ ?>
                      <tr>
                          <td colspan="12" class="text-center">No hay datos que mostrar</td>
                      </tr>
                      <?php $_SESSION["contado"] = "" ?>
                  <?php }else{ ?>
                      <?php
                      $count = 1;
                      while ($datos = $resultado->fetchObject()) { ?>
                          <tr>
                              <td>
                                  <?php echo $count; $count++ ?>
                              </td>
                              <td class="text-center trabajo-tabla"><?php echo $datos->trabajo ?></a></td>
                              <td class="text-center"><?php echo $datos->at_cli ?></td>
                              <td class="text-center"><?php echo $datos->pla_en ?></td>
                              <td class="text-center"><?php echo $datos->res_prob ?></td>
                              <td class="text-center"><?php echo $datos->ase_tec ?></td>
                              <td class="text-center"><?php echo $datos->cal_prod ?></td>
                              <td class="text-center"><?php echo $datos->cal_ser ?></td>
                              <td class="text-center"><?php echo $datos->conf ?></td>
                              <td class="text-center"><?php echo $datos->prof ?></td>
                              <td class="text-center"><?php echo fecha_formateada($datos->fecha) ?></td>
                              <td class="text-center comentario-tabla"><?php echo $datos->comentarios ?></td>
                          </tr>
                          <?php $_SESSION["contado"] = $count ?>
                      <?php } ?>
                  <?php } ?>
              </table>
         </article>
        </section>
        <footer id="footer" class="animated fadeIn">
            <div class="footer-flex width1500px mx-auto">
                <div class="footer-isos">
                    <img class="isos" src="../public/img/logos/logo-bureau-iso-transparente.png" alt="">
                    <a href="../public/img/pdf/POLITICA-CALIDAD-TRNTARYET.pdf" target="_blank">Política de calidad</a>
                </div>
                <div class="footer-info">
                    <h4>Información</h4>
                    <a href="../view/app/legal.php">Aviso legal</a>
                    <a href="../view/app/privacidad">Política de privacidad</a>
                    <a href="../view/app/cookies">Política de cookies</a>
                </div>
                <div class="footer-telfs">
                    <h4>Teléfonos</h4>
                    <p>Madrid: +34 91 409 60 75</p>
                    <p>Barcelona: +34 607 074 890</p>
                    <p>Lima: +572 618 05 19</p>
                </div>
                <div class="footer-sobre">
                    <h4>Sobre nosotros</h4>
                    <p>TRN TÁRYET es la empresa del Grupo TPF especializada en Consultoría del Transporte. TPF Group,
                        una de las empresas multidisciplinares de ingeniería más importantes de Europa, con uno de los
                        crecimientos más rápidos en el mundo.</p>
                </div>
                <div class="rrss-logos">
                    <a href="" target="_blank">
                        <img src="../public/img/logos/rrss/linkedin-logo.png">
                    </a>
                </div>
                <div class="footer-mQ-576">
                    <div class="footer-isos footer-isos-mQ-576">
                        <img class="isos" src="../public/img/logos/logo-bureau-iso-transparente.png" alt="">
                        <a href="../public/img/pdf/POLITICA-CALIDAD-TRNTARYET.pdf" target="_blank">Política de calidad</a>
                    </div>
                    <div class="rrss-logos rrss-mQ-576">
                        <a href="" target="_blank">
                            <img src="../public/img/logos/rrss/linkedin-logo.png"?>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
<?php
//Cerrar la conexión a la base de datos
$db->close();
?>