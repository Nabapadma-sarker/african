<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>
<div class="bottomMenu">      
        <?php $image = get_field('advertisement_left'); ?>
        <img class="img-responsive  mr-bott10 "  src="<?php echo $image['url']; ?>" alt="" /> 
        <?php $image = get_field('advertisement_left_second'); ?>
        <img class="img-responsive pull-right"  src="<?php echo $image['url']; ?>" alt="" />          
    </div>
    <div class="bottomMenu bottomMenu-1">
        <?php $image = get_field('advertisement_right'); ?>
        <img class="img-responsive  mr-bott10 pull-right"  src="<?php echo $image['url']; ?>" alt="" />  
   
        <?php $image = get_field('advertisement_right_second'); ?>
        <img class="img-responsive  pull-right"  src="<?php echo $image['url']; ?>" alt="" />  
    </div>
<div class="container">
    <ol class="breadcrumb mr-top20">
        <li><?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>  
    </ol>      
     
    <div class="botgrapper_wrp mr-top30">  
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h3><?php the_title(); ?></h3>
                <h5>In <span class="red-color">Theaters</span></h5>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>
                <div class="img-thumbnail">
                    <div class="row">
                        <?php
                        $first = true;
                        $second = true;
                        $args = array(
                            'post_type' => 'tvandvideo',
                            'taxonomy' => 'tvcategory',
//                                    'term' => 'intheaters',
//                                 'parent'=> 32
                        );
