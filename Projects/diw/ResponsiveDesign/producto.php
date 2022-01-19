<?php
include ("logic.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Fotos</title>
    <meta name="title" content="Listado de Fotos">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <?php
        include("php/header.php");
    ?>
    <section class="section">
        <article class="article">
            <div class="izquierdo">
                <img src="<?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["foto1"] ?>" alt="">
                <div class="otrasFotos">
                    <img src="<?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["foto2"] ?>">
                    <img src="<?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["foto3"] ?>">
                </div>
            </div>
            <div class="derecho">
                <h3><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["nombre"] ?></h3>
                <p><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["precio"]."\xE2\x82\xAc" ?></p>
                <hr>
                <ul>
                    <li><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["car1"] ?></li>
                    <li><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["car2"] ?></li>
                    <li><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["car3"] ?></li>
                    <li><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["car4"] ?></li>
                    <li><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["car5"] ?></li>
                    <li><?php echo $_SESSION["seleccion"][$_SESSION["numero"]]["car6"] ?></li>
                </ul>
            </div>
        </article>
    </section>
    <div class="volver">
        <a href="index.php">Volver</a>
    </div>
        <aside></aside>
    <?php
        include("php/footer.php");
    ?>
</body>
</html>