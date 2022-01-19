    <!-- Muestra mensajes y los borra para que no vuelvan a salir -->
    <div class="mensajes">
        <!--            <div class="d-flex justify-content-end mt-1 mr-2">-->
        <!--                <input id="themeChanger" type="checkbox" checked data-toggle="toggle" data-on="Light Theme"-->
        <!--                       data-off="Dark Theme" data-offstyle="info" data-width="130">-->
        <!--            </div>-->
        <?php if (isset($_SESSION["mensaje"]) and count($_SESSION["mensaje"]) > 0) { ?>
            <div class="container alert alert-<?php echo $_SESSION["mensaje"]["tipo"] ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["mensaje"]["texto"] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    </div>
