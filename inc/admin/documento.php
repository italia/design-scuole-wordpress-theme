<?php
/**
 * Definisce post type e tassonomie relative ai documenti
 */
add_action( 'init', 'dsi_register_documento_post_type');
function dsi_register_documento_post_type() {

    /** documenti **/
    $labels = array(
        'name'          => _x( 'Documenti', 'Post Type General Name', 'design_scuole_italia' ),
        'singular_name' => _x( 'Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
        'add_new'       => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
        'add_new_item'  => _x( 'Aggiungi un Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
        'edit_item'       => _x( 'Modifica il Documento', 'Post Type Singular Name', 'design_scuole_italia' ),
    );
    $args   = array(
        'label'         => __( 'Documento', 'design_scuole_italia' ),
        'labels'        => $labels,
        'supports'      => array( 'title', 'editor' , 'thumbnail' ),
        'taxonomies'    => array( 'tipologia' ),
        'hierarchical'  => false,
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-portfolio',
        'has_archive'   => true,
        'capability_type' => array('documento', 'documenti'),
        'map_meta_cap'    => true,
    );
    register_post_type( 'documento', $args );

    $labels = array(
        'name'              => _x( 'Tipologia Documento', 'taxonomy general name', 'design_scuole_italia' ),
        'singular_name'     => _x( 'Tipologia Documento', 'taxonomy singular name', 'design_scuole_italia' ),
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
        'rewrite'           => array( 'slug' => 'tipologia-documento' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_documenti',
            'edit_terms'    => 'edit_tipologia_documenti',
            'delete_terms'  => 'delete_tipologia_documenti',
            'assign_terms'  => 'assign_tipologia_documenti'
        )
    );

    register_taxonomy( 'tipologia-documento', array( 'documento' ), $args );

    $labels = array(
        'name'              => _x( 'Amministrazione Trasparente', 'taxonomy general name', 'design_scuole_italia' ),
        'singular_name'     => _x( 'Amministrazione Trasparente', 'taxonomy singular name', 'design_scuole_italia' ),
        'search_items'      => __( 'Cerca ', 'design_scuole_italia' ),
        'all_items'         => __( 'Tutte', 'design_scuole_italia' ),
        'edit_item'         => __( 'Modifica', 'design_scuole_italia' ),
        'update_item'       => __( 'Aggiorna', 'design_scuole_italia' ),
        'add_new_item'      => __( 'Aggiungi', 'design_scuole_italia' ),
        'new_item_name'     => __( 'Nuova', 'design_scuole_italia' ),
        'menu_name'         => __( 'Amministrazione Trasparente', 'design_scuole_italia' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'amministrazione-trasparente' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_documenti',
            'edit_terms'    => 'edit_tipologia_documenti',
            'delete_terms'  => 'delete_tipologia_documenti',
            'assign_terms'  => 'assign_tipologia_documenti'
        )
    );

    register_taxonomy( 'amministrazione-trasparente', array( 'documento' ), $args );

    $labels = array(
        'name'              => _x( 'Albo on line', 'taxonomy general name', 'design_scuole_italia' ),
        'singular_name'     => _x( 'Albo on line', 'taxonomy singular name', 'design_scuole_italia' ),
        'search_items'      => __( 'Cerca ', 'design_scuole_italia' ),
        'all_items'         => __( 'Tutte', 'design_scuole_italia' ),
        'edit_item'         => __( 'Modifica', 'design_scuole_italia' ),
        'update_item'       => __( 'Aggiorna', 'design_scuole_italia' ),
        'add_new_item'      => __( 'Aggiungi', 'design_scuole_italia' ),
        'new_item_name'     => __( 'Nuova', 'design_scuole_italia' ),
        'menu_name'         => __( 'Albo on line', 'design_scuole_italia' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'albo-pretorio' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_documenti',
            'edit_terms'    => 'edit_tipologia_documenti',
            'delete_terms'  => 'delete_tipologia_documenti',
            'assign_terms'  => 'assign_tipologia_documenti'
        )
    );

    register_taxonomy( 'albo-pretorio', array( 'documento' ), $args );

    register_taxonomy_for_object_type( 'post_tag', 'documento' );

}

/**
 * Crea i metabox del post type eventi
 */
add_action( 'cmb2_init', 'dsi_add_documento_metaboxes' );
function dsi_add_documento_metaboxes() {

    $prefix = '_dsi_documento_';




    $cmb_annullato = new_cmb2_box( array(
        'id'           => $prefix . 'box_annullato',
        'title'        => __( 'Atto Albo Annullato', 'design_scuole_italia' ),
        'object_types' => array( 'documento' ),
        'context'      => 'after_title',
        'priority'     => 'high',
    ) );


    $cmb_annullato->add_field( array(
        'name'    => __( 'Atto annullato', 'design_scuole_italia' ),
        'desc'    => __( 'Descrivi il motivo dell\'annullamento', 'design_scuole_italia' ),
        'after'    => __( '<br><input type="submit" name="Salva" value="Salva" class="button-secondary ">', 'design_scuole_italia' ),
        'id' => $prefix . 'motivo_annullamento',
        'type'             => 'textarea',
    ) );


    $cmb_tipologia = new_cmb2_box( array(
        'id'           => $prefix . 'box_tipologia',
        'title'        => __( 'Tipologia', 'design_scuole_italia' ),
        'object_types' => array( 'documento' ),
        'context'      => 'side',
        'priority'     => 'high',
    ) );


    $cmb_tipologia->add_field( array(
        'id' => $prefix . 'tipologia',
        'type'             => 'taxonomy_radio_hierarchical',
        'taxonomy'       => 'tipologia-documento',
        'show_option_none' => false,
        'remove_default' => 'true',
        'default'          => 'documento-generico',
        'attributes' => array(
            'required'  => 'required'
        ),
    ) );

    $cmb_tipologia->add_field( array(
        'id' => $prefix . 'identificativo',
        'name' => __( "Identificativo Documento", 'design_scuole_italia' ),
        'after' => __( "ad uso interno", 'design_scuole_italia' ),
        'type'             => 'text_small',

    ) );



    $cmb_side = new_cmb2_box( array(
        'id'           => $prefix . 'box_side',
        'title'        => __( 'Scadenza', 'design_scuole_italia' ),
        'object_types' => array( 'documento' ),
        'context'      => 'side',
        'priority'     => 'default',
    ) );


    $cmb_side->add_field( array(
//        'name'       => __('Data Scadenza', 'design_scuole_italia' ),
        'desc' => __( 'Data di scadenza del documento, una volta raggiunta questo sarà automaticamente archiviato come "Scaduto".' , 'design_scuole_italia' ),
        'id'             => $prefix . 'data_scadenza',
        'type'    => 'text_date_timestamp',
        'date_format' => 'd/m/Y',
    ) );

    $cmb_sottotitolo = new_cmb2_box( array(
        'id'           => $prefix . 'box_sottotitolo',
//		'title'        => __( 'Sottotitolo', 'design_scuole_italia' ),
        'object_types' => array( 'documento' ),
        'context'      => 'after_title',
        'priority'     => 'high',
    ) );


    $cmb_sottotitolo->add_field( array(
        'id'         => $prefix . 'descrizione',
        'name'       => __( 'Descrizione *', 'design_scuole_italia' ),
        'desc'       => __( 'Indicare una sintetica descrizione del Documento. Vincoli: 160 caratteri spazi inclusi.', 'design_scuole_italia' ),
        'type'       => 'textarea',
        'attributes' => array(
            'maxlength' => '160',
            'required'  => 'required'
        ),
    ) );

    $cmb_sottotitolo->add_field(array(
        'id' => $prefix . 'numerazione_albo',
        'name' => __('Numerazione Progressiva Annuale', 'design_scuole_italia'),
        'type' => 'text_small',
        'default' => dsi_get_numerazione_albo(),
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "albo-online",
            'readonly' => 'readonly',
        ),
    ));

    $cmb_sottotitolo->add_field( array(
        'id' => $prefix . 'albo-pretorio',
        'name'        => __( 'Categoria Albo', 'design_scuole_italia' ),
        'desc' => __( 'Seleziona se è un Documento generico, Albo pretorio online o altro.' , 'design_scuole_italia' ),
        'type'             => 'taxonomy_select',
        'taxonomy'       => 'albo-pretorio',
        'show_option_none' => true,
        'remove_default' => 'true',
        'default'          => '',
        'attributes' => array(
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "albo-online",
        ),
    ) );

    $cmb_sottotitolo->add_field( array(
        'name'       => __('Responsabile Albo', 'design_scuole_italia' ),
        'desc' => __( 'Uno o più utenti responsabili del procedimento.  Es link alla scheda del Dirigente scolastico. Inseriscile <a href="edit-tags.php?taxonomy=persona">cliccando qui</a> ' , 'design_scuole_italia' ),
        'id'             => $prefix . 'responabile_albo',
        'type'    => 'pw_multiselect',
        'options' => dsi_get_user_options(),
        'attributes' => array(
            'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
            'data-conditional-id' => $prefix . 'tipologia',
            'data-conditional-value' => "albo-online",
        ),
    ) );



    $cmb_sottotitolo->add_field(array(
        'id' => $prefix . 'is_amministrazione_trasparente',
        'name' => __('Amministrazione Trasparente *', 'design_scuole_italia'),
        'desc' => __('Seleziona se il documento fa parte di Amministrazione Trasparente', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => 'false',
        'options' => array(
            'true' => __('Si', 'design_scuole_italia'),
            'false' => __('No', 'design_scuole_italia'),
        ),
    ));



    $cmb_sottotitolo->add_field(array(
            'name' => __('Tipologia di Amministrazione Trasparente ', 'design_scuole_italia'),
            'desc' => __('Collega alla sezione di Amministrazione Trasparente. ', 'design_scuole_italia'),
            'id' => $prefix . 'amministrazione_trasparente',
            'taxonomy'       => 'amministrazione-trasparente', //Enter Taxonomy Slug
            'type'           => 'taxonomy_select_hierarchical',
            'remove_default' => 'true', // Removes the default metabox provided by WP core.
            // Optionally override the args sent to the WordPress get_terms function.
            'query_args' => array(
                // 'orderby' => 'slug',
                // 'hide_empty' => true,
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'is_amministrazione_trasparente',
                'data-conditional-value' => "true",
            ),
        )
    );

    $cmb_aftercontent = new_cmb2_box( array(
        'id'           => $prefix . 'box_elementi_dati',
        'title'        => __( 'Dati Pubblici', 'design_scuole_italia' ),
        'object_types' => array( 'documento' ),
        'context'      => 'normal',
        'priority'     => 'high',
    ) );






    $cmb_aftercontent->add_field( array(
            'name'       => __('Autore/i ', 'design_scuole_italia' ),
            'desc' => __( 'Eventuale Lista autori che hanno pubblicato il documento. Es link alla scheda del Dirigente scolastico. Inseriscile <a href="users.php">da qui</a> ' , 'design_scuole_italia' ),
            'id'             => $prefix . 'autori',
            'type'    => 'pw_multiselect',
            'options' => dsi_get_user_options(),
            'attributes' => array(
                'placeholder' =>  __( 'Seleziona uno o più persone / utenti', 'design_scuole_italia' ),
            ),
        )
    );

    /*
        $cmb_aftercontent->add_field( array(
                'id' => $prefix . 'licenza',
                'name'       => __('Licenza di distribuzione *', 'design_scuole_italia' ),
                'desc' => __( 'Licenza con il quale il documento viene distribuito', 'design_scuole_italia' ),
                'type'    => 'text',
                'attributes' => array(
                    'required' => 'required'
                ),
            )
        );
    */

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'file_documenti',
        'name'    => __( 'Carica file', 'design_scuole_italia' ),
        'desc' => __( 'Lista di documenti allegati' , 'design_scuole_italia' ),
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        // 'query_args' => array( 'type' => 'image' ), // Only images attachment
        // Optional, override default text strings
        'text' => array(
            'add_upload_files_text' => __('Aggiungi un nuovo allegato', 'design_scuole_italia' ), // default: "Add or Upload Files"
            'remove_image_text' => __('Rimuovi allegato', 'design_scuole_italia' ), // default: "Remove Image"
            'remove_text' => __('Rimuovi', 'design_scuole_italia' ), // default: "Remove"
        ),
    ) );



    $cmb_aftercontent->add_field( array(
        'id'         => $prefix . 'gallery',
        'name'       => __( 'Galleria', 'design_scuole_italia' ),
        'desc'       => __( 'Galleria di immagini  significative relative a un documento, corredate da didascalia', 'design_scuole_italia' ),
        'type' => 'file_list',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
        'query_args' => array( 'type' => 'image' ), // Only images attachment
    ) );


    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'servizi_collegati',
        'name'        => __( 'Servizi collegati', 'design_scuole_italia' ),
        'desc' => __( 'Servizi collegati al documento' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_servizi_options(),
    ) );
	
    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'link_servizi_didattici',
        'name'        => __( 'Indirizzi di studio collegati', 'design_scuole_italia' ),
        'desc' => __( 'Indirizzi di studio collegati al documento' , 'design_scuole_italia' ),
        'type'    => 'pw_multiselect',
        'options' =>  dsi_get_servizi_didattici_options(),
    ) );
	
