<?php
/**
 * Disable Editor
 **/

/**
 * Templates and Page IDs without editor
 *
 */
/*
function dsi_disable_editor( $id = false ) {


	// escludo Gutenberg per i post type del tema
	$excluded_templates = array(
		'page-templates/la-scuola.php',
	);

	$excluded_ids = array(// get_option( 'page_on_front' )
	);

	if ( empty( $id ) ) {
		return false;
	}

	$id       = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}
*/
/**
 * Disable Gutenberg by template
 *
 */
/*
function dsi_disable_gutenberg( $can_edit, $post_type ) {

	if ( ! ( is_admin() && ! empty( $_GET['post'] ) ) ) {
		return $can_edit;
	}

	if ( dsi_disable_editor( $_GET['post'] ) ) {
		$can_edit = false;
	}

	return $can_edit;

}

add_filter( 'gutenberg_can_edit_post_type', 'dsi_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'dsi_disable_gutenberg', 10, 2 );
*/