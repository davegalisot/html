<form method="POST">
    <div class="text-center">
        <h2 class="encabezado">Inicio de sesión</h2>
    </div>
    <div class="inicioSesion text-center mx-auto">
        <div class="">
            <div class="mt-5">
                <p class="m-0">Usuario:</p>
                <input type="text" name="usuario" autofocus autocomplete="off">
            </div>
            <div>
                <p class="m-0 mt-3">Contraseña:</p>
                <input type="password" name="clave">
            </div>
            <div class="mt-4">
                <input class="btn btnCustom" type="submit" name="acceder" value="Entrar">
            </div>
            <div class="mt-4 mx-auto text-center">
                <input class="btn btnCustom" type="submit" name="registrar" value="Registrarse">
            </div>
            <div>
                <a class="iconos d-flex justify-content-center mt-4" href="<?php echo $_SESSION['home'] ?>index" title="volver">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
        </div>
    </div>
</form>