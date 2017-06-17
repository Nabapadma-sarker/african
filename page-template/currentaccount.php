<?php
/**
 * Template Name: Current Account Page
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
                        Current Account Type
                        <span class="remotegage">
                            <select id="amort" class="form-control mort slct_wdh_250" name="current_type" >
                                <option>--Select--</option>
                                <?php
                                $sql_lon = $wpdb->get_results('SELECT id,name FROM `af_currenttype`');
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
                    <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
                        <thead> 
                            <tr class="provider-detail"> 
                                <th class="no-sort"> Provider/Product Name</th>                                 
                                <th> Account Type</th>
                                <th> Interest Rate(AER)</th>
                                <th>Monthly Fee</th>                                
                                <th class="no-sort">Transaction Charge List </th>                               
                                <th class="no-sort">&nbsp;</th>
                            </tr> 
                        </thead>
                        <tbody class="text-center">
                            <?php
                            if (isset($_POST['search'])) {
                                $c_id = $_POST['contry'];
                                $ca_id = $_POST['current_type'];
                                $qry = "SELECT ca.name,ca.sub_type,ca.image,ca.i_rate,ca.emi,ca.`transaction`,ct.name as cname,c.name as cname

FROM `af_currentaccount` as ca

inner join af_country as c on ca.c_id like c.id 

inner join af_currenttype as ct on ca.`type` like ct.id 
where c.id like $c_id and ct.id like $ca_id  ";
                                $sql_lc = $wpdb->get_results("$qry");
                                // print_r($qry);
                            } else {
                                $sql_lc = $wpdb->get_results("SELECT ca.name,ca.sub_type,ca.image,ca.i_rate,ca.emi,ca.`transaction`,ct.name as cname,c.name as cname,ca.link

FROM `af_currentaccount` as ca

inner join af_country as c on ca.c_id like c.id 

inner join af_currenttype as ct on ca.`type` like ct.id 
");
                            }
                            foreach ($sql_lc as $lc) {
                                ?>                          
                                <tr> 
                                    <td class="text-info td_loan"><?php echo $lc->name; ?><br>
                                        <img src="<?php echo home_url() ?>/wp-content/uploads/af/<?php echo $lc->image; ?>" class="img-responsive img-thumbnail loan_img"
                                             alt="<?php
                                             echo $lc->image;
                                             ?>">
                                    </td>
                                    <td>
                                        <?php
                                        echo $lc->sub_type;
                                        ?>
                                    </td>
                                    <td> 
                                        <?php
                                        $intest = $lc->i_rate;
                                        echo $lc->i_rate;
                                        ?>
                                    </td>                                                                       
                                    <td>
                                        <?php
                                        $type = $lc->emi;
                                        echo $lc->emi;
                                        ?>
                                    </td>                                    
                                    <td> 
                                        <?php
                                        $term = $lc->transaction;
                                        echo $lc->transaction;
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
