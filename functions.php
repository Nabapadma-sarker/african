<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if (!isset($content_width)) {
    $content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentyfifteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function twentyfifteen_setup()
    {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on twentyfifteen, use a find and replace
         * to change 'twentyfifteen' to the name of your theme in all the template files
         */
        load_theme_textdomain('twentyfifteen', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'twentyfifteen'),
            'social' => __('Social Links Menu', 'twentyfifteen'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        $color_scheme = twentyfifteen_get_color_scheme();
        $default_color = trim($color_scheme[0], '#');

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('twentyfifteen_custom_background_args', array(
            'default-color' => $default_color,
            'default-attachment' => 'fixed',
        )));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url()));
    }

endif; // twentyfifteen_setup
add_action('after_setup_theme', 'twentyfifteen_setup');

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init()
{
    register_sidebar(array(
        'name' => __('Widget Area', 'twentyfifteen'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentyfifteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'twentyfifteen_widgets_init');

if (!function_exists('twentyfifteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Fifteen.
     *
     * @since Twenty Fifteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentyfifteen_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Sans font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Serif font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection()
{
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentyfifteen_javascript_detection', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts()
{
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null);

    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2');

    // Load our main stylesheet.
    wp_enqueue_style('twentyfifteen-style', get_stylesheet_uri());

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array('twentyfifteen-style'), '20141010');
    wp_style_add_data('twentyfifteen-ie', 'conditional', 'lt IE 9');

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style('twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array('twentyfifteen-style'), '20141010');
    wp_style_add_data('twentyfifteen-ie7', 'conditional', 'lt IE 8');

    wp_enqueue_script('twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20141010');
    }

    wp_enqueue_script('twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150330', true);
    wp_localize_script('twentyfifteen-script', 'screenReaderText', array(
        'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'twentyfifteen') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'twentyfifteen') . '</span>',
    ));
}

add_action('wp_enqueue_scripts', 'twentyfifteen_scripts');

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background()
{
    if (!is_single()) {
        return;
    }

    $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);
    $css = '';

    if (is_attachment() && 'attachment' == $previous->post_type) {
        return;
    }

    if ($previous && has_post_thumbnail($previous->ID)) {
        $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url($prevthumb[0]) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ($next && has_post_thumbnail($next->ID)) {
        $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url($nextthumb[0]) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style('twentyfifteen-style', $css);
}

add_action('wp_enqueue_scripts', 'twentyfifteen_post_nav_background');

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $item_output The menu item output.
 * @param WP_Post $item Menu item object.
 * @param int $depth Depth of the menu.
 * @param array $args wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description($item_output, $item, $depth, $args)
{
    if ('primary' == $args->theme_location && $item->description) {
        $item_output = str_replace($args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output);
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4);

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify($html)
{
    return str_replace('class="search-submit"', 'class="search-submit screen-reader-text"', $html);
}

add_filter('get_search_form', 'twentyfifteen_search_form_modify');

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';
add_filter('show_admin_bar', '__return_false');

function my_login_logo_url()
{
    return home_url();
}

add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
    return '';
}

add_filter('login_headertitle', 'my_login_logo_url_title');

function custom_login_logo()
{
    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(18), 'large');
    echo '<style type="text/css">
        h1 a { 
            background-image:url("' . get_template_directory_uri() . '/theme/img/logo.png") !important;
            background-size:100% !important;
            height:72px !important;
            width:auto !important;
            }
    </style>';
}

add_action('login_head', 'custom_login_logo');
/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';

//Post type Photo Gallery Post
add_action('init', 'photogallery_register');

function photogallery_register()
{

    $labels = array(
        'name' => _x('PhotoGallery', 'post type general name'),
        'singular_name' => _x('PhotoGallery Item', 'post type singular name'),
        'add_new' => _x('Add New', 'PhotoGallery item'),
        'add_new_item' => __('Add New PhotoGallery Item'),
        'edit_item' => __('Edit PhotoGallery Item'),
        'new_item' => __('New PhotoGallery Item'),
        'view_item' => __('View PhotoGallery Item'),
        'search_items' => __('Search PhotoGallery'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('photogallery', $args);
}

//Post type Comments & Views 
add_action('init', 'commentview_register');

function commentview_register()
{

    $labels = array(
        'name' => _x('Featured Articles', 'post type general name'),
        'singular_name' => _x('Featured Articles Item', 'post type singular name'),
        'add_new' => _x('Add New', 'CommentView item'),
        'add_new_item' => __('Add New Featured Articles Item'),
        'edit_item' => __('Edit Featured Articles Item'),
        'new_item' => __('New Featured Articles Item'),
        'search_items' => __('Search Featured Articles'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('commentview', $args);
}

//Post type  Latest News
add_action('init', 'latestnews_register');

function latestnews_register()
{

    $labels = array(
        'name' => _x('Trending News', 'post type general name'),
        'singular_name' => _x('Trending NewsItem', 'post type singular name'),
        'add_new' => _x('Add New', 'LatestNews item'),
        'add_new_item' => __('Add New LatestNews Item'),
        'edit_item' => __('Edit Trending News Item'),
        'new_item' => __('New Trending News Item'),
        'search_items' => __('Search Trending News'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('latestnews', $args);
}

//Post type Services
add_action('init', 'services_register');

function services_register()
{

    $labels = array(
        'name' => _x('Services', 'post type general name'),
        'singular_name' => _x('Services Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Services item'),
        'add_new_item' => __('Add New Services Item'),
        'edit_item' => __('Edit Services Item'),
        'new_item' => __('New Services Item'),
        'search_items' => __('Search Services'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('services', $args);
}

//Post type Vacancies
add_action('init', 'vacancies_register');

function vacancies_register()
{

    $labels = array(
        'name' => _x('Vacancies', 'post type general name'),
        'singular_name' => _x('Vacancies Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Vacancies item'),
        'add_new_item' => __('Add New Vacancies Item'),
        'edit_item' => __('Edit Vacancies Item'),
        'new_item' => __('New Vacancies Item'),
        'search_items' => __('Search Vacancies'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('vacancies', $args);
}

//Post type Properties
add_action('init', 'properties_register');

function properties_register()
{

    $labels = array(
        'name' => _x('Properties', 'post type general name'),
        'singular_name' => _x('Properties Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Properties item'),
        'add_new_item' => __('Add New Properties Item'),
        'edit_item' => __('Edit Properties Item'),
        'new_item' => __('New Properties Item'),
        'search_items' => __('Search Properties'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('properties', $args);
}

//breadcrumbs


function qt_custom_breadcrumbs() {

    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1)
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
    } else {

        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0)
                echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
         } elseif (is_single() && !is_attachment()) {
            global $wpdb;
            $c_p_id = get_the_id();
            //  print_r($c_p_id);
            $po = $wpdb->get_results(
                    $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta where post_id=$c_p_id and meta_key = %s", 'link_up_to_page')
            );          
            $po = $po[0]->meta_value;
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                echo '<a href="' . get_page_link($po) . '/'. '/">' . get_the_title($po). '</a>';
                if ($showCurrent == 1)
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                global $wpdb;
                $c_p_id = get_the_id();
                $metas = $wpdb->get_results(
                        $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta where post_id=$c_p_id and meta_key = %s", 'relationship')
                );
                $m = unserialize($metas[0]->meta_value);
                // $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                $cats = "<a href=" . get_page_link($m[0]) . ">$cat->name</a> $delimiter";
                if ($showCurrent == 0)
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
//          echo get_permalink();
                if ($showCurrent == 1)
                    echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1)
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1)
                echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1)
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</div>';
    }
}

// end qt_custom_breadcrumbs()
//Post type video
add_action('init', 'video_register');

function video_register()
{

    $labels = array(
        'name' => _x('Video', 'post type general name'),
        'singular_name' => _x('Video Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Video item'),
        'add_new_item' => __('Add New Video Item'),
        'edit_item' => __('Edit Video Item'),
        'new_item' => __('New Video Item'),
        'search_items' => __('Search Video'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('video', $args);
}

//Post type Events
add_action('init', 'event_register');

function event_register()
{

    $labels = array(
        'name' => _x('Views & Comments', 'post type general name'),
        'singular_name' => _x('Views & Comments Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Event item'),
        'add_new_item' => __('Add New Views & Comments Item'),
        'edit_item' => __('Edit Views & Comments Item'),
        'new_item' => __('New Views & Comments Item'),
        'search_items' => __('Search Views & Comments'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('event', $args);
    register_taxonomy('categories', array('event'), array(
            'hierarchical' => true,
            'label' => 'Categories',
            'singular_label' => 'Category',
            'rewrite' => array('slug' => 'categories', 'with_front' => false)
        )
    );

    register_taxonomy_for_object_type('categories', 'event'); // Better be safe than sorry
}

//remonve dashboard menu 

function remove_menus()
{
    global $menu;
    $restricted = array(__('Tools'));
    end($menu);
    while (prev($menu)) {
        $value = explode(' ', $menu[key($menu)][0]);
        if (in_array($value[0] != NULL ? $value[0] : "", $restricted)) {
            unset($menu[key($menu)]);
        }
    }
}

add_action('admin_menu', 'remove_menus');

//Remove WordPress Version From The Admin Footer
function remove_wordpress_version()
{
    remove_filter('update_footer', 'core_update_footer');
}

add_action('admin_menu', 'remove_wordpress_version');

function remove_footer_admin()
{

    echo 'Thank you for creating with <a href="http://www.softfixer.com" target="_blank">Softfixer</a> ';
}

add_filter('admin_footer_text', 'remove_footer_admin');
//remove about wordpress logo 
add_action('admin_bar_menu', 'remove_wp_logo', 999);

function remove_wp_logo($wp_admin_bar)
{
    $wp_admin_bar->remove_node('wp-logo');
}

//remove new content
function mytheme_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('new-content');
}

add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');


//Post type Movie
add_action('init', 'movies_register');

function movies_register()
{

    $labels = array(
        'name' => _x('Movies', 'post type general name'),
        'singular_name' => _x('Movies Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Movies item'),
        'add_new_item' => __('Add New Movies Item'),
        'edit_item' => __('Edit Movies Item'),
        'new_item' => __('New Movies Item'),
        'search_items' => __('Search Movies'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'comments', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('movies', $args);
    register_taxonomy('categorie', array('movies'), array(
            'hierarchical' => true,
            'label' => 'Categorie',
            'singular_label' => 'Categorie',
            'rewrite' => array('slug' => 'categorie', 'with_front' => false)
        )
    );

    register_taxonomy_for_object_type('categorie', 'movies'); // Better be safe than sorry
}


//walker menu
//For Navigation menu - 
class themeslug_walker_nav_menu extends Walker_Nav_Menu {

// add classes to ul sub-menus
    function start_lvl(&$output, $depth) {
        // depth dependent classes
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
        $display_depth = ($depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'dropdown-menu',
//        ( $display_depth % 2  ? '' : 'menu-even' ),
//        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
//        'menu-depth-' . $display_depth
        );
        $class_names = implode(' ', $classes);

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
//    $output .= "\n" . $indent . '<div class="sp-submenu"><div class="sp-submenu-wrap"><ul class="' . $class_names . '">' . "\n";
    }

// add main/sub classes to li's and links
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // code indent
        // depth dependent classes
        $depth_classes = array(
                //( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                // ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                // ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                //     'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        // passed classes
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));


        // build html
        $output .= $indent . '  <li class=" ' . $depth_class_names . $class_names . '">';

        // link attributes
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .=!empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .=!empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .=!empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        // $attributes .= ' class=" ' . ( $depth > 0 ? '' : '' ) . '"';
        // $attributes .= ' class=" ' . ( $depth > 0 ? '' : 'sider' ) . '"';
        // $attributes .= ' data-toggle="dropdown' . ( $depth > 1 ? '' : '' ) . '"';

        $attributes .= ' class="sider' . ($depth > 0 ? '' : '') . ' ';

        //  $attributes .= ' role="button' . ( $depth > 0 ? '' : '' ) . '"';
        // $attributes .= ' aria-haspopup="true' . ( $depth > 0 ? '' : '' ) . '"';
        // $attributes .= ' aria-expanded="false' . ( $depth > 0 ? '' : '' ) . '"';
        // $attributes .= ' class="false' . ( $depth > 0 ? '' : '' ) . '"';

        if ($args->has_children) {
            //$attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
            $attributes .= ' ' . ($depth > 0 ? '' : '') . ' ';
            //  $attributes .= ' data-toggle="dropdown' . ( $depth > 0 ? '' : '' ) . '"';
        }

        $attributes .= ' " ';

        $item_output = sprintf('%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s', $args->before, $attributes, $args->link_before, apply_filters('the_title', $item->title, $item->ID), $args->link_after, $args->after
        );

        if ($args->has_children) {
         //   $item_output .= '<center><span class="caret"></span></a></center>';
        }
        // build html
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

}


//Post type Music
add_action('init', 'music_register');

function music_register()
{

    $labels = array(
        'name' => _x('music', 'post type general name'),
        'singular_name' => _x('Music Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Music item'),
        'add_new_item' => __('Add New Music Item'),
        'edit_item' => __('Edit Music Item'),
        'new_item' => __('New Music Item'),
        'search_items' => __('Search Music'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'comments', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('music', $args);
    register_taxonomy('categoriess', array('music'), array(
            'hierarchical' => true,
            'label' => 'Categoriess',
            'singular_label' => 'Categoriess',
            'rewrite' => array('slug' => 'categoriess', 'with_front' => false)
        )
    );

    register_taxonomy_for_object_type('categoriess', 'music'); // Better be safe than sorry
}

//
// /** COMMENTS WALKER */
class custom_walker_comment extends Walker_Comment
{

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array('parent' => 'comment_parent', 'id' => 'comment_ID');

    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct()
    {
        ?>
        <ul id="comment-list" style="list-style:none;padding-left: 0">

    <?php
    }

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
function start_lvl(&$output, $depth = 0, $args = array())
{
    $GLOBALS['comment_depth'] = $depth + 1;
    ?>

    <ul class="children" style="list-style:none">
<?php
}

    /** END_LVL
     * Ends the children list of after the elements are added. */
function end_lvl(&$output, $depth = 0, $args = array())
{
    $GLOBALS['comment_depth'] = $depth + 1;
    ?>

    </ul><!-- /.children -->

<?php
}

    /** START_EL */
    function start_el(&$output, $comment, $depth = 0, $args = Array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = (empty($args['has_children']) ? '' : 'parent');
        if ('article' == $args['style']) {
            $tag = 'article';
            $add_below = 'comment';
        } else {
            $tag = 'article';
            $add_below = 'comment';
        }
        ?>

        <li ////<?php comment_class($parent_class); ?> id="comment-<?php comment_ID() ?>">
                    <div id="comment-body-////<?php comment_ID() ?>" class="comment-body well">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                <?php echo($args['avatar_size'] != 0 ? get_avatar($comment, $args['avatar_size']) : ''); ?>
                                <?php //echo get_avatar($comment, 65, '[default gravatar URL]', 'Author�s gravatar');
                                ?>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-8 img-circle">
                                <?php //comment_author_url();
                                ?>
                                <?php //comment_author();
                                ?>

                                <?php echo get_the_author(); ?><br>

                                <time class="comment-meta-item" datetime="////<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>"
                                      itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a>
                                </time>
                                <?php //edit_comment_link('<p class="comment-meta-item">Edit this comment</p>', '', '');
                                ?>

                            </div>
                        </div>
                        <!-- /.comment-author -->

                        <div id="comment-content-////<?php comment_ID(); ?>" class="comment-content">
                            <?php if (!$comment->comment_approved) : ?>
                                <em class="comment-awaiting-moderation">
                                    Your comment is awaiting moderation.
                                </em>
                            <?php
                            else:
                                echo '<br>';
                                comment_text();
                                ?>
                            <?php endif; ?>
                        </div>
                        <!-- /.comment-content -->

                        <div class="reply">
                            <?php
                            $reply_args = array(
                                'add_below' => $add_below,
                                'depth' => $depth,
                                'max_depth' => $args['max_depth']);

                            //comment_reply_link(array_merge($args, $reply_args));
                            ?>
                        </div>
                        <!-- /.reply -->
                    </div><!-- /.comment-body -->

        <?php
    }

    function end_el(&$output, $comment, $depth = 0, $args = array())
    {
        ?>

                </li><!-- /#comment-' . get_comment_ID() . ' -->

        <?php
    }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    function __destruct()
    {
        ?>

        </ul><!-- /#comment-list -->

    <?php
    }

}

//Post type Read
add_action('init', 'read_register');

function read_register()
{

    $labels = array(
        'name' => _x('Read', 'post type general name'),
        'singular_name' => _x('Read Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Read item'),
        'add_new_item' => __('Add New Read Item'),
        'edit_item' => __('Edit Read Item'),
        'new_item' => __('New Read Item'),
        'search_items' => __('Search Read'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'comments', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('read', $args);
    register_taxonomy('readcategorie', array('read'), array(
            'hierarchical' => true,
            'label' => 'ReadCategorie',
            'singular_label' => 'ReadCategorie',
            'rewrite' => array('slug' => 'readcategorie', 'with_front' => false)
        )
    );

    register_taxonomy_for_object_type('readcategorie', 'read'); // Better be safe than sorry
}

//Post type Watched
add_action('init', 'watch_register');

function watch_register()
{

    $labels = array(
        'name' => _x('Watch', 'post type general name'),
        'singular_name' => _x('Watch Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Watch item'),
        'add_new_item' => __('Add New Watch Item'),
        'edit_item' => __('Edit Watch Item'),
        'new_item' => __('New Watch Item'),
        'search_items' => __('Search Watch'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'comments', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('Watch', $args);
    register_taxonomy('readcategorie', array('Watch'), array(
            'hierarchical' => true,
            'label' => 'WatchCategorie',
            'singular_label' => 'WatchCategorie',
            'rewrite' => array('slug' => 'watchcategorie', 'with_front' => false)
        )
    );

    register_taxonomy_for_object_type('watchcategorie', 'Watch'); // Better be safe than sorry
}


add_filter('wpmem_login_form', 'remove_wpmem_txt');
add_filter('wpmem_register_form', 'remove_wpmem_txt');

function remove_wpmem_txt($form)
{
    $old = array('[wpmem_txt]', '[/wpmem_txt]');
    $new = array('', '');
    return str_replace($old, $new, $form);
}


add_filter('wpmem_inc_login_args', 'my_login_args');
function my_login_args($args)
{
    /**
     * This example changes the button text.

     */
    $args = array('heading' => "",
    );

    return $args;
}


add_filter('wpmem_login_form_args', 'my_login_form_args', 10, 2);
function my_login_form_args($args, $action)
{
    /**
     * This example adds a div wrapper around each
     * row in the registration form.
     */
    $args = array(
        'heading_before' => '',
        'heading_after' => ''
    );
    return $args;
}


add_filter('wpmem_register_heading', 'my_heading');
function my_heading($heading)
{
    /**
     * 6
     * The original heading comes in with
     * 7
     * the optional $heading parameter.
     * 8
     * You can filter it or change it.
     * 9
     */
    $heading = '';
    return $heading;

}


add_filter('wpmem_register_form_args', 'my_register_form_args', 10, 2);
function my_register_form_args($args, $toggle)
{
    /**
     * This example adds a div wrapper around each
     * row in the registration form.
     */
    $args = array(
        'heading_before' => '',
        'heading_after' => ''

    );
    return $args;
}


//child pages of parent page
// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );
// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }
    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    
    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
  
}

//Post type Tv And Video
add_action('init', 'tvandvideo_register');

function tvandvideo_register() {

    $labels = array(
        'name' => _x('TVandVideo', 'post type general name'),
        'singular_name' => _x('TVandVideo Item', 'post type singular name'),
        'add_new' => _x('Add New', 'TVandVideo item'),
        'add_new_item' => __('Add New TVandVideo Item'),
        'edit_item' => __('Edit TVandVideo Item'),
        'new_item' => __('New TVandVideo Item'),
        'search_items' => __('Search TVandVideo'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'comments', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('tvandvideo', $args);
    register_taxonomy('tvcategory', array('tvandvideo'), array(
        'hierarchical' => true,
        'label' => 'tvcategory',
        'singular_label' => 'tvcategory',
        'rewrite' => array('slug' => 'tvcategory', 'with_front' => false)
            )
    );

    register_taxonomy_for_object_type('tvcategory', 'tvandvideo'); // Better be safe than sorry
}


 function pietergoosen_comment_form_fields( $args = array(), $post_id = null ) {
    if ( null === $post_id )
        $post_id = get_the_ID();
    else
        $id = $post_id;
 
    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $args = wp_parse_args( $args );
    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = 'html5' === $args['format'];
    $fields   =  array(
         'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'url' =>
    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',
);

    $required_text = sprintf( ' ' . __( 'Required fiels are marked %s', 'pietergoosen' ), '<span class="required">*</span>' );

    $fields = apply_filters( 'comment_form_default_fields', $fields );
    $defaults = array(
        'fields'               => $fields,
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'Comments field name', 'pietergoosen' ) . '</label> <textarea id="comment" name="comment" placeholder="'.__( '' ).'" cols="45" rows="5" aria-required="true"></textarea></p>',
        'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="http://aprecon.com/login-page/">logged in</a> to post a comment.', 'pietergoosen' ),( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'pietergoosen' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
        'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'pietergoosen' ) . ( $req ? $required_text : '' ) . '</p>',
        
        'id_form'              => 'commentform',
        'id_submit'            => 'submit',
        'title_reply'          => __( 'Leave a Comment', 'pietergoosen' ),
        'title_reply_to'       => __( 'Leave a Reply to %s', 'pietergoosen' ),
        'cancel_reply_link'    => __( 'Cancel reply', 'pietergoosen' ),
        'label_submit'         => __( 'Post Comment', 'pietergoosen' ),
        'format'               => 'xhtml',
        );
    return $defaults;
}

add_filter('comment_form_defaults', 'pietergoosen_comment_form_fields');

//function for pagination when permalink change 
add_filter( 'redirect_canonical', 'custom_disable_redirect_canonical' );
function custom_disable_redirect_canonical( $redirect_url ) {
    if ( is_paged() && is_singular() ) $redirect_url = false; 
    return $redirect_url; 
}
//Post type Lest we Forget
add_action('init', 'lestforget_register');
function lestforget_register() {
    $labels = array(
        'name' => _x('Lest we Forget', 'post type general name'),
        'singular_name' => _x('Lest we Forget Item', 'post type singular name'),
        'add_new' => _x('Add New', 'lestforget item'),
        'add_new_item' => __('Add New Lest we Forget Item'),
        'edit_item' => __('Edit Lest we Forget Item'),
        'new_item' => __('New Lest we Forget Item'),
        'search_items' => __('Search Lest we Forget'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,              
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );
    register_post_type('lestforget', $args);
    flush_rewrite_rules();
}

//Post type fallen
add_action('init', 'fallen_register');

function fallen_register() {

    $labels = array(
        'name' => _x('Fallen', 'post type general name'),
        'singular_name' => _x('Fallen Item', 'post type singular name'),
        'add_new' => _x('Add New', 'Fallen item'),
        'add_new_item' => __('Add New Fallen Item'),
        'edit_item' => __('Edit Fallen Item'),
        'new_item' => __('New Fallen Item'),
        'search_items' => __('Search Fallen'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => 'fallen category',
        //'menu_icon' => get_stylesheet_directory_uri() . '/theme/images/yes.png',       
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'comments', 'editor', 'thumbnail','comments', 'post-templates')
    );

    register_post_type('fallen', $args);
    flush_rewrite_rules();
    register_taxonomy('fallen category', array('fallen'), array(
        'hierarchical' => true,
        'label' => 'fallen category',
        'singular_label' => 'fallen category',
        'rewrite' => array('slug' => 'fallen category', 'with_front' => false)
            )
    );

    register_taxonomy_for_object_type('fallen category', 'fallen'); // Better be safe than sorry
}


//menu for current page submenu
class Selective_Walker extends Walker_Nav_Menu
{
    function walk( $elements, $max_depth) {

        $args = array_slice(func_get_args(), 2);
        $output = '';

        if ($max_depth < -1) //invalid parameter
            return $output;

        if (empty($elements)) //nothing to walk
            return $output;

        $id_field = $this->db_fields['id'];
        $parent_field = $this->db_fields['parent'];

        // flat display
        if ( -1 == $max_depth ) {
            $empty_array = array();
            foreach ( $elements as $e )
                $this->display_element( $e, $empty_array, 1, 0, $args, $output );
            return $output;
        }

        /*
         * need to display in hierarchical order
         * separate elements into two buckets: top level and children elements
         * children_elements is two dimensional array, eg.
         * children_elements[10][] contains all sub-elements whose parent is 10.
         */
        $top_level_elements = array();
        $children_elements  = array();
        foreach ( $elements as $e) {
            if ( 0 == $e->$parent_field )
                $top_level_elements[] = $e;
            else
                $children_elements[ $e->$parent_field ][] = $e;
        }

        /*
         * when none of the elements is top level
         * assume the first one must be root of the sub elements
         */
        if ( empty($top_level_elements) ) {

            $first = array_slice( $elements, 0, 1 );
            $root = $first[0];

            $top_level_elements = array();
            $children_elements  = array();
            foreach ( $elements as $e) {
                if ( $root->$parent_field == $e->$parent_field )
                    $top_level_elements[] = $e;
                else
                    $children_elements[ $e->$parent_field ][] = $e;
            }
        }

        $current_element_markers = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' );  //added by continent7
        foreach ( $top_level_elements as $e ){  //changed by continent7
            // descend only on current tree
            $descend_test = array_intersect( $current_element_markers, $e->classes );
            if ( !empty( $descend_test ) ) 
                $this->display_element( $e, $children_elements, 2, 0, $args, $output );
        }

        /*
         * if we are displaying all levels, and remaining children_elements is not empty,
         * then we got orphans, which should be displayed regardless
         */
         /* removed by continent7
        if ( ( $max_depth == 0 ) && count( $children_elements ) > 0 ) {
            $empty_array = array();
            foreach ( $children_elements as $orphans )
                foreach( $orphans as $op )
                    $this->display_element( $op, $empty_array, 1, 0, $args, $output );
         }
        */
         return $output;
    }
}

// remove update notifications for plugins
function filter_plugin_updates( $value ) {
    unset( $value->response['easy-charts/easy-charts.php'] );
    unset( $value->response['wp-polls/wp-polls.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

//Post type Slider Image
add_action('init', 'slider_register');
function slider_register() {
    $labels = array(
        'name' => _x('Slider', 'post type general name'),
        'singular_name' => _x('Slider Item', 'post type singular name'),
        'add_new' => _x('Add New', 'slider item'),
        'add_new_item' => __('Add New Slider Item'),
        'edit_item' => __('Edit Slider Item'),
        'new_item' => __('New Slider Item'),
        'search_items' => __('Search Slider'),
        'not_found' => __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,              
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-post',
        'rewrite' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail','comments', 'post-templates')
    );
    register_post_type('slider', $args);
    flush_rewrite_rules();
}

function my_acf_google_map_api($api)
{

    $api['key'] = 'AIzaSyCPTLYJilQY058Zom5QyeZJQzhEAIbDGwg';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



add_action( 'init', function() {
    global $fbl;
    // facebook social plugin remove on wp admin login page
    remove_action('login_form', array( $fbl->fbl, 'print_button'), 10);
    remove_action('login_form', array( $fbl->fbl, 'add_fb_scripts'), 10);

    remove_action('register_form', array( $fbl->fbl, 'print_button'), 10);
    remove_action('register_form', array( $fbl->fbl, 'add_fb_scripts'), 10);

});


add_filter( 'flp/redirect_url' , 'register_redirect_url');
function register_redirect_url( $url ) {
//if ( isset( $GLOBALS['pagenow'] ) &&  $GLOBALS['pagenow']== 'wp-login.php' && isset( $_GET['action']) && 'register' == $_GET['action']  )
			$url = wp_get_referer();

return $url;
}




?>
