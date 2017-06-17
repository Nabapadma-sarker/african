<?php
/**
 * Template Name: Video Page
 */
get_header();
?>
<style>
    iframe{
         height: 300px !important;
         width:100% !important;
    }
    .i_box{
        margin-top: 0px; min-height: 36px;
    }
</style>
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
            
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h3>Video's</h3>

                    <div class="progress">
                        <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                    </div>
<?php if (have_posts()) { ?>
                    <?php
                    $args = array(
                        'post_type' => 'video',
                        'order' => 'desc',
                        'showposts' => 4,
'with_front' => false,
                    'paged' => $paged
                    );
                    query_posts($args);
                    $first = true;
                    $second = true;
                    // The Loop
                    while (have_posts()) : the_post();
                        ?>
                        <?php if ($wp_query->current_post % 2 == 0): ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <?php the_content(); ?>
                                    <!--<img class="img-responsive img-thumbnail" src="img/video-img.jpg" alt="">-->
                                    <h4><?php the_title(); ?></h4>
                                    <h6><i><?php the_time(' M j, Y') ?></i></h6>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <?php the_content(); ?>
                                    <!--<img class="img-responsive img-thumbnail" src="img/video-img.jpg" alt="">-->
                                    <h4 class="i_box"><?php the_title(); ?></h4>
                                    <h6><i> <?php the_time(' M j, Y') ?></i></h6>
                                </div>
                            </div>
                            <hr>

                        <?php endif ?>
                        <?php
                    endwhile;
                    // Reset Query
                    ?>

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