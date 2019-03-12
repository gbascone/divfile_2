<?php

$variable = htmlentities($_GET['page']);
$valorCookie = $_COOKIE['recuperar'];

if ($valorCookie != $variable){
    redirecciona()->to("login/permiso");
    }

?>


<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <?php include VISTA_RUTA . "admininclude/panel/head.php"?>
</head>

<body class="vertical-layout vertical-menu-modern 1-column  comingsoonFlat menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column" >
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content" style="background-color: #7d7d7ee6;">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <img src="<?php asset("images/logo-1.png")?>" style="width: 100%;" alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Iniciar Sesión</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" id="formulario" name="formulario"
                                          action="<?php url('login/modificar_password') ?>" method="POST" role="form"
                                          accept-charset="ISO-8859-1" novalidate>
                                            <input type="hidden" value="<?php echo $variable?>" name="usuario_email">
                                        <div class="form-group">
                                            <h5>Nueva contraseña<span class="required"></span></h5>
                                            <div class="controls">
                                                <input type="password" id="password_nuevo" name="password_nuevo" class="form-control"
                                                       placeholder="Ingrese la contraseña" required
                                                       data-validation-required-message="El campo es obligatorio" maxlength="10">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Repetir contraseña<span class="required"></span></h5>
                                            <div class="controls">
                                                <input type="password" name="password2" data-validation-match-match="password_nuevo"
                                                       placeholder="Repita la contraseña" class="form-control" required
                                                       data-validation-required-message="El campo es obligatorio" aria-invalid="false">
                                                <div class="help-block">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-sm-left">
                                            </div>
                                            <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="<?php url('login')?>" class="card-link">Iniciar Sesión</a></div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i>Restablecer contraseña</button>


                                    </form>
                                </div>
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include VISTA_RUTA . "admininclude/panel/scripts.php"?>
</body>

</html>
