<?php
/**
 * Template Name: Event Page
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
                <h3><?php the_title();?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">

                                <?php
                                 $first = true;
                                $second = true;
                                $args = array(
                                    'post_type' => 'event',
                                    'taxonomy' => 'categories',
                                    'term' => 'all_event',
                                    'order' => 'ASC',
                                );
                                $temp = $wp_query;  // assign orginal query to temp variable for later use
                                $wp_query = null;
                                $wp_query = new WP_Query($args);
                                if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                                        // if ('upcomingevents' != is_category()) {
                                        ?>

                                        <li role="presentation" class="<?php
                                        if ($first) {
                                            echo 'active';
                                            $first = false;
                                        }
?>"><a href="#<?php echo preg_replace("/[^A-Za-z0-9]/", "", chop(trim(strip_tags(str_replace(' ', '', get_the_title()))))); ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo strip_tags(the_title()); ?></a>
                                        </li>
                                        <!--                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">All This is Africa events</a></li>
                                                                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">All Partner events</a></li>-->

                                        <?php
                                    // }
                                    endwhile;
                                endif;
                                // Reset Query
                                wp_reset_query();
                                ?>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tab-content-1">
                                <?php
                                 $first = true;
                                $second = true;
                                $args = array(
                               
                                'post_type' => 'event',
                                'taxonomy' => 'categories',
                                'term' => 'all_event',
                                'order' => 'ASC',
                                );
                                $temp = $wp_query;  // assign orginal query to temp variable for later use
                                $wp_query = null;
                                $wp_query = new WP_Query($args);
                                if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                                        // if ('upcomingevents' != is_category()) {
                                        ?>
                                        <div role="tabpanel" class="tab-pane item <?php
                                        if ($first) {
                                            echo 'active';
                                            $first = false;
                                        }
                                        ?> " id="<?php echo preg_replace("/[^A-Za-z0-9]/", "", chop(trim(strip_tags(str_replace(' ', '', get_the_title()))))); ?>">
                                                 <?php the_content(); ?>
                                        </div>
                                        <?php
                                    // }
                                    endwhile;
                                endif;
                                // Reset Query
                                wp_reset_query();
                                ?>
                               
                                <div role="tabpanel" class="tab-pane" id="settings">...</div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <h3 class="red-color"> Upcoming Events  </h3>
                <?php
                $args = array(
                    'post_type' => 'event',
                    'taxonomy' => 'categories',
                    'term' => 'upcomingevents',
                    'order' => 'ASC',
                );
                $temp = $wp_query;  // assign orginal query to temp variable for later use
                $wp_query = null;
                $wp_query = new WP_Query($args);
                if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
//    if (is_category() == upcomingevents){
                        ?>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="imgboxwrp mr-bott20 mr-top10">
                                    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
<a href="<?php the_permalink(); ?>">
                                    <img class="img-responsive" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>">
</a> 
                            <!--<img class="img-responsive" alt="" src="img/prod1.jpg">-->   
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <h5 class="red-color"></h5>
                                <h4 class="clr_blk"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p><?php strip_tags(substr(get_the_content(), 0, 100)); ?><br>
                                    <a href="<?php the_permalink(); ?>">Read More >></a>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <?php
//    } else {
//        nothing;
//    }
                    endwhile;
                endif;
                // Reset Query
                wp_reset_query();
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