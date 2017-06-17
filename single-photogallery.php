<?php
/**
 * Template Name: Photo Gallery Page
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
                <h3><?php //the_title();  ?></h3>
                <h5><span class="red-color">Multimedia</span> Photo Albums</h5>
              
<section class="slideshow-wrapper">
                    <div id="wrapper">
                                                <?php $first_photo = true; ?>
                        <div id="gallery" class="carousel slide cr_photo" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner gal_400" role="listbox">
                                    <?php
                                    $args = array(
                                        'post_type' => 'photogallery',
                                        'order' => 'asc',
                                    //  'showposts' => 2
                                    );
                                    query_posts($args);
                                    $first = true;
                                    $second = true;
                                    $p_i = 0;
                                    while (have_posts()) : the_post();
                                        $title = get_the_title();
                                        ?>
                                        <div class="item <?php if ($p_i == $_GET['s_id']) {
                                            echo 'active';                                           
                                        }; ?>">
                                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                            <img src="<?php echo $large_image_url[0] ?>" class="gal_img img-responsive ls-bg" alt="<?php echo $title ?>"/>
                                                
                                            <div class="carousel-caption hidden-sm">                                            
                                                <?php echo get_the_content(); ?>
                                            </div>
                                        </div>
                                <?php
$p_i++;
                                endwhile;
                                wp_reset_query();
                                ?>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#gallery" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#gallery" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <script>
                            $(document).ready(function () {
                                $('.cr_photo').carousel({
                                         interval: 50000,
                                         pause: "hover"
                                });

                            })
                        </script>
                    </div>

                </section>

                <?php /* ?>
                  <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                  <div id="rg-gallery" class="rg-gallery">
                  <div class="rg-thumbs">
                  <!-- Elastislide Carousel Thumbnail Viewer -->
                  <div class="es-carousel-wrapper">
                  <div class="es-nav">
                  <span class="es-nav-prev">Previous</span>
                  <span class="es-nav-next">Next</span>
                  </div>
                  <div class="es-carousel">
                  <ul>
                  <?php
                  $args = array(
                  'post_type' => 'photogallery',
                  'order' => 'desc',
                  //                'showposts' => 2
                  );
                  query_posts($args);
                  $first = true;
                  $second = true;
                  while (have_posts()) : the_post();
                  $title = str_replace(" ", "-", get_the_title());
                  ?>
                  <li>
                  <a href="<?php echo $title ?>">

                  <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
                  <img src="<?php echo $large_image_url[0] ?>" data-large="<?php echo $large_image_url[0] ?>" alt="image01" data-description="<?php the_title(); ?>" />

                  </a>
                  </li>
                  <?php
                  endwhile;
                  wp_reset_query();
                  ?>
                  </ul>
                  </div>
                  </div>
                  <!-- End Elastislide Carousel Thumbnail Viewer -->
                  </div><!-- rg-thumbs -->
                  </div>

                  </div>
                  </div>
                  <?php */ ?>

                <hr>

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

<?php basename(get_the_permalink()); ?>
<script>
    jQuery(document).ready(function() {
        //jQuery(".es-carousel ul li").removeClass("selected");
    });
</script>
<script>
    $(function() {
        $('#slider1').anythingSlider({
//			theme : 'metallic',
            expand: true,
            aspectRatio: '700:450',
            autoPlay: true
        });
    });
</script>

<?php get_footer(); ?>