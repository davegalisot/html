<div class="text-center">
    <h2 class="encabezado">Game Time de Jugadores</h2>
</div>
<?php date_default_timezone_set('Europe/Madrid'); ?>
<?php setlocale(LC_TIME, 'spanish'); ?>
<table class="forum mx-auto marginTop border lista_actividad gametime">
    <tr class="centeredText">
        <th>Jugador</th>
        <th>Horario</th>
        <th>Días</th>
        <th>Juegos</th>
        <th>Plataforma</th>
    </tr>
    <?php if ($datos->rowCount() == 0){ ?>
        <tr>
            <td width="99%">No hay temas que mostrar</td>
        </tr>
    <?php }else{ ?>
        <?php while ($users = $datos->fetchObject()) { ?>
            <tr>
                <!-- Jugador -->
                <td class="text-center"><?php echo $users->usuario ?></td>
                <!-- Horario -->
                <td class="text-center border-left border-right"><?php echo strftime("%M:%H", strtotime($users->horario_init))." - ".strftime("%M:%H", strtotime($users->horario_fin)) ?></td>
                <!-- Días -->
                <td class="text-center">
                    <?php $dias_array = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"] ?>
                    <?php $array_final = array() ?>
                    <?php $res = $data->fetch(PDO::FETCH_NUM) ?>
                    <?php for ($i = 0;$i < count($res); $i++){ ?>
                        <?php if ($res[$i][0] == 1) { ?>
                            <?php array_push($array_final, $dias_array[$i]) ?>
                        <?php } ?>
                    <?php } ?>
                    <?php echo implode(", ",$array_final) ?>
                </td>
                <!-- Juegos -->
                <td class="text-center border-left">
                    <?php $res = $moreData->fetch(PDO::FETCH_NUM) ?>
                    <?php $array_final = array() ?>
                    <?php echo implode(", ", $res) ?>
                </td>
                <!-- plataformas -->
                <td class="text-center border-left">
                    <?php $plat_array = ["PC", "Android", "PlayStation 4", "iOS", "Xbox One", "Switch"] ?>
                    <?php $res = $evenMoreData->fetch(PDO::FETCH_NUM) ?>
                    <?php $array_final = array() ?>
                    <?php for ($i = 0;$i < count($res); $i++){ ?>
                        <?php if ($res[$i][0] == 1) { ?>
                            <?php array_push($array_final, $plat_array[$i]) ?>
                        <?php } ?>
                    <?php } ?>
                    <?php echo implode(", ",$array_final) ?>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>