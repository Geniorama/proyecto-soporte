<?php
$theClass = "page-login";
$theTitle = "Iniciar Sesión";
require_once 'views/header.php';

?>
        <div class="content">
            <div class="d-flex justify-content-center align-items-center cont-card">
                <div class="card">
                    <div class="card-title text-center">
                        <h3>Inicio de sesión</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo constant('URL'); ?>login/ingresar">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="bmd-label-floating">Usuario o Correo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" autocomplete="off">
                                <span class="bmd-help">We'll never share your email with anyone else.</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="bmd-label-floating" autocomplete="off">Contraseña</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-raised">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php 

require_once 'views/footer.php';