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
 * header menu walker
 */
require get_template_directory() . '/walkers/header-walker.php';

/**
 * footer menu walker
 */
require get_template_directory() . '/walkers/footer-walker.php';

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
			$thumbnailsizes = dsi_get_img_thumbnails();
			
			foreach ($thumbnailsizes as &$size) {
				add_image_size($size["name"], $size["width"], $size["height"] , $size["crop"]);
			}
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
			'menu-utente' => esc_html__( 'Menu utente', 'design_scuole_italia' ),
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
		'before_widget' => '<div class="footer-list">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="h3">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - colonna 2', 'design_scuole_italia' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Seconda colonna a più di pagina.', 'design_scuole_italia' ),
		'before_widget' => '<div class="footer-list">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="h3">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - colonna 3', 'design_scuole_italia' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Terza colonna a più di pagina.', 'design_scuole_italia' ),
		'before_widget' => '<div class="footer-list">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="h3">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - colonna 4', 'design_scuole_italia' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Quarta colonna a più di pagina.', 'design_scuole_italia' ),
		'before_widget' => '<div class="footer-list">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="h3">',
		'after_title'   => '</h2>',
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
	wp_enqueue_style( 'dsi-overrides', get_template_directory_uri() . '/assets/css/overrides.css');
	wp_enqueue_style( 'dsi-carousel-style', get_template_directory_uri() . '/assets/css/carousel-style-double.css');
	wp_enqueue_style( 'dsi-splide-min', get_template_directory_uri() . '/assets/css/splide.min.css');

	wp_enqueue_script( 'dsi-modernizr', get_template_directory_uri() . '/assets/js/modernizr.custom.js');

	// print css
    	wp_enqueue_style('dsi-print-style', get_template_directory_uri() . '/print.css', array(),'20190912','print' );

	// footer
	wp_enqueue_script( 'dsi-boostrap-italia-js', get_template_directory_uri() . '/assets/js/bootstrap-italia.js', array(), false, true);
	wp_enqueue_script( 'dsi-splide-min', get_template_directory_uri() . '/assets/js/splide.min.js', array(), null, true);


    /*TODO: da definire se minifizzare*/
	wp_enqueue_script( 'dsi-jquery-easing', get_template_directory_uri() . '/assets/js/components/jquery-easing/jquery.easing.js', array('jquery'), false, true);	wp_enqueue_script( 'dsi-jquery-scrollto', get_template_directory_uri() . '/assets/js/components/jquery.scrollto/jquery.scrollTo.js', array(), false, true);
	wp_enqueue_script( 'dsi-jquery-responsive-dom', get_template_directory_uri() . '/assets/js/components/ResponsiveDom/js/jquery.responsive-dom.js', array(), false, true);
	wp_enqueue_script( 'dsi-jpushmenu', get_template_directory_uri() . '/assets/js/components/jPushMenu/jpushmenu.js', array(), false, true);
	wp_enqueue_script( 'dsi-perfect-scrollbar', get_template_directory_uri() . '/assets/js/components/perfect-scrollbar-master/perfect-scrollbar/js/perfect-scrollbar.jquery.js', array(), false, true);
	wp_enqueue_script( 'dsi-vallento', get_template_directory_uri() . '/assets/js/components/vallenato.js-master/vallenato.js', array(), false, true);
	wp_enqueue_script( 'dsi-jquery-responsive-tabs', get_template_directory_uri() . '/assets/js/components/responsive-tabs/js/jquery.responsiveTabs.js', array(), false, true);
	wp_enqueue_script( 'dsi-fitvids', get_template_directory_uri() . '/assets/js/components/fitvids/jquery.fitvids.js', array(), false, true);
	wp_enqueue_script( 'dsi-sticky-kit', get_template_directory_uri() . '/assets/js/components/sticky-kit-master/dist/sticky-kit.js', array(), false, true);
	wp_enqueue_script( 'dsi-jquery-match-height', get_template_directory_uri() . '/assets/js/components/jquery-match-height/dist/jquery.matchHeight.js', array(), false, true);

	if(is_singular(array("servizio", "struttura", "luogo", "evento", "scheda_progetto", "post", "circolare", "indirizzo")) || is_archive() || is_search() || is_post_type_archive("luogo")) {
		wp_enqueue_script( 'dsi-leaflet-js', get_template_directory_uri() . '/assets/js/components/leaflet/leaflet.js', array(), false, true);
    }

	wp_enqueue_script( 'dsi-scuole-js', get_template_directory_uri() . '/assets/js/scuole.js', array(), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsi_scripts' );

function console_log ($output, $msg = "log") {
    echo '<script> console.log("'. $msg .'",'. json_encode($output) .')</script>';
};

/*
 * Set post views count using post meta
 */
function set_views($post_ID) {
	$key = 'views';
	$count = get_post_meta($post_ID, $key, true); //retrieves the count

	if($count == ''){ //check if the post has ever been seen

		//set count to 0
		$count = 0;

		//just in case
		delete_post_meta($post_ID, $key);

		//set number of views to zero
		add_post_meta($post_ID, $key, '0');

	} else{ //increment number of views
		$count++;
		update_post_meta($post_ID, $key, $count);
	}
}

//keeps the count accurate by removing prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
	  $atts['class'] = $args->link_class;
	}
	return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$new_filetypes['svgz'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}

