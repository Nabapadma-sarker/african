<?php
/**
 * Template Name: User Profile Page
 */
get_header();
?>

<div class="container">
<!--    <ol class="breadcrumb mr-top20">
        <li><?php //if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>  
    </ol>-->
    <div class="botgrapper_wrp mr-top30">  

        <div class="row">

            <h3><?php// the_title(); ?></h3>
            <div class="progress">
                <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
            </div>

            <?php echo do_shortcode('[wp-members page="user-profile"]') ?>

        </div>
        <!--</div>-->
    </div>
</div>
<?php get_footer(); ?>