//                        $subcategories = get_categories($args);
//                        foreach ($subcategories as $cat) {
//                            $arg = array(category__in => array($cat->cat_ID),);
//                            $the_query = new WP_Query($arg);

                        $temp = $wp_query;  // assign orginal query to temp variable for later use
                        $wp_query = null;
                        $wp_query = new WP_Query($args);
                        //if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                        // if ('upcomingevents' != is_category()) {
                        ?>
                        <?php if (have_rows('tv_and_video_content')):
                            ?>
                            <?php
                            // loop through rows (parent repeater)
                            while (have_rows('tv_and_video_content')): the_row();
                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
                                    <img style="width:203px;height:300px;" class="img-responsive img-thumbnail mr-bott10" src="<?php echo $large_image_url[0] ?>" alt="<?php echo $title ?>"> 

                                    <?php do_action('addthis_widget'); ?></div>

                                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                                    <h5 class="red-color text-uppercase mr-top0"><a><?php the_title(); ?></a></h5>
                                    <p class="movies-txt"><a> <?php the_sub_field('show_duration'); ?></a> </p>
                                    <hr>
                                    <strong>Your rating:</strong>
                                    <!--<input id="input-21c" value="0" type="number" class="rating" min=0 max=10 step=0.5 data-size="xl" data-stars="10">-->




                                    <?php
                                    if (function_exists('the_ratings')) {
                                        the_ratings();
                                    }
                                    ?>


                                    <hr>

                                    <p style="font-size:13px;"><?php the_sub_field('show_description'); ?></p>
                                    <p class="movies-txt"> <strong>Director:</strong> <a><?php the_sub_field('show_director'); ?></a> </p>
                                    <p class="movies-txt"> <strong>Director:</strong> <a><?php the_sub_field('writers'); ?></a> </p>
                                    <p class="movies-txt"> <strong>Stars:</strong> <a><?php the_sub_field('show_stars'); ?></a> </p>
                                    <!--                                    <button class="btn btn-xs btn-danger mr-bott20" type="button">Watch Trailer
                                                                        </button>-->
                                    <div>
                                       
                                        <div class="btn-group pull">
                                            <button class="btn btn-xs btn-danger mr-bott20" data-toggle="dropdown" href="#">

                                                Share  </span>
                                            </button>
                                            <ul style=" top: 0% !important;" class="dropdown-menu">
                                                <li><a href="<?php the_field('facebook_page_link', 18); ?>" role="button" data-toggle="modal"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                                                <li><a href="<?php the_field('google_plus_link', 18); ?>"><i class="fa fa-twitter fa-2x"></i> Twitter</a></li>
                                                <li><a href="<?php the_field('twitter_page_link', 18); ?>"><i class="fa fa-google-plus fa-2x"></i> Google plus</a></li>
                                                <li><a href="<?php the_field('pinterest_page_link', 18); ?>"><i class="fa fa-pinterest"></i> Pinterest</a></li>
                                            </ul>
                                        </div>
                                    </div>



                                             <!--<p class="movies-txt">Reviews:<?php //comments_template('', true);              ?></a> </p>-->
                                    <div class="post-block post-leave-comment">
                                        <div id="respond-container">
                                            <?php
                                            global $withcomments;
                                            $withcomments = 1;
                                            comments_template();
                                            ?>

                                        </div> 
                                    </div>
                                </div>
                                <div style="clear: both"></div>

                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>                     
                    <?php
                    //  endwhile;
                    //  endif;
                    ?>
                    <?php //}   ?>
                </div>

                <hr>
                <div class="img-thumbnail wh">
                    <div class="row">
                        <!--<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <h4 class="red-color">Videos</h4>
                            <div class="">
                                <?php
                                $args = array(
                                    'post_type' => 'tvandvideo',
                                    'taxonomy' => 'tvcategory',
                                    'showposts' => 2,
//                                        'order' => 'asc',
                                        //'hide_empty' => FALSE,
                                );
                                $wp_query = new WP_Query($args);
                                if (have_rows('video_content')):
                                    ?>
                                    <?php
                                    // loop through rows (parent repeater)
                                    while (have_rows('video_content')): the_row(); //                                        
                                        ?> 
                                        <a href="#" class="" data-toggle="modal" data-target="#videoModal" data-theVideo=" ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pd-right0">  
                                                <div  class="img-responsive img-rounded" ><?php echo get_sub_field('videos'); ?> </div>                                          

                                            </div></a>
                                        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <div>
                                                            <?php echo get_sub_field('video_link'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>-->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h4 class="red-color">Photos</h4> 
                            <div class="">
                                <?php
                                $args = array(
                                    'post_type' => 'tvandvideo',
                                    'taxonomy' => 'tvcategory',
//                                    'showposts' => 6,
//                                    'order' => 'asc',
                                        //'hide_empty' => FALSE,
                                );
                                $wp_query = new WP_Query($args);
                                //if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                                if (have_rows('photo_content')):
                                    ?>
                                    <?php
                                    // loop through rows (parent repeater)
                                    while (have_rows('photo_content')): the_row();
                                        ?>
                                        <?php
                                        $image = get_sub_field('photos');
                                        ?>  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pd-right0">
                                            <img class="img-responsive img-rounded" src="<?php echo $image['url']; ?>" alt="photos" />
                                        </div>  
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                                <?php
                                // endwhile;
//endif;
                                ?>
                            </div>                               
                        </div>
                    </div>
                    <!--<p class="movies-txt mr-bott20 mr-top20"><i style="padding-right:10px;" class="fa fa-th"></i> <a>78 photos</a> | <a>3 videos</a> | <a>971 news articles</a> >> </p>-->
                </div>
                <hr>

                <div class="img-thumbnail wh">
                    <?php if (have_posts()) { ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4 class="red-color">People who liked this also liked... </h4>

                                <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 960px; height: 420px; background: #f6f6f6; overflow: hidden;">

                                    <!-- Loading Screen -->
                                    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                        <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block; top: 0px; left: 0px;width: 100%;height:100%;">
                                        </div>
                                        <div style="position: absolute; display: block; background: url(<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/vertical-thumbnail/img/loading.gif) no-repeat center center; top: 0px; left: 0px;width: 100%;height:100%;">
                                        </div>
                                    </div>

                                    <!-- Slides Container -->
                                    <div u="slides" style="position: absolute; left: 240px; top: 0px; width: 680px; height: 420px; overflow: hidden;">

                                        <?php
                                        $first = true;
                                        $second = true;
                                        $args = array(
                                            'post_type' => 'tvandvideo',
                                            'taxonomy' => 'tvcategory',
//                                            'posts_per_page' => '6',
                                            'showposts' => 1,
                                            'paged' => $paged
//                                    'term' => 'intheaters',
//                                 'parent'=> 32
                                        );
                                        $temp = $wp_query;  // assign orginal query to temp variable for later use
                                        $wp_query = null;
                                        $wp_query = new WP_Query($args);
                                        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                                                // if ('upcomingevents' != is_category()) {
                                                ?>
                                                <?php if (have_rows('tv_and_video_content')):
                                                    ?>

                                                    <?php
                                                    // loop through rows (parent repeater)
                                                    while (have_rows('tv_and_video_content')): the_row();
                                                        ?>
                                                        <div>
                                                            <div class="row mr-top20">
                                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 text-center">
                                                                    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                                                    <img style="width:220px;height:327px;" class="img-responsive img-thumbnail mr-bott20" src="<?php echo $large_image_url[0] ?>" alt="<?php echo $title ?>"> 

                                                                                                                                                                                                                                            <!--<img class="img-responsive img-thumbnail mr-bott20" src="js/vertical-thumbnail/img/travel/01.jpg" />-->
                                                                    <!--<button class="btn btn-sm btn-warning" type="button">Add to Watchlist</button>-->
                                                                    <!--<button class="btn btn-sm btn-default" type="button">Next >></button>-->
                                                                </div>
                                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                                                    <h4> <strong class="red-color"><a href= "<?php the_permalink(); ?>"><?php the_title(); ?></a></strong> </h4>
                                                                    <span class="grery-color"><?php the_sub_field('show_duration'); ?> </span>
                                                                    <hr>
                                                                    <?php
                                                                    if (function_exists('the_ratings')) {
                                                                        the_ratings();
                                                                    }
                                                                    ?>
                                                                    <hr>
                                                                    <p>
                                                                        <?php the_sub_field('show_description'); ?>
                                                                    </p>
                                                                    <p>&nbsp;</p>
                                                                    <p><strong>Director:</strong> <?php the_sub_field('show_director'); ?></p>
                                                                    <p><strong>Director:</strong> <?php the_sub_field('writers'); ?></p>
                                                                    <p><strong>Stars:</strong><?php the_sub_field('show_stars'); ?></p>
                                                                </div>
                                                            </div>
                                                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
                                                            <img style=" height: 134px; width: 94px;" u="thumb" src="<?php echo $large_image_url[0] ?>" alt="<?php echo $title ?>"> 
                                                           <!--<img u="thumb" src="js/vertical-thumbnail/img/travel/thumb-01.jpg" />-->
                                                        </div>                                    
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>                                      
                                                <?php
                                            endwhile;
                                        endif;
                                        ?> 

                                    </div>                                     

                                    <!-- Arrow Left -->
                                    <span u="arrowleft" class="jssora05l" style="top: 158px; left: 248px;">
                                    </span>
                                    <!-- Arrow Right -->
                                    <span u="arrowright" class="jssora05r" style="top: 158px; right: 46px">
                                    </span>                                
                                    <!-- thumbnail navigator container -->
                                    <div u="thumbnavigator" class="jssort02" style="left: 0px; bottom: 0px;">
                                        <!-- Thumbnail Item Skin Begin -->
                                        <div u="slides" style="cursor: default;">
                                            <div u="prototype" class="p">
                                                <div class=w><div u="thumbnailtemplate" class="t"></div></div>
                                                <div class=c></div>
                                            </div>
                                        </div>
                                        <!-- Thumbnail Item Skin End -->
                                    </div>
                                    <!--#endregion Thumbnail Navigator Skin End -->
                                </div>                                    
                            </div>                            	
                        </div> 
                        <ul class="pagination">
                            <li>
                                <?php
                                if (function_exists('wp_paginate')) {
                                    wp_paginate('range=4&anchor=2&nextpage=Next&previouspage=Previous');
                                }
                            } else {
                                get_template_part('content', 'none');
                            }
                            echo '<div style="clear: both"></div><br>';
                            ?>   

                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3 class="mr-bott20">Advertisement</h3>  
                <?php $image = get_field('advertisements'); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" />
               <div class="hrow mr-top10"></div>                
<?php $image = get_field('advertisements_second'); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" />                 
             </div>    
    </div>
</div>
<link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/vertical-thumbnail/css/jssor.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/vertical-thumbnail/js/jssor.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/vertical-thumbnail/js/jssor.slider.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/vertical-thumbnail/js/slideshow.js"></script>
<script>
    $(document).ready(function() {
        autoPlayYouTubeModal();
    });
</script>
<script>//FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
    function autoPlayYouTubeModal() {
        var trigger = $("body").find('[data-toggle="modal"]');
        trigger.click(function() {
            var theModal = $(this).data("target"),
                    videoSRC = $(this).attr("data-theVideo"),
                    videoSRCauto = videoSRC + "?autoplay=1";
            $(theModal + ' iframe').attr('src', videoSRCauto);
            $(theModal + ' button.close').click(function() {
                $(theModal + ' iframe').attr('src', videoSRC);
            });
        });
    }</script>
<?php get_footer(); ?>