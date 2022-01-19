<div class="container">
    <div class="text-center">
        <h2 class="encabezado"><?php echo ($datos->id) ? "Editar " : "Crear " ?>Post</h2>
    </div>
    <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
    <!-- Formulario de subida de datos -->
    <form method="POST" name="editar" action="<?php echo $_SESSION['home'] ?>forum/editar/<?php echo $id ?>"
          enctype="multipart/form-data">
        <input type="hidden" name="guardar" value="si">
        <div class="categoria">
            <label class="font-weight-bold" for="categoria">Categoría:</label>
            <?php $categories = ["presentacion","general","plataformas","punto_encuentro","off_topic"] ?>
            <?php $catNames = ["Presentación","General","Plataformas","Punto de encuentro","Off-topic"] ?>
            <select name="categoria">
                <?php for ($i=0; $i < count($categories) ; $i++) { ?>
                    <?php ($datos->categoria == $categories[$i]) ? $selected = "selected" : $selected = "" ?>
                    <option value="<?php echo $categories[$i] ?>" <?php echo $selected ?>><?php echo $catNames[$i] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="">
            <!-- Título -->
            <p class="m-0 mt-3 font-weight-bold">Título:</p>
            <textarea name="titulo" rows="1"><?php echo $datos->titulo ?></textarea>
        </div>
        <div class="">
            <!-- Descripción -->
            <p class="m-0 mt-3 font-weight-bold">Texto:</p>
            <textarea name="texto" rows="20"><?php echo $datos->texto ?></textarea>
        </div>
    </form>
    <!-- Botón Guardar -->
    <div class="iconos d-flex justify-content-center mt-5">
        <a class="btn btnCustom" href="#" onclick="editar.submit()">Guardar</a>
    </div>
    <!-- Botón Volver -->
    <div class="iconos d-flex justify-content-center mt-2">
        <a href="<?php echo $_SESSION['home'] ?>forum" title="volver">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
    </div>
</div>