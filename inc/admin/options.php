<?php
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function dsi_register_main_options_metabox() {
	$prefix = '';


	$args = array(
		'id'           => 'dsi_options_header',
		'title'        => esc_html__( 'La Scuola', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'dsi_options',
		'tab_group'    => 'dsi_options',
		'tab_title'    => __('Dati di base', "design_scuole_italia"),
		'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		'icon_url'        => 'dashicons-admin-multisite', // Menu icon. Only applicable if 'parent_slug' is left empty.
	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$header_options = new_cmb2_box( $args );


	$header_options->add_field( array(
		'id' => $prefix . 'tipologia_scuola',
		'name'        => __( 'Tipologia *', 'design_scuole_italia' ),
		'desc' => __( 'La Tipologia della scuola. Es: "Liceo Scientifico Statale"' , 'design_scuole_italia' ),
		'type' => 'text',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$header_options->add_field( array(
		'id' => $prefix . 'nome_scuola',
		'name'        => __( 'Nome Scuola *', 'design_scuole_italia' ),
		'desc' => __( 'Il Nome della Scuola' , 'design_scuole_italia' ),
		'type' => 'text',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$header_options->add_field( array(
		'id' => $prefix . 'luogo_scuola',
		'name'        => __( 'Città *', 'design_scuole_italia' ),
		'desc' => __( 'La città dove risiede la Scuola' , 'design_scuole_italia' ),
		'type' => 'text',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );



	/**
	 * Registers main options page menu item and form.
	 */
	$args = array(
		'id'           => 'dsi_options_carta_identita',
		'title'        => esc_html__( 'Carta di Identità', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'carta_identita',
		'tab_group'    => 'dsi_main_options',
		'tab_title'    => __('Carta di Identità', "design_scuole_italia"),
		'parent_slug'  => 'dsi_options',
		'tab_group'    => 'dsi_options',

	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$main_options = new_cmb2_box( $args );

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */



	$main_options->add_field( array(
		'id' => $prefix . 'immagine',
		'name'        => __( 'Immagine', 'design_scuole_italia' ),
		'desc' => __( 'Immagine di presentazione della scuola' , 'design_scuole_italia' ),
		'type'    => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Aggiungi Immagine' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array(
			 'type' => array(
			 	'image/gif',
			 	'image/jpeg',
			 	'image/png',
			 ),
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'citazione',
			'name'        => __( 'Citazione', 'design_scuole_italia' ),
		'desc' => __( 'Breve (compresa tra 70 e 140 caratteri spazi inclusi) frase identificativa della missione o della identità dell\'istituto . Es. "Da sempre un punto di riferimento per la formazione degli studenti a Roma" Es. "La scuola è una comunità: costruiamo insieme il futuro". Link alla pagina di presentazione della missione della scuola' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
            'maxlength'  => '140',
			'minlength'  => '70'
		),
	) );

	$main_options->add_field( array(
		'desc' => 'Una selezione di circa 5 immagini significative della scuola/istituto',
		'id'           => $prefix . 'immagini',
		'name'        => __( 'Gallery', 'design_scuole_italia' ),
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

	$main_options->add_field( array(
		'name'        => __( 'I numeri della Scuola', 'design_scuole_italia' ),
		'desc' => __('Inserisci il numero di studenti e classi della Scuola', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso_numeri',
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'numeri_descrizione',
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'Breve descrizione (140 caratteri) *' , 'design_scuole_italia' ),
		'type' => 'textarea_small',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


	$main_options->add_field( array(
		'id' => $prefix . 'studenti',
		'name'        => __( 'Studenti *', 'design_scuole_italia' ),
		'desc' => __( 'Numero di studenti iscritti a scuola' , 'design_scuole_italia' ),
		'type' => 'text_small',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'required'    => 'required'
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'classi',
		'name'        => __( 'Classi *', 'design_scuole_italia' ),
		'desc' => __( 'Numero di classi della scuola' , 'design_scuole_italia' ),
		'type' => 'text_small',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'required'    => 'required'
		),
		'sanitization_cb' => 'absint',
		'escape_cb'       => 'absint',
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'url_scuoleinchiaro',
		'name'        => __( 'Per approfondire *', 'design_scuole_italia' ),
		'desc' => __( 'Link alla scheda della scuola all\'interno di "scuola in chiaro"' , 'design_scuole_italia' ),
		'type' => 'text_url',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$main_options->add_field( array(
		'name'        => __( 'Le carte della scuola', 'design_scuole_italia' ),
		'desc' => __('Utilizza le carte per presentare il Piano triennale dell\'offerta formativa (PTOF), il Piano di inclusione e il Regolamento di Istituto o altri documenti.', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso_carte',
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'descrizione_carte',
		'title'        => __( 'Le Carte', 'design_scuole_italia' ),
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'E\' l\'accesso a tutti i documenti della scuola. Es: La scuola raccontata attraverso i documenti più importanti, come il piano triennale dell\'offerta formativa' , 'design_scuole_italia' ),
		'type' => 'textarea_small',
	) );



	$main_options->add_field( array(
		'id' => $prefix . 'link_schede_documenti',
		'name'    => __( 'Le Carte', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci qui tutti i documenti che ritieni utili per presentare la scuola.  <a href="post-new.php?post_type=documento">Qui puoi creare un documento.</a> ' , 'design_scuole_italia' ),
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



	$main_options->add_field( array(
		'name'        => __( 'La Storia', 'design_scuole_italia' ),
		'desc' => __('Timeline della Scuola', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso_storia',
	) );



	$main_options->add_field( array(
		'id' => $prefix . 'descrizione_scuola',
		'title'        => __( 'La Storia', 'design_scuole_italia' ),
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'Descrizione introduttiva della timeline' , 'design_scuole_italia' ),
		'type' => 'textarea_small',
	) );

	$timeline_group_id = $main_options->add_field( array(
		'id'           => $prefix . 'timeline',
		'type'        => 'group',
		'name'        => 'Timeline',
		'desc' => __( 'Ogni fase è costruita attraverso data, titolo (max 60 caratteri) e descrizione breve (max 140 caratteri). NB: Se è un istituto comprende le tappe delle scuole che ne fanno parte' , 'design_scuole_italia' ),
		'repeatable'  => true,
		'options'     => array(
			'group_title'   => __( 'Fase {#}', 'design_scuole_italia' ),
			'add_button'    => __( 'Aggiungi un elemento', 'design_scuole_italia' ),
			'remove_button' => __( 'Rimuovi l\'elemento ', 'design_scuole_italia' ),
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );


	$main_options->add_group_field( $timeline_group_id, array(
		'id' => $prefix . 'data_timeline',
		'name'        => __( 'Data', 'design_scuole_italia' ),
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'data-datepicker' => json_encode( array(
			'yearRange' => '-100:+0',
		) ),
	) );

	$main_options->add_group_field( $timeline_group_id, array(
		'id' => $prefix . 'titolo_timeline',
		'name'        => __( 'Titolo', 'design_scuole_italia' ),
		'type' => 'text',
	) );
	$main_options->add_group_field( $timeline_group_id, array(
		'id' => $prefix . 'descrizione_timeline',
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'type' => 'textarea_small',
	) );




	/**
	 * Registers secondary options page, and set main item as parent.
	 */

	$args = array(
		'id'           => 'dsi_options_struttura_organizzativa',
		'title'        => esc_html__( 'Struttura Organizzativa', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'struttura_organizzativa',
		'parent_slug'  => 'dsi_options',
		'tab_group'    => 'dsi_options',
		'tab_title'    => __('Struttura Organizzativa', "design_scuole_italia"),	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$secondary_options = new_cmb2_box( $args );

	$secondary_options->add_field( array(
		'id' => $prefix . 'descrizione_organizzazione',
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'Una scuola è fatta di persone. Ecco come siamo organizzati e come possiamo entrare in contatto' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$secondary_options->add_field( array(
		'id' => $prefix . 'dirigenza',
		'name'    => __( 'La dirigenza', 'design_scuole_italia' ),
		'desc' => __( 'Seleziona una struttura organizzativa. Se non la trovi inseriscila <a href="post-new.php?post_type=struttura">cliccando qui</a> ' , 'design_scuole_italia' ),
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

	$secondary_options->add_field( array(
		'id' => $prefix . 'segreteria',
		'name'    => __( 'La segreteria', 'design_scuole_italia' ),
		'desc' => __( 'Seleziona una struttura organizzativa. Se non la trovi inseriscila <a href="post-new.php?post_type=struttura">cliccando qui</a> ' , 'design_scuole_italia' ),
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

	$secondary_options->add_field( array(
		'id' => $prefix . 'scuole',
		'name'    => __( 'Le scuole', 'design_scuole_italia' ),
		'desc' => __( 'Se  è un istituto comprensivo, card di ciascuna delle scuole di cui fa parte l\'istituto. Seleziona la relativa struttura organizzativa. Se non la trovi inseriscila <a href="post-new.php?post_type=struttura">cliccando qui</a> ' , 'design_scuole_italia' ),
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

	$secondary_options->add_field( array(
		'name'        => __( 'Commissioni / gruppo di lavoro', 'design_scuole_italia' ),
		//'desc' => __('Inserisci il numero di studenti e classi della Scuola', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso_commissioni',
	) );

	$secondary_options->add_field( array(
		'name'       => __('Testo introduttivo  *', 'design_scuole_italia' ),
		'desc'       => __('140 caratteri', 'design_scuole_italia' ),
		'id'         => $prefix . 'descrizione_commissione',
		'type'       => 'textarea_small',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$secondary_options->add_field( array(
		'name'       => __('Nome commissione/gruppo di lavoro  *', 'design_scuole_italia' ),
		'desc'       => __('Nome della commissione/gruppo di lavoro', 'design_scuole_italia' ),
		'id'         => $prefix . 'nome_commissione',
		'type'       => 'textarea_small',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$secondary_options->add_field( array(
		'name'       => __('Competenze  *', 'design_scuole_italia' ),
		'desc'       => __('Elenco/descrizione dei compiti assegnati ', 'design_scuole_italia' ),
		'id'         => $prefix . 'competenze_commissione',
		'type'       => 'textarea',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$secondary_options->add_field( array(
		'name'       => __('Responsabile ', 'design_scuole_italia' ),
		'desc' => __( 'Seleziona una persona. Se non la trovi inseriscila <a href="edit-tags.php?taxonomy=persona">cliccando qui</a> ' , 'design_scuole_italia' ),
		'id'             => $prefix . 'responsabile_commissione',
		'taxonomy'       => 'persona', //Enter Taxonomy Slug
		'type'    => 'select',
		'options' => dsi_get_user_options( array( 'fields' => array( 'user_login' ) ) ),
        )
    );



	$secondary_options->add_field( array(
			'name'       => __('Persone ', 'design_scuole_italia' ),
			'desc' => __( 'Eventuale lista delle persone che fanno parte della struttura. Inseriscile <a href="edit-tags.php?taxonomy=persona">cliccando qui</a> ' , 'design_scuole_italia' ),
			'id'             => $prefix . 'persone_commissione',
			'type'           => 'multicheck_inline',
			'options' => dsi_get_user_options( array( 'fields' => array( 'user_login' ) ) ),
		)
	);

	$secondary_options->add_field( array(
		'name'       => __('Per informazioni  *', 'design_scuole_italia' ),
		'desc'       => __('Indirizzo email e numero di telefono di contatto della commissione/gruppo di lavoro ', 'design_scuole_italia' ),
		'id'         => $prefix . 'info_commissione',
		'type'       => 'textarea',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );




	/**
	 * Registers main options page menu item and form.
	 */
	/*
	$args = array(
		'id'           => 'dsi_options_menu',
		'title'        => esc_html__( 'Menu', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'menu_principale',
		'tab_group'    => 'dsi_main_options',
		'tab_title'    => __('Opzioni Menu', "design_scuole_italia"),
		'parent_slug'  => 'dsi_options',
		'tab_group'    => 'dsi_options',

	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$menu_options = new_cmb2_box( $args );

	$menu_options->add_field( array(
		'name' => 'Menu:  Come funziona',
		'desc' => __( 'Le sottovoci di ogni voce del menu principale (Scuola, Servizi, etc) sono singoli menu Wordpress. <br><a href="nav-menus.php">Configurali da qui associandoli alla relativa posizione</a>. <br> Qui di seguito puoi configurare gli articoli da mettere in evidenza nel mega menu. ', 'design_scuole_italia' ),
		'type' => 'title',
		'id'   => 'menu_main_title'
	) );

	$menu_options->add_field( array(
		'name' => 'Mega Menu:  Scuola',
		'desc' => __( 'Seleziona un lancio da mostrare in evidenza nella tendina del menu "Scuola". <br>In caso di selezione multipla verrà utilizzato solo il primo.', 'design_scuole_italia' ),
		'type' => 'title',
		'id'   => 'menu_scuola_title'
	) );
	$menu_options->add_field( array(
		'id' => $prefix . 'item_menu_scuola',
		'name'    => __( 'Seleziona 1 lancio da mostrare nel menu alla voce "Scuola"', 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 500,
				'post_type'      => "any",
			), // override the get_posts args
		),
	) );

	$menu_options->add_field( array(
		'name' => 'Mega Menu:  Servizi',
		'desc' => __( 'Seleziona un lancio da mostrare in evidenza nella tendina del menu "Servizi". <br>In caso di selezione multipla verrà utilizzato solo il primo.', 'design_scuole_italia' ),
		'type' => 'title',
		'id'   => 'menu_servizi_title'
	) );
	$menu_options->add_field( array(
		'id' => $prefix . 'item_menu_servizi',
		'name'    => __( 'Seleziona 1 lancio da mostrare nel menu alla voce "Servizi"', 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 500,
				'post_type'      => "any",
			), // override the get_posts args
		),
	) );

	$menu_options->add_field( array(
		'name' => 'Mega Menu:  Notizie',
		'desc' => __( 'Seleziona un lancio da mostrare in evidenza nella tendina del menu "Notizie". <br>In caso di selezione multipla verrà utilizzato solo il primo.', 'design_scuole_italia' ),
		'type' => 'title',
		'id'   => 'menu_notizie_title'
	) );
	$menu_options->add_field( array(
		'id' => $prefix . 'item_menu_notizie',
		'name'    => __( 'Seleziona 1 lancio da mostrare nel menu alla voce "Notizie"', 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 500,
				'post_type'      => "any",
			), // override the get_posts args
		),
	) );

	$menu_options->add_field( array(
		'name' => 'Mega Menu:  Didattica',
		'desc' => __( 'Seleziona un lancio da mostrare in evidenza nella tendina del menu "Didattica". <br>In caso di selezione multipla verrà utilizzato solo il primo.', 'design_scuole_italia' ),
		'type' => 'title',
		'id'   => 'menu_didattica_title'
	) );
	$menu_options->add_field( array(
		'id' => $prefix . 'item_menu_didattica',
		'name'    => __( 'Seleziona 1 lancio da mostrare nel menu alla voce "Didattica"', 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 500,
				'post_type'      => "any",
			), // override the get_posts args
		),
	) );



	$menu_options->add_field( array(
		'name' => 'Mega Menu:  La mia classe',
		'desc' => __( 'Seleziona un lancio da mostrare in evidenza nella tendina del menu "La mia classe". <br>In caso di selezione multipla verrà utilizzato solo il primo.', 'design_scuole_italia' ),
		'type' => 'title',
		'id'   => 'menu_classe_title'
	) );
	$menu_options->add_field( array(
		'id' => $prefix . 'item_menu_classe',
		'name'    => __( 'Seleziona 1 lancio da mostrare nel menu alla voce "La mia classe"', 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 500,
				'post_type'      => "any",
			), // override the get_posts args
		),
	) );
*/
	// pagina opzioni
	/**
	 * Registers main options page menu item and form.
	 */
	$args = array(
		'id'           => 'dsi_setup_menu',
		'title'        => esc_html__( 'Configurazione', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'setup',
		'tab_group'    => 'dsi_main_options',
		'tab_title'    => __('Configurazione', "design_scuole_italia"),
		'parent_slug'  => 'dsi_options',
		'tab_group'    => 'dsi_options',

	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$setup_options = new_cmb2_box( $args );


	$setup_options->add_field( array(
		'id' => $prefix . 'mapbox_key',
		'name' => 'Access Token MapBox',
		'desc' => __( 'Inserisci l\'access token mapbox per l\'erogazione delle mappe. Puoi crearlo <a target="_blank" href="https://www.mapbox.com/studio/account/tokens/">da qui</a>', 'design_scuole_italia' ),
		'type' => 'text'
    ) );








}
add_action( 'cmb2_admin_init', 'dsi_register_main_options_metabox' );

/**
 * A CMB2 options-page display callback override which adds tab navigation among
 * CMB2 options pages which share this same display callback.
 *
 * @param CMB2_Options_Hookup $cmb_options The CMB2_Options_Hookup object.
 */
function dsi_options_display_with_tabs( $cmb_options ) {
	$tabs = dsi_options_page_tabs( $cmb_options );
	?>
	<div class="wrap cmb2-options-page option-<?php echo $cmb_options->option_key; ?>">
		<?php if ( get_admin_page_title() ) : ?>
			<h2><?php echo wp_kses_post( get_admin_page_title() ); ?></h2>
		<?php endif; ?>
		<h2 class="nav-tab-wrapper">
			<?php foreach ( $tabs as $option_key => $tab_title ) : ?>
				<a class="nav-tab<?php if ( isset( $_GET['page'] ) && $option_key === $_GET['page'] ) : ?> nav-tab-active<?php endif; ?>" href="<?php menu_page_url( $option_key ); ?>"><?php echo wp_kses_post( $tab_title ); ?></a>
			<?php endforeach; ?>
		</h2>
		<form class="cmb-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="<?php echo $cmb_options->cmb->cmb_id; ?>" enctype="multipart/form-data" encoding="multipart/form-data">
			<input type="hidden" name="action" value="<?php echo esc_attr( $cmb_options->option_key ); ?>">
			<?php $cmb_options->options_page_metabox(); ?>
			<?php submit_button( esc_attr( $cmb_options->cmb->prop( 'save_button' ) ), 'primary', 'submit-cmb' ); ?>
		</form>
	</div>
	<?php
}

/**
 * Gets navigation tabs array for CMB2 options pages which share the given
 * display_cb param.
 *
 * @param CMB2_Options_Hookup $cmb_options The CMB2_Options_Hookup object.
 *
 * @return array Array of tab information.
 */
function dsi_options_page_tabs( $cmb_options ) {
	$tab_group = $cmb_options->cmb->prop( 'tab_group' );
	$tabs      = array();

	foreach ( CMB2_Boxes::get_all() as $cmb_id => $cmb ) {
		if ( $tab_group === $cmb->prop( 'tab_group' ) ) {
			$tabs[ $cmb->options_page_keys()[0] ] = $cmb->prop( 'tab_title' )
				? $cmb->prop( 'tab_title' )
				: $cmb->prop( 'title' );
		}
	}

	return $tabs;
}



