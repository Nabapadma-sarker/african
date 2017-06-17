  <?php
/**
 * Template Name: Music Page
 */
get_header();
?>
<div class="bottomMenu">      
        <?php $image = get_field('advertisement_left'); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" />          
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
<!--                <h3><?php //the_field('movies',315);?></h3>
                <h5> <span class="red-color"><?php //the_field('theater',315);?></span></h5>
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>-->

                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading panwrp">
                        <ul class="nav nav-tabs">
                            <?php
                            $first = true;

//                            $args = array(
//                                'post_type' => 'movies',
//                                'taxonomy' => 'categorie',
//                            );
//                            $subcategories = get_categories($args);
//                            foreach ($subcategories as $cat) {
//                                $arg = array(category__in => array($cat->cat_ID),);
//                                $the_query = new WP_Query($arg);

                            $sql = $wpdb->get_results("SELECT af_terms.name,af_terms.term_id from af_term_taxonomy join af_terms on af_terms.term_id = af_term_taxonomy.term_id where af_term_taxonomy.taxonomy = 'categoriess' ");
                            foreach ($sql as $r) {
//                               " term_id" ='term_taxonomy_id'
                                // echo   $r->term_taxonomy_id ; 
                                ?>

                                <li class="<?php
                                if ($first) {
                                    echo 'active';
                                    $first = false;
                                }
                                ?>"><a data-toggle="tab" href="#<?php echo  $r->term_id; ?>" class="font-600"><?php echo  $r->name; ?></a></li>

                            <?php } ?>
                        </ul>
                    </div>



                    <div class="panel-body">
                        <div class="tab-content">

                            <?php
                            $f = true;
                            $sql = $wpdb->get_results("SELECT af_terms.name ,af_terms.term_id from af_term_taxonomy join af_terms on af_terms.term_id = af_term_taxonomy.term_id where af_term_taxonomy.taxonomy = 'categoriess'  ");
                            foreach ($sql as $r) {
//                                           
                                ?>
                                <div id="<?php echo $r->term_id; ?>" class="tab-pane fade in  <?php
                                if ($f) {
                                    echo 'active';
                                    $f = false;
                                }
                                ?>">                             
                                   

                                    <?php
                                    $t = "$r->term_id";
                                    $sql1 = $wpdb->get_results("SELECT af_posts.post_title,af_posts.id AS 'id',
        max(if(`meta_key`='music_content_0_music_duration', `meta_value`, null )) AS 'duration',
        max(if(`meta_key`='music_content_0_music_metascore', `meta_value`, null )) AS 'metascore',
        max(if(`meta_key`='music_content_0_music_description', `meta_value`, null )) AS 'description', 
        max(if(`meta_key`='music_content_0_music_director', `meta_value`, null )) AS 'director', 
        max(if(`meta_key`='music_content_0_singer', `meta_value`, null )) AS 'singer', 
        max(if(`meta_key`='music_content_0_music_buzz', `meta_value`, null )) AS 'buzz', 
        max(if(`meta_key`='music_content_0_music_tralier', `meta_value`, null )) AS 'tralier', 
        max(if(`meta_key`='_thumbnail_id', `meta_value`, null )) AS 'pic' 
        FROM `af_posts` 
        inner join af_postmeta 

        on af_posts.ID = af_postmeta.post_id

        inner join af_term_relationships

        on af_term_relationships.object_id = af_posts.ID 

        where af_term_relationships.term_taxonomy_id = $t 
    
        GROUP BY af_posts.ID");


                                    foreach ($sql1 as $s) {
                                        $sql2 = $wpdb->get_results("SELECT guid FROM `af_posts` WHERE id= $s->pic") ;
//                                       echo "<pre>"; 
//                                       //print_r($sql2 );                                        
//                                       print_r($sql2[0]->guid);
//                                       echo "</pre>"; 
                                        
                                       // print_r($sql2[0]['guid'] );                                        
                                        ?>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                 <a href="<?php echo get_permalink($s->id); ?>">               
              <img style="width:334px;height:200px;" class="img-responsive img-thumbnail mr-bott10" src="<?php echo $sql2[0]->guid ;?>" alt="<?php echo $s->post_title; ?>">
          </a>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <h4 class="red-color text-uppercase mr-top0"><a href="<?php echo get_permalink($s->id); ?>"><?php echo $s->post_title; ?></a></h4>
                                                <!--<p class="movies-txt"> <?php// echo $s->duration; ?></p>-->
                                                <p class="movies-txt">Metascore:<a><?php echo $s->duration; ?>, <?php echo $s->metascore; ?></a> </p>
                                                <p style="font-size:13px;"><?php echo $s->description; ?></p>
                                                <p class="movies-txt"> <strong>Music Director:</strong> <a><?php echo $s->director; ?></a> </p>
                                                <p class="movies-txt"> <strong>Singer:</strong> <a><?php echo $s->singer; ?></a> </p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <p class="text-justify">
                                                    <strong>The Buzz:</strong> <?php echo $s->buzz; ?> 
                                                </p>
                                            </div>
                                        </div>


                                        <?php
                                        // endwhile;
                                        //  endif;
                                        ?>
                                    <?php } ?>
                                    <hr>
                                </div>
                            <?php } ?>
                        </div>                   
                    </div>           
                </div>
            </div>


            <?php echo do_shortcode('') ?>


           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3 class="mr-bott20">Advertisement</h3>  
                <?php $image = get_field('advertisements',315); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" />
                 <div class="hrow mr-top10"></div>
                <div class="cate-wraper">
<?php $image = get_field('advertisements_second',315); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" /> 
                   </div> 
            </div>  
        </div>    
    </div>
</div>

<?php get_footer(); ?>


