<?php
/**
 * Definisce post type e tassonomie relative alle schede progetto
 */
add_action( 'init', 'dsi_register_scheda_progetto_post_type', 0 );
function dsi_register_scheda_progetto_post_type() {

	/** scheda **/
	$labels = array(
		'name'          => _x( 'Schede Progetti', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Scheda Progetto', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi una Scheda', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi una nuova Scheda', 'Post Type Singular Name', 'design_scuole_italia' ),
        'edit_item'       => _x( 'Modifica la Scheda', 'Post Type Singular Name', 'design_scuole_italia' ),
		'featured_image' => __( 'Immagine di riferimento della scheda', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Scheda Progetto', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor', 'author', 'thumbnail'),
		'taxonomies'    => array( 'category' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-media-document',
		'has_archive'   => true,
        'capability_type' => array('scheda_progetto', 'schede_progetto'),
        'map_meta_cap'    => true,
	);
	register_post_type( 'scheda_progetto', $args );

}



/**
 * Crea i metabox del post type scheda
 */
add_action( 'cmb2_init', 'dsi_add_scheda_progetto_metaboxes' );
function dsi_add_scheda_progetto_metaboxes() {
	$prefix = '_dsi_scheda_progetto_';


	$cmb_sottotitolo = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
		'object_types' => array( 'scheda_progetto' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );

	$cmb_sottotitolo->add_field( array(
		'id' => $prefix . 'descrizione',
		'name'        => __( 'Descrizione *', 'design_scuole_italia' ),
		'desc' => __( 'Breve descrizione del contenuti della scheda (max 160 caratteri) Vincoli: 160 caratteri spazi inclusi.' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'maxlength'  => '160',
			'required'    => 'required'
		),
	) );

	$cmb_sottotitolo->add_field( array(
		'id' => $prefix . 'obiettivi',
		'name'        => __( 'Obiettivi *', 'design_scuole_italia' ),
		'desc' => __( 'Obiettivi del progetto' , 'design_scuole_italia' ),
		'type' => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


    $cmb_sottotitolo->add_field( array(
            'name'       => __('Partecipanti', 'design_scuole_italia' ),
            'desc' => __( 'descrizione dei partecipanti al progetto' , 'design_scuole_italia' ),
            'id'             => $prefix . 'partecipanti',
            'type'    => 'textarea',
        )
    );

	$cmb_sottotitolo->add_field( array(
			'name'       => __('Classi collegate ', 'design_scuole_italia' ),
			'desc' => __( 'lista dei link alle sezioni che hanno partecipato' , 'design_scuole_italia' ),
			'id'             => $prefix . 'classi',
			'type'    => 'pw_multiselect',
			'options' => dsi_get_classe_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
			),
		)
	);
    $cmb_sottotitolo->add_field( array(
            'name'       => __('In collaborazione con', 'design_scuole_italia' ),
            'desc' => __( 'eventuale lista di enti pubblici, privati, associazioni, etc' , 'design_scuole_italia' ),
            'id'             => $prefix . 'collaborazione',
            'type'    => 'textarea',
        )
    );




	$cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_struttura',
		'title' =>  __( 'Luogo, Strutture, Documenti, Gallery', 'design_scuole_italia' ),
		'object_types' => array( 'scheda_progetto' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

    $cmb_undercontent->add_field( array(
        'name' => 'Luogo della Scuola *',
        'id' =>  $prefix . 'is_luogo_scuola',
        'desc' => __( 'Seleziona se il progetto viene svolto in un <a href="edit.php?post_type=luogo">Luogo della Scuola</a>', 'design_scuole_italia' ),
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


    $cmb_undercontent->add_field( array(
		'id' =>  $prefix . 'link_schede_luoghi',
		'name'    => __( 'Luogo', 'design_scuole_italia' ),
		'desc' => __( 'Selezione il <a href="edit.php?post_type=luogo">luogo </a> in cui si è tenuto il progetto' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'luogo',
			), // override the get_posts args
		),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'is_luogo_scuola',
            'data-conditional-value' => "true",
        ),
	) );

	$cmb_undercontent->add_field( array(
		'id' =>  $prefix . 'nome_luogo_custom',
		'name'    => __( 'Nome del luogo', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci il nome del luogo (lascia vuoto hai selezionato un Luogo della Scuola )' , 'design_scuole_italia' ),
		'type'    => 'text',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'is_luogo_scuola',
            'data-conditional-value' => "false",
        ),
	) );



	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'indirizzo_luogo_custom',
		'name'       => __( 'Indirizzo Completo', 'design_scuole_italia' ),
		'desc'       => __( 'Indirizzo completo del luogo: Via, civico, cap, città e Provincia (es: Via Vaglia, 6, 00139 - Roma RM) (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'is_luogo_scuola',
            'data-conditional-value' => "false",
        ),
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'posizione_gps_luogo_custom',
		'name'       => __( 'Posizione GPS ', 'design_scuole_italia' ),
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
            'data-conditional-id' => $prefix . 'is_luogo_scuola',
            'data-conditional-value' => "false",
    ),
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'quartiere_luogo_custom',
		'name'       => __( 'Quartiere ', 'design_scuole_italia' ),
		'desc'       => __( 'Se il territorio è mappato in quartieri, riportare il Quartiere dove si svolge l\'evento (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'is_luogo_scuola',
            'data-conditional-value' => "false",
        ),
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'circoscrizione_luogo_custom',
		'name'       => __( 'Circoscrizione ', 'design_scuole_italia' ),
		'desc'       => __( 'Se il territorio è mappato in circoscrizioni, riportare la Circoscrizione dove si svolge l\'evento (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'is_luogo_scuola',
            'data-conditional-value' => "false",
        ),
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_strutture',
		'name'    => __( 'Strutture', 'design_scuole_italia' ),
		'before' => __( '<p>Relazione con le strutture che erogano il progetto. </p>' , 'design_scuole_italia' ),
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


    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'link_schede_documenti',
        'name'    => __( 'Documenti', 'design_scuole_italia' ),
        'desc' => __( 'Inserisci qui tutti i documenti che ritieni utili per descrivere il progetto. Se devi caricare il documento <a href="post-new.php?post_type=documento">puoi creare una breve scheda di presentazione</a> (soluzione consigliata e più efficace per gli utenti del sito) oppure caricarlo direttamente nei campi che seguono. ' , 'design_scuole_italia' ),
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


    $cmb_undercontent->add_field( array(
        'id'         => $prefix . 'gallery',
        'name'       => __( 'Galleria', 'design_scuole_italia' ),
        'desc'       => __( 'Galleria di immagini  significative relative al progetto, corredate da didascalia', 'design_scuole_italia' ),
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        'query_args' => array( 'type' => 'image' ), // Only images attachment
    ) );





    $cmb_risultati = new_cmb2_box( array(
        'id'           => $prefix . 'box_risultati_struttura',
        'title' =>  __( 'I Risultati', 'design_scuole_italia' ),
        'object_types' => array( 'scheda_progetto' ),
        'context'      => 'normal',
        'priority'     => 'high',
    ) );

    $cmb_risultati->add_field( array(
        'id' => $prefix . 'is_realizzato',
        'name'        => __( 'Progetto Realizzato', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona se il progetto è concluso, e descrivine i risultati.' , 'design_scuole_italia' ),
        'type'    => 'radio_inline',
        'options' => array(
            'true' => __( 'Si', 'design_scuole_italia' ),
            'false'   => __( 'No', 'design_scuole_italia' ),
        ),
        'default' => 'false',
    ) );

    $cmb_risultati->add_field( array(
        'id' => $prefix . 'risultati',
        'name'        => __( 'Risultati', 'design_scuole_italia' ),
        'desc' => __( 'Ampio testo descrittivo delle attività svolte nel progetto' , 'design_scuole_italia' ),
        'type' => 'wysiwyg',
        'options' => array(
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => 8, // rows="..."
            'teeny' => true, // output the minimal editor config used in Press This
        ),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'is_realizzato',
            'data-conditional-value' => "true",
        ),
    ) );


    $cmb_side = new_cmb2_box( array(
		'id'           => $prefix . 'box_side',
		'title'        => __( 'Data Progetto', 'design_scuole_italia' ),
		'object_types' => array( 'scheda_progetto' ),
		'context'      => 'side',
		'priority'     => 'high',
	) );


	$cmb_side->add_field( array(
		'id'         => $prefix . 'timestamp_inizio',
		'name' => 'Data Inizio',
		'type' => 'text_date_timestamp',
		'attributes' => array(
			'required' => 'required'
		),
	) );


	$cmb_side->add_field( array(
		'id'         => $prefix . 'timestamp_fine',
		'name' => 'Data Fine',
		'type' => 'text_date_timestamp',
		'attributes' => array(
			'required' => 'required'
		),
	) );


    $options_anno = array();
    for($i = date("Y")-10; $i < (date("Y")+10); $i++){
        $options_anno[$i] = $i."/".($i+1);
    }
    $cmb_side->add_field( array(
        'name'    =>  __( 'Anno scolastico di riferimento', 'design_scuole_italia' ),
        //'desc'    =>  __( 'Se non valorizzato verrà assegnato l\'anno in base alla data di inizo progetto, o in assenza alla data di pubblicazione.', 'design_scuole_italia' ),
        'id'   => $prefix.'anno_scolastico',
        'type'    => 'pw_select',
        'options' => $options_anno,
        'default' => dsi_get_current_anno_scolastico(),
    ) );


}


/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_scheda_progetto_add_content_after_title' );
function sdi_scheda_progetto_add_content_after_title($post) {
	if($post->post_type == "scheda_progetto")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome della Progetto</b>.  Vincoli: massimo 60 caratteri spazi inclusi</i></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_scheda_progetto_add_content_before_editor', 100 );
function sdi_scheda_progetto_add_content_before_editor($post) {
	if($post->post_type == "scheda_progetto")
        _e('<h1>Descrizione Estesa e Completa del Progetto</h1>', 'design_scuole_italia' );

}


new dsi_bidirectional_cmb2("_dsi_scheda_progetto_", "scheda_progetto", "link_strutture", "box_elementi_struttura", "_dsi_struttura_link_schede_progetti");



/**
 * aggiungo js per condizionale parent
 */
add_action( 'admin_print_scripts-post-new.php', 'dsi_progetto_admin_script', 11 );
add_action( 'admin_print_scripts-post.php', 'dsi_progetto_admin_script', 11 );

function dsi_progetto_admin_script() {
    global $post_type;
    if( 'scheda_progetto' == $post_type )
        wp_enqueue_script( 'progetto-admin-script', get_stylesheet_directory_uri() . '/inc/admin-js/progetto.js' );
}
