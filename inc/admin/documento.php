<?php
/**
 * Definisce post type e tassonomie relative ai documenti
 */
add_action( 'init', 'dsi_register_documento_post_type', 0 );
function dsi_register_documento_post_type() {

	/** documenti **/
	$labels = array(
		'name'          => _x( 'Documenti', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Documento', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor' ),
		'taxonomies'    => array( 'tipologia' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-portfolio',
		'has_archive'   => true,
	);
	register_post_type( 'documento', $args );

	$labels = array(
		'name'              => _x( 'Tipologia', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Tipologia', 'taxonomy singular name', 'design_scuole_italia' ),
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
		'rewrite'           => array( 'slug' => 'tipologia-documento' ),
	);

	register_taxonomy( 'tipologia-documento', array( 'documento' ), $args );

}


/**
 * Crea i metabox del post type eventi
 */
add_action( 'cmb2_init', 'dsi_add_documento_metaboxes' );
function dsi_add_documento_metaboxes() {

	$prefix = '_dsi_documento_';

	$cmb_sottotitolo = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
//		'title'        => __( 'Sottotitolo', 'design_scuole_italia' ),
		'object_types' => array( 'documento' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );


	$cmb_sottotitolo->add_field( array(
		'id'         => $prefix . 'descrizione',
		'name'       => __( 'Descrizione *', 'design_scuole_italia' ),
		'desc'       => __( 'Indicare una sintetica descrizione del Evento. Vincoli: 160 caratteri spazi inclusi.', 'design_scuole_italia' ),
		'type'       => 'textarea',
		'attributes' => array(
			'maxlength' => '160',
			'required'  => 'required'
		),
	) );



	$cmb_aftercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_dati',
		'title'        => __( 'Dati Pubblici', 'design_scuole_italia' ),
		'object_types' => array( 'documento' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );



	$cmb_aftercontent->add_field( array(
		'id'         => $prefix . 'gallery',
		'name'       => __( 'Galleria', 'design_scuole_italia' ),
		'desc'       => __( 'Galleria di immagini  significative relative a un documento, corredate da didascalia', 'design_scuole_italia' ),
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		'query_args' => array( 'type' => 'image' ), // Only images attachment
	) );




	$cmb_aftercontent->add_field( array(
			'name'       => __('Autore/i ', 'design_scuole_italia' ),
			'desc' => __( 'Eventuale Lista autori che hanno pubblicato il documento. Es link alla scheda del Dirigente scolastico. Inseriscile <a href="edit-tags.php?taxonomy=persona">cliccando qui</a> ' , 'design_scuole_italia' ),
			'id'             => $prefix . 'autori',
			'type'           => 'multicheck_inline',
			'options' => dsi_get_user_options( array( 'fields' => array( 'user_login' ) ) ),
		)
	);


	$cmb_aftercontent->add_field( array(
			'id' => $prefix . 'licenza',
			'name'       => __('Licenza di distribuzione *', 'design_scuole_italia' ),
			'desc' => __( 'Licenza con il quale il documento viene distribuito', 'design_scuole_italia' ),
			'type'    => 'text',
			'attributes' => array(
				'required' => 'required'
			),
		)
	);


	$cmb_aftercontent->add_field( array(
		'id' => $prefix . 'file_documenti',
		'name'    => __( 'Carica file', 'design_scuole_italia' ),
		'desc' => __( 'Lista di documenti allegati' , 'design_scuole_italia' ),
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		// 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => __('Aggiungi un nuovo allegato', 'design_scuole_italia' ), // default: "Add or Upload Files"
			'remove_image_text' => __('Rimuovi allegato', 'design_scuole_italia' ), // default: "Remove Image"
			'remove_text' => __('Rimuovi', 'design_scuole_italia' ), // default: "Remove"
		),
	) );




	$cmb_aftercontent->add_field( array(
		'id' => $prefix . 'servizi_collegati',
		'name'        => __( 'Servizi collegati', 'design_scuole_italia' ),
		'desc' => __( 'Breve descrizione del servizio collegato al documento. Es.  Per partecipare al bando vai alla scheda di presentazione delle modalità di partecipazione ai bandi comunali.' , 'design_scuole_italia' ),
		'type' => 'textarea'
	) );

	$cmb_aftercontent->add_field( array(
		'id' => $prefix . 'link_servizi_collegati',
		'name'        => __( 'Canale digitale servizio collegato', 'design_scuole_italia' ),
		'desc' => __( 'Se il servizio ha un canale digitale Link per avviare la procedura di attivazione del servizio. Questo campo mette in relazione "Servizio" con il suo canale digitale di attivazione. Es. Partecipa al bando"' , 'design_scuole_italia' ),
		'type' => 'text_url'

	) );



	$timeline_group_id = $cmb_aftercontent->add_field( array(
		'id'           => $prefix . 'timeline',
		'type'        => 'group',
		'name'        => 'Fasi',
		'desc' => __( 'Suddividere i contenuti del documento in fasi e relative date. Es data di apertura della partecipazione a un bando, data di scadenza della possibilità di partecipare al bando' , 'design_scuole_italia' ),
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => __( 'Fase {#}', 'design_scuole_italia' ),
			'add_button'    => __( 'Aggiungi un elemento', 'design_scuole_italia' ),
			'remove_button' => __( 'Rimuovi l\'elemento ', 'design_scuole_italia' ),
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );


	$cmb_aftercontent->add_group_field( $timeline_group_id, array(
		'id' => 'data_timeline',
		'name'        => __( 'Data', 'design_scuole_italia' ),
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'data-datepicker' => json_encode( array(
			'yearRange' => '-100:+0',
		) ),
	) );

	$cmb_aftercontent->add_group_field( $timeline_group_id, array(
		'id' => 'titolo_timeline',
		'name'        => __( 'Titolo', 'design_scuole_italia' ),
		'type' => 'text',
	) );




	$cmb_aftercontent->add_field( array(
		'id' => $prefix . 'ufficio',
		'name'    => __( 'Ufficio responsabile del documento', 'design_scuole_italia' ),
		'desc' => __( 'Link alla scheda dell\'ufficio responsabile del documento. Se non la trovi inseriscila <a href="post-new.php?post_type=struttura">cliccando qui</a> ' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'struttura',
			), // override the get_posts args
		),
	) );

	$cmb_aftercontent->add_field( array(
		'name'    => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
		'desc'    => __( 'Ulteriori informazioni relative alla persona', 'design_scuole_italia' ),
		'id'      => $prefix . 'altre_info',
		'type'    => 'textarea',
		//'attributes'    => array(
		//	'required'    => 'required'
		//),
	) );


	$cmb_aftercontent->add_field( array(
		'id' => $prefix . 'riferimenti_normativi',
		'name'        => __( 'Riferimenti normativi', 'design_scuole_italia' ),
		'desc' => __( 'Lista di link con riferimenti normativi utili per il documento"' , 'design_scuole_italia' ),
		'type' => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),

	) );

	$cmb_aftercontent->add_field( array(
		'id' => $prefix . 'protocollo',
		'name'        => __( 'Protocollo', 'design_scuole_italia' ),
		'type' => 'text',
	) );

	$cmb_aftercontent->add_field( array(
		'id' => $prefix . 'data_protocollo',
		'name'        => __( 'Data protocollo', 'design_scuole_italia' ),
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'data-datepicker' => json_encode( array(
			'yearRange' => '-100:+0',
		) ),
	) );
}




/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_documento_add_content_after_title' );
function sdi_documento_add_content_after_title($post) {
	if($post->post_type == "documento")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome del Documento</b></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_documento_add_content_before_editor', 100 );
function sdi_documento_add_content_before_editor($post) {
	if($post->post_type == "documento")
		_e('<h1>Descrizione Estesa del Documento</h1>', 'design_scuole_italia' );
}

