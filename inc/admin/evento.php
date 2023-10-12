<?php

/**
 * Definisce post type e tassonomie relative ad un evento
 */
add_action( 'init', 'dsi_register_evento_post_type', 0 );
function dsi_register_evento_post_type() {

	/** evento **/
	$labels = array(
		'name'                  => _x( 'Calendario eventi', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'               => _x( 'Aggiungi un Evento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'               => _x( 'Aggiungi un Evento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'featured_image' => __( 'Logo Identificativo del Evento', 'design_scuole_italia' ),
		'edit_item'      => _x( 'Modifica il Evento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'view_item'      => _x( 'Visualizza il Evento', 'Post Type Singular Name', 'design_scuole_italia' ),
		'set_featured_image' => __( 'Seleziona Immagine Evento' ),
		'remove_featured_image' => __( 'Rimuovi Immagine Evento' , 'design_scuole_italia' ),
		'use_featured_image' => __( 'Usa come Immagine Evento' , 'design_scuole_italia' ),
	);
	$args = array(
		'label'                 => __( 'Evento', 'design_scuole_italia' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
//		'taxonomies'            => array( 'tipologia' ),
		'hierarchical'          => false,
		'public'                => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'has_archive'           => true,
        'capability_type' => array('evento', 'eventi'),
        'map_meta_cap'    => true,
        'description'    => __( "Il calendario scolastico", 'design_scuole_italia' ),

    );
	register_post_type( 'evento', $args );

	$labels = array(
		'name'              => _x( 'Tipologia Evento', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Tipologia Evento', 'taxonomy singular name', 'design_scuole_italia' ),
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
		'rewrite'           => array( 'slug' => 'tipologia-evento' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_eventi',
            'edit_terms'    => 'edit_tipologia_eventi',
            'delete_terms'  => 'delete_tipologia_eventi',
            'assign_terms'  => 'assign_tipologia_eventi'
        )
	);

	register_taxonomy( 'tipologia-evento', array( 'evento' ), $args );


}




/**
 * Crea i metabox del post type eventi
 */
add_action( 'cmb2_init', 'dsi_add_eventi_metaboxes' );
function dsi_add_eventi_metaboxes() {
	$prefix = '_dsi_evento_';

	$cmb_sottotitolo = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
//		'title'        => __( 'Sottotitolo', 'design_scuole_italia' ),
		'object_types' => array( 'evento' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );


	$cmb_sottotitolo->add_field( array(
		'id' => $prefix . 'descrizione',
		'name'        => __( 'Descrizione *', 'design_scuole_italia' ),
		'desc' => __( 'Indicare una sintetica descrizione del Evento. Vincoli: 160 caratteri spazi inclusi.' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'maxlength'  => '160',
			'required' => 'required'
		),
	) );
	$cmb_sottotitolo->add_field( array(
		'name' => 'Luogo della Scuola *',
        'id' =>  $prefix . 'is_luogo_scuola',
		'desc' => __( 'Seleziona un luogo se questo è un <a href="edit.php?post_type=luogo">Luogo della Scuola</a>', 'design_scuole_italia' ),
        'type'    => 'radio_inline',
        'options' => array(
            'true' => __( 'Si', 'design_scuole_italia' ),
            'false'   => __( 'No', 'design_scuole_italia' ),
        ),
        'default' => 'true',
        'attributes' => array(
            'required' => 'required'
        ),
	) );
	$cmb_sottotitolo->add_field( array(
		'id' =>  $prefix . 'link_schede_luoghi',
		'name'    => __( 'Luogo', 'design_scuole_italia' ),
		'desc' => __( 'Selezione il <a href="edit.php?post_type=luogo">luogo della Scuola</a> in cui viene organizzato l\'evento. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_luoghi_options(),
        'attributes'    => array(
            'placeholder' =>  __( 'Seleziona il luogo', 'design_scuole_italia' ),
            'data-conditional-id'     => $prefix.'is_luogo_scuola',
            'data-conditional-value'  => "true",
        ),
	) );


	$cmb_sottotitolo->add_field( array(
		'id' =>  $prefix . 'nome_luogo_custom',
		'name'    => __( 'Nome del luogo ', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci il nome del luogo (lascia vuoto hai selezionato un Luogo della Scuola )' , 'design_scuole_italia' ),
		'type'    => 'text',
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'is_luogo_scuola',
            'data-conditional-value'  => "false",
        ),
	) );


	$cmb_sottotitolo->add_field( array(
		'id'         => $prefix . 'indirizzo_luogo_custom',
		'name'       => __( 'Indirizzo Completo ', 'design_scuole_italia' ),
		'desc'       => __( 'Indirizzo completo del luogo: Via, civico, cap, città e Provincia (es: Via Vaglia, 6, 00139 - Roma RM) (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'is_luogo_scuola',
            'data-conditional-value'  => "false",
        ),
	) );


	$cmb_sottotitolo->add_field( array(
		'id'         => $prefix . 'posizione_gps_luogo_custom',
        'name'       => __( 'Posizione GPS <br><small>NB: clicca sulla lente di ingandimento e cerca l\'indirizzo, anche se lo hai già inserito nel campo precedente.<br>Questo permetterà una corretta georeferenziazione del luogo</small>', 'design_scuole_italia' ),
		'desc'       => __( 'Georeferenziazione del luogo e link a posizione in mappa.  (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'leaflet_map',
		'attributes' => array(
//			'tilelayer'           => 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
			'searchbox_position'  => 'topleft', // topright, bottomright, topleft, bottomleft,
			'search'              => __( 'Digita l\'indirizzo del Luogo' , 'design_scuole_italia' ),
			'not_found'           => __( 'Indirizzo non trovato' , 'design_scuole_italia' ),
			'initial_coordinates' => [
				'lat' => 41.894802, // Go Italy!
				'lng' => 12.4853384  // Go Italy!
			],
			'initial_zoom'        => 5, // Zoomlevel when there's no coordinates set,
			'default_zoom'        => 12, // Zoomlevel after the coordinates have been set & page saved
			'required'    => 'required',
            'data-conditional-id'     => $prefix.'is_luogo_scuola',
            'data-conditional-value'  => "false",

		)
	) );


	$cmb_sottotitolo->add_field( array(
		'id'         => $prefix . 'quartiere_luogo_custom',
		'name'       => __( 'Quartiere ', 'design_scuole_italia' ),
		'desc'       => __( 'Se il territorio è mappato in quartieri, riportare il Quartiere dove si svolge l\'evento (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'is_luogo_scuola',
            'data-conditional-value'  => "false",
        ),
	) );


	$cmb_sottotitolo->add_field( array(
		'id'         => $prefix . 'circoscrizione_luogo_custom',
		'name'       => __( 'Circoscrizione', 'design_scuole_italia' ),
		'desc'       => __( 'Se il territorio è mappato in circoscrizioni, riportare la Circoscrizione dove si svolge l\'evento (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'is_luogo_scuola',
            'data-conditional-value'  => "false",
        ),
	) );



	$cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_evento',
		'title'         => __( 'Dettagli Evento', 'design_scuole_italia' ),
		'object_types' => array( 'evento' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );


    $group_field_id = $cmb_undercontent->add_field( array(
        'id'          => $prefix . 'date',
        'name'        => __('<h1>Date</h1>' , 'design_scuole_italia' ),
        'type'        => 'group',
        'description' => __( 'Se l\'evento si svolge in più giorni o fasi indica qui di seguito i diversi appuntamenti. Es: inizo attività, pausa pranzo, seconda sessione, etc', 'design_scuole_italia' ),
        'options'     => array(
            'group_title'    => __( 'Fase {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
            'add_button'     => __( 'Aggiungi una data evento', 'design_scuole_italia' ),
            'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
            'sortable'       => true,
            'closed'      => false, // true to have the groups closed by default
            //'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),

    ) );


    $cmb_undercontent->add_group_field( $group_field_id,  array(
        'id'      => 'data',
        'after'    => __( '<br>Data / orario ', 'design_scuole_italia' ),
        'type' => 'text_datetime_timestamp',
        'date_format' => 'd-m-Y',
    ) );

    $cmb_undercontent->add_group_field( $group_field_id,  array(
        'id'      => 'descrizione',
        'desc'    => __( 'Descrizione', 'design_scuole_italia' ),
        'type'             => 'textarea_small',
        'attributes'  => array(
            'rows'        => 3,
        ),

    ) );

    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'link_schede_notizia',
        'name'    => __( 'Per approfondire', 'design_scuole_italia' ),
        'description' => __( 'Link alla circolare o alla notizia' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_approfondimenti_options(),
        'attributes' => array(
            'placeholder' =>  __( 'Seleziona articoli o circolari di approfondimento', 'design_scuole_italia' ),
        ),
    ) );

	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'gallery',
		'name'       => __( 'Galleria', 'design_scuole_italia' ),
		'desc'       => __( 'Galleria di immagini', 'design_scuole_italia' ),
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		'query_args' => array( 'type' => 'image' ), // Only images attachment
	) );

	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'video',
		'name'       => __( 'Video', 'design_scuole_italia' ),
		'desc'       => __( 'Inserisci la url di un servizio di streaming video (es: youtube, vimeo) - Qui la lista: <a href="https://codex.wordpress.org/Embeds">https://codex.wordpress.org/Embeds</a>', 'design_scuole_italia' ),
		'type' => 'oembed',

	) );


	$cmb_undercontent->add_field( array(
		'id'      => $prefix . 'destinatari',
		'name'    => __( 'Destinatari evento *', 'design_scuole_italia' ),
		'desc'    => __( 'Comunità scolastica (rivolta a tutti) / solo personale scolastico (rivolta al personale della scuola)', 'design_scuole_italia' ),
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'tutti' => __( 'Comunità scolastica', 'design_scuole_italia' ),
			'personale'   => __( 'Personale Scolastico', 'design_scuole_italia' )
		),
		'attributes' => array(
			'required' => 'required'
		),
	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'descrizione_destinatari',
		'name'        => __( 'Descrizione dei destinatari *', 'design_scuole_italia' ),
		'desc' => __( 'Descrizione testuale dei principali interlocutori dell\'Evento. Questo elenco compare nel frontend..' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'required' => 'required'
		),
	) );

	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'persone_amministrazione',
			'name'       => __('Persone dell\'amministrazione ', 'design_scuole_italia' ),
			'desc' => __( 'Link a schede del personale scolastico che parteciperanno all\'evento e che si vogliono mettere in risalto, per esempio un dirigente scolastico o un prof. che hanno promosso l\'evento ', 'design_scuole_italia' ),
			'type'    => 'pw_multiselect',
			'options' => dsi_get_user_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
			),

		)
	);


	$cmb_undercontent->add_field( array(
		'id'      => $prefix . 'tipo_evento',
		'name'    => __( 'Tipo evento *', 'design_scuole_italia' ),
		'desc'    => __( 'Gratuito/ a pagamento', 'design_scuole_italia' ),
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'gratis' => __( 'Gratuito', 'design_scuole_italia' ),
			'pagamento'   => __( 'A Pagamento', 'design_scuole_italia' )
		),
		'attributes' => array(
			'required' => 'required'
		),
	) );


	$group_field_id = $cmb_undercontent->add_field( array(
		'id'          => $prefix . 'prezzo',
		'name'        => __('<h1>Prezzo</h1>' , 'design_scuole_italia' ),
		'type'        => 'group',
		'description' => __( 'Biglietto intero - prezzo - testo che spiega le condizioni / Biglietto ridotto - prezzo - testo che spiega le condizioni / Biglietto gratuito - gratis - testo che spiega le condizioni', 'design_scuole_italia' ),
		'options'     => array(
			'group_title'    => __( 'Prezzo {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
			'add_button'     => __( 'Aggiungi una fascia di prezzo', 'design_scuole_italia' ),
			'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
			'sortable'       => true,
			'closed'      => false, // true to have the groups closed by default
			//'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
		'attributes'    => array(
			'data-conditional-id'     => $prefix.'tipo_evento',
			'data-conditional-value'  => "pagamento",
		),
	) );


	$cmb_undercontent->add_group_field( $group_field_id,  array(
		'id'      => 'tipo_biglietto',
		'name'    => __( 'Nome della tipologia di biglietto (Intero, Ridotto)', 'design_scuole_italia' ),
		'type'             => 'text',
	) );

	$cmb_undercontent->add_group_field( $group_field_id,  array(
		'id'      => 'prezzo',
		'name'    => __( 'Prezzo', 'design_scuole_italia' ),
		'type'             => 'text_money',
		'before_field' => '&euro;',
	) );
	$cmb_undercontent->add_group_field( $group_field_id,  array(
		'id'      => 'descrizione',
		'name'    => __( 'Descrizione della tipologia di biglietto.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie. ', 'design_scuole_italia' ),
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
	) );
	$cmb_undercontent->add_field( array(
		'id'      => $prefix . 'organizzato_da_scuola',
		'name'    => __( 'Organizzato dalla scuola', 'design_scuole_italia' ),
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'si' => __( 'Si', 'design_scuole_italia' ),
			'no'   => __( 'No', 'design_scuole_italia' )
		),
		'attributes' => array(
			'required' => 'required'
		),
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_struttura_organizzativa',
		'name'    => __( 'Organizzato da *', 'design_scuole_italia' ),
		'description' => __( 'Se è organizzato dalla scuola, card della struttura organizzativa responsabile (es. Segreteria , oppure Presidenza) ' , 'design_scuole_italia' ),
		'type'    => 'pw_multiselect',
		'options' => dsi_get_strutture_options(),
		'attributes'    => array(
			'data-conditional-id'     => $prefix.'organizzato_da_scuola',
			'data-conditional-value'  => "si",
		),

	) );


	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'contatto_persona',
			'name'       => __('Contatto: persona ', 'design_scuole_italia' ),
			'desc' => __( 'Nome e cognome delle persone da contattare per informazioni sull\'Evento', 'design_scuole_italia' ),
			'type'    => 'text',
            'attributes'    => array(
                'data-conditional-id'     => $prefix.'organizzato_da_scuola',
                'data-conditional-value'  => "no",
            ),
		)
	);


	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'contatto_telefono',
			'name'       => __('Contatto: telefono ', 'design_scuole_italia' ),
			'desc' => __( 'Se non è un evento della scuola, inserire Numero di telefono per avere informazioni sull\'Evento', 'design_scuole_italia' ),
			'type'    => 'text',
			'attributes'    => array(
				'data-conditional-id'     => $prefix.'organizzato_da_scuola',
				'data-conditional-value'  => "no",
			),
		)
	);
	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'contatto_email',
			'name'       => __('Contatto: email ', 'design_scuole_italia' ),
			'desc' => __( 'se non è un evento della scuola, Indirizzo email per avere informazioni sull\'Evento', 'design_scuole_italia' ),
			'type'    => 'text_email',
			'attributes'    => array(
				'data-conditional-id'     => $prefix.'organizzato_da_scuola',
				'data-conditional-value'  => "no",
			),
		)
	);


	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'website',
			'name'       => __('Sito web ', 'design_scuole_italia' ),
			'desc' => __( 'Inserire il sito web dedicato all\'evento o della società che organizza l\'evento', 'design_scuole_italia' ),
			'type'    => 'text_url'
		)
	);

	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'patrocinato',
			'name'       => __('Patrocinato da ', 'design_scuole_italia' ),
			'desc' => __( 'Soggetto che patrocinia l\'evento', 'design_scuole_italia' ),
			'type'    => 'text'
		)
	);
	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'sponsor',
			'name'       => __('Sponsor', 'design_scuole_italia' ),
			'desc' => __( 'Sponsor dell\'evento', 'design_scuole_italia' ),
			'type'    => 'text'
		)
	);

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_schede_documenti',
		'name'    => __( 'Documenti', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci qui tutti i documenti che ritieni rilevanti per l\'evento. Se devi caricare il documento <a href="post-new.php?post_type=documento">puoi creare una breve scheda di presentazione</a> (soluzione consigliata e più efficace per gli utenti del sito) oppure caricarlo direttamente nei campi che seguono. ' , 'design_scuole_italia' ),
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



	$cmb_side = new_cmb2_box( array(
		'id'           => $prefix . 'box_side',
		'title'        => __( 'Data inizio e fine evento *', 'design_scuole_italia' ),
        'object_types' => array( 'evento' ),
		'context'      => 'side',
		'priority'     => 'high',
	) );

    $timestamp_inizio = $timestamp_fine = "";
	if( ( isset($_GET) ) && array_key_exists('post',$_GET) &&  isset($_GET['post']) & is_numeric($_GET['post']) ) {
        $post_id = absint($_GET['post']);
        $timestamp_inizio = dsi_get_meta("timestamp_inizio", $prefix, $post_id);
        $timestamp_fine= dsi_get_meta("timestamp_fine", $prefix,$post_id);
    }

	$inizio = array(
        'id'         => $prefix . 'timestamp_inizio',
        'before' => 'Data Inizio Evento<br>',
        'type' => 'text_date_timestamp',
        'date_format' => 'd-m-Y',
        'attributes' => array(
            'required' => 'required',
            'autocomplete' => 'off'
        ),
        'column' => array(
            'position' => 2,
            'name'     => 'Inizio Evento',
        ),
    );

    if($timestamp_fine !== "") {
        $inizio['attributes']['data-datepicker'] = json_encode( array(
                'maxDate' => date("d-m-Y", $timestamp_fine),
            )
        );
    }

    $cmb_side->add_field( $inizio );

    $fine = array(
        'id'         => $prefix . 'timestamp_fine',
        'before' => 'Data Fine Evento<br>',
        'type' => 'text_date_timestamp',
        'date_format' => 'd-m-Y',
        'attributes' => array(
            'required' => 'required',
            'autocomplete' => 'off'
        ),
    ) ;

    if($timestamp_inizio !== "") {
        $fine['attributes']['data-datepicker'] = json_encode( array(
                'minDate' => date("d-m-Y", $timestamp_inizio),
            )
        );
    }

	$cmb_side->add_field( $fine );
}

/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_evento_add_content_after_title' );
function sdi_evento_add_content_after_title($post) {
	if($post->post_type == "evento")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome dell\'Evento</b></span><br><br>', 'design_scuole_italia' );
}

/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_evento_add_content_before_editor', 100 );
function sdi_evento_add_content_before_editor($post) {
	if($post->post_type == "evento")
		_e('<h1>Descrizione Estesa dell\'evento</h1>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_evento_add_content_after_editor', 100 );
function sdi_evento_add_content_after_editor($post) {
    if($post->post_type == "evento")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}

/**
 * aggiungo js per condizionale parent
 */
add_action( 'admin_print_scripts-post-new.php', 'dsi_evento_admin_script', 11 );
add_action( 'admin_print_scripts-post.php', 'dsi_evento_admin_script', 11 );

function dsi_evento_admin_script() {
    global $post_type;
    if( 'evento' == $post_type )
        wp_enqueue_script( 'luogo-admin-script', get_template_directory_uri() . '/inc/admin-js/evento.js' );
}
