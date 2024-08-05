<?php
/**
 * Perfect_Gutters functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Perfect_Gutters
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function perfect_gutters_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Perfect_Gutters, use a find and replace
		* to change 'perfect_gutters' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'perfect_gutters', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'perfect_gutters' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'perfect_gutters_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'perfect_gutters_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function perfect_gutters_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'perfect_gutters_content_width', 640 );
}
add_action( 'after_setup_theme', 'perfect_gutters_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function perfect_gutters_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'perfect_gutters' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'perfect_gutters' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'perfect_gutters_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function perfect_gutters_scripts() {
	wp_enqueue_style( 'perfect_gutters-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'perfect_gutters-style', 'rtl', 'replace' );

	wp_enqueue_script( 'perfect_gutters-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'perfect_gutters_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




/**
 * 
 *  <!--====================================================-->
 *	<!--------------+    Pritam Custom Code     +------------->
 *	<!--====================================================-->
 *
 */


/**
* ####################################################
*		Add Extra Option Page For Header & Footer
* ####################################################
*/
	if( function_exists('acf_add_options_page') ) {  

		acf_add_options_page(array(
			'page_title'    => 'Options',
			'menu_title'    => 'Header & Footer',
			'menu_slug'     => 'Options',
			'capability'    => 'edit_posts',
			'redirect'      => false,
			'icon_url'      => 'dashicons-admin-generic',
			'position' => 2
		));
	}


/**
* ####################################################
*		Create Custom Post Type : Service
* ####################################################
*/
	function create_service_post_type() {
		register_post_type( 'service',
			array(
				'labels' => array(
					'name' => 'Service' ,
					'singular_name' => 'Service',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Service',
					'edit_item' => 'Edit Service',
					'new_item' => 'New Service',
					'view_item' => 'View Service',
					'search_items' => 'Search Service',
					'not_found' =>  'Nothing Found',
					'not_found_in_trash' => 'Nothing found in the Trash',
					'parent_item_colon' => ''
				),
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon'  => 'dashicons-awards',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title','editor','thumbnail','page-attributes')
			)
		);
	}
	add_action( 'init', 'create_service_post_type' );

	function my_taxonomies_service() {
		$labels = array(
		'name'              => _x( 'Service Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Service Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Service Categories' ),
		'all_items'         => __( 'All Service Categories' ),
		'parent_item'       => __( 'Parent Service Category' ),
		'parent_item_colon' => __( 'Parent Service Category:' ),
		'edit_item'         => __( 'Edit Service Category' ), 
		'update_item'       => __( 'Update Service Category' ),
		'add_new_item'      => __( 'Add New Service Category' ),
		'new_item_name'     => __( 'New Service Category' ),
		'menu_name'         => __( 'Service Categories' ),
		);
		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true, 
		'query_var' => true,
		);
		register_taxonomy( 'service-category', 'service', $args );
	}
	add_action( 'init', 'my_taxonomies_service', 0 );



/**
* ####################################################
*		Code for Header Menu Active 
* ####################################################
*/
	class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			// Add "active" class to the current menu item
			if ($item->current || $item->current_item_ancestor) {
				$item->classes[] = 'active';
			}

			// Call the parent method to generate the menu item
			parent::start_el($output, $item, $depth, $args);
		}
	}

	/** 
	 *  Add Extra class for mobile menu collaps.
	 */

	function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
		if ( $args->walker->has_children && $depth === 0 ) {
			$item_output = preg_replace('/(<a.*?>[^<]+<\/a>)/', '$1 <span><i class="fas fa-chevron-down"></i></span>', $item_output);
		}
		return $item_output;
	}
	add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);



/**
* ####################################################
*		Create Custom Post Type : Color Palette
* ####################################################
*/
	function create_color_palette_post_type() {
		register_post_type( 'color_palette',
			array(
				'labels' => array(
					'name' => 'Color Palette' ,
					'singular_name' => 'Color Palette',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Color Palette',
					'edit_item' => 'Edit Color Palette',
					'new_item' => 'New Color Palette',
					'view_item' => 'View Color Palette',
					'search_items' => 'Search Color Palette',
					'not_found' =>  'Nothing Found',
					'not_found_in_trash' => 'Nothing found in the Trash',
					'parent_item_colon' => ''
				),
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'menu_icon'  => 'dashicons-color-picker',
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => null,
				'supports' => array('title','editor','thumbnail')
			)
		);
	}
	add_action( 'init', 'create_color_palette_post_type' );

	function my_taxonomies_color_palette() {
		$labels = array(
		'name'              => _x( 'Color Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Color Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Color Categories' ),
		'all_items'         => __( 'All Color Categories' ),
		'parent_item'       => __( 'Parent Color Category' ),
		'parent_item_colon' => __( 'Parent Color Category:' ),
		'edit_item'         => __( 'Edit Color Category' ), 
		'update_item'       => __( 'Update Color Category' ),
		'add_new_item'      => __( 'Add New Color Category' ),
		'new_item_name'     => __( 'New Color Category' ),
		'menu_name'         => __( 'Color Categories' ),
		);
		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true, 
		'query_var' => true,
		);
		register_taxonomy( 'color_palette-category', 'color_palette', $args );
	}
	add_action( 'init', 'my_taxonomies_color_palette', 0 );



/**
* ####################################################
*		Create Custom Post Type : Testomonial
* ####################################################
*/
function create_testimonial_post_type() {
	register_post_type( 'testimonial',
		array(
			'labels' => array(
				'name' => 'Testimonial' ,
				'singular_name' => 'Testimonial',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Testimonial',
				'edit_item' => 'Edit Testimonial',
				'new_item' => 'New Testimonial',
				'view_item' => 'View Testimonial',
				'search_items' => 'Search Testimonial',
				'not_found' =>  'Nothing Found',
				'not_found_in_trash' => 'Nothing found in the Trash',
				'parent_item_colon' => ''
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon'  => 'dashicons-testimonial',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail')
		)
	);
}
add_action( 'init', 'create_testimonial_post_type' );