<?php
/**
 * Template Name: Loan Page
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
    <img class="img-responsive img-thumbnail pull-right"  src="<?php echo $image['url']; ?>" alt="" />  

    <?php $image = get_field('advertisement_right_second'); ?>
    <img class="img-responsive img-thumbnail pull-right"  src="<?php echo $image['url']; ?>" alt="" />  
</div>
<div class="container">
    <div class="botgrapper_wrp">  
        <div class="row mr-top30" id="">
            <form method="post" name="filter_drop">
                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">

                    <h4 class="mr-bott20 mr-top20">                        
                        Country
                        <span class="remotegage mort">
                            <select class="form-control" name="country" id="country" >
                                <option>--Select--</option>
                                <?php
                                //$c = $_POST['id'];
                                $sql_con = $wpdb->get_results('SELECT id,name FROM `af_country`');
                                //print_r($sql_con);
                                foreach ($sql_con as $con) {
                                    ?>                               
                                    <option value="<?php echo $con->id; ?>"><?php echo $con->name; ?></option>
                                <?php } ?>
                            </select>
                        </span> 
                        Duration of Loan
                        <span class="remotegage">
                            <select class="form-control" name="loan_time" id="loan_time">
                                <option value="">--Select--</option>
                                <?php
                                $sql_lon = $wpdb->get_results('SELECT `id`, `name` FROM `af_loan_time` ');
                                foreach ($sql_lon as $lm) {
                                    ?>
                                    <option value="<?php echo $lm->id; ?>"><?php echo $lm->name; ?></option>  
                                <?php } ?>
                            </select>
                        </span>
                        Loan type
                        <span class="remotegage">
                            <select id="amort" class="form-control mort slct_wdh_250" name="lone_type" >
                                <option>--Select--</option>
                                <?php
                                $sql_lon = $wpdb->get_results('SELECT id,name FROM `af_loantype`');
                                foreach ($sql_lon as $lon) {
                                    ?>
                                    <option value="<?php echo $lon->id; ?>"><?php echo $lon->name; ?></option>
                                <?php } ?>

                            </select>
                            <input type="hidden" value="<?php echo home_url(); ?>" name="url" id="url" />
                        </span>

                        <script type="text/javascript" charset="utf-8">
                            jQuery(document).ready(function() {
                                // $('#mort').hide();
                                jQuery("#amort").change(function() {

                                    var mort_id = $('#amort').val();
                                    var url = $('#url').val();                                   

                                    $.ajax({
                                        type: 'POST',
                                        url: 'http://aprecon.com/ajax/ajax.php',
                                        data: {
                                            'mort_id': mort_id,
                                            'url': url,                                          
                                            '_method': 'filter_drop',
                                            '_type': 'ajax'
                                        },
                                        success: function(data) {
                                            $("#loan").html(data);
//                                            alert(mort_id);                                           
                                        }
                                    });
                                    return false;
                                });
                            });
                        </script>

                        <script type="text/javascript" charset="utf-8">
                            jQuery(document).ready(function() {
                                // $('#mort').hide();
                                jQuery("#search").click(function() {

                                    var mort_id = $('#amort').val();
                                    var url = $('#url').val();
                                    var country = $('#country').val();
                                    var loan_time = $('#loan_time').val();

                                    $.ajax({
                                        type: 'POST',
                                        url: 'http://aprecon.com/ajax/ajax.php',
                                        data: {
                                            'mort_id': mort_id,
                                            'url': url,
                                            'country': country,
                                            'loan_time': loan_time,
                                            '_method': 'filter_srech',
                                            '_type': 'ajax'
                                        },
                                        success: function(data) {
                                            $("#loan").html(data);
//                                            alert(mort_id);                                           
                                        }
                                    });
                                    return false;
                                });
                            });
                        </script>



                    </h4>

                    <div class="mr-bott20 mr-top20" style="font-size:18px;" >
                        <!--Loan Amount--> 



<!--                        <p id="mort">Mortgage Amount
    for particular amount
    <span class="remotegage" >
        <span class="remotegage" >                                                  
                        <?php $mamount = $_POST['mamount']; ?>
            <input id="mamount" name="mamount" type="text" min="1" max="1000000"  value="500" class="form-control " />  


        </span>
    </span>
</p>-->
                        <script  type="text/javascript" charset="utf-8">
                            jQuery(document).ready(function() {
                                $('#mort').hide();
                                jQuery("#amort").change(function() {
                                    // var mort_id = $('#amort').val();
                                    if (this.value == 3) {
                                        $("#mort").show();
                                        //alert($("mort_id").attr('id'));
                                    } else {
                                        $("#mort").hide();
                                    }
                                });
                            });
                        </script>


                    </div>
                </div>   
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12" style="float: right;">
                    <div class="btn-group pull-right">

                        <button class="btn mortgage-drop dropdown-toggle" type="submit" id="search" name="search"> Search... </button>
                    </div>
                </div>
            </form>




        </div> 


        <div class="row mt-15" id="loan">

        </div>

    </div>
</div>

<?php get_footer(); ?>