/*
    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'link_servizi_collegati',
        'name'        => __( 'Canale digitale servizio collegato', 'design_scuole_italia' ),
        'desc' => __( 'Se il servizio ha un canale digitale Link per avviare la procedura di attivazione del servizio. Questo campo mette in relazione "Servizio" con il suo canale digitale di attivazione. Es. Partecipa al bando"' , 'design_scuole_italia' ),
        'type' => 'text_url'

    ) );
*/


    $timeline_group_id = $cmb_aftercontent->add_field( array(
        'id'           => $prefix . 'timeline',
        'type'        => 'group',
        'name'        => '<h1>Fasi</h1>',
        'desc' => __( 'Suddividere i contenuti del documento in fasi e relative date. Es data di apertura della partecipazione a un bando, data di scadenza della possibilità di partecipare al bando' , 'design_scuole_italia' ),
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => __( 'Fase {#}', 'design_scuole_italia' ),
            'add_button'    => __( 'Aggiungi un elemento', 'design_scuole_italia' ),
            'remove_button' => __( 'Rimuovi l\'elemento ', 'design_scuole_italia' ),
            'sortable'      => true,  // Allow changing the order of repeated groups.
        ),
    ) );


    $cmb_aftercontent->add_group_field( $timeline_group_id, array(
        'id' => 'data_timeline',
        'before'        => __( 'Data ', 'design_scuole_italia' ),
        'type' => 'text_date',
        'date_format' => 'd-m-Y',
        'data-datepicker' => json_encode( array(
            'yearRange' => '-100:+0',
        ) ),
    ) );

    $cmb_aftercontent->add_group_field( $timeline_group_id, array(
        'id' => 'titolo_timeline',
        'before'        => __( ' Descrizione ', 'design_scuole_italia' ),
        'type' => 'text',
    ) );




    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'ufficio',
        'name'    => __( 'Strutture organizzative responsabili del documento', 'design_scuole_italia' ),
        'desc' => __( 'Link alla struttura organizzativa responsabile del documento. Se non la trovi inseriscila <a href="post-new.php?post_type=struttura">cliccando qui</a> ' , 'design_scuole_italia' ),
        'type'    => 'custom_attached_posts',
        'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
        'options' => array(
            'show_thumbnails' => false, // Show thumbnails on the left
            'filter_boxes'    => true, // Show a text box for filtering the results
            'query_args'      => array(
                'posts_per_page' => 10,
                'post_type'      => 'struttura',
            ), // override the get_posts args
        ),
    ) );

    $cmb_aftercontent->add_field( array(
        'name'    => __( 'Ulteriori informazioni', 'design_scuole_italia' ),
        'desc'    => __( 'Ulteriori informazioni relative alla persona', 'design_scuole_italia' ),
        'id'      => $prefix . 'altre_info',
        'type'    => 'textarea',
        //'attributes'    => array(
        //	'required'    => 'required'
        //),
    ) );


    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'riferimenti_normativi',
        'name'        => __( 'Riferimenti normativi', 'design_scuole_italia' ),
        'desc' => __( 'Lista di link con riferimenti normativi utili per il documento.<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.' , 'design_scuole_italia' ),
        'type' => 'wysiwyg',
        'options' => array(
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => 4, // rows="..."
            'teeny' => true, // output the minimal editor config used in Press This
        ),

    ) );

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'protocollo',
        'name'        => __( 'Protocollo', 'design_scuole_italia' ),
        'type' => 'text',
    ) );

    $cmb_aftercontent->add_field( array(
        'id' => $prefix . 'data_protocollo',
        'name'        => __( 'Data protocollo', 'design_scuole_italia' ),
        'type' => 'text_date',
        'date_format' => 'd-m-Y',
        'data-datepicker' => json_encode( array(
            'yearRange' => '-100:+0',
        ) ),
    ) );
}




