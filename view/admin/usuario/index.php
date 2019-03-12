<?php

if (!isset($_SESSION['usuario'])) {
    redirecciona()->to("/login");

}
if (isset($_GET['page'])) {
    $page = htmlentities($_GET['page']);
} else {
    $page = NULL;
    redirecciona()->to('usuarios/lista');
}

if (($page == 'nuevo') && ($_SESSION['privilegio']!= 'admin')){
    redirecciona()->to('login/permiso');
}

?>


<!doctype html>
<html lang="en">

<head>
    <?php include VISTA_RUTA . "admininclude/panel/head.php" ?>
    <meta charset="utf-8">


</head>


<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<?php include VISTA_RUTA . "admininclude/panel/menu.php" ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h1 class="content-header-title mb-0 d-inline-block">Usuario - <?php echo $page ?> </h1>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php url('admin') ?>">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?php url('usuarios/lista') ?>">Usuarios</a>
                            </li>
                            <li class="breadcrumb-item active"><?php echo $page ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Input Validation start -->
            <section class="input-validation">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form-horizontal" id="formulario" name="formulario"
                                          action="<?php url('usuarios/agregar') ?>" method="POST" role="form"
                                          accept-charset="ISO-8859-1" novalidate>

                                        <?php switch ($page) {
                                            case 'editar':
                                            case 'consulta': ?>
                                                <?php if (isset($usuario)) { ?>
                                                    <input type="hidden" value="<?php echo $usuario->id ?>"
                                                           name="usuario_id">
                                                <?php } ?>

                                                <?php break;
                                        } ?>



                                        <?php switch ($page)  {
                                            case 'nuevo':
                                                if ($_SESSION['privilegio'] != "admin"){
                                                    redirecciona()->to("login/permiso");
                                                }else {
                                                    ?>
                                                    <div class="form-group">
                                                        <h4 style="font-weight: bold;">Usuario<span
                                                                    class="required"></span></h4>
                                                        <div class="controls">
                                                            <input id="usuario" name="usuario" type="text" name="text"
                                                                   class="form-control" required
                                                                   data-validation-required-message="El campo se encuentra vacio"
                                                                   minlength="3" maxlength="15"
                                                                   placeholder="Ingrese el usuario | Entre 3 &amp; 15">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h4 style="font-weight: bold;">Email<span
                                                                    class="required"></span></h4>
                                                        <div class="controls">
                                                            <input id="email" type="email" name="email"
                                                                   class="form-control"
                                                                   required="" placeholder="Ingrese el email"
                                                                   data-validation-required-message="El campo es obligatorio"
                                                                   aria-invalid="false">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h4 style="font-weight: bold;">Contraseña<span
                                                                    class="required"></span></h4>
                                                        <div class="controls">
                                                            <input type="password" id="password" name="password"
                                                                   class="form-control"
                                                                   placeholder="Ingrese la contraseña"
                                                                   required
                                                                   data-validation-required-message="El campo es obligatorio"
                                                                   maxlength="10">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h4 style="font-weight: bold;">Repetir contraseña<span
                                                                    class="required"></span></h4>
                                                        <div class="controls">
                                                            <input type="password" name="password2"
                                                                   data-validation-match-match="password"
                                                                   placeholder="Repita la contraseña"
                                                                   class="form-control"
                                                                   required
                                                                   data-validation-required-message="El campo es obligatorio"
                                                                   aria-invalid="false">
                                                            <div class="help-block">

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <h4 style="font-weight: bold;">Privilegio<span
                                                                    class="required"></span></h4>
                                                        <div class="controls">
                                                            <select id="privilegio" name="privilegio"
                                                                    class="form-control" required=""
                                                                    aria-invalid="false">
                                                                <option value="">Seleccione una categoria</option>
                                                                <option <?php echo isset($usuario) && $usuario->privilegio == 'admin' ? 'selected' : '' ?>
                                                                        value="admin">Administrador
                                                                </option>
                                                                <option <?php echo isset($usuario) && $usuario->privilegio == 'cliente' ? 'selected' : '' ?>
                                                                        value="cliente">Cliente
                                                                </option>
                                                                <option <?php echo isset($usuario) && $usuario->privilegio == 'docu' ? 'selected' : '' ?>
                                                                        value="docu">Documentador
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                                    break; ?>
                                            <?php
                                            case 'editar':
                                                ?>

                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Usuario<span class="required"></span></h4>
                                                    <div class="controls">
                                                        <input value="<?php echo isset($usuario) ? utf8_encode($usuario->usuario): '' ?>"
                                                               id="usuario" name="usuario" type="text"
                                                               class="form-control" required
                                                               data-validation-required-message="El campo es obligatorio"
                                                               minlength="3" maxlength="15"
                                                               placeholder="Ingrese el usuario | Entre 3 &amp; 15">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Email</h4>
                                                    <div class="controls">
                                                        <input value="<?php echo isset($usuario) ? utf8_encode($usuario->email) : '' ?>"
                                                               id="email" type="email" name="email" class="form-control"
                                                               required=""
                                                               data-validation-required-message="El campo es obligatorio"
                                                               aria-invalid="false">
                                                    </div>
                                                </div>


                                                <?php
                                                if ($_SESSION['privilegio'] == 'admin') {
                                                    ?>
                                                    <div class="form-group">
                                                        <h4 style="font-weight: bold;">Privilegio<span class="required"></span></h4>
                                                        <div class="controls">
                                                            <select id="privilegio" name="privilegio"
                                                                    class="form-control" required=""
                                                                    aria-invalid="false">
                                                                <option value="">Seleccione una categoria</option>
                                                                <option <?php echo isset($usuario) && $usuario->privilegio == 'admin' ? 'selected' : '' ?>
                                                                        value="admin">Administrador
                                                                </option>
                                                                <option <?php echo isset($usuario) && $usuario->privilegio == 'cliente' ? 'selected' : '' ?>
                                                                        value="cliente">Cliente
                                                                </option>
                                                                <option <?php echo isset($usuario) && $usuario->privilegio == 'docu' ? 'selected' : '' ?>
                                                                        value="docu">Documentador
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                <?php break;
                                        } ?>

                                        <?php switch ($page) {
                                            case 'nuevo':if ($_SESSION['privilegio'] != "admin"){
                                                redirecciona()->to("login/permiso");
                                            }
                                                ?>

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-success">Aceptar <i
                                                                        class="la la-thumbs-o-up position-right"></i>
                                                            </button>
                                                            <button type="reset" class="btn btn-danger">Borrar <i
                                                                        class="la la-refresh position-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php break;
                                        } ?>

                                        <?php switch ($page) {
                                            case 'editar':
                                                ?>

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-success">Aceptar <i
                                                                        class="la la-thumbs-o-up position-right"></i>
                                                            </button>
                                                            <button type="reset" class="btn btn-danger">Borrar <i
                                                                        class="la la-refresh position-right"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-cyan"
                                                                    data-toggle="modal" data-target="#bootstrap">Cambiar
                                                                contraseña <i
                                                                        class="la la-exclamation position-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php break;
                                        } ?>
                                        <?php if (Session::haserror("estado") && Session::haserror("mensaje")) { ?>

                                            <div class="text-center p-t-100" style="padding-top: 15px;">

                                                <div class="alert alert-danger p-t-50">
                                                    <button name="boton" disabled="disabled" type="submit" class="close"
                                                            data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Error! </strong> <?php echo Session::geterror("mensaje"); ?>
                                                </div>

                                            </div>

                                        <?php } ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">Modificar contraseña</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="formulario" name="formulario"
                  action="<?php url('usuarios/modificar_password') ?>" method="POST" role="form"
                  accept-charset="ISO-8859-1" novalidate>
                <?php if (isset($usuario)) { ?>
                    <input type="hidden" value="<?php echo $usuario->id ?>" name="usuario_id">
                <?php } ?>
                <div class="modal-body">
                    <br>
                    <div class="form-group">
                        <h4 style="font-weight: bold;">Nueva contraseña<span class="required"></span></h4>
                        <div class="controls">
                            <input type="password" id="password_nuevo" name="password_nuevo" class="form-control"
                                   placeholder="Ingrese la contraseña" required
                                   data-validation-required-message="El campo es obligatorio" maxlength="10">
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 style="font-weight: bold;">Repetir contraseña<span class="required"></span></h4>
                        <div class="controls">
                            <input type="password" name="password2" data-validation-match-match="password_nuevo"
                                   placeholder="Repita la contraseña" class="form-control" required
                                   data-validation-required-message="El campo es obligatorio" aria-invalid="false">
                            <div class="help-block">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">Aceptar <i
                                class="la la-thumbs-o-up position-right"></i></button>
                    <button type="reset" class="btn btn-danger">Borrar <i class="la la-refresh position-right"></i>
                    </button>
                </div>
            </form>
            <?php if (Session::haserror("estado1") && Session::haserror("mensaje")) { ?>

                <div class="text-center p-t-100">

                    <div class="alert alert-danger p-t-50">
                        <button name="boton" disabled="disabled" type="submit" class="close" data-dismiss="alert"
                                aria-hidden="true"></button>
                        <strong>Error! </strong> <?php echo Session::geterror("mensaje"); ?>
                    </div>

                </div>

            <?php } ?>
        </div>
    </div>
</div>
<
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a
                    class="text-bold-800 grey darken-2" href="http://divinf.com.ar" target="_blank">Divinf S.A </a>, Todos los derechos reservados. </span>
    </p>
</footer>
<!-- Javascript -->
<?php include VISTA_RUTA . "admininclude/panel/scripts.php" ?>
</body>

</html>