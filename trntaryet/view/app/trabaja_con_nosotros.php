        <?php

            if (isset($_POST["enviar"])){

                //Recupero los datos del formulario
                $nombre = filter_input(INPUT_POST, "nombre-form", FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, "email-form", FILTER_SANITIZE_EMAIL);
                $telf = filter_input(INPUT_POST, "telefono-form", FILTER_SANITIZE_NUMBER_INT);
                $mensaje = filter_input(INPUT_POST, "mensaje-form", FILTER_SANITIZE_STRING);

                //Correo desde el que se envía el mensaje
                $correo_desde = "ahernandez@trntaryet.com";

                //Receptor del mensaje
                $correo_hacia = "mreguero@trntaryet.com";               
                
                //Asunto
                $asunto_correo = "Formulario Contacto TRN TARYET de " . $nombre;
                
                //Mensaje 
                $content_html = '<h2>Contact Request Submitted</h2>
                    <p><b>Nombre:</b> ' . $nombre . '</p>
                    <p><b>Email:</b> ' . $email . '</p>
                    <p><b>Teléfono:</b> ' . $telf . '</p>
                    <p><b>Mensaje:</b><br/>' . $mensaje . '</p>';
                
                //Header para quien envía el correo
                $headers = "From: <' . $correo_desde . '>";

                

            }



        ?>        
        <section class="mt-5 mx-auto section-trabaja-con-nosotros">
            <article class="article-titulo">
                <div class="foto-titulo">
                    <h1 class="text-center tcnh1 animated slideInUp faster">trabaja con nosotros</h1>
                    <div class="blanco-tapa-h1"></div>
                </div>
            </article>
            <article class="width1000px mx-auto">
                <div class="texto-a-justificar">
                    <p>En <b><i>TRN TÁRYET</i></b> necesitamos cubrir varios puestos para Consultoría y Proyectos con diferentes
niveles de experiencia:</p>
                    <ul class="mt-3">
                        <li>Ingeniero/Consultor Jr., entre 0 y 3 años de experiencia, con ganas de aprender</li>
                        <li>Ingeniero proyectista, con al menos 2 años de experiencia</li>
                        <li>Jefe de proyectos, con al menos 8 años de experiencia en proyectos de infraestructura de transporte con base en nuestra oficina de Madrid, pero con disponibilidad para viajar.</li>
                    </ul>
                    <div class="mt-5">
                        <p>Ofrecemos trabajo en equipo en consultoría y proyectos de infraestructura de transporte en diferentes niveles de desarrollo. Especialización en proyectos ferroviarios es deseable pero no imprescindible. Conocimiento de Istram también deseable. Incorporación inmediata.</p>
                    </div>
                </div>
                <form id="trabaja-con-nosotros" class="mt-5" method="post" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between">
                        <div class="mi-input-div">
                            <p class="form-info">Los campos con asterisco (*) son obligatorios.</p>
                            <div class="mi-input mi-primer-input">
                                <label for="nombre">Nombre:*</label>
                                <input id="nombre-form" name="nombreForm" type="text"></li>
                                <p class="error error-nombre">Introduzca un nombre</p>
                            </div>
                            <div class="mi-input">
                                <label for="email">Email:*</label>
                                <input id="email-form" name="email-form" type="email"></li>
                                <p class="error error-email">Introduzca un email</p>
                            </div> 
                            <div class="mi-input">
                                <label for="telefono">Teléfono:*</label>
                                <input id="telf-form" name="telefono" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}"></li>
                                <p class="error error-telf">Introduzca un teléfono</p>
                            </div>
                            <div class="mi-input-radio form-check">
                                <input class="form-check-input" id="check-form" name="politica-privacidad" type="checkbox"></li>
                                <label class="form-check-label" for="politica-privacidad">Acepto la política de privacidad</label>
                                <p class="error error-check">Debe aceptar la política de privacidad</p>
                            </div>
                        </div>
                        <div class="mi-input-div">
                            <div class="mi-input mi-input-cv">
                                <label for="micv">Curriculum:</label>
                                <input type="file" class="form-control-file" id="micv-form" name="micv">
                                <p class="error error-attachment">Debe incluir algún archivo</p>
                            </div>
                            <div class="mi-input">
                                <label for="mensaje">Mensaje:</label>
                                <textarea id="mensaje-form" name="mensaje-form" rows="4" cols="30" placeholder="escribe aquí tu mensaje"></textarea>
                                <p class="error error-mensaje">Debe escribir un mensaje</p>
                            </div>
                            <div class="btn-enviar">
                            <input class="btn btn-secondary" type="submit" name="enviar" id="enviar-form" value="ENVIAR">
                            </div>
                        </div>
                    </div>
                </form>                
            </article>
            <article>
                <div class="texto-cualidades fondo-cualidades text-center">
                    <p>TRN TÁRYET se apoya en un equipo técnico con cuatro cualidades básicas</p>
                    <p>que lo distinguen, constituyendo una oferta diferenciada en el mercado:</p>
                </div>
                <div class="row div-cualidades width1500px mx-auto text-center">
                    <div class="col-xl-3 col-lg-3 col-6">
                        <i class="fas fa-microscope"></i>
                        <p>Sólida formación</p>
                        <p>científica</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-6">
                        <i class="fas fa-drafting-compass"></i>
                        <p>Amplia experiencia</p>
                        <p>técnica</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-6">
                        <i class="fas fa-laptop-code"></i>
                        <p>Software de apoyo</p>
                        <p>altamente especializado</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-6">
                        <i class="fas fa-award"></i>
                        <p>Especial dedicación y</p>
                        <p>entrega a cada trabajo</p>
                    </div>
                </div>
            </article>
        </section>