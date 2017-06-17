<?php
/**
 * Template Name: Top Page
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
        
            <li><?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'sub_menu' => true,
            'items_wrap' => '%3$s',
            'container' => FALSE
        ));
            ?></li>
          
    </ol>    
    <div class="botgrapper_wrp mr-top30">  

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <h3><?php the_title(); ?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>

                <div class="row mt-15">
                    <?php
        if (is_page('592')) { $category='77'; }           
        if (is_page('634')) { $category='93'; }           
	if (is_page('637')) { $category='89'; }
	if (is_page('640')) { $category='81'; }
	if (is_page('630')) { $category='78'; }
	if (is_page('643')) { $category='82'; }
	if (is_page('702')) { $category='137';}
	if (is_page('747')) { $category='90'; }
	if (is_page('310')) { $category='38'; }
	if (is_page('274')) { $category='48'; }
	if (is_page('801')) { $category='95'; }
        if (is_page('1833')) { $category='546'; }
        if (is_page('595')) { $category='84'; }
         if (is_page('1389')) { $category='260'; }
	
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        $query = new WP_Query( 
            array(
                'paged'         => $paged, 
                'cat'           => $category,
                'order'         => 'DESC',
            )
        );
                if ($query->have_posts()) {
                    while ($query->have_posts()) { 
                     $query->the_post(); ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div>
                                    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
<a href="<?php the_permalink(); ?>">
                                    <img title="<?php the_title(); ?>" class="img-responsive img-thumbnail mr-top10 top_img_set" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>">
</a>
                                </div>
                                <h4 class="red-color title_height mr-bott-0"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,90); ?></a></h4>
                                <!--<div class="text-justify box_height">-->
                                    <?php //echo strip_tags(substr(get_the_content(), 0, 150)); ?>
                                <!--</div>                                                               -->
                            </div>                            
                            <?php
            }

            // next_posts_link() usage with max_num_pages

            //next_posts_link( 'Older Entries', $query->max_num_pages );
$big = 999999999; // need an unlikely integer
$pages_pagi = paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $query->max_num_pages,
        'type'  => 'array',
       )
      );

    if( is_array($pages_pagi) ) {        
        echo '<nav><ul class="pagination" style="display:block !important">';
        foreach ($pages_pagi as $page ) {
                echo "<li class='cus_pagi'>$page</li>";
        }
       echo '</ul></nav><br><br>';
     }


           // previous_posts_link( 'Newer Entries' );

            wp_reset_postdata();
        }
        ?>

                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <h3 class="mr-bott20">Advertisements</h3>  
                <div class="cate-wraper">
                    <?php $image = get_field('advertisements'); ?>                        
                    <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" /> 

                    <div class="hrow mr-top10"></div>
                </div>
                <div class="cate-wraper">
                    <?php $image = get_field('advertisements_second'); ?>                        
                    <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" /> 
                </div>

            </div> 
        </div>    
    </div>
</div>
<?php get_footer(); ?>