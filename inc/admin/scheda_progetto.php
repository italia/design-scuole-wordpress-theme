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
	);
	register_post_type( 'scheda_progetto', $args );

}



/**
 * Crea i metabox del post type scheda
 */
add_action( 'cmb2_init', 'dsi_add_scheda_progetto_metaboxes' );
function dsi_add_scheda_progetto_metaboxes() {

	$prefix = '_dsi_scheda_progetto_';
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
			'name'       => __('Partecipanti ', 'design_scuole_italia' ),
			'desc' => __( 'lista dei link alle sezioni che hanno partecipato' , 'design_scuole_italia' ),
			'id'             => $prefix . 'classi',
			'type'    => 'multicheck_inline',
			'options' => dsi_get_classe_options(),
		)
	);





	$cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottoilcontent',
		'title' =>  __( 'Luogo', 'design_scuole_italia' ),
		'object_types' => array( 'scheda_progetto' ),
		'context'      => 'normal',
		'priority'     => 'high',
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
	) );

	$cmb_undercontent->add_field( array(
		'id' =>  $prefix . 'nome_luogo_custom',
		'name'    => __( 'Nome del luogo (se NON è un luogo della Scuola)', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci il nome del luogo (lascia vuoto hai selezionato un Luogo della Scuola )' , 'design_scuole_italia' ),
		'type'    => 'text',
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'indirizzo_luogo_custom',
		'name'       => __( 'Indirizzo Completo (se NON è un luogo della Scuola)', 'design_scuole_italia' ),
		'desc'       => __( 'Indirizzo completo del luogo: Via, civico, cap, città e Provincia (es: Via Vaglia, 6, 00139 - Roma RM) (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text'
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'posizione_gps_luogo_custom',
		'name'       => __( 'Posizione GPS  (se NON è un luogo della Scuola)', 'design_scuole_italia' ),
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
			'required'    => 'required'
		)
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'quartiere_luogo_custom',
		'name'       => __( 'Quartiere   (se NON è un luogo della Scuola)', 'design_scuole_italia' ),
		'desc'       => __( 'Se il territorio è mappato in quartieri, riportare il Quartiere dove si svolge l\'evento (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'circoscrizione_luogo_custom',
		'name'       => __( 'Circoscrizione   (se NON è un luogo della Scuola)', 'design_scuole_italia' ),
		'desc'       => __( 'Se il territorio è mappato in circoscrizioni, riportare la Circoscrizione dove si svolge l\'evento (lascia vuoto hai selezionato un Luogo della Scuola )', 'design_scuole_italia' ),
		'type'       => 'text',
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
		_e('<h1>Risultati</h1><p>Ampio testo descrittivo delle attività svolte nel progetto, può includere una fotogalleria di immagini e/o include a un video di youtube</p>', 'design_scuole_italia' );
}
