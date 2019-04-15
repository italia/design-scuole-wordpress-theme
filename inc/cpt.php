<?php
// Register Custom Post Type

function dsi_custom_post_types() {

	/** servizio **/
	$labels = array(
		'name'                  => _x( 'Servizi', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name'         => _x( 'Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'               => _x( 'Aggiungi un Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'               => _x( 'Aggiungi un Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'featured_image' => __( 'Logo Identificativo del Servizio', 'design_scuole_italia' ),
		'set_featured_image' => __( 'Seleziona Logo' ),
		'remove_featured_image' => __( 'Rimuovi Logo' , 'design_scuole_italia' ),
		'use_featured_image' => __( 'Usa come Logo' , 'design_scuole_italia' ),
	);
	$args = array(
		'label'                 => __( 'Servizio', 'design_scuole_italia' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'tipologia' ),
		'hierarchical'          => false,
		'public'                => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id-alt',
		'has_archive'           => true,
	);
	register_post_type( 'servizio', $args );

	/** documenti **/
	$labels = array(
		'name'                  => _x( 'Documenti', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name'         => _x( 'Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'               => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'               => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args = array(
		'label'                 => __( 'Documento', 'design_scuole_italia' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor'),
		'taxonomies'            => array( 'tipologia' ),
		'hierarchical'          => false,
		'public'                => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'has_archive'           => true,
	);
	register_post_type( 'documento', $args );







}
add_action( 'init', 'dsi_custom_post_types', 0 );