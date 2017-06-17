<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->
        
        
        <?php wp_head(); ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        


        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--<link href='http:fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>-->
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/lightslider-master/src/css/lightslider.css" rel="stylesheet"/>
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/dropdown-bootstrap/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/css/lightslider.css" rel="stylesheet">
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/css/style.css" rel="stylesheet">
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/css/media.css" rel="stylesheet">
        <link href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/layerslider/css/skin.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/layerslider/css/layerslider.css" type="text/css">
        
     <?php if (is_home() || is_front_page()) { ?>
     <style>
         .simplemarquee-wrapper{
             padding-left:1000px;
         }
     </style>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/datatable/datatable.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/js/datatable/datatable_bootstrap.css"/>
    <?php }else{ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/css/datatable.css"/>
    <?php } ?>
    
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/theme/css/bootstrap-select.css"/>
        
         <?php //if (!(is_home()) || !(is_front_page())) { ?> 
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Artifika" />
        <style>
            h1 { font-family: Artifika; font-size: 26px; font-style: normal; font-variant: normal; font-weight: bold; line-height: 28.6px; } h3 { font-family: Artifika; font-size: 15px; font-style: normal; font-variant: normal; font-weight: bold; line-height: 16.5px; } p { font-family: Artifika; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 23.8px; } blockquote { font-family: Artifika; font-size: 24px; font-style: italic; font-variant: normal; font-weight: bold; line-height: 34.2857px; } pre { font-family: Artifika; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 15.6px; }
            li { font-family: Artifika; font-style: normal;} 
            .navbar-inverse .navbar-nav > li > a {
  border-left: 1px solid #ccc;
  <?php if((is_page() !='952') && (! is_singular('fallen'))){ ?>
  color: #000;
  <?php } ?>
  font-size: 13px;
  padding: 10px 5px 0;
}
<?php if(is_page() !='952'){ ?>
.botgrapper_wrp {
  background: #fff none repeat scroll 0 0;
  padding: 0;
}
<?php } ?>
.panel-heading a {
  color: #000;
  padding: 10px !important;
}
.lSSlideOuter .lSPager.lSGallery img {
  display: block;
  height: 60px;
  max-width: 100%;
}
.cate-wraper1 ul li {
  line-height: normal;
  list-style: outside none none;
}

        </style>
        <?php //} ?> 

        <script type="text/javascript">// <![CDATA[
            (function(w, d, s) {
                function go() {
                    var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
                        if (d.getElementById(id)) {
                            return;
                        }
                        js = d.createElement(s);
                        js.src = url;
                        js.id = id;
                        fjs.parentNode.insertBefore(js, fjs);
                    };
                    load('//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4', 'jssdk');

                    load('//platform.twitter.com/widgets.js', 'tweetjs');
                    //   load('//platform.linkedin.com/in.js', 'lnkdjs');

                }
                if (w.addEventListener) {
                    w.addEventListener("load", go, false);
                }
                else if (w.attachEvent) {
                    w.attachEvent("onload", go);
                }
            }(window, document, 'script'));
            // ]]></script>
            
            
           <meta name="google-site-verification" content="GTzq4Rvw_Y_OT8ExAVPWcsajDqtHk-LayfVHY2VsDXw" />
       
       <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97997952-1', 'auto');
  ga('send', 'pageview');

</script>

    <?php if (is_home() || is_front_page()) { ?>
        <style>
            .btn:focus,.btn:hover{
                color:#000;
            }
            .fnt_sz{
                font-size: 20pt;
            }
            .btn-default{
               font-size: 16px;
               height:40px;
            }
        </style>
    <?php } ?>
    <style>
        .cus_img_size{
            width: 40px;
            height: 25px;
        }
        .wh{
            width: 100%;
        }
    </style>
    
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2167679843387134",
    enable_page_level_ads: true
  });
