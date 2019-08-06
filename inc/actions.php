<?php



/**
 * Hide content editor for post types defined in settings
 */
add_action( 'admin_init', 'dsi_hide_editor' );

function dsi_hide_editor() {
	global $pagenow;
	if ( $pagenow == "post.php" ) {
		// Get the Post ID.
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
		if ( ! isset( $post_id ) ) {
			return;
		}

		// Get the name of the Page Template file.
		$template_file = get_post_meta( $post_id, '_wp_page_template', true );

		if ( $template_file == 'page-templates/la-scuola.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}

		if ( $template_file == 'page-templates/notizie.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}

		if ( $template_file == 'page-templates/servizi.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}

		if ( $template_file == 'page-templates/didattica.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}
	}
}

/**
 * Add css admin style
 */

function dsi_admin_css_load() {
	wp_enqueue_style( 'style-admin-css', get_stylesheet_directory_uri() . '/inc/admin-css/style-admin.css' );
}

add_action( 'admin_enqueue_scripts', 'dsi_admin_css_load' );


/**
 * filter for search
 */
function dsi_search_filters( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search ) {
		$allowed_types = array( "any", "school", "news", "education", "service" );
		if ( isset( $_GET["type"] ) && in_array( $_GET["type"], $allowed_types ) ) {
			$type = $_GET["type"];
			$post_types = dsi_get_post_types_grouped( $type );
			$query->set( 'post_type', $post_types );

		}

		if ( isset( $_GET["post_types"] ) ) {
			$query->set( 'post_type', $_GET["post_types"] );

		}
		if ( isset( $_GET["post_terms"] ) ) {
			$query->set( 'category__in', $_GET["post_terms"]);
		}

			// associazione tra types e post_type

	}
}

add_action( 'pre_get_posts', 'dsi_search_filters' );

/**
 * customize excerpt
 * @param $length
 *
 * @return int
 */
function dsi_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'dsi_excerpt_length', 999 );