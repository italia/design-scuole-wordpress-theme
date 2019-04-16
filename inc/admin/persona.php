<?php
/**
 * Definisce post type e tassonomie relative alle persone
 */
add_action( 'init', 'dsi_register_persona_taxonomy');
function dsi_register_persona_taxonomy() {

	/** persona **/
	$labels = array(
		'name'          => _x( 'Persone', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Persona', 'Post Type Singular Name', 'design_scuole_italia' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'persona' ),
	);

	register_taxonomy( 'persona', array( 'programma', "struttura" ), $args );
}



