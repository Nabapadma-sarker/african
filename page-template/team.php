<?php
/**
 * Template Name: Team Page
 */
get_header();
$share_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '');
?>
<img class="" src="shareaholic:image" content="<?php echo $share_image_url[0] ?>" />
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
    <div class="botgrapper_wrp mr-top30 ">  
        <?php
        // The Loop
        while (have_posts()) : the_post();
            ?>
            <?php
            // check for rows (parent repeater)
            if (have_rows('team_content')):
                ?>

                <?php
                // loop through rows (parent repeater)
                while (have_rows('team_content')): the_row();
                    ?> 
                    <div class="row ">
                        <div class="col-xs-6 col-md-2 col-lg-2 mr-top20 mr-bott20">
                            <div  class="thumbnail mr-bott-0">
                                <?php
                                $image = get_sub_field('team_member_image');
                                ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('team_member_name'); ?>" /></div>
                            <center><h3 class="mr-top10"><?php the_sub_field('team_member_name'); ?></h3> 
                                <h2 class="label label-danger font18 "><?php the_sub_field('team_member_designation'); ?></h2>
                            </center>    
                        </div>          
                        <div class="col-xs-6 col-md-10 col-lg-10 mr-top20">       
<!--                            <p class="font16">-->
                                <?php the_sub_field('team_member_content'); ?>
<!--                            </p>   -->
                        </div> 
                    </div>
                    <hr>
                <?php endwhile; ?>
            <?php endif; ?> 
            <?php
        endwhile;
        // Reset Query
        wp_reset_query();
        ?>

        <hr>







    </div>
</div>
<?php get_footer(); ?>
