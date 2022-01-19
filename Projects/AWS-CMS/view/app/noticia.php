    <div class="container">
        <!-- recorro los usuarios -->
        <?php while ($noticia = $datos->fetchObject()){ ?>
        <div>
            <p>Título: <?php echo $noticia->titulo ?></p>
        </div>
        <div>
            <p>Entradilla: <?php echo $noticia->entradilla ?></p>
        </div>
        <div>

        </div>
        <?php } ?>
    </div>