<?php
/**
 * Template Name: Category Page
 */
get_header();
?>
<div class="container">

    <ol class="breadcrumb mr-top20">
        <li><?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>          
    </ol> 


    <div class="botgrapper_wrp mr-top30">  

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3><?php printf(__('%s', 'twentyfifteen'), single_cat_title('', false)); ?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>
                <?php
                if (have_posts()) :
                    //query_posts('cat=4');
                    //  $counter = 1;
                    // if (have_posts()) :while (have_posts()) :the_post();
                    //      if ($counter == 1) {
                    ?>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="imgboxwrp mr-bott20 mr-top10">
                                <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                <img class="img-responsive mr-top10" src="<?php echo $large_image_url[0] ?>" alt=""> 
                                <!--<img src="<?php //echo esc_url(get_template_directory_uri());    ?>/theme/img/prod1.jpg" alt="" class="img-responsive">-->   
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <h5 class="red-color"><?php echo get_cat_name(3); ?></h5>
                            <h4 class="clr_blk"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h4>
                            <p><?php echo substr(get_the_content(), 0, 100); ?><br>
                                <a href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
                            </p>
                        </div>
                    </div> 
                    <hr>
                    <?php //} else { ?>
                    <!--                            <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                                        <div class="imgboxwrp mr-bott20 mr-top10">
                    <?php // $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                                            <img class="img-responsive mr-top10" src="<?php //echo $large_image_url[0]  ?>" alt=""> 
                                  <img src="img/prod-2.jpg" alt="" class="img-responsive">   
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 mr-top10">
                                                        <h5 class="red-color"><?php //echo get_cat_name(3);  ?></h5>
                                                        <h4 class="clr_blk"><?php // the_title();  ?> </h4>
                                                        <p><?php //echo substr(get_the_content(), 0, 100);  ?></p>
                                                    </div>
                                                </div>-->
                    <!--                            <hr>-->
                    <?php
                endif;
                // $counter++;
                //   endwhile;
                //  endif;
                ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                <h3 class="mr-bott20">Social</h3>   
                <a href="<?php the_field('facebook_page_link', 18); ?>" > <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/fb.png" alt="" class="mr-bott20 img-responsive">  </a> 
                <a href="<?php the_field('google_plus_link', 18); ?>"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/g-plus.png" alt="" class="mr-bott20 img-responsive">  </a> 
                <a href="<?php the_field('twitter_page_link', 18); ?>"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/twitter.png" alt="" class="mr-bott20 img-responsive">  </a> 

            </div> 
        </div>    
    </div>


    <?php get_footer(); ?>