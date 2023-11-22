<?php
/**
 * Definisce i campi custom degli user come persone
 */


/**
 * Definisce post type e tassonomie relative ai documenti
 */
add_action( 'init', 'dsi_register_user_terms');
function dsi_register_user_terms()
{
    $labels = array(
        'name'              => _x( 'Gruppo Utente', 'taxonomy general name', 'design_scuole_italia' ),
        'singular_name'     => _x( 'Gruppo Utente', 'taxonomy singular name', 'design_scuole_italia' ),
        'search_items'      => __( 'Cerca', 'design_scuole_italia' ),
        'all_items'         => __( 'Tutti i gruppi', 'design_scuole_italia' ),
        'edit_item'         => __( 'Modifica il gruppo', 'design_scuole_italia' ),
        'update_item'       => __( 'Aggiorna il gruppo', 'design_scuole_italia' ),
        'add_new_item'      => __( 'Aggiungi una gruppo', 'design_scuole_italia' ),
        'new_item_name'     => __( 'Nuovo gruppo', 'design_scuole_italia' ),
        'menu_name'         => __( 'Gruppi', 'design_scuole_italia' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'gruppo-utente' ),
    );

    register_taxonomy( 'gruppo-utente',  'user' , $args );

}

add_filter( 'gettext', 'dsi_change_user_to_person' );
add_filter( 'ngettext', 'dsi_change_user_to_person' );

/*
 * Cambio label per caratterizzare gli utenti potenziati
 */
function dsi_change_user_to_person( $translated )
{
	$translated = str_replace( 'Utenti', 'Utenti/Persone', $translated );
	return $translated;
}

add_action( 'admin_head-user-edit.php', 'dsi_remove_user_profile_fields_with_css' );
add_action( 'admin_head-profile.php',   'dsi_remove_user_profile_fields_with_css' );

/**
 * Nascondo i campi inutili\
 */
function dsi_remove_user_profile_fields_with_css() {
//Hide unwanted fields in the user profile
	$fieldsToHide = [
		'rich-editing',
		'admin-color',
		'comment-shortcuts',
		//'admin-bar-front',
		//'user-login',
		//'role',
		//'super-admin',
		//'first-name',
		//'last-name',
		//'nickname',
		//'display-name',
		//'email',
		//'description',
		//'pass1',
		//'pass2',
		//'sessions',
		//'capabilities',
		//'syntax-highlighting',
		'url'

	];

	//add the CSS
	foreach ($fieldsToHide as $fieldToHide) {
		echo '<style>tr.user-'.$fieldToHide.'-wrap{ display: none; }</style>';
	}

	//fields that don't follow the wrapper naming convention
	echo '<style>tr.user-profile-picture{ display: none; }</style>';

	//all subheadings
	echo '<style>#your-profile h2{ display: none; }</style>';
}



/**
 * Sostituisco gravatar con la foto utente
 */

function remove_avatar_from_users_list( $avatar ) {
    if (is_admin()) {
	    global $current_screen;
	    //	    if ( $current_screen->base == 'users' ) {
	    // todo: recuperare la thumb del profilo per mostrarla nella pagina di lista
		    $avatar = '';
		//	    }
    }
    return $avatar;
}
add_filter( 'get_avatar', 'remove_avatar_from_users_list' );



/**
 * Crea i metabox dello user
 */
