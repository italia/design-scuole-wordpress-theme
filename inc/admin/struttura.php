<?php
/**
 * Definisce post type e tassonomie relative alla struttura organizzativa
 */
add_action( 'init', 'dsi_register_struttura_post_type', 0 );
function dsi_register_struttura_post_type() {

	/** programma **/
	$labels = array(
		'name'          => _x( 'Strutture', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Struttura', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi Struttura Organizzativa', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi la Struttura Organizzativa', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Struttura Organizzativa', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor' ),
		'taxonomies'    => array( 'persona' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-networking',
		'has_archive'   => true,
	);
	register_post_type( 'struttura', $args );

}
