<?php
//Conexión con control de errores
$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
try {
    $db = new PDO('mysql:host=localhost;dbname=AmazonWS', 'root', 'dgsmysql1601', $opciones);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

//Comprobación de la versión
echo $db->getAttribute(PDO::ATTR_SERVER_VERSION);
echo "<br/>";


//Insert
$registros = $db->exec('INSERT INTO personas (nombre) VALUES ("Cain"),("Barry")');
if ($registros){
    echo "Se han creado $registros registros.";
}
echo "<br/>";

//Delete
$registros = $db->exec('DELETE FROM personas WHERE id>3');
if ($registros){
    echo "Se han borrado $registros registros.";
}
echo "<br/>";

//Update
$registros = $db->exec('UPDATE personas SET activo=1 WHERE activo=0');
if ($registros){
    echo "Se han activado $registros registros.";
}
echo "<br/>";

//Select con BOTH
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch()){ //O bien ($resultado->fetch(PDO::FETCH_BOTH)
    echo $personas['id']." ".$personas[1]." ".$personas['activo']."<br>";
}
echo "<br/>";

//Select con ASSOC
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_ASSOC)){ //Recorro el resultado
    echo $personas['id']." ".$personas['nombre']." ".$personas['activo']."<br>";
}
echo "<br/>";

//Select con NUM
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_NUM)){ //Recorro el resultado
    echo $personas[0]." ".$personas[1]." ".$personas[2]."<br>";
}
echo "<br/>";

//Select con LAZY
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_LAZY)){ //Recorro el resultado
    echo $personas[0]." ".$personas['nombre']." ".$personas->activo."<br>";
}
echo "<br/>";

//Select con BOUND
$resultado = $db->query('SELECT * FROM personas');
$resultado->bindColumn(1, $id);
$resultado->bindColumn(2, $nombre);
$resultado->bindColumn(3, $activo);
while ($personas = $resultado->fetch(PDO::FETCH_BOUND)){ //Recorro el resultado
    echo $id." ".$nombre." ".$activo."<br>";
}
echo "<br/>";

//Iniciamos la transacción para que no ejecute cada una de ellas por separado
$db->beginTransaction();
//Declaramos todas las consultas
$resultado = $db->exec('INSERT INTO personas (nombre) VALUES ("José"),("Luís")');
$resultado = $db->exec('DELETE FROM personas WHERE id>3');
$resultado = $db->exec('UPDATE personas SET activo=0 WHERE activo=1');
//Realizamos el commit para que se ejecuten todas las consultas
$db->commit();
//Mensaje
if ($resultado){
    echo "Se han activado $resultado registros.";
}
/*//Y si no ha salido como esperábamos, podemos revertir las consultas mediante
$db->rollback();*/
echo "<br/>";

//Consulta preparada
$nombres = ['Jorgito', 'Juanito', 'Jaimito'];
$resultado = $db->prepare('INSERT INTO personas (nombre) VALUES (?)');
//O bien $resultado = $db->prepare('INSERT INTO personas (nombre) VALUES (:nombre)');
foreach ($nombres as $nombre){
    $resultado->bindParam(1, $nombre); //O bien $resultado->bindParam(':nombre', $nombre);
    $resultado->execute();
}

//destruto la conexión
$db = null;

phpinfo();
