<?php

/**
 * Definisce post type per libri
 */

add_action( 'init', 'register_libri_post_type' );
function register_libri_post_type() {

	/** libri **/
	$labels = array(
		'name'          => _x( 'Libro', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Libro', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Libri', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 20,
		'menu_icon'     => 'dashicons-book-alt',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'libri', $args );

}


// registro un nuovo field

add_action( 'cmb2_init', 'martini_add_libri_metaboxes' );
function martini_add_libri_metaboxes() {

    $prefix = '_martini_libri_';
    
    $cmb_aftercontent = new_cmb2_box( array(
    'id'           => $prefix . 'box_elementi_dati',
    'title'        => __( 'Libri', 'martino_martini' ),
    'object_types' => array( 'libri' ),
    'context'      => 'normal',
    'priority'     => 'high',
    ) );

    $cmb_aftercontent->add_field( array(
        'name'             => 'Tipologia di documento',
        'id'               => $prefix . 'wiki_test_radio', // da modificare e aggiungere il prefix
        'type'             => 'radio',
        'show_option_none' => false,
        'options'          => array(
            'biennio' => __( '1°Biennio (a carico delle famiglie)', 'cmb2' ),
            'internazionale'    => __( 'Liceo Scientifico Internazionale delle Scienze Applicate', 'cmb2' ),
            'applicate'    => __( 'Liceo Scientifico Op. Scienze Applicate', 'cmb2' ),
            'sportivo'      => __( 'Liceo Scientifico Op. Sportivo', 'cmb2' ),
            'sociale' => __( 'Liceo Scienze Umane Op. Economico Sociale', 'cmb2' ),
            'diurno'    => __( 'Tecnico Economico Diurno', 'cmb2' ),
            'serale'         => __( 'Tecnico Economico Serale', 'cmb2' ),
            'tecnologico'      => __( 'Tecnico Tecnologico' ),
        ),
    ) );

    // box per caricare file del documento libri sulle scuole

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'file_libri',
        'name'    => __( 'Carica file', 'martino_martini' ),
        'desc' => __( 'Archivio file del documento libri della scuola' , 'martino_martini' ),
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