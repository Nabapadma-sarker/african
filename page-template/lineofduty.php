<?php
/**
 * Template Name: In The Line Of Duty Page
 */
get_header();
?>
      
      <div class="container">
      
      	<ol class="breadcrumb mr-top20 inverse1">
        
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
      
      <div style="background: #000;" class="mr-top30">  
        
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3 class="mr-top0 white-color"><?php the_title();?></h3>
      <div class="progress">
        <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
      </div>
      
      <div class="">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 white-color">
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
          </div>

<br>
              <!--<h4>Share Post/Articles on Social Networking Sites -</h4>-->
<?php //echo @do_shortcode('[wp_social_sharing]'); ?>
<br>
<?php //echo do_shortcode('[whatsapp]'); ?>

      </div>
      <hr>
      
      	</div>
      </div>    
      </div>
      </div>
<?php get_footer(line); ?>