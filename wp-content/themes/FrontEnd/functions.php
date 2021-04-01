<?php 
/*=========================== 
 * Wordpress Theme Functions 
 * & Definitions 
 *=========================== */

function theme_setup(){

    /* Title Tag --> <title></title>*/
    add_theme_support('title-tag');

    /* Navigation Menus -> We initalize the Menu Field in Admin Panel*/ 
    register_nav_menus(array(
        'menu' => _('Menu')
    ));

    /* Post Thumbnails -> Enabling Featured Images*/
    add_theme_support('post-thumbnails');

    /* Post Formats */
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    /* Custom Logo */
    add_theme_support('custom-logo', array(
        'width' => 200,
        'height' => 150,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description')
    ));
    
}
/* Calls the theme_setup() function */
add_action('after_setup_theme','theme_setup');

/* Remove the Admin Bar in HomePage */
show_admin_bar( false );

/* Remove WP version */
remove_action('wp_head', 'wp_generator');

/* Remove RSD xml */
remove_action('wp_head', 'rsd_link');

/* Remove windows live */
remove_action('wp_head', 'wlwmanifest_link');

/* Remove dns prefetch */
remove_action('wp_head', 'wp_resource_hints', 2);

/* Remove Emoji scripts */
remove_action('wp_head', 'print_emoji_detection_script', 7); 

/* Remove Emoji style */
remove_action('wp_print_styles', 'print_emoji_styles');

/* Remove Embeded js */
remove_action('wp_head', 'wp_oembed_add_host_js');

/* Remove json */
remove_action('wp_head', 'rest_output_link_wp_head');

/* Remove block css */
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action('wp_print_styles', 'wps_deregister_styles', 100);

/* Remove Srcset in  images */
add_filter('wp_calculate_image_srcset_meta', '__return_null');

?>