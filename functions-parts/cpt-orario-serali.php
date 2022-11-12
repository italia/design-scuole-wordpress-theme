<?php

/**
 * Definisce post type per gli orari delle serali
 */

add_action( 'init', 'register_orario_serali_post_type' );
function register_orario_serali_post_type() {

	/** Orari serali **/
	$labels = array(
		'name'          => _x( 'Orari Serali', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Orario Serali', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Orari Serali', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 16,
		'menu_icon'     => 'dashicons-clock',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'orario-serali', $args );

}


// registro un nuovo field

add_action( 'cmb2_init', 'martini_add_orario_serali_metaboxes' );
function martini_add_orario_serali_metaboxes() {

    $prefix = '_martini_orario_serali_';
    
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

    $cmb_aftercontent->add_field( array(
        'name'             => 'Istituti tecnici',
        'id'               => $prefix . 'wiki_test_radio_istituti', // da modificare e aggiungere il prefix
        'type'             => 'radio',
        'show_option_none' => false,
        'options'          => array(
            'AFM' => __( 'AFM', 'cmb2' ),
            'trasporti-e-logistica'   => __( 'Trasporti e Logistica', 'cmb2' ),
            'economico-sportivo' => __( 'Economico Sportivo', 'cmb2' ),
            'conduzione-mezzo-aereo'   => __( 'Conduzione Mezzo Aereo', 'cmb2' ),
        ),
    ) );

    // box per caricare file del corso informatica sulle scuole

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'file_orario_serali',
        'name'    => __( 'Carica file', 'martino_martini' ),
        'desc' => __( 'File orario serali' , 'martino_martini' ),
        'type' => 'file_list',
        'preview_size' => array( 100, 100 ),
        // 'query_args' => array( 'type' => 'image' ), // Only images attachment
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => __('Aggiungi un nuovo allegato', 'martino_martini' ), // default: "Add or Upload Files"
            'remove_image_text' => __('Rimuovi allegato', 'martino_martini' ), // default: "Remove Image"
            'remove_text' => __('Rimuovi', 'martino_martini' ), // default: "Remove"
        ),
    ) );
}