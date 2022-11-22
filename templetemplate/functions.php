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
 * custom post type fot poojas
 */
function create_poojas_posttype() {
  
    register_post_type( 'poojas',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Poojas' ),
                'singular_name' => __( 'Poojas' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'poojas'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_poojas_posttype' );

/*
* Creating a function to create our CPT
*/
  
function custom_post_type_poojas() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Poojas', 'Post Type General Name', 'templetemplate' ),
        'singular_name'       => _x( 'Pooja', 'Post Type Singular Name', 'templetemplate' ),
        'menu_name'           => __( 'Poojas', 'templetemplate' ),
        'parent_item_colon'   => __( 'Parent Pooja', 'templetemplate' ),
        'all_items'           => __( 'All Poojas', 'templetemplate' ),
        'view_item'           => __( 'View Pooja', 'templetemplate' ),
        'add_new_item'        => __( 'Add New Pooja', 'templetemplate' ),
        'add_new'             => __( 'Add New', 'templetemplate' ),
        'edit_item'           => __( 'Edit Pooja', 'templetemplate' ),
        'update_item'         => __( 'Update Pooja', 'templetemplate' ),
        'search_items'        => __( 'Search Pooja', 'templetemplate' ),
        'not_found'           => __( 'Not Found', 'templetemplate' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'templetemplate' ),
    );
      
// Set other options for Custom Post Type    
    $args = array(
        'label'               => __( 'poojas', 'templetemplate' ),
        'description'         => __( 'Pooja news and reviews', 'templetemplate' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields', ),// You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'poojas-type' ),
       
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-editor-justify',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'poojas', $args );
  
}  
add_action( 'init', 'custom_post_type_poojas', 0 );

/**
 * custom post type fot events
 */
function create_events_posttype() {
  
    register_post_type( 'events',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Events' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_events_posttype' );

/*
* Creating a function to create our CPT
*/
  
function custom_post_type_events() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'templetemplate' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'templetemplate' ),
        'menu_name'           => __( 'Events', 'templetemplate' ),
        'parent_item_colon'   => __( 'Parent Events', 'templetemplate' ),
        'all_items'           => __( 'All Events', 'templetemplate' ),
        'view_item'           => __( 'View Event', 'templetemplate' ),
        'add_new_item'        => __( 'Add New Event', 'templetemplate' ),
        'add_new'             => __( 'Add New', 'templetemplate' ),
        'edit_item'           => __( 'Edit Event', 'templetemplate' ),
        'update_item'         => __( 'Update Event', 'templetemplate' ),
        'search_items'        => __( 'Search Event', 'templetemplate' ),
        'not_found'           => __( 'Not Found', 'templetemplate' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'templetemplate' ),
    );
      
// Set other options for Custom Post Type    
    $args = array(
        'label'               => __( 'events', 'templetemplate' ),
        'description'         => __( 'Events news and reviews', 'templetemplate' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields', ),// You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'events-type' ),
       
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'events', $args );
  
}  
add_action( 'init', 'custom_post_type_events', 0 );


// add_shortcode('event_view','listing_events');
add_shortcode('event_view','listing_events');
// add_action('init','listing_events');
function listing_events(){
    echo "hello";
    $events_args = array (
    'post_type' => "events",
    'posts_per_page' => -1,
    'orderby'=> 'date',
    'order' => 'DESC',
    'post_status' => array('publish', 'draft')  
    );
    $events_posts_data = get_posts($events_args);
    $i = 1;
    // print_r($post);
    ?>
        <table class='events-listing'>
            <tr>
                <th>#</th>
                <th>Events</th>
                <th>Days</th>
            </tr>
            <?php 
            foreach($events_posts_data as $post){ ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$post->post_title?></td>
                <td><?=$post->post_modified?></td>
            </tr>
        <?php
        $i++;
    }
    ?>
        </table>
<?php
}

add_shortcode('poojas_view','listing_poojas');
function listing_poojas(){
    
    $poojas_args = array (
    'post_type' => "poojas",
    'posts_per_page' => -1,
    'orderby'=> 'date',
    'order' => 'DESC',
    'post_status' => array('publish', 'draft')  
    );
    $poojas_posts_data = get_posts($poojas_args);

    $i = 1;
    // print_r($post);
    ?>
        <table class='events-listing'>
            <tr>
                <th>#</th>
                <th>Poojas</th>
            </tr>
            <?php 
            foreach($poojas_posts_data as $post){ ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$post->post_title?></td>
            </tr>
        <?php
        $i++;
    } ?>
        </table>
        <?php
}