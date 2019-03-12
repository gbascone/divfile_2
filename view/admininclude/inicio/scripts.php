
<!-- jQuery Scripts -->
<!--================================================== -->
<script src="<?php asset('js/jquery.min.js')?>"></script>
<script src="<?php asset('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script src="<?php asset('js/gmap3.js')?>"></script>
<script src="<?php asset('js/plugins.js')?>"></script>
<script src="<?php asset('js/revolution/js/jquery.themepunch.tools.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/jquery.themepunch.revolution.min.js')?>"></script>
<script src="<?php asset('js/rev-slider.js')?>"></script>
<script src="<?php asset('js/scripts.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.video.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.carousel.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.slideanims.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.actions.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.layeranimation.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.kenburn.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.navigation.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.migration.min.js')?>"></script>
<script src="<?php asset('js/revolution/js/extensions/revolution.extension.parallax.min.js')?>"></script>



<!-- Google Map -->
<script type="text/javascript">
    $(document).ready( function(){

        var gmapDiv = $("#google-map");
        var gmapMarker = gmapDiv.attr("data-address");

        gmapDiv.gmap3({
            zoom: 16,
            address: gmapMarker,
            oomControl: true,
            navigationControl: true,
            scrollwheel: false,
            styles: [
                {
                    "featureType":"all",
                    "elementType":"all",
                    "stylers":[
                        { "saturation":"-70" }
                    ]
                }]
        })
            .marker({
                address: gmapMarker,
                icon: "img/map_pin.png"
            })
            .infowindow({
                content: "V Tytana St, Manila, Philippines"
            })
            .then(function (infowindow) {
                var map = this.get(0);
                var marker = this.get(1);
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            });
    });
</script>