/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_documento_add_content_after_title' );
function sdi_documento_add_content_after_title($post) {
    if($post->post_type == "documento")
        _e('<span><i>il <b>Titolo</b> è il <b>Nome del Documento</b></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_documento_add_content_after_editor', 100 );
function sdi_documento_add_content_after_editor($post) {
    if($post->post_type == "documento")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_documento_add_content_before_editor', 100 );
function sdi_documento_add_content_before_editor($post) {
    if($post->post_type == "documento")
        _e('<h1>Descrizione Estesa del Documento</h1>', 'design_scuole_italia' );
}



// aggiungo gli status "scaduto" e "annullato" per gestire albo pretorio
// Register Custom Post Status
function dsi_register_custom_post_status(){
    register_post_status( 'scaduto', array(
        'label'                     => _x( 'Scaduto', 'design_scuole_italia' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Scaduto <span class="count">(%s)</span>', 'Scaduti <span class="count">(%s)</span>' ),
    ) );
    register_post_status( 'annullato', array(
        'label'                     => _x( 'Annullato', 'design_scuole_italia' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Annullato <span class="count">(%s)</span>', 'Annullati <span class="count">(%s)</span>' ),
    ) );
}
add_action( 'init', 'dsi_register_custom_post_status' );
// Display Custom Post Status Option in Post Edit
function dsi_display_custom_post_status_option(){
    global $post;
    $screen = get_current_screen();
    if (($screen->base == "post") && ($screen->id == "documento")) {

        if($post->post_type == 'documento') {
            if ($post->post_status == 'scaduto') {
                $selected_scaduto = 'selected';
            }
            if ($post->post_status == 'annullato') {
                $selected_annullato = 'selected';
            }
            echo '<script>
        jQuery(document).ready(function(){
        jQuery("select#post_status").append("<option value=\"scaduto\" ' . $selected_scaduto . '>Scaduto</option>");
        //jQuery(".misc-pub-section label").append("<span id=\"post-status-display\"> Scaduto</span>");
        
        jQuery("select#post_status").append("<option value=\"annullato\" ' . $selected_annullato . '>Annullato</option>");
        //jQuery(".misc-pub-section label").append("<span id=\"post-status-display\"> Annullato</span>");
});
</script>
';
        }
    }
}
//add_action('admin_footer', 'dsi_display_custom_post_status_option');


add_action('admin_footer-post.php', 'dsi_append_documenti_post_status_list');
add_action('admin_footer-post-new.php', 'dsi_append_documenti_post_status_list');

function dsi_append_documenti_post_status_list(){
    global $post;
    $complete_s = '';
    $label_s = '';
    $complete_a = '';
    $label_a = '';
    if($post->post_type == 'documento'){
        if($post->post_status == 'scaduto'){
            $complete_s = ' selected=\"selected\"';
            $label_s = '<span id=\"post-status-display\"> Scaduto</span>';
        } else if($post->post_status == 'annullato'){
            $complete_a = ' selected=\"selected\"';
            $label_a = '<span id=\"post-status-display\"> Annullato</span>';
        }
        echo '
      <script>
      jQuery(document).ready(function($){
           $("select#post_status").append("<option value=\"scaduto\" '.$complete_s.'>Scaduto</option>");
           $(".misc-pub-section label").append("'.$label_s.'");
           
           $("select#post_status").append("<option value=\"annullato\" '.$complete_a.'>Annullato</option>");
           $(".misc-pub-section label").append("'.$label_a.'");
           ';




            if($post->post_status == "scaduto"){
            echo '
                 $("span#post-status-display").html("Scaduto");
                $("input#save-post").val("Aggiorna");
            ';
        }
        if($post->post_status == "annullato"){
            echo '
                 $("span#post-status-display").html("Annullato");
                $("input#save-post").val("Aggiorna");
                
            ';
        }

        echo '       
        var jSelect = $("select#post_status");
           $("a.save-post-status").on("click", function(){
                if( jSelect.val() == "scaduto" ){
                    $("input#save-post").val("Aggiorna");
                }else if( jSelect.val() == "annullato" ){
                    $("input#save-post").val("Aggiorna");
                }
           });
 ';

        if(dsi_is_albo($post)){
            if(($post->post_status == "publish") || ($post->post_status == "annullato") || ($post->post_status == "scaduto")){
                echo "$('input[name=_dsi_documento_tipologia]:radio:not(:checked)').attr('disabled', true);";
                echo "$('#delete-action').hide();";

            }
        }

        echo '
      });
      </script>
      ';
        ?>
        <style type="text/css">
            #_dsi_documento_box_annullato{
                display: none;
            }
        </style>
        <?php

        if(dsi_is_albo($post)){
            if($post->post_status == "annullato"){
                ?>
                <style type="text/css">
                    #cmb2-metabox-_dsi_documento_box_sottotitolo, #wp-content-editor-container , #_dsi_documento_box_elementi_dati, #titlediv, #_dsi_documento_box_tipologia, #_dsi_documento_box_side, #postimagediv{
                        pointer-events: none !important;
                    }

                    #submitdiv, #tagsdiv-category, #tagsdiv-post_tag{{
                        display:none;
                    }

                    #_dsi_documento_box_annullato{
                        display: block;
                    }
                </style>
                <?php
            }else{


            }
        }
    }
}


