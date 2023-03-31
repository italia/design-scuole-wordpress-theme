<?php
/**
 * Definisce post type e tassonomie relative al luogo
 */
add_action( 'init', 'dsi_register_luogo_post_type', -10 );
function dsi_register_luogo_post_type() {

	/** luogo **/
	$labels = array(
		'name'          => _x( 'Luoghi', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi un Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi un Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
		'edit_item'      => _x( 'Modifica il Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
		'view_item'      => _x( 'Visualizza il Luogo', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Luogo', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'  => true,
		'public'        => true,
		'menu_position' => 2,
		'menu_icon'     => 'dashicons-pressthis',
		'has_archive'   => true,
        'capability_type' => array('luogo', 'luoghi'),
        'map_meta_cap'    => true,
	);
	register_post_type( 'luogo', $args );

	/** tipologia luogo **/

	$labels = array(
		'name'              => _x( 'Tipologia Luogo', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Tipologia Luogo', 'taxonomy singular name', 'design_scuole_italia' ),
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
		'rewrite'           => array( 'slug' => 'tipologia-luogo' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_luoghi',
            'edit_terms'    => 'edit_tipologia_luoghi',
            'delete_terms'  => 'delete_tipologia_luoghi',
            'assign_terms'  => 'assign_tipologia_luoghi'
        )
	);

	register_taxonomy( 'tipologia-luogo', array( 'luogo' ), $args );
}


/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_luogo_add_content_after_title' );
function sdi_luogo_add_content_after_title($post) {
	if($post->post_type == "luogo")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome del Luogo</b>.</i></span> in cui si svolge l\'attività scolastica. I luoghi possono essere sede di strutture e canali fisici di erogazione di un servizio<br><br>', 'design_scuole_italia' );
}




/**
 * Crea i metabox del post type servizi
 */
add_action( 'cmb2_init', 'dsi_add_luogo_metaboxes' );
function dsi_add_luogo_metaboxes() {

	$prefix = '_dsi_luogo_';



	$cmb_aftertitle_luoghi = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_info',
		//'title'        => __( 'Dati Strutturali', 'design_scuole_italia' ),
		'object_types' => array( 'luogo' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );


    $cmb_aftertitle_luoghi->add_field( array(
        'id' => $prefix . 'tipologia',
        'name'        => __( 'Tipologia luogo', 'design_scuole_italia' ),
        'type'             => 'taxonomy_radio_inline',
        'taxonomy'       => 'tipologia-luogo',
        'remove_default' => 'true'
    ) );

	$cmb_aftertitle_luoghi->add_field( array(
		'id'         => $prefix . 'descrizione_breve',
		'name'       => __( 'Descrizione breve *', 'design_scuole_italia' ),
		'desc'       => __( 'Sintetica descrizione del luogo (inferiore 160 caratteri)', 'design_scuole_italia' ),
		'type'       => 'textarea',
		'attributes'    => array(
			'maxlength'  => '160',
			'required'    => 'required'
		),
	) );


	$cmb_aftercontent_luoghi = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_dati',
		'title'        => __( 'Dati Pubblici', 'design_scuole_italia' ),
		'object_types' => array( 'luogo' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );


	// verifico se il luogo ha un parent, in caso recupero da li i dati geo


	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'childof',
		'name'       => __( 'Il luogo è parte di ', 'design_scuole_italia' ),
		'desc'       => __( 'Con questo campo è possibile stabilire una relazione tra il luogo che si sta creando e il luogo che lo contiene. Ad esempio: il luogo palestra è contenuto nel luogo edificio scolastico.', 'design_scuole_italia' ),
		'type'       => 'select',
		'options' => dsi_get_luoghi_options(true, true),
	) );


	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'indirizzo',
		'name'       => __( 'Indirizzo  ', 'design_scuole_italia' ),
		'desc'       => __( 'Indirizzo del luogo.', 'design_scuole_italia' ),
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id'    => $prefix . 'childof',
			'data-conditional-value' => '0',
		),
	) );


	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'posizione_gps',
		'name'       => __( 'Posizione GPS <br><small>NB: clicca sulla lente d\'ingrandimento e cerca l\'indirizzo, anche se lo hai già inserito nel campo precedente.<br>Questo permetterà una corretta georeferenziazione del luogo</small>', 'design_scuole_italia' ),
		'desc'       => __( 'Georeferenziazione del luogo e link a posizione in mappa.  .', 'design_scuole_italia' ),
		'type'       => 'leaflet_map',
		'attributes' => array(
			'searchbox_position'  => 'topleft', // topright, bottomright, topleft, bottomleft,
			'search'              => __( 'Digita l\'indirizzo della Sede' , 'design_scuole_italia' ),
			'not_found'           => __( 'Indirizzo non trovato' , 'design_scuole_italia' ),
			'initial_coordinates' => [
				'lat' => 41.894802, // Go Italy!
				'lng' => 12.4853384  // Go Italy!
			],
			'initial_zoom'        => 5, // Zoomlevel when there's no coordinates set,
			'default_zoom'        => 12, // Zoomlevel after the coordinates have been set & page saved
		)
	) );

	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'cap',
		'name'       => __( 'CAP ', 'design_scuole_italia' ),
		'desc'       => __( 'Codice di avviamento postale del luogo', 'design_scuole_italia' ),
		'type'       => 'text_small',
		'attributes' => array(
			'data-conditional-id'    => $prefix . 'childof',
			'data-conditional-value' => '0',
		),
	) );



	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'mail',
		'name'       => __( 'Riferimento mail', 'design_scuole_italia' ),
		'desc'       => __( 'Indirizzo di posta elettronica del luogo. ', 'design_scuole_italia' ),
		'type'       => 'text_email',
		/*'attributes' => array(
			'data-conditional-id'    => $prefix . 'childof',
			'data-conditional-value' => '0',
		),*/
	) );

	$cmb_aftercontent_luoghi->add_field( array(
        'id'         => $prefix . 'pec',
        'name'       => __( 'PEC', 'design_scuole_italia' ),
        'desc'       => __( 'Indirizzo di posta elettronica certificata (PEC).', 'design_scuole_italia' ),
        'type'       => 'text_email',
    ) );


	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'telefono',
		'name'       => __( 'Riferimento telefonico ', 'design_scuole_italia' ),
		'desc'       => __( 'Telefono del luogo. ', 'design_scuole_italia' ),
		'type'       => 'text',
		/*
		'attributes' => array(
			'data-conditional-id'    => $prefix . 'childof',
			'data-conditional-value' => '0',
		),
		*/
	) );


	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'orario_pubblico',
		'name'       => __('Orario per il pubblico ', 'design_scuole_italia' ),
		'desc'       => __( 'Orario di apertura al pubblico del luogo.  ' ),
		'type'       => 'textarea_small'
	) );


    $elementi_field_id = $cmb_aftercontent_luoghi->add_field( array(
        'id'          => $prefix . 'elementi_di_interesse',
        'name'        => __('<h1>Elementi di interesse</h1>', 'design_scuole_italia' ),
        'type'        => 'group',
        'description' => __( 'Inserisci se ci elementi di interesse di questo luogo. <b>NB: se il luogo ha dei luoghi "figli" all\'interno non inserirli qui, verranno recuperati e mostrati automaticamente.</b>', 'design_scuole_italia' ),
        'options'     => array(
            'group_title'    => __( 'Elemento {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
            'add_button'     => __( 'Aggiungi', 'design_scuole_italia' ),
            'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
            'sortable'       => true,
            'closed'      => false, // true to have the groups closed by default
            //'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );


    $cmb_aftercontent_luoghi->add_group_field( $elementi_field_id, array(
        'id' => 'titolo',
        'desc'    => __( 'Titolo', 'design_scuole_italia' ),
        'type'             => 'text'
    ) );


    $cmb_aftercontent_luoghi->add_group_field( $elementi_field_id, array(
        'id' => 'descrizione',
        'desc'    => __( 'Descrizione', 'design_scuole_italia' ),
        'type'             => 'textarea_small',

    ) );





	$group_field_id = $cmb_aftercontent_luoghi->add_field( array(
		'id'          => $prefix . 'modalita_accesso',
		'name'        => __('<h1>Modalità di accesso</h1>', 'design_scuole_italia' ),
		'type'        => 'group',
		'desc' => __( 'parcheggi / ingressi / accessibilità Informazioni relative  all\'accesso al luogo come la presenza di parcheggi,  la presenza di uno solo o di più ingressi, la presenza di strutture e servizi per garantire l\'accesso ai disabili, ecc.', 'design_scuole_italia' ),
		'options'     => array(
			'group_title'    => __( 'Modalità di accesso n. {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
			'add_button'     => __( 'Aggiungi', 'design_scuole_italia' ),
			'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
			'sortable'       => true,
			'closed'      => false, // true to have the groups closed by default
			//'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );


	$cmb_aftercontent_luoghi->add_group_field( $group_field_id, array(
		'id' => 'tipologia_accesso',
		'desc'    => __( 'Selezione la tipologia di accesso', 'design_scuole_italia' ),
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'ingresso' => __( 'Ingresso', 'design_scuole_italia' ),
			'accessibilita'   => __( 'Accessibilità', 'design_scuole_italia' ),
			'parcheggio'     => __( 'Parcheggio', 'design_scuole_italia' ),
		),
	) );

	$cmb_aftercontent_luoghi->add_group_field( $group_field_id, array(
		'id' => 'titolo_accesso',
		'desc'    => __( 'Titolo. Es: Ingresso principale, Parcheggio Privato, etc', 'design_scuole_italia' ),
		'type'             => 'text'
	) );


	$cmb_aftercontent_luoghi->add_group_field( $group_field_id, array(
		'id' => 'Indirizzo_accesso',
		'desc'    => __( 'Indirizzo', 'design_scuole_italia' ),
		'type'             => 'textarea_small'
	) );




    $cmb_aftercontent_luoghi->add_field( array(
        'id'         => $prefix . 'servizi_presenti',
        'name'       => __( 'Servizi presenti nel luogo', 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_servizi_options(),
    ) );

    $cmb_aftercontent_luoghi->add_field( array(
        'id'         => $prefix . 'servizi_altro',
        'name'       => __( 'Descrizione altri servizi presenti nel luogo', 'design_scuole_italia' ),
        'desc'       => __( 'Se sono presenti servizi di carattere privato per i quali non hai creato una scheda servizi, descrivili qui.', 'design_scuole_italia' ),
        'type'    => 'textarea',
    ) );

	$cmb_aftercontent_luoghi->add_field( array(
		'id' => $prefix . 'link_strutture',
		'name'    => __( 'Il luogo è sede di:', 'design_scuole_italia' ),
		'desc' => __( 'Link alle strutture (segreteria, scuola, dirigenza) presenti nel luogo' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_strutture_options(),
	) );

    $cmb_aftercontent_luoghi->add_field( array(
        'id' => $prefix . 'gestito_da',
        'name'    => __( 'Gestito da', 'design_scuole_italia' ),
        'desc' => __( 'Link alle strutture (segreteria, scuola, dirigenza) presenti nel luogo' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_strutture_options(),
    ) );

    $cmb_aftercontent_luoghi->add_field( array(
        'id' => $prefix . 'gestito_da_persone',
        'name'    => __( 'Persone che gestiscono il luogo', 'design_scuole_italia' ),
        'desc' => __( 'Inserire la/le persona/e che gestiscono il luogo, associando al luogo le sue schede persona precedentemente create' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' => dsi_get_user_options(),
        'attributes' => array(
            'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
        ),
    ) );



    $cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'gestito_da_nome',
		'title'       => __( 'Nome gestore', 'design_scuole_italia' ),
        'before'       => __( 'Se il gestore del luogo non è una struttura della scuola, inserisci il nome e il link del gestore<br>', 'design_scuole_italia' ),
		'desc'       => __( 'Nome della struttura che gestisce il luogo', 'design_scuole_italia' ),
		'type'       => 'text'
	) );

	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'gestito_da_link',
		'before'       => __( 'Link gestore<br>', 'design_scuole_italia' ),
		'desc'       => __( 'Link al sito web se è una struttura privata', 'design_scuole_italia' ),
		'type'       => 'text_url'
	) );


	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'gallery',
		'name'       => __( 'Galleria', 'design_scuole_italia' ),
		'desc'       => __( 'Galleria di immagini', 'design_scuole_italia' ),
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		'query_args' => array( 'type' => 'image' ), // Only images attachment
	) );

	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'video',
		'name'       => __( 'Video', 'design_scuole_italia' ),
		'desc'       => __( 'Inserisci la url di un servizio di streaming video (es: youtube, vimeo) - Qui la lista: <a href="https://codex.wordpress.org/Embeds">https://codex.wordpress.org/Embeds</a>', 'design_scuole_italia' ),
		'type' => 'oembed',

	) );



	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'anno_costruzione',
		'name'       => __( 'Anno di Costruzione ', 'design_scuole_italia' ),
		'desc'       => __( 'Anno in cui e\' stato costruito l\'edificio', 'design_scuole_italia' ),
		'type'       => 'text_small'
	) );

	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'numero_piani',
		'name'       => __( 'Numero di Piani ', 'design_scuole_italia' ),
		'desc'       => __( 'Numero di piani in cui e\' articolato l\'edificio', 'design_scuole_italia' ),
		'type'       => 'text_small'
	) );


    $cmb_aftercontent_luoghi->add_field( array(
        'id'         => $prefix . 'posti_sedere',
        'name'       => __( 'Posti a sedere ', 'design_scuole_italia' ),
        'desc'       => __( 'Indicare il numero di posti a sedere se il luogo prevede delle sedute (come ad esempio un auditorium, un aula magna, un teaotro, etc.)', 'design_scuole_italia' ),
        'type'       => 'text_small'
    ) );


	$cmb_aftercontent_luoghi->add_field( array(
		'id'         => $prefix . 'info',
		'name'       => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
		'desc'       => __( 'Ulteriori informazioni sul Servizio, FAQ ed eventuali riferimenti normativi.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.', 'design_scuole_italia' ),
		'type'       => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
	) );

	/**** dati strutturali non visibili sul f/e ****/
	$cmb_dati_luoghi = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_struttura',
		'title'        => __( 'Dati Strutturali (a scopo amministrativo, non sono visualizzati sul frontend)', 'design_scuole_italia' ),
		'object_types' => array( 'luogo' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_dati_luoghi->add_field( array(
		'id'         => $prefix . 'cod_edificio',
		'name'       => __( 'Codice edificio ', 'design_scuole_italia' ),
		'desc'       => __( 'Codice dell\'edificio', 'design_scuole_italia' ),
		'type'       => 'text_medium'
	) );

	$cmb_dati_luoghi->add_field( array(
		'id'         => $prefix . 'cod_comune',
		'name'       => __( 'Codice Comune', 'design_scuole_italia' ),
		'desc'       => __( 'Codice catastale del Comune dell\'edificio', 'design_scuole_italia' ),
		'type'       => 'text_medium'
	) );

	$cmb_dati_luoghi->add_field( array(
		'id'         => $prefix . 'desc_cod_comune',
		'name'       => __( 'Descrizione codice comune', 'design_scuole_italia' ),
		'desc'       => __( 'Descrizione codice catastale del Comune dell\'edificio', 'design_scuole_italia' ),
		'type'       => 'textarea_small'
	) );
	$cmb_dati_luoghi->add_field( array(
		'id' => $prefix . 'uso_scolastico',
		'name'       => __( 'Uso Scolastico', 'design_scuole_italia' ),
		'desc' => __( 'Indica se l\'edificio e\' stato costruito appositamente per uso scolastico ', 'design_scuole_italia' ),
		'type' => 'radio_inline',
		'default' => 'true',
		'options' => array(
			"true" => __( 'SI', 'design_scuole_italia' ),
			"false" => __( 'NO', 'design_scuole_italia' ),
		),
	) );

	$cmb_dati_luoghi->add_field( array(
		'id' => $prefix . 'altri_usi',
		'name'       => __( 'Altri Usi', 'design_scuole_italia' ),
		'desc' => __( 'Indica se l\'edificio e\' stato costruito per altri usi e poi adattato permanentemente per uso scolastico ', 'design_scuole_italia' ),
		'type' => 'radio_inline',
		'default' => 'true',
		'options' => array(
			"true" => __( 'SI', 'design_scuole_italia' ),
			"false" => __( 'NO', 'design_scuole_italia' ),
		),
	) );


	$cmb_dati_luoghi->add_field( array(
		'id'         => $prefix . 'anno_adattamento',
		'name'       => __( 'Anno Adattamento ', 'design_scuole_italia' ),
		'desc'       => __( 'Anno in cui e\' stato adattato l\'edificio per uso scolastico', 'design_scuole_italia' ),
		'type'       => 'text_small'
	) );

	$cmb_dati_luoghi->add_field( array(
		'id'         => $prefix . 'superficie_totale',
		'name'       => __( 'Sperficie Area Totale ', 'design_scuole_italia' ),
		'desc'       => __( 'Superificie totale dell\'area in mq', 'design_scuole_italia' ),
		'type'       => 'text_small'
	) );

	$cmb_dati_luoghi->add_field( array(
		'id'         => $prefix . 'superficie_libera',
		'name'       => __( 'Sperficie Area Libera ', 'design_scuole_italia' ),
		'desc'       => __( 'Superificie libera dell\'area in mq', 'design_scuole_italia' ),
		'type'       => 'text_small'
	) );


	$cmb_dati_luoghi->add_field( array(
		'id'         => $prefix . 'volume',
		'name'       => __( 'Volume ', 'design_scuole_italia' ),
		'desc'       => __( 'Volume lordo dell\'edificio', 'design_scuole_italia' ),
		'type'       => 'text_small'
	) );
}



