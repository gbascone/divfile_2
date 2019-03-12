<?php

if (isset($_SESSION['usuario'])){
    if ($_SESSION['privilegio'] != "admin" && $_SESSION['privilegio'] != "docu" ){
        redirecciona()->to("login/permiso");
    }
}else{
    redirecciona()->to("/login");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php include VISTA_RUTA . "admininclude/panel/head.php" ?>
</head>
<body class="vertical-layout vertical-menu-modern content-detached-left-sidebar   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">


<?php include VISTA_RUTA . "admininclude/panel/menu.php" ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Categoria | Lista </h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php url('admin')?>">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?php url('categorias/lista')?>">Categoria</a>
                            </li>
                            <li class="breadcrumb-item active">Lista
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detached content-right">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-header">
                                    <h4 class="card-title">Lista de categorias</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <a class="btn btn-primary btn-sm" href="<?php url('categorias/index' .('?page=nuevo'))?>"><i class="ft-plus white"></i>Agregar una categoria</a>
                                        <span class="dropdown"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Task List table -->
                                    <div class="table-responsive">
                                        <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Categoria</th>
                                                <th>Descripción</th>
                                                <th>Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $cn=0?>

                                            <?php foreach ($categorias as $categoria) {?>
                                                <?php $cn++?>
                                                <tr>
                                                    <td>
                                                        <?php echo $cn ?>
                                                    </td>
                                                    <td>
                                                        <div class="media">
                                                            <div class="media-left pr-1">
                                                            </div>
                                                            <div class="media-body media-middle">
                                                                <a href="#" class="media-heading"><?php echo utf8_encode($categoria->categoria) ?></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left">
                                                        <a><?php echo utf8_encode($categoria->descripcion) ?></a>
                                                    </td>
                                                    <td>
                              <span class="dropdown">
                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                  <a href="<?php url('categorias/editar/' . $categoria->id . '/' .('?page=editar') )?>" class="dropdown-item"><i class="ft-edit-2"></i>Editar</a>
                                  <a href="<?php url('categorias/editar/' . $categoria->id . '/' .('?page=consulta'))?>" class="dropdown-item"><i class="ft-plus-circle primary"></i>Consultar</a>
                                    <button id="eliminar" href="#" class="dropdown-item" onclick="confirmar('<?php url('categorias/eliminar/' . $categoria->id )?>')"><i class="ft-trash-2"></i>Eliminar</button>
                                </span>
                              </span>
                                                    </td>
                                                </tr>
                                            <?php }?>

                                            <?php if(Session::haserror("estado") && Session::haserror("mensaje")){ ?>
                                                <?php echo Session::geterror("mensaje");  ?>
                                            <?php } ?>

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Categoria</th>
                                                <th>Descripción</th>
                                                <th>Acción</th>
                                            </tr>
                                            </tfoot>
                                        </table>
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

<?php include VISTA_RUTA . "admininclude/panel/scripts.php" ?>

</body>
</html>