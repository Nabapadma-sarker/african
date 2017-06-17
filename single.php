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
    <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" />
</div>
<div class="bottomMenu bottomMenu-1">
    <?php $image = get_field('advertisement_right'); ?>
    <img class="img-responsive   mr-bott10 pull-right"  src="<?php echo $image['url']; ?>" alt="" />

    <?php $image = get_field('advertisement_right_second'); ?>
    <img class="img-responsive  pull-right"  src="<?php echo $image['url']; ?>" alt="" />
</div>
<div class="container">

    <ol class="breadcrumb mr-top20">
        <li><?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>
    </ol>

    <div class="botgrapper_wrp mr-top30">
        <div class="row">
            <?php // if (in_category(3)) {  ?>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h3><?php the_title(); ?></h3>

                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>
                <!--<div class="row">-->
<!--                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">-->
                    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                    <img class="img-responsive img-thumbnail pull-left" style="margin-right:20px" src="<?php echo $large_image_url[0] ?>" alt="">
                    <!--<img class="img-responsive img-thumbnail" src="img/news-img-1.jpg" alt="">-->
                    <!--          </div>
                              <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mr-bott20 mr-top20">-->
                    <h5> <span class="red-color"></span>  <span class="red-color"><?php the_time(' M j, Y') ?></span></h5>
                   
                    
<!--                </div>-->

                <!--</div>-->
                <!--<div class="row">-->
<!--                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">-->

                    <?php
                    while (have_posts()) : the_post();
                        ?>
                        <div style="text-align: justify;"><?php the_content(); ?></div>
                    <?php
                    endwhile;
                    // Reset Query
                    wp_reset_query();
                    ?>

                    <!--</div>-->
                    <hr>
                    <?php // }  ?>

                    <div class="post-block post-leave-comment">
                        <!--<h3>Leave a comment</h3>-->
                        <div id="respond-container">
                            <?php
                            global $withcomments;
                            $withcomments = 1;
                            comments_template();
                            ?>

                        </div>
                    </div>
<!--                </div>-->
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

<?php /* ?>
<h4>Share Post/Articles on Social Networking Sites -</h4>
<?php echo do_shortcode('[wp_social_sharing]'); ?>
<br>
<?php echo do_shortcode('[whatsapp]'); ?>
<?php */ ?>

    </div>
</div>

<?php get_footer(); ?>