/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_luogo_add_content_before_editor', 100 );
function sdi_luogo_add_content_before_editor($post) {
	if($post->post_type == "luogo")
		_e('<h1>Descrizione del luogo</h1>', 'design_scuole_italia' );
}

/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_luogo_add_content_after_editor', 100 );
function sdi_luogo_add_content_after_editor($post) {
    if($post->post_type == "luogo")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}

/**
 * aggiungo js per condizionale parent
 */
add_action( 'admin_print_scripts-post-new.php', 'dsi_luogo_admin_script', 11 );
add_action( 'admin_print_scripts-post.php', 'dsi_luogo_admin_script', 11 );

function dsi_luogo_admin_script() {
	global $post_type;
	if( 'luogo' == $post_type )
		wp_enqueue_script( 'luogo-admin-script', get_template_directory_uri() . '/inc/admin-js/luogo.js' );
}

/**
 * salvo il parent cmb2
 */

add_action( 'save_post_luogo', 'dsi_save_luogo' );
function dsi_save_luogo( $post_id) {
	$post_type = get_post_type($post_id);
	// If this isn't a 'book' post, don't update it.
	if ( "luogo" != $post_type ) return;
	//Check it's not an auto save routine
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	//Perform permission checks! For example:
	if ( !current_user_can('edit_post', $post_id) )
		return;

	if(!isset($_POST["_dsi_luogo_childof"]))
	    return;

	//$parentid = dsi_get_meta("childof", "_dsi_luogo_", $post_id);
    $parentid = $_POST["_dsi_luogo_childof"];


    if($parentid == "")
		$parentid = 0;
	remove_action( 'save_post_luogo','dsi_save_luogo' );
	wp_update_post(
		array(
			'ID'          => $post_id,
			'post_parent' => $parentid
		)
	);
	add_action( 'save_post_luogo', 'dsi_save_luogo' );
}

// relazione bidirezionale struttura / luoghi
new dsi_bidirectional_cmb2("_dsi_luogo_", "luogo", "link_strutture", "box_elementi_dati", "_dsi_struttura_sedi");

// relazione bidirezionale servizi / luoghi
new dsi_bidirectional_cmb2("_dsi_luogo_", "luogo", "servizi_presenti", "box_elementi_dati", "_dsi_servizio_luoghi");
