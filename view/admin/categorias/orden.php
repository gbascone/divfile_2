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
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <?php include VISTA_RUTA . "admininclude/panel/head.php" ?>

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- fixed-top-->
<?php include VISTA_RUTA . "admininclude/panel/menu.php" ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Categoria | Orden </h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php url('admin')?>">Inicio</a>
                            </li>
                            <li class="breadcrumb-item"><a href="<?php url('categorias/lista')?>">Categoria</a>
                            </li>
                            <li class="breadcrumb-item active">Orden
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body"><!-- Lists section start -->
            <section id="lists">
                <div class="row match-height">

                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="list-add-item" style="font-weight: bold">Arrastre la opción a la posición deseada</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <a class="btn btn-primary btn-sm" href="<?php url('categorias/lista')?>"><i class="ft-tag white"></i> Ir a Lista de Categorías</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div id="add-item-list">
                                        <ul class="list-group-" id="post_list">
                                            <?php $cn=0?>
                                            <?php
                                            foreach ($categorias as $categoria){?>
                                            <?php $cn++?>
                                            <li class="list-group-item" data-post-id="<?php echo $categoria->id; ?>">
                                                <h4 class="" style="font-weight: bold"><?php echo $cn.') '.utf8_encode($categoria->categoria); ?></h4>
                                                <p class="born"><?php echo utf8_encode($categoria->descripcion); ?></p>
                                                <p class="born">Número de orden: <?php echo $categoria->orden; ?></p>
                                            </li>
                                                <?php
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
            <!-- // List section end -->
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

<script>

    $(document).ready(function(){
        $( "#post_list" ).sortable({
            placeholder : "ui-state-highlight",
            update  : function(event, ui)
            {
                var n_orden = new Array();
                $('#post_list li').each(function(){
                    n_orden.push($(this).data("post-id"));
                });
                $.ajax({
                    url:"<?php url('categorias/validar')?>",
                    method:"POST",
                    data:{n_orden:n_orden},
                    success:function(data)

                    {
                        if(data){
                            $(".alert-danger").hide();
                            $(".alert-success ").show();
                            location.reload();

                        }else{
                            $(".alert-success").hide();
                            $(".alert-danger").show();

                        }
                    }
                });
            }
        });
    });
</script>

</body>
</html>