<?php
/**
 * Template Name: Saving Account Page
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
    <img class="img-responsive  pull-right"  src="<?php echo $image['url']; ?>" alt="" />  
</div>
<div class="container">

    <div class="botgrapper_wrp">  
        <div class="row mr-top30">
            <form method="post" name="att_filter">
                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">

                    <h4 class="mr-bott20 mr-top20">                        
                        Country
                        <span class="remotegage mort">
                            <select class="form-control" name="contry" >
                                <option>--Select--</option>
                                <?php
                                //$c = $_POST['id'];
                                $sql_con = $wpdb->get_results('SELECT id,name FROM `af_country`');
                                foreach ($sql_con as $con) {
//                                    echo "<pre>";
//                                    print_r($con);
//                                    echo "</pre>";
                                    ?>
                                    <option  value="<?php echo $con->id; ?>"><?php echo $con->name; ?></option>
                                <?php } ?>
                            </select>
                        </span> 
                        Saving Account Type
                        <span class="remotegage">
                            <select id="amort" class="form-control mort" name="lone_type" >
                                <option>--Select--</option>
                                <?php
                                $sql_lon = $wpdb->get_results('SELECT id,name FROM `af_savingtype`');
                                foreach ($sql_lon as $lon) {
                                    ?>
                                    <option  value="<?php echo $lon->id; ?>"><?php echo $lon->name; ?></option>
                                <?php } ?>
                            </select>
                        </span>
                    </h4>
                </div>   
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" style="float: right;">
                    <div class="btn-group pull-right">
                        <button class="btn mortgage-drop dropdown-toggle" type="submit" id="submit" name="search"> Search... </button>
                    </div>
                </div>
            </form>
        </div>  

        <div class="row mt-15">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">                   
                    <table id="example" class="table table-bordered display">
                        <thead> 
                            <tr class="provider-detail"> 
                                <th class="wh-12 no-sort"> Loan Provider</th>                                 
                                <th class="wh-7"> Interest Rate</th> 
                                <th class="wh-11">Account Type</th>
                                <th class="wh-15 no-sort">Min/Max opening amount</th> 
                                <th class="wh-35">Notice / Term</th> 
                                <th class="wh-9">Access</th> 
                                <th class="wh-11 no-sort">&nbsp;</th>
                            </tr> 
                        </thead>
                        <tbody class="text-center">
                            <?php
                            if (isset($_POST['search'])) {
                                $c_id = $_POST['contry'];
                                $lt_id = $_POST['lone_type'];
                                $qry = "SELECT sc.`name` as sname ,sc.sub_type,sc.image  ,sc.`min_open`,sc.`max_open`,sc.`term`,sc.`access`  ,c.name as cname ,lt.name as ltname ,sc.i_rate,sc.link
FROM `af_savingaccount` as sc
inner join af_country as c on sc.c_id like c.id 
inner join af_savingtype as lt on sc.`type` like lt.id
where c.id like $c_id and lt.id like $lt_id ";
                                $sql_lc = $wpdb->get_results("$qry");
                                // print_r($qry);
                            } else {
                                $sql_lc = $wpdb->get_results("SELECT sc.`name` as sname ,sc.sub_type,sc.image  ,sc.`min_open`,sc.`max_open`,sc.`term`,sc.`access`  ,c.name as cname ,lt.name as ltname ,sc.i_rate,sc.link
FROM `af_savingaccount` as sc
inner join af_country as c on sc.c_id like c.id 
inner join af_savingtype as lt on sc.`type` like lt.id 
");
                            }
                            foreach ($sql_lc as $lc) {
                                ?>                          
                                <tr> 
                                    <td class="text-info td_loan"><?php echo $lc->sname; ?><br>
                                        <img src="<?php echo home_url() ?>/wp-content/uploads/af/<?php echo $lc->image; ?>" class="img-responsive img-thumbnail loan_img"
                                             alt="<?php
                                             echo $lc->image;
                                             ?>">
                                    </td>                                     
                                    <td> 
                                        <?php
                                        $intest = $lc->i_rate;
                                        echo $lc->i_rate;
                                        ?>
                                    </td>                                                                       
                                    <td>
                                        <?php
                                        $type = $lc->ltname;
                                        echo $lc->sub_type;
                                        ?>
                                    </td> 
                                    <td>
                                        <?php
                                        $min = $lc->min_open;
                                        echo $lc->min_open;
                                        ?> to <?php
                                        $max = $lc->max_open;
                                        echo $lc->max_open;
                                        ?>
                                    </td>
                                  
                                    <td> 
                                        <?php
                                        $term = $lc->term;
                                        echo $lc->term;
                                        ?>
                                    </td>
                                    <td> 
                                        <?php
                                        $access = $lc->access;
                                        echo $lc->access;
                                        ?>
                                    </td>

                                    <td>
                                        <?php $link = $lc->link; ?>
                                    <a target="_blank" href="<?php echo $lc->link; ?>">
                                        <div class="go-to-site">Go to Site</div>
                                         </a>
                                    </td> 
                                </tr> 

                            <?php }
                            ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
