        <?php if (isset($_SESSION["usuario"])){ ?>
        <nav class="navbar navbar-light justify-content-center">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item"><a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel">Home Panel de Administración</a></li>
                <?php if ($_SESSION["usuario"]->productos == 1){ ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel/productos">Productos</a></li>
                    <?php } ?>
                <?php if ($_SESSION["usuario"]->usuarios == 1){ ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel/usuarios">Usuarios</a></li>
                <?php } ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel/salir">Salir</a></li>
            </ul>
        </nav>
        <?php } ?>