add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Consenti ricerca per argomenti/tags con tutti i content types
 */
function add_tags_to_all_content_types( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if($query->is_tag && $query->is_main_query()){
    $query->set('post_type', array('documento','luogo','struttura','page','servizio','indirizzo','evento','post','circolare','scheda_didattica','scheda_progetto','materia'));
  }
}

add_action( 'pre_get_posts', 'add_tags_to_all_content_types' );

// Sistema temporaneamente i breadcrumb per alcune pagine
function breadcrumb_fix( $string, $arg1 ) {

    $string = str_replace("La Scuola", "Scuola",$string);
		$string = str_replace("Documenti", "Le carte della scuola",$string);
		$string = str_replace("Strutture", "Organizzazione",$string);
		$string = str_replace("?post_type=indirizzo","",$string);
		$string = str_replace("Indirizzo di Studio", "Percorsi di studio",$string);
		$string = str_replace("Luoghi", "I luoghi",$string);
		$string = str_replace("Schede Progetti", "I progetti delle classi",$string);
		$string = str_replace("Schede Didattiche", "Le schede didattiche",$string);
		$string = str_replace("Tutti i Servizi", "Tutti i servizi",$string);		
		$string = str_replace("La Storia", "La storia",$string);

    return $string;
}
add_filter( 'breadcrumb_trail', 'breadcrumb_fix', 10, 3);

// Verifica se l'utente è abilitato a vedere il contenuto della circolare
function circolare_access($post_ID) {

$is_pubblica = dsi_get_meta("is_pubblica");
$destinatari_circolari = "";
$destinatari_circolari =  dsi_get_meta("destinatari_circolari");
$user = wp_get_current_user();
$current_user_roles = (array) $user->roles;
if($destinatari_circolari == "ruolo"){
	$allowed_roles = dsi_get_meta("ruoli_circolari"); 
	
	if ($allowed_roles) {
		$c = array_intersect($allowed_roles,$current_user_roles);
		if (count($c) > 0) {
			$can_view = "true";
		} 
		else {
			$can_view = "false";
		}
	}
	else {
		$can_view = "false";
	}
}
if($destinatari_circolari == "gruppo"){
	$users = array();
	
	$gruppi_circolari = dsi_get_meta("gruppi_circolari");
	
	$users = get_objects_in_term( $gruppi_circolari, "gruppo-utente" );
	if (in_array($user->ID,$users )) {
		$can_view = "true";
	} else {
		$can_view = "false";
	}	
}
if($destinatari_circolari == "all"){
	$can_view = "true";
}
if ( $is_pubblica == "true" || ($is_pubblica == "false" && is_user_logged_in() &&  $can_view == "true") ){
	$accesso_circolare = "true";
	} else {
	$accesso_circolare = "false";
}
return $accesso_circolare;
}