add_action( 'cmb2_init', 'dsi_add_persone_metaboxes' );
function dsi_add_persone_metaboxes() {

	$prefix = '_dsi_persona_';

	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'persona_box',
		'title'            => __( 'Persona', 'design_scuole_italia' ),
		// Doesn't output for user boxes
		'object_types'     => array( 'user' ),
		// Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user',
        //'new_user_section' => 'add-existing-user',
        // where form will show on new user page. 'add-existing-user' is only other valid option.
        'context'      => 'normal',
		'priority'     => 'high',
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'La Persona', 'design_scuole_italia' ),
		'desc'     => __( 'Attributi che estendono le caratteristiche dell\'utente' , 'design_scuole_italia' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Foto della Persona', 'design_scuole_italia' ),
		'desc'    => __( 'Inserire una fotografia che ritrae il soggetto descritto nella scheda', 'design_scuole_italia' ),
		'id'      => $prefix . 'foto',
		'type'    => 'file',
	) );



	$cmb_user->add_field( array(
		'name'    => __( 'Ruolo nell\'organizzazione *', 'design_scuole_italia' ),
		'desc'    => __( 'Dirigente / Personale docente / Personale non docente', 'design_scuole_italia' ),
		'id'      => $prefix . 'ruolo_scuola',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
            'none' => __( 'Nessuno', 'design_scuole_italia' ),
			'dirigente' => __( 'Dirigente Scolastico', 'design_scuole_italia' ),
			'docente' => __( 'Personale Docente', 'design_scuole_italia' ),
			'personaleata'   => __( 'Personale non docente', 'design_scuole_italia' ),
            'altro'   => __( 'Altro', 'design_scuole_italia' )

        ),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Ruolo Docente', 'design_scuole_italia' ),
		'desc'    => __( 'Seleziona la tipologia di ruolo docente', 'design_scuole_italia' ),
		'id'      => $prefix . 'ruolo_docente',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'infanzia' => __( 'Scuola Infanzia', 'design_scuole_italia' ),
			'primaria' => __( 'Scuola Primaria', 'design_scuole_italia' ),
			'secondaria1' => __( 'Scuola Secondaria I grado', 'design_scuole_italia' ),
			'secondaria2' => __( 'Scuola Secondaria II grado', 'design_scuole_italia' ),
			'formazione' => __( 'Percorsi di Istruzione e Formazione Professionale', 'design_scuole_italia' ),
		),
		'attributes'    => array(
			'data-conditional-id'     => $prefix . 'ruolo_scuola',
			'data-conditional-value'  => 'docente',
		),
	) );
	$cmb_user->add_field( array(
		'name'    => __( 'Incarico', 'design_scuole_italia' ),
		'desc'    => __( 'Se docente: con incarico a tempo determinato/indeterminato', 'design_scuole_italia' ),
		'id'      => $prefix . 'incarico_docente',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'determinato' => __( 'Incarico a Tempo Determinato', 'design_scuole_italia' ),
			'indeterminato' => __( 'Incarico a Tempo Indeterminato', 'design_scuole_italia' ),
		),
		'attributes'    => array(
			'data-conditional-id'     => $prefix . 'ruolo_scuola',
			'data-conditional-value'  => 'docente',
		),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Durata Incarico', 'design_scuole_italia' ),
		'id'      => $prefix . 'durata_incarico_docente',
		'desc'    => __( 'Se docente a tempo determinato, prevedere data scadenza incarico', 'design_scuole_italia' ),
		'type' => 'text_date',
		'date_format' => 'd-m-Y',
		'attributes'    => array(
			'data-conditional-id'     => $prefix . 'incarico_docente',
			'data-conditional-value'  => 'determinato',
		),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Tipo posto', 'design_scuole_italia' ),
		'desc'    => __( 'Nomale / Sostegno', 'design_scuole_italia' ),
		'id'      => $prefix . 'tipo_posto',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'normale' => __( 'Normale', 'design_scuole_italia' ),
			'sostegno' => __( 'Sostegno', 'design_scuole_italia' ),
		),
		'attributes'    => array(
            'data-conditional-id'     => $prefix . 'incarico_docente',
            'data-conditional-value'  => 'determinato',
		),
	) );


