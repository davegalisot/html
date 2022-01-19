<!-- obtiene el objeto de $datos -->
<?php $post = $datos->fetchObject() ?>
<!-- guarda el id del post en sesión para usarlo al crear una respuesta -->
<?php $_SESSION["id"] = $post->id ?>
<!--  -->
<?php date_default_timezone_set('Europe/Madrid'); ?>
<?php setlocale(LC_TIME, 'spanish'); ?>
<div class="text-center">
    <h2 class="encabezado">Post</h2>
</div>
<div class="container text-justify">
    <div class="row marginTop border">
        <div class="col-2">
            <div class="mt-3 text-center">
                <?php if (is_file($_SESSION['img']."foto/".$moreData->id.".jpg")){ ?>
                    <img class="fotoPerfilDefecto" src="<?php echo $_SESSION["public"]."img/foto/".$moreData->id.".jpg" ?>" alt="foto de perfil">
                <?php }else{ ?>
                    <img class="fotoPerfilDefecto" src="<?php echo $_SESSION["public"]."img/foto/fotoDefault.png" ?>" alt="foto de perfil">
                <?php } ?>
            </div>
            <div class="text-center">
                <h3><?php echo $moreData->usuario ?></h3>
            </div>
        </div>
        <div class="col-10 no_padding border-left">
            <div class="d-flex justify-content-between border-bottom tituloPost">
                <h3 class="pl-2 pt-1"><?php echo $post->titulo ?></h3>
                <p class="pr-2 pt-1"><?php echo strftime("%d %B %G %H:%M", strtotime($post->fecha)) ?></p>
            </div>
            <div class="py-2 px-4 pr-5">
                <p><?php echo $post->texto ?></p>
            </div>
        </div>
    </div>
    <?php $contador = 1 ?>
    <?php while ($respuesta = $data->fetchObject()) { ?>
        <div class="row border respuestaPost mt-4">
            <div class="col-2">
                <div class="mt-3 text-center">
                    <?php if (is_file($_SESSION['img']."foto/".$respuesta->id_usuario.".jpg")){ ?>
                        <img class="fotoPerfilDefecto" src="<?php echo $_SESSION["public"]."img/foto/".$respuesta->id_usuario.".jpg" ?>" alt="foto de perfil">
                    <?php }else{ ?>
                        <img class="fotoPerfilDefecto" src="<?php echo $_SESSION["public"]."img/foto/fotoDefault.png" ?>" alt="foto de perfil">
                    <?php } ?>
                </div>
                <div class="text-center">
                    <h3><?php echo $_SESSION["arrayUsers"][$respuesta->id_usuario] ?></h3>
                </div>
            </div>
            <div class="col-10 no_padding border-left">
                <div class="tituloPost m-0">
                    <div class="d-flex justify-content-between">
                        <div class="respuesta pt-1 px-2 m-0">Respuesta <?php echo $contador ?></div>
                        <p class="pr-2 pt-1 my-auto"><?php echo strftime("%d %B %G %H:%M", strtotime($respuesta->fecha)) ?></p>
                    </div>
                </div>
                <div class="py-2 px-4">
                    <p><?php echo $respuesta->texto ?></p>
                </div>
            </div>
        </div>
        <?php $contador++ ?>
    <?php } ?>
</div>
<div class="iconos text-center mt-5">
    <?php if ($moreData->usuario === $_SESSION["usuario"]->usuario or $_SESSION["usuario"]->admin == 1){ ?>
        <a class="btn btnCustom" href="<?php echo $_SESSION['home'] ?>forum/borrar/<?php echo $post->id ?>">Eliminar Post</a>
        <span class="mx-1"></span>
        <a class="btn btnCustom" href="<?php echo $_SESSION['home'] ?>forum/editar/<?php echo $post->id ?>">Editar Post</a>
    <?php }else{ ?>
        <a class="btn btnDisabled">Eliminar Post</a>
        <a class="btn btnDisabled">Editar Post</a>
    <?php } ?>
    <span class="mx-1"></span>
    <a class="btn btnCustom" href="<?php echo $_SESSION['home'] ?>respuestas/crear">Crear Respuesta</a>
</div>
<div class="iconos text-center mt-3 pb-5">
    <a href="<?php echo $_SESSION['home'] ?>forum" title="Volver">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
</div>
