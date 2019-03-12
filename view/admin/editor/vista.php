<?php

if (!isset($_SESSION['usuario'])){
    redirecciona()->to("/login");

}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <?php include VISTA_RUTA . "admininclude/panel/head.php" ?>
    <script src="<?php asset('js/jquery.min.js')?>"></script>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->

<?php include VISTA_RUTA . "admin/editor/menu.php" ?>
<div class="app-content content">
    <div class="content-wrapper">

        <h1 style="text-align:center"><span style="font-size:36px">Documentación</span></h1>

        <h1 style="text-align:center"><a id="idm140094544710384"></a>Guia Administradora</h1>

        <h2 style="text-align:center">Referencia del administrador</h2>

        <h3 style="text-align:center"><img src="<?php asset("images/logo-1.png") ?>"/></h3>

        <h3 style="text-align:center">Equipo de Desarrollo Divinf S.A</h3>

        <p class="hidden" style="text-align:center"><code><a href="mailto:mantisbt-dev@lists.sourceforge.net">gonzalobascone@divinf.com.ar</a></code><a
                    id="idm140094529294144"></a></p>

        <?php $cncate = 0 ?>
        <?php foreach ($categorias as $categoria) { ?>
            <?php $cncate++ ?>

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h1 class="content-header-title mb-0 d-inline-block"><a id="<?php echo utf8_encode($categoria->categoria) ?>"></a>
                        Capitulo <?php echo $cncate ?> </h1>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb" style="font-size: 15px;">
                                <li class="breadcrumb-item"><a href="<?php url('admin')?>">Inicio</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php url('articulo/vista')?>">Artículo</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#<?php echo utf8_encode($categoria->categoria)?>"><?php echo  utf8_encode($categoria->categoria)?></a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zoom Image example section start -->
                <section id="zoom-img-example">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2><?php echo utf8_encode($categoria->categoria) ?></h2>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php $cnart=0; ?>
                                    <?php foreach ($articulos as $articulo) { ?>
                                        <?php if ($articulo->id_categoria == $categoria->id) { ?>
                                            <?php $cnart++ ?>
                                            <div class="panel-headline">
                                                <ul>
                                                    <li class="" style="margin-bottom: -15px;">
                                            <span class="section"><a
                                                        href="#<?php echo utf8_encode($articulo->titulo) ?>"><?php echo $cncate ?> . <?php echo $cnart ?> . <?php echo utf8_encode($articulo->titulo) ?></td></a>
                                            </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    <?php } ?>
                                    <div class="card-body">
                                        <?php $cnart = 0; ?>
                                        <?php foreach ($articulos as $articulo) { ?>
                                            <?php
                                            if ($articulo->id_categoria == $categoria->id) {
                                                ?>
                                                <?php $cnart++; ?>
                                                <div class="panel-body">
                                                    <div class="section">
                                                        <div class="titlepage">
                                                            <h2 class="title" style="padding: 15px;font-weight: bold;"><a
                                                                        id="<?php echo utf8_encode($articulo->titulo) ?>">⁠</a> <?php echo $cncate ?>
                                                                . <?php echo $cnart ?>
                                                                . <?php echo utf8_encode($articulo->titulo) ?></h2>
                                                        </div>
                                                        <div class="para" style="padding-top: 20px;">
                                                            <?php echo utf8_encode($articulo->contenido) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        <?php } ?>
        <!-- // Zoom Image example section end -->
    </div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="http://divinf.com.ar" target="_blank">Divinf S.A </a>, Todos los derechos reservados. </span>
    </p>
</footer>
<?php include VISTA_RUTA . "admininclude/panel/scripts.php" ?>
</body>
</html>


