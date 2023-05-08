<?php

/**
 * Definisce post type per Documenti Libri
 */

add_action( 'init', 'register_libri_post_type' );
function register_libri_post_type() {

	/** Documenti Libri **/
	$labels = array(
		'name'          => _x( 'Libri', 'Post Type General Name', 'martino_martini' ),
		'singular_name' => _x( 'Libri', 'Post Type Singular Name', 'martino_martini' ),
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
		'menu_position' => 9,
		'menu_icon'     => 'dashicons-book',
		'has_archive'   => true,
        'map_meta_cap'    => true,
	);
	register_post_type( 'libri', $args );

}

//aggiunta categorie
function libri_taxonomies() {
    register_taxonomy(
        'libri_tax',
        'libri',
        array(
            'labels' => array(
               'name' => 'Categorie',
               'add_new_item' => 'Aggiungi nuova categoria',
               'new_item_name' => "Nuova categoria"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            // 'show_in_quick_edit'         => false,
            // 'meta_box_cb'                => false,
        )
    );

}
add_action( 'init', 'libri_taxonomies', 0 );

// registro un nuovo field

add_action('cmb2_init', 'martini_add_libri_metaboxes');
function martini_add_libri_metaboxes()
{

    $prefix = '_martini_libri_';

    $cmb_aftercontent = new_cmb2_box(array(
        'id'           => $prefix . 'box_elementi_dati',
        'title'        => __('Archivio Documenti Libri', 'martino_martini'),
        'object_types' => array('libri'),
        'context'      => 'normal',
        'priority'     => 'high',
    ));

    // box per caricare file di libri

    $cmb_aftercontent->add_field(array(
        'id' => $prefix . 'file_libri',
        'name'    => __('Carica file', 'martino_martini'),
        'desc' => __('Archivio dei file Documenti Libri', 'martino_martini'),
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => __('Aggiungi un nuovo file', 'martino_martini'), // default: "Add or Upload Files"
            'remove_image_text' => __('Rimuovi file', 'martino_martini'), // default: "Remove Image"
            'remove_text' => __('Rimuovi', 'martino_martini'), // default: "Remove"
        ),
        'attributes' => array(
            'data-validation' => 'required',
        ),

    ));
}