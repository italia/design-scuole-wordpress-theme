<?php
/**
 * Definisce post type e tassonomie relative alla struttura organizzativa
 */
add_action( 'init', 'dsi_register_struttura_post_type', -10 );
function dsi_register_struttura_post_type() {

    /** struttura **/
    $labels = array(
        'name'          => _x( 'Organizzazione', 'Post Type General Name', 'design_scuole_italia' ),
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
        'hierarchical'  => true,
        'public'        => true,
        'menu_position' => 2,
        'menu_icon'     => 'dashicons-networking',
        'has_archive'   => true,
        'capability_type' => array('struttura', 'strutture'),
        'map_meta_cap'    => true,
    );
    register_post_type( 'struttura', $args );


    $labels = array(
        'name'              => _x( 'Tipologia Struttura', 'taxonomy general name', 'design_scuole_italia' ),
        'singular_name'     => _x( 'Tipologia Struttura', 'taxonomy singular name', 'design_scuole_italia' ),
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
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_strutture',
            'edit_terms'    => 'edit_tipologia_strutture',
            'delete_terms'  => 'delete_tipologia_strutture',
            'assign_terms'  => 'assign_tipologia_strutture'
        )
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
            'id' => $prefix . 'indirizzi',
            'name'        => __( 'Percorsi di studio della Scuola', 'design_scuole_italia' ),
            'type'             => 'taxonomy_multicheck_hierarchy_child',
            'select_all_button' => false,
            'taxonomy'       => 'percorsi-di-studio',
            'remove_default' => 'true',
            'attributes' => array(
                'data-conditional-id' => $prefix . 'tipologia',
                'data-conditional-value' => "scuola",
                'data-only-parent' => true,
            ),
        ) );

    $cmb_sottotitolo->add_field( array(
        'id' => $prefix . 'link_servizi_didattici',
        'name'    => __( 'Indirizzi di studio erogati dalla scuola ', 'design_scuole_italia' ),
        'desc' => __( 'Se la struttura descritta è una scuola o un istituto link ai percorsi di studio presenti nella scuola Infanzia / Primaria / secondaria primo grado / secondaria di secondo grado ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_servizi_didattici_options(),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "scuola",
        ),
    ) );

    $cmb_sottotitolo->add_field( array(
        'id' => $prefix . 'codice_meccanografico',
        'name'    => __( 'Codice meccanografico ', 'design_scuole_italia' ),
        'desc' => __( 'Codice meccanografico dalla scuola' , 'design_scuole_italia' ),
        'type'    => 'text',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "scuola",
        ),
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


    $cmb_sottotitolo->add_field( array(
        'id'         => $prefix . 'childof',
        'name'       => __( 'La struttura dipende da un\'altra  struttura. ', 'design_scuole_italia' ),
        'desc'       => __( 'Ad esempio se è una scuola di un istituto, seleziona l\'istituto di cui fa parte', 'design_scuole_italia' ),
        'type'       => 'select',
        'show_option_none' => true,
        'options' => dsi_get_strutture_options(),
    ) );


    $cmb_undercontent = new_cmb2_box( array(
        'id'           => $prefix . 'box_elementi_struttura',
        'title'         => __( 'Dettagli Struttura', 'design_scuole_italia' ),
        'object_types' => array( 'struttura' ),
        'context'      => 'normal',
        'priority'     => 'high',
    ) );


    /*
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
    */

    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'link_schede_servizi',
        'name'    => __( 'Servizi di cui la struttura è responsabile ', 'design_scuole_italia' ),
        'before' => __( '<p>Link alle schede servizio gestite dalla struttura. Es. se la segreteria è responsabile del servizio di delega, ci sarà un link alla scheda "Delega per ingressi e uscite anticipati". Se la dirigenza è responsabile del servizio "Alternanza scuola lavoro" ci sarà un link alla relativa scheda </p>' , 'design_scuole_italia' ),
        'type'    => 'custom_attached_posts',
        'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
        'options' => array(
            'show_thumbnails' => false, // Show thumbnails on the left
            'filter_boxes'    => true, // Show a text box for filtering the results
            'query_args'      => array(
                'posts_per_page' => -1,
                'post_type'      => 'servizio',
                /*
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tipologia-servizio',
                        'field'    => 'slug',
                        'terms'    => 'servizi-didattici',
                        'operator' => "NOT IN"
                    ),
                ),
                */
            ), // override the get_posts args
        ),
    ) );

    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'link_schede_progetti',
        'name'    => __( 'Progetti ', 'design_scuole_italia' ),
        'before' => __( '<p>Link alle schede progetti gestite dalla struttura. </p>' , 'design_scuole_italia' ),
        'type'    => 'custom_attached_posts',
        'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
        'options' => array(
            'show_thumbnails' => false, // Show thumbnails on the left
            'filter_boxes'    => true, // Show a text box for filtering the results
            'query_args'      => array(
                'posts_per_page' => -1,
                'post_type'      => 'scheda_progetto',
            ), // override the get_posts args
        ),
    ) );


    $cmb_undercontent->add_field( array(
            'name'       => __('Persone responsabili ', 'design_scuole_italia' ),
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
            'name'       => __('Altri Componenti ', 'design_scuole_italia' ),
            'desc' => __( 'Persone che non fanno parte del personale scolastico, separate da virgola', 'design_scuole_italia' ),
            'id' => $prefix . 'altri_componenti',
            'type'    => 'text',
        )
    );




    $cmb_undercontent->add_field( array(
        'id' => $prefix .'sedi',
        'name'    => __( 'Sedi', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona i <a href="edit.php?post_type=luogo">luoghi</a> che rappresentano le sedi della struttura, in ordine di importanza se più di uno. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_luoghi_options(),
		'attributes' => array(
			'placeholder' => 'Seleziona i luoghi che rappresentano le sedi della struttura, in ordine di importanza se più di uno.'
		),
    ) );

    /*
    $cmb_undercontent->add_field( array(
        'id' => $prefix .'luoghi',
        'name'    => __( 'Luoghi presenti nella struttura', 'design_scuole_italia' ),
        'desc' => __( 'Inserire tutti i <a href="edit.php?post_type=luogo">luoghi</a> presenti nella struttura. ' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_luoghi_options(),
    ) );
*/
    $cmb_undercontent->add_field( array(
        'id'   => $prefix . 'contatti_dedicati',
        'name' => __( 'Modalità di contatto', 'design_scuole_italia' ),
        'desc' => __( 'Sono presenti contatti dedicati per la struttura. In caso contrario vengono mostrati in automatico i contatti (email e telefono) dell\'ufficio relazioni con il pubblico (URP) inseriti in Configurazione' , 'design_scuole_italia' ),
        'type' => 'checkbox',
    ) );

    $cmb_undercontent->add_field( array(
        'id'         => $prefix . 'telefono',
        'name'       => __( 'Recapito telefonico della struttura', 'design_scuole_italia' ),
        'desc'       => __( 'Numero di telefono della struttura. ', 'design_scuole_italia' ),
        'type'       => 'text',
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'contatti_dedicati',
            'data-conditional-value'  => "true",
        ),
    ) );


    $cmb_undercontent->add_field( array(
        'id'         => $prefix . 'mail',
        'name'       => __( 'Email della struttura', 'design_scuole_italia' ),
        'desc'       => __( 'Email della struttura. ', 'design_scuole_italia' ),
        'type'       => 'text_email',
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'contatti_dedicati',
            'data-conditional-value'  => "true",
        ),
    ) );
	
    $cmb_undercontent->add_field( array(
        'id'         => $prefix . 'pec',
        'name'       => __( 'Posta elettronica certificata (PEC) della struttura', 'design_scuole_italia' ),
        'desc'       => __( 'PEC della struttura. ', 'design_scuole_italia' ),
        'type'       => 'text_email',
        'attributes'    => array(
            'data-conditional-id'     => $prefix.'contatti_dedicati',
            'data-conditional-value'  => "true",
        ),
    ) );

    $cmb_undercontent->add_field( array(
        'id' => $prefix . 'altre_info',
        'name'        => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
        'desc' => __( 'Ulteriori informazioni sul Servizio, FAQ ed eventuali riferimenti normativi.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.' , 'design_scuole_italia' ),
        'type'    => 'wysiwyg',
        'options' => array(
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => 4, // rows="..."
            'teeny' => true, // output the minimal editor config used in Press This
        ),
    ) );


