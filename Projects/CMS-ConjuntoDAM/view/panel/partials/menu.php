<?php if (isset($_SESSION["usuario"])) { ?>
    <nav class="navbar navbar-expand-md">
        <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar2">
            <ul class="navbar-nav align-items-center">
                <?php if ($_SESSION["usuario"]->productos == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel/productos">Almacén</a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION["usuario"]->usuarios == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel/usuarios">Mostrador</a>
                    </li>

                    <span class="separador-navbar mr-1"> | </span>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_SESSION["home"] ?>panel/salir">Salir</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
<?php } ?>
