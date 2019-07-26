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
		'edit_item'      => _x( 'Modifica la Struttura Organizzativa', 'Post Type Singular Name', 'design_scuole_italia' ),
		'view_item'      => _x( 'Visualizza la Struttura Organizzativa', 'Post Type Singular Name', 'design_scuole_italia' ),
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
		'rewrite'           => array( 'slug' => 'tipologia-struttura' ),
	);

	register_taxonomy( 'tipologia-struttura', array( 'struttura' ), $args );


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
		'type'             => 'taxonomy_radio_inline',
		'taxonomy'       => 'tipologia-struttura',
		'remove_default' => 'true'
	) );


	$cmb_sottotitolo->add_field( array(
		'id' => $prefix . 'descrizione',
		'name'        => __( 'Descrizione Breve', 'design_scuole_italia' ),
		'desc' => __( 'Indicare una sintetica descrizione della struttura (max 160 caratteri) ' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'maxlength'  => '160'
		),
	) );


	$cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_struttura',
		'title'         => __( 'Dettagli Struttura', 'design_scuole_italia' ),
		'object_types' => array( 'struttura' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );



	$group_field_id = $cmb_undercontent->add_field( array(
		'id'          => $prefix . 'didattica',
		'name'        => __('<h1>Didattica</h1>', 'design_scuole_italia' ),
		'type'        => 'group',
		'description' => __( 'Se la struttura descritta è una <scuola> indicazione dei cicli scolastici presenti nella scuola (scuola infanzia / primo ciclo / secondo ciclo) e link alle relative sezioni della sezione didattica', 'design_scuole_italia' ),
		'options'     => array(
			'group_title'    => __( 'Didattica {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
			'add_button'     => __( 'Aggiungi', 'design_scuole_italia' ),
			'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
			'sortable'       => true,
			'closed'      => false, // true to have the groups closed by default
			//'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );


	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'nome_ciclo',
		'name'    => __( 'Il nome del ciclo scolastico (scuola infanzia / primo ciclo / secondo ciclo, etc)', 'design_scuole_italia' ),
		'type'             => 'text',
	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'url_ciclo',
		'name'    => __( 'Link della relativa sezione didattica', 'design_scuole_italia' ),
		'type'             => 'text_url',
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
				'posts_per_page' => -1,
				'post_type'      => 'servizio',
			), // override the get_posts args
		),
	) );


	$cmb_undercontent->add_field( array(
			'name'       => __('Responsabile ', 'design_scuole_italia' ),
			'desc' => __( 'Link alla scheda responsabile della struttura. ', 'design_scuole_italia' ),
			'id' => $prefix . 'responsabile',
			'type'    => 'pw_multiselect',
			'options' => dsi_get_user_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
			),
		)
	);



	$cmb_undercontent->add_field( array(
			'name'       => __('Persone ', 'design_scuole_italia' ),
			'desc' => __( 'Eventuale lista delle persone che lavorano nella struttura', 'design_scuole_italia' ),
			'id' => $prefix . 'persone',
			'type'    => 'pw_multiselect',
			'options' => dsi_get_user_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
			),
		)
	);




	$cmb_undercontent->add_field( array(
		'id' => $prefix .'sedi',
		'name'    => __( 'Luoghi', 'design_scuole_italia' ),
		'desc' => __( 'Selezione i <a href="edit.php?post_type=luogo">luoghi</a> che rappresentano le sedi della struttura, in ordine di importanza se più di uno. ' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => -1,
				'post_type'      => 'luogo',
			), // override the get_posts args
		),
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'telefono',
		'name'       => __( 'Riferimento telefonico', 'design_scuole_italia' ),
		'desc'       => __( 'Telefono del luogo. ', 'design_scuole_italia' ),
		'type'       => 'text',
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'mail',
		'name'       => __( 'Riferimento mail', 'design_scuole_italia' ),
		'desc'       => __( 'Indirizzo di posta elettronica della struttura. ', 'design_scuole_italia' ),
		'type'       => 'text_email',
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'pec',
		'name'       => __( 'Pec', 'design_scuole_italia' ),
		'desc'       => __( 'Indirizzo di Posta Elettronica Certificata. ', 'design_scuole_italia' ),
		'type'       => 'text_email',
	) );



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
		_e('<h1>Cosa fa </h1> Elenco/descrizione dei compiti assegnati alla struttura', 'design_scuole_italia' );
}


