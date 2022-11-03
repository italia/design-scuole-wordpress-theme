<?php

/**
 * Definisce post type per pon
 */

add_action( 'init', 'register_pon_post_type' );
function register_pon_post_type() {

	/** pon **/
	$labels = array(
		'name'          => _x( 'PON', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'PON', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'PON', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 19,
		'menu_icon'     => 'dashicons-admin-site-alt',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'pon', $args );

}


// registro un nuovo field

add_action( 'cmb2_init', 'martini_add_pon_metaboxes' );
function martini_add_pon_metaboxes() {

    $prefix = '_martini_pon_';
    
    $cmb_aftercontent = new_cmb2_box( array(
    'id'           => $prefix . 'box_elementi_dati',
    'title'        => __( 'PON', 'martino_martini' ),
    'object_types' => array( 'pon' ),
    'context'      => 'normal',
    'priority'     => 'high',
    ) );

    $cmb_aftercontent->add_field( array(
        'name'             => 'Tipologia di documento',
        'id'               => $prefix . 'wiki_test_radio', // da modificare e aggiungere il prefix
        'type'             => 'radio',
        'show_option_none' => false,
        'options'          => array(
            'apprendimento' => __( 'Apprendimento e socialità', 'cmb2' ),
            'competenze'    => __( 'Competenze di base', 'cmb2' ),
            'laboratori'    => __( 'Laboratori didattici innovativi', 'cmb2' ),
            'pensiero'      => __( 'Pensiero computazionale e didattica digitale', 'cmb2' ),
            'potenziamento' => __( 'Potenziamento della cittadinanza europea', 'cmb2' ),
            'pubblicità'    => __( 'Pubblicità PON', 'cmb2' ),
            'smart'         => __( 'Smart class primo ciclo', 'cmb2' ),
            'smartsec'      => __( 'Smart class secondo ciclo' ),
            'socialità'     => __( 'Socialità, apprendimento, accoglienza', 'cmb2' ),
        ),
    ) );

    // box per caricare file del documento pon sulle scuole

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'file_pon',
        'name'    => __( 'Carica file', 'martino_martini' ),
        'desc' => __( 'Archivio file del documento pon della scuola' , 'martino_martini' ),
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