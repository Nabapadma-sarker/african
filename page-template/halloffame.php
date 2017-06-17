<?php
/**
 * Template Name: African Hall Of Fame Page
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
        
          <li> <?php
        wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'sub_menu' => true,
                    'container' => 'none',
                    'walker' => new Selective_Walker()
                )
        );
        ?> </li>
    </ol>


    <div class="botgrapper_wrp mr-top30">  

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3><?php the_title();?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>

                <div class="africa-map-2">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                            <img class="img-responsive pull-left" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"> 
                            <!--<img class="img-responsive pull-left" src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/african-haal-fame.jpg" alt="">-->
                            <?php
                            if (have_rows('african_description')):
                                // loop through rows (parent repeater)
                                while (have_rows('african_description')): the_row();
                                    ?>
                                    <p>
                                        <?php the_sub_field('description'); ?>
                                    </p>
                                    <?php
                                endwhile;
                            endif;
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
                <hr>
            </div>
        </div>    
    </div>
</div>
<?php get_footer(); ?>