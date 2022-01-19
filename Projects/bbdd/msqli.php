<?php

//@ delante de $db no es obligatorio pero me permite ignorar errores en la ejecución
@$db = new mysqli('localhost', 'root', 'dgsmysql1601', 'AmazonWS');

//Comprueba que no hay errores
if ($db->connect_errno != null) {
    echo "Error número $db->connect_errno conectando a la base de datos.<br>Mensaje: $db->connect_error.";
    exit();
} else {
    echo "Te has conectado con éxito a la Base de Datos.";
    echo "<br/>";
}

echo "<br/>";//Salto de página

//Configurar el juego de caracteres
$db->set_charset('utf8');

/********************************************** COMENTADO ************************************************************
//Insert
$query = $db->query('INSERT INTO personas (nombre) VALUES ("José"),("Luís")');

//Delete
$query = $db->query('DELETE FROM personas WHERE id>=3');

$registros = $db->query('UPDATE personas SET activo=1 WHERE activo=0');
if ($registros){
    echo "Se han activado $db->affected_rows <i>Registros</i>.";
}*/

//Select en un array con claves asociativas y numéricas (con MYSQLI_STORE_RESULT, da igual ponerlo que no)
echo "Select en un array con claves asociativas y numéricas (MYSQLI_STORE_RESULT)";
echo "<br/>";
$resultado = $db->query('SELECT * FROM personas');
$personas = $resultado->fetch_array(MYSQLI_BOTH); //O también $resultado->fetch_array()
while ($personas != null) { //Recorro el resultado
    echo $personas['id'] . " " . $personas[1] . " " . $personas['activo'];
    echo "<br/>";
    $personas = $resultado->fetch_array(MYSQLI_BOTH);
}
$resultado->free();//Libera la memoria
echo "<br/>";

//Select en un array con claves asociativas y numéricas (con MYSQLI_USE_RESULT)
echo "Select en un array con claves asociativas y numéricas (con MYSQLI_USE_RESULT)";
echo "<br/>";
$resultado = $db->query('SELECT * FROM personas', MYSQLI_USE_RESULT);
$personas = $resultado->fetch_array(MYSQLI_BOTH); //O también $resultado->fetch_array()
while ($personas != null) { //Recorro el resultado
    echo $personas['id'] . " " . $personas[1] . " " . $personas['activo'];
    echo "<br/>";
    $personas = $resultado->fetch_array(MYSQLI_BOTH);
}
$resultado->free();//Libero de la memoria
echo "<br/>";

//Select en un objeto
echo "Select en un objeto";
echo "<br/>";
$resultado = $db->query('SELECT * FROM personas');
$personas = $resultado->fetch_object();
while ($personas != null){ //Recorro el resultado
    echo $personas->id." ".$personas->nombre." ".$personas->activo;
    echo "<br/>";
    $personas = $resultado->fetch_object();
}
$resultado->free();//Libero de la memoria
echo "<br/>";

//Select con un objeto, real_query y store_result
echo "Select con un objeto, real_query y store_result";
echo "<br/>";
$booleano = $db->real_query('SELECT * FROM personas');
if ($booleano){
    $resultado = $db->store_result(); //Almaceno el resultado de la última consulta
    $personas = $resultado->fetch_object();
    while ($personas != null){ //Recorro el resultado
        echo $personas->id." ".$personas->nombre." ".$personas->activo;
        echo "<br/>";
        $personas = $resultado->fetch_object();
    }
    $resultado->free(); //Libero de la memoria
    echo "<br/>";
}

//Select con un objeto, real_query y use_result
echo "Select con un objeto, real_query y use_result";
echo "<br/>";
$booleano = $db->real_query('SELECT * FROM personas');
if ($booleano){
    $resultado = $db->use_result(); //Uso el resultado de la última consulta
    $personas = $resultado->fetch_object();
    while ($personas != null){ //Recorro el resultado
        echo $personas->id." ".$personas->nombre." ".$personas->activo;
        echo "<br/>";
        $personas = $resultado->fetch_object();
    }
    $resultado->free(); //Libero de la memoria
    echo "<br/>";
}

//Deshabilitamos el autocommit par que no se ejecute cada una de ellas por separado
$db->autocommit(false);
//Declaramos todas las consultas
$resultado = $db->query('INSERT INTO personas (nombre) VALUES ("José"),("Luís")');
$resultado = $db->query('DELETE FROM personas WHERE id>3');
$resultado = $db->query('UPDATE personas SET activo=0 WHERE activo=1');
//Realizamos el commit para que se ejecuten todas las consultas
$db->commit();
//Mensaje
if ($resultado){
    echo "Se han activado $db->affected_rows registros.";
}
echo "<br/>";

//cierre de la conexión
$resultado->close();