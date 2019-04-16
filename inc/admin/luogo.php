<?php
/**
 * Definisce post type e tassonomie relative alla struttura organizzativa
 */
add_action( 'init', 'dsi_register_luogo_post_type', 0 );
function dsi_register_luogo_post_type() {

	/** programma **/
	$labels = array(
		'name'          => _x( 'Luoghi', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi un Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi un Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Luogo', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-pressthis',
		'has_archive'   => true,
	);
	register_post_type( 'luogo', $args );

}
