<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
?>
<div class="breakcont_wrp mr-top20">
    <div class="bottomMenu">
        <?php $image = get_field('banner_left', 18); ?>
        <img class="img-responsive mr-bott10" src="<?php echo $image['url']; ?>" alt="">
        <?php $image = get_field('banner_left_2', 18); ?>
        <img class="img-responsive pull-right" src="<?php echo $image['url']; ?>" alt="">
    </div>
    <div class="bottomMenu bottomMenu-1">
        <?php $image = get_field('banner_right', 18); ?>
        <img class="img-responsive mr-bott10 pull-right" src="<?php echo $image['url']; ?>" alt="">   
        <?php $image = get_field('banner_right_2', 18); ?>
        <img class="img-responsive pull-right" src="<?php echo $image['url']; ?>" alt="">
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div id='rectangle' class="arrow_box imgcont">
                      <h4 class="nws_stl"><?php the_field('markets_&_forex_title', 18); ?></h4>  
                    </div>
                    <div class="newscont textx">
                        <?php the_field('markets_&_forex_content', 18); ?>
                    </div>
                </div>   
            </div>              
        </div> 


        <h2 class="currency-heading">APRECON Currency Converter</h2>

        <div class="currency-bg">
            <?php
            $url = "https://restcountries.eu/rest/v2/all";
            $result = file_get_contents($url);
            $countries = json_decode($result, true);
            //                            echo '<pre>';
            //                            print_r($countries);
            //                            echo '</pre>';
            //$countries = array("AFA" => "Afghani", "AFN" => "Afghani", "ALK" => "Albanian old lek", "ALL" => "Lek", "DZD" => "Algerian Dinar", "USD" => "US Dollar", "ADF" => "Andorran Franc", "ADP" => "Andorran Peseta", "EUR" => "Euro", "AOR" => "Angolan Kwanza Readjustado", "AON" => "Angolan New Kwanza", "AOA" => "Kwanza", "XCD" => "East Caribbean Dollar", "ARA" => "Argentine austral", "ARS" => "Argentine Peso", "ARL" => "Argentine peso ley", "ARM" => "Argentine peso moneda nacional", "ARP" => "Peso argentino", "AMD" => "Armenian Dram", "AWG" => "Aruban Guilder", "AUD" => "Australian Dollar", "ATS" => "Austrian Schilling", "AZM" => "Azerbaijani manat", "AZN" => "Azerbaijanian Manat", "BSD" => "Bahamian Dollar", "BHD" => "Bahraini Dinar", "BDT" => "Taka", "BBD" => "Barbados Dollar", "BYR" => "Belarussian Ruble", "BEC" => "Belgian Franc (convertible)", "BEF" => "Belgian Franc (currency union with LUF)", "BEL" => "Belgian Franc (financial)", "BZD" => "Belize Dollar", "XOF" => "CFA Franc BCEAO", "BMD" => "Bermudian Dollar", "INR" => "Indian Rupee", "BTN" => "Ngultrum", "BOP" => "Bolivian peso", "BOB" => "Boliviano", "BOV" => "Mvdol", "BAM" => "Convertible Marks", "BWP" => "Pula", "NOK" => "Norwegian Krone", "BRC" => "Brazilian cruzado", "BRB" => "Brazilian cruzeiro", "BRL" => "Brazilian Real", "BND" => "Brunei Dollar", "BGN" => "Bulgarian Lev", "BGJ" => "Bulgarian lev A/52", "BGK" => "Bulgarian lev A/62", "BGL" => "Bulgarian lev A/99", "BIF" => "Burundi Franc", "KHR" => "Riel", "XAF" => "CFA Franc BEAC", "CAD" => "Canadian Dollar", "CVE" => "Cape Verde Escudo", "KYD" => "Cayman Islands Dollar", "CLP" => "Chilean Peso", "CLF" => "Unidades de fomento", "CNX" => "Chinese People's Bank dollar", "CNY" => "Yuan Renminbi", "COP" => "Colombian Peso", "COU" => "Unidad de Valor real", "KMF" => "Comoro Franc", "CDF" => "Franc Congolais", "NZD" => "New Zealand Dollar", "CRC" => "Costa Rican Colon", "HRK" => "Croatian Kuna", "CUP" => "Cuban Peso", "CYP" => "Cyprus Pound", "CZK" => "Czech Koruna", "CSK" => "Czechoslovak koruna", "CSJ" => "Czechoslovak koruna A/53", "DKK" => "Danish Krone", "DJF" => "Djibouti Franc", "DOP" => "Dominican Peso", "ECS" => "Ecuador sucre", "EGP" => "Egyptian Pound", "SVC" => "Salvadoran colón", "EQE" => "Equatorial Guinean ekwele", "ERN" => "Nakfa", "EEK" => "Kroon", "ETB" => "Ethiopian Birr", "FKP" => "Falkland Island Pound", "FJD" => "Fiji Dollar", "FIM" => "Finnish Markka", "FRF" => "French Franc", "XFO" => "Gold-Franc", "XPF" => "CFP Franc", "GMD" => "Dalasi", "GEL" => "Lari", "DDM" => "East German Mark of the GDR (East Germany)", "DEM" => "Deutsche Mark", "GHS" => "Ghana Cedi", "GHC" => "Ghanaian cedi", "GIP" => "Gibraltar Pound", "GRD" => "Greek Drachma", "GTQ" => "Quetzal", "GNF" => "Guinea Franc", "GNE" => "Guinean syli", "GWP" => "Guinea-Bissau Peso", "GYD" => "Guyana Dollar", "HTG" => "Gourde", "HNL" => "Lempira", "HKD" => "Hong Kong Dollar", "HUF" => "Forint", "ISK" => "Iceland Krona", "ISJ" => "Icelandic old krona", "IDR" => "Rupiah", "IRR" => "Iranian Rial", "IQD" => "Iraqi Dinar", "IEP" => "Irish Pound (Punt in Irish language)", "ILP" => "Israeli lira", "ILR" => "Israeli old sheqel", "ILS" => "New Israeli Sheqel", "ITL" => "Italian Lira", "JMD" => "Jamaican Dollar", "JPY" => "Yen", "JOD" => "Jordanian Dinar", "KZT" => "Tenge", "KES" => "Kenyan Shilling", "KPW" => "North Korean Won", "KRW" => "Won", "KWD" => "Kuwaiti Dinar", "KGS" => "Som", "LAK" => "Kip", "LAJ" => "Lao kip", "LVL" => "Latvian Lats", "LBP" => "Lebanese Pound", "LSL" => "Loti", "ZAR" => "Rand", "LRD" => "Liberian Dollar", "LYD" => "Libyan Dinar", "CHF" => "Swiss Franc", "LTL" => "Lithuanian Litas", "LUF" => "Luxembourg Franc (currency union with BEF)", "MOP" => "Pataca", "MKD" => "Denar", "MKN" => "Former Yugoslav Republic of Macedonia denar A/93", "MGA" => "Malagasy Ariary", "MGF" => "Malagasy franc", "MWK" => "Kwacha", "MYR" => "Malaysian Ringgit", "MVQ" => "Maldive rupee", "MVR" => "Rufiyaa", "MAF" => "Mali franc", "MTL" => "Maltese Lira", "MRO" => "Ouguiya", "MUR" => "Mauritius Rupee", "MXN" => "Mexican Peso", "MXP" => "Mexican peso", "MXV" => "Mexican Unidad de Inversion (UDI)", "MDL" => "Moldovan Leu", "MCF" => "Monegasque franc (currency union with FRF)", "MNT" => "Tugrik", "MAD" => "Moroccan Dirham", "MZN" => "Metical", "MZM" => "Mozambican metical", "MMK" => "Kyat", "NAD" => "Namibia Dollar", "NPR" => "Nepalese Rupee", "NLG" => "Netherlands Guilder", "ANG" => "Netherlands Antillian Guilder", "NIO" => "Cordoba Oro", "NGN" => "Naira", "OMR" => "Rial Omani", "PKR" => "Pakistan Rupee", "PAB" => "Balboa", "PGK" => "Kina", "PYG" => "Guarani", "YDD" => "South Yemeni dinar", "PEN" => "Nuevo Sol", "PEI" => "Peruvian inti", "PEH" => "Peruvian sol", "PHP" => "Philippine Peso", "PLZ" => "Polish zloty A/94", "PLN" => "Zloty", "PTE" => "Portuguese Escudo", "TPE" => "Portuguese Timorese escudo", "QAR" => "Qatari Rial", "RON" => "New Leu", "ROL" => "Romanian leu A/05", "ROK" => "Romanian leu A/52", "RUB" => "Russian Ruble", "RWF" => "Rwanda Franc", "SHP" => "Saint Helena Pound", "WST" => "Tala", "STD" => "Dobra", "SAR" => "Saudi Riyal", "RSD" => "Serbian Dinar", "CSD" => "Serbian Dinar", "SCR" => "Seychelles Rupee", "SLL" => "Leone", "SGD" => "Singapore Dollar", "SKK" => "Slovak Koruna", "SIT" => "Slovenian Tolar", "SBD" => "Solomon Islands Dollar", "SOS" => "Somali Shilling", "ZAL" => "South African financial rand (Funds code) (discont", "ESP" => "Spanish Peseta", "ESA" => "Spanish peseta (account A)", "ESB" => "Spanish peseta (account B)", "LKR" => "Sri Lanka Rupee", "SDD" => "Sudanese Dinar", "SDP" => "Sudanese Pound", "SDG" => "Sudanese Pound", "SRD" => "Surinam Dollar", "SRG" => "Suriname guilder", "SZL" => "Lilangeni", "SEK" => "Swedish Krona", "CHE" => "WIR Euro", "CHW" => "WIR Franc", "SYP" => "Syrian Pound", "TWD" => "New Taiwan Dollar", "TJS" => "Somoni", "TJR" => "Tajikistan ruble", "TZS" => "Tanzanian Shilling", "THB" => "Baht", "TOP" => "Pa'anga", "TTD" => "Trinidata and Tobago Dollar", "TND" => "Tunisian Dinar", "TRY" => "New Turkish Lira", "TRL" => "Turkish lira A/05", "TMM" => "Manat", "RUR" => "Russian rubleA/97", "SUR" => "Soviet Union ruble", "UGX" => "Uganda Shilling", "UGS" => "Ugandan shilling A/87", "UAH" => "Hryvnia", "UAK" => "Ukrainian karbovanets", "AED" => "UAE Dirham", "GBP" => "Pound Sterling", "USN" => "US Dollar (Next Day)", "USS" => "US Dollar (Same Day)", "UYU" => "Peso Uruguayo", "UYN" => "Uruguay old peso", "UYI" => "Uruguay Peso en Unidades Indexadas", "UZS" => "Uzbekistan Sum", "VUV" => "Vatu", "VEF" => "Bolivar Fuerte", "VEB" => "Venezuelan Bolivar", "VND" => "Dong", "VNC" => "Vietnamese old dong", "YER" => "Yemeni Rial", "YUD" => "Yugoslav Dinar", "YUM" => "Yugoslav dinar (new)", "ZRN" => "Zairean New Zaire", "ZRZ" => "Zairean Zaire", "ZMK" => "Kwacha", "ZWD" => "Zimbabwe Dollar", "ZWC" => "Zimbabwe Rhodesian dollar");
            ?>
            <form class="row" method="post">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <input type="text" class="form-control currency-input" name="currency_value" placeholder="Enter Currency" value="1" required="required">
                </div>
                <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                    <select id="basic" class="selectpicker show-tick form-control currency-input input-brd" data-live-search="true" name="currency_from" required="required">
                        <option value="">--Select Country From--</option>
                        <?php foreach ($countries as $ck => $cv) { ?>
                            <option data-thumbnail="<?php echo $cv['flag']; ?>"
                                    value="<?php echo $cv['currencies'][0]['code']; ?>"><?php echo '(' . $cv['alpha3Code'] . ') ' . $cv['name'] . ' -- ' . $cv['currencies'][0]['code'] . ' (' . $cv['currencies'][0]['symbol'] . ')'; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="currency-divider text-center"><i class="fa fa-arrows-h" aria-hidden="true"></i></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <select id="basic" class="selectpicker show-tick form-control currency-input input-brd" data-live-search="true" name="currency_to" required="required">
                        <option value="">--Select Country To--</option>
                        <?php foreach ($countries as $ct_k => $ct_v) { ?>
                            <option data-thumbnail="<?php echo $ct_v['flag']; ?>"
                                    value="<?php echo $ct_v['currencies'][0]['code']; ?>"><?php echo '(' . $ct_v['alpha3Code'] . ') ' . $ct_v['name'] . ' -- ' . $ct_v['currencies'][0]['code'] . ' (' . $ct_v['currencies'][0]['symbol'] . ')'; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 txt_cntr">
                    <button type="submit" class="currency-search btn" name="currency_s"><i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
         <?php
            if (isset($_POST['currency_s'])) {
                function currencyConverter($currency_from, $currency_to, $currency_input)
                {
                    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
                    $yql_query = 'select * from yahoo.finance.xchange where pair in ("' . $currency_from . $currency_to . '")';
                    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
                    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
                    $yql_session = file_get_contents($yql_query_url);
                    $yql_json = json_decode($yql_session, true);
                    $currency_output = (float)$currency_input * $yql_json['query']['results']['rate']['Rate'];

                    return $currency_output;
                }

                $currency_input = $_POST['currency_value'];
                //currency codes : http://en.wikipedia.org/wiki/ISO_4217
                $currency_from = $_POST['currency_from'];
                $currency_to = $_POST['currency_to'];
                $currency = currencyConverter($currency_from, $currency_to, $currency_input);
                $currency_opp = currencyConverter($currency_to, $currency_from, $currency_input);
                ?>
                <div class="usd-text">
                    <h1 class="">
                        <?php echo $currency_input . ' ' . $currency_from . ' = <span>' . $currency . '</span> ' . $currency_to ?>
                    </h1>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12 text-right">
                        <h4 class="red-color"><?php echo $currency_from; ?></h4>
                        <h4 class="grey-color"><?php echo $currency_input . ' ' . $currency_from . ' = ' . $currency . ' ' . $currency_to ?></h4>
                    </div>
                    <div class="col-lg-2 col-md-1 col-sm-1 col-xs-12">
                        <div style="margin-top: 12px;" class="text-center"><i class="fa fa-arrows-h red-color" aria-hidden="true"></i></div>
                    </div>
                    <div class="col-lg-5 col-md-3 col-sm-3 col-xs-12">
                        <h4 class="red-color"><?php echo $currency_to; ?></h4>
                        <h4 class="grey-color">
                            <?php echo $currency_input . ' ' . $currency_to . ' = ' . $currency_opp . ' ' . $currency_from ?>
                        </h4>
                    </div>
                </div>
            <?php } ?>

        <p class="clearfix"></p><hr>

        <h2 class="currency-heading">Nigeria Parallel Market Rates</h2>
        <!--<h5 class="red-color ml-10">Quotes: <small>*Morning **Midday ***Evening</small></h5>-->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 table-responsive">
                <table id="parallel_market_data" class="table table-striped dollar-euro">
                    <thead>
                    <tr class="red-bg white-color">
                        <th>
                            <img src="https://restcountries.eu/data/nga.svg" class="img responsive cus_img_size">
                            NGN
                        </th>
                        <th>
                            <img src="https://restcountries.eu/data/usa.svg" class="img responsive cus_img_size">
                            USD <br>
                            BUY/SELL
                        </th>
                        <th>
                            <img src="https://restcountries.eu/data/gbr.svg" class="img responsive cus_img_size">
                            GBP <br>
                            BUY/SELL
                        </th>
                        <th>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/images/eur.png" class="img responsive cus_img_size">
                            EUR <br>
                            BUY/SELL
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <p class="clearfix"></p><br>



        <div class="row">
            <div class="col-md-8">
                <div class="slider-bg">
                    <div class="sub-product">
                        <div class="item">            
                            <div class="clearfix">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    <?php

$results = $wpdb->get_results('SELECT * FROM `af_posts` WHERE post_type = "slider" AND post_status = "publish" order by ID desc');

                                //$args = array(
                                //    'post_type' => 'slider',
                                //    'order' => 'desc'
                                //);
                                //query_posts($args);

                                // The Loop
                                foreach($results as $k => $v){ 

                                  $image = get_field('image',$v->ID);
                                    ?>
                                     <li data-thumb="<?php echo $image['sizes']['thumbnail']; ?>">
                                        <a id ="<?php echo $v->ID;?>" href="<?php echo get_permalink($v->ID);?>">
                                            <img class="img-responsive sldr_hght"  src="<?php echo $image['url']; ?>" />                                            
                                         </a>
                                         <?php //echo substr(strip_tags($v->post_content), 0, 160) ;?>
                                         <p><?php echo $v->post_title; ?></p>  
                                     </li>
                                
                                    <?php                                    
                                  } 
                                 // Reset Query
                                //wp_reset_query(); 
                                ?>                                          
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading panwrp">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab1default" class="font-600"><?php echo get_the_title(530); ?></a></li>
                            <li><a data-toggle="tab" href="#tab2default" class="font-600"><?php echo get_the_title(532); ?></a></li>
                            <li><a data-toggle="tab" href="#tab3default" class="font-600"><?php echo get_the_title(534); ?></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tab1default" class="tab-pane fade in active">
                                <?php
                                //add_image_size( 'homepage-thumb', 220, 180, true );
                                $args = array(
                                    'post_type' => 'services',
                                    'order' => 'desc',
                                    'showposts' => 5
                                );
                                query_posts($args);
                                // The Loop
                                while (have_posts()) : the_post();
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-2 col-xs-3">
                                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
<a href="<?php echo get_field('other_site'); ?>" target="_blank">                                           
 <img style="width:100px;height:50px" class="img-responsive mr-top10" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"> 
</a>                                                     
                                        </div> 
                                        <div class="col-md-8 col-sm-10 col-xs-9">
                                            <div class="fsiz-wrpper">
                                                <h4 class="font-600 service-list">
<a href="<?php echo get_field('other_site'); ?>" target="_blank">
<?php the_title(); ?>
</a>
</h4>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="service-list-1"><?php the_time(' M j, Y') ?></p>   
                                                </div> 
                                            </div>
                                        </div> 
                                        <hr>
                                    </div>
                                    <hr>

                                    <?php
                                endwhile;
                                // Reset Query
                                wp_reset_query();
                                ?>
                                <!--<a style="float: right;" href="<?php //echo get_page_link(530); ?>">
                                    Read More</a>-->
                            </div>
                            <div id="tab2default" class="tab-pane fade">
                                <?php
                                $args = array(
                                    'post_type' => 'vacancies',
                                    'order' => 'desc',
                                    'showposts' => 5
                                );
                                query_posts($args);
                                // The Loop
                                while (have_posts()) : the_post();
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-2 col-xs-3">
                                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
<a href="<?php echo get_field('other_site'); ?>" target="_blank">
                                            <img style="width:100px;height:50px" class="img-responsive mr-top10" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"> 
</a>
                                        <!--<img src="<?php //echo esc_url(get_template_directory_uri());                                                         ?>/theme/img/player.jpg" alt="" class="img-responsive mr-top10">-->   
                                        </div> 
                                        <div class="col-md-8 col-sm-10 col-xs-9">
                                            <div class="fsiz-wrpper">
                                                <h4 class="font-600 service-list">
<a href="<?php echo get_field('other_site'); ?>" target="_blank">
<?php the_title(); ?>
</a>
</h4>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="service-list-1"><?php the_time(' M j, Y') ?></p>   
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>
                                    <hr>

                                    <?php
                                endwhile;
                                // Reset Query
                                wp_reset_query();
                                ?>
                                <!--<a style="float: right;" href="<?php //echo get_page_link(532); ?>">
                                    Read More</a>-->
                            </div>
                            <div id="tab3default" class="tab-pane fade">
                                <?php
                                $args = array(
                                    'post_type' => 'properties',
                                    'order' => 'desc',
                                    'showposts' => 5
                                );
                                query_posts($args);
                                // The Loop
                                while (have_posts()) : the_post();
                                    ?>
                                    <div class="row">
                                        <div class=" col-md-4 col-sm-2 col-xs-3 ">
                                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
<a href="<?php echo get_field('other_site'); ?>" target="_blank">
                                            <img style="width:100px;height:50px" class="img-responsive mr-top10" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"> 
</a>
                                        <!--<img src="<?php //echo esc_url(get_template_directory_uri());                                                         ?>/theme/img/player.jpg" alt="" class="img-responsive mr-top10">-->   
                                        </div> 
                                        <div class="col-md-8 col-sm-10 col-xs-9">
                                            <div class="fsiz-wrpper">
                                                <h4 class="font-600 service-list">
<a href="<?php echo get_field('other_site'); ?>" target="_blank">
<?php the_title(); ?>
</a>
</h4>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="service-list-1"><?php the_time(' M j, Y') ?></p>   
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>
                                    <hr>

                                    <?php
                                endwhile;
                                // Reset Query
                                wp_reset_query();
                                ?>
                                <!--<a style="float: right;" href="<?php //echo get_page_link(534); ?>">
                                    Read More</a>-->
                            </div>
                        </div>
                    </div>
                </div>    
            </div>    
        </div>    
    </div>   
</div>
<div class="container">
    <div class="botgrapper_wrp mr-top30">  

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <h3 class="brdr-btm"><a href="<?php echo get_page_link(595); ?>"><?php echo get_the_title('595'); ?><i class="red-color glyphicon glyphicon-chevron-right size-18"></i></a></h3>
                <div class="row mt-15">
                    <?php
                      query_posts('cat=84&showposts=9&order=desc');  
                     if (have_posts()): while (have_posts()) :the_post();
                            ?> 
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-10 mt-15">
                                <div>
                                   <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                    <a href="<?php the_permalink(); ?>"><img title="<?php the_title(); ?>" class="img-responsive mr-top10 top_img_set" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"></a>
                                </div>
                                <h4 class="red-color title_height mr-bott-0"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,90); ?></a></h4>
                                <!--<div class="text-justify box_height">-->
                                    <?php //echo substr(strip_tags(get_the_content()), 0, 150); ?>
                                <!--</div>-->
                                 <a class="red-color" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>   
                </div>
                <div class="mr-top30"></div>
                




                <div>
                        <h3 class="brdr-btm"><a href="<?php echo get_page_link(493); ?>"><?php the_field('featured_articles', 18); ?><i class="red-color glyphicon glyphicon-chevron-right size-18"></i></a></h3>
                    <div class="row mt-15">
                    <?php
                        $args = array(
                            'post_type' => 'commentview',
                            'order' => 'desc',
                            'showposts' => 6
                        );
                        query_posts($args);
                        // The Loop
                        $counter = 1;
                        if (have_posts()) :while (have_posts()) :the_post();
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-10 mt-15">
                                <div>
                                    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                    <a href="<?php the_permalink(); ?>"><img title="<?php the_title(); ?>" class="img-responsive top_img_set" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"> </a>
                                </div>
                                <h4 class="title_height clr_blk mr-bott-0"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,90); ?></a></h4>
                                <!--<div class="text-justify box_height">-->
                                    <?php //echo substr(strip_tags(get_the_content()), 0, 150); ?>
                                <!--</div>-->
                                <a class="red-color" href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        <?php
                        endwhile;
                        endif;
                        // Reset Query
                        wp_reset_query();
                        ?>
                </div>
                </div>

                <div class=" mr-top30"></div>

                <div>
                    <h3 class="brdr-btm"><a href="<?php echo get_page_link(490); ?>"><?php the_field('trending_news', 18); ?><i class="red-color glyphicon glyphicon-chevron-right size-18"></i></a></h3>
                    <div class="row mt-15">
                    <?php
                    $args = array(
                        'post_type' => 'latestnews',
                        'order' => 'desc',
                        'showposts' => 6
                    );
                    query_posts($args);
                    if (have_posts()) :while (have_posts()) :the_post();
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-10 mt-15">
                            <div>
                                <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                <a href="<?php the_permalink(); ?>"><img title="<?php the_title(); ?>" class="img-responsive top_img_set" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>"> </a>
                            </div>
                            <h4 class="title_height clr_blk mr-bott-0"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,90); ?></a></h4>
                            <!--<div class="text-justify box_height">-->
                                <?php //echo substr(strip_tags(get_the_content()), 0, 150); ?>
                            <!--</div>-->
                            <a class="red-color" href="<?php the_permalink(); ?>">Read More</a>
                        </div>

                    <?php
                    endwhile;
                    endif;
                    // Reset Query
                    wp_reset_query();
                    ?>
                </div>
                </div>








                <div class="mr-top30"></div>
                <div class="mr-bott20 mr-top20 text-center">
                    <?php $image = get_field('banner_footer', 18); ?>
                    <img class="img-responsive center-block"  src="<?php echo $image['url']; ?>" alt="" />
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h3 class="mr-bott20"><?php the_field('adversitement', 18); ?></h3>   
                <div class="cate-wraper">
                    <?php $image = get_field('advert', 18); ?>
                    <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" /> 
                </div>
                <div class="hrow mr-top10"></div>                
                <div class="cate-wraper">
                        <?php $image = get_field('adversitements', 18); ?>
        <img class="img-responsive img-thumbnail"  src="<?php echo $image['url']; ?>" alt="" />                     
                </div>
                <div class="hrow mr-top10"></div>
                <h3 class="mr-bott20"><?php the_field('latest_video', 18); ?></h3>

                <?php
                $queryObject = new WP_Query('post_type=video&posts_per_page=1');
