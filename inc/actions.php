<?php


/**
 * Action to add page templates used by theme
 */
add_action( 'after_switch_theme', 'dsi_create_pages_on_theme_activation' );

function dsi_create_pages_on_theme_activation(){

	// template page per la carta di identità
	$new_page_title     = __('Carta di identità','design_scuole_italia'); // Page's title
	$new_page_content   = '';                           // Content goes here
	$new_page_template  = 'page-templates/carta-identita.php';       // The template to use for the page
	$page_check = get_page_by_title($new_page_title);   // Check if the page already exists
	// Store the above data in an array
	$new_page = array(
		'post_type'     => 'page',
		'post_title'    => $new_page_title,
		'post_content'  => $new_page_content,
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_slug'     => 'carta-identita'
	);
	// If the page doesn't already exist, create it
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}


	// template page per La Struttura Organizzativa
	$new_page_title     = __('La Struttura Organizzativa','design_scuole_italia'); // Page's title
	$new_page_content   = '';                           // Content goes here
	$new_page_template  = 'page-templates/struttura-organizzativa.php';       // The template to use for the page
	$page_check = get_page_by_title($new_page_title);   // Check if the page already exists
	// Store the above data in an array
	$new_page = array(
		'post_type'     => 'page',
		'post_title'    => $new_page_title,
		'post_content'  => $new_page_content,
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_slug'     => 'struttura-organizzativa'
	);
	// If the page doesn't already exist, create it
	if(!isset($page_check->ID)){
		$new_page_id = wp_insert_post($new_page);
		if(!empty($new_page_template)){
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}

	//  popolo le tipologie di struttura
	wp_insert_term('Scuola', 'tipologia-struttura');
	wp_insert_term('Segreteria', 'tipologia-struttura');
	wp_insert_term('Presidenza', 'tipologia-struttura');
	wp_insert_term('Commissione', 'tipologia-struttura');
	wp_insert_term('Organi Consiliari', 'tipologia-struttura');
}


/**
 * Hide content editor for post types defined in settings
 */
add_action( 'admin_init', 'dsi_hide_editor' );

function dsi_hide_editor() {
	global $pagenow;
	if($pagenow == "post.php"){
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id )  ) return;

	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);

	if($template_file == 'page-templates/carta-identita.php'){ // edit the template name
		remove_post_type_support('page', 'editor');
	}

	if($template_file == 'page-templates/struttura-organizzativa.php'){ // edit the template name
		remove_post_type_support('page', 'editor');
	}
	}
}

/**
 * Add css admin style
 */

function dsi_admin_css_load() {
	wp_enqueue_style('style-admin-css', get_stylesheet_directory_uri().'/inc/admin-css/style-admin.css');
}
add_action('admin_enqueue_scripts', 'dsi_admin_css_load');




/**
 * filter for search
 */
function dsi_search_filters( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search) {
			$allowed_types = array("any", "school","news","education","service", "class");
			if(isset($_GET["type"]) && in_array($_GET["type"], $allowed_types))
				$type = $_GET["type"];
			else
				$type = "any";

			// associazione tra types e post_type
			if($type === "school")
				$post_types = array("documento", "luogo", "materia", "struttura", "page");
			else if($type === "news")
				$post_types = array("evento", "post");
			else if($type === "education")
				$post_types = array("programma", "scheda_didattica", "scheda_progetto");
			else if($type === "service")
				$post_types = array("servizio");
			else if($type === "class")
				$post_types = array("luogo", "materia", "programma", "scheda_didattica", "scheda_progetto");
			else
				$post_types = array("evento", "post", "documento", "luogo", "materia", "programma", "scheda_didattica", "scheda_progetto", "servizio", "struttura", "page");



			$query->set('post_type', $post_types);

	}
}
add_action( 'pre_get_posts', 'dsi_search_filters' );