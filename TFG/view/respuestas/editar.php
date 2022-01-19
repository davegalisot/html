<div class="container">
    <div class="text-center">
        <h2 class="encabezado"><?php echo ($datos->id) ? "Editar " : "Crear " ?>Respuesta</h2>
    </div>
    <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
    <!-- Formulario de subida de datos -->
    <form method="POST" name="editar" action="<?php echo $_SESSION['home'] ?>respuestas/editar/<?php echo $id ?>"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="si">
        <div class="row edicion">
            <div class="col-12">
                <!-- texto -->
                <p class="m-0 mt-3"><strong>Texto:</strong></p>
                <textarea name="texto" rows="3"><?php echo $datos->texto ?></textarea>
            </div>
        </div>
    </form>
    <div class="iconos d-flex justify-content-center mt-5">
        <a class="btn btnCustom" href="#" onclick="editar.submit()">Guardar Respuesta</a>
    </div>
    <div class="iconos d-flex justify-content-center mt-3">
        <a class="mr-2" href="<?php echo $_SESSION['home'] ?>forum ?>" title="volver">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
    </div>
</div>