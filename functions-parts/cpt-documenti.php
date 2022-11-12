<?php

/**
 * Definisce post type per i documenti d'istituto
 */

add_action( 'init', 'register_documenti_istituto_post_type' );
function register_documenti_istituto_post_type() {

	/** documenti_istituto **/
	$labels = array(
		'name'          => _x( 'Documenti istituto', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Documenti istituto', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Documenti istituto', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 11,
		'menu_icon'     => 'dashicons-lock',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'documenti_istituto', $args );

}


    // registro un nuovo field

    add_action( 'cmb2_init', 'martini_add_documenti_istituto_metaboxes' );
    function martini_add_documenti_istituto_metaboxes() {
    
        $prefix = '_martini_documenti_istituto_';
        
        $cmb_aftercontent = new_cmb2_box( array(
        'id'           => $prefix . 'box_elementi_dati',
        'title'        => __( 'Archivio documenti istituto', 'martino_martini' ),
        'object_types' => array( 'documenti_istituto' ),
        'context'      => 'normal',
        'priority'     => 'high',
        ) );
    
        // box per caricare file di privacy
    
        $cmb_aftercontent->add_field( array(
            'id' => $prefix . 'file_documenti_istituto',
            'name'    => __( 'Carica file', 'martino_martini' ),
            'desc' => __( 'Archivio dei file documenti istituto' , 'martino_martini' ),
            'type' => 'file_list',
            'text' => array(
                'add_upload_files_text' => __('Aggiungi un nuovo file', 'martino_martini' ), // default: "Add or Upload Files"
                'remove_image_text' => __('Rimuovi file', 'martino_martini' ), // default: "Remove Image"
                'remove_text' => __('Rimuovi', 'martino_martini' ), // default: "Remove"
            ),
            'attributes' => array(
                'data-validation' => 'required',
            ),
        
        ) );
    
    }