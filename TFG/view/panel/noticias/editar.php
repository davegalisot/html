<div class="container mb-5">
    <!-- Cabecera e iconos -->
    <div class="row">
        <h3 class="col-9 mt-2"><?php echo ($datos->id) ? "EDITAR " : "CREAR " ?> NOTICIA con ID: <?php echo $datos->id ?></h3>
        <div class="col-3 iconos text-right">
            <a class="mr-2" href="<?php echo $_SESSION['home'] ?>panel/noticias" title="volver">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            <a href="#" onclick="editar.submit()" title="guardar">
                <i class="far fa-save"></i>
            </a>
        </div>
    </div>
    <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
    <!-- Formulario de subida de datos -->
    <form method="POST" name="editar" action="<?php echo $_SESSION['home'] ?>panel/noticias/editar/<?php echo $id ?>" enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="si">
        <div class="row">
            <div class="col-6">
                <!-- Fuente (web) -->
                <p class="m-0 mt-3 font-weight-bold">Fuente (web):</p>
                <!-- autocomplete="nope" con off no funciona, chrome sigue autocompletando, de esta
                 forma no sabe leer el valor y se rinde y no autocompleta *******source:
                 https://stackoverflow.com/questions/43217431/how-to-stop-chrome-from-autocompleting-text-areas -->
                <textarea name="web" rows="3" autocomplete="nope"><?php echo $datos->web ?></textarea>
                <!-- Descripción -->
                <p class="m-0 mt-3 font-weight-bold">Descripción:</p>
                <textarea name="descripcion" rows="3"><?php echo $datos->descripcion ?></textarea>
                <!-- Fecha de alta -->
                <p class="m-0 mt-3 font-weight-bold">Fecha de alta:</p>
                <input type="date" name="fecha_alta" value="<?php echo $datos->fecha_alta ?>">
                <!-- subir imagen -->
                <p class="m-0 mt-3 font-weight-bold">Imagen:</p>
                <input type="file" name="imagenNoticia">
            </div>
            <div class="col-6">
                <!-- Título -->
                <p class="m-0 mt-3 font-weight-bold">Título:</p>
                <textarea name="titulo" rows="3"><?php echo $datos->titulo ?></textarea>
                <!-- URL -->
                <p class="m-0 mt-3 font-weight-bold">URL:</p>
                <textarea name="url" rows="3"><?php echo $datos->url ?></textarea>
                <!-- Fecha de modificación -->
                <p class="m-0 mt-3 font-weight-bold">Fecha de modificación:</p>
                <input type="date" name="fechamodificacion" value="<?php echo $datos->fecha_modificacion ?>">
            </div>
        </div>
    </form>
    <!-- Muestro la imagen del noticia -->
    <div class="d-flex mt-5 justify-content-center">
        <div>
            <!-- comprueba si existe la imagen y la muestra -->
            <p class="m-0 ml-2 font-weight-bold">Imagen de la Noticia:</p>
            <?php if (is_file($_SESSION['img']."noticias/".$id.".jpg")){ ?>
                <img class="imagen m-2" src="<?php echo $_SESSION['public']."img/noticias/".$id.".jpg" ?>">
            <?php }else{ ?>
                <img class="imagen m-2" src="<?php echo $_SESSION['public']."img/noticias/inf.png" ?>">
            <?php } ?>
        </div>
    </div>
    <div class="iconos d-flex justify-content-center mt-5">
        <a class="btn btnCustom" href="#" onclick="editar.submit()">Guardar</a>
    </div>
    <div class="iconos d-flex justify-content-center mt-2">
        <a href="<?php echo $_SESSION['home'] ?>panel/noticias" title="volver">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
    </div>
</div>