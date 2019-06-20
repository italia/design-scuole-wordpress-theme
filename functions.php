<?php
/**
 * Design Scuole Italia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Design_Scuole_Italia
 */

/**
 * Implement Plugin Activations Rules
 */
//require get_template_directory() . '/inc/theme-dependencies.php';

/**
 * Implement CMB2 Custom Field Manager
 */
require get_template_directory() . '/inc/cmb2.php';

/**
 * Utils functions
 */
require get_template_directory() . '/inc/utils.php';

/**
 * Breadcrumb class
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Actions & Hooks
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Define
 */
require get_template_directory() . '/inc/define.php';



/**
 * Gutenberg editor rules
 */
require get_template_directory() . '/inc/gutenberg.php';


if ( ! function_exists( 'dsi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dsi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Design Scuole Italia, use a find and replace
		 * to change 'design_scuole_italia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'design_scuole_italia', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-scuola' => esc_html__( 'Sottovoci del menu principale, voce "Scuola"', 'design_scuole_italia' ),
			'menu-servizi' => esc_html__( 'Sottovoci del menu principale, voce "Servizi"', 'design_scuole_italia' ),
			'menu-notizie' => esc_html__( 'Sottovoci del menu principale, voce "Notizie"', 'design_scuole_italia' ),
			'menu-didattica' => esc_html__( 'Sottovoci del menu principale, voce "Didattica"', 'design_scuole_italia' ),
			'menu-classe' => esc_html__( 'Sottovoci del menu principale, voce "La mia classe"', 'design_scuole_italia' ),
			'menu-topright' => esc_html__( 'Menu secondario (in alto a destra)', 'design_scuole_italia' ),
			'menu-footer' => esc_html__( 'Menu a piè di pagina', 'design_scuole_italia' ),
		) );


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 *//*
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'custom-logo', array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			) );
		}*/

		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'article-simple-thumb', 500, 384 , true);
			add_image_size( 'item-thumb', 280, 280 , true);
			add_image_size( 'item-gallery', 730, 485 , true);

		}

	}
endif;
add_action( 'after_setup_theme', 'dsi_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dsi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - colonna 1', 'design_scuole_italia' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Prima colonna a più di pagina.', 'design_scuole_italia' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - colonna 2', 'design_scuole_italia' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Seconda colonna a più di pagina.', 'design_scuole_italia' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - colonna 3', 'design_scuole_italia' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Terza colonna a più di pagina.', 'design_scuole_italia' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - colonna 4', 'design_scuole_italia' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Quarta colonna a più di pagina.', 'design_scuole_italia' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'dsi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dsi_scripts() {

	wp_enqueue_style( 'dsi-wp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dsi-font', get_template_directory_uri() . '/assets/css/fonts.css');
	wp_enqueue_style( 'dsi-boostrap-italia', get_template_directory_uri() . '/assets/css/bootstrap-italia.css');
	wp_enqueue_style( 'dsi-scuole', get_template_directory_uri() . '/assets/css/scuole.css');

	wp_enqueue_script( 'dsi-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js');

	// footer
	wp_enqueue_script( 'dsi-boostrap-italia-js', get_template_directory_uri() . '/assets/js/bootstrap-italia.js', array(), false, true);
	if(is_singular("servizio"))
		wp_enqueue_script( 'dsi-leaflet-js', get_template_directory_uri() . '/assets/js/components/leaflet/leaflet.js', array(), false, false);

	wp_enqueue_script( 'dsi-scuole-js', get_template_directory_uri() . '/assets/js/scuole.js', array(), false, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsi_scripts' );

