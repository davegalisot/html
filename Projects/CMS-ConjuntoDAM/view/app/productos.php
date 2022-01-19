<div class="text-center">
    <h2 class="encabezado">Escaparate</h2>
    <hr>
</div>
<div class="m-5">
    <section>
        <?php while ($producto = $datos->fetchObject()) { ?>
            <a href="<?php echo $_SESSION['home'] ?>producto/<?php echo $producto->id ?>">
                <article>
                    <div class="imgProductos">
                        <?php $id = $producto->id ?>
                        <?php $id = ($id < 9) ? ("0000000000".$id) : ("000000000".$id) ?>
                        <?php if (is_file($_SESSION["img"].$id.".png")){ ?>
                            <img class="escala" src="<?php echo $_SESSION["public"]."img/".$id.".png" ?>">
                        <?php } ?>
                    </div>
                    <div>
                        <h3 class="h4"><?php echo $producto->nombre ?></h3>
                        <p><?php echo $producto->precio."\xE2\x82\xAc" ?></p>
                    </div>
                    <div id="ver">Ver detalles</div>
                </article>
            </a>
        <?php } ?>
    </section>
</div>