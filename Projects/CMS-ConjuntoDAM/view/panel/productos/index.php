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
            <?php while ($producto = $datos->fetchObject()){ ?>
                <div class="row item_listado">
                    <div class="col-9">
                        <!-- Nombre de noticia y enlace a editar -->
                        <a href="<?php echo $_SESSION['home'] ?>panel/productos/editar/<?php echo $producto->id ?>" title="editar producto">
                            <?php echo $producto->nombre ?>
                        </a>
                    </div>
                    <div class="col-3 text-right">
                        <!-- editar -->
                        <a href="<?php echo $_SESSION['home'] ?>panel/productos/editar/<?php echo $producto->id ?>" title="editar producto">
                            <i class="fas fa-pen"></i>
                        </a>
                        <!-- home / no home -->
                        <?php $clase = ($producto->destacado == 1) ? "verde" : "rojo" ?>
                        <a class="<?php echo $clase ?>" href="<?php echo $_SESSION['home'] ?>panel/productos/home/<?php echo $producto->id ?>" title="poner o no en la home la producto">
                            <i class="fas fa-home"></i>
                        </a>
                        <!-- activar / desactivar -->
                        <?php $clase = ($producto->destacado == 1) ? "verde" : "rojo" ?>
                        <?php $icono = ($producto->destacado == 1) ? "up" : "down" ?>
                        <a class="<?php echo $clase ?>" href="<?php echo $_SESSION['home'] ?>panel/productos/activar/<?php echo $producto->id ?>" title="activar/desactivar producto">
                            <i class="far fa-thumbs-<?php echo $icono ?>"></i>
                        </a>
                        <!-- borrar -->
                        <a class="boton_borrar" data-id="<?php echo $producto->id ?>" title="borrar producto">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                    <!-- mensaje borrar -->
                    <div class="mensaje_borrar col-12" id="<?php echo $producto->id ?>">
                        <p>¿Seguro que desea borrar la noticia <strong><?php echo $producto->titulo ?></strong>?</p>
                        <p>Esta acción no se puede deshacer</p>
                        <a href="<?php echo $_SESSION['home'] ?>panel/productos/borrar/<?php echo $producto->id ?>" title="borrar producto">
                            Borrar
                        </a>
                        <a class="boton_borrar" data-id="<?php echo $producto->id ?>">
                            Cancelar
                        </a>
                    </div>
                </div>
                <div class="border-bottom"></div>
            <?php } ?>
        </div>
    </div>
</div>