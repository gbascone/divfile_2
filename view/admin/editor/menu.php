<?php

if (!isset($_SESSION['usuario'])){
    redirecciona()->to("/login");

}
?>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul data-menu="menu-navigation" class="navigation navigation-main">
            <li class="navigation-header">
                <span data-i18n="nav.category.ui"><input id="myInput" class="basic-search" type="text"
                                                         placeholder="Buscar..."
                                                         style="width: 100%;height: 30px;border-radius: 10px;border: 1px solid #ffffff21;background-color: #ffffff0f;color:white;"></span>
            </li>
        </ul>
        <ul id="myList" data-menu="menu-navigation" class="navigation navigation-main">
            <?php $cncate = 0; ?>
            <?php foreach ($categorias as $categoria) { ?>
                <?php $cncate++ ?>
                <li class="nav-item has-sub hover open"><a href="#<?php echo utf8_encode($categoria->categoria) ?>"
                                                           style="background: #23262f57;font-size: 14px; border-right: 0px;"><span
                                class="menu-title"><?php echo $cncate ?> . <?php echo utf8_encode($categoria->categoria) ?></span></a>
                    <ul class="menu-content" style="">
                        <?php $cnart = 0; ?>
                        <?php foreach ($articulos as $articulo) { ?>
                            <?php
                            if ($articulo->id_categoria == $categoria->id) {
                                ?>
                                <?php $cnart++; ?>


                                <li><a class="menu-item" href="#<?php echo utf8_encode($articulo->titulo) ?>"
                                       data-i18n="nav.perfil" style="font-size: 12px;"><?php echo $cncate ?>
                                        . <?php echo $cnart ?> . <?php echo utf8_encode($articulo->titulo) ?></a>
                                </li>
                                <?php
                            }
                            ?>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<!-- LEFT SIDEBAR -->

<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow"
     style="box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0); background: #ffffff00">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="<?php url('admin')?>">
                        <img class="brand-logo" alt="modern admin logo" src="<?php asset("images/logo-2.png") ?>">
                        <h5 class="brand-text">Divisón Informática</h5>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0"
                                                                      data-toggle="collapse"><i
                                class="toggle-icon ft-toggle-right font-medium-3 white"
                                data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li>
                        <a class="btn btn-outline-info btn-block" href="<?php url('admin') ?>" style="margin-left: 25%;;margin-top: 10px;"><i class="ft-unlock"></i> Ir al inicio</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hola,
                  <?php echo $_SESSION["usuario"] ?>
                </span>
                            <i class="ft-menu"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                          href="<?php url('usuario/perfil/' . $_SESSION['id']) ?>"><i
                                        class="ft-user"></i>Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php url("login") ?>"><i class="ft-power"></i>Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myList li").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        });
    });
</script>