// The Loop!
                if ($queryObject->have_posts()) {
                    ?>
                    <?php
                    while ($queryObject->have_posts()) {
                        $queryObject->the_post();
                        ?><div class="vid mr-top20">
                            <?php echo get_the_content(); ?>    </div>
                        <?php
                    }
                }
                ?>


                <div class="hrow mr-top10"></div>
                <h3 class="mr-bott20"><?php the_field('photo_gallery', 18); ?></h3>

                <div id="carousel-example-generic" class="carousel slide">                 
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $args = array(
                            'post_type' => 'photogallery',
                            'order' => 'asc',
//                'showposts' => 2
                        );
                        query_posts($args);
                        $first = true;
                        $second = true;
$p_i = 0;
                        while (have_posts()) : the_post();
                            ?>
                            <div class="item <?php
                            if ($first) {
                                echo 'active';
                                $first = false;
                            }
                            ?>">
                                <a href="<?php the_permalink(); ?>?s_id=<?php echo $p_i; ?>" data-slide-to="<?php echo $p_i; ?>">
                                    <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), ''); ?>
                                    <img class="gallery_img_set img-responsive img-thumbnail" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>">  
                                </a>
                                <h4><a href="<?php the_permalink(); ?>#gallery" data-slide-to="<?php echo $p_i; ?>"><?php the_title(); ?></a></h4>
                            </div>  
                            <?php
                        $p_i++;
                        endwhile;
                        wp_reset_query();
                        ?> 
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="hrow mr-top20"></div>
                <h3 class="mr-bott20"><?php the_field('most_popular', 18); ?></h3> 
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading panwrp">
                        <ul class="nav nav-tabs">
                            <li class="active"><a class="font-600" href="#tab1default-a" data-toggle="tab" aria-expanded="true"><?php echo get_the_title(471); ?></a></li>
                            <li class=""><a class="font-600" href="#tab2default-b" data-toggle="tab" aria-expanded="false"><?php echo get_the_title(473); ?></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">

                            <div class="tab-pane fade active in" id="tab1default-a">
                                <ol class="read-list">
                                    <?php
                                    $args = array(
                                        'post_type' => 'read',
                                        'order' => 'asc',
                                        'showposts' => 10
                                    );
                                    query_posts($args);
                                    // The Loop
                                    while (have_posts()) : the_post();
                                        ?>
                                        <li><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></li>
                                        <?php
                                    endwhile;
                                    // Reset Query
                                    wp_reset_query();
                                    ?> 
                                </ol>
                                
                            </div>
                            <div class="tab-pane fade" id="tab2default-b">
                              <ol class="read-list">
                                <?php
                                $args = array(
                                    'post_type' => 'watch',
                                    'order' => 'asc',
                                    'showposts' => 10
                                );
                                query_posts($args);
                                // The Loop
                                while (have_posts()) : the_post();
                                    ?>

                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php
                                endwhile;
                                // Reset Query
                                wp_reset_query();
                                ?>
                                </ol>  
                            </div>

                        </div>
                    </div>
                </div>

            </div> 
        </div>    
    </div>
</div>
<?php get_footer(); ?>
