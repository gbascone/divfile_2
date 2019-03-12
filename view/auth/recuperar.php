<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
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
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <img src="<?php asset("images/logo-1.png")?>" style="width: 100%;" alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Ingrese su correo para realizar la recuperación de su contraseña</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" action="<?php url('login/enviar') ?>" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" name="email" class="form-control form-control-lg input-lg" id="user-email"
                                                   placeholder="Ingrese su email" required>
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i>Enviar email</button>
                                        <?php if(Session::has("estado") && Session::has("mensaje")){ ?>

                                            <div class="alert alert-icon-left alert-arrow-left alert-danger alert-dismissible mb-2" role="alert" style="margin-top: 20px">
                                                <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Error! </strong> <?php echo Session::get("mensaje");  ?>



                                            </div>

                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <p class="float-sm-left text-center"><a href="<?php url('login')?>" class="card-link">Iniciar Sesión</a></p>
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