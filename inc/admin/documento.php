<?php
/**
 * Definisce post type e tassonomie relative ai documenti
 */
add_action( 'init', 'dsi_register_documento_post_type', 0 );
function dsi_register_documento_post_type() {

	/** documenti **/
	$labels = array(
		'name'          => _x( 'Documenti', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Documento', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor' ),
		'taxonomies'    => array( 'tipologia' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-portfolio',
		'has_archive'   => true,
	);
	register_post_type( 'documento', $args );

}
