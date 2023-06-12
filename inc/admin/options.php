<?php
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function dsi_register_main_options_metabox() {
	$prefix = '';

	$args = array(
		'id'           => 'dsi_options_header',
		'title'        => esc_html__( 'Configurazione', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'dsi_options',
		'tab_group'    => 'dsi_options',
		'tab_title'    => __('Opzioni di base', "design_scuole_italia"),
        'capability'    => 'manage_options',
		'position'        => 2, // Menu position. Only applicable if 'parent_slug' is left empty.
		'icon_url'        => 'dashicons-admin-tools', // Menu icon. Only applicable if 'parent_slug' is left empty.
	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$header_options = new_cmb2_box( $args );

    $header_options->add_field( array(
        'id' => $prefix . 'home_istruzioni',
        'name'        => __( 'Configurazione Scuola', 'design_scuole_italia' ),
        'desc' => __( 'Area di configurazione delle informazioni di base' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );


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
     * Registers options page "Alerts".
     */

    $args = array(
        'id'           => 'dsi_options_messages',
        'title'        => esc_html__( 'Messaggi', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'home_messages',
        'capability'    => 'manage_options',
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'tab_title'    => __('Avvisi in Home', "design_scuole_italia"),	);

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $alerts_options = new_cmb2_box( $args );

    $alerts_options->add_field( array(
        'id' => $prefix . 'messages_istruzioni',
        'name'        => __( 'Avvisi di allerta in home page', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci messaggi che saranno visualizzati nella homepage.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $alerts_group_id = $alerts_options->add_field( array(
        'id'           => $prefix . 'messages',
        'type'        => 'group',
        'desc' => __( 'Ogni messaggio è costruito attraverso descrizione breve (max 140 caratteri) e data di scadenza (opzionale).' , 'design_scuole_italia' ),
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => __( 'Messaggio {#}', 'design_scuole_italia' ),
            'add_button'    => __( 'Aggiungi un messaggio', 'design_scuole_italia' ),
            'remove_button' => __( 'Rimuovi il messaggio', 'design_scuole_italia' ),
            'sortable'      => true,  // Allow changing the order of repeated groups.
        ),
    ) );

    $alerts_options->add_group_field( $alerts_group_id, array(
        'name'    => 'Selezione colore del messaggio',
        'id'      => 'colore_message',
        'type'    => 'radio_inline',
        'options' => array(
            'red'   => __( '<span class="radio-color red"></span>Rosso', 'design_scuole_italia' ),
            'yellow' => __( '<span class="radio-color yellow"></span>Giallo', 'design_scuole_italia' ),
            'green'     => __( '<span class="radio-color green"></span>Verde', 'design_scuole_italia' ),
            'blue'     => __( '<span class="radio-color blue"></span>Blu', 'design_scuole_italia' ),
            'purple'     => __( '<span class="radio-color purple"></span>Viola', 'design_scuole_italia' ),
        ),
        'default' => 'yellow',
    ) );

    $alerts_options->add_group_field( $alerts_group_id, array(
        'name' => 'Visualizza icona',
        'id'   => 'icona_message',
        'type' => 'checkbox',
    ) );

    $alerts_options->add_group_field( $alerts_group_id, array(
        'id' => $prefix . 'data_message',
        'name'        => __( 'Data fine', 'design_scuole_italia' ),
        'type' => 'text_date',
        'date_format' => 'd-m-Y',
        'data-datepicker' => json_encode( array(
            'yearRange' => '-100:+0',
        ) ),
    ) );

    $alerts_options->add_group_field( $alerts_group_id, array(
        'id' => $prefix . 'testo_message',
        'name'        => __( 'Testo', 'design_scuole_italia' ),
        'desc' => __( 'Massimo 140 caratteri' , 'design_scuole_italia' ),
        'type' => 'textarea_small',
        'attributes'    => array(
            'rows'  => 3,
            'maxlength'  => '140',
        ),
    ) );

    $alerts_options->add_group_field( $alerts_group_id, array(
        'id' => $prefix . 'link_message',
        'name'        => __( 'Collegamento', 'design_scuole_italia' ),
        'desc' => __( 'Link al una pagina di approfondimento anche esterna al sito' , 'design_scuole_italia' ),
        'type' => 'text_url',
    ) );


    /**
     * Registers options page "Home".
     */

    $args = array(
        'id'           => 'dsi_options_home',
        'title'        => esc_html__( 'Home Page', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'homepage',
        'capability'    => 'manage_options',
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'tab_title'    => __('Home', "design_scuole_italia"),	);

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $home_options = new_cmb2_box( $args );

/*
    $home_options->add_field( array(
        'id' => $prefix . 'home_istruzioni_0',
        'name'        => __( 'La Scuola', 'design_scuole_italia' ),
        'type' => 'title',
    ) );


    $home_options->add_field(  array(
        'id' => $prefix.'scuola_principale',
        'name'    => __( 'Seleziona la scuola da linkare in home page', 'design_scuole_italia' ),
        'desc' => __( 'NB: La scuola è una <a href="edit.php?post_type=struttura">Struttura organizzativa</a> di tipologia "Scuola. Se non esiste creala prima <a href="edit.php?post_type=struttura">qui</a>"' , 'design_scuole_italia' ),
        'type'    => 'pw_select',
        'options' => dsi_get_strutture_scuole_options(),
    ) );
*/


    $home_options->add_field( array(
        'id' => $prefix . 'home_istruzioni_1',
        'name'        => __( 'Sezione Notizie', 'design_scuole_italia' ),
        'desc' => __( 'Gestione Notizie / Articoli / Eventi mostrati in home page' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $home_options->add_field(array(
        'id' => $prefix . 'home_is_selezione_automatica',
        'name' => __('Selezione Automatica', 'design_scuole_italia'),
        'desc' => __('Seleziona <b>Si</b> per mostrare automaticamente gli articoli in home page. Le colonne mostreranno l\'ultimo articolo delle tipologie selezionate nella <a href="admin.php?page=notizie">configurazione della Pagina "Novità"</a>,', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'true',
        'options' => array(
            'true' => __('Si', 'design_scuole_italia'),
            'false' => __('No', 'design_scuole_italia'),
        ),
    ));

    $home_options->add_field(array(
            'name' => __('Selezione articoli ', 'design_scuole_italia'),
            'desc' => __('Seleziona gli articoli da mostrare in Home Page. NB: Selezionane 3 o multipli di 3 per evitare buchi nell\'impaginazione.  ', 'design_scuole_italia'),
            'id' => $prefix . 'home_articoli_manuali',
            'type'    => 'custom_attached_posts',
            'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
            'options' => array(
                'show_thumbnails' => false, // Show thumbnails on the left
                'filter_boxes'    => true, // Show a text box for filtering the results
                'query_args'      => array(
                    'posts_per_page' => -1,
                    'post_type'      => array('post', 'page', 'evento', 'circolare'),
                ), // override the get_posts args
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'home_is_selezione_automatica',
                'data-conditional-value' => "false",
            ),
        )
    );

    $home_options->add_field(array(
        'id' => $prefix . 'home_show_events',
        'name' => __('Mostra gli eventi in Home', 'design_scuole_italia'),
        'desc' => __('Abilita gli eventi in Home e decidi come mostrarli', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'false',
        'options' => array(
            'false' => __('No', 'design_scuole_italia'),
            'true_event' => __('Si, mostra il prossimo evento', 'design_scuole_italia'),
            // 'true_calendar' => __('Si, mostra il calendario', 'design_scuole_italia'),
        ),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'home_is_selezione_automatica',
            'data-conditional-value' => "true",
        ),
    ));

    $home_options->add_field( array(
        'id' => $prefix . 'home_istruzioni_banner',
        'name'        => __( 'Sezione Banner', 'design_scuole_italia' ),
        'desc' => __( 'Gestione sezione Banner (opzionale) mostrata in home page' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $home_options->add_field(  array(
        'id' => $prefix.'visualizza_banner',
        'name'    => __( 'Visualizza la fascia banner', 'design_scuole_italia' ),
        'type'    => 'radio_inline',
        'options' => array(
            'si' => __( 'Si', 'design_scuole_italia' ),
            'no'   => __( 'No', 'design_scuole_italia' ),
        ),
        'default' => "no"
    ) );


    $bsnner_group_id = $home_options->add_field( array(
        'id'          =>  $prefix . 'banner_group',
        'type'        => 'group',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => 'Banner {#}',
            'add_button'    => 'Aggiungi un nuovo banner',
            'remove_button' => 'Rimuovi Banner',
            'closed'        => true,  // Repeater fields closed by default - neat & compact.
            'sortable'      => true,  // Allow changing the order of repeated groups.
        ),
    ) );

    $home_options->add_group_field( $bsnner_group_id, array(
        'name' => 'Banner',
        'id'   => 'banner',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Aggiungi file' // Change upload button text. Default: "Add or Upload File"
        ),
        'query_args' => array(
             'type' => array(
             	'image/gif',
             	'image/jpeg',
             	'image/png',
             ),
        ),
        'preview_size' => 'banner',
    ) );

    $home_options->add_group_field( $bsnner_group_id, array(
        'name' => 'Url di destinazione',
        'desc' => 'Url di destinazione (lasciare vuoto se non necessario)',
        'id'   => 'url',
        'type' => 'text_url',
    ) );

    $home_options->add_field( array(
        'id' => $prefix . 'home_istruzioni_2',
        'name'        => __( 'Sezione Servizi', 'design_scuole_italia' ),
        'desc' => __( 'Gestione sezione Servizi mostrati in home page' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $home_options->add_field(array(
        'id' => $prefix . 'home_is_selezione_automatica_servizi',
        'name' => __('Selezione Automatica', 'design_scuole_italia'),
        'desc' => __('Seleziona per mostrare automaticamente i servizi (mostra gli ultimi)', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'true',
        'options' => array(
            'true' => __('Si', 'design_scuole_italia'),
            'false' => __('No', 'design_scuole_italia'),
        ),
    ));

    $home_options->add_field(array(
            'name' => __('Selezione articoli ', 'design_scuole_italia'),
            'desc' => __('Seleziona gli articoli da mostrare in Home Page. NB: Selezionane 3 o multipli di 3 per evitare buchi nell\'impaginazione.  ', 'design_scuole_italia'),
            'id' => $prefix . 'home_servizi_manuali',
            'type'    => 'custom_attached_posts',
            'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
            'options' => array(
                'show_thumbnails' => false, // Show thumbnails on the left
                'filter_boxes'    => true, // Show a text box for filtering the results
                'query_args'      => array(
                    'posts_per_page' => -1,
                    'post_type'      => 'servizio',
                ), // override the get_posts args
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'home_is_selezione_automatica_servizi',
                'data-conditional-value' => "false",
            ),
        )
    );


    /**
	 * Registers options page "La Scuola".
	 */
	$args = array(
		'id'           => 'dsi_options_la_scuola',
		'title'        => esc_html__( 'La Scuola', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
        'capability'    => 'manage_options',
        'option_key'   => 'la_scuola',
		'tab_title'    => __('Scuola', "design_scuole_italia"),
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


    $scuola_landing_url = dsi_get_template_page_url("page-templates/la-scuola.php");

    $main_options->add_field( array(
        'id' => $prefix . 'scuola_istruzioni',
        'name'        => __( 'Sezione La Scuola', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.$scuola_landing_url.'">la pagina di panoramica della Scuola</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
        ) );


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
		'preview_size' => 'medium', // Image size to use when previewing in the admin.
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
		'type' => 'text_date_timestamp',
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

	$main_options->add_field( array(
		'name'        => __( 'Le Strutture', 'design_scuole_italia' ),
		'desc' => __('Organizzazione scolastica', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso_strutture_scuola',
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'descrizione_strutture',
		'title'        => __( 'Le Strutture', 'design_scuole_italia' ),
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'Es: Una scuola è fatta di persone. Ecco come siamo organizzati e come possiamo entrare in contatto' , 'design_scuole_italia' ),
		'type' => 'textarea_small',
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'link_strutture_evidenza',
		'name'    => __( 'Le Strutture', 'design_scuole_italia' ),
		'desc' => __( 'Seleziona qui le principali strutture organizzative (es: La Dirigenza, La segreteria, etc)  <a href="post-new.php?post_type=struttura">Qui puoi creare una struttura.</a> ' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => -1,
				'post_type'      => 'struttura',
			), // override the get_posts args
		),
	) );

/*
	$main_options->add_field( array(
		'name'        => __( 'Commissioni', 'design_scuole_italia' ),
		'desc' => __('Commissioni e Gruppi di Lavoro', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso_commissioni_scuola',
	) );


	$main_options->add_field( array(
		'id' => $prefix . 'link_strutture_commissioni',
		'name'    => __( 'Commissioni e Gruppi di Lavoro', 'design_scuole_italia' ),
		'desc' => __( 'Seleziona qui le principali strutture organizzative di tipo Commissione o Gruppo di lavoro.  <a href="post-new.php?post_type=struttura">Qui puoi creare una struttura.</a> ' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => -1,
				'post_type'      => 'struttura',
			), // override the get_posts args
		),
	) );
*/
	$main_options->add_field( array(
		'name'        => __( 'I Luoghi', 'design_scuole_italia' ),
		'desc' => __('Immagini dei luoghi della Scuola', 'design_scuole_italia' ),
		'type' => 'title',
		'id' => $prefix . 'prefisso_luoghi_storia',
	) );

	$main_options->add_field( array(
		'id' => $prefix . 'descrizione_gallery_luoghi',
		'title'        => __( 'I Luoghi', 'design_scuole_italia' ),
		'name'        => __( 'Descrizione', 'design_scuole_italia' ),
		'desc' => __( 'Es: Testo descrittivo dei luoghi della scuola' , 'design_scuole_italia' ),
		'type' => 'textarea_small',
	) );

	$main_options->add_field( array(
		'desc' => 'Una selezione di circa 5 immagini significative della scuola/istituto',
		'id'           => $prefix . 'immagini_luoghi',
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
				'posts_per_page' => -1,
				'post_type'      => 'documento',
			), // override the get_posts args
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
			'required'    => 'required',
            'maxlength' =>  140
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



    /**
     * Registers options page "Presentazione".
     */
    $args = array(
        'id'           => 'dsi_options_presentazione',
        'title'        => esc_html__( 'Presentazione', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'presentazione',
        'capability'    => 'manage_options',
        'tab_title'    => __('Presentazione', "design_scuole_italia"),
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',

    );

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $presentazione_options = new_cmb2_box( $args );
    $presentazione_landing_url = dsi_get_template_page_url("page-templates/presentazione.php");

    $presentazione_options->add_field( array(
        'id' => $prefix . 'presentazione_istruzioni',
        'name'        => __( 'Presenta la Scuola', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona i contenuti che meglio rappresentano l\'Istituto scolastico</a>. Saranno mostrati nella  <a href="'.$presentazione_landing_url.'"> pagina di Presentazione della Scuola</a>' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $presentazione_options->add_field(array(
            'name' => __('Selezione articoli ', 'design_scuole_italia'),
            'desc' => __('Seleziona gli articoli da mostrare nella pagina di Presentazione della Scuola.  ', 'design_scuole_italia'),
            'id' => $prefix . 'articoli_presentazione',
            'type'    => 'custom_attached_posts',
            'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
            'options' => array(
                'show_thumbnails' => false, // Show thumbnails on the left
                'filter_boxes'    => true, // Show a text box for filtering the results
                'query_args'      => array(
                    'posts_per_page' => -1,
                    'post_type'      => array('post', 'page', 'evento', 'documento', 'struttura', 'servizio','indirizzo'),
                ), // override the get_posts args
            )
        )
    );


	/**
	 * Registers Servizi option page.
	 */

	$args = array(
		'id'           => 'dsi_options_servizi',
		'title'        => esc_html__( 'I Servizi', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'servizi',
		'parent_slug'  => 'dsi_options',
        'capability'    => 'manage_options',
        'tab_group'    => 'dsi_options',
		'tab_title'    => __('Servizi', "design_scuole_italia"),	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$servizi_options = new_cmb2_box( $args );

    $servizi_landing_url = dsi_get_template_page_url("page-templates/servizi.php");
    $servizi_options->add_field( array(
        'id' => $prefix . 'servizi_istruzioni',
        'name'        => __( 'Sezione I Servizi', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.$servizi_landing_url.'">la pagina di panoramica dei Servizi</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $servizi_options->add_field( array(
		'id' => $prefix . 'testo_servizi',
		'name'        => __( 'Descrizione Sezione', 'design_scuole_italia' ),
		'desc' => __( 'es: "I servizi offerti dal liceo scientifico Enriques dedicati a tutti i genitori, studenti, personale ATA e docenti"' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'maxlength'  => '140'
		),
	) );

	$servizi_options->add_field( array(
			'name'       => __('Tipologie Servizi', 'design_scuole_italia' ),
			'desc' => __( 'Servizi aggregati per tipologie. Seleziona le tipologie da mostrare. ', 'design_scuole_italia' ),
			'id' => $prefix . 'tipologie_servizi',
			'type'    => 'pw_multiselect',
			'options' => dsi_get_tipologia_servizi_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona e ordina le tipologie di servizi da mostrare nella HomePage di sezione', 'design_scuole_italia' ),
			),
		)
	);


	/**
	 * Registers Notizie option page.
	 */

	$args = array(
		'id'           => 'dsi_options_notizie',
		'title'        => esc_html__( 'Le Novità', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'notizie',
        'capability'    => 'manage_options',
        'parent_slug'  => 'dsi_options',
		'tab_group'    => 'dsi_options',
		'tab_title'    => __('Novità', "design_scuole_italia"),	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$notizie_options = new_cmb2_box( $args );

    $notizie_landing_url = dsi_get_template_page_url("page-templates/notizie.php");
    $notizie_options->add_field( array(
        'id' => $prefix . 'notizie_istruzioni',
        'name'        => __( 'Sezione Le Novità', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.$notizie_landing_url.'">la pagina di panoramica delle Novità</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $notizie_options->add_field( array(
		'id' => $prefix . 'testo_notizie',
		'name'        => __( 'Descrizione Sezione', 'design_scuole_italia' ),
		'desc' => __( 'es: "Le notizie del liceo scientifico Enriques dedicate a tutti i genitori, studenti, personale ATA e docenti"' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'maxlength'  => '140'
		),
	) );

	$notizie_options->add_field( array(
			'name'       => __('Tipologie Articoli', 'design_scuole_italia' ),
			'desc' => __( 'Articoli aggregati per tipologie (es: articoli, circolari, notizie), . Seleziona le tipologie da mostrare. ', 'design_scuole_italia' ),
			'id' => $prefix . 'tipologie_notizie',
			'type'    => 'pw_multiselect',
			'options' => dsi_get_tipologia_articoli_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona e ordina le tipologie di articoli da mostrare nella HomePage di sezione', 'design_scuole_italia' ),
			),
		)
	);


	/**
	 * Registers Didattica option page.
	 */

	$args = array(
		'id'           => 'dsi_options_didattica',
		'title'        => esc_html__( 'La Didattica', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'didattica',
		'parent_slug'  => 'dsi_options',
		'tab_group'    => 'dsi_options',
        'capability'    => 'manage_options',
        'tab_title'    => __('Didattica', "design_scuole_italia"),	);

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

    $didattica_options = new_cmb2_box( $args );

    $didattica_landing_url = dsi_get_template_page_url("page-templates/didattica.php");
    $didattica_options->add_field( array(
        'id' => $prefix . 'didattica_istruzioni',
        'name'        => __( 'Sezione Didattica', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.$didattica_landing_url.'">la pagina di panoramica della Didattica</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );


/*
    $didattica_options->add_field( array(
        'id' => $prefix . 'testo_didattica',
        'name'        => __( 'Descrizione Sezione', 'design_scuole_italia' ),
        'desc' => __( 'es: "La didattica del liceo scientifico Enriques ' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '140'
        ),
    ) );
*/


    $didattica_options->add_field(  array(
        'id' => $prefix.'visualizzazione_didattica',
        'name'    => __( 'Seleziona il tipo di visualizzazione da mostrare nella didattica', 'design_scuole_italia' ),
        'desc' => __( 'Scegli se mostrare a sinistra le scuole e a destra gli indirizzi di studio, oppure se mostrare a sinistra gli indirizzi di studio e a destra le scuole che ne fanno parte' , 'design_scuole_italia' ),
        'type'    => 'radio_inline',
        'options' => array(
            'scuole' => __( 'Scuole / Percorsi', 'design_scuole_italia' ),
            'indirizzi'   => __( 'Indirizzi / Scuole', 'design_scuole_italia' ),
        ),
    ) );

    $didattica_options->add_field(  array(
        'id' => $prefix.'scuole_didattica',
        'name'    => __( 'Seleziona e ordina le scuole che vuoi mostrare nella sezione didattica', 'design_scuole_italia' ),
        'desc' => __( 'NB: La scuola è una Struttura organizzativa di tipologia "Scuola. Se non esiste creala prima <a href="edit.php?post_type=struttura">qui</a>"' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_strutture_scuole_options(),
        'attributes' => array(
           'data-conditional-id'    => $prefix . 'visualizzazione_didattica',
           'data-conditional-value' => 'scuole',
       ),
    ) );

    $didattica_options->add_field(  array(
        'id' => $prefix.'indirizzi_didattica',
        'name'    => __( 'Seleziona gli indirizzi di studio da mostrare nella sezione didattica', 'design_scuole_italia' ),
        'type'             => 'taxonomy_multicheck_hierarchy_child',
        'select_all_button' => false,
        'taxonomy'       => 'percorsi-di-studio',
        'remove_default' => 'true',
        'attributes' => array(
            'data-only-parent' => true,
            'data-conditional-id'    => $prefix . 'visualizzazione_didattica',
            'data-conditional-value' => 'indirizzi',
        ),
    ) );



/*
    $didattica_options->add_field( array(
        'id' => $prefix . 'testo_sezione_progetti',
        'name'        => __( 'Descrizione Sezione Progetti', 'design_scuole_italia' ),
        'desc' => __( 'es: "Scopri i progetti della scuola divisi per anno scolastico e per materia' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '140'
        ),
    ) );
*/

    /**
     * Persone
     */

    $args = array(
        'id'           => 'dsi_options_persone',
        'title'        => esc_html__( 'Persone', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'persone',
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'capability'    => 'manage_options',
        'tab_title'    => __('Persone', "design_scuole_italia"),	);

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $persone_options = new_cmb2_box( $args );

    $persone_landing_url = dsi_get_template_page_url("page-templates/persone.php");
    $persone_options->add_field( array(
        'id' => $prefix . 'persone_istruzioni',
        'name'        => __( 'Sezione Persone', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.$persone_landing_url.'">la pagina delle Persone</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );


    $persone_options->add_field( array(
        'id' => $prefix . 'testo_sezione_persone',
        'name'        => __( 'Descrizione Sezione Persone', 'design_scuole_italia' ),
        'desc' => __( 'es: "Le persone del liceo scientifico xxx, insegnanti, personale ATA e docenti' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '140'
        ),
    ) );

    $persone_options->add_field( array(
        'id' => $prefix . 'strutture_persone',
        'name'        => __( 'Seleziona e ordina le strutture organizzative a cui fanno capo le persone', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona le strutture organizzative di cui vuoi mostrare le persone. <a href="'.$persone_landing_url.'">La pagina con la lista delle persone sarà popolata automaticamente</a>. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_strutture_options(),
        'attributes' => array(
            'placeholder' =>  __( 'Seleziona e ordina le strutture di cui mostrare le persone', 'design_scuole_italia' ),
        ),
    ) );


    /**
     * Organizzazione
     */

    $args = array(
        'id'           => 'dsi_options_organizzazione',
        'title'        => esc_html__( 'Organizzazione', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'organizzazione',
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'capability'    => 'manage_options',
        'tab_title'    => __('Organizzazione', "design_scuole_italia"),	);

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $organizzazione_options = new_cmb2_box( $args );

    $organizzazione_options->add_field( array(
        'id' => $prefix . 'organizzazione_istruzioni',
        'name'        => __( 'Sezione Organizzazione', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.get_post_type_archive_link("struttura").'">la pagina dell\'Organizzazione scolastica</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $organizzazione_options->add_field( array(
        'id' => $prefix . 'testo_sezione_organizzazione',
        'name'        => __( 'Descrizione Sezione Organizzazione', 'design_scuole_italia' ),
        'desc' => __( 'es: "Questa la nostra organizzazione scolastica"' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '140'
        ),
    ) );

    $organizzazione_options->add_field( array(
        'id' => $prefix . 'strutture_organizzazione',
        'name'        => __( 'Seleziona e ordina le tipologie di strutture organizzative da mostrare', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona le tipologie di strutture organizzative di cui vuoi mostrare. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_tipologie_strutture_options(),
        'attributes' => array(
            'placeholder' =>  __( 'Seleziona e ordina le tipologie di strutture da mostrare nella pagina Organizzazione', 'design_scuole_italia' ),
        ),
    ) );



    /**
     * Luoghi
     */

    $args = array(
        'id'           => 'dsi_options_luoghi',
        'title'        => esc_html__( 'Luoghi', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'luoghi',
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'capability'    => 'manage_options',
        'tab_title'    => __('Luoghi', "design_scuole_italia"),	);

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $luoghi_options = new_cmb2_box( $args );

    $luoghi_options->add_field( array(
        'id' => $prefix . 'luoghi_istruzioni',
        'name'        => __( 'Sezione Luoghi', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.get_post_type_archive_link("luogo").'">la pagina dei luoghi scolastici</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $luoghi_options->add_field( array(
        'id' => $prefix . 'testo_sezione_luoghi',
        'name'        => __( 'Descrizione Sezione Luoghi', 'design_scuole_italia' ),
        'desc' => __( 'es: "Questi i luoghi della scuola"' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '140'
        ),
    ) );

    $luoghi_options->add_field( array(
        'id' => $prefix . 'strutture_luoghi',
        'name'        => __( 'Seleziona e ordina le tipologie di luoghi  da mostrare', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona le tipologie di luoghi che vuoi mostrare. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_tipologie_luoghi_options(),
        'attributes' => array(
            'placeholder' =>  __( ' Seleziona e ordina le tipologie di luoghi da mostrare nella pagina Luoghi', 'design_scuole_italia' ),
        ),
    ) );

    $luoghi_options->add_field(array(
        'id' => $prefix . 'posizione_mappa',
        'name' => __('Visualizza mappa', 'design_scuole_italia'),
        'desc' => __('Seleziona <b>Si</b> per visualizzare la mappa nella pagina di elenco dei luoghi.', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'true',
        'options' => array(
            'true' => __('Si', 'design_scuole_italia'),
            'false' => __('No', 'design_scuole_italia'),
        ),
    ));

    $luoghi_options->add_field( array(
        'id' => $prefix . 'luogho_istruzioni',
        'name'        => __( 'Dettaglio Luogo', 'design_scuole_italia' ),
        'desc' => __( 'Specifica le opzioni di visualizzazione per il dettaglio del singolo luogo.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $luoghi_options->add_field( array(
        'id' => $prefix . 'excerpt_length',
        'name'        => __( 'Testo elementi di interesse *', 'design_scuole_italia' ),
        'desc' => __('Specificare la lunghezzadi default, in caratteri, per il testo descrittivo degli elmenti di interesse oltre la quale il testo verrà nascosto', 'design_scuole_italia' ),
        'type' => 'text_small',
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
            'required'    => 'required',
            'min' => 60
        ),
        'sanitization_cb' => 'absint',
        'escape_cb'       => 'absint',
    ) );


    /**
     * Documenti
     */

    $args = array(
        'id'           => 'dsi_options_documenti',
        'title'        => esc_html__( 'Documenti', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'documenti',
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'capability'    => 'manage_options',
        'tab_title'    => __('Documenti', "design_scuole_italia"),	);

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $luoghi_options = new_cmb2_box( $args );

    $luoghi_options->add_field( array(
        'id' => $prefix . 'documenti_istruzioni',
        'name'        => __( 'Sezione Documenti', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui le informazioni utili a popolare <a href="'.get_post_type_archive_link("documento").'">la pagina dei documenti scolastici</a>.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $luoghi_options->add_field( array(
        'id' => $prefix . 'testo_sezione_documenti',
        'name'        => __( 'Descrizione Sezione Documenti', 'design_scuole_italia' ),
        'desc' => __( 'es: "Questi i documenti della scuola"' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '140'
        ),
    ) );

    $luoghi_options->add_field( array(
        'id' => $prefix . 'strutture_documenti',
        'name'        => __( 'Seleziona e ordina le tipologie di documenti  da mostrare', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona le tipologie di documenti che vuoi mostrare. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_tipologie_documenti_options(),
        'attributes' => array(
            'placeholder' =>  __( 'Seleziona e ordina le tipologie di documenti da mostrare nella pagina Documenti', 'design_scuole_italia' ),
        ),
    ) );

    // pagina opzioni
    /**
     * Registers main options page menu item and form.
     */
    $args = array(
        'id'           => 'dsi_login_menu',
        'title'        => esc_html__( 'Login', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'login',
        'tab_title'    => __('Servizi esterni', "design_scuole_italia"),
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'capability'    => 'manage_options',
    );

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $login_options = new_cmb2_box( $args );

    $login_options->add_field( array(
        'id' => $prefix . 'login_istruzioni',
        'name'        => __( 'Servizi esterni: informazioni di login', 'design_scuole_italia' ),
        'desc' => __( 'Area di configurazione dei link di login ai servizi esterni, da mostrare nella maschera di login .' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $login_options->add_field( array(
        'id' => $prefix . 'login_messaggio',
        'name' => 'Testo da mostrare nell\'area di login',
        'type' => 'textarea',
        'default' => 'Da qui puoi accedere ai diversi servizi della scuola che richiedono una autenticazione personale.',
    ) );


    $timeline_group_id = $login_options->add_field( array(
        'id'           => $prefix . 'link_esterni',
        'type'        => 'group',
        'name'        => 'Link servizi esterni',
        'desc' => __( 'Definisci tutti i servizi esterni che vuoi mostrare agli utenti in fase di login.' , 'design_scuole_italia' ),
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => __( 'Link {#}', 'design_scuole_italia' ),
            'add_button'    => __( 'Aggiungi un elemento', 'design_scuole_italia' ),
            'remove_button' => __( 'Rimuovi l\'elemento ', 'design_scuole_italia' ),
            'sortable'      => true,  // Allow changing the order of repeated groups.
        ),
    ) );

    $login_options->add_group_field( $timeline_group_id, array(
        'id' => $prefix . 'nome_link',
        'name'        => __( 'Nome Servizio', 'design_scuole_italia' ),
        'type' => 'text',
    ) );

    $login_options->add_group_field( $timeline_group_id, array(
        'id' => $prefix . 'url_link',
        'name'        => __( 'Link Servizio', 'design_scuole_italia' ),
        'type' => 'text_url',
    ) );


    /**
     * Registers options page "Socials".
     */

    $args = array(
        'id'           => 'dsi_options_socials',
        'title'        => esc_html__( 'Socialmedia', 'design_scuole_italia' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'socials',
        'capability'    => 'manage_options',
        'parent_slug'  => 'dsi_options',
        'tab_group'    => 'dsi_options',
        'tab_title'    => __('Socialmedia', "design_scuole_italia"),	);

    // 'tab_group' property is supported in > 2.4.0.
    if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
        $args['display_cb'] = 'dsi_options_display_with_tabs';
    }

    $social_options = new_cmb2_box( $args );

    $social_options->add_field( array(
        'id' => $prefix . 'socials_istruzioni',
        'name'        => __( 'Sezione socialmedia', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui i link ai tuoi socialmedia.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $social_options->add_field(array(
        'id' => $prefix . 'show_socials',
        'name' => __('Mostra le icone social', 'design_scuole_italia'),
        'desc' => __('Abilita la visualizzazione dei socialmedia nell\'header e nel footer della pagina.', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'false',
        'options' => array(
            'true' => __('Si', 'design_scuole_italia'),
            'false' => __('No', 'design_scuole_italia'),
        ),
        'attributes' => array(
            'data-conditional-value' => "false",
        ),
    ));

    $social_options->add_field( array(
        'id' => $prefix . 'facebook',
        'name' => 'Facebook',
        'type' => 'text_url',
    ) );

    $social_options->add_field( array(
        'id' => $prefix . 'youtube',
        'name' => 'Youtube',
        'type' => 'text_url',
    ) );
    
    $social_options->add_field( array(
        'id' => $prefix . 'instagram',
        'name' => 'Instagram',
        'type' => 'text_url',
    ) );

    $social_options->add_field( array(
        'id' => $prefix . 'twitter',
        'name' => 'Twitter',
        'type' => 'text_url',
    ) );

    $social_options->add_field( array(
        'id' => $prefix . 'linkedin',
        'name' => 'Linkedin',
        'type' => 'text_url',
    ) );

    $social_options->add_field( array(
        'id' => $prefix . 'telegram',
        'name' => 'Telegram',
        'type' => 'text_url',
    ) );


    // pagina opzioni
	/**
	 * Registers main options page menu item and form.
	 */
	$args = array(
		'id'           => 'dsi_setup_menu',
		'title'        => esc_html__( 'Altro', 'design_scuole_italia' ),
		'object_types' => array( 'options-page' ),
		'option_key'   => 'setup',
		'tab_title'    => __('Altro', "design_scuole_italia"),
		'parent_slug'  => 'dsi_options',
		'tab_group'    => 'dsi_options',
        'capability'    => 'manage_options',
    );

	// 'tab_group' property is supported in > 2.4.0.
	if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
		$args['display_cb'] = 'dsi_options_display_with_tabs';
	}

	$setup_options = new_cmb2_box( $args );

    $setup_options->add_field( array(
        'id' => $prefix . 'footer_options',
        'name'        => __( 'Footer', 'design_scuole_italia' ),
        'desc' => __( 'Area di configurazione del testo da inserire nel footer delle scuole.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'footer_text',
        'name' => 'Testo Footer',
        'desc' => __( 'Inserisci nel footer l\'indirizzo, il codice meccanografico, il codice IPA, il codice Fiscale e il CUF ', 'design_scuole_italia' ),
        'type' => 'textarea'
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'altro_istruzioni',
        'name'        => __( 'Altre Informazioni', 'design_scuole_italia' ),
        'desc' => __( 'Area di configurazione delle opzioni generali del tema.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

	$setup_options->add_field( array(
		'id' => $prefix . 'mapbox_key',
		'name' => 'Access Token MapBox',
		'desc' => __( 'Inserisci l\'access token mapbox per l\'erogazione delle mappe. Puoi crearlo <a target="_blank" href="https://www.mapbox.com/studio/account/tokens/">da qui</a>', 'design_scuole_italia' ),
		'type' => 'text'
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'mail_circolari',
        'name'        => __( 'Configurazione email Circolari', 'design_scuole_italia' ),
        'desc' => __( 'Area di configurazione della mail inviata in caso di assegnazione di una circolare.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'mail_circolare_non_inviare',
        'name' => __('DIsabilita le notifiche email', 'design_scuole_italia' ),
        'type' => 'checkbox',
        'default' => false,
        'description' => __('Selezionando questa opzione <b>NESSUNA email</b> verrà inviata per le circolari in <b>NESSUN caso</b>.', 'design_scuole_italia' )
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'mail_circolare_oggetto',
        'name' => 'Oggetto della mail',
        'type' => 'text',
        'default' => 'Nuova circolare dalla scuola '.dsi_get_option("nome_scuola")
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'mail_circolare_messaggio',
        'name' => 'Messaggio della mail',
        'type' => 'textarea',
        'default' => 'Hai ricevuto una nuova circolare. Accedi alla tua bacheca personale per prenderne visione ',
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'altro_scadenza_albo',
        'name'        => __( 'Scadenza Albo', 'design_scuole_italia' ),
        'desc' => __( 'Configura la data di scadenza dei documenti di tipo Albo.' , 'design_scuole_italia' ),
        'type' => 'title',
    ) );

    $setup_options->add_field( array(
        'id' => $prefix . 'giorni_scadenza',
        'name' => 'Durata in giorni atti Albo ',
        'desc' => __( '<br>Se ad un documento di tipo albo non viene inserita una data di scadenza, valorizzando questo campo questa sarà impostata automaticamente a X giorni dalla pubblicazione', 'design_scuole_italia' ),
        'type' => 'text_small',
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
            'min' => 0,
        ),
        'sanitization_cb' => 'dsi_sanitize_int',
        'escape_cb'       => 'dsi_sanitize_int',
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

        <div class="cmb2-options-box">
            <div class="nav-tab-wrapper">
                <?php foreach ( $tabs as $option_key => $tab_title ) : ?>
                    <a class="nav-tab<?php if ( isset( $_GET['page'] ) && $option_key === $_GET['page'] ) : ?> nav-tab-active<?php endif; ?>" href="<?php menu_page_url( $option_key ); ?>"><?php echo wp_kses_post( $tab_title ); ?></a>
                <?php endforeach; ?>
            </div>

            <form class="cmb-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="<?php echo $cmb_options->cmb->cmb_id; ?>" enctype="multipart/form-data" encoding="multipart/form-data">
                <fieldset class="form-content">
                    <input type="hidden" name="action" value="<?php echo esc_attr( $cmb_options->option_key ); ?>">
                    <?php $cmb_options->options_page_metabox(); ?>
                </fieldset>

                <fieldset class="form-footer">
                    <div class="submit-box"><?php submit_button( esc_attr( $cmb_options->cmb->prop( 'save_button' ) ), 'primary', 'submit-cmb', false ); ?></div>
                </fieldset>
            </form>

            <div class="clear-form"></div>
        </div>
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


function dsi_options_assets() {
    $current_screen = get_current_screen();

    if(strpos($current_screen->id, 'configurazione_page_') !== false || $current_screen->id === 'toplevel_page_dsi_options') {
        wp_enqueue_style( 'dsi_options_dialog', get_stylesheet_directory_uri() . '/inc/admin-css/jquery-ui.css' );
        wp_enqueue_script( 'dsi_options_dialog', get_stylesheet_directory_uri() . '/inc/admin-js/options.js', array('jquery', 'jquery-ui-core', 'jquery-ui-dialog'), '1.0', true );
    }
}
add_action( 'admin_enqueue_scripts', 'dsi_options_assets' );

if (! wp_next_scheduled ( 'dsi_cron_options' )) {
    wp_schedule_event(time(), 'daily', 'dsi_cron_options');
}
add_action('dsi_cron_options', 'dsi_check_cron_options');

function dsi_check_cron_options() {
    $update = false;
    $messages = dsi_get_option( "messages", "home_messages" );

    foreach ($messages as $key => $message) {
        $message_date = strtotime($message['data_message']);
        $now = strtotime("now");
        if($message_date <= $now) {
            $update = true;
            unset($messages[$key]);
        }
    }

    if($update) {
        $to_update['messages'] = array_values($messages);
        update_option('home_messages', $to_update, true);
    }
}
