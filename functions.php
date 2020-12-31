<?php
/**
 * Design Scuole Italia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Design_Scuole_Italia
 */

/**
 * Define
 */
require get_template_directory() . '/inc/define.php';

/**
 * Vocabolario
 */
require get_template_directory() . '/inc/vocabolario.php';

/**
 * Extend User Taxonomy
 */
require get_template_directory() . '/inc/extend-tax-to-user.php';

/**
 * Implement Plugin Activations Rules
 */
require get_template_directory() . '/inc/theme-dependencies.php';

/**
 * Implement CMB2 Custom Field Manager
 */
if ( ! function_exists ( 'dsi_get_tipologia_articoli_options' ) ) {
	require get_template_directory() . '/inc/cmb2.php';
	require get_template_directory() . '/inc/backend-template.php';
}

/**
 * Utils functions
 */
require get_template_directory() . '/inc/utils.php';

/**
 * Notifications functions
 */
require get_template_directory() . '/inc/notification.php';

/**
 * Breadcrumb class
 */
require get_template_directory() . '/inc/breadcrumb.php';


/**
 * Activation Hooks
 */
require get_template_directory() . '/inc/activation.php';

/**
 * Actions & Hooks
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Gutenberg editor rules
 */
require get_template_directory() . '/inc/gutenberg.php';

/**
 * Welcome page
 */
require get_template_directory() . '/inc/welcome.php';

/**
 * Admin menu
 */
require get_template_directory() . '/inc/menu-order.php';


/**
 * Import
 */
require get_template_directory() . '/inc/import.php';

/**
 * TCPDF
 */
require get_template_directory() . '/inc/dompdf.php';




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


        load_theme_textdomain( 'easy-appointments', get_template_directory() . '/languages' );

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

        // image size
        if ( function_exists( 'add_image_size' ) ) {
            add_image_size( 'article-simple-thumb', 500, 384 , true);
            add_image_size( 'item-thumb', 280, 280 , true);
            add_image_size( 'item-gallery', 730, 485 , true);
            add_image_size( 'vertical-card', 190, 290 , true);

            add_image_size( 'banner', 600, 250 , false);
        }

        // This theme uses wp_nav_menu()
		register_nav_menus( array(
			'menu-scuola' => esc_html__( 'Sottovoci del menu principale, voce "Scuola"', 'design_scuole_italia' ),
			'menu-servizi' => esc_html__( 'Sottovoci del menu principale, voce "Servizi"', 'design_scuole_italia' ),
			'menu-notizie' => esc_html__( 'Sottovoci del menu principale, voce "Novità"', 'design_scuole_italia' ),
			'menu-didattica' => esc_html__( 'Sottovoci del menu principale, voce "Didattica"', 'design_scuole_italia' ),
			/*'menu-classe' => esc_html__( 'Sottovoci del menu principale, voce "La mia classe"', 'design_scuole_italia' ),*/
			'menu-topright' => esc_html__( 'Menu secondario (in alto a destra)', 'design_scuole_italia' ),
			'menu-footer' => esc_html__( 'Menu a piè di pagina', 'design_scuole_italia' ),
		) );

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

    //wp_deregister_script('jquery');

	wp_enqueue_style( 'dsi-wp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dsi-font', get_template_directory_uri() . '/assets/css/fonts.css');
	wp_enqueue_style( 'dsi-boostrap-italia', get_template_directory_uri() . '/assets/css/bootstrap-italia.css');
	wp_enqueue_style( 'dsi-scuole', get_template_directory_uri() . '/assets/css/scuole.css');

	wp_enqueue_script( 'dsi-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js');

	// print css
    wp_enqueue_style('dsi-print-style',get_template_directory_uri() . '/print.css', array(),'20190912','print' );

	// footer
	wp_enqueue_script( 'dsi-boostrap-italia-js', get_template_directory_uri() . '/assets/js/bootstrap-italia.js', array(), false, true);
    /*TODO: da definire se minifizzare*/
	wp_enqueue_script( 'dsi-jquery-easing', get_template_directory_uri() . '/assets/js/components/jquery-easing/jquery.easing.js', array(), false, true);
	wp_enqueue_script( 'dsi-jquery-scrollto', get_template_directory_uri() . '/assets/js/components/jquery.scrollto/jquery.scrollTo.js', array(), false, true);
	wp_enqueue_script( 'dsi-jquery-responsive-dom', get_template_directory_uri() . '/assets/js/components/ResponsiveDom/js/jquery.responsive-dom.js', array(), false, true);
	wp_enqueue_script( 'dsi-jpushmenu', get_template_directory_uri() . '/assets/js/components/jPushMenu/jpushmenu.js', array(), false, true);
	wp_enqueue_script( 'dsi-perfect-scrollbar', get_template_directory_uri() . '/assets/js/components/perfect-scrollbar-master/perfect-scrollbar/js/perfect-scrollbar.jquery.js', array(), false, true);
	wp_enqueue_script( 'dsi-vallento', get_template_directory_uri() . '/assets/js/components/vallenato.js-master/vallenato.js', array(), false, true);
	wp_enqueue_script( 'dsi-jquery-responsive-tabs', get_template_directory_uri() . '/assets/js/components/responsive-tabs/js/jquery.responsiveTabs.js', array(), false, true);
	wp_enqueue_script( 'dsi-fitvids', get_template_directory_uri() . '/assets/js/components/fitvids/jquery.fitvids.js', array(), false, true);
	wp_enqueue_script( 'dsi-sticky-kit', get_template_directory_uri() . '/assets/js/components/sticky-kit-master/dist/sticky-kit.js', array(), false, true);
	wp_enqueue_script( 'dsi-jquery-match-height', get_template_directory_uri() . '/assets/js/components/jquery-match-height/dist/jquery.matchHeight.js', array(), false, true);

	if(is_singular(array("servizio", "struttura", "luogo", "evento", "scheda_progetto", "post", "circolare", "indirizzo")) || is_archive() || is_search() || is_post_type_archive("luogo")) {
		wp_enqueue_script( 'dsi-leaflet-js', get_template_directory_uri() . '/assets/js/components/leaflet/leaflet.js', array(), false, false);
    }
/*
	if(is_singular()){
        wp_enqueue_style( 'basictable-css', get_template_directory_uri() . '/assets/components/basictable/basictable.css');
        wp_enqueue_script( 'basictable-js', get_template_directory_uri() . '/assets/components/basictable/jquery.basictable.js');

    }*/

	wp_enqueue_script( 'dsi-scuole-js', get_template_directory_uri() . '/assets/js/scuole.js', array(), false, true);

	if(is_singular(array("evento","scheda_progetto")) || is_home() || is_archive() ){
		wp_enqueue_script( 'dsi-clndr-json2', get_template_directory_uri() . '/assets/js/components/clndr/json2.js', array(), false, false);
		wp_enqueue_script( 'dsi-clndr-moment', get_template_directory_uri() . '/assets/js/components/clndr/moment-2.8.3.js', array(), false, false);
		wp_enqueue_script( 'dsi-clndr-underscore', get_template_directory_uri() . '/assets/js/components/clndr/underscore.js', array(), false, false);
		wp_enqueue_script( 'dsi-clndr-clndr', get_template_directory_uri() . '/assets/js/components/clndr/clndr.js', array(), false, false);
		wp_enqueue_script( 'dsi-clndr-it', get_template_directory_uri() . '/assets/js/components/clndr/it.js', array(), false, false);
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsi_scripts' );




