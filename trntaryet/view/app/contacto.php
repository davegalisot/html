<section class="mt-5 mx-auto">
    <article class="article-titulo">
        <div class="foto-titulo">
            <h1 class="text-center animated slideInUp faster">contacto</h1>
        </div>
    </article>
    <article class="article-mapa animated fadeIn">
        <div class="imagen-mapa">
        <div class="div_sedes"></div><!-- div con sedes añadidas por JQUERY -->
        <div class="iconos_mapa">
            <div>
                <!-- MADRID -->
                <a href="https://www.google.es/maps/search/C%2F+Vizconde+de+Matamala,+n%C2%BA1,+2%C2%AA+Planta/@40.4261224,-3.6657064,17z/data=!3m1!4b1?hl=es"
                   target="_blank"  title="ir a GOOGLE MAPS">
                    <img src="<?php echo $_SESSION["public"]."img/iconos/icono_maps.png" ?>">
                </a>
                <!-- BARCELONA -->
                <a href="https://www.google.es/maps/place/Calle+del+Consejo+de+Ciento,+308,+08007+Barcelona/@41.3907962,2.1632876,17z/data=!3m1!4b1!4m5!3m4!1s0x12a4a2f2a71095f1:0xbdad7d7b72df66f!8m2!3d41.3907922!4d2.1654763?hl=es"
                   target="_blank" title="ir a GOOGLE MAPS">
                    <img src="<?php echo $_SESSION["public"]."img/iconos/icono_maps.png" ?>">
                </a>
                <!-- LIMA -->
                <a href="https://www.google.es/maps/place/Guanajuato+100,+Roma+Nte.,+Cuauht%C3%A9moc,+06700+Ciudad+de+M%C3%A9xico,+CDMX,+M%C3%A9xico/@19.4168251,-99.1610149,17z/data=!3m1!4b1!4m5!3m4!1s0x85d1ff3b053cf81b:0x223de3f83b334a5!8m2!3d19.4168201!4d-99.1588262?hl=es"
                   target="_blank" title="ir a GOOGLE MAPS">
                    <img src="<?php echo $_SESSION["public"]."img/iconos/icono_maps.png" ?>">
                </a>
            </div>
            <div>
                <!-- BOGOTÁ -->
                <a href=""
                   target="_blank" title="ir a GOOGLE MAPS">
                    <img src="<?php echo $_SESSION["public"]."img/iconos/icono_maps.png" ?>">
                </a>
                <!-- MAROC -->
                <a href="https://www.google.es/maps/place/21+Avenue+Bin+Al+Ouidane,+Rabat,+Marruecos/@34.006573,-6.8530204,17z/data=!3m1!4b1!4m5!3m4!1s0xda76c8a01e1e37b:0x228557abc7442928!8m2!3d34.0065686!4d-6.8508317?hl=es"
                   target="_blank" title="ir a GOOGLE MAPS">
                    <img src="<?php echo $_SESSION["public"]."img/iconos/icono_maps.png" ?>">
                </a>
                <!-- MEXICO -->
                <a href="https://www.google.es/maps/place/Guanajuato+100,+Roma+Nte.,+Cuauht%C3%A9moc,+06700+Ciudad+de+M%C3%A9xico,+CDMX,+M%C3%A9xico/@19.4168251,-99.1610149,17z/data=!3m1!4b1!4m5!3m4!1s0x85d1ff3b053cf81b:0x223de3f83b334a5!8m2!3d19.4168201!4d-99.1588262?hl=es"
                   target="_blank" title="ir a GOOGLE MAPS">
                    <img src="<?php echo $_SESSION["public"]."img/iconos/icono_maps.png" ?>">
                </a>
            </div>
        </div>
    </article>
    <article>
        <div class="foto-debajo-mapa">
            <div class="container formulario-contacto">
                <div class="row">
                    <div class="col-5">
                        <div>
                            <p>Tlfs:</p>
                            <p>Madrid - +34 91 409 60 75</p>
                            <p>Barcelona - +34 607 074 890</p>
                            <p>Lima - +572 618 05 19</p>
                        </div>
                        <div>
                            <p>email:</p>
                            <p>info@trntaryet.com</p>
                        </div>
                        <div>
                            <a href="" target="_blank">
                                <img src="<?php echo $_SESSION["public"]."img/logos/rrss/linkedin-logo-azul-corporativo.png"?>">
                            </a>
                        </div>
                    </div>
                    <div class="col-7">
                        <p class="text-center">contacta con nosotros</p>
                        <form action="mailto:info@gtrntaryet.com" method="post" enctype="text/plain">
                            <div class="text-fields">
                                <input name="nombre" type="text" placeholder="Nombre*">
                                <input name="email" type="text" placeholder="Email*">
                                <textarea name="mensaje" type="text" rows="5" placeholder="Mensaje*"></textarea>
                                <input name="envíar" type="submit" value="ENVIAR MENSAJE">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>