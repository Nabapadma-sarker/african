<?php
/**
 * Template Name: Fallen Page
 */
get_header();
?>
<div class="container">

    <ol class="breadcrumb mr-top20 inverse1">
     <!--<a href="<?php echo home_url(); ?>">Home</a>-->
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

    <div class="botgrapper_wrp mr-top30 line-duty-bg">  

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">               
                <form action="" method="post" class="form-inline fal">
                    <div class="form-group">
                        <h3 class="mr-top0">The Fallen </h3></div>
                    <div class="form-group">
                        <span class="remotegage mort">
                            <select class="form-control input-sm flen" name="country">                                
                                <option value="0"> All </option>
                                <?php
                                $sql_con = $wpdb->get_results('SELECT af_terms.term_id, af_terms.name  from af_term_taxonomy join af_terms on af_terms.term_id = af_term_taxonomy.term_id where af_term_taxonomy.taxonomy = "fallen category" ');
                                foreach ($sql_con as $con) {
                                    ?>                               
                                    <option  value="<?php echo $con->term_id; ?>"><?php echo $con->name; ?></option>
                                <?php }
                                ?>
                            </select>
                        </span>
                        <input type="submit" value="Filter" name="filter-coun" class="btn btn-default fbtn"/>
                    </div>
                </form>           
                <div class="progress">
                    <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
                </div>

                <div class="">
                    <div class="row">    
                        <?php  
  $country = $_POST["country"];                    
                    if(isset($_POST["filter-coun"])){
                   if($_POST['country'] == '0') {
//                      if (isset($_POST['filter-coun'])=='0') { 
                          $sql1 = $wpdb->get_results("SELECT af_posts.post_title,af_posts.id AS 'id', max(if(`meta_key`='rank', `meta_value`, null )) AS 'rank', max(if(`meta_key`='service', `meta_value`, null )) AS 'services', max(if(`meta_key`='dod', `meta_value`, null )) AS 'dod', max(if(`meta_key`='_thumbnail_id', `meta_value`, null )) AS 'pic' FROM `af_posts` inner join af_postmeta on af_posts.ID = af_postmeta.post_id inner join af_term_relationships on af_term_relationships.object_id = af_posts.id where af_posts.post_type = 'fallen' GROUP BY af_posts.ID");
                      }
                      else{
                        $sql1 = $wpdb->get_results("SELECT af_posts.post_title,af_posts.id AS 'id',
        max(if(`meta_key`='rank', `meta_value`, null )) AS 'rank',
        max(if(`meta_key`='service', `meta_value`, null )) AS 'services',
        max(if(`meta_key`='dod', `meta_value`, null )) AS 'dod', 
        max(if(`meta_key`='_thumbnail_id', `meta_value`, null )) AS 'pic' 
                
        FROM `af_posts`
        
        inner join af_postmeta 

        on af_posts.ID = af_postmeta.post_id
        
        inner join af_term_relationships 
        
        on af_term_relationships.object_id = af_posts.id

	where af_term_relationships.term_taxonomy_id = $country
       GROUP BY af_posts.ID ");
                    }
                    }else {
                      $sql1 = $wpdb->get_results("SELECT af_posts.post_title,af_posts.id AS 'id', max(if(`meta_key`='rank', `meta_value`, null )) AS 'rank', max(if(`meta_key`='service', `meta_value`, null )) AS 'services', max(if(`meta_key`='dod', `meta_value`, null )) AS 'dod', max(if(`meta_key`='_thumbnail_id', `meta_value`, null )) AS 'pic' FROM `af_posts` inner join af_postmeta on af_posts.ID = af_postmeta.post_id inner join af_term_relationships on af_term_relationships.object_id = af_posts.id where af_posts.post_type = 'fallen' GROUP BY af_posts.ID");
                        
                    }
                    
                        foreach ($sql1 as $s) {                           
                            $sql2 = $wpdb->get_results("SELECT guid FROM `af_posts` WHERE id= $s->pic");//                                                                         
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 " id='<?php echo $con->term_id; ?>'>
                                <a href="<?php echo get_permalink($s->id); ?>">
                                    <img class="img-responsive mr-bott20" style="width:230px;height:220px" src="<?php echo $sql2[0]->guid; ?>" alt="<?php echo $s->post_title; ?>"> </a>
                                <div class="">
                                    <div class="table-responsive">
<table class="table table-bordered">
<tr style="height:60px">
   <td>Name</td>
   <td><?php echo $s->post_title; ?></td>
</tr>
<tr>
   <td>Rank</td>
   <td><?php echo $s->rank; ?></td>
</tr>
<tr>
   <td>Service</td>
   <td><?php echo $s->services; ?></td>
</tr>
<tr style="height:60px">
   <td>DOD</td>
   <td><?php echo $s->dod?></td>
</tr>
<tr>   
   <td class="text-center" colspan="2"><a href="<?php echo get_permalink($s->id); ?>"> Read More Full Bio >></a></td>
</tr>
</table>
                                       
                                    </div>
                                </div>
                            </div>              
                            <?php
                        }
// Reset Query
                        wp_reset_query();
                        ?>
                        <?php
                        // }
                        //       }
                        ?>
                    </div>
                </div>

            </div>
        </div>    
    </div>
</div>
                                <?php get_footer(line); ?>