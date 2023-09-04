<?php

/**
 * Definisce post type e tassonomie relative ai servizi
 */
add_action( 'init', 'dsi_register_servizio_post_type', -10 );
function dsi_register_servizio_post_type() {

	/** servizio **/
	$labels = array(
		'name'                  => _x( 'Servizi', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name'         => _x( 'Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'               => _x( 'Aggiungi un Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'               => _x( 'Aggiungi un Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'featured_image' => __( 'Logo Identificativo del Servizio', 'design_scuole_italia' ),
		'edit_item'      => _x( 'Modifica il Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'view_item'      => _x( 'Visualizza il Servizio', 'Post Type Singular Name', 'design_scuole_italia' ),
		'set_featured_image' => __( 'Seleziona Logo' ),
		'remove_featured_image' => __( 'Rimuovi Logo' , 'design_scuole_italia' ),
		'use_featured_image' => __( 'Usa come Logo' , 'design_scuole_italia' ),
	);
	$args = array(
		'label'                 => __( 'Servizio', 'design_scuole_italia' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
//		'taxonomies'            => array( 'tipologia' ),
		'hierarchical'          => false,
		'public'                => true,
		'menu_position'         => 2,
		'menu_icon'             => 'dashicons-id-alt',
		'has_archive'           => true,
        'capability_type' => array('servizio', 'servizi'),
        'map_meta_cap'    => true,
        'description'    => __( "I servizi che la scuola mette a disposizione di tutti.", 'design_scuole_italia' ),
	);
	register_post_type( 'servizio', $args );

	$labels = array(
		'name'              => _x( 'Tipologia Servizio', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Tipologia Servizio', 'taxonomy singular name', 'design_scuole_italia' ),
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
		'rewrite'           => array( 'slug' => 'tipologia-servizio' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_servizi',
            'edit_terms'    => 'edit_tipologia_servizi',
            'delete_terms'  => 'delete_tipologia_servizi',
            'assign_terms'  => 'assign_tipologia_servizi'
        )
	);

	register_taxonomy( 'tipologia-servizio', array( 'servizio' ), $args );


}


/**
 * Crea i metabox del post type servizi
 */
add_action( 'cmb2_init', 'dsi_add_servizi_metaboxes' );
function dsi_add_servizi_metaboxes() {

	$prefix = '_dsi_servizio_';

	/**
	 * Stato del servizio
	 */
	$cmb_stato = new_cmb2_box( array(
		'id'           => $prefix . 'box_stato',
		'title'        => __( 'Stato del Servizio', 'design_scuole_italia' ),
		'object_types' => array( 'servizio' ),
		'context'      => 'side',
		'priority'     => 'core',
	) );

	$cmb_stato->add_field( array(
		'id' => $prefix . 'stato',
		'desc' => __( 'Lo stato del servizio indica l\'effettiva fruibilità del Servizio', 'design_scuole_italia' ),
		'type' => 'radio_inline',
		'default' => 'true',
		'options' => array(
			"true" => __( 'Attivo', 'design_scuole_italia' ),
			"false" => __( 'Disattivo', 'design_scuole_italia' ),
		),
	) );


	// conditional field
	$cmb_stato->add_field(array(
		'id' => $prefix . 'desc_stato',
		'name' => __( 'Motivo', 'design_scuole_italia' ),
		'desc' => __( 'Descrizione testuale del motivo per cui un servizio non è attivo. Es. Servizio momentaneamente disattivato perché....Servizio attivo dal...', 'design_scuole_italia' ),
		'type' => 'textarea_small',
		'attributes'    => array(
			'data-conditional-id'     => $prefix.'stato',
			'data-conditional-value'  => "false",
		),
	) );


	$cmb_sottotitolo = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
//		'title'        => __( 'Sottotitolo', 'design_scuole_italia' ),
		'object_types' => array( 'servizio' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );

	
	$cmb_sottotitolo->add_field( array(
		'id' => $prefix . 'sottotitolo',
		'name'        => __( 'Sottotitolo', 'design_scuole_italia' ),
		'desc' => __( 'Indica un sottotitolo che può avere il Servizio, oppure un nome che identifica informalmente il Servizio.' , 'design_scuole_italia' ),
		'type' => 'text',
	) );

    $cmb_sottotitolo->add_field( array(
        'id' => $prefix . 'tipologia',
        'name'        => __( 'Tipologia servizio', 'design_scuole_italia' ),
        'type'             => 'taxonomy_radio_inline',
        'taxonomy'       => 'tipologia-servizio',
        'remove_default' => 'true'
    ) );



	$cmb_sottotitolo->add_field( array(
		'id' => $prefix . 'descrizione',
		'name'        => __( 'Descrizione *', 'design_scuole_italia' ),
		'desc' => __( 'Indicare una sintetica descrizione del Servizio (max 160 caratteri) utilizzando un linguaggio semplice che possa aiutare qualsiasi utente a identificare con chiarezza il Servizio. Non utilizzare un linguaggio ricco di riferimenti normativi. Vincoli: 160 caratteri spazi inclusi.' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'maxlength'  => '160',
			'required'    => 'required'
		),
	) );



	$cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_servizio',
		'title'         => __( 'Dettagli Servizio', 'design_scuole_italia' ),
		'object_types' => array( 'servizio' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'esito',
		'name'        => __( 'A cosa serve', 'design_scuole_italia' ),
		'desc' => __( 'Indicare uno o più output prodotti dal servizio. Ad es.: " Questo servizio ti permette l\'iscrizione al servizio mensa".<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.' , 'design_scuole_italia' ),
        'type' => 'wysiwyg',
        'options' => array(
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => 4, // rows="..."
            'teeny' => true, // output the minimal editor config used in Press This
        ),

	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'come_si_fa',
		'name'        => __( 'Come si accede al servizio', 'design_scuole_italia' ),
		'desc' => __( 'Indica la procedura - on line e/o attraverso una delle sedi indicate - da seguire per usufruire del servizio. Es. "per iscriverti al servizio mensa puoi utilizzare il servizio on line oppure andare in una delle sedi indicate qui sotto".<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.' , 'design_scuole_italia' ),
        'type' => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
	) );

/*
    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'canale_fisico_prenotazione',
        'name'        => __( 'Link prenotazione', 'design_scuole_italia' ),
        'desc' => __( 'es: se il servizio è prenotabile, link al servizio di prenotazione ' , 'design_scuole_italia' ),
        'type' => 'text_url'
    ) );
*/
	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'procedura_esito',
		'name'        => __( 'Procedure collegate', 'design_scuole_italia' ),
		'desc' => __( 'Questo campo indica eventuali procedure collegate al servizio. Ad es., se il servizio è l\'iscrizione al servizio mensa, si spiega che ogni 3 mesi si dovrà procedere al pagamento dei pasti utilizzando il servizio on line oppure attraverso il bollettino postale.' , 'design_scuole_italia' ),
		'type' => 'textarea'
	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'canale_digitale',
		'name'        => __( 'Servizi on line', 'design_scuole_italia' ),
		'desc' => __( 'Link per avviare la procedura di attivazione del servizio. Questo campo mette in relazione "Servizio" con il suo canale digitale di attivazione. Es. "Per richiedere il servizio mensa utilizza la procedura on line prevista nel sito del Comune X (link)".<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.' , 'design_scuole_italia' ),
		'type' => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),

	) );

	$cmb_undercontent->add_field( array(
        'id' => $prefix . 'canale_digitale_label',
        'name'        => __( 'Azione', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona l\'azione prevista nel link che segue.' , 'design_scuole_italia' ),
        'type' => 'select',
        'options' => array(
            "Vai al sito" => "Vai al sito",
            "Compila" => "Compila",
            "Scarica" => "Scarica",
            "Registrati" => "Registrati",
            "Prenota" => "Prenota",
            "Iscriviti" => "Iscriviti",
            "Accedi" => "Accedi",
            "Visualizza" => "Visualizza"
        )
    ) );

    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'canale_digitale_link',
        'name'        => __( 'Link', 'design_scuole_italia' ),
        'desc' => __( 'Link per avviare la procedura online.' , 'design_scuole_italia' ),
        'type' => 'text_url'
    ) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'autenticazione',
		'name'        => __( 'Autenticazione', 'design_scuole_italia' ),
		'desc' => __( 'Indicare, se previste, le modalità di autenticazione necessarie. Ad es. "Per attivare il servizio mensa dovrai iscriverti al sito del Comune. L\'iscrizione è possibile anche attraverso spid.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie."' , 'design_scuole_italia' ),
		'type' => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),

	) );

	$cmb_undercontent->add_field( array(
        'id'   => $prefix . 'modalita_autenticazione',
        'name' => __( 'Modalità di autenticazione', 'design_scuole_italia' ),
        'desc' => __( 'Mostra eventuali modalità di autenticazione per accedere al servizio. Per la loro corretta visualizzazione, è necessario aver inserito una descrizione nel campo “Autenticazione”.' , 'design_scuole_italia' ),
        'type' => 'checkbox',
    ) );
    $cmb_undercontent->add_field(array(
        'id' => $prefix . 'provider_autenticazione',
        'name'        => __( 'Provider di autenticazione', 'design_scuole_italia' ),
        'desc' => __( 'Selezionare i provider di autenticazione tra SPID, Carta di Identità Elettronica (CIE) e Carta Nazionale dei Servizi (CNS).' , 'design_scuole_italia' ),
        'type' => 'pw_multiselect',
        'options' => array(
            'SPID' => 'SPID',
            'CIE' => 'CIE',
            'CNS' => 'CNS'
        ),
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'modalita_autenticazione',
            'data-conditional-value'  => "false",
        ),
    ) );

    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'struttura_responsabile',
        'name'        => __( 'Struttura responsabile del servizio', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona la struttura responsabile del servizio ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_strutture_options(),
    ) );


    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'scuola_responsabile',
        'name'        => __( 'Scuola a cui il servizio appartiene', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona la scuola a cui il servizio appartiene ' , 'design_scuole_italia' ),
        'type'    => 'pw_select',
        'options' => dsi_get_strutture_scuole_options(),
    ) );



    $cmb_undercontent->add_field( array(
        'id'         => $prefix . 'servizi_correlati',
        'name'       => __( 'Servizi correlati', 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_servizi_options(),
    ) );

    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'luoghi',
        'name'    => __( 'Selezione i <a href="edit.php?post_type=luogo">luoghi</a> in cui vengono erogati i servizi', 'design_scuole_italia' ),
        'desc' => __( 'In caso di servizio erogato in più luoghi, crea una sede per ogni luogo. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_luoghi_options(),
    ) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'cosa_serve',
		'name'        => __( 'Cosa Serve (testo introduttivo) * ', 'design_scuole_italia' ),
		'desc' => __( 'es: "Per attivare il servizio bisogna prima compilare il modulo on line oppure stampare e compilare il modulo cartaceo che trovi nella sezione documenti di questa pagina. [Vai alla sezione documenti]" Per creare un link mediante ancora inserisci #art-par-documenti come valore del link.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.', 'design_scuole_italia' ),
		'type'    => 'wysiwyg',
		'attributes'    => array(
			'required'    => 'required'
		),
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),

	) );


    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'cosa_serve_list',
        'name'        => __( 'Cosa Serve (lista)', 'design_scuole_italia' ),
        'desc' => __( 'la lista di cosa serve' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'repeatable'  => true
    ) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'fasi_scadenze_intro',
		'name'        => __( 'Fasi e scadenze (testo introduttivo) * ', 'design_scuole_italia' ),
		'desc' => __( 'es: "Per elaborare la richiesta sono necessari 4 giorni".', 'design_scuole_italia' ),
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),

	) );

    /**  repeater fasi_scadenze **/
	$group_field_id = $cmb_undercontent->add_field( array(
		'id'          => $prefix . 'fasi_scadenze',
		'name'        => __('<h1>Fasi e Scadenze</h1>', 'design_scuole_italia' ),
		'type'        => 'group',
		'description' => __( 'Prevedere una data di scadenza del Servizio (ad es. "iscrizione asilo nido entro..."). Se il Servizio è diviso in fasi, prevedere un campo per ciascuna fase del Servizio e relativa indicazione dei tempi " - data)', 'design_scuole_italia' ),
		'options'     => array(
			'group_title'    => __( 'Fase {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
			'add_button'     => __( 'Aggiungi una fase', 'design_scuole_italia' ),
			'remove_button'  => __( 'Rimuovi la fase', 'design_scuole_italia' ),
			'sortable'       => true,
			// 'closed'      => true, // true to have the groups closed by default
			//'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

    $cmb_undercontent->add_group_field( $group_field_id, array(
        'name'       => __('Titolo', 'design_scuole_italia' ),
        'desc'       => __('Esempio: "Iscrizione alla gita" oppure "Pagamento della gita"', 'design_scuole_italia' ),
        'id'         => 'titolo_fase',
        'type'       => 'text',
    ) );
	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Data', 'design_scuole_italia' ),
		'desc'       => __('Data della fase', 'design_scuole_italia' ),
		'id'         => 'data_fase',
		'type'       => 'text_date',
		'date_format' => 'd-m-Y'
	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Descrizione', 'design_scuole_italia' ),
		'id'         => 'desc_fase',
		'type'       => 'textarea',
	) );
	/*** fine fasi e scadenze **/

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'casi_particolari',
		'name'        => __( 'Casi particolari', 'design_scuole_italia' ),
		'desc' => __( 'Inserire come testo libero, eventuali casi particolari riferiti all\'ottenimento del Servizio in questione. Es. Le persone con disabilità (legge 104) possono contattare direttamente l\'ufficio e concordare una procedura di rinnovo a domicilio' , 'design_scuole_italia' ),
		'type' => 'textarea',

	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'altre_info',
		'name'        => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
		'desc' => __( 'Ulteriori informazioni sul Servizio, FAQ ed eventuali riferimenti normativi.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.' , 'design_scuole_italia' ),
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),

	) );

	$cmb_undercontent->add_field( array(
        'id'   => $prefix . 'contatti_dedicati',
        'name' => __( 'Modalità di contatto', 'design_scuole_italia' ),
        'desc' => __( 'Sono presenti contatti dedicati per il servizio. In caso contrario vengono mostrati in automatico i contatti (email e telefono) dell\'ufficio relazioni con il pubblico (URP) inseriti in Configurazione' , 'design_scuole_italia' ),
        'type' => 'checkbox',
    ) );

    $cmb_undercontent->add_field( array(
        'id'         => $prefix . 'mail',
        'name'       => __( 'Riferimento email', 'design_scuole_italia' ),
        'desc'       => __( 'Indirizzo di posta elettronica del servizio. ', 'design_scuole_italia' ),
        'type'       => 'text_email',
    	'attributes'    => array(
            'data-conditional-id'     => $prefix.'contatti_dedicati',
            'data-conditional-value'  => "true",
        ),
    ) );


    $cmb_undercontent->add_field( array(
        'id'         => $prefix . 'telefono',
        'name'       => __( 'Riferimento telefonico ', 'design_scuole_italia' ),
        'desc'       => __( 'Telefono del servizio. ', 'design_scuole_italia' ),
        'type'       => 'text',
    	'attributes'    => array(
            'data-conditional-id'     => $prefix.'contatti_dedicati',
            'data-conditional-value'  => "true",
        ),
    ) );


    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'link_schede_progetti',
        'name'    => __( 'Progetti ', 'design_scuole_italia' ),
        'before' => __( '<p>Link alle schede progetti gestite dalla struttura. </p>' , 'design_scuole_italia' ),
        'type'    => 'custom_attached_posts',
        'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
        'options' => array(
            'show_thumbnails' => false, // Show thumbnails on the left
            'filter_boxes'    => true, // Show a text box for filtering the results
            'query_args'      => array(
                'posts_per_page' => -1,
                'post_type'      => 'scheda_progetto',
            ), // override the get_posts args
        ),
    ) );


    $cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_schede_documenti',
		'name'    => __( 'Documenti', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci qui tutti i documenti che ritieni utili per attivare il servizio: moduli da compilare, riferimenti di legge e altre informazioni. Se devi caricare il documento <a href="post-new.php?post_type=documento">puoi creare una breve scheda di presentazione</a> (soluzione consigliata e più efficace per gli utenti del sito) oppure caricarlo direttamente nei campi che seguono. ' , 'design_scuole_italia' ),
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
		'desc' => __( 'Se l\'allegato non è descritto da una scheda documento, link all\'allegato (es. link a una locandina). ' , 'design_scuole_italia' ),
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

	$cmb_ipa = new_cmb2_box( array(
		'id'           => $prefix . 'box_ipa',
		'title'        => __( 'Codice dell’Ente Erogatore (ipa)', 'design_scuole_italia' ),
		'object_types' => array( 'servizio' ),
		'context'      => 'side',
		'priority'     => 'low',
	) );

	$cmb_ipa->add_field( array(
		'id' => $prefix . 'ipa',
		'desc' => __( 'Specificare il nome dell’organizzazione, come indicato nell’Indice della Pubblica Amministrazione (IPA), che esercita uno specifico ruolo sul Servizio.', 'design_scuole_italia' ),
		'type' => 'text'
	) );



}

