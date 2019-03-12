<!DOCTYPE html>
<html lang="en">
<head>
    <?php include VISTA_RUTA . "admininclude/inicio/head.php"?>

</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top">


<?php include VISTA_RUTA . "admininclude/inicio/menu.php"?>



<div class="main-wrapper-onepage angles oh">

    <!-- Revolution Slider -->
    <section>
        <div class="rev_slider_wrapper">
            <div class="rev_slider" id="slider4" data-version="5.0">
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-fstransition="fade"
                        data-transition="slideleft"
                        data-easein="default"
                        data-easeout="default"
                        data-slotamount="1"
                        data-masterspeed="1200"
                        data-delay="10000"
                        data-title="The Art of Design"
                    >
                        <!-- MAIN IMAGE -->
                        <img src="<?php asset("images/bg-011.jpg") ?>"
                             alt=""
                             data-kenburns="on"
                             data-bgposition="right center"
                             data-bgpositionend="left center"
                             data-duration="15000"
                             data-scalestart="100"
                             data-scaleend="150"
                             data-bgparallax="10"
                             class="rev-slidebg"
                        >

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption hero-text giant_nocaps rs-parallaxlevel-7"
                             data-x="center"
                             data-y="center"
                             data-transform_idle="o:1;s:1500;"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.1;sY:0.1;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeOut;"
                             data-transform_out="opacity:0;sX:0;sY:0;s:2000;e:Power3.easeInOut;"
                             data-start="1000">Divfile
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption subheading_text rs-parallaxlevel-7"
                             data-x="center"
                             data-y="center"
                             data-voffset="84"
                             data-transform_idle="o:1;s:1000"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1200">Documentación de Loan
                        </div>

                    </li> <!-- end slide 1 -->

                    <!-- SLIDE 2 -->
                    <li data-transition="slideleft"
                        data-slotamount="1"
                        data-masterspeed="1200"
                        data-delay="10000"
                        data-title="Creative &amp; Emotional"
                    >
                        <!-- MAIN IMAGE -->
                        <img src="<?php asset("images/ken_slide_2.jpg") ?>"
                             alt=""
                             data-kenburns="on"
                             data-bgposition="left center"
                             data-bgpositionend="right center"
                             data-duration="15000"
                             data-scalestart="100"
                             data-scaleend="150"
                             data-bgparallax="10"
                             class="rev-slidebg"
                        >

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-shape hero-line rs-parallaxlevel-7"
                             data-x="center"
                             data-y="center"
                             data-voffset="-87"
                             data-width="380"
                             data-transform_idle="o:1;s:900;"
                             data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1500">
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption hero-text huge_nocaps rs-parallaxlevel-7"
                             data-x="center"
                             data-y="center"
                             data-transform_idle="o:1;s:1000;"
                             data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
                             data-transform_out="opacity:0;sX:0;sY:0;s:2000;e:Power3.easeInOut;"
                             data-start="1000">División informática
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption subheading_text rs-parallaxlevel-7"
                             data-x="center"
                             data-y="center"
                             data-voffset="74"
                             data-transform_idle="o:1;s:1000"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1000">Líderes en desarrollo de software para el mercado
                            financiero y de cobranzas.
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption tp-shape hero-line rs-parallaxlevel-7"
                             data-x="center"
                             data-y="center"
                             data-voffset="139"
                             data-width="380"
                             data-transform_idle="o:1;s:900;"
                             data-transform_in="y:50px;opacity:0;s:1500;e:Power3.easeOut;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1500">
                        </div>

                    </li> <!-- end slide 2 -->

                </ul>

                <div class="local-scroll">
                    <a href="#intro" class="scroll-down">
                        <i class="fa fa-angle-down"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>


    <!-- Intro -->
    <section class="section-wrap intro angle-bottom" id="intro">
        <div class="container">
            <div class="row">

                <div class="col-sm-8 col-sm-offset-2 text-center wow slideInUp" data-wow-duration="1.2s" data-wow-delay="0s">
                    <h2 class="intro-heading heading-frame">Bienvenidos a DIVfile</h2>
                    <p class="intro-text mb-60">
                        En este sitio encontrará toda la documentación necesaria para brindar conocimiento sobre el sistema que esta utilizando.

                    </p>

                    <img src="<?php asset("images/logo-2.png") ?>" alt="" />
                </div>

            </div>
        </div>
    </section> <!-- end intro -->




    <!-- Testimonials -->
    <section class="section-wrap parallax-testimonials" style="background-image: url(<?php asset("images/background.gif") ?>")">

    <div id="owl-testimonials" class="owl-carousel owl-theme text-center">

        <div class="item">
            <div class="container testimonial">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <i class="fa fa-quote-left"></i>
                        <p class="testimonial-text">“Solamente puedes aprender si tú mismo te abres a fuentes de información.”.</p>
                        <span>Art Director</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="container testimonial">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <i class="fa fa-quote-left"></i>
                        <p class="testimonial-text">"La función de un buen software es hacer que lo complejo aparente ser simple".
                            <span>Art Director</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="container testimonial">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <i class="fa fa-quote-left"></i>
                        <p class="testimonial-text">Un plan estratégico. Se llama hacer las cosas bien.</p>
                        <span>Art Director</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section> <!-- end testimonials -->


    <!-- Our Services -->
    <section class="section-wrap bg-light pb-mdm-50 pb-130 angle-top angle-bottom" id="modulos">
        <div class="container">

            <div class="row heading">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="text-center bottom-line">Módulos</h2>
                    <p class="subheading text-center">Categoria de Articulos</p>
                </div>
            </div>

            <div class="row">

                <?php

                foreach ($categorias as $categoria){;


                    ?>
                    <div class="col-md-4 service-item">


                        <div class="service-item-box icon-effect-1 icon-effect-1a text-center">


                            <?php
                            if (!isset($_SESSION["usuario"])){?>
                            <a href="<?php url('login')?>?page=<?php echo utf8_encode($categoria->categoria)?>">

                                <?php
                            }else{?>

                                    <div class="menu-socials hidden-sm hidden-xs">
                                        <a href="<?php url('articulos/vista')?>#<?php echo utf8_encode($categoria->categoria)?>">
                                    </div>

                            <?php  }
                            ?>
                            <i class="icon icon-Layers hi-icon"></i>
                            </a>

                            <h3><?php echo utf8_encode($categoria->categoria)?></h3>
                            <p style="text-align: center"><?php echo utf8_encode($categoria->descripcion)?></p>
                        </div>

                    </div> <!-- end service item -->


                <?php }?>



            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer minimal bg-dark angle-top">
        <div class="container text-center">
            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <div class="footer-logo local-scroll mb-30 wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2>
                            <a href="#home" class="color-white">División Informática</a>
                        </h2>
                    </div>


                    <span class="copyright text-center">
				  ©2019 Divinf  |  Development by  © 2019 <a href="http://www.divinf.com.ar/">División Informática SA</a> - Todos los derechos reservados.
				</span>

                </div>

            </div>
        </div>
    </footer> <!-- end footer -->

    <div id="back-to-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>

</div> <!-- end main-wrapper -->

<!-- jQuery Scripts -->
<?php include VISTA_RUTA . "admininclude/inicio/scripts.php"?>


</body>
</html>