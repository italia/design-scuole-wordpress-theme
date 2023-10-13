<?php
add_action( 'init', 'dsi_register_articolo_post_tax', 0 );
function dsi_register_articolo_post_tax() {

	$labels = array(
		'name'              => _x( 'Tipologia Articolo ', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Tipologia Articolo', 'taxonomy singular name', 'design_scuole_italia' ),
		'search_items'      => __( 'Cerca Tipologia', 'design_scuole_italia' ),
		'all_items'         => __( 'Tutte le tipologie', 'design_scuole_italia' ),
		'edit_item'         => __( 'Modifica la Tipologia', 'design_scuole_italia' ),
		'update_item'       => __( 'Aggiorna la Tipologia', 'design_scuole_italia' ),
		'add_new_item'      => __( 'Aggiungi una Tipologia', 'design_scuole_italia' ),
		'new_item_name'     => __( 'Nuova Tipologia', 'design_scuole_italia' ),
		'menu_name'         => __( 'Tipologia', 'design_scuole_italia' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tipologia-articolo' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_articoli',
            'edit_terms'    => 'edit_tipologia_articoli',
            'delete_terms'  => 'delete_tipologia_articoli',
            'assign_terms'  => 'assign_tipologia_articoli'
        )
	);

	register_taxonomy( 'tipologia-articolo', array( 'post' ), $args );

}

/**
 * Crea i metabox del post type post
 */
add_action( 'cmb2_init', 'dsi_add_articolo_metaboxes' );
function dsi_add_articolo_metaboxes() {

	$prefix = '_dsi_articolo_';


    $cmb_abstract = new_cmb2_box( array(
        'id'           => $prefix . 'box_abstract',
        'object_types' => array( 'post' ),
        'context'      => 'after_title',
        'priority'     => 'high',
    ) );

    $cmb_abstract->add_field( array(
        'id' => $prefix . 'tipologia',
        'name'        => __( 'Tipologia articolo *', 'design_scuole_italia' ),
        'type'             => 'taxonomy_radio_inline',
        'show_option_none' => false,
        'taxonomy'       => 'tipologia-articolo',
        'remove_default' => 'true',
        'default' => "notizie",
        'attributes' => array(
            'required' => 'required'
        ),
    ) );


    $cmb_abstract->add_field( array(
        'id' => $prefix . 'descrizione',
        'name'        => __( 'Abstract *', 'design_scuole_italia' ),
        'desc' => __( 'Indicare un sintetico abstract (max 160 caratteri)' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '160',
	    'required' => 'required'
        ),
    ) );

    $cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_articolo',
		'title'         => __( 'Dettagli Articolo', 'design_scuole_italia' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );
	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'persone',
			'name'       => __('Persone ', 'design_scuole_italia' ),
			'desc' => __( 'Link a schede persone dell\'amminsitrazione citate', 'design_scuole_italia' ),
			'type'    => 'pw_multiselect',
			'options' => dsi_get_user_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
			),
		)
	);

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'luoghi',
		'name'    => __( 'Luogo', 'design_scuole_italia' ),
		'desc' => __( 'Link a schede luoghi del sito citati  ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_luoghi_options(),
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_schede_documenti',
		'name'    => __( 'Documenti', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci qui tutti i documenti che ritieni rilevanti. Se devi caricare il documento <a href="post-new.php?post_type=documento">puoi creare una breve scheda di presentazione</a> (soluzione consigliata e più efficace per gli utenti del sito) oppure caricarlo direttamente nei campi che seguono. ' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'documento',
			), // override the get_posts args
		),
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'file_documenti',
		'name'    => __( 'Carica documenti', 'design_scuole_italia' ),
		'desc' => __( 'Se l\'allegato non è descritto da una scheda documento, link all\'allegato. ' , 'design_scuole_italia' ),
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		// 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => __('Aggiungi un nuovo Documento', 'design_scuole_italia' ), // default: "Add or Upload Files"
			'remove_image_text' => __('Rimuovi Documento', 'design_scuole_italia' ), // default: "Remove Image"
			'remove_text' => __('Rimuovi', 'design_scuole_italia' ), // default: "Remove"
		),
	) );

}


/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_articolo_add_content_after_editor', 100 );
function sdi_articolo_add_content_after_editor($post) {
    if($post->post_type == "post")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}
