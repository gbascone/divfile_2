<!-- Navigation -->
<header class="nav-type-1" id="home">

    <nav class="navbar navbar-fixed-top">
        <div class="navigation-overlay">
            <div class="container-fluid relative">
                <div class="row">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo-container">
                            <div class="logo-wrap local-scroll">
                                <a href="#home">
                                    <img class="logo" src="<?php asset("images/logo-1.png") ?>" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div> <!-- end navbar-header -->


                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                            <ul class="nav navbar-nav local-scroll text-center">

                                <li class="active">
                                    <a href="#home">Home</a>
                                </li>
                                <li>
                                    <a href="#intro">Acerca de</a>
                                </li>
                                <li>
                                    <a href="#modulos">Módulos</a>
                                </li>
                                <?php
                                if (!isset($_SESSION["usuario"])){?>
                                    <li>
                                        <a href="<?php url("login") ?>">Ir al panel</a>
                                    </li>

                                    <?php
                                }else{?>
                                    <li>
                                        <a href="<?php url("admin") ?>">Ir al panel</a>
                                    </li>

                                <?php  }
                                ?>

                            </ul>

                        </div>
                    </div> <!-- end col -->

                    <?php
                    if (!isset($_SESSION["usuario"])){?>
                        <div class="menu-socials hidden-sm hidden-xs">
                            <a href="<?php url("login") ?>" class="btn btn-lg btn-color">Iniciar Sesión</a>
                        </div>
                    <?php  }
                    ?>

                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end navigation -->
    </nav> <!-- end navbar -->

</header> <!-- end navigation -->