        <article>
            <section>
                <div class="scroll-fixed">
                    <table id="tabla-falsa" class="mx-auto">
                        <tr>
                            <th rowspan="2"></th>
                            <th rowspan="2">Inglés</th>
                            <th colspan="3">Español</th>
                            <th rowspan="2">categoría</th>
                            <th rowspan="2">Acciones</th>
                        </tr>
                        <tr>
                            <td>significado 1</td>
                            <td>significado 2</td>
                            <td>significado 3</td>
                        </tr>
                    </table>
                </div>
                <div class="lista_vocabulario">
                    <div class="div_volver text-center">
                        <a id="goToBottom" title="ir al final">
                            <i class="fas fa-arrow-circle-down"></i>
                        </a>
                    </div>
                    <div class="div_volver text-center">
                        <a href="<?php echo $_SESSION['home'] ?>" title="volver">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </div>
                    <form method="POST" name="editar" action="<?php echo $_SESSION['home'] ?>editar" enctype="multipart/form-data">
                        <input type="hidden" name="guardar" value="si">
                        <div class="div_nuevo">
                            <fieldset class="border p-2">
                                <legend class="w-auto">Añadir nueva palabra</legend>
                                <div id="botonera" class="botonera">
                                    <div>
                                        <p>Inglés</p>
                                        <input class="botonera_nombre" type="text" name="nombre" autocomplete="off">
                                    </div>
                                    <div>
                                        <p>Significado 1</p>
                                        <input class="botonera_valor" type="text" name="valor" autocomplete="off">
                                    </div>
                                    <div>
                                        <p>Significado 2</p>
                                        <input class="botonera_valor" type="text" name="valor2" autocomplete="off">
                                    </div>
                                    <div>
                                        <p>Significado 3</p>
                                        <input class="botonera_valor" type="text" name="valor3" autocomplete="off">
                                    </div>
                                    <div>
                                        <p>Categoría</p>
                                        <input class="botonera_valor" type="text" name="categoria" autocomplete="off">
                                    </div>
                                    <div>
                                        <p>Comentario</p>
                                        <input class="botonera_valor" type="text" name="comentario" autocomplete="off">
                                    </div>
                                    <a onclick="editar.submit()" title="añadir">
                                        <i class="fas fa-plus-circle"></i>
                                    </a>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                    <div class="contador_palabras text-center">
                        <p>Palabras añadidas: <?php echo $_SESSION["contador_palabras"] ?></p>
                    </div>
                    <table id="mi-tabla" class="mx-auto text-center">
                            <tr>
                                <th rowspan="2"></th>
                                <th rowspan="2">Inglés</th>
                                <th colspan="3">Español</th>
                                <th rowspan="2">categoría</th>
                                <th rowspan="2">Acciones</th>
                            </tr>
                            <tr>
                                <td>significado 1</td>
                                <td>significado 2</td>
                                <td>significado 3</td>
                            </tr>
                        <?php if ($datos->rowCount() == 0){ ?>
                            <tr>
                                <td colspan="3">No hay palabras en la base de datos</td>
                            </tr>
                        <?php }else{ ?>
                            <?php $_SESSION["contador_palabras"] = $contador = 1 ?>
                            <?php $cont_deshabilitadas = 0 ?>
                            <?php while ($data = $datos->fetchObject()) { ?>
                                <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $data->nombre ?></td>
                                    <td><?php echo $data->valor ?></td>
                                    <td><?php echo $data->valor2 ?></td>
                                    <td><?php echo $data->valor3 ?></td>
                                    <td><?php echo $data->categoria ?></td>
                                    <td>
                                        <?php $clase = ($data->habilitado == 1) ? "verde" : "rojo" ?>
                                        <?php ($data->habilitado == 1) ?: $cont_deshabilitadas++ ?>
                                        <a class="<?php echo $clase ?>"
                                           href="<?php echo $_SESSION["home"] ?>habilitar/<?php echo $data->id ?>" title="habilitar <?php echo $data->nombre . "/" . $data->valor ?>">
                                            <?php if ($data->habilitado == 1) { ?>
                                                <i class="far fa-check-circle"></i>
                                            <?php }else{ ?>
                                                <i class="fas fa-ban"></i>
                                            <?php } ?>
                                        </a>
                                        <a href="<?php echo $_SESSION["home"] ?>borrar/<?php echo $data->id ?>" title="borrar <?php echo $data->nombre . "/" . $data->valor ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $contador++; ?>
                                <?php $_SESSION["contador_palabras"] = $contador ?>
                            <?php } ?>
                        <?php } ?>
                    </table>
                    <div class="info_tabla">
                        <p>Palabras deshabilitadas totales: <?php echo $cont_deshabilitadas ?></p>
                    </div>
                    <div id="goToTop" class="div_volver text-center">
                        <a id="goToBottom" title="ir al final">
                            <i class="fas fa-arrow-circle-up"></i>
                        </a>
                    </div>
                    <div class="div_volver text-center">
                        <a href="<?php echo $_SESSION['home'] ?>" title="volver">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </section>
        </article>