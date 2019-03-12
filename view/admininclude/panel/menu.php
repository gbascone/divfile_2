<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="">
                        <img class="brand-logo" alt="modern admin logo" src="<?php asset("images/logo-2.png") ?>">
                        <h5 class="brand-text">Divisón Informática</h5>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hola,
                  <?php echo $_SESSION["usuario"] ?>
                </span>
                 <i class="ft-menu"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php url('usuario/perfil/' .$_SESSION['id'])?>"><i class="ft-user"></i>Perfil</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php url("login") ?>"><i class="ft-power"></i>Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href=""><i class="la la-user"></i><span class="menu-title">Perfil</span></a>
                <ul id="myUL" class="menu-content">
                    <li><a class="menu-item" href="<?php url('usuario/perfil/' .$_SESSION['id'])?>" data-i18n="nav.perfil">Ver perfil</a>
                    </li>
                    <li><a class="menu-item" href="<?php url('usuario/editar/' . $_SESSION['id'] . '/' .('?page=editar') )?>" data-i18n="nav.perfil.index">Editar Perfil</a>
                    </li>
                </ul>
            </li>
            <?php if ($_SESSION["privilegio"] == "admin"  || $_SESSION["privilegio"] == "docu" )  {?>
            <li class="navigation-header">
                <span data-i18n="nav.category.ui">Operaciones</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="User Interface"></i>
            </li>
            <?php
            }
            ?>
            <li class=" nav-item"><a href=""><i class="la la-folder-open"></i><span class="menu-title">Articulos</span></a>
                <ul id="myUL" class="menu-content">
                    <li><a class="menu-item" href="<?php url('articulos/vista')?>" data-i18n="nav.articulo.vista">Ver articulos</a>
                    </li>
                    <?php
                    if ($_SESSION["privilegio"] == "admin" || $_SESSION["privilegio"] == "docu") {?>
                    <li><a class="menu-item" href="<?php url('articulo/index' .('?page=nuevo'))?>" data-i18n="nav.articulo.index">Agregar un articulo</a>
                    </li>
                    <li><a class="menu-item" href="<?php url('articulo/lista')?>" data-i18n="nav.articulo.lista">Lista de articulos</a>
                    </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>

            <?php if ($_SESSION["privilegio"] == "admin" || $_SESSION["privilegio"] == "docu") {?>
            <li class=" nav-item"><a href="#"><i class="la la-tags"></i><span class="menu-title">Categorías</span></a>
                <ul id="myUL" class="menu-content" >
                    <li><a class="menu-item" href="<?php url('categorias/index' .('?page=nuevo'))?>" data-i18n="nav.categoria.index">Nueva Categoría</a>
                    </li>
                    <li><a class="menu-item" href="<?php url('categorias/lista')?>" data-i18n="nav.categoria.lista">Lista de Categorías</a>
                    </li>
                    <li><a class="menu-item" href="<?php url('categorias/orden')?>" data-i18n="nav.categoria.orden">Orden de Categorías</a>
                    </li>
                </ul>
            </li>
                <?php
            }
            ?>

            <?php if ($_SESSION["privilegio"] == "admin"){?>
            <li class=" nav-item"><a href=""><i class="la la-users"></i><span class="menu-title">Usuarios</span></a>
                <ul id="myUL" class="menu-content">

                        <li><a class="menu-item" href="<?php url('usuario/index' .('?page=nuevo'))?>" data-i18n="nav.perfil.index">Nuevo Usuario</a>
                        </li>
                        <li><a class="menu-item" href="<?php url('usuario/lista/')?>" data-i18n="nav.perfil.lista">Lista de Usuarios</a>
                        </li>
                </ul>
            </li>
                <?php
            }
            ?>



        </ul>
    </div>
</div>