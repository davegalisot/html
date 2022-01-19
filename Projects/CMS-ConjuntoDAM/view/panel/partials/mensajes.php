        <!-- Muestra mensajes y los borra para que no vuelvan a salir -->
        <div class="guardaEspacioMensajes">
            <?php if (isset($_SESSION["mensaje"]) and count($_SESSION["mensaje"]) > 0) { ?>
                <div class="container alert alert-<?php echo $_SESSION["mensaje"]["tipo"] ?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["mensaje"]["texto"] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- borra mensajes -->
<!--                --><?php //unset($_SESSION["mensaje"]) ?>
            <?php } ?>
        </div>