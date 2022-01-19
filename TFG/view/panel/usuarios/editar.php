<div class="container mb-5">
    <!-- cabecera e iconos -->
    <div class="text-center">
        <h2 class="encabezado"><?php echo ($datos->id) ? "Editar" : "Crear" ?><?php echo ($datos->admin == 1 ) ? " Usuario" : " Datos"?></h2>
    </div>
    <div class="separado_superior">
        <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
        <form method="POST" name="editar" action="<?php echo $_SESSION["home"] ?>panel/usuarios/editar/<?php echo $id ?>" enctype="multipart/form-data">
            <input type="hidden" name="guardar" value="si">
            <div class="borde widthSmall mx-auto">
                <h3 class="tituloDatos">Datos de Inicio de sesión</h3>
                <div class="padding m-auto">
                    <div class="text-left">
                        <p class="m-0 mt-3">Usuario: (como te ven los demás)</p>
                        <input type="text" name="usuario" value="<?php echo $datos->usuario ?>" autocomplete="off">
                        <p class="m-0 mt-1">Contraseña:</p>
                        <?php $clase = ($datos->id) ? "" : "d-none" ?>
                        <p class="<?php echo $clase ?>">
                            <input type="checkbox" name="cambiar_clave" >Pincha para cambiar la contraseña</p>
                        <?php $clase2 = ($datos->id) ? "d-none" : "" ?>
                        <input class="<?php echo $clase2 ?>" type="password" name="clave">
                    </div>
                </div>
            </div>
            <div class="borde separado_superior widthStandard mx-auto">
                <h3 class="tituloDatos">Datos Personales</h3>
                <div class="row padding">
                    <div class="col-6 mx-auto">
                        <!-- NOMBRE -->
                        <p class="m-0 mt-3">Nombre:</p>
                        <input type="text" name="nombre" value="<?php echo $datos->nombre ?>" autocomplete="off">
                        <!-- array con provincias para el select con tildes -->
                        <?php $provinciasBien=array("Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", 
                            "Badajoz", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", 
                            "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", 
                            "Huelva", "Huesca", "Islas Baleares", "Jaén", "La Coruña", "La Rioja", "Las Palmas", 
                            "León", "Lérida", "Lugo", "Madrid", "Málaga", "Murcia", "Navarra", "Orense", "Palencia", 
                            "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", 
                            "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza") ?>
                        <!-- array con provincias sin tildes para insertar en la base de datos -->
                        <?php $provincias=array("Alava", "Albacete", "Alicante", "Almeria", "Asturias", "Avila",
                            "Badajoz", "Barcelona", "Burgos", "Caceres", "Cadiz", "Cantabria", "Castellon",
                            "Ciudad Real", "Cordoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipuzcoa",
                            "Huelva", "Huesca", "Islas Baleares", "Jaen", "La Coruña", "La Rioja", "Las Palmas",
                            "Leon", "Lerida", "Lugo", "Madrid", "Malaga", "Murcia", "Navarra", "Orense", "Palencia",
                            "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria",
                            "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza") ?>
                        <!-- PROVINCIA -->
                        <p class="m-0 mt-3">Provincia:</p>
                        <select name="provincias">
                            <?php for ($i=0; $i < count($provincias) ; $i++) { ?>
                                <?php ($datos->provincia == $provincias[$i]) ? $selected = "selected" : $selected = "" ?>
                                <option value="<?php echo $provincias[$i] ?>" <?php echo $selected ?>><?php echo $provinciasBien[$i] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-6 mx-auto">
                        <!-- CORREO -->
                        <p class="m-0 mt-3">Correo electrónico:</p>
                        <input type="text" name="correo" value="<?php echo $datos->correo ?>" autocomplete="off">
                        <!-- CIUDAD -->
                        <p class="m-0 mt-3">Ciudad:</p>
                        <input type="text" name="ciudad" value="<?php echo $datos->ciudad ?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="borde separado_superior mx-auto">
                <h3 class="tituloDatos">Datos GameTime</h3>
                <div class="row">
                    <div class="col-6">
                        <p class="ml-3 mt-4">¿Qué días juegas?</p>
                        <div class="row padding mx-auto">
                            <div class="col-6">
                                <p class="m-0">
                                    <input type="checkbox" name="dia" <?php echo ($datos->dia == 1) ? "checked" : "" ?>> Lunes
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="dia3" <?php echo ($datos->dia3 == 1) ? "checked" : "" ?>> Miércoles
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="dia5" <?php echo ($datos->dia5 == 1) ? "checked" : "" ?>> Viernes
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="dia7" <?php echo ($datos->dia7 == 1) ? "checked" : "" ?>> Domingo
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="m-0">
                                    <input type="checkbox" name="dia2" <?php echo ($datos->dia2 == 1) ? "checked" : "" ?>> Martes
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="dia4" <?php echo ($datos->dia4 == 1) ? "checked" : "" ?>> Jueves
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="dia6" <?php echo ($datos->dia6 == 1) ? "checked" : "" ?>> Sábado
                                </p>
                            </div>
                        </div>
                        <p class="ml-3 mt-2">¿En qué horario juegas cada día?</p>
                        <div class="row padding mx-auto mb-2">
                            <div class="col-6">
                                <!-- HORARIO INICIAL -->
                                <p class="m-0">Desde:</p>
                                <input type="text" name="horario_init" value="<?php echo strftime("%M:%H", strtotime($datos->horario_init)) ?>" autocomplete="off">
                            </div>
                            <div class="col-6">
                                <!-- HORARIO FINAL -->
                                <p class="m-0">Hasta:</p>
                                <input type="text" name="horario_fin" value="<?php echo strftime("%M:%H", strtotime($datos->horario_fin)) ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 border-left">
                        <p class="ml-3 mt-4">¿En qué plataforma juegas?</p>
                        <div class="row padding mx-auto">
                            <div class="col-6">
                                <p class="m-0">
                                    <input type="checkbox" name="plat" <?php echo ($datos->plat == 1) ? "checked" : "" ?>> PC
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="plat3" <?php echo ($datos->plat3 == 1) ? "checked" : "" ?>> PlayStation 4
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="plat5" <?php echo ($datos->plat5 == 1) ? "checked" : "" ?>> Xbox One
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="m-0">
                                    <input type="checkbox" name="plat2" <?php echo ($datos->plat2 == 1) ? "checked" : "" ?>> Android
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="plat4" <?php echo ($datos->plat4 == 1) ? "checked" : "" ?>> iOS
                                </p>
                                <p class="m-0">
                                    <input type="checkbox" name="plat6" <?php echo ($datos->plat6 == 1) ? "checked" : "" ?>> Switch
                                </p>
                            </div>
                        </div>
                        <p class="ml-3 mt-2">Introduce juegos a los que juegas</p>
                        <div class="row padding mx-auto mb-2">
                            <div class="col-6">
                                <!-- JUEGO 1 -->
                                <p class="m-0">Un Juego:</p>
                                <input type="text" name="juego" value="<?php echo $datos->juego ?>" autocomplete="off">
                                <!-- JUEGO 3 -->
                                <p class="m-0">Otro Juego:</p>
                                <input type="text" name="juego3" value="<?php echo $datos->juego3 ?>" autocomplete="off">
                            </div>
                            <div class="col-6">
                                <!-- JUEGO 2 -->
                                <p class="m-0">Otro Juego:</p>
                                <input type="text" name="juego2" value="<?php echo $datos->juego2 ?>" autocomplete="off">
                                <!-- JUEGO 4 -->
                                <p class="m-0">Otro Juego:</p>
                                <input type="text" name="juego4" value="<?php echo $datos->juego4 ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-center m-0 pb-4 pt-3">
                        <input type="checkbox" name="game_time" <?php echo ($datos->destacado == 1) ? "checked" : "" ?>>Hacer público mi Gametime
                    </p>
                </div>
            </div>
            <!-- Foto de Perfil -->
            <div class="borde separado_superior widthStandard mx-auto text-center pt-2 pb-2">
                <div class="d-flex pt-2 justify-content-center">
                    <div>
                        <!-- comprueba si existe la imagen y la muestra -->
                        <p class="m-0 ml-2 tituloDatos">Foto de Perfil:</p>
                        <?php if (is_file($_SESSION['img']."foto/".$id.".jpg")){ ?>
                            <img class="imgPerfil m-2" src="<?php echo $_SESSION['public']."img/foto/".$id.".jpg" ?>">
                        <?php }else{ ?>
                            <img class="imgPerfil m-2" src="<?php echo $_SESSION['public']."img/foto/fotoDefault.png" ?>">
                        <?php } ?>
                    </div>
                </div>
                <!-- subir imagen -->
                <div class="p-3">
                    <p class="m-0 font-weight-bold">Subir Foto:</p>
                    <input type="file" name="foto">
                </div>
            </div>
            <?php if ($datos->admin == 1){ ?>
                <div class="borde separado_superior widthStandard mx-auto text-center">
                    <p class="pt-3 mb-0">fecha de alta: <?php echo strftime("%d %B %G %H:%M", strtotime($datos->fecha_alta))?></p>
                    <div class="pt-2 pb-3 ml-3 mx-auto">
                        <p class="mt-1">Admin:</p>
                        <p class="m-0">
                            <input type="checkbox" name="admin" <?php echo ($datos->admin == 1) ? "checked" : "" ?>> Admin
                        </p>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
    <div class="iconos d-flex justify-content-center mt-5">
        <a class="btn btnCustom" href="#" onclick="editar.submit()">Guardar</a>
    </div>
    <?php if ($datos->admin == 1){ ?>
        <div class="iconos d-flex justify-content-center mt-2">
            <a href="<?php echo $_SESSION['home'] ?>panel/usuarios" title="volver">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>
    <?php }else{ ?>
        <div class="iconos d-flex justify-content-center mt-2">
            <a href="<?php echo $_SESSION['home'] ?>panel" title="volver">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>
    <?php } ?>
</div>