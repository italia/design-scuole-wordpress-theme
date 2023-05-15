<?php

/**
 * Definisce post type per footer_logos
 */

add_action( 'init', 'register_footer_logos_post_type' );
function register_footer_logos_post_type() {
	

	/** footer_logos **/
	$labels = array(
		'name'          => _x( 'Loghi footer', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Loghi footer', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi nuovo logo nel footer', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi nuovo elemento', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'     => _x( 'Modifica logo', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'     => _x( 'Visualizza logo', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Loghi footer', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'thumbnail', /* 'excerpt', */ 'page-attributes', ),
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-images-alt2',
        'map_meta_cap'  => true,
	);
	
	register_post_type( 'footer_logos', $args );
}

add_action( 'cmb2_init', 'martini_add_footer_logos_metaboxes' );
function martini_add_footer_logos_metaboxes() {

	$prefix = '_martini_footer_logos_';
	
	$cmb = new_cmb2_box( array(
		'id'           	=> $prefix . 'box_elementi_dati',
		'title'        	=> __( 'Opzioni di slider', 'martino_martini' ),
		'object_types' 	=> array( 'footer_logos' ),
		'context'      	=> 'normal',
		'priority'     	=> 'low',
	) );

	$cmb->add_field( array(
		'id'   		   	=> $prefix . 'url',
		'name' 		   	=> __( 'Link', 'martino_martini' ),
		'type' 		   	=> 'text_url',
	) );

	$cmb->add_field( array(
		'id' 			=> $prefix . 'label',
		'name' 			=> __( 'Titolo', 'martino_martini' ),
		'type' 			=> 'text',
		'attributes' 	=> array(
			'maxlength' => '40',
		),
	) );
}