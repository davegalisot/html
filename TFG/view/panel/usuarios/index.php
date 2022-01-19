<div class="container">
    <div class="text-center">
        <h2 class="encabezado">Usuarios (<?php echo $datos->rowCount() ?>)</h2>
    </div>
    <div class="d-flex justify-content-center mt-4 mb-4 flex-wrap">
        <!-- recorro los usuarios -->
        <?php while ($usuario = $datos->fetchObject()){ ?>
            <div class="containerUser borde separado">
                <div class="text-center mt-2">
                    <!-- nombre de usuarios y enlace a editar -->
                    <a href="<?php echo $_SESSION["home"] ?>panel/usuarios/editar/<?php echo $usuario->id ?>" title="editar usuario">
                        <?php echo $usuario->usuario ?>
                    </a>
                </div>
                <div class="text-center">
                    <?php if (is_file($_SESSION['img']."foto/".$usuario->id.".jpg")){ ?>
                        <a href="<?php echo $_SESSION["home"] ?>panel/usuarios/editar/<?php echo $usuario->id ?>" title="editar usuario">
                            <img class="img_index" src="<?php echo $_SESSION['public']."img/foto/".$usuario->id.".jpg" ?>">
                        </a>
                    <?php }else{ ?>
                        <a href="<?php echo $_SESSION["home"] ?>panel/usuarios/editar/<?php echo $usuario->id ?>" title="editar usuario">
                            <img class="img_index" src="<?php echo $_SESSION['public']."img/foto/fotoDefault.png" ?>">
                        </a>
                    <?php } ?>
                </div>
                <div class="text-center m-2">
                    <!-- editar -->
                    <a href="<?php echo $_SESSION["home"] ?>panel/usuarios/editar/<?php echo $usuario->id ?>" title="editar usuario">
                        <i class="fas fa-pen"></i>
                    </a>
                    <!-- activar/desactivar -->
                    <?php $clase = ($usuario->activo == 1) ? "verde" : "rojo" ?>
                    <?php $icono = ($usuario->activo == 1) ? "up" : "down" ?>
                    <a class="<?php echo $clase ?>" href="<?php echo $_SESSION["home"] ?>panel/usuarios/activar/<?php echo $usuario->id ?>" title="activar/desactivar">
                        <i class="far fa-thumbs-<?php echo $icono ?>"></i>
                    </a>
                    <!-- borrar -->
                    <a class="boton_borrar" data-id="<?php echo $usuario->id ?>" title="borrar noticia">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
                <!-- mensaje borrar -->
                <div class="mensaje_borrar col-12 " id="<?php echo $usuario->id ?>">
                    <p class="m-0 pr-3">¿Seguro que quiere borrar al usuario <strong><?php echo $usuario->usuario ?></strong>?</p>
                    <p class="m-0 pr-3">Esta acción no se puede deshacer</p>
                    <p class="m-0 pr-3">
                        <a href="<?php echo $_SESSION["home"] ?>panel/usuarios/borrar/<?php echo $usuario->id ?>" title="borrar usuario">
                            Borrar
                        </a>
                        <a class="boton_borrar" data_id="<?php echo $usuario->id ?>">
                            Cancelar
                        </a>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="iconos d-flex justify-content-center m-5">
        <a href="<?php echo $_SESSION["home"] ?>panel/usuarios/crear" title="crear usuario">
            <i class="fas fa-user-plus"></i></i>
        </a>
    </div>
</div>