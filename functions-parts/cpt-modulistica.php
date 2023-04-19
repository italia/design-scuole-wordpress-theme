<?php

/**
 * Definisce post type per modulistica
 */

add_action( 'init', 'register_modulistica_post_type' );
function register_modulistica_post_type() {

	/** modulistica **/
	$labels = array(
		'name'          => _x( 'Modulistica', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Modulistica', 'Post Type Singular Name', 'martino_martini' ),
		'add_new'       => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'add_new_item'  => _x( 'Aggiungi un File', 'Post Type Singular Name', 'martino_martini' ),
		'edit_item'      => _x( 'Modifica il File', 'Post Type Singular Name', 'martino_martini' ),
		'view_item'      => _x( 'Visualizza il File', 'Post Type Singular Name', 'martino_martini' ),
	);
	$args   = array(
		'label'         => __( 'Modulistica', 'martino_martini' ),
		'labels'        => $labels,
		'supports'      => array( 'title' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 21,
		'menu_icon'     => 'dashicons-media-document',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'modulistica', $args );

}


    // registro un nuovo field

    add_action( 'cmb2_init', 'martini_add_modulistica_metaboxes' );
    function martini_add_modulistica_metaboxes() {
    
        $prefix = '_martini_modulistica_';
        
        $cmb_aftercontent = new_cmb2_box( array(
        'id'           => $prefix . 'box_elementi_dati',
        'title'        => __( 'Archivio modulistica', 'martino_martini' ),
        'object_types' => array( 'modulistica' ),
        'context'      => 'normal',
        'priority'     => 'high',
        ) );
    
        // box per caricare file di modulistica
    
        $cmb_aftercontent->add_field( array(
            'id' => $prefix . 'file_modulistica',
            'name'    => __( 'Carica file', 'martino_martini' ),
            'desc' => __( 'Archivio dei file modulistica' , 'martino_martini' ),
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