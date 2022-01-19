        <div id="navbar-movil">
            <nav class="navbar navbar-dark navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars"></i></span>
<!--                    <span>MENÚ</span>-->
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo $_SESSION["public"] ?>">inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>quienes_somos">quienes somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>movilidad">movilidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>logistica">logística</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>infraestructura">infraestructura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>analisis">analisis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>consultoria">consultoría</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>contacto"contacto>contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $_SESSION["home"] ?>portfolio"portfolio>portfolio</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <a id="btn-go-to-top" title="Go to top"><img src="<?php echo $_SESSION["public"]."img/iconos/arrow-circle-up-solid.svg"?>"></a>