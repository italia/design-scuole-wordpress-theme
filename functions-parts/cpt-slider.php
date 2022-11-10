<?php

/**
 * Definisce post type per slider
 */

add_action( 'init', 'register_slider_post_type' );
function register_slider_post_type() {
	

	/** slider **/
	$labels = array(
		'name'          => _x( 'Slider', 'PoSt Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Slider', 'PoSt Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi nuova slide', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi nuovo elemento', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica slide', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza slide', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Slider', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'thumbnail' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-images-alt2',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'slider', $args );

	
}
	add_action( 'cmb2_init', 'martini_add_hero_slider_metaboxes' );
	function martini_add_hero_slider_metaboxes() {
	
		$prefix = '_martini_hero_slider_';
		
		$cmb_aftercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_dati',
		'title'        => __( 'Orario serali', 'martino_martini' ),
		'object_types' => array( 'orario-serali' ),
		'context'      => 'normal',
		'priority'     => 'high',
		) );
	
		$cmb_aftercontent->add_field( array(
			'name'             => 'Licei',
			'id'               => $prefix . 'wiki_test_radio_licei', // da modificare e aggiungere il prefix
			'type'             => 'radio',
			'show_option_none' => false,
			'options'          => array(
				'scientifico-scienze-applicate' => __( 'Scientifico Scienze Applicate', 'cmb2' ),
				'scienze-applicate-in-4anni'   => __( 'Scienze Applicate in 4anni', 'cmb2' ),
				'scientifico-sportivo'   => __( 'Scientifico Sportivo', 'cmb2' ),
				'scienze-umane'   => __( 'Scienze Umane', 'cmb2' ),
			),
		) );
	
	}