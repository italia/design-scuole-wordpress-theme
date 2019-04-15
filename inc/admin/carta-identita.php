<?php


/**
 * Crea i metabox del template di pagina carta di identità
 */
add_action( 'cmb2_init', 'dsi_add_carta_metaboxes' );
function dsi_add_carta_metaboxes() {

	$prefix = '_dsi_carta_';


	$cmb_citazione = new_cmb2_box( array(
		'id'           => $prefix . 'box_citazione',
		'title'        => __( 'Citazione *', 'design_scuole_italia' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/carta-identita.php'),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );

	$cmb_citazione->add_field( array(
		'id' => $prefix . 'citazione',
	//	'name'        => __( 'Citazione', 'design_scuole_italia' ),
		'desc' => __( 'Breve (min. 80 caratteri) frase identificativa della missione o della identità dell\'istituto . Es. "Da sempre un punto di riferimento per la formazione degli studenti a Roma" Es. "La scuola è una comunità: costruiamo insieme il futuro". Link alla pagina di presentazione della missione della scuola' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


	$cmb_gallery = new_cmb2_box( array(
		'id'           => $prefix . 'box_gallery',
		'title'        => __( 'Gallery Immagini', 'design_scuole_italia' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/carta-identita.php'),
		'context'      => 'normal',
		'priority'     => 'high',
	) );


	$cmb_gallery->add_field( array(
		'desc' => 'Una selezione di circa 5 immagini significative della scuola/istituto',
		'id'           => $prefix . 'immagini',
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => 'Aggiungi', // default: "Add or Upload Files"
			'remove_image_text' => 'Rimuovi', // default: "Remove Image"
			'file_text' => 'File:', // default: "File:"
			'file_download_text' => 'Download', // default: "Download"
			'remove_text' => 'Elimina', // default: "Remove"
		),
	) );



	$cmb_numeri = new_cmb2_box( array(
		'id'           => $prefix . 'box_numeri',
		'title'        => __( 'I Numeri della Scuola', 'design_scuole_italia' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/carta-identita.php'),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_numeri->add_field( array(
		'id' => $prefix . 'numeri_descrizione',
		//	'name'        => __( 'Citazione', 'design_scuole_italia' ),
		'desc' => __( 'Breve descrizione (140 caratteri) *' , 'design_scuole_italia' ),
		'type' => 'textarea_small',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );



	$cmb_numeri->add_field( array(
		'id' => $prefix . 'studenti',
			'name'        => __( 'Studenti *', 'design_scuole_italia' ),
		'desc' => __( 'Numero di studenti iscritti a scuola' , 'design_scuole_italia' ),
		'type' => 'text_small',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


	$cmb_numeri->add_field( array(
		'id' => $prefix . 'classi',
		'name'        => __( 'Classi *', 'design_scuole_italia' ),
		'desc' => __( 'Numero di classi della scuola' , 'design_scuole_italia' ),
		'type' => 'text_small',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );



	$cmb_numeri->add_field( array(
		'id' => $prefix . 'url_scuoleinchiaro',
		'name'        => __( 'Per approfondire *', 'design_scuole_italia' ),
		'desc' => __( 'Link alla scheda della scuola all\'interno di "scuola in chiaro"' , 'design_scuole_italia' ),
		'type' => 'text_url',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );



	$cmb_carte = new_cmb2_box( array(
		'id'           => $prefix . 'box_carte',
		'title'        => __( 'Le carte della scuola', 'design_scuole_italia' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/carta-identita.php'),
		'context'      => 'normal',
		'priority'     => 'high',
	) );


	$cmb_carte->add_field( array(
		'desc' => __('Utilizza le carte per presentare il Piano triennale dell\'offerta formativa (PTOF), il Piano di inclusione e il Regolamento di Istituto o altri documenti.', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso',
	) );

	$carte_group_id = $cmb_carte->add_field( array(
		'id'           => $prefix . 'gruppo_carte',
		'type'        => 'group',
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => __( 'Carta {#}', 'design_scuole_italia' ),
			'add_button'    => __( 'Aggiungi una Carta', 'design_scuole_italia' ),
			'remove_button' => __( 'Rimuovi la Carta', 'design_scuole_italia' ),
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );



	$cmb_carte->add_group_field( $carte_group_id, array(
		'id' => $prefix . 'titolo',
		'name'        => __( 'Titolo', 'design_scuole_italia' ),
		'desc' => __( 'Titolo "Il piano triennale dell\'offerta formativa", oppure "Il piano per l\'inclusione", o altro' , 'design_scuole_italia' ),
		'type' => 'text',
	) );

	$cmb_carte->add_group_field( $carte_group_id, array(
		'id' => $prefix . 'descrizione',
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'Descrizione breve del documento (min 160 caratteri).' , 'design_scuole_italia' ),
		'type' => 'textarea',
	) );

	$cmb_carte->add_group_field( $carte_group_id, array(
		'id' => $prefix . 'link',
		'name'        => __( 'Link', 'design_scuole_italia' ),
		'desc' => __( 'Link alla scheda di dettaglio' , 'design_scuole_italia' ),
		'type' => 'text_url'
	) );

	$cmb_storia = new_cmb2_box( array(
		'id'           => $prefix . 'box_storia',
		'title'        => __( 'La Storia', 'design_scuole_italia' ),
		'object_types' => array( 'page' ), // post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'page-templates/carta-identita.php'),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_storia->add_field( array(
		'id' => $prefix . 'descrizione_scuola',
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'Descrizione introduttiva della timeline' , 'design_scuole_italia' ),
		'type' => 'textarea_small',
	) );

	$timeline_group_id = $cmb_storia->add_field( array(
		'id'           => $prefix . 'timeline',
		'type'        => 'group',
		'desc' => __( '<h2>Timeline della scuola. Ogni fase è costruita attraverso data, titolo (max 60 caratteri) e descrizione breve (max 140 caratteri) Se è un istituto comprende le tappe delle scuole che ne fanno parte</h2>' , 'design_scuole_italia' ),
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => __( 'Fase {#}', 'design_scuole_italia' ),
			'add_button'    => __( 'Aggiungi un elemento', 'design_scuole_italia' ),
			'remove_button' => __( 'Rimuovi l\'elemento ', 'design_scuole_italia' ),
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );


	$cmb_storia->add_group_field( $timeline_group_id, array(
		'id' => $prefix . 'data_timeline',
		'name'        => __( 'Data', 'design_scuole_italia' ),
		'type' => 'text_date',
	) );

	$cmb_storia->add_group_field( $timeline_group_id, array(
		'id' => $prefix . 'titolo_timeline',
		'name'        => __( 'Titolo', 'design_scuole_italia' ),
		'type' => 'text',
	) );
	$cmb_storia->add_group_field( $timeline_group_id, array(
		'id' => $prefix . 'descrizione_timeline',
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'type' => 'textarea_small',
	) );



}