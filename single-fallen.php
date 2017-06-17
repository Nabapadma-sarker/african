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

<div class="container">
<ol class="breadcrumb mr-top20 inverse1">
        <li><?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>
        </ol>
    <div style="background: #000;" class="mr-top30">  

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="mr-top0 white-color"><?php the_title();?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>

                <div class="white-color">
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'fallen',
                            'order' => 'asc'
                        );
                        query_posts($args);
                        // The Loop
                        // while (have_posts()) : the_post();
                        ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                            <img style="margin-right:20px;" class="img-responsive pull-left mr-bott10" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"> 
                                    <div class="table-responsive">
<table class="table table-bordered">
<tr>
   <td>Name</td>
   <td><?php the_title(); ?></td>
</tr>
<tr>
   <td>Rank</td>
   <td><?php the_field('rank'); ?></td>
</tr>
<tr>
   <td>Service</td>
   <td><?php the_field('service'); ?></td>
</tr>
<tr>
   <td>DOD</td>
   <td><?php the_field('dod'); ?></td>
</tr>

</table>
                                       
                                    </div>

                            
                            <?php
                            if (have_rows('african_description')):
                                // loop through rows (parent repeater)
                                while (have_rows('african_description')): the_row();
                                    ?>
                                    <p>
                                        <?php the_sub_field('description'); ?><br>
                                    </p>
                                    <?php
                                endwhile;
                            endif;
                            ?>        
                        </div> 

                        <?php
                        //   endwhile;
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
<?php get_footer(line); ?>