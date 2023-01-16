<?php 
function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css', array(), '1.0.0' );
    wp_enqueue_style( 'custom-css', get_template_directory_uri().'/assets/css/custom.css', array(), '1.0.1' );
    wp_enqueue_style( 'responsive-css', get_template_directory_uri().'/assets/css/responsive.css', array(), '1.0.1' );
}

add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );

function customjs_enqueue() {
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.js',array('jquery'),'1.0.0',true);
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/assets/js/jquery.js',array(),'1.0.0',true);
    wp_enqueue_script( 'filter', get_stylesheet_directory_uri() . '/assets/js/filter.js',array(),'',true);
    wp_localize_script( 'filter', 'my_ajax_object',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'customjs_enqueue' );

function my_theme_setup(){
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');

add_action( 'widgets_init', 'temple_widgets_init' );
function temple_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'News Sidebar', 'temple' ),
        'id'            => 'news-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Secondary Sidebar', 'temple' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer W1', 'temple' ),
        'id'            => 'footer-1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer W2', 'temple' ),
        'id'            => 'footer-2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer W3', 'temple' ),
        'id'            => 'footer-3',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}

/**
 * Add Menu Locations
 */
if ( ! function_exists( 'temple_register_nav_menu' ) ) {
 
    function temple_register_nav_menu(){ 
        register_nav_menus( array(
            'header_menu' => __( 'Header Menu', 'text_domain' ),
            'header_second_menu' => __( 'Header Second Menu', 'text_domain' ),
            'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
        ) );
    }
    add_action( 'after_setup_theme', 'temple_register_nav_menu', 0 );
}

/**
 * Create multiple custom post type
 */
function custom_post_event() {
    $labels1 = array(
      'name'               => _x( 'Poojas', 'post type general name' ),
      'singular_name'      => _x( 'Pooja', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'release' ),
      'add_new_item'       => __( 'Add New Poojas' ),
      'edit_item'          => __( 'Edit Pooja' ),
      'new_item'           => __( 'New Pooja' ),
      'all_items'          => __( 'All Poojas' ),
      'view_item'          => __( 'View Pooja' ),
      'search_items'       => __( 'Search Poojas' ),
      'not_found'          => __( 'No release found' ),
      'not_found_in_trash' => __( 'No release found in the Trash' ), 
      'parent_item_coleon'  => '',
      'menu_name'          => 'Poojas'
    );
  
     $labels2 = array(
      'name'               => _x( 'Events', 'post type general name' ),
      'singular_name'      => _x( 'Event', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'project' ),
      'add_new_item'       => __( 'Add New Events' ),
      'edit_item'          => __( 'Edit Event' ),
      'new_item'           => __( 'New Event' ),
      'all_items'          => __( 'All Events' ),
      'view_item'          => __( 'View Event' ),
      'search_items'       => __( 'Search Events' ),
      'not_found'          => __( 'No project found' ),
      'not_found_in_trash' => __( 'No events found in the Trash' ), 
      'parent_item_coleon'  => '',
      'menu_name'          => 'Events'
    );
    $args1 = array(
      'labels'        => $labels1,
      'description'   => 'Holds poojas and release specific data',
      'public'        => true,
      'menu_position' => 5,
      'menu_icon'     => 'dashicons-editor-ul',
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
      'has_archive'   => true,
    );
  
    $args2 = array(
      'labels'        => $labels2,
      'description'   => 'Holds events and release specific data',
      'public'        => true,
      'menu_position' => 6,
      'menu_icon'     => 'dashicons-calendar-alt',
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
      'has_archive'   => true,
    );
    register_post_type( 'poojas', $args1 ); 
    register_post_type( 'events', $args2 ); 
  }
  
  add_action( 'init', 'custom_post_event' );
