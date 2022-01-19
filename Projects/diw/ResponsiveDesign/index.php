<?php
include ("logic.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Responsive Design</title>
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
    <div class="contMenu">
        <form method="post">
            <ul class="menu">
                <button type="submit" name="componentes">
                    <li>
                        <p>Componentes</p>
                        <img class="comp" src="img/comp.svg">
                    </li>
                </button>
                <button type="submit" name="perifericos">
                    <li>
                        <p>Periféricos</p>
                        <img class="perifericos" src="img/perifericos.svg">
                    </li>
                </button>
                <button type="submit" name="smartphones">
                    <li>
                        <p>Smartphones / Tablets</p>
                        <img class="phone" src="img/phone.svg">
                    </li>
                </button>
                <button type="submit" name="ordenadores">
                    <li>
                        <p>Ordenadores</p>
                        <img class="laptop" src="img/laptop.svg">
                    </li>
                </button>
            </ul>
        </form>
    </div>
    <form method="post">
        <section>
            <?php foreach ($_SESSION["seleccion"] as $key => $valor){ ?>
                <button type="submit" name="articulo" value="<?php echo $key ?>">
                    <article>
                        <div class="img">
                            <img class="escala" src="<?php echo $valor["foto1"] ?>" alt="">
                        </div>
                        <div>
                            <h3><?php echo $valor["nombre"] ?></h3>
                            <p><?php echo $valor["precio"]."\xE2\x82\xAc" ?></p>
                        </div>
                        <div id="ver">Ver</div>
                    </article>
                </button>
            <?php } ?>
        </section>
    </form>
        <aside></aside>
    <?php
        include("php/footer.php");
    ?>
</body>
</html>