/**
 *
 * ritorna il numerico dell'albo
 * @return string
 */
function dsi_get_numerazione_albo(){

    // conto quanti documenti albo sono stati pubblicati nell'anno
    $albi = get_posts( array(
        'post_type' => 'documento',
        'date_query' => array(
            array('year' => date("Y"))
        ),
        'posts_per_page' => -1,
        'post_status' => array("publish", "annullato", "scaduto"),
        'tax_query' => array(
            array(
                'taxonomy' => 'tipologia-documento',
                'field' => 'slug',
                'terms' => "albo-online", // Where term_id of Term 1 is "1".
                'include_children' => false
            )
        )
    ));

    $count = count($albi)+1;


    $num = str_pad($count, 5, '0', STR_PAD_LEFT). "/".date("Y");
    return $num;
}


/**
 * aggiungo il cron per cambiare lo stato ai documenti
 */

add_action('after_switch_theme', 'dsi_cron_documenti');

function dsi_cron_documenti() {
    if (! wp_next_scheduled ( 'dsi_cron_documenti_daily' )) {
        wp_schedule_event(time(), 'daily', 'dsi_cron_documenti_daily');
    }
}

add_action('dsi_cron_documenti_daily', 'dsi_check_documenti_daily');

function dsi_check_documenti_daily() {
    // cerco tutti i documenti con data di scadenza passata
    $args = array(
        "post_type" => "documento",
        'meta_query'  => array(
            array(
                'key' => '_dsi_documento_data_scadenza',
                'value' => time(),
                'compare' => '<=',
                'type' => 'numeric'
            )
        )
    );
    $scaduti = get_posts($args);
    foreach ($scaduti as $item){
        $post = array( 'ID' => $item->ID, 'post_status' => "scaduto" );
        wp_update_post($post);
    }

}

