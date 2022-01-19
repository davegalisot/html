<?php
require("Contacto.php");

//o include para que de warning y continue, en vez de error si no
//o require_once/include_once para que solo lo cargue una vez y no redeclare variables por error

//Instancia la clase
$mi_contacto = new Contacto("David", "Galiana Sotillo", 34, null);

echo "El contacto se llama $mi_contacto->nombre";

//Asigna el email
$mi_contacto->email = "davegalisot@gmail.com";

//o mediante método
$mi_contacto->setEmail("davegalisot@gmail.com");

echo " y su email es $mi_contacto->email";