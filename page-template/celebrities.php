<?php
/**
 * Template Name: Celebrities Page
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
                <h3><?php  the_title();  ?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>
                <?php
                query_posts('cat=48');
                $counter = 1;
                if (have_posts()) :while (have_posts()) :the_post();
                        if ($counter == 1) {
                            ?>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <div class="imgboxwrp mr-bott20 mr-top10">
                                        <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                        <img class="img-responsive mr-top10" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title()?>"> 
                                        <!--<img src="<?php //echo esc_url(get_template_directory_uri());   ?>/theme/img/prod1.jpg" alt="" class="img-responsive">-->   
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">                                    
                                    <h4 class="clr_blk"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h4>
                                    <p><?php //echo substr(get_the_content(), 0, 100); ?><br>
                                        <a href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
                                    </p>
                                </div>
                            </div> 
                            <hr>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <div class="imgboxwrp mr-bott20 mr-top10">
                                        <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                        <img class="img-responsive mr-top10" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title()?>"> 
              <!--<img src="img/prod-2.jpg" alt="" class="img-responsive">-->   
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 mr-top10">                                    
                                    <h4 class="clr_blk"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                     <p><?php //echo substr(get_the_content(), 0, 100); ?><br>
                                        <a href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <?php
                        }
                        $counter++;
                    endwhile;
                endif;
                ?>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3 class="mr-bott20">Advertisement</h3>  
                <?php $image = get_field('advertisements'); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" />
              <div class="hrow mr-top10"></div>
                <div class="cate-wraper">
<?php $image = get_field('advertisements_second'); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" /> 
                   </div> 

            </div> 
        </div>    
    </div>
</div>

<?php get_footer(); ?>