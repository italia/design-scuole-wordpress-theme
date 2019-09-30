<?php
add_action( 'init', 'dsi_register_articolo_post_tax', 0 );
function dsi_register_articolo_post_tax() {

	$labels = array(
		'name'              => _x( 'Tipologia Articolo ', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Tipologia Articolo', 'taxonomy singular name', 'design_scuole_italia' ),
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
		'rewrite'           => array( 'slug' => 'tipologia-articolo' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_articoli',
            'edit_terms'    => 'edit_tipologia_articoli',
            'delete_terms'  => 'delete_tipologia_articoli',
            'assign_terms'  => 'assign_tipologia_articoli'
        )
	);

	register_taxonomy( 'tipologia-articolo', array( 'post' ), $args );

}

/**
 * Crea i metabox del post type post
 */
add_action( 'cmb2_init', 'dsi_add_articolo_metaboxes' );
function dsi_add_articolo_metaboxes() {

	$prefix = '_dsi_articolo_';


	$cmb_tipologie = new_cmb2_box( array(
		'id'           => $prefix . 'box_sottotitolo',
//		'title'        => __( 'Sottotitolo', 'design_scuole_italia' ),
		'object_types' => array( 'post' ),
		'context'      => 'after_title',
		'priority'     => 'high',
	) );


    $cmb_tipologie->add_field( array(
        'id' => $prefix . 'tipologia',
        'name'        => __( 'Tipologia articolo', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona "Articoli" se vuoi vada ad arricchire la sezione "Presentazione" della scuole (Es: Presentazione del nuovo anno da parte del dirigente). In Caso di "Circolare" compilare i campi che seguono.' , 'design_scuole_italia' ),
        'type'             => 'taxonomy_radio_inline',
        'taxonomy'       => 'tipologia-articolo',
        'show_option_none' => false,
        'remove_default' => 'true',
        'default'          => 'articoli',
        'attributes' => array(
            'required'  => 'required'
        ),
    ) );

    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'numerazione_circolare',
        'name' => __('Numerazione Circolare', 'design_scuole_italia'),
        'type' => 'text_small',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "circolari",
        ),
    ));

    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'is_pubblica',
        'name' => __('Visibilità della Circolare sul sito', 'design_scuole_italia'),
        'desc' => __('Seleziona se il documento è pubblico o visibile solo agli utenti registrati indicati di seguito', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'true',
        'options' => array(
            'true' => __('Pubblica', 'design_scuole_italia'),
            'false' => __('Personale Scolastico (utenti registrati)', 'design_scuole_italia'),
        ),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "circolari",
        ),
    ));

    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'circolare_title',
        'name' => __('Notifiche agli utenti', 'design_scuole_italia'),
        'desc' => __('Le circolari inviano notifiche al destinatario, e rendono visibile la circolare sulla sua bacheca utente.<br> NB: Le notifiche vengono inviate <b>al primo salvataggio dell\'articolo in stato "pubblicato"<b>. <b>Da quel momento in poi cambiamenti nei campi che seguono non genereranno notifiche agli utenti</b>.' , 'design_scuole_italia'),
        'type' => 'title',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "circolari",
        ),
    ));


    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'require_feedback',
        'name' => __('Richiedi un Feedback agli utenti:', 'design_scuole_italia'),
        'desc' => __(' Se la circolare è di tipologia "assemblea sindacale" l\'azione richiesta è "Sì/NO. Se la circolare è di tipologia "sciopero" l\'azione richiesta è "Adesione sì/no/presa visione".', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => "false",
        'options' => array(
            "false" => __('Nessun Feedback ', 'design_scuole_italia'),
            'presa_visione' => __('Presa Visione', 'design_scuole_italia'),
            'si_no' => __('Si / No', 'design_scuole_italia'),
            'si_no_visione' => __('Si / No / Presa Visione', 'design_scuole_italia'),
        ),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "circolari",
        ),
    ));

    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'destinatari_circolari',
        'name' => __('Destinatari della Circolare', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'all',
        'options' => array(
            'all' => __('Tutta la Scuola', 'design_scuole_italia'),
            'ruolo' => __('Seleziona in base al ruolo', 'design_scuole_italia'),
            'gruppo' => __('Seleziona in base al gruppo', 'design_scuole_italia'),
        ),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "circolari",
        ),
    ));


    $cmb_tipologie->add_field( array(
            'name'       => __('Seleziona i ruoli ', 'design_scuole_italia' ),
            'id' => $prefix . 'ruoli_circolari',
            'type'    => 'pw_multiselect',
            'options' => dsi_get_roles_options(),
            'attributes' => array(
                'placeholder' =>  __( 'Ruoli', 'design_scuole_italia' ),
                'data-conditional-id' => $prefix . 'destinatari_circolari',
                'data-conditional-value' => "ruolo",
            ),
        )
    );

    $cmb_tipologie->add_field( array(
            'name'       => __('Seleziona i gruppi ', 'design_scuole_italia' ),
            'id' => $prefix . 'gruppi_circolari',
            'type'    => 'pw_multiselect',
            'options' => dsi_get_gruppi_options(),
            'attributes' => array(
                'placeholder' =>  __( 'Gruppi', 'design_scuole_italia' ),
                'data-conditional-id' => $prefix . 'destinatari_circolari',
                'data-conditional-value' => "gruppo",
            ),
        )
    );



    $cmb_abstrat = new_cmb2_box( array(
        'id'           => $prefix . 'box_abstract',
        'object_types' => array( 'post' ),
        'context'      => 'after_title',
        'priority'     => 'high',
    ) );

    $cmb_abstrat->add_field( array(
        'id' => $prefix . 'descrizione',
        'name'        => __( 'Abstract', 'design_scuole_italia' ),
        'desc' => __( 'Indicare un sintetico abstract (max 160 caratteri)' , 'design_scuole_italia' ),
        'type' => 'textarea',
        'attributes'    => array(
            'maxlength'  => '160'
        ),
    ) );

    $cmb_undercontent = new_cmb2_box( array(
		'id'           => $prefix . 'box_elementi_articolo',
		'title'         => __( 'Dettagli Articolo', 'design_scuole_italia' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'high',
	) );
	$cmb_undercontent->add_field( array(
			'id' => $prefix . 'persone',
			'name'       => __('Persone ', 'design_scuole_italia' ),
			'desc' => __( 'Link a schede persone dell\'amminsitrazione citate', 'design_scuole_italia' ),
			'type'    => 'pw_multiselect',
			'options' => dsi_get_user_options(),
			'attributes' => array(
				'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
			),
		)
	);

	$cmb_undercontent->add_field( array(
		'id' => $prefix . 'luoghi',
		'name'    => __( 'Luogo', 'design_scuole_italia' ),
		'desc' => __( 'Link a schede luoghi del sito citati  ' , 'design_scuole_italia' ),
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
		'id' => $prefix . 'link_schede_documenti',
		'name'    => __( 'Documenti', 'design_scuole_italia' ),
		'desc' => __( 'Inserisci qui tutti i documenti che ritieni rilevanti. Se devi caricare il documento <a href="post-new.php?post_type=documento">puoi creare una breve scheda di presentazione</a> (soluzione consigliata e più efficace per gli utenti del sito) oppure caricarlo direttamente nei campi che seguono. ' , 'design_scuole_italia' ),
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
		'desc' => __( 'Se l\'allegato non è descritto da una scheda documento, link all\'allegato. ' , 'design_scuole_italia' ),
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


add_action( 'save_post', 'dsi_feedback_circolare', 100, 2 );

function dsi_feedback_circolare( $post_id, $post )
{

    if ( 'publish' !== $post->post_status)
        return;

    if ( 'post' !== $post->post_type )
        return; // restrict the filter to a specific post type

    $notificato = get_post_meta($post->ID, "notificato", true);

    if($notificato == "true")
        return; // già notificato, non procedo

    $require_feedback = dsi_get_meta("require_feedback", '_dsi_articolo_', $post->ID);

    if($require_feedback == "false")
        return;

    // recupero la selezione destinatari
    $destinatari_circolari = dsi_get_meta("destinatari_circolari", '_dsi_articolo_', $post->ID);
    $users = array();

    if($destinatari_circolari == "all"){
        $users = get_users( array( 'fields' => array( 'ID' ) ) );
    }else if($destinatari_circolari == "ruolo"){
        $ruoli_circolari = dsi_get_meta("ruoli_circolari", '_dsi_articolo_', $post->ID);
        $users = get_users( array( 'role__in' => $ruoli_circolari, 'fields' => array( 'ID' ) ) );
    }else if($destinatari_circolari == "gruppo"){
        $gruppi_circolari = dsi_get_meta("gruppi_circolari", '_dsi_articolo_', $post->ID);
        $users = get_objects_in_term( $gruppi_circolari, "gruppo-utente" );
    }

    if(count($users)){
        foreach ($users as $user){
            dsi_notify_circolare_to_user($user->ID, $post);
        }
        update_post_meta($post->ID, "notificato", "true");
    }
}