    <div class="d-flex justify-content-center mt-4 mb-4">
    <!-- recorro las noticias -->
    <?php while ($noticia = $datos->fetchObject()){ ?>
        <a href="<?php echo $_SESSION["home"]."noticia/".$noticia->slug ?>">
            <div class="containerUser borde separado">
                <div class="m-2 p-2">
                    <div>
                        <p class="m-0 fecha"><?php echo $noticia->fecha ?></p>
                    </div>
                    <h2 class="tituloNoticia"><?php echo $noticia->titulo ?></h2>
                    <?php if (is_file($_SESSION['img'].$noticia->id.".jpg")){ ?>
                    <img class="imagen" src="<?php echo $_SESSION['public'].'img/'.$noticia->id.'.jpg'?>">
                    <?php } ?>
                    <p class="textoNoticia"><?php echo $noticia->texto ?></p>
                    <p class="text-right autor">by <?php echo $noticia->autor ?></p>
                </div>
            </div>
        </a>
    <?php } ?>
    </div>