// Add custom checkbox attachment field
function add_custom_protect_from_public_access_to_attachment_fields_to_edit( $form_fields, $post ) {
    $protect_from_public_access = (bool) get_post_meta($post->ID, 'protect_from_public_access', true);
	$ext = dsi_get_option("protect_from_public_access_extensions", "setup");
	
    $form_fields['protect_from_public_access'] = array(
        'label' => 'Proteggi dall\'accesso esterno',
        'input' => 'html',
        'html' => '<input type="checkbox" ' . ($ext == "" ? 'disabled' : '') . ' id="attachments-'.$post->ID.'-protect_from_public_access" name="attachments['.$post->ID.'][protect_from_public_access]" value="1"'.($protect_from_public_access ? ' checked="checked"' : '').' /> ',
        'value' => $protect_from_public_access,
        'helps' => $ext == "" ? '<strong>Non &egrave; possibile proteggere il percorso del file dall\'accesso esterno. </strong> Vai in <a href="admin.php?page=setup">Configurazioni</a> e inserisci una o pi&ugrave; estensioni in base ai documenti riservati presenti nei media. Potrai selezionare l\'opzione e rendere accessibile l\'URL solo da utenti registrati' : 'Se l\'estensione del file &egrave; '. $ext .' (estensioni configurabili in <a href="admin.php?page=setup">Configurazioni</a>) e l\'opzione viene selezionata, il percorso del file sar&agrave; accessibile solo da utenti registrati.'
    );
	return $form_fields;
}
add_filter('attachment_fields_to_edit', 'add_custom_protect_from_public_access_to_attachment_fields_to_edit', null, 2); 

// Save custom checkbox attachment field
function save_protect_from_public_access_attachment_field($post, $attachment) { 
    $db_protect_from_public_access = (bool) get_post_meta($post['ID'], 'protect_from_public_access', true);

    if( isset($attachment['protect_from_public_access']) ){  
        update_post_meta($post['ID'], 'protect_from_public_access', sanitize_text_field( $attachment['protect_from_public_access'] ) );  
    }else{
		delete_post_meta($post['ID'], 'protect_from_public_access' );
    }
    return $post;
}
add_filter('attachment_fields_to_save', 'save_protect_from_public_access_attachment_field', null, 2);

function reserved_file_check(){
	if($_GET && isset($_GET['action']) && $_GET['action'] == "reservedfilecheck"){
		$baseurl = wp_get_upload_dir()['baseurl'];
		$basedir = wp_get_upload_dir()['basedir'];
		$filename = $baseurl . '/' . $_GET['file'];
		$filepath = $basedir . '/' . $_GET['file'];

		$fileid = attachment_url_to_postid( $filename );

		if($fileid != 0) {
			$filedata = get_post($fileid);

			$protect_from_public_access = (bool) get_post_meta($filedata->ID, 'protect_from_public_access', true);

			if($protect_from_public_access && !is_user_logged_in()) 
				die();
		}

		if(file_exists($filepath)) {			
			//Define header information
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header("Cache-Control: no-cache, must-revalidate");
			header("Expires: 0");
			header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
			header('Content-Length: ' . filesize($filepath));
			header('Pragma: public');

			ob_clean();

			//Clear system output buffer
			flush();

			//Read the size of the file
			readfile($filepath);

			//Terminate from the script
			die();
		}
	}
}
add_action( 'init', 'reserved_file_check', 10, 2);

// aggiungi data elements alla pagina note-legali
function insert_data_attribute_note_legali( $content ) {
	if (is_page( 'note-legali')) {
		$search  = array('<h2>Licenza dei contenuti', '<p>In applicazione del principio');
		$replace = array('<h2 data-element="legal-notes-section">Licenza dei contenuti', '<p data-element="legal-notes-body">In applicazione del principio');
	return str_replace($search, $replace, $content);

	}   
	else return $content; 
	}
add_filter('the_content', 'insert_data_attribute_note_legali');

// anonimizza i dati in caso di opzione privacy attiva
function rest_remove_extra_user_data($response, $user, $request) {
	$privacy_hidden = get_user_meta( $response->data['id'], '_dsi_persona_privacy_hidden', true);

	if(!$privacy_hidden || $privacy_hidden == 'true') {
		$response->data['name'] = 'Protected user';

    	unset($response->data['link']);
    	unset($response->data['slug']);
    	unset($response->data['avatar_urls']);
	}

	return $response;
}
add_filter("rest_prepare_user", "rest_remove_extra_user_data", 12, 3);

//redireziona gli utenti alla pagina iniziale dopo il login (se non sono impostati redirect)
function dsi_login_redirect( $redirect_to, $request, $user ) {
	// Senza impostare il redirect a 'wp-admin' (nonostante $redirect_to punti a quella pagina di default),
	// gli utenti sottoscrittori che effetuano il login si ritroverebbero in /wp-admin/profile.php, che può essere disorientante.
	return str_ends_with($redirect_to, '/wp-admin/') ? 'wp-admin' : $redirect_to;
}

add_filter( 'login_redirect', 'dsi_login_redirect', 10, 3 );