/*
	$cmb_user->add_field( array(
		'name'    => __( 'Tipo supplenza', 'design_scuole_italia' ),
		'desc'    => __( 'Se supplente - Tipologia supplenza. <br>Assume valori: ANNUALE per le supplenze di durata fino al 31/08 e FINO AL TERMINE per le supplenze di durata fino al 30/06', 'design_scuole_italia' ),
		'id'      => $prefix . 'tipo_supplenza',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'annuale' => __( 'Annuale', 'design_scuole_italia' ),
			'termine' => __( 'Fino al termine', 'design_scuole_italia' ),
            'data' => __( 'Fino a data specifica (da indicare)', 'design_scuole_italia' ),
		),
		'attributes'    => array(
			'data-conditional-id'     => $prefix . 'tipo_posto',
			'data-conditional-value'  => 'sostegno',
		),
	) );


    $cmb_user->add_field( array(
        'name'    => __( 'Durata supplenza', 'design_scuole_italia' ),
        'id'      => $prefix . 'durata_supplenza',
        'desc'    => __( 'Sata scadenza incarico', 'design_scuole_italia' ),
        'type' => 'text_date',
        'date_format' => 'd-m-Y',
        'attributes'    => array(
            'data-conditional-id'     => $prefix . 'tipo_supplenza',
            'data-conditional-value'  => 'data',
        ),
    ) );
*/
	$cmb_user->add_field( array(
		'name'    => __( 'Tipologia personale non docente', 'design_scuole_italia' ),
		'desc'    => __( 'Seleziona la tipologia di ruolo', 'design_scuole_italia' ),
		'id'      => $prefix . 'ruolo_non_docente',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'direttore-amministrativo' => __( 'Direttore Amministrativo', 'design_scuole_italia' ),
			'tecnico' => __( 'Personale Tecnico', 'design_scuole_italia' ),
			'amministrativo' => __( 'Personale Amministrativo', 'design_scuole_italia' ),
			'collaboratore' => __( 'Collaboratore Scolastico', 'design_scuole_italia' ),
			),
		'attributes'    => array(
			'data-conditional-id'     => $prefix . 'ruolo_scuola',
            'data-conditional-value'  => wp_json_encode(array('personaleata'))
		),
	) );

	$cmb_user->add_field( array(
		'id' => $prefix . 'altri_ruoli_struttura_responsabile',
		'name'    => __( 'Altri ruoli - Responsabile strutture organizzative ', 'design_scuole_italia' ),
		'desc' => __( 'Altre strutture organizzative di cui è responsabile (Es. consiglio di istituto). Seleziona una struttura organizzativa. Se non la trovi inseriscila <a href="post-new.php?post_type=struttura">cliccando qui</a> ' , 'design_scuole_italia' ),
		'type'    => 'pw_multiselect',
    	'options' => dsi_get_strutture_options(),
            'attributes' => array(
                'placeholder' =>  __( 'Seleziona una o più strutture', 'design_scuole_italia' ),
            ),
	) );


	$cmb_user->add_field( array(
		'id' => $prefix . 'altri_ruoli_struttura',
		'name'    => __( 'Altri ruoli - Componente strutture organizzative ', 'design_scuole_italia' ),
		'desc' => __( 'Altre strutture organizzative di cui fa parte (Es. consiglio di istituto). Seleziona una struttura organizzativa. Se non la trovi inseriscila <a href="post-new.php?post_type=struttura">cliccando qui</a> ' , 'design_scuole_italia' ),
		'type'    => 'pw_multiselect',
   		'options' => dsi_get_strutture_options(),
            'attributes' => array(
                'placeholder' =>  __( 'Seleziona una o più strutture', 'design_scuole_italia' ),
            ),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Funzioni strumentali', 'design_scuole_italia' ),
		'desc'    => __( 'Definisci qui altre funzioni strumentali attribuite', 'design_scuole_italia' ),
		'id'      => $prefix . 'altri_ruoli_funzioni_strumentali',
		'type'    => 'textarea',
        'attributes'    => array(
            'data-conditional-id'     => $prefix . 'ruolo_scuola',
            'data-conditional-value'  => wp_json_encode(array('docente','personaleata'))
        ),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Altri ruoli di referente', 'design_scuole_italia' ),
		'desc'    => __( 'Definisci qui ruoli di referente attribuiti (dove non sono previste strutture o funzioni strumentali) ', 'design_scuole_italia' ),
		'id'      => $prefix . 'altri_ruoli_referente',
		'type'    => 'textarea',
        'attributes'    => array(
            'data-conditional-id'     => $prefix . 'ruolo_scuola',
            'data-conditional-value'  => wp_json_encode(array('docente','personaleata'))
        ),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Altri ruoli', 'design_scuole_italia' ),
		'desc'    => __( 'Definisci qui altri ruoli (per componenti strutture, funzioni strumentali o referenti riferirsi agli altri campi previsti) ', 'design_scuole_italia' ),
		'id'      => $prefix . 'altri_ruoli',
		'type'    => 'textarea',
        'attributes'    => array(
            'data-conditional-id'     => $prefix . 'ruolo_scuola',
            'data-conditional-value'  => wp_json_encode(array('docente','personaleata'))
        ),
	) );


	$cmb_user->add_field( array(
		'name'    => __( 'Genere *', 'design_scuole_italia' ),
		'id'      => $prefix . 'genere',
		'type'    => 'radio_inline',
		'options'          => array(
			'm' => __( 'M', 'design_scuole_italia' ),
			'f'     => __( 'F', 'design_scuole_italia' ),
		),
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Data di nascita', 'design_scuole_italia' ),
		'id'      => $prefix . 'data_nascita',
		'type'    => 'text_date',
		'attributes'    => array(
			'required'    => 'required',
			'data-datepicker' => json_encode( array(
				'yearRange' => '-100:+0',
			) ),
		),
	) );


	$cmb_user->add_field( array(
		'name'    => __( 'Numero di telefono pubblico ', 'design_scuole_italia' ),
		'id'      => $prefix . 'telefono_pubblico',
		'type'    => 'text'
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Indirizzo email pubblico ', 'design_scuole_italia' ),
		'id'      => $prefix . 'email_pubblico',
		'type'    => 'text_email'
	) );
