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

<div <?php if (is_page('931')) {?>
                        class="footer-1"
              <?php } elseif (is_page('952')) { ?>
                           class="footer-1"
              <?php } elseif ( is_singular( 'fallen' ) ) { ?>
                  class="footer-1"
            <?php  } else{ ?>
                class="footer mr-top30" 
        <?php    }
              ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                <h3 class="mr-bott20">About</h3>

                <div class="bdr1"></div>
                <div class="bdr2"></div>
                <p class="mr-top30">
                    <?php echo substr(get_post_field('post_content', 59), 0, 300); ?>
                </p>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                <h3 class="mr-bott20">Survey</h3>

                <div class="bdr1"></div>
                <div class="bdr2"></div>
                <div class="cate-wraper1 mr-top20">

                    <ul class="nav nav-pills nav-stacked">
                        <?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
                            <li>
                                <ul>
                                    <li><?php get_poll(); ?></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                <h3 class="mr-bott20">Instagram</h3>

                <div class="bdr1"></div>
                <div class="bdr2"></div>
                <div class="row mr-top30">
                    <?php echo do_shortcode(' [instagram-feed]  '); ?>

                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12 mr-bott30">
                <h3 class="mr-bott20 "> Twitter feed</h3>

                <div class="bdr1"></div>
                <div class="bdr2"></div>
                <div class="row mr-top30">
                    <div class="ftblock" id="address-8ab86705161edc1e37f0e0751b487442-710fda2df86868789e61a4f38a461f8c">
                        <div class="ft-flow-block">
                            <div id="block-710fda2df86868789e61a4f38a461f8c" class="block-content">
                            <a class="twitter-timeline" data-width="256" data-height="250" href="https://twitter.com/aprecon">Tweets by aprecon</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bott_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-12">
                    <p class="mr-top10">Copyright<img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/CopyrightSymbol.png" alt="<?php the_title();?>"/> 2015 The African Economist.
                        All Right Reserved. <a href="<?php echo get_page_link(2489); ?>">Privacy Policy</a></p>
                        
                </div>
                <div class=" col-md-4 col-sm-4 col-lg-4 col-xs-12">
                    <div class="sfwrpaer">
                        <p class="mr-top10  ">Powered by <a target="_blank" href="http://softfixer.com/">SoftFixer</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/jquery.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/bootstrap.min.js"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/bootstrap-select.js"></script>
    
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/dropdown-bootstrap/jquery.smartmenus.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/dropdown-bootstrap/jquery.smartmenus.bootstrap.js"></script>

    <script>
       $('.selectpicker').selectpicker({});
    </script>
    
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
   <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/prettyPhoto/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
                                    $(document).ready(function() {
                                        $("area[rel^='prettyPhoto']").prettyPhoto();

                                        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'normal', theme: 'light_square', slideshow: 4000, autoplay_slideshow: true});
                                        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed: 'fast', slideshow: 1000, hideflash: true});

                                        $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
                                            custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
                                            changepicturecallback: function() {
                                                initialize();
                                            }
                                        });

                                        $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
                                            custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
                                            changepicturecallback: function() {
                                                _bsap.exec();
                                            }
                                        });
                                    });
    </script>

    <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
        <div class="rg-image-wrapper">
        {{if itemsCount > 1}}
        <div class="rg-image-nav">
        <a href="#" class="rg-image-nav-prev">Previous Image</a>
        <a href="#" class="rg-image-nav-next">Next Image</a>
        </div>
        {{/if}}
        <div class="rg-image"></div>
        <div class="rg-loading"></div>
        <div class="rg-caption-wrapper">
        <div class="rg-caption" style="display:none;">
        <p></p>
        </div>
        </div>
        </div>
    </script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/responsive-img-gallery/js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/responsive-img-gallery/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/responsive-img-gallery/js/gallery.js"></script>

    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/layerslider/js/greensock.js" type="text/javascript"></script>
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
<?php if (is_home() || is_front_page()) { ?>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/datatable/datatable.js" type="text/javascript"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/datatable/datatable_bootstrap.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var dataTable = $('#parallel_market_data').DataTable({
                "processing": true,
                "serverSide": true,
                "bFilter": false,
                "bInfo": false,
                "bLengthChange": false,
                "bAutoWidth": false, 
                //"bPaginate": false,
                "order": [],
                "ajax": {
                    url: 'ajax/ajax.php',
                    //url: 'ajax.php',
                    type: "POST",
                    data: {
                        '_method': 'parallel_market_tbl_retrieve',
                        '_type': 'ajax'
                    }
                },
                "columnDefs": [
                    {
                        "targets": [1,2,3],
                        "orderable": false
                    }
                ],
                "columns": [
                    {"name": "p_date"},
                    {"name": "usd"},
                    {"name": "gbp"},
                    {"name": "eur"}
                ]
            });
        });
    </script>
    
       <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/marquee.js"></script>
       <script>
    $('.textx').simplemarquee({direction: 'left', speed: 30, cycles: 999, space: 40, delayBetweenCycles: 2000, handleHover: stop, handleResize: false}).on({
        'cycle': console.log.bind(console, 'example-options', 'cycle'),
        'pause': console.log.bind(console, 'example-options', 'pause'),
        'resume': console.log.bind(console, 'example-options', 'resume'),
        'finish': console.log.bind(console, 'example-options', 'finish')
    });
</script>

<?php }else{ ?>
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/datatable.js" type="text/javascript"></script>
    <script>
        $('#example').dataTable({
            "order": [],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false
            }]
        });
    </script>
<?php } ?>
    <script>
        $(window).scroll(function() {
            $(".bottomMenu").css("top", Math.max(0, 266 - $(this).scrollTop()));
        });
    </script>    
     <script>
  jQuery("img").error(function(){
        jQuery(this).hide();
});
    </script>
  <script>
		$(window).scroll(function(){
			$(".bottomMenu-2").css("top",Math.max(0,186-$(this).scrollTop()));
		});
    </script>
    
    <?php wp_footer(); ?>


                      <!--Start Cookie Script-->
<script type="text/javascript" charset="UTF-8" src="http://chs03.cookie-script.com/s/50cb87e723466b0fd6d6c67a5372b286.js"></script>
<!--End Cookie Script-->

</body>

</html>