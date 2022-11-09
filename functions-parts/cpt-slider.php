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
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
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