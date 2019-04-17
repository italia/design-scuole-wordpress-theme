<?php
/**
 * Definisce post type e tassonomie relative alla struttura organizzativa
 */
add_action( 'init', 'dsi_register_struttura_post_type', 0 );
function dsi_register_struttura_post_type() {

	/** programma **/
	$labels = array(
		'name'          => _x( 'Strutture', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Struttura', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi Struttura Organizzativa', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi la Struttura Organizzativa', 'Post Type Singular Name', 'design_scuole_italia' ),
		'featured_image' => __( 'Immagine principale della Struttura', 'design_scuole_italia' ),
		'set_featured_image' => __( 'Seleziona Immagine' ),
		'remove_featured_image' => __( 'Rimuovi Immagine' , 'design_scuole_italia' ),
		'use_featured_image' => __( 'Usa come Immagine della Struttura' , 'design_scuole_italia' ),

	);
	$args   = array(
		'label'         => __( 'Struttura Organizzativa', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-networking',
		'has_archive'   => true,
	);
	register_post_type( 'struttura', $args );

}



/**
 * Crea i metabox del post type servizi
 */
add_action( 'cmb2_init', 'dsi_add_struttura_metaboxes' );
function dsi_add_struttura_metaboxes() {

	$prefix = '_dsi_struttura_';


	$cmb_sottotitolo = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
//		'title'        => __( 'Sottotitolo', 'design_scuole_italia' ),
		'object_types' => array( 'struttura' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );

	$cmb_sottotitolo->add_field( array(
		'id' => $prefix . 'tipologia',
		'name'        => __( 'Tipologia struttura', 'design_scuole_italia' ),
		'desc' => __( '"Presidenza" / "Segreteria" / "Scuola"' , 'design_scuole_italia' ),
		'type' => 'text',
	) );



	$cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_struttura',
		'title'         => __( 'Dettagli Struttura', 'design_scuole_italia' ),
		'object_types' => array( 'struttura' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'competenze',
		'name'        => __( 'Competenze *', 'design_scuole_italia' ),
		'desc' => __( 'Elenco/descrizione dei compiti assegnati alla struttura', 'design_scuole_italia' ),
		'type' => 'textarea',
		'repeatable'  => true,
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'responsabile',
		'name'        => __( 'Responsabile *', 'design_scuole_italia' ),
		'desc' => __( 'Link alla scheda responsabile della struttura. Se è una scuola di un istituto comprensivo, link al dirigente scolastico + link al responsabile del plesso, se  presente', 'design_scuole_italia' ),
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$cmb_undercontent->add_field( array(
		'name' => __( 'Persone', 'design_scuole_italia' ),
		'desc' => __( 'Eventuale lista delle persone che lavorano nella struttura. Es. personale di segreteria', 'design_scuole_italia' ),		'id'      => $prefix . 'user_multicheckbox',
		'type'    => 'multicheck_inline',
		'options' => dsi_get_cmb2_user( array( 'fields' => array( 'user_login' ) ) ),
	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'funzioni_strumentali',
		'name'        => __( 'Funzioni strumentali', 'design_scuole_italia' ),
		'desc' => __( 'Se è una presidenza, elenco delle funzioni strumentali con il relativo responsabile (link alla scheda se disponibile)', 'design_scuole_italia' ),
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_schede_servizi',
		'name'    => __( 'Servizi ', 'design_scuole_italia' ),
		'before' => __( '<p>Link alle schede servizio gestite dalla struttura. Es. se la segreteria è responsabile del servizio di delega, ci sarà un link alla scheda "Delega per ingressi e uscite anticipati". Se la dirigenza è responsabile del servizio "Alternanza scuola lavoro" ci sarà un link alla relativa scheda </p>' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'servizio',
			), // override the get_posts args
		),
	) );



	/**  repeater sedi **/
	$group_field_id = $cmb_undercontent->add_field( array(
		'id'          => $prefix . 'sedi',
		'name'        => __('<h1>Sedi</h1>', 'design_scuole_italia' ),
		'type'        => 'group',
		'description' => __( 'La sede è una sede aperta al pubblico. Es. segreteria scolastica - sede principale', 'design_scuole_italia' ),
		'options'     => array(
			'group_title'    => __( 'Sede {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
			'add_button'     => __( 'Aggiungi un\'altra Sede', 'design_scuole_italia' ),
			'remove_button'  => __( 'Rimuovi la Sede', 'design_scuole_italia' ),
			'sortable'       => true,
			// 'closed'      => true, // true to have the groups closed by default
			//'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Nome *', 'design_scuole_italia' ),
		'desc'       => __('Nome della sede che eroga il servizio', 'design_scuole_italia' ),
		'id'         => 'nome',
		'type'       => 'text',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Link Luogo', 'design_scuole_italia' ),
		'desc'       => __('Link alla scheda Luogo, se esistente', 'design_scuole_italia' ),
		'id'         => 'link',
		'type'       => 'text_url',
	) );


	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Indirizzo *', 'design_scuole_italia' ),
		'desc'       => __('Indirizzo della sede.', 'design_scuole_italia' ),
		'id'         => 'indirizzo',
		'type'       => 'textarea_small',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Orario per il pubblico *', 'design_scuole_italia' ),
		'desc'       => __('Orario di apertura al pubblico della sede.', 'design_scuole_italia' ),
		'id'         => 'orario',
		'type'       => 'textarea_small',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Posizione GPS *', 'design_scuole_italia' ),
		'desc'       => __('Georeferenziazione della sede e link a posizione in mappa.' ),
		'id'         => 'posizione_gps',
		'type'       => 'leaflet_map',
		'attributes' => array(
//			'tilelayer'           => 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
			'searchbox_position'  => 'topleft', // topright, bottomright, topleft, bottomleft,
			'search'              => __( 'Digita l\'indirizzo della Sede' , 'design_scuole_italia' ),
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


	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('CAP *', 'design_scuole_italia' ),
		'desc'       => __('Codice di avviamento postale della sede.', 'design_scuole_italia' ),
		'id'         => 'cap',
		'type'       => 'text_small',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Riferimento telefonico', 'design_scuole_italia' ),
		'desc'       => __('Telefono della sede' ),
		'id'         => 'telefono',
		'type'       => 'text_medium',

	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __('Riferimento mail', 'design_scuole_italia' ),
		'desc'       => __('Indirizzo di posta elettronica della sede.' ),
		'id'         => 'mail',
		'type'       => 'text_medium',

	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'name'       => __(' Riferimento pec', 'design_scuole_italia' ),
		'desc'       => __('Indirizzo di posta elettronica certificata della sede.' ),
		'id'         => 'pec',
		'type'       => 'text_medium',
		'attributes'    => array(
			'required'    => 'required'
		),

	) );
	/* fine sedi */

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'altre_info',
		'name'        => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
		'desc' => __( 'Ulteriori informazioni sul Servizio, FAQ ed eventuali riferimenti normativi' , 'design_scuole_italia' ),
		'type'    => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),
	) );


}


/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_struttura_add_content_after_title' );
function sdi_struttura_add_content_after_title($post) {
	if($post->post_type == "struttura")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome della struttura organizzativa</b>. es: Presidenza / Segreteria / Scuola del nome istituto</i></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_struttura_add_content_before_editor', 100 );
function sdi_struttura_add_content_before_editor($post) {
	if($post->post_type == "struttura")
		_e('<h1>Descrizione Breve (abstract) </h1>', 'design_scuole_italia' );
}


