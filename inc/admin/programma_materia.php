<?php
/**
 * Definisce post type e tassonomie relative ad una materia
 */
add_action( 'init', 'dsi_register_materia_post_type', 0 );
function dsi_register_materia_post_type() {

	/** materia **/
	$labels = array(
		'name'          => _x( 'Programmi', 'Post Type General Name', 'design_scuole_italia' ),
		'singular_name' => _x( 'Programma di una Materia', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new'       => _x( 'Aggiungi un Programma', 'Post Type Singular Name', 'design_scuole_italia' ),
		'add_new_item'  => _x( 'Aggiungi un Programma di una Materia', 'Post Type Singular Name', 'design_scuole_italia' ),
        'edit_item'       => _x( 'Modifica il Programma', 'Post Type Singular Name', 'design_scuole_italia' ),
	);
	$args   = array(
		'label'         => __( 'Programma di una Materia', 'design_scuole_italia' ),
		'labels'        => $labels,
		'supports'      => array( 'title', 'editor', 'author' ,'thumbnail'),
		'taxonomies'    => array( 'classe' ),
		'hierarchical'  => false,
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-translation',
		'has_archive'   => true,
        'capability_type' => array('programma', 'programmi'),
        'map_meta_cap'    => true,
	);
	register_post_type( 'programma_materia', $args );


	$labels = array(
		'name'              => _x( 'Materie', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Materia', 'taxonomy singular name', 'design_scuole_italia' ),
		'search_items'      => __( 'Cerca Materia', 'design_scuole_italia' ),
		'all_items'         => __( 'Tutte le materie', 'design_scuole_italia' ),
		'edit_item'         => __( 'Modifica la Materia', 'design_scuole_italia' ),
		'update_item'       => __( 'Aggiorna la Materia', 'design_scuole_italia' ),
		'add_new_item'      => __( 'Aggiungi una Materia', 'design_scuole_italia' ),
		'new_item_name'     => __( 'Nuova Materia', 'design_scuole_italia' ),
		'menu_name'         => __( 'Materia', 'design_scuole_italia' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'materia' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_materie',
            'edit_terms'    => 'edit_materie',
            'delete_terms'  => 'delete_materie',
            'assign_terms'  => 'assign_materie'
        )
	);

	register_taxonomy( 'materia', array( 'programma_materia' ), $args );


}




/**
 * Crea i metabox del post type scheda
 */
add_action( 'cmb2_init', 'dsi_add_materia_metaboxes' );
function dsi_add_materia_metaboxes() {

	$prefix = '_dsi_materia_';


	$cmb_sottotitolo = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
		'object_types' => array( 'programma_materia' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );

	$cmb_sottotitolo->add_field( array(
		'id'         => $prefix . 'descrizione',
		'name'       => __( 'Descrizione *', 'design_scuole_italia' ),
		'desc'       => __( 'Breve descrizione del programma (max 160 caratteri) Vincoli: 160 caratteri spazi inclusi.', 'design_scuole_italia' ),
		'type'       => 'textarea',
		'attributes' => array(
			'maxlength' => '160',
			'required'  => 'required'
		),
	) );



	$cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_materia',
		'title'         => __( 'Dettagli Materia', 'design_scuole_italia' ),
		'object_types' => array( 'programma_materia' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'video',
		'name'       => __( 'Video', 'design_scuole_italia' ),
		'desc'       => __( 'Inserisci la url di un servizio di streaming video (es: youtube, vimeo) - Qui la lista: <a href="https://codex.wordpress.org/Embeds">https://codex.wordpress.org/Embeds</a>', 'design_scuole_italia' ),
		'type' => 'oembed',

	) );

	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'obiettivi',
		'name'       => __( 'Obiettivi', 'design_scuole_italia' ),
		'desc'       => __( 'Obiettivi del programma', 'design_scuole_italia' ),
		'type' => 'wysiwyg',
		'options' => array(
			'media_buttons' => false, // show insert/upload button(s)
			'textarea_rows' => 4, // rows="..."
			'teeny' => true, // output the minimal editor config used in Press This
		),

	) );

	/**  repeater attivita **/
	$group_field_id = $cmb_undercontent->add_field( array(
		'id'          => $prefix . 'attivita',
		'name'        => __('<h1>Attività</h1>', 'design_scuole_italia' ),
		'type'        => 'group',
		'description' => __( 'Lista delle attività', 'design_scuole_italia' ),
		'options'     => array(
			'group_title'    => __( 'Attività {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
			'add_button'     => __( 'Aggiungi una attività', 'design_scuole_italia' ),
			'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
			'sortable'       => true,
			// 'closed'      => true, // true to have the groups closed by default
			//'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'titolo_attivita',
		'description'    => __( 'Titolo della attività', 'design_scuole_italia' ),
		'type'    => 'text'

	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'descrizione_attivita',
		'description'    => __( 'Testo descrittivo della attività', 'design_scuole_italia' ),
		'type'    => 'textarea'

	) );

	/**  repeater libri **/
	/*
	$group_field_id = $cmb_undercontent->add_field( array(
		'id'          => $prefix . 'libri',
		'name'        => __('<h1>Libri</h1>', 'design_scuole_italia' ),
		'type'        => 'group',
		'description' => __( 'Lista libri obbligatori', 'design_scuole_italia' ),
		'options'     => array(
			'group_title'    => __( 'Libro {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
			'add_button'     => __( 'Aggiungi un libro', 'design_scuole_italia' ),
			'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
			'sortable'       => true,
			// 'closed'      => true, // true to have the groups closed by default
			//'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'titolo_libro',
		'description'    => __( 'Titolo del Libro', 'design_scuole_italia' ),
		'type'    => 'text'

	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'autore_libro',
		'description'    => __( 'Autore del libro', 'design_scuole_italia' ),
		'type'    => 'text'

	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'editore_libro',
		'description'    => __( 'Editore del libro', 'design_scuole_italia' ),
		'type'    => 'text'

	) );

	$cmb_undercontent->add_group_field( $group_field_id, array(
		'id' => 'isbn_libro',
		'description'    => __( 'Codice ISBN', 'design_scuole_italia' ),
		'type'    => 'text'

	) );
*/

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



	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'link_progetti',
		'name'    => __( 'Progetti', 'design_scuole_italia' ),
		'desc' => __( 'Link ad eventuali "progetti" associati al programma' , 'design_scuole_italia' ),
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => false, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => array('scheda_progetto'),
			), // override the get_posts args
		),
	) );


	$cmb_undercontent->add_field( array(
		'id'         => $prefix . 'note',
		'name'       => __( 'Note', 'design_scuole_italia' ),
		'desc'       => __( 'Note sul programma', 'design_scuole_italia' ),
		'type' => 'textarea',

	) );
}



/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_materia_add_content_after_title' );
function sdi_materia_add_content_after_title($post) {
	if($post->post_type == "programma_materia")
		_e('<span><i>il <b>Titolo</b> è il <b>Nome del Programma della Materia</b>.  Vincoli: massimo 60 caratteri spazi inclusi</i></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_materia_add_content_before_editor', 100 );
function sdi_materia_add_content_before_editor($post) {
	if($post->post_type == "programma_materia")
		_e('<h1>Descrizione Estesa e Completa della materia</h1>', 'design_scuole_italia' );
}

/** cambio la label autore e sposto in colonna destra in alto */
add_action('add_meta_boxes', 'sdi_materia_change_author_metabox');
function sdi_materia_change_author_metabox() {
	global $wp_meta_boxes;
	if(isset($wp_meta_boxes['programma_materia'])){
		$wp_meta_boxes['programma_materia']['normal']['core']['authordiv']['title']= 'Insegnante';
		array_unshift($wp_meta_boxes['programma_materia']['side']['core'], $wp_meta_boxes['programma_materia']['normal']['core']['authordiv']);
		unset($wp_meta_boxes['programma_materia']['normal']['core']['authordiv']);

	}
}
