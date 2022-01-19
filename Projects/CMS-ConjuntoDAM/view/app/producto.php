    <?php $producto = $datos->fetchObject() ?>
    <div class="content d-flex justify-content-center zIndex">
        <div class="mr-3">
            <div class="slider">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php $id = $producto->id ?>
                            <?php $id = ($id < 9) ? ("0000000000".$id) : ("000000000".$id) ?>
                            <img class="d-block w-100" src="<?php echo $_SESSION["public"]."img/".$id.".png" ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_SESSION["public"]."img/png/".$id."-0.png" ?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_SESSION["public"]."img/png/".$id."-1.png" ?>" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $_SESSION["public"]."img/png/".$id."-2.png" ?>" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="blanco detalles">
            <div class="pt-3 ml-3 mr-3">
                <h2><?php echo $producto->nombre ?></h2>
                <h2 class="precio"><?php echo $producto->precio."\xE2\x82\xAc" ?></h2>
            </div>
            <div class="fondo"></div>
            <div class="pt-3 ml-3 mr-3">
                <h4>Características:</h4>
                <ul>
                    <?php if ($producto->texto1){ ?>
                        <li class="mt-2"><?php echo $producto->texto1 ?></li>
                    <?php } ?>
                    <?php if ($producto->texto2){ ?>
                        <li class="mt-2"><?php echo $producto->texto2 ?></li>
                    <?php } ?>
                    <?php if ($producto->texto3){ ?>
                        <li class="mt-2"><?php echo $producto->texto3 ?></li>
                    <?php } ?>
                    <?php if ($producto->texto4){ ?>
                    <li class="mt-2"><?php echo $producto->texto4 ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <a class="btn btnCustom" href="<?php echo $_SESSION['home'] ?>productos">Volver</a>
    </div>