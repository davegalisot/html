<div class="text-center">
    <h2 class="encabezado">Zona Personal</h2>
</div>
<div class="container text-center marginTop">
    <?php if (isset($_SESSION["ult_acceso"])){ ?>
    <p>Último acceso: <?php echo strftime("%d %B %G a las %H:%Mh", strtotime($_SESSION["ult_acceso"])) ?></p>
    <?php } ?>
    <div class="mt-5 border p-3">
        <p>Aquí tienes una lista con los posts y las respuestas que hayas creado</p>
        <div class="row">
            <div class="lista_actividad col-6 border-right">
                <h4 class="border-bottom">POSTS (<?php echo $datos->rowCount() ?>)</h4>
                <?php if ($datos->rowCount() == 0){ ?>
                    <p>No has creado a ningún post</p>
                <?php }else{ ?>
                    <?php while ($resultPosts = $datos->fetchObject()){ ?>
                        <div class="row py-1">
                            <h5 class="col-6 text-left pl-4 m-0">
                                <a class="linkPost" href="<?php echo $_SESSION['home'] ?>forum/post/<?php echo $resultPosts->id ?>">
                                    <?php echo $resultPosts->titulo ?>
                                </a>
                            </h5>
                            <h5 class="col-6 text-right pr-4 m-0 my-auto"><?php echo strftime("%d %B %G %H:%M", strtotime($resultPosts->fecha)) ?></h5>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="lista_actividad col-6">
                <?php $cuentaResps = 1 ?>
                <h4 class="border-bottom">RESPUESTAS (<?php echo $data->rowCount() ?>)</h4>
                <?php if ($data->rowCount() == 0){ ?>
                    <p>No has respondido a ningún post</p>
                <?php }else{ ?>
                    <?php while ($resultResps = $data->fetchObject()){ ?>
                        <div class="row py-1">
                            <h5 class="col-6 text-left pl-4 m-0">
                                <a class="linkPost" href="<?php echo $_SESSION['home'] ?>forum/post/<?php echo $resultResps->id_forum ?>">
                                    Respuesta <?php echo $cuentaResps ?>
                                </a>
                            </h5>
                            <h5 class="col-6 text-right pr-4 m-0 my-auto"><?php echo strftime("%d %B %G %H:%M", strtotime($resultResps->fecha)) ?></h5>
                        </div>
                        <?php $cuentaResps++ ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>