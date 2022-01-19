<div class="container">
    <!-- cabecera e iconos -->
    <div class="row">
        <h3 class="col-9">
            NOTICIAS
        </h3>
        <div class="col-3 iconos text-right">
            <a href="<?php echo $_SESSION['home'] ?>panel/noticias/crear" title="añadir noticia">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="borde separado_superior">
        <div class="imita_tabla">
            <!-- cabecera de listado -->
            <div class="row cabecera_listado">
                <div class="invertido col-9 p-2 pl-3">
                    NOTICIA
                </div>
                <div class="invertido col-3 text-right p-2 pr-3">
                    ACCIONES
                </div>
            </div>
            <!-- recorro las noticias -->
            <?php while ($noticia = $datos->fetchObject()){ ?>
                <div class="row item_listado">
                    <div class="col-9">
                        <!-- Nombre de noticia y enlace a editar -->
                        <a href="<?php echo $_SESSION['home'] ?>panel/noticias/editar/<?php echo $noticia->id ?>" title="editar noticia">
                            <?php echo $noticia->titulo ?>
                        </a>
                    </div>
                    <div class="col-3 text-right">
                        <!-- editar -->
                        <a href="<?php echo $_SESSION['home'] ?>panel/noticias/editar/<?php echo $noticia->id ?>" title="editar noticia">
                            <i class="fas fa-pen"></i>
                        </a>
                        <!-- home / no home -->
                        <?php $clase = ($noticia->home == 1) ? "verde" : "rojo" ?>
                        <a class="<?php echo $clase ?>" href="<?php echo $_SESSION['home'] ?>panel/noticias/home/<?php echo $noticia->id ?>" title="poner o no en la home la noticia">
                            <i class="fas fa-home"></i>
                        </a>
                        <!-- activar / desactivar -->
                        <?php $clase = ($noticia->activo == 1) ? "verde" : "rojo" ?>
                        <?php $icono = ($noticia->activo == 1) ? "up" : "down" ?>
                        <a class="<?php echo $clase ?>" href="<?php echo $_SESSION['home'] ?>panel/noticias/activar/<?php echo $noticia->id ?>" title="activar/desactivar noticia">
                            <i class="far fa-thumbs-<?php echo $icono ?>"></i>
                        </a>
                        <!-- borrar -->
                        <a class="boton_borrar" data-id="<?php echo $noticia->id ?>" title="borrar noticia">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                    <!-- mensaje borrar -->
                    <div class="mensaje_borrar col-12" id="<?php echo $noticia->id ?>">
                        <p>¿Seguro que desea borrar la noticia <strong><?php echo $noticia->titulo ?></strong>?</p>
                        <p>Esta acción no se puede deshacer</p>
                        <a href="<?php echo $_SESSION['home'] ?>panel/noticias/borrar/<?php echo $noticia->id ?>" title="borrar noticia">
                            Borrar
                        </a>
                        <a class="boton_borrar" data-id="<?php echo $noticia->id ?>">
                            Cancelar
                        </a>
                    </div>
                </div>
                <div class="border-bottom"></div>
            <?php } ?>
        </div>
    </div>
</div>