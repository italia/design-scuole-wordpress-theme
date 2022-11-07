<?php

/**
 * Definisce post type per gli orari dei docenti
 */

add_action( 'init', 'register_orari_docenti_post_type' );
function register_orari_docenti_post_type() {

	/** Orari docenti **/
	$labels = array(
		'name'          => _x( 'Orari Docenti', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Orari Docenti', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Orari Docenti', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 13,
		'menu_icon'     => 'dashicons-clock',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'orari-docenti', $args );

}


// registro un nuovo field

add_action( 'cmb2_init', 'martini_add_orari_docenti_metaboxes' );
function martini_add_orari_docenti_metaboxes() {

    $prefix = '_martini_orario_docenti_';
    
    $cmb_aftercontent = new_cmb2_box( array(
    'id'           => $prefix . 'box_elementi_dati',
    'title'        => __( 'Orario Docenti', 'martino_martini' ),
    'object_types' => array( 'orari-docenti' ),
    'context'      => 'normal',
    'priority'     => 'high',
    ) );

    $cmb_aftercontent->add_field( array(
        'name'             => 'Categoria di file',
        'id'               => $prefix . 'wiki_test_radio', // da modificare e aggiungere il prefix
        'type'             => 'radio',
        'show_option_none' => false,
        'options'          => array(
            'licei' => __( 'Licei', 'cmb2' ),
            'istituto-tecnico'   => __( 'Istituto tecnico', 'cmb2' ),
        ),
    ) );

    $cmb_aftercontent->add_field( array(
        'name'             => 'Categoria di file',
        'id'               => $prefix . 'wiki_test_radio', // da modificare e aggiungere il prefix
        'type'             => 'radio',
        'show_option_none' => false,
        'options'          => array(
            'sicurezza' => __( 'Sicurezza', 'cmb2' ),
            'covid'   => __( 'Covid', 'cmb2' ),
        ),
    ) );

    // box per caricare file del corso informatica sulle scuole

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'file_orari_docenti',
        'name'    => __( 'Carica file', 'martino_martini' ),
        'desc' => __( 'File orario docente' , 'martino_martini' ),
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // 'query_args' => array( 'type' => 'image' ), // Only images attachment
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => __('Aggiungi un nuovo allegato', 'martino_martini' ), // default: "Add or Upload Files"
            'remove_image_text' => __('Rimuovi allegato', 'martino_martini' ), // default: "Remove Image"
            'remove_text' => __('Rimuovi', 'martino_martini' ), // default: "Remove"
        ),
    ) );

}