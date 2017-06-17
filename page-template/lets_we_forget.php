<?php
/**
 * Template Name: Lest We Forget Page
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
    <img class="img-responsive mr-bott10 pull-right"  src="<?php echo $image['url']; ?>" alt="" />  

    <?php $image = get_field('advertisement_right_second'); ?>
    <img class="img-responsive pull-right"  src="<?php echo $image['url']; ?>" alt="" />  
</div>

<div class="container">

    <ol class="breadcrumb mr-top20">
  <li><?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>
    </ol>

    <div class="botgrapper_wrp mr-top30">  

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Lest we Forget</h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>

                <div class="">
                    <div class="row">
                        <?php
                       $results = $wpdb->get_results('SELECT * FROM `af_posts` WHERE post_type = "lestforget" AND post_status = "publish" ');
                        $loop = new WP_Query($args);
                        // The Loop
                        foreach($results as $k => $v){ 
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">                  
                                <h4><b><?php echo get_field('lest_we_forget',$v->ID);?></b></h4>
                                <p class="lest-brd title_height"><?php echo $v->post_title; ?></p>
                                <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($v->ID), ''); ?>
<a href="<?php echo get_permalink($v->ID); ?>">
                                    <img class="img-responsive mr-bott20 top_img_set" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>">  
</a>
                                <div class="text-justify box_height">
                                <?php $summary = strip_tags(get_field('description',$v->ID));
          echo substr($summary, 0, 150); ?></div>
                                <a href="<?php echo get_permalink($v->ID);?>">READ MORE >></a>
                                <hr class="mr-top20">
                            </div>
                            <?php
                        }
                        // Reset Query
                        //wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<?php get_footer(); ?>