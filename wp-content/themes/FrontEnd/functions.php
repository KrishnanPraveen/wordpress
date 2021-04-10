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


/*=========================== 
 * Custom Post Type Creation
 *=========================== */

 /* Slider For Home Page */
function homePage_slider() {
    // set up Banner Slider labels
    $labels = [
        'menu_name' => 'Slider',
        'name' => 'Sliders',
        'singular_name' => 'Home Page Slider',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit_item' => 'Edit',
        'new_item' => 'New',
        'all_items' => 'All Sliders',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' =>  'No Slider Found',
        'not_found_in_trash' => 'No Slider found in Trash',
        'parent_item_colon' => '',
        
    ];
    // register post type
    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => ['slug' => '/'], /* home_slider */
        'query_var' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'author',
            'excerpt'
        ]
    ];
    register_post_type('home_slider', $args);
}
add_action('init','homePage_slider'); 

?>