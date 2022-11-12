<?php

/**
 * Definisce post type per hero_slider
 */

add_action( 'init', 'register_hero_slider_post_type' );
function register_hero_slider_post_type() {
	

	/** hero_slider **/
	$labels = array(
		'name'          => _x( 'Slider', 'PoSt Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Slider', 'PoSt Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi nuova slide', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi nuovo elemento', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'     => _x( 'Modifica slide', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'     => _x( 'Visualizza slide', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Slider', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'thumbnail', 'excerpt', 'page-attributes', ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-images-alt2',
		'has_archive'   => true,
        'map_meta_cap'  => true,
	);
	
	register_post_type( 'hero_slider', $args );
}

add_action( 'cmb2_init', 'martini_add_hero_slider_metaboxes' );
function martini_add_hero_slider_metaboxes() {

	$prefix = '_martini_hero_slider_';
	
	$cmb = new_cmb2_box( array(
		'id'           	=> $prefix . 'box_elementi_dati',
		'title'        	=> __( 'Opzioni di slider', 'martino_martini' ),
		'object_types' 	=> array( 'hero_slider' ),
		'context'      	=> 'normal',
		'priority'     	=> 'low',
	) );

	$cmb->add_field( array(
		'id'   		   	=> $prefix . 'url',
		'name' 		   	=> __( 'Website URL', 'martino_martini' ),
		'type' 		   	=> 'text_url',
	) );

	$cmb->add_field( array(
		'id' 			=> $prefix . 'cta_label',
		'name' 			=> __( 'CTA label', 'martino_martini' ),
		'type' 			=> 'text',
		'default' 		=> 'Scopri',
		'attributes' 	=> array(
			'maxlength' => '40',
		),
	) );
}