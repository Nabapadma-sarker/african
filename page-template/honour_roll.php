<?php
/**
 * Template Name: Honour Roll Page
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

<div class="container" id="honor">

    <ol class="breadcrumb mr-top20">
        <li><?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>
    </ol>

    <div class="botgrapper_wrp mr-top30">  

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3><?php the_title(); ?></h3>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>

                <div class="africa-map">
                    <div class="row">
                        <?php
                        if (have_rows('honoured_persons')):
                            // loop through rows (parent repeater)
                            $n = 0;
                            while (have_rows('honoured_persons')): the_row();
//                                echo '<pre>';
//                                print_r(get_sub_field());
//                                echo '</pre>';
                                $name = preg_replace('/\s+/', '', get_sub_field('name'));
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" id="<?php echo $name . '_' . $n; ?>">
                                    <div class="hall-fame">                                        
                                        <?php $image = get_sub_field('image'); ?>
                                        <img class="img-responsive center-block hall-img" src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('name'); ?>">
                                        <div class="hall-frame"></div>
                                        <!--<h4 class="fallen_title"><?php //the_sub_field('name'); ?></h4>-->
                                        <h4 class="font_normal"><?php the_sub_field('name'); ?></h4>
                                        <!--<div class="fallen_desc"><?php //echo strip_tags(substr(get_sub_field('description'), 0, 80)); ?></div>-->
                                        <p class="rep_read_more_<?php echo $n; ?> mr-bott-0 honor_roll_p" id="<?php echo $n; ?>">
                                            Read More
                                            <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                            </p>
                                        
                                        <!--<button id="" class="all">Read More</button>-->
                                    </div>                                   
                                </div>

                                <script type="text/javascript" charset="utf-8">
                                    jQuery(document).ready(function() {
                                        //jQuery('#info').hide();
                                        jQuery(".rep_read_more_<?php echo $n; ?>").click(function() {
                                            jQuery('#honor').hide();

                                            var post_rep_id = $(this).attr('id');
                                            var post_id = <?php echo get_the_id(); ?>;

                                            $.ajax({
                                                type: 'POST',
                                                url: '../ajax/ajax.php',
                                                data: {
                                                    'post_rep_id': post_rep_id,
                                                    'post_id': post_id,
                                                    '_method': 'honour-frame',
                                                    '_type': 'ajax'
                                                },
                                                success: function(data) {
                                                    $("#info").html(data);
                                                    $('#info_share').show();
                                                }
                                            });
                                            return false;
                                        });
                                    });
                                </script>

                                <?php
                                $n++;
                            endwhile;
                        endif;
                        ?>        
                    </div>
                </div>
                <hr>

            </div>
        </div>    
    </div>
</div>
 
<div class="container" id="info">

</div>

<?php /* ?>
<h4>Share Post/Articles on Social Networking Sites -</h4>
<?php echo do_shortcode('[wp_social_sharing]'); ?>
<br>
<?php echo do_shortcode('[whatsapp]'); ?>
<?php */ ?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        // $('#info_share').hide();

    });
</script>
<?php get_footer(); ?>