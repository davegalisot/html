<?php
    function imprimeArray($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/ejStrings.css">
    </head>
    <body>
        <header>
            <h1>Ejercicios con Strings</h1>
        </header>
            <div>
                <div>
                    <h3>Ejercicio 1</h3>
                    <h6>Muestra por pantalla el texto: El comando c:\*.* no es correcto y en mi reloj son la 12 "o'clock".</h6>
                    <p><?php echo "El comando c:\*.* no es correcto y en mi reloj son las 12 \"o'clock\"" ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            echo "El comando c:\*.* no es correcto y en mi reloj son las 12 \"o'clock\"";<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 2</h3>
                    <h6>Escribe tu nombre completo y dos apellidos en una línea. En la siguiente, sustituye las
                        vocales e,i,o por los números 3,1,0, respectivamente. Si hay alguna 's', sustitúyela por el
                        número '5'.</h6>
                        <?php
                            $yoEj2 = "David Galiana Sotillo";
                            $cambiosEj2 = array(
                                "e" => "3",
                                "é" => "3",
                                "E" => "3",
                                "É" => "3",
                                "i" => "1",
                                "í" => "1",
                                "I" => "1",
                                "Í" => "1",
                                "o" => "0",
                                "ó" => "0",
                                "O" => "0",
                                "Ó" => "0");
                        ?>
                    <p><?php echo "Original: ".$yoEj2 ?></p>
                    <p><?php echo "Resultado: ".strtr($yoEj2, $cambiosEj2); ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            $yo = "David Galiana Sotillo";<br/>
                            $cambios = array(<br/>
                            <span class="codigo array">"e" => "3",</span><br/>
                            <span class="codigo array">"é" => "3",</span><br/>
                            <span class="codigo array">"E" => "3",</span><br/>
                            <span class="codigo array">"É" => "3",</span><br/>
                            <span class="codigo array">"i" => "1",</span><br/>
                            <span class="codigo array">"í" => "1",</span><br/>
                            <span class="codigo array">"I" => "1",</span><br/>
                            <span class="codigo array">"Í" => "1",</span><br/>
                            <span class="codigo array">"o" => "0",</span><br/>
                            <span class="codigo array">"ó" => "0",</span><br/>
                            <span class="codigo array">"O" => "0",</span><br/>
                            <span class="codigo array">"Ó" => "0");</span><br/>
                            <br/>
                            echo "Resultado: ".strtr($yo, $cambios);<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 3</h3>
                    <h6>Escribe tu nombre completo y dos apellidos en una línea. En la siguiente, sustituye todas
                        tildes y diéresis (si las hay) por su correspondiente vocal sin tilde ni diéresis. Si alguna
                        'ñ', sustitúyela por una 'n'.</h6>
                        <?php
                            $fraseEj3 = "Sí, qué más da cómo estés, leñe!";
                            $cambiosEj3 = array(
                                "á" => "a",
                                "ä" => "a",
                                "Á" => "A",
                                "Ä" => "A",
                                "é" => "e",
                                "ë" => "e",
                                "É" => "E",
                                "Ë" => "E",
                                "í" => "i",
                                "ï" => "i",
                                "Í" => "I",
                                "Ï" => "I",
                                "ó" => "o",
                                "ö" => "o",
                                "Ó" => "O",
                                "Ö" => "O",
                                "ú" => "u",
                                "ü" => "u",
                                "Ú" => "U",
                                "Ü" => "U",
                                "ñ" => "n",
                                "Ñ" => "N");
                        ?>
                    <p><?php echo "Original: ".$fraseEj3 ?></p>
                    <p><?php echo "Resultado: ".strtr($fraseEj3, $cambiosEj3) ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            $cambios = array(<br/>
                            <span class="codigo array">"á" => "a",</span><br/>
                            <span class="codigo array">"ä" => "a",</span><br/>
                            <span class="codigo array">"Á" => "A",</span><br/>
                            <span class="codigo array">"Ä" => "A",</span><br/>
                            <span class="codigo array">"é" => "e",</span><br/>
                            <span class="codigo array">"ë" => "e",</span><br/>
                            <span class="codigo array">"É" => "E",</span><br/>
                            <span class="codigo array">"Ë" => "E",</span><br/>
                            <span class="codigo array">"í" => "i",</span><br/>
                            <span class="codigo array">"ï" => "i",</span><br/>
                            <span class="codigo array">"Í" => "I",</span><br/>
                            <span class="codigo array">"Ï" => "I",</span><br/>
                            <span class="codigo array">"ó" => "o",</span><br/>
                            <span class="codigo array">"ö" => "o",</span><br/>
                            <span class="codigo array">"Ó" => "O",</span><br/>
                            <span class="codigo array">"Ö" => "O",</span><br/>
                            <span class="codigo array">"ú" => "u",</span><br/>
                            <span class="codigo array">"ü" => "u",</span><br/>
                            <span class="codigo array">"Ú" => "U",</span><br/>
                            <span class="codigo array">"Ü" => "U",</span><br/>
                            <span class="codigo array">"ñ" => "n",</span><br/>
                            <span class="codigo array">"Ñ" => "N"];</span><br/>
                            echo "Resultado: ".strtr($frase, $cambios);<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 4</h3>
                    <h6>Escribe una función que transforme una frase a mayúsculas.</h6>
                    <?php
                        $fraseEj4 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis facilisis quam, 
                                        eget facilisis ante.";

                        function mayus($string){
                            return mb_strtoupper($string, "UTF-8");
                        }
                    ?>
                    <p><?php echo "Resultado: ".mayus($fraseEj4) ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            function mayus($string){<br/>
                            <span class="codigo">return mb_strtoupper($string, "UTF-8");</span><br/>
                            }<br/>
                            <br/>
                            $frase = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis facilisis<br/>
                            <span class="codigo">quam, eget facilisis ante.";</span><br/>
                            <br/>
                            echo "Resultado: ".mayus($frase);<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 5</h3>
                    <h6>Escribe una función que transforme una frase a minúsculas.</h6>
                    <?php
                        function minus($string){
                            return mb_strtolower($string, "UTF-8");
                        }
                    ?>
                    <p><?php echo "Resultado: ".minus(mayus($fraseEj4)) ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            function minus($string){<br/>
                            <span class="codigo">return mb_strtolower($string, "UTF-8");</span><br/>
                            }<br/>
                            <br/>
                            $frase = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis facilisis<br/>
                            <span class="codigo">quam, eget facilisis ante.";</span><br/>
                            <br/>
                            echo "Resultado: ".minus(mayus($frase));<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 6</h3>
                    <h6>Escribe una función que transforme la primera letra de una frase a mayúsculas</h6>
                    <?php
                        $fraseEj6 = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis facilisis quam, 
                                        eget facilisis ante.";
                        function ejercicio6($string){
                            $cambiosEj6 = array(
                                "á" => "Á",
                                "é" => "É",
                                "í" => "Í",
                                "ó" => "Ó",
                                "ú" => "Ú",
                                "ñ" => "Ñ");
                            $primera = substr($string, 0, 2);
                            if (array_key_exists($primera, $cambiosEj6)) {
                                $mayuscula = $cambiosEj6[$primera];
                                $resto = substr($string, 2);
                                return $mayuscula . $resto;
                            } else {
                                return ucfirst($string);
                            }
                        }
                    ?>
                    <p><?php echo "Resultado: ".ejercicio6($fraseEj6) ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            $frase = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis facilisis <br/>
                            <span class="codigo">quam, eget facilisis ante.";</span><br/>
                            <br/>
                            function ejercicio6($string){<br/>
                            <span class="codigo">$cambios = array(</span><br/>
                            <span class="codigo array">"á" => "Á",</span><br/>
                            <span class="codigo array">"é" => "É",</span><br/>
                            <span class="codigo array">"í" => "Í",</span><br/>
                            <span class="codigo array">"ó" => "Ó",</span><br/>
                            <span class="codigo array">"ú" => "Ú",</span><br/>
                            <span class="codigo array">"ñ" => "Ñ");</span><br/>
                            <span class="codigo">$primera = substr($string, 0, 2);</span><br/>
                            <span class="codigo">if (array_key_exists($primera, $cambios)) {</span><br/>
                            <span class="codigo tab">$mayuscula = $cambios[$primera];</span><br/>
                            <span class="codigo tab">$resto = substr($string, 2);</span><br/>
                            <span class="codigo tab">return $mayuscula . $resto;</span><br/>
                            <span class="codigo">} else {</span><br/>
                            <span class="codigo tab">return ucfirst($string);</span><br/>
                            <span class="codigo">}</span><br/>
                            }<br/>
                            <br/>
                            echo "Resultado: ".ejercicio6($frase);<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 7</h3>
                    <h6>Escribe una función que transforme la primera letra de cada palabra de una frase a
                        mayúsculas.</h6>
                    <?php
                    $fraseEj7 = "esto es una frase, esto es otra frase.ángel come pan;y esto es otra";

                    $arrayFraseEj7 = preg_split("/[\s,.;]+/", $fraseEj7, -1, PREG_SPLIT_DELIM_CAPTURE);
                    imprimeArray($arrayFraseEj7);
                    ?>
                    <p><?php /*echo "Resultado: ".ejericicio7($fraseEj6)*/ ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            $frase = "lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis facilisis <br/>
                            <span class="codigo">quam, eget facilisis ante.";</span><br/>
                            <br/>
                            function ejericicio7($string){<br/>
                            <span class="codigo">return ucwords($string);</span><br/>
                            }<br/>
                            <br/>
                            echo "Resultado: ".ejericicio7($frase);<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 8</h3>
                    <h6>Escribe una función que convierta el string 15061974 en 15/06/1974.</h6>
                    <?php
                    $fraseEj8 = "15061974";

                    function ejercicio8($string){
                        $resultado = "";
                        $frase = substr($string, 0, 2);
                        $resultado .= $frase."/";
                        $frase2 = substr($string, 2, 2);
                        $resultado .= $frase2."/";
                        $resultado .= substr($string, 4, 4);
                        return $resultado;
                    }
                    ?>
                    <p><?php echo "Original: ".$fraseEj8 ?></p>
                    <p><?php echo "Resultado: ".ejercicio8($fraseEj8) ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            $frase = "15061974";<br/>
                            <br/>
                            function ejercicio8($string){<br/>
                            <span class="codigo">$resultado = "";</span><br/>
                            <span class="codigo">$frase = substr($string, 0, 2);</span><br/>
                            <span class="codigo">$resultado .= $frase."/";</span><br/>
                            <span class="codigo">$frase2 = substr($string, 2, 2);</span><br/>
                            <span class="codigo">$resultado .= $frase2."/";</span><br/>
                            <span class="codigo">$resultado .= substr($string, 4, 4);</span><br/>
                            <span class="codigo">return $resultado;</span><br/>
                            }<br/>
                            <br/>
                            echo "Resultado: ".ejercicio8($frase);<br/>
                            ?&gt</p>
                    </fieldset>

                </div>
                <div>
                    <h3>Ejercicio 9</h3>
                    <h6>Escribe una función que extraiga el nombre del fichero de una ruta
                        (Ejemplo, 'http://www.jairogarciarincon.com/carpeta1/index.php' debe devolver 'index.php'.</h6>
                    <?php
                    $fraseEj9 = "http://www.jairogarciarincon.com/carpeta1/index.php";

                    $res_ej9 = substr(strrchr($fraseEj9, "/"), 1);
                    ?>
                    <p><?php echo "Original: ".$fraseEj9 ?></p>
                    <p><?php echo "Resultado: ".$res_ej9 ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            $frase = "http://www.jairogarciarincon.com/carpeta1/index.php";<br/>
                            $resultado = substr(strrchr($frase, "/"), 1);<br/>
                            <br/>
                            echo $resultado;<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
                <div>
                    <h3>Ejercicio 10</h3>
                    <h6>Escribe una función que extraiga el nombre de usuario de una dirección de email
                        (Ejemplo jairo@garciarincon.com debe devolver jairo)</h6>
                    <?php

                    ?>
                    <p><?php  ?></p>
                </div>
                <div>
                    <h3>Ejercicio 11</h3>
                    <h6>Escribe una función que devuelva la letra o número siguiente al introducido (Ejemplo, si la
                        muestra es 'a', debe devolver 'b'. Si la muestra es '4', debe devolver '5').</h6>
                    <?php

                    ?>
                    <p><?php  ?></p>
                </div>
                <div>
                    <h3>Ejercicio 12</h3>
                    <h6>Escribe una función que devuelva la primera palabra de una frase.</h6>
                    <?php
                    $fraseEj10 = "esto, es una frase, esto es otra frase.ángel come pan;y esto es otra";
                    $resultadoEj10 = preg_split("/[\s,.;]+/", $fraseEj10, -1, PREG_SPLIT_DELIM_CAPTURE);
                    echo $resultadoEj10[0];
                    ?>
                    <p><?php  ?></p>
                    <fieldset>
                        <legend>Código usado</legend>
                        <p>&lt;?php<br/>
                            $frase = "esto, es una frase, esto es otra frase.ángel come pan;y esto es otra";;<br/>
                            $resultado = substr(strrchr($frase, "/"), 1);<br/>
                            <br/>
                            echo $resultado;<br/>
                            ?&gt</p>
                    </fieldset>
                </div>
            </div>
        <footer>
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