/**
 * Nascondo il "cancella" se è un documento albo pubblicato
 */

function dsi_disable_trash_albo( $new_status, $old_status, $post ) {
    if($post->post_type == "documento"){
        if (($new_status == 'trash')  && (!is_super_admin())) {
            // se è un documento albo lo trasformo in "annullato"
            if(dsi_is_albo($post)){
                $arg = array( 'ID' => $post->ID, 'post_status' => "annullato" );
                wp_update_post($arg);

            }
        }
    }

}
add_action( 'transition_post_status', 'dsi_disable_trash_albo', 10, 3 );


/**
 * configuro la scadenza del bando se lasciata vuota
 * @param $post_id
 */
add_action( 'save_post_documento', 'dsi_save_documento' );
function dsi_save_documento( $post_id) {
    $post_type = get_post_type($post_id);
    // If this isn't a 'book' post, don't update it.
    if ( "documento" != $post_type ) return;
    //Check it's not an auto save routine
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return;

    //Perform permission checks! For example:
    if ( !current_user_can('edit_post', $post_id) )
        return;


    remove_action( 'save_post_luogo','dsi_save_luogo' );

/** gestisco la scadenza del documento */
    if(isset($_POST["_dsi_documento_data_scadenza"]) && $_POST["_dsi_documento_data_scadenza"] == ""){
        if(dsi_is_albo(get_post($post_id))){
            // controllo se è settato un parametro nelle opzioni
            $giorni_scadenza = dsi_get_option("giorni_scadenza", "setup");
            if($giorni_scadenza){
                $_POST["_dsi_documento_data_scadenza"] = date("d/m/Y", strtotime("+ ".$giorni_scadenza." DAYS"));
            }
        }
    }

    if(!isset($_POST["_dsi_documento_is_amministrazione_trasparente"]) || $_POST["_dsi_documento_is_amministrazione_trasparente"] == "false"){

        unset($_POST["_dsi_documento_amministrazione_trasparente"]);
        $amm = wp_get_object_terms($post_id, 'amministrazione-trasparente');


        foreach($amm as $amt)
            wp_remove_object_terms( $post_id, $amt->name, 'amministrazione-trasparente' );
    }


    add_action( 'save_post_luogo', 'dsi_save_luogo' );
}