</script>

    </head>

    <body <?php if (is_page('931')) {?>
                        style="background: #000;"
              <?php } elseif (is_page('952')) { ?>
                           style="background: #000;"
              <?php } elseif ( is_singular( 'fallen' ) ) { ?>
                  style="background: #000;"
            <?php  }
              ?> >



      <?php if (is_home() || is_front_page()) { ?> 
         <?php 
            $query = new WP_Query( 
                array(
                    'cat'           => 816,
                    'order'         => 'DESC',
                    'posts_per_page' => '1',
                )
            );
            if ($query->have_posts()) { ?>
            <?php while ($query->have_posts()) { 
                 $query->the_post(); ?>
      <div class="bottom-tab">
      	<div class="container">
        	<div class="row">
            	<div class="col-md-3"><div class="footer-news">BREAKING NEWS</div></div>
                <div class="col-md-7">
                    <p>
                        <a class="white_color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </p>
                </div>
                <div class="col-md-2">
                	<div class="footer-read"><a href="<?php the_permalink(); ?>">READ MORE</a></div>
                </div>
            </div>
        </div>
      </div>
      <?php }  wp_reset_postdata(); ?>
               <?php } ?>
      <?php } ?> 




        <div <?php if (is_page('931')) { ?>
                class="header-1"
            <?php } elseif (is_page('952')) { ?>
                class="header-1"
            <?php } elseif (is_singular('fallen')) { ?>
                class="header-1"
            <?php } else { ?>
                class="header" 
            <?php }
            ?>>
                    
            <div class="container">
                <div class="text-center">
                    <?php
                    if (is_home() || is_front_page()) {
                        ?>
                        <?php $image = get_field('banner_header', 18); if (isset($image) && $image!='') { ?>                       
                        <img class="img-responsive center-block"  src="<?php echo $image['url']; ?>" alt="banner-header" />    
                    <?php } } else {
                    ?> 
                        
                    <?php $image = get_field('advertisement_top'); ?>                                               
                        <img class="img-responsive center-block"  src="<?php echo $image['url']; ?>" alt="" />      
                    <?php }?>      
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5 ">
                        <a href="<?php echo home_url();  ?>">
                            <?php $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(18), ''); ?>
                            <img class="wider1 img-responsive mr-top25 mr-bott20" src="<?php echo $large_image_url[0] ?>" alt="<?php the_title();?>">                            
                        </a>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-7 wider">
                        <div class="row toper">
                            <div class="col-md-12 col-sm-5 col-xs-12 txt_cntr ">
                                <div class="cont_wrp1 mr-top20">
                                    <ul class="pull-right">
                                        <?php
                                        //                                For Wp User
                                        global $user_ID, $user_identity;
                                        wp_get_current_user();
                                        //                                For FB User
                                        include_once("fb1/config.php");
                                        include_once("fb1/includes/functions.php");

                                        //destroy facebook session if user clicks reset
                                        if (!$user_ID) {
                                            ?>
                                              <!--<li><a href="<?php echo get_page_link(507); ?>">Login</a></li>-->
                                        <?php
                                        } elseif ($fbuser) {
                                            $user_profile = $facebook->api('/me?fields=id,first_name,last_name,email');
                                            $user = new Users();
                                            $user_data = $user->checkUser('facebook', $user_profile['id'], $user_profile['first_name'], $user_profile['last_name'], $user_profile['email']);
                                            if (!empty($user_data)) {
                                                ?>
                                                <li><a>Welcome, <?php echo $user_data['display_name']; ?></a></li>
                                                <li><a <?php if (is_page('931')) { ?>
                                                            class="white-color"
                                                        <?php } elseif (is_page('952')) { ?>
                                                            class="white-color"
                                                        <?php } elseif (is_singular('fallen')) { ?>
                                                            class="white-color"
                                                        <?php } else { ?>
                                                            class="cont_wrp1 ul li a"
                                                        <?php }
                                                        ?>  href="http://aprecon.com/fb1/logout.php?logout">Log out</a></li>
    <?php }
} else { // is logged in      
    ?>
                                            <li><a <?php if (is_page('931')) { ?>
                                                            class="white-color"
                                                        <?php } elseif (is_page('952')) { ?>
                                                            class="white-color"
                                                        <?php } elseif (is_singular('fallen')) { ?>
                                                            class="white-color"
                                                        <?php } else { ?>
                                                            class="cont_wrp1 ul li a"
                                                        <?php }
                                                        ?> >Welcome, <?php echo $user_identity; ?></a></li>
                                            <li><a <?php if (is_page('931')) { ?>
                                                            class="white-color"
                                                        <?php } elseif (is_page('952')) { ?>
                                                            class="white-color"
                                                        <?php } elseif (is_singular('fallen')) { ?>
                                                            class="white-color"
                                                        <?php } else { ?>
                                                            class="cont_wrp1 ul li a"
                                                        <?php }
                                                        ?> href="<?php echo wp_logout_url('index.php'); ?>">Log out</a></li>
<?php } ?>

                                        <!--<li><a href="<?php //echo home_url(); ?>">Home</a></li>-->
                                        <li><a <?php if (is_page('931')) { ?>
                                                    class="white-color"
                                                <?php } elseif (is_page('952')) { ?>
                                                    class="white-color"
                                                <?php } elseif (is_singular('fallen')) { ?>
                                                   class="white-color"
                                                <?php } else { ?>
                                                    class="cont_wrp1 ul li a"
                                                <?php }
                                                ?> href="<?php echo get_page_link(79); ?>">Videos</a></li>
                                        <li>
                                            <a <?php if (is_page('931')) { ?>
                                                    class="white-color"
                                                <?php } elseif (is_page('952')) { ?>
                                                    class="white-color"
                                                <?php } elseif (is_singular('fallen')) { ?>
                                                   class="white-color"
                                                <?php } else { ?>
                                                    class="cont_wrp1 ul li a"
                                                <?php }
                                                ?> href="<?php echo get_page_link(59); ?>">About Us</a>
                                        </li>
                                        <li>
                                            <a <?php if (is_page('931')) { ?>
                                                    class="white-color"
                                                <?php } elseif (is_page('952')) { ?>
                                                    class="white-color"
                                                <?php } elseif (is_singular('fallen')) { ?>
                                                   class="white-color"
                                                <?php } else { ?>
                                                    class="cont_wrp1 ul li a"
                                                <?php }
                                                ?> href="<?php echo get_page_link(7064); ?>">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-7 col-xs-12 txt_cntr">
                                <div class="cont_wrp2">
                                    <div class="hidden-xs">
                                        <div class="search">
                                            <form method="get" id ="searchform" action="<?php echo home_url(); ?>">
                                                <input  type="text" name="s" class="form-control input-sm srccol" maxlength="64" placeholder="Search" />
                                                <button type="submit" class="btn1 btn-primary btn-sm"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <ul class="pull-right">
                                        <li class="foll_wrp"><span>Follow Us :-</span></li>
                                        <li><a href="<?php the_field('facebook_page_link', 18); ?> " target="_blank"> <i class="fa fa-facebook-official fa-3x clr_blu"></i></a></li>
                                        <li><a href="<?php the_field('google_plus_link', 18); ?>" target="_blank"> <i class="fa fa-google-plus-square fa-3x clr_org"></i></a></li>
                                        <li><a href="<?php the_field('twitter_page_link', 18); ?>" target="_blank"> <i class="fa  fa-twitter-square  fa-3x clr_sky"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div <?php if (is_page('931')) { ?>
                class="navwrp header-1"
            <?php } elseif (is_page('952')) { ?>
                class="navwrp header-1"
            <?php } elseif (is_singular('fallen')) { ?>
                class="navwrp header-1"
            <?php } else { ?>
               class="navwrp"
            <?php }
            ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav <?php if (is_page('931')) { ?>
                class="navbar navbar-inverse inverse1 menu"
            <?php } elseif (is_page('952')) { ?>
                class="navbar navbar-inverse inverse1 menu"
            <?php } elseif (is_singular('fallen')) { ?>
                class="navbar navbar-inverse inverse1 menu"
            <?php } else { ?>
               class="navbar navbar-inverse inverse menu"
            <?php }
            ?>>
                            <div class="">
                                <div class="navbar-header">
                                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse" id="navbar" aria-expanded="false" style="height: 1px;">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="<?php echo home_url(); ?>"><i class="fa fa-home font25 clr_blk padd15"></i></a></li>
                                        <?php
                                        wp_nav_menu(array(
                                            "menu" => "header_menu ",
                                            //  'theme_location' => 'primary',
                                            //  'container' => 'div',
                                            //  'container_id' => 'top-navigation-primary',
                                            // 'conatiner_class' => 'top-navigation',
                                            // 'menu_class' => 'menu main-menu menu-depth-0 menu-even',
                                            'echo' => true,
                                            'items_wrap' => '%3$s',
                                            //  'depth' => 10,
                                            'container' => FALSE,
                                            'walker' => new themeslug_walker_nav_menu
                                        ));
                                        ?>
                                    </ul>

                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="horiwrp"></div>

