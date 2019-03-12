<?php if (!isset($_SESSION['proceso'])) {

    redirecciona()->to('login/permiso');

}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <?php include VISTA_RUTA . "admininclude/panel/head.php"?>
</head>
<body class="vertical-layout vertical-menu-modern 1-column  comingsoonFlat menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column" >
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content"  style="background-color: #7d7d7ee6;">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- coming soon flat design -->
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-6 col-10 p-0">
                        <div class="card card-transparent box-shadow-0 border-0">
                            <div class="card-content">
                                <div class="text-center">
                                    <?php if ($_SESSION['proceso']=='enviado') { ?>

                                        <h2 class="card-text pt-1 pb-2 white">EL email ya ha sido enviado</h2>
                                        <img src="<?php asset("images/logo-1.png")?>" class="img-responsive block width-400 mx-auto"
                                             width="400" alt="bg-img"
                                             style="background-color: #ffffff26; border-radius: 15px;">
                                        <div id="clockMinimal" class="getting-started p-1 mt-2 d-inline-block"></div>
                                        <div class="col-12 pt-1 text-center">
                                            <h5 class="card-text pt-1 pb-2 white">El proceso de restablecimiento de
                                                contraseña tiene un periodo de 5 minutos, pasado dicho tiempo deberá
                                                realizar nuevamente el proceso.</h5></p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php if ($_SESSION['proceso']=='modificado') {unset($_COOKIE["recuperar"]); ?>
                                    <h2 class="card-text pt-1 pb-2 white">La contraseña ha sido modificada</h2>
                                        <img src="<?php asset("images/logo-1.png")?>" class="img-responsive block width-400 mx-auto"
                                             width="400" alt="bg-img"
                                             style="background-color: #ffffff26; border-radius: 15px;">
                                    <div id="clockMinimal" class="getting-started p-1 mt-2 d-inline-block"></div>
                                    <div class="col-12 pt-1 text-center">
                                        <h5 class="card-text pt-1 pb-2 white">Ya puede iniciar sesión con la contraseña deseada. Para Iniciar Sesión haga click en el siguiente botón: </h5>
                                        <a class="btn btn-outline-info btn-block" href="<?php url('login') ?>" style="width: 50%; margin-left: 25%;"><i class="ft-unlock"></i> Iniciar Sesión</a>
                                    </div>
                                        <?php
                                    }unset($_SESSION['proceso']);

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ coming soon flat design -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?php include VISTA_RUTA . "admininclude/panel/scripts.php"?>
</body>
</html>
