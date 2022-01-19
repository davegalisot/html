<div class="container">
    <!-- cabecera e iconos -->
    <div class="row">
        <h3 class="col-9 mt-2"><?php echo ($datos->id) ? "EDITAR" : "CREAR" ?> USUARIO</h3>
        <div class="col-3 iconos text-right">
            <a class="mr-2" href="<?php echo $_SESSION["home"] ?>panel/usuarios" title="volver">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            <a href="#" onclick="editar.submit()" title="guardar">
                <i class="far fa-save"></i>
            </a>
        </div>
    </div>
    <div class="separado_superior">
        <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
        <form name="editar" action="<?php echo $_SESSION["home"] ?>panel/usuarios/editar/<?php echo $id ?>" method="post">
            <div class="row borde padding">
                <div class="col-6">
                    <p class="m-0 mt-3">Usuario:</p>
                    <input type="text" name="usuario" value="<?php echo $datos->usuario ?>" autocomplete="off">
                    <p class="m-0 mt-1">Password:</p>
                    <?php $clase = ($datos->id) ? "" : "d-none" ?>
                    <p class="<?php echo $clase ?>">
                        <input type="checkbox" name="cambiar_clave" >Pincha para cambiar la clave</p>
                    <?php $clase2 = ($datos->id) ? "d-none" : "" ?>
                    <input class="<?php echo $clase2 ?>" type="password" name="clave">
                </div>
                <div class="col-6">
                    <p>Último acceso:</p>
                    <p><?php echo date("d/m/Y m:i", strtotime($datos->fecha_acceso)) ?></p>
                    <p class="mt-4">Permisos:</p>
                    <p class="m-0">
                        <input type="checkbox" name="productos" <?php echo ($datos->productos == 1) ? "checked" : "" ?>>Productos
                    </p>
                    <p class="m-0">
                        <input type="checkbox" name="usuarios" <?php echo ($datos->usuarios == 1) ? "checked" : "" ?>>Usuarios
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>