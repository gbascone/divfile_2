<?php session_destroy();

 if (isset($_GET['page'])){
     $_SESSION['redireccion'] = $_GET['page'];
}else{
     $_SESSION['redireccion'] = NULL;
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
                                    <form class="form-horizontal" id="formulario" name="formulario" action="<?php url("login/ingresar") ?>" method="post" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario" required>
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña"
                                                   required>
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-sm-left">
                                                <fieldset>
                                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                                    <label for="remember-me">Recordar</label>
                                                </fieldset>
                                            </div>
                                            <input type="hidden" value="<?php echo $_SESSION['redireccion'] ?>" name="redirrecion">
                                            <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="<?php url('login/recuperar')?>" class="card-link">¿Olvidaste tu contraseña?</a></div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Iniciar Sesión</button>

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
