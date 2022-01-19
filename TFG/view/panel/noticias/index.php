<div class="container">
    <div class="text-center">
        <h2 class="encabezado">Noticias (<?php echo $datos->rowCount() ?>)</h2>
    </div>
    <div class="borde separado_superior">
        <div class="imita_tabla">
            <!-- cabecera de listado -->
            <div class="row cabecera_listado">
                <div class="invertido col-10 p-2 pl-3">
                    Noticia
                </div>
                <div class="invertido col-2 text-right p-2 pr-3">
                    Acciones
                </div>
            </div>
            <!-- recorro los noticias -->
            <?php while ($noticia = $datos->fetchObject()) { ?>
                <div class="row item_listado">
                    <div class="col-1 my-auto">
                        <?php if (is_file($_SESSION['img']."noticias/".$noticia->id.".jpg")){ ?>
                            <img class="imgNoticia" src="<?php echo $_SESSION['public']."img/noticias/".$noticia->id.".jpg" ?>">
                        <?php }else{ ?>
                            <img class="imgNoticia" src="<?php echo $_SESSION['public']."img/noticias/inf.png" ?>">
                        <?php } ?>
                    </div>
                    <div class="col-8">
                        <!-- Nombre de noticia y enlace a editar -->
                        <a href="<?php echo $_SESSION['home'] ?>panel/noticias/editar/<?php echo $noticia->id ?>"
                           title="editar noticia">
                            <?php echo $noticia->titulo ?>
                        </a>
                        <p class="descripcion m-0"><?php echo $noticia->descripcion ?></p>
                    </div>
                    <div class="col-3 text-right">
                        <!-- editar -->
                        <a href="<?php echo $_SESSION['home'] ?>panel/noticias/editar/<?php echo $noticia->id ?>"
                           title="Editar">
                            <i class="fas fa-pen"></i>
                        </a>
                        <!-- destacados en el Inicio -->
                        <?php $clase = ($noticia->destacado == 1) ? "verde" : "rojo" ?>
                        <a class="<?php echo $clase ?>"
                           href="<?php echo $_SESSION['home'] ?>panel/noticias/destacado/<?php echo $noticia->id ?>"
                           title="Destacar">
                            <i class="fas fa-star"></i>
                        </a>
                        <!-- borrar -->
                        <a class="boton_borrar" data-id="<?php echo $noticia->id ?>" title="Borrar">
                            <i class="fas fa-eraser"></i>
                        </a>
                    </div>
                    <!-- mensaje borrar -->
                    <div class="mensaje_borrar col-12" id="<?php echo $noticia->id ?>">
                        <p>¿Seguro que desea borrar el noticia <strong><?php echo $noticia->titulo ?></strong>?
                        </p>
                        <p>Esta acción no se puede deshacer</p>
                        <a href="<?php echo $_SESSION['home'] ?>panel/noticias/borrar/<?php echo $noticia->id ?>"
                           title="borrar noticia">
                            Borrar
                        </a>
                        <a class="boton_borrar" data-id="<?php echo $noticia->id ?>">
                            Cancelar
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="iconos d-flex justify-content-center m-5">
        <a href="<?php echo $_SESSION['home'] ?>panel/noticias/crear" title="Añadir">
            <i class="fas fa-plus-circle"></i>
        </a>
    </div>
</div>