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
                        <div class="card border-grey border-lighten-3 px-1 py-1 box-shadow-3 m-0">
                            <div class="card-body">
                  <span class="card-title text-center">
                    <img src="<?php asset("images/logo-1.png")?>" class="img-fluid mx-auto d-block pt-2"
                         width="250" alt="logo">
                  </span>
                            </div>
                            <div class="card-body text-center">
                                <h3>¡Error 404!</h3>
                                <h1>La página que estás buscando ha sido borrada o su nombre ha sido cambiado o modificado en el servidor.</h1>

                                <div class="mt-2"><i class="la la-cog spinner font-large-2"></i></div>
                                <h5 class="card-text pt-1 pb-2 ">Para ir al inicio, haga click en el siguiente botón: </h5>
                                <a class="btn btn-outline-info btn-block" href="<?php url('') ?>" style="width: 50%; margin-left: 25%;"><i class="ft-unlock"></i> Ir al Inicio</a>
                            </div>
                            <hr>
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