/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_servizio_add_content_after_title' );
function sdi_servizio_add_content_after_title($post) {
if($post->post_type == "servizio")
	_e('<span><i>il <b>Titolo</b> è il <b>Nome del Servizio</b>. Il nome del Servizio deve essere facilmente comprensibile dai cittadini. Vincoli: massimo 60 caratteri spazi inclusi</i></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_servizio_add_content_before_editor', 100 );
function sdi_servizio_add_content_before_editor($post) {
	if($post->post_type == "servizio")
		_e('<h1>Descrizione Estesa e Completa del Servizio</h1>', 'design_scuole_italia' );
}

/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_servizio_add_content_after_editor', 100 );
function sdi_servizio_add_content_after_editor($post) {
    if($post->post_type == "servizio")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}



// relazione bidirezionale struttura / servizi
new dsi_bidirectional_cmb2("_dsi_servizio_", "servizio", "struttura_responsabile", "box_elementi_servizio", "_dsi_struttura_link_schede_servizi");

// relazione bidirezionale  servizi / luogo
new dsi_bidirectional_cmb2("_dsi_servizio_", "servizio", "luoghi", "box_elementi_servizio", "_dsi_luogo_servizi_presenti");

// relazione bidirezionale servizio / documento
new dsi_bidirectional_cmb2("_dsi_servizio_", "servizio", "link_schede_documenti", "box_elementi_servizio", "_dsi_documento_servizi_collegati");

// relazione bidirezionale progetti / servizi
new dsi_bidirectional_cmb2("_dsi_servizio_", "servizio", "link_schede_progetti", "box_elementi_servizio", "_dsi_scheda_progetto_link_schede_servizi");


/**
 * aggiungo js per condizionale parent
 */
add_action( 'admin_print_scripts-post-new.php', 'dsi_servizio_admin_script', 11 );
add_action( 'admin_print_scripts-post.php', 'dsi_servizio_admin_script', 11 );

function dsi_servizio_admin_script() {
    global $post_type;
    if( 'servizio' == $post_type )
        wp_enqueue_script( 'struttura-admin-script', get_template_directory_uri() . '/inc/admin-js/servizio.js' );
}