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
        <?php
        //function_exists() — Return TRUE if the given function has been defined.
        //code by BOUTROS ABICHEDID. Adding breadcrumb trail to the WordPress theme.
        // if (function_exists('wp_bac_breadcrumb')) {wp_bac_breadcrumb();} 
        ?>

        <?php //the_breadcrumb(); ?>

    </ol>  

    <div class="botgrapper_wrp mr-top30">         
        <div class="row">          
            <?php // if (in_category(3)) { ?>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h3><?php the_title(); ?></h3>

                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>      
                <!--<div class="row">-->
                

                    <?php
                    $args = array(
                        'post_type' => 'slider',
                        'order' => 'asc',
//                      'showposts' => 3
                    );
                    query_posts($args);
                    // The Loop
                    //while (have_posts()) : the_post();
                        $image = get_field('image');
                        ?>
                        <img class="img-responsive img-thumbnail pull-left" style="margin-right:20px" src="<?php echo $image['sizes']['medium']; ?>" />         
                        <?php
                  //  endwhile;
                    wp_reset_query();


//die;
                    ?> 
<!--<img class="img-responsive img-thumbnail" src="img/news-img-1.jpg" alt="">-->
                    <!--          </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mr-bott20 mr-top20">-->
                   
                    
                    <?php //do_action( 'addthis_widget'); ?>

                

                <!--</div>-->
                <!--<div class="row">-->

 <h5> <span class="red-color"></span>  <span class="red-color"><?php the_time(' M j, Y') ?></span></h5>

                <div class="text-justify">

                    <?php
                    while (have_posts()) : the_post();
                        ?>
                        <p><?php the_content(); ?></p>
                        <?php
                    endwhile;
// Reset Query
                    wp_reset_query();
                    ?>

                    <!--</div>--> 
                    <hr>
                    <?php // } ?>

                    <div class="post-block post-leave-comment mr-bott10">
                        <!--<h3>Leave a comment</h3>-->

                        <div id="respond-container">
                            <?php
                            global $withcomments;
                            $withcomments = 1;
                            comments_template();
                            ?>

                        </div> 
                    </div> 
                </div>
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
