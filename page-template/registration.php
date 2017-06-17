<?php
/**
 * Template Name: Registration Page
 */
get_header();
?>

<div class="container">                 
    <div class="botgrapper_wrp mr-top30 ">  
        <div class="row">
            <div class="col-md-2"></div>  
            <div class="col-md-12 col-lg-8 col-sm-8 col-xs-12">
                <div class="mod_wrp">
<div class="modal-header1">        
                            <h4 id="myModalLabel" class="modal-title">Registered to <span style="color:#363795; font-weight:bold; font-size:20px;">The Progressive African Economist</span> 
                        </div>
                    <div class="form_cont" style="margin: 38px;">

                        
                        <?php echo do_shortcode('[wpmem_form register]') ?>


                    </div>
                </div>   
            </div> 
            <div class="col-md-2"></div> 
        </div>
    </div>
</div>
<?php get_footer(); ?>
