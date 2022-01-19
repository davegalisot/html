<div class="text-center">
    <h2 class="encabezado">Foro</h2>
</div>
<?php date_default_timezone_set('Europe/Madrid'); ?>
<?php setlocale(LC_TIME, 'spanish'); ?>
<table class="forum mx-auto marginTop border lista_actividad">
    <tr>
        <th class="topic">Presentación</th>
        <th class="replies text-center">Respuestas</th>
        <th class="replies text-center">Vistas</th>
        <th class="replies text-center">Actividad</th>
    </tr>
    <?php if ($datos->rowCount() == 0){ ?>
        <tr>
            <td width="99%">No hay temas que mostrar</td>
        </tr>
    <?php }else{ ?>
        <?php while ($posts = $datos->fetchObject()) { ?>
            <tr>
                <td><a class="enlance" href="<?php echo $_SESSION['home'] ?>forum/post/<?php echo $posts->id ?>"><?php echo $posts->titulo ?></a></td>
                <td class="text-center"><?php echo $posts->replies ?></td>
                <td class="text-center"><?php echo $posts->views ?></td>
                <td class="text-center"><?php echo strftime("%d %B %G", strtotime($posts->fecha)) ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>
<table class="forum mx-auto marginTop border lista_actividad">
    <tr>
        <th class="topic">General</th>
        <th class="replies text-center">Respuestas</th>
        <th class="replies text-center">Vistas</th>
        <th class="replies text-center">Actividad</th>
    </tr>
    <?php if ($data->rowCount() == 0){ ?>
        <tr>
            <td width="99%">No hay temas que mostrar</td>
        </tr>
    <?php }else{ ?>
        <?php while ($posts = $data->fetchObject()) { ?>
            <tr>
                <td><a class="enlance" href="<?php echo $_SESSION['home'] ?>forum/post/<?php echo $posts->id ?>"><?php echo $posts->titulo ?></a></td>
                <td class="text-center"><?php echo $posts->replies ?></td>
                <td class="text-center"><?php echo $posts->views ?></td>
                <td class="text-center"><?php echo strftime("%d %B %G", strtotime($posts->fecha)) ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>
<table class="forum mx-auto marginTop border lista_actividad">
    <tr>
        <th class="topic">Plataformas</th>
        <th class="replies text-center">Respuestas</th>
        <th class="replies text-center">Vistas</th>
        <th class="replies text-center">Actividad</th>
    </tr>
    <?php if ($moreData->rowCount() == 0){ ?>
        <tr>
            <td width="99%">No hay temas que mostrar</td>
        </tr>
    <?php }else{ ?>
        <?php while ($posts = $moreData->fetchObject()) { ?>
            <tr>
                <td><a class="enlance" href="<?php echo $_SESSION['home'] ?>forum/post/<?php echo $posts->id ?>"><?php echo $posts->titulo ?></a></td>
                <td class="text-center"><?php echo $posts->replies ?></td>
                <td class="text-center"><?php echo $posts->views ?></td>
                <td class="text-center"><?php echo strftime("%d %B %G", strtotime($posts->fecha)) ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>
<table class="forum mx-auto marginTop border lista_actividad">
    <tr>
        <th class="topic">Punto de encuentro</th>
        <th class="replies text-center">Respuestas</th>
        <th class="replies text-center">Vistas</th>
        <th class="replies text-center">Actividad</th>
    </tr>
    <?php if ($evenMoreData->rowCount() == 0){ ?>
        <tr>
            <td width="99%">No hay temas que mostrar</td>
        </tr>
    <?php }else{ ?>
        <?php while ($posts = $evenMoreData->fetchObject()) { ?>
            <tr>
                <td><a class="enlance" href="<?php echo $_SESSION['home'] ?>forum/post/<?php echo $posts->id ?>"><?php echo $posts->titulo ?></a></td>
                <td class="text-center"><?php echo $posts->replies ?></td>
                <td class="text-center"><?php echo $posts->views ?></td>
                <td class="text-center"><?php echo strftime("%d %B %G", strtotime($posts->fecha)) ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>
<table class="forum mx-auto marginTop border lista_actividad">
    <tr>
        <th class="topic">Off-topic</th>
        <th class="replies text-center">Respuestas</th>
        <th class="replies text-center">Vistas</th>
        <th class="replies text-center">Actividad</th>
    </tr>
    <?php if ($dataEverywhere->rowCount() == 0){ ?>
        <tr>
            <td width="99%">No hay temas que mostrar</td>
        </tr>
    <?php }else{ ?>
        <?php while ($posts = $dataEverywhere->fetchObject()) { ?>
            <tr>
                <td><a class="enlance" href="<?php echo $_SESSION['home'] ?>forum/post/<?php echo $posts->id ?>"><?php echo $posts->titulo ?></a></td>
                <td class="text-center"><?php echo $posts->replies ?></td>
                <td class="text-center"><?php echo $posts->views ?></td>
                <td class="text-center"><?php echo strftime("%d %B %G", strtotime($posts->fecha)) ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>
<div class="iconos d-flex justify-content-center m-5">
    <a class="btn btnCustom" href="<?php echo $_SESSION['home'] ?>forum/crear">Crear Tema</a>
</div>