new dsi_bidirectional_cmb2("_dsi_documento_", "documento", "servizi_collegati", "box_elementi_dati", "_dsi_servizio_link_schede_documenti");

new dsi_bidirectional_cmb2("_dsi_documento_", "documento", "link_servizi_didattici", "box_elementi_dati", "_dsi_indirizzo_link_schede_documenti");

function dsi_annulla_doc(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'dsi_annulla_doc' == $_REQUEST['action'] ) ) ) {
        wp_die('Non è stato trovato il documento da annullare!');
    }

    /*
     * Nonce verification
     */
    if ( !isset( $_GET['annulla_nonce'] ) || !wp_verify_nonce( $_GET['annulla_nonce'], basename( __FILE__ ) ) )
        return;

    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    $post = get_post( $post_id );
    if (isset( $post ) && $post != null) {

        if(dsi_is_albo($post)){
            $arg = array( 'ID' => $post->ID, 'post_status' => "annullato" );
            wp_update_post($arg);

        }
        /*
         * finally, redirect to the edit post screen for the new draft
         */
        wp_redirect( admin_url( 'edit.php?post_type=documento' ) );
        exit;
    } else {
        wp_die('Annullamento fallito: ' . $post_id);
    }
}
add_action( 'admin_action_dsi_annulla_doc', 'dsi_annulla_doc' );

