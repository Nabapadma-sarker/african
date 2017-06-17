<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/dropdown-bootstrap/jquery.smartmenus.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/dropdown-bootstrap/jquery.smartmenus.bootstrap.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/jquery.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/bootstrap.min.js"></script>

    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/lightslider-master/src/js/lightslider.js"></script>
    <script>
                                    $(document).ready(function() {
                                        $("#content-slider").lightSlider({
                                            loop: true,
                                            keyPress: true
                                        });
                                        $('#image-gallery').lightSlider({
                                            gallery: true,
                                            item: 1,
                                            thumbItem: 7,
                                            slideMargin: 0,
                                            speed: 1000,
                                            auto: true,
                                            loop: true,
                                            onSliderLoad: function() {
                                                $('#image-gallery').removeClass('cS-hidden');
                                            }
                                        });
                                    });
    </script>
    <link href="<?php //echo esc_url(get_template_directory_uri());  ?>/theme/js/prettyPhoto/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="<?php //echo esc_url(get_template_directory_uri());  ?>/theme/js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <!--    <script type="text/javascript" charset="utf-8">
                            $(document).ready(function(){
                                    $("area[rel^='prettyPhoto']").prettyPhoto();
                                    
                                    $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:4000, autoplay_slideshow: true});
                                    $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:1000, hideflash: true});
                    
                                    $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
                                            custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
                                            changepicturecallback: function(){ initialize(); }
                                    });
    
                                    $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
                                            custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
                                            changepicturecallback: function(){ _bsap.exec(); }
                                    });
                            });
            </script>-->


    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/responsive-img-gallery/js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/responsive-img-gallery/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/responsive-img-gallery/js/gallery.js"></script>

    <script src="<?php //echo esc_url(get_template_directory_uri());  ?>/theme/layerslider/js/greensock.js" type="text/javascript"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
    <script>
                                    jQuery("#layerslider").layerSlider({
                                        pauseOnHover: false,
                                        autoPlayVideos: false,
                                        responsive: false,
                                        responsiveUnder: 700,
                                        layersContainer: 700,
                                        skin: 'v5',
                                        skinsPath: 'layerslider/skins/'
                                    });
    </script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/datatable.js" type="text/javascript"></script>
    <script>
                                    jQuery('#example').dataTable({
                                        "order": [],
                                        "columnDefs": [{
                                                "targets": 'no-sort',
                                                "orderable": false,
                                            }]
                                    });
    </script>

    <script>
        $(window).scroll(function() {
            $(".bottomMenu").css("top", Math.max(0, 260 - $(this).scrollTop()));
        });
    </script>
    <script>
        jQuery("img").error(function() {
            jQuery(this).hide();
        });
    </script>
    <script>
        $(window).scroll(function() {
            $(".bottomMenu-2").css("top", Math.max(0, 170 - $(this).scrollTop()));
        });
    </script>

    <?php wp_footer(); ?>
</div>
<style>
    .navbar-inverse .navbar-nav > li > a {
  /*color: #fff !important;*/
}
.navbar-inverse .navbar-nav > li > a:focus, .navbar-inverse .navbar-nav > li > a:hover{
    /*color: #000 !important;*/
}
.highlighted{
     /*color: #000 !important;*/
}
#crumbs{
    color: #fff !important;
}


</style>
</body>
</html>

