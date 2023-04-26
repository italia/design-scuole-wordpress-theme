<?php

/**
 * Definisce post type per sicurezza
 */

add_action( 'init', 'register_sicurezza_post_type' );
function register_sicurezza_post_type() {

	/** Sicurezza **/
	$labels = array(
		'name'          => _x( 'Sicurezza', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Sicurezza', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Sicurezza', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 19,
		'menu_icon'     => 'dashicons-lock',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'sicurezza', $args );

}


    // registro un nuovo field

add_action( 'cmb2_init', 'martini_add_sicurezza_metaboxes' );
function martini_add_sicurezza_metaboxes() {

    $prefix = '_martini_sicurezza_';
    
    $cmb_aftercontent = new_cmb2_box( array(
    'id'           => $prefix . 'box_elementi_dati',
    'title'        => __( 'Dati Pubblici', 'martino_martini' ),
    'object_types' => array( 'sicurezza' ),
    'context'      => 'normal',
    'priority'     => 'high',
    ) );

    // box per caricare file di sicurezza sulle scuole

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'file_sicurezza',
        'name'    => __( 'Carica file', 'martino_martini' ),
        'desc' => __( 'Archivio file di sicurezza della scuola' , 'martino_martini' ),
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // 'query_args' => array( 'type' => 'image' ), // Only images attachment
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => __('Aggiungi un nuovo allegato', 'martino_martini' ), // default: "Add or Upload Files"
            'remove_image_text' => __('Rimuovi allegato', 'martino_martini' ), // default: "Remove Image"
            'remove_text' => __('Rimuovi', 'martino_martini' ), // default: "Remove"
        ),
        'attributes' => array(
            'data-validation' => 'required',
        ),
    ) );

}