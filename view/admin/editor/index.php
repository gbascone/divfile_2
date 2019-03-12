<?php

if (isset($_SESSION['usuario'])){
    if ($_SESSION['privilegio'] != "admin" && $_SESSION['privilegio'] != "docu" ){
        redirecciona()->to("login/permiso");
    }
}else{
    redirecciona()->to("/login");

}


if (isset($_GET['page'])){
    $page = htmlentities($_GET['page']);
}else{
    $page = NULL;
    redirecciona()->to('articulo/lista');
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
                <h1 class="content-header-title mb-0 d-inline-block">Artículo - <?php echo $page?> </h1>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php url('admin')?>">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?php url('articulo/lista')?>">Artículo</a>
                            </li>
                            <li class="breadcrumb-item active"><?php echo $page?>
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
                                    <form class="form-horizontal" id="formulario" name="formulario" action="<?php url('articulo/agregar') ?>" method="POST" role="form" accept-charset="ISO-8859-1" novalidate>

                                        <?php switch ($page){
                                            case 'editar':
                                            case 'consulta':?>
                                                <?php if (isset($articulo)){?>
                                                    <input type="hidden" value="<?php echo $articulo->id?>" name="articulo_id">
                                                <?php }?>

                                                <?php break; } ?>

                                        <?php switch ($page){
                                            case 'nuevo':?>
                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Categoría del articulo<span class="required"></span></h4>

                                                    <div class="controls">
                                                        <select id="categoria" name="categoria"
                                                                class="form-control" required=""
                                                                aria-invalid="false" required data-validation-required-message="El campo es obligatorio">
                                                            <option value="">Seleccione una categoria</option>
                                                            <?php $contador=0; ?>
                                                            <?php foreach ($categorias as $categoria) {?>
                                                                <option  value="<?php echo $categoria->id?>"><?php echo utf8_encode($categoria->categoria)?></option>
                                                                <?php $contador++; ?>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Titulo del articulo<span class="required"></span></h4>
                                                    <div class="controls">
                                                        <input id="titulo" name="titulo" type="text"  class="form-control" required data-validation-required-message="El campo es obligatorio"
                                                               minlength="5" maxlength="50" placeholder="Ingrese El titulo">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Artículo<span class="required"></span></h4>
                                                    <textarea name="editor1" id="editor1" cols="30" rows="15" class="ckeditor"></textarea>
                                                </div>

                                                <?php break;  ?>

                                            <?php
                                            case 'editar':?>

                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Categoría del articulo<span class="required"></span></h4>
                                                    <div class="controls">
                                                        <select id="categoria" name="categoria" class="form-control" required=""
                                                                aria-invalid="false">
                                                            <?php $contador=0; ?>

                                                            <?php foreach ($categorias as $categoria) {?>

                                                                <?php if ($articulo->id_categoria == $categoria->id){?>
                                                                    <option disabled selected hidden value="<?php echo isset($articulo) ? $categoria->id: '' ?>"><?php echo utf8_encode($categoria->categoria)?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            <?php }?>
                                                            <?php foreach ($categorias as $categoria) {?>
                                                                <option  value="<?php echo isset($articulo) ? $categoria->id: '' ?>"><?php echo utf8_encode($categoria->categoria)?></option>
                                                                <?php $contador++; ?>
                                                            <?php }?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Titulo del articulo<span class="required"></span></h4>
                                                    <div class="controls">
                                                        <input id="titulo" name="titulo" type="text" value= "<?php echo isset($articulo) ? utf8_encode($articulo->titulo): '' ?>"  class="form-control" required data-validation-required-message="El campo es obligatorio"
                                                               minlength="5" maxlength="50" placeholder="Ingrese El titulo">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h4 style="font-weight: bold;">Artículo<span class="required"></span></h4>
                                                    <textarea name="editor1" id="editor1" cols="30" rows="15" class="ckeditor" required="" aria-invalid="false"><?php echo isset($articulo) ? utf8_encode($articulo->contenido): '' ?></textarea>


                                                </div>

                                                <?php break; } ?>

                                        <?php switch ($page){
                                            case 'nuevo':
                                            case 'editar':?>

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-success">Aceptar <i class="la la-thumbs-o-up position-right"></i></button>
                                                            <button type="reset" class="btn btn-danger">Borrar <i class="la la-refresh position-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php break; } ?>
                                        <?php if(Session::haserror("estado") && Session::haserror("mensaje")){ ?>

                                            <div class="text-center p-t-100" style="padding-top: 10px">

                                                <div class="alert alert-danger p-t-50">
                                                    <button name="boton" disabled="disabled" type="submit" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Error! </strong> <?php echo Session::geterror("mensaje");  ?>
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
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="http://divinf.com.ar" target="_blank">Divinf S.A </a>, Todos los derechos reservados. </span>
    </p>
</footer>


<!-- Javascript -->
<script>


</script>
<?php include VISTA_RUTA . "admininclude/panel/scripts.php"?>
</body>

</html>