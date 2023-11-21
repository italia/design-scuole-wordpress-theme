<?php
/**
 * Definisce post type e tassonomie relative alle schede didattiche
 */
add_action( 'init', 'dsi_register_scheda_didattica_post_type', 0 );
function dsi_register_scheda_didattica_post_type() {

	/** scheda **/
	$labels = array(
		'name'          => _x( 'Le schede didattiche', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Scheda Didattica', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi una Scheda', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi una nuova Scheda', 'Post Type Singular Name', 'design_scuole_italia' ),
        'edit_item'       => _x( 'Modifica la Scheda', 'Post Type Singular Name', 'design_scuole_italia' ),
		'featured_image' => __( 'Immagine di riferimento della scheda', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Scheda Didattica', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor', 'author', 'thumbnail'),
		'taxonomies'    => array( 'post_tag' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-media-interactive',
		'has_archive'   => true,
        'capability_type' => array('scheda_didattica', 'schede_didattica'),
        'rewrite' => array('slug' => 'scheda-didattica','with_front' => false),
        'map_meta_cap'    => true,
        'description'    => __( "Approfondimenti tematici, guide e esercizi creati dai docenti della scuola e a disposizione di tutti.", 'design_scuole_italia' ),
	);
	register_post_type( 'scheda_didattica', $args );

}



/**
 * Crea i metabox del post type scheda
 */
add_action( 'cmb2_init', 'dsi_add_scheda_didattica_metaboxes' );
function dsi_add_scheda_didattica_metaboxes() {

	$prefix = '_dsi_scheda_didattica_';


	$cmb_sottotitolo = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
		'object_types' => array( 'scheda_didattica' ),
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
		'desc' => __( 'Obiettivi del progetto.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.' , 'design_scuole_italia' ),
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
		'id' => $prefix . 'tempo_apprendimento',
		'name'        => __( 'Tempo di apprendimento', 'design_scuole_italia' ),
		'desc' => __( 'Tempo di apprendimento' , 'design_scuole_italia' ),
		'type' => 'text'
	) );


    $cmb_sottotitolo->add_field( array(
        'id' => $prefix . 'livello',
        'name'        => __( 'Livello', 'design_scuole_italia' ),
        'desc'        => __( 'Indicazione dei cicli scolastici per i quali la scheda è utile: scuola primaria / scuola secondaria di primo grado /  
scuola secondaria secondo grado / percorsi di istruzione e formazione professionale', 'design_scuole_italia' ),
        'type'             => 'taxonomy_multicheck_hierarchy_child',
        'select_all_button' => false,
        'taxonomy'       => 'percorsi-di-studio',
        'remove_default' => 'true',
        'attributes' => array(
              'data-only-parent' => true,
        ),
    ) );


    $cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_scheda',
		'title'         => __( 'Dettagli Scheda Didattica', 'design_scuole_italia' ),
		'object_types' => array( 'scheda_didattica' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'descrizione_attivita',
		'name'        => __( 'Descrizione dell\'attività', 'design_scuole_italia' ),
		'desc' => __( 'Descrizione dell\'attività. Es. "Dopo aver letto la scheda, rispondi alle domande di verifica" oppure, "Di seguito trovi i passi da seguire per seminare una pianta in primavera"
' , 'design_scuole_italia' ),
		'type' => 'textarea'
	) );
	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'fasi_attivita',
		'name'        => __( 'Fasi attività', 'design_scuole_italia' ),
		'desc' => __( 'lista di task da svolgere' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'repeatable'  => true,
		'options'     => array(
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'fasi_verifica',
		'name'        => __( 'Verifica apprendimento', 'design_scuole_italia' ),
		'desc' => __( 'lista  di domande o di fasi di un compito da svolgere' , 'design_scuole_italia' ),
		'type' => 'textarea',
		'repeatable'  => true,
		'options'     => array(
			'sortable'      => true,  // Allow changing the order of repeated groups.
		),
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_schede_materiale_didattico',
		'name'    => __( 'Materiali didattici', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci qui tutti i documenti creati come Materiale Didattico. Se devi caricare il documento <a href="post-new.php?post_type=documento">puoi creare una breve scheda di presentazione</a> (soluzione consigliata e più efficace per gli utenti del sito) oppure caricarlo direttamente nei campi che seguono. ' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => array('documento', 'scheda_didattica'),
			), // override the get_posts args
		),
	) );


	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'file_documenti',
		'name'    => __( 'Carica documenti', 'design_scuole_italia' ),
		'desc' => __( 'Se il Materiale Didattico non è descritto da una scheda documento, link al materiale didattivo. ' , 'design_scuole_italia' ),
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


}


/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_scheda_didattica_add_content_after_title' );
function sdi_scheda_didattica_add_content_after_title($post) {
	if($post->post_type == "scheda_didattica")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome della Scheda Didattica</b>.  Vincoli: massimo 60 caratteri spazi inclusi</i></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_scheda_didattica_add_content_before_editor', 100 );
function sdi_scheda_didattica_add_content_before_editor($post) {
	if($post->post_type == "scheda_didattica")
		_e('<h1>L\'argomento della scheda</h1>', 'design_scuole_italia' );
}

/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_scheda_didattica_add_content_after_editor', 100 );
function sdi_scheda_didattica_add_content_after_editor($post) {
    if($post->post_type == "scheda_didattica")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}
