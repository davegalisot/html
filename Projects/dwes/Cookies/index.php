<?php

if (!isset($_COOKIE["miCookie"]) or (!$_COOKIE["miCookie"])){
    echo "no hay ninguna cookie creada, pulsa el botón para crear una.";
}else{
    echo $_COOKIE["miCookie"];
}


if (isset($_POST["crear"])){
    creaCookie();
}

if (isset($_POST["borrar"])){
    setcookie("miCookie", "", -1);
    header("location: ".htmlspecialchars($_SERVER["PHP_SELF"]));
}


function creaCookie(){
    setcookie("miCookie", "Hola, soy tu cookie amiga por 1 día", time() + 86400);
    echo "La cookie se ha creado, recarga la página";
    header("location: ".htmlspecialchars($_SERVER["PHP_SELF"]));
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="submit" name="crear" value="Crear cookie">
<?php if (isset($_COOKIE["miCookie"])){ ?>
        <input type="submit" name="borrar" value="borrar">
<?php } ?>
</form>
