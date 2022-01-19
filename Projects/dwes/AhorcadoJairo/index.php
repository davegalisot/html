<?php
include("logic.php");
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title>el Jairocado</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form class="reiniciar" name="reiniciar" method="post">
        <input type="hidden" name="reiniciar">
        <span onclick="reiniciar.submit()">reiniciar juego</span>
    </form>
    <div class="palabra ocultar"><?php echo $_SESSION["palabra"] ?></div>
    <!-- letra y titulo -->
    <form method="post" autocomplete="off" name="probar">
        <span class="titulo">El Ahorcado de los animales</span><br/><br/>
        <span class="<?php echo $_SESSION["ocultar"] ?>">Escribe una letra: </span>
        <input type="text" name="letra" onkeyup="probar.submit()" class="<?php echo $_SESSION["ocultar"] ?>"
               autofocus="on">
        <div class="mensaje"><?php echo $mensaje ?></div>
    </form>
    <!-- monigote -->
    <div class="monigote">
        <svg height="200" width="300">
            <line x1="0" y1="200" x2="0" y2="0"  style="stroke: #ffffff; stroke-width: 8;" class="ocultar <?php echo $_SESSION["monigote1"] ?>"/>
            <line x1="0" y1="0" x2="100" y2="0"  style="stroke: #ffffff; stroke-width: 8;" class="ocultar <?php echo $_SESSION["monigote1"] ?>"/>
            <line x1="100" y1="0" x2="100" y2="25"  style="stroke: #ffffff; stroke-width: 4;" class="ocultar <?php echo $_SESSION["monigote1"] ?>"/>
            <circle cx="100" cy="40" r="15" style="stroke: #ffffff; stroke-width: 3;" fill="transparent" class="ocultar <?php echo $_SESSION["monigote2"] ?>"/>
            <line x1="100" y1="55" x2="100" y2="100"  style="stroke: #ffffff; stroke-width: 4;" class="ocultar <?php echo $_SESSION["monigote3"] ?>"/>
            <line x1="80" y1="75" x2="120" y2="75"  style="stroke: #ffffff; stroke-width: 4;" class="ocultar <?php echo $_SESSION["monigote4"] ?>"/>
            <line x1="100" y1="100" x2="125" y2="125"  style="stroke: #ffffff; stroke-width: 4;" class="ocultar <?php echo $_SESSION["monigote5"] ?>"/>
            <line x1="100" y1="100" x2="75" y2="125"  style="stroke: #ffffff; stroke-width: 4;" class="ocultar <?php echo $_SESSION["monigote6"] ?>"/>
        </svg>
        <div class="soporte"><?php echo implode(", ", $_SESSION["utilizadas"]) ?></div>
    </div>
    <!-- palabra resuelta -->
    <div class="resuelta">
        <?php foreach ($_SESSION["resuelta"] as $row){ ?>
            <span class="caja"><?php echo $row ?></span>
        <?php } ?>
    </div>
</body>
</html>
