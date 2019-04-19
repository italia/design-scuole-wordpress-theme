<?php
/**
 * Definisce i campi custom degli user come persone
 */

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
		'display-name',
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
		//'new_user_section' => 'add-new-user',
		// where form will show on new user page. 'add-existing-user' is only other valid option.
		'priority'     => 'hight',
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
		'desc'    => __( 'Es: Docente di SCUOLA INFANZA, SCUOLA PRIMARIA, SCUOLA SECONDARIA I GRADO, SCUOLA SECONDARIA II GRADO', 'design_scuole_italia' ),
		'id'      => $prefix . 'ruolo_scuola',
		'type'    => 'text',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Durata incarico *', 'design_scuole_italia' ),
		'desc'    => __( 'Con incarico a tempo determinato/indeterminato', 'design_scuole_italia' ),
		'id'      => $prefix . 'durata_incarico',
		'type'    => 'text',
		'attributes'    => array(
			'required'    => 'required'
		),
	) );


	$cmb_user->add_field( array(
		'name'    => __( 'Altri ruoli *', 'design_scuole_italia' ),
		'desc'    => __( 'Possibilità di inserire altri ruoli (Es. Membro della commissione alternanza e relativo link )', 'design_scuole_italia' ),
		'id'      => $prefix . 'altri_ruoli',
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



	$cmb_user->add_field( array(
		'name'    => __( 'Tipo posto', 'design_scuole_italia' ),
		'desc'    => __( 'Nomale / Sostegno', 'design_scuole_italia' ),
		'id'      => $prefix . 'tipo_posto',
		'type'    => 'text',
		//'attributes'    => array(
		//	'required'    => 'required'
		//),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Tipo supplenza', 'design_scuole_italia' ),
		'desc'    => __( 'Se supplente - Tipologia supplenza. Assume valori: ANNUALE per le supplenze di durata fino al 31/08 e FINO AL TERMINE per le supplenze di durata fino al 30/06', 'design_scuole_italia' ),
		'id'      => $prefix . 'tipo_supplenza',
		'type'    => 'text',
		//'attributes'    => array(
		//	'required'    => 'required'
		//),
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
			'required'    => 'required'
		),
	) );

	$cmb_user->add_field( array(
		'name'    => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
		'desc'    => __( 'Ulteriori informazioni relative alla persona', 'design_scuole_italia' ),
		'id'      => $prefix . 'altre_info',
		'type'    => 'textarea',
		//'attributes'    => array(
		//	'required'    => 'required'
		//),
	) );


}

/**
 * Funzione per recuperare gli user/persone da mostrare su cmb2
 * @param $query_args
 *
 * @return array
 */
function dsi_get_cmb2_user( $query_args ) {

	$args = wp_parse_args( $query_args, array(
		'fields' => array( 'user_login' ),

	) );

	$users = get_users(  );

	$user_options = array();
	if ( $users ) {
		foreach ( $users as $user ) {
			$user_options[ $user->ID ] = $user->user_login;
		}
	}

	return $user_options;
}
