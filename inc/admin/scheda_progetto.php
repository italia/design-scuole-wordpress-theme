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
		'desc' => __( 'Obiettivi della Scheda' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$cmb_sottotitolo->add_field( array(
		'id'         =>  $prefix . 'data_inizio_attivita',
		'name'       => __('Data inizio', 'design_scuole_italia' ),
		'desc'       => __('Data inizio attività', 'design_scuole_italia' ),
		'type'       => 'text_date',
		'date_format' => 'd-m-Y'
	) );


	$cmb_sottotitolo->add_field(  array(
		'id'         =>  $prefix . 'data_fine_attivita',
		'name'       => __('Data fine', 'design_scuole_italia' ),
		'desc'       => __('Data fine attività', 'design_scuole_italia' ),
		'type'       => 'text_date',
		'date_format' => 'd-m-Y'
	) );


}


/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_scheda_progetto_add_content_after_title' );
function sdi_scheda_progetto_add_content_after_title($post) {
	if($post->post_type == "scheda_progetto")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome della Scheda</b>.  Vincoli: massimo 60 caratteri spazi inclusi</i></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_scheda_progetto_add_content_before_editor', 100 );
function sdi_scheda_progetto_add_content_before_editor($post) {
	if($post->post_type == "scheda_progetto")
		_e('<h1>Descrizione Estesa e Completa della scheda</h1>', 'design_scuole_italia' );
}
