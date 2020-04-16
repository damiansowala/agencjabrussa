<?php

add_action('phpmailer_init', 'send_smtp_email');
function send_smtp_email($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = SMTP_AUTH;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->Username = SMTP_USERNAME;
    $phpmailer->Password = SMTP_PASSWORD;
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = SMTP_FROMNAME;
}

/* ========================================================================================================================
Scripts
======================================================================================================================== */
function script_init()
{
    wp_register_script('bs-bundle', get_template_directory_uri() . '/js/bootstrap/bootstrap.bundle.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('bs-bundle');

    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('bootstrap-js');

    wp_register_script('rellax', get_template_directory_uri() . '/js/rellax.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('rellax');

    wp_register_script('fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('fancybox-js');

    wp_register_script('carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('carousel-js');

    wp_register_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('lightbox-js');

    wp_register_script('aos-js', get_template_directory_uri() . '/js/aos.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('aos-js');

    wp_register_script('slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('slick-js');

    wp_register_script('simpleParallax-js', get_template_directory_uri() . '/js/simpleParallax.min.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('simpleParallax-js');

    wp_register_script('unveil-js', get_template_directory_uri() . '/js/unveil.js', array('jquery'), '4.3.1', true);
    wp_enqueue_script('unveil-js');

    wp_register_script('site', get_template_directory_uri() . '/blocks/dist/blocks.build.js', array('jquery'), '0.0.1', true);
    wp_enqueue_script('site');

    wp_register_style('bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap/bootstrap.min.css', '', array(), 'screen');
    wp_enqueue_style('bootstrap-css');

    wp_register_style('owl-carousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', '', array(), 'screen');
    wp_enqueue_style('owl-carousel');

    wp_register_style('fontawesome', get_stylesheet_directory_uri() . '/css/fontawesome/all.css', '', array(), 'screen');
    wp_enqueue_style('fontawesome');

    wp_register_style('lightbox', get_stylesheet_directory_uri() . '/css/lightbox.min.css', '', array(), 'screen');
    wp_enqueue_style('lightbox');

    wp_register_style('aos', get_stylesheet_directory_uri() . '/css/aos.css', '', array(), 'screen');
    wp_enqueue_style('aos');

    wp_register_style('animate', get_stylesheet_directory_uri() . '/css/animate.min.css', '', array(), 'screen');
    wp_enqueue_style('animate');

    wp_register_style('fancybox-css', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css', '', array(), 'screen');
    wp_enqueue_style('fancybox-css');

    wp_register_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css', '', array(), 'screen');
    wp_enqueue_style('slick-css');

    wp_register_style('slicktheme-css', get_stylesheet_directory_uri() . '/css/slick-theme.css', '', array(), 'screen');
    wp_enqueue_style('slicktheme-css');

    wp_register_style('screen', get_stylesheet_directory_uri() . '/style.css', '', array(), 'screen');
    wp_enqueue_style('screen');
}
/* ========================================================================================================================
Required external files
======================================================================================================================== */

require "function/theme-display-logo.php";
require "function/theme-login-modyfication.php";
require "function/theme-comments.php";
require "function/theme-archive-title-modyfication.php";
require "function/theme-custome-post-type.php";
require "function/theme-acf.php";
require "function/theme-events-query.php";
require "function/wp-security.php";
require "function/wp-send-mail.php";
require "function/wp-change-menu-admin.php";
require "function/class-theme-nav.php";
require "function/class-worpdress-function.php";

/* ========================================================================================================================
Add html 5 support to wordpress elements
======================================================================================================================== */
add_theme_support('html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery',
    'caption',
));
/* ========================================================================================================================
Theme specific settings
======================================================================================================================== */
add_action('after_setup_theme', 'themename_custom_logo_setup');
add_theme_support('post-thumbnails');
add_image_size('thumbnail-large', 400, 400, true);
add_image_size('thumbnail-big', 800, 800, true);
add_image_size('slider', 800, 480, array('center', 'top'));
add_image_size('carousel', 1200, 480, array('center', 'top'));
add_image_size('cover-category', 1000, 820, array('center', 'top'));
add_image_size('cover', 320, 240, true);
register_nav_menus(array('top_menu' => 'Top Menu'));
register_nav_menus(array('footer' => 'Footer Menu'));
register_nav_menus(array('lang' => 'Language Menu'));
register_nav_menus(array('footer' => 'Footer Menu'));
/* ========================================================================================================================
Actions and Filters
======================================================================================================================== */
add_action('wp_enqueue_scripts', 'script_init');
add_filter('body_class', array('wpFn', 'add_slug_to_body_class'));
add_filter('get_the_archive_title', 'isy_get_the_archive_title');
/* ========================================================================================================================
Security & cleanup wp admin
======================================================================================================================== */
add_filter('the_generator', 'theme_remove_version');
add_filter('admin_footer_text', 'remove_footer_admin');
add_action('wp_before_admin_bar_render', 'wp_logo_admin_bar_remove', 0);
add_action('admin_menu', 'disable_default_dashboard_widgets');
remove_action('welcome_panel', 'wp_welcome_panel');
/* ========================================================================================================================
Custom login modyfication
======================================================================================================================== */
add_action('login_head', 'my_custom_login');
add_filter('login_headerurl', 'my_login_logo_url');
add_filter('login_headertitle', 'my_login_logo_url_title');

function the_newsletter()
{
    $form_widget = new \MailPoet\Form\Widget();
    echo $form_widget->widget(array('form' => 2, 'form_type' => 'php'));
}

function custom_columns($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'featured_image' => 'Image',
        'title' => 'Title',
        'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
        'date' => 'Date',
    );
    return $columns;
}
add_filter('manage_posts_columns', 'custom_columns');

function custom_columns_data($column, $post_id)
{
    switch ($column) {
        case 'featured_image':
            the_post_thumbnail('thumbnail');
            break;
    }
}
add_action('manage_posts_custom_column', 'custom_columns_data', 10, 2);

/* ========================================================================================================================
Form message send
======================================================================================================================== */

add_action('wp_ajax_sendmail_contact', 'sendmail_contact');
add_action('wp_ajax_nopriv_sendmail_contact', 'sendmail_contact');

add_action('wp_ajax_sendmail_info', 'sendmail_info');
add_action('wp_ajax_nopriv_sendmail_info', 'sendmail_info');

add_action('wp_ajax_ordered_discs', 'ordered_discs');
add_action('wp_ajax_nopriv_ordered_discs', 'ordered_discs');

add_action('wp_ajax_ordered_discs_two', 'ordered_discs_two');
add_action('wp_ajax_nopriv_ordered_discs_two', 'ordered_discs_two');

add_action('wp_ajax_order_artist', 'order_artist');
add_action('wp_ajax_nopriv_order_artist', 'order_artist');

add_action('wp_ajax_date_artist', 'date_artist');
add_action('wp_ajax_nopriv_date_artist', 'date_artist');

add_action('wp_ajax_contact_artist', 'contact_artist');
add_action('wp_ajax_nopriv_contact_artist', 'contact_artist');

add_action('wp_ajax_work', 'work');
add_action('wp_ajax_nopriv_work', 'work');

add_action('wp_ajax_cooperation', 'cooperation');
add_action('wp_ajax_nopriv_cooperation', 'cooperation');

add_action('wp_ajax_order_our', 'order_our');
add_action('wp_ajax_nopriv_order_our', 'order_our');

add_action('wp_ajax_contact_our', 'contact_our');
add_action('wp_ajax_nopriv_contact_our', 'contact_our');

add_action('wp_ajax_contact_stage', 'contact_stage');
add_action('wp_ajax_nopriv_contact_stage', 'contact_stage');