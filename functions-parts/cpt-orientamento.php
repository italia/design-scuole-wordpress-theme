<?php

/**
 * Definisce post type per orientamento
 */

add_action( 'init', 'register_orientamento_post_type' );
function register_orientamento_post_type() {

	/** orientamento **/
	$labels = array(
		'name'          => _x( 'Orientamento', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Orientamento', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un Post', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un Post', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il Post', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il Post', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'orientamento', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor'),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 26,
		'menu_icon'     => 'dashicons-admin-multisite',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'orientamento', $args );

}