/*
 * Add the  link to annulla action list for post_row_actions
 */
function dsi_annulla_doc_link( $actions, $post ) {
    if(dsi_is_albo($post)){
        unset($actions['trash']);
        if($post->post_status != "annullato"){
            $actions['annulla'] = '<a style=\'color: #ca334a;\' href="' . wp_nonce_url('admin.php?action=dsi_annulla_doc&post=' . $post->ID, basename(__FILE__), 'annulla_nonce' ) . '" title="Annulla" rel="permalink">Annulla</a>';
        }else{
            echo '<script>
            document.getElementById("cb-select-'.$post->ID.'").disabled = true;
            </script>';
//            unset($actions['edit']);
            unset($actions['inline hide-if-no-js']);
        }
    }
    return $actions;
}

add_filter( 'post_row_actions', 'dsi_annulla_doc_link', 10, 2 );

function dsi_documento_add_title_status( $actions, $post ){
    if ( 'documento' === $post->post_type ) {
        $cont = get_the_title();
        $status = get_post_status();
        ?>
        <?php
        echo "<strong>";
        if($status == "annullato")
            echo "(<span class=\"post-state\" style='color: #ca334a;'>Annullato</span>)";
        else if($status == "draft")
            echo "(<span class=\"post-state\">Bozza</span>)";
        else if($status == "scaduto")
            echo "(<span class=\"post-state\">Scaduto</span>)";
        echo "</strong>";
        echo "<script>setTimeout(function() { jQuery('select[name=\"_status\"]').parent().remove();}, 100);</script>";
    }
    return $actions;
}

add_filter('post_row_actions','dsi_documento_add_title_status', 10, 2);
add_action('manage_documento_posts_custom_column', 'dsi_documento_add_title_status', 10, 2);

add_filter( 'manage_edit-documento_sortable_columns', 'dsi_sortable_documento_column' );
function dsi_sortable_documento_column( $columns ) {
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);

    return $columns;
}