<?php
include ("logic.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <header>
        <h1>C4lcul4d0r4</h1>
    </header>
    <form method="post">
        <div class="contenedor">
            <div class="contenedor2">
                <div class="inputNumber">
                    <input type="number" name="operando" placeholder="0" value="<?php echo $op ?>"
                           onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                    <input type="number" name="operando2" placeholder="0" value="<?php echo $op2 ?>"
                           onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                </div>
                <div>
                    <?php foreach ($operandos as $key => $valor){
                            if ($operando == $key){ ?>
                        <input type="radio" name="operacion" value="<?php echo $key ?>" checked>
                        <strong><?php echo $valor?></strong>
                    <?php }else{ ?>
                        <input type="radio" name="operacion" value="<?php echo $key ?>">
                        <strong><?php echo $valor?></strong>
                    <?php } } ?>
                </div>
                <div>
                    <select name="selector" onchange="this.form.submit()">
                        <?php foreach ($selector as $key => $valor){
                            if($seleccion == $key){ ?>
                            <option value="<?php echo $key ?>" selected><?php echo $valor ?></option>
                            <?php }else{ ?>
                            <option value="<?php echo $key ?>"><?php echo $valor ?></option>
                        <?php } } ?>
                    </select>
                </div>
                <div>
                    <input type="text" value="<?php echo $resultado ?>" readonly>
                </div>
            </div>
        </div>
    </form>
    <footer>
        <p id="reloj">Hora actual</p>
        <div>
            <div>
                <p>Grado</p>
                <p>Desarrollo de aplicaciones WEB</p>
            </div>
            <div>
                <p>Clase</p>
                <p>Desarrollo WEB Entorno Servidor</p>
            </div>
            <div>
                <p>Profesor</p>
                <p>Jairo García Rincón</p>
            </div>
            <div>
                <p>Autor</p>
                <p>David Galiana Sotillo</p>
            </div>
        </div>
    </footer>
</body>
</html>