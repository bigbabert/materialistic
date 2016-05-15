<?php
/**
 * materialistic functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package materialistic
 */

if ( ! function_exists( 'materialistic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function materialistic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on materialistic, use a find and replace
	 * to change 'materialistic' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'materialistic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
        add_image_size( 'slide-at', "100%", 580, true ); // (cropped)
	// This theme uses wp_nav_menu() in one location.
class Material_AT_Nav_Menu extends Walker_Nav_Menu {

  function start_lvl(&$output, $depth = 0, $args = array()) {
      $indent = str_repeat("\t", $depth);
      //$output .= "\n$indent<ul class=\"sub-menu\">\n";

      // Change sub-menu to dropdown menu
      $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }

  function start_el ( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
    // Most of this code is copied from original Walker_Nav_Menu
    global $wp_query, $wpdb;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $current_object_id ) );
    $class_names = ' class="' . esc_attr( $class_names ) . ' dropdown"';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $current_object_id );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

    $has_children = $wpdb->get_var("SELECT COUNT(meta_id)
                            FROM wp_postmeta
                            WHERE meta_key='_menu_item_menu_item_parent'
                            AND meta_value='".$item->ID."'");

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    // Check if menu item is in main menu
    if ( $depth == 0 && $has_children > 0  ) {
        // These lines adds your custom class and attribute
        $attributes .= ' class="dropdown-toggle withripple withripple"';
        $attributes .= ' data-toggle="dropdown"';
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

    // Add the caret if menu level is 0
    if ( $depth == 0 && $has_children > 0  ) {
        $item_output .= ' <b class="caret"></b>';
    }

    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

}
        register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'materialistic' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'materialistic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'materialistic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function materialistic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'materialistic_content_width', 1024 );
}
add_action( 'after_setup_theme', 'materialistic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function materialistic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'materialistic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'materialistic' ),
		'before_widget' => '<div id="%1$s" class="widget col-md-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><i class="icon icon-material-check"></i> ',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'materialistic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialistic_scripts() {
	wp_enqueue_style( 'materialistic-style', get_stylesheet_uri() );

        wp_enqueue_script( 'materialistic-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '20151215', false );
        
        wp_enqueue_script( 'materialistic-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', false );            
        
        wp_enqueue_script( 'materialistic-main', get_template_directory_uri() . '/js/materialistic.js', array(), '20151215', true );
        
	wp_enqueue_script( 'materialistic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

        if (true === get_theme_mod('materialistic_slider_opt')) {
                if(true === get_theme_mod('materialistic_sticky_header')) {
                wp_enqueue_script( 'materialistic-sticky_header', get_template_directory_uri() . '/js/header_sticky.js', array(), '20151215', true );
                } else {
                wp_enqueue_script( 'materialistic-header', get_template_directory_uri() . '/js/header.js', array(), '20151215', true );
                }
            }        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'materialistic_scripts' );
/**
 * Implement Slides Post Type feature.
 */
if ( ! function_exists('slides_post_type') ) {

// Register Custom Post Type
function materialistic_slides_post_type() {
	$labels = array(
		'name' => 'Slides',
		'singular_name' => 'Slide',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Slide',
		'edit_item' => 'Edit Slide',
		'new_item' => 'New Slide',
		'view_item' => 'View Slide',
		'search_items' => 'Search Slides',
		'not_found' =>  'No slides found',
		'not_found_in_trash' => 'No slides found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Slides'
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
                'menu_position' => 2,
		'menu_icon'  => 'dashicons-format-gallery',
                'query_var' => true,
		'rewrite' => array( 'slug' => 'slides', 'with_front' => false ),
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title','editor','thumbnail', 'custom-fields' )
	); 

	register_post_type( 'slide', $args );
}
add_action( 'init', 'materialistic_slides_post_type' );}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Add specific CSS class by filter
add_filter( 'body_class', 'materialistic_class_names' );
function materialistic_class_names( $classes ) {
	// add 'class-name' to the $classes array
	$classes[] = 'material-at';
        if(true === get_theme_mod('materialistic_sticky_header')){
	$classes[] = 'sticky-header';
        }        
	// return the $classes array
	return $classes;
}
