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
                <h3><?php the_title();?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>      
                <div class="">
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'lestforget',
                            'order' => 'asc'
                        );
                        query_posts($args);
                        // The Loop
                       if (have_posts()) :
                          // while (have_posts()) :the_post();
                            ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                <img style="margin-right:20px;" class="img-responsive pull-left mr-bott10" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title(); ?>">  
                                <p>
                                    <?php echo the_field(description);?>
                                </p>
                            </div>  
                              <?php
                         //   endwhile;
                        endif;
                        // Reset Query
                        wp_reset_query();
                        ?>   
                    </div> 

<?php /* ?>
<h4>Share Post/Articles on Social Networking Sites -</h4>
<?php echo do_shortcode('[wp_social_sharing]'); ?>
<br>
<?php echo do_shortcode('[whatsapp]'); ?>
<?php */ ?>
         
                </div>      
            </div>
        </div>    
    </div>
</div>
<?php get_footer(); ?>