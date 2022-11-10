<?php

/**
 * Definisce post type per openday
 */

add_action( 'init', 'register_openday_post_type' );
function register_openday_post_type() {

	/** openday **/
	$labels = array(
		'name'          => _x( 'Openday', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Openday', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Openday', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 21,
		'menu_icon'     => 'dashicons-calendar-alt',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'openday', $args );

}

// registro un nuovo field



function martini_add_openday_metaboxes() {

    $prefix = '_martini_openday_';
    
    $cmb_aftercontent = new_cmb2_box( array(
    'id'           => $prefix . 'box_elementi_dati',
    'title'        => __( 'Open day', 'martino_martini' ),
    'object_types' => array( 'openday' ),
    'context'      => 'normal',
    'priority'     => 'high',
    ) );

    $cmb_aftercontent->add_field( array(
        'name'    => 'Orario',
        'desc'    => 'orario Open day',
        'default' => 'a partire dalle ore 16.00',
        'id'      => $prefix . 'wiki_test_text',
        'type'    => 'text',
    ) );

	$cmb_aftercontent->add_field( array(
        'name' => 'Data Open day ',
        'id'   => $prefix . 'wiki_test_textdate_timestamp',
        'type' => 'text_date',
        // 'timezone_meta_key' => 'wiki_test_timezone',
        // 'date_format' => 'l jS \of F Y',
    ) );
}

add_action( 'cmb2_init', 'martini_add_openday_metaboxes' );