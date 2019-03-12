<?php

if (!isset($_SESSION['usuario'])){
    redirecciona()->to("/login");
}

?>


<!doctype html>
<html lang="en">

<head>
    <?php include VISTA_RUTA . "admininclude/panel/head.php"?>
    <meta charset="utf-8">


</head>


<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<?php include VISTA_RUTA . "admininclude/panel/menu.php"?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Usuario </h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php url('admin')?>">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?php url('usuarios/lista')?>">Usuarios</a>
                            </li>
                            <li class="breadcrumb-item active">Perfil
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Perfil</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text">
                        </div>
                        <form class="form">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-eye"></i>Datos del perfil</h4>
                                <div class="col-md-12">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                        <tr>
                                            <?php if (isset($usuario)) {?>
                                                <td>Usuario:</td>
                                                <td> <?php echo utf8_encode($usuario->usuario) ?></td>
                                            <?php }?>
                                        </tr>
                                        <tr>
                                            <?php if (isset($usuario)) {?>
                                                <td>Email:</td>
                                                <td><?php echo utf8_encode($usuario->email) ?></td>
                                            <?php }?>
                                        </tr>
                                        <tr>
                                            <?php if ($_SESSION['privilegio'] == "admin") {?>
                                                <?php if (isset($usuario)) {
                                                    if ($usuario->privilegio == 'admin'){
                                                        $perfil = 'Administrador';
                                                    }
                                                    elseif ($usuario->privilegio == 'docu'){
                                                        $perfil = 'Documentador';
                                                    }
                                                    elseif ($usuario->privilegio == 'cliente'){
                                                        $perfil = 'Cliente';
                                                    }?>
                                                    <td>Estado:</td>
                                                    <td><?php echo $perfil ?></td>
                                                <?php }?>
                                            <?php }?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="form-actions right">
                                <a class="btn btn-outline-blue"  href="<?php url('usuario/editar/' . $usuario->id . '/' .('?page=editar') )?>" >Editar</a>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="http://divinf.com.ar" target="_blank">Divinf S.A </a>, Todos los derechos reservados. </span>
    </p>
</footer>
<!-- Javascript -->
<?php include VISTA_RUTA . "admininclude/panel/scripts.php"?>
</body>

</html>