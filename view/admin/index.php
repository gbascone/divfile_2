<?php

if (!isset($_SESSION['usuario'])){
    redirecciona()->to("/login");

}
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <?php include VISTA_RUTA . "admininclude/panel/head.php"?>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<?php include VISTA_RUTA . "admininclude/panel/menu.php"?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-1 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Bienvenidos al Sistema de Documentación | Divinf S.A</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body"><!-- Description -->
            <section id="description" class="card">
                <div class="card-header">
                    <h3 class="bottom-line">Divfile</h3>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <p>En este sitio encontrará toda la documentación necesaria para brindar conocimiento sobre el sistema que esta utilizando.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Description -->

            <!-- Decks section start -->
                <section id="description" class="card">
                    <div class="card-header">
                        <h3 class="bottom-line">Módulos</h3>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <p class="subheading">Aqui encontrá los siguientes módulos que el sistema posee a disposición.</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="card-deck-wrapper">
                                    <div class="card-deck d-sm-table" style="width: 100%">


                                        <?php

                                        foreach ($categorias as $categoria){;


                                            ?>
                                            <div class="card">
                                                <div class="card-content" style="margin: 30px;background-color: #95b4e330;border-radius: 15px; height: 100%;">

                                                    <!--<img class="card-img-top img-fluid" src="../../../app-assets/images/carousel/09.jpg" alt="Card image cap"/>-->
                                                    <div class="card-body">
                                                        <h4 class="card-title"><a href="<?php url('articulos/vista')?>#<?php echo utf8_encode($categoria->categoria)?>"><?php echo utf8_encode($categoria->categoria)?></a> |  <i class="icon-docs"></i></h4>
                                                        <p class="card-text"><?php echo utf8_encode($categoria->descripcion)?></p>
                                                    </div>
                                                </div>
                                            </div> <!-- end service item -->


                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="http://divinf.com.ar" target="_blank">Divinf S.A </a>, Todos los derechos reservados. </span>
    </p>
</footer>

<?php include VISTA_RUTA . "admininclude/panel/scripts.php"?>
</body>
</html>










