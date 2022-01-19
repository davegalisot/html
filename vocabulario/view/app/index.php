        <article>
            <section class="text-center">
                <div class="generador">
                    <div>
                        <a id="generar_nueva" onClick="window.location.reload();">
                            <p>Generar nueva palabra</p>
                            <svg><rect></rect></svg>
                        </a>
                    </div>
                </div>
                <div class="texto_comprobante text-center">
                    <?php if ($datos->rowCount() == 0){ ?>
                        <h1>...</h1>
                    <?php }else{ ?>
                    <?php while ($data = $datos->fetchObject()) { ?>
                            <p id="categoria" class="normal"><?php echo ($data->categoria == null or $data->categoria == "") ?
                                    "Sin categoría" : "Categoría: ".$data->categoria ?></p>
                            <h1 id="adivinar_h1" class="normal"><?php echo ucfirst($data->nombre) ?></h1>
                            <?php ($data->valor2 == null or $data->valor2 == "") ? $valor2 = "" : $valor2 = " / ".$data->valor2 ?>
                            <?php ($data->valor3 == null or $data->valor3 == "") ? $valor3 = "" : $valor3 = " / ".$data->valor3 ?>
                            <h2 id="texto_adivinar" class="normal"><?php echo $data->valor.$valor2.$valor3 ?></h2>
                            <!-- div oculto -->
                            <div class="div_oculto">
                                <p id="adivinar1"><?php echo $data->valor ?></p>
                                <p id="adivinar2"><?php echo $data->valor2 ?></p>
                                <p id="adivinar3"><?php echo $data->valor3 ?></p>
                            </div>
                            <!-- fin div oculto -->
                            <p id="comentario"><?php echo $data->comentario ?></p>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div>
                    <input id="introducido" type="text">
                </div>
                <div class="div_boton_comprobar">
                    <a id="boton_comprobar">
                        <p>Comprobar</p>
                        <svg><rect></rect></svg>
                    </a>
<!--                    <input id="comprobar_palabra" class="btn btn-dark" type="button" value="Comprobar">-->
                </div>
                <div class="div_modificar_vocabulario">
                    <a id="modificar_vocabulario" onclick="location.href='<?php echo $_SESSION["home"] ?>editar';">
                        <p>Modificar Vocabulario</p>
                        <svg><rect></rect></svg>
                    </a>
                </div>
                <div class="separador_inferior"></div>
            </section>
        </article>