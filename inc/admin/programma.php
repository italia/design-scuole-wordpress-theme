<?php
/**
 * Definisce post type e tassonomie relative ai documenti
 */
add_action( 'init', 'dsi_register_programma_post_type', 0 );
function dsi_register_programma_post_type() {

	/** programma **/
	$labels = array(
		'name'          => _x( 'Programmi', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Programma', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi Programma/Materia', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi il Programma di una Materia', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Programma', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor' ),
		'taxonomies'    => array( 'persona' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-editor-spellcheck',
		'has_archive'   => true,
	);
	register_post_type( 'programma', $args );

}