/*
Modifica per Liceo Pitagora

START
*/

    $cmb_undercontent->add_field( array(
		'id' => $prefix . 'struttura_documenti',
		'name'    => __( 'Carica documenti', 'design_scuole_italia' ),
		'desc' => __( 'Se la Struttura non è descritta da una scheda documento, link al documento. ' , 'design_scuole_italia' ),
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

/*
END

Modifica per Liceo Pitagora
*/

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

/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_struttura_add_content_after_editor', 100 );
function sdi_struttura_add_content_after_editor($post) {
    if($post->post_type == "struttura")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}

// relazione bidirezionale struttura / progetti
new dsi_bidirectional_cmb2("_dsi_struttura_", "struttura", "link_schede_progetti", "box_elementi_struttura", "_dsi_scheda_progetto_link_strutture");

// relazione bidirezionale struttura / luoghi
new dsi_bidirectional_cmb2("_dsi_struttura_", "struttura", "sedi", "box_elementi_struttura", "_dsi_luogo_link_strutture");
new dsi_bidirectional_cmb2("_dsi_struttura_", "struttura", "luoghi", "box_elementi_struttura", "_dsi_luogo_link_strutture");

// relazione bidirezionale struttura / servizi
new dsi_bidirectional_cmb2("_dsi_struttura_", "struttura", "link_schede_servizi", "box_elementi_struttura", "_dsi_servizio_struttura_responsabile");

// relazione bidirezionale struttura / percorso
new dsi_bidirectional_cmb2("_dsi_struttura_", "struttura", "link_servizi_didattici", "box_sottotitolo", "_dsi_indirizzo_link_struttura_didattica");

// relazione bidirezionale struttura responsabile / persona
new dsi_bidirectional_cmb2_to_usermeta("_dsi_struttura_", "struttura", "responsabile", "box_elementi_struttura", "_dsi_persona_altri_ruoli_struttura_responsabile");

// relazione bidirezionale struttura componente / persona
new dsi_bidirectional_cmb2_to_usermeta("_dsi_struttura_", "struttura", "persone", "box_elementi_struttura", "_dsi_persona_altri_ruoli_struttura");

/**
 * salvo il parent cmb2
 */

add_action( 'save_post_struttura', 'dsi_save_struttura' );
function dsi_save_struttura($post_id) {

    $post_type = get_post_type($post_id);
    // If this isn't a 'book' post, don't update it.
    if ( "struttura" != $post_type ) return;
    //Check it's not an auto save routine
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return;

    //Perform permission checks! For example:
    if ( !current_user_can('edit_post', $post_id) )
        return;

    if(!isset($_POST["_dsi_struttura_childof"]))
        return;

    $parentid = $_POST["_dsi_struttura_childof"];
    //$parentid = dsi_get_meta("childof", "", $post_id);

    if($parentid == "")
        $parentid = 0;
    remove_action( 'save_post_struttura','dsi_save_struttura' );
    wp_update_post(
        array(
            'ID'          => $post_id,
            'post_parent' => $parentid
        )
    );
    add_action( 'save_post_struttura', 'dsi_save_struttura' );
}



/**
 * aggiungo js per condizionale parent
 */
add_action( 'admin_print_scripts-post-new.php', 'dsi_struttura_admin_script', 11 );
add_action( 'admin_print_scripts-post.php', 'dsi_struttura_admin_script', 11 );

function dsi_struttura_admin_script() {
    global $post_type;
    if( 'struttura' == $post_type )
        wp_enqueue_script( 'struttura-admin-script', get_template_directory_uri() . '/inc/admin-js/struttura.js' );
}