/*

Modifica per Liceo Pitagora

START
*/
	$cmb_user->add_field( array(
		'name'    => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
		'desc'    => __( 'Ulteriori informazioni relative alla persona', 'design_scuole_italia' ),
		'id'      => $prefix . 'altre_info',
		'type'    => 'wysiwyg',
		//'attributes'    => array(
		//	'required'    => 'required'
		//),
	) );
/*
END

Modifica per Liceo Pitagora
*/

}

/**
 * Funzione per recuperare gli user/persone da mostrare su cmb2
 * @param $query_args
 *
 * @return array
 */
function dsi_get_cmb2_user( $query_args ) {

	$args = wp_parse_args( $query_args, array(
		'fields' => array( 'display_name' ),

	) );

	$users = get_users(  );

	$user_options = array();
	if ( $users ) {
		foreach ( $users as $user ) {
			$user_options[ $user->ID ] = $user->display_name;
		}
	}

	return $user_options;
}

// relazione bidirezionale persona /  struttura responsabile
new dsi_bidirectional_cmb2_from_usermeta("_dsi_persona_", "altri_ruoli_struttura_responsabile", "persona_box", "_dsi_struttura_responsabile");

// relazione bidirezionale persona /  struttura componente
new dsi_bidirectional_cmb2_from_usermeta("_dsi_persona_", "altri_ruoli_struttura", "persona_box", "_dsi_struttura_persone");





/**
 * aggiungo js per condizionale parent
 */
add_action( 'admin_print_scripts-user-edit.php', 'dsi_utente_admin_script', 11 );
add_action( 'admin_print_scripts-user-new.php', 'dsi_utente_admin_script', 11 );
add_action( 'admin_print_scripts-profile.php', 'dsi_utente_admin_script', 11 );

function dsi_utente_admin_script() {
		wp_enqueue_script( 'utente-admin-script', get_template_directory_uri() . '/inc/admin-js/persona.js' );
}
