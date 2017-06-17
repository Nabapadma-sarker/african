<?php
/**
 * Template Name: Logged In Page
 */
get_header();
?>
<div class="container">
    <div class="botgrapper_wrp mr-top30 ">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                <div class="mod_wrp">
                    <div class="center-box" align="center">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/logo.png" class="img-responsive">
                    </div>
                    <div class="form_cont">
                        <div id="login-register-password">

                            <?php global $user_ID, $user_identity;
                            get_currentuserinfo();
                            if (!$user_ID) { ?>

                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="login">
                                        <?php $register = $_GET['register'];
                                        $reset = $_GET['reset'];
                                        if ($register == true) { ?>

                                            <h3>Success!</h3>
                                            <p>Check your email for the password and then return to log in.</p>

                                        <?php } elseif ($reset == true) { ?>

                                            <h3>Success!</h3>
                                            <p>Check your email to reset your password.</p>

                                        <?php } else { ?>
                                            <!--                                            <div class="text-center">-->
                                            <!--                                                <h3>Have an account?</h3>-->
                                            <!--                                                <p>Log in or sign up! It's fast & free!</p>-->
                                            <!--                                            </div>-->
                                        <?php } ?>

                                        <div class="col-md-6">
                                            <div class="modal-body1">
                                                <form method="post" action="<?php bloginfo('url') ?>/soft_apre" class="wp-user-form">
                                                    <div class="username">
                                                        <input class="form-control" type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20"
                                                               id="user_login" tabindex="11" placeholder="Enter Your UserName"/>
                                                    </div>
                                                    <br>

                                                    <div class="password">
                                                        <input class="form-control" type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12"
                                                               placeholder="Enter Your Password"/>
                                                    </div>
                                                    <div>
                                                        <div class="col-lg-6 col-sm-6 col-xs-6 rememberme">
                                                            <label for="rememberme" style=" font-size: 10px !important;">
                                                                <input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13"/>
                                                                Remember Me
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6 col-xs-6 ">
                                                            <a href="#forgot" data-toggle="tab" style="margin-top: 5px;font-size:11px;" class="pull-right"> Forgot Password ?</a>
                                                        </div>
                                                    </div>
                                                    <p class="clearfix"></p>

                                                    <div class="login_fields">
                                                        <?php do_action('login_form'); ?>
                                                        <input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14"
                                                               style="margin-top:10px; width:100%; padding:10px; font-size:16px;" class="login_btn user-submit"/>
                                                        <input type="hidden" name="redirect_to" value="<?php echo wp_get_referer(); ?>"/>
                                                        <input type="hidden" name="user-cookie" value="1"/>
                                                    </div>
                                                    <br>

                                                    <div>
                                                        <a href="#register" data-toggle="tab" style="color: #000;" class="btn btn-default wh">
                                                            New to Aprecon? <b style="color: #bb0000">Sign up</b>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="margin-top:17px">
                                            <div align="center">
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/log1.png" alt="">
                                                <span style="color:#333; font-size:17px;text-align: center;">OR</span>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/theme/img/log1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="margin-top:10%">
                                            <div class="">
                                                <?php echo do_shortcode('[fbl_login_button redirect="" hide_if_logged="" login_form="true"]') ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="register">
                                        <div class="text-center">
                                            <h3>Register for this site!</h3>
                                        </div>
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
                                                <div class="username">
                                                    <label for="user_login"><?php _e('UserName'); ?>: </label>
                                                    <input placeholder="Enter Your UserName" class="form-control" type="text" name="user_login"
                                                           value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101"/>
                                                </div>
                                                <div class="password">
                                                    <label for="user_email"><?php _e('Your Email'); ?>: </label>
                                                    <input placeholder="Enter Your Email ID" class="form-control" type="text" name="user_email"
                                                           value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102"/>
                                                </div>
                                                <div class="login_fields">
                                                    <?php do_action('register_form'); ?>
                                                    <input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit login_btn"
                                                           style="margin-top:10px; width:100%; padding:10px; font-size:16px;" tabindex="103"/>
                                                    <?php $register = $_GET['register'];
                                                    if ($register == true) {
                                                        echo '<p>Check your email for the password!</p>';
                                                    } ?>
                                                    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true"/>
                                                    <input type="hidden" name="user-cookie" value="1"/>
                                                </div>
                                                <br>

                                                <div>
                                                    <a href="#login" data-toggle="tab" style="color: #000;" class="btn btn-default wh"> Existing User? Log in</a>
                                                </div>
                                            </form>
                                            <br>

                                            <p class="clearfix"></p>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="forgot">
                                        <div class="text-center">
                                            <h3>Lose something?</h3>

                                            <p>Enter your username or email to reset your password.</p>
                                        </div>
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
                                                <div class="username">
                                                    <label for="user_login" class="hide"><?php _e('UserName or Email'); ?>: </label>
                                                    <input placeholder="Enter your username or email to reset your password." class="form-control" type="text" name="user_login"
                                                           value="" size="20" id="user_login" tabindex="1001"/>
                                                </div>
                                                <div class="login_fields">
                                                    <?php do_action('login_form', 'resetpass'); ?>
                                                    <input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit login_btn"
                                                           style="margin-top:10px; width:100%; padding:10px; font-size:16px;" tabindex="1002"/>
                                                    <?php $reset = $_GET['reset'];
                                                    if ($reset == true) {
                                                        echo '<p>A message will be sent to your email address.</p>';
                                                    } ?>
                                                    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true"/>
                                                    <input type="hidden" name="user-cookie" value="1"/>
                                                </div>
                                                <br>

                                                <div>
                                                    <a href="#login" data-toggle="tab" style="color: #000;" class="btn btn-default wh"> Back to Log-in</a>
                                                </div>
                                            </form>
                                            <br>

                                            <p class="clearfix"></p>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { // is logged in ?>

                                <div class="col-md-8 col-md-offset-2 text-center">
                                    <h3>Welcome, <?php echo $user_identity; ?></h3>

                                    <div class="usericon">
                                        <?php global $userdata;
                                        get_currentuserinfo();
                                        echo get_avatar($userdata->ID, 60); ?>

                                    </div>
                                    <div class="userinfo">
                                        <p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>

                                        <p>
                                            <a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a> |
                                            <?php if (current_user_can('manage_options')) {
                                                echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>';
                                            } else {
                                                echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>';
                                            } ?>

                                        </p>
                                    </div>
                                    <br>

                                    <p class="clearfix"></p>
                                </div>

                            <?php } ?>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

