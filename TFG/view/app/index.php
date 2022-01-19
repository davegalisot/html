<div class="text-center">
    <h2 class="encabezado">Noticias destacadas</h2>
</div>
<div class="m-5">
    <section>
        <?php while ($noticia = $datos->fetchObject()) { ?>
            <a class="border-bottom" href="<?php echo $noticia->url ?>">
                <article>
                    <div class="m-0 titulillo d-flex justify-content-between">
                        <p class="m-0 h5"><?php echo $noticia->web ?></p>
                        <!-- locale para las fechas -->
                        <?php date_default_timezone_set('Europe/Madrid'); ?>
                        <?php setlocale(LC_TIME, 'spanish'); ?>
                        <p class="m-0 h5 fecha"><?php echo strftime("%d %B %G", strtotime($noticia->fecha_modificacion)) ?></p>
                    </div>
                    <div class="imgProductos">
                        <?php $id = $noticia->id ?>
                        <?php if (is_file($_SESSION["img"]."noticias/".$id.".jpg")){ ?>
                            <img src="<?php echo $_SESSION["public"]."img/noticias/".$id.".jpg" ?>">
                        <?php }else{ ?>
                            <img src="<?php echo $_SESSION["public"]."img/noticias/inf.png" ?>">
                        <?php } ?>
                    </div>
                    <div>
                        <h3 class="tituloNoticia h4 mt-1"><?php echo $noticia->titulo ?></h3>
                        <p class="descripcionNoticia text-justify"><?php echo $noticia->descripcion ?></p>
                    </div>
                </article>
            </a>
        <?php } ?>
    </section>
</div>