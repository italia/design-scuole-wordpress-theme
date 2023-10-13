<?php
/**
 * Definisce post type e tassonomie relative alle circolari
 */
add_action( 'init', 'dsi_register_circolare_post_type');
function dsi_register_circolare_post_type()
{

    /** circolari **/
    $labels = array(
        'name' => _x('Le circolari', 'Post Type General Name', 'design_scuole_italia'),
        'singular_name' => _x('Circolare', 'Post Type Singular Name', 'design_scuole_italia'),
        'add_new' => _x('Aggiungi una Circolare', 'Post Type Singular Name', 'design_scuole_italia'),
        'add_new_item' => _x('Aggiungi una nuova Circolare', 'Post Type Singular Name', 'design_scuole_italia'),
        'edit_item' => _x('Modifica la Circolare', 'Post Type Singular Name', 'design_scuole_italia'),
    );
    $args = array(
        'label' => __('Circolare', 'design_scuole_italia'),
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'taxonomies' => array('post_tag'),
        'hierarchical' => false,
        'public' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-media-spreadsheet',
        'has_archive' => true,
        'capability_type' => array('circolare', 'circolari'),
        'map_meta_cap' => true,
    );
    register_post_type('circolare', $args);


    $labels = array(
        'name'              => _x( 'Tipologia Circolare', 'taxonomy general name', 'design_scuole_italia' ),
        'singular_name'     => _x( 'Tipologia Circolare', 'taxonomy singular name', 'design_scuole_italia' ),
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
        'rewrite'           => array( 'slug' => 'tipologia-circolare' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_tipologia_circolare',
            'edit_terms'    => 'edit_tipologia_circolare',
            'delete_terms'  => 'delete_tipologia_circolare',
            'assign_terms'  => 'assign_tipologia_circolare'
        )
    );

    register_taxonomy( 'tipologia-circolare', array( 'circolare' ), $args );

  //  register_taxonomy_for_object_type( 'category', 'circolare' );

}

/**
 * Crea i metabox del post type post
 */
add_action( 'cmb2_init', 'dsi_add_circolare_metaboxes' );
function dsi_add_circolare_metaboxes() {

    $prefix = '_dsi_circolare_';

    $cmb_abstrat = new_cmb2_box( array(
        'id'           => $prefix . 'box_abstract',
        'object_types' => array( 'circolare' ),
        'context'      => 'after_title',
        'priority'     => 'high',
    ) );

    $cmb_abstrat->add_field( array(
        'id' => $prefix . 'tipologia',
        'name'        => '<span class="_dsi_circolare_tipologia">'.__( 'Tipologia circolare *', 'design_scuole_italia' ).'<span>',
        'type'             => 'taxonomy_multicheck_inline',
        'taxonomy'       => 'tipologia-circolare',
        'select_all_button' => false,
        'remove_default' => 'true',

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

    $cmb_tipologie = new_cmb2_box( array(
        'id'           => $prefix . 'box_sottotitolo',
//		'title'        => __( 'Sottotitolo', 'design_scuole_italia' ),
        'object_types' => array( 'circolare' ),
        'context'      => 'after_title',
        'priority'     => 'high',
    ) );


    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'numerazione_circolare',
        'name' => __('Numerazione Circolare', 'design_scuole_italia'),
        'type' => 'text_small'
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
    ));

    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'circolare_title',
        'name' => __('Notifiche agli utenti', 'design_scuole_italia'),
        'desc' => __('Le circolari inviano notifiche al destinatario, e rendono visibile la circolare sulla sua bacheca utente.<br> NB: Le notifiche vengono inviate <b>al primo salvataggio dell\'articolo in stato "pubblicato"</b>. <b>Da quel momento in poi cambiamenti nei campi che seguono non genereranno notifiche agli utenti</b>.' , 'design_scuole_italia'),
        'type' => 'title',
    ));


    $cmb_tipologie->add_field(array(
        'id' => $prefix . 'require_feedback',
        'name' => __('Richiedi un Feedback agli utenti:', 'design_scuole_italia'),
        'desc' => __(' Se la circolare è di tipologia "assemblea sindacale" l\'azione richiesta è "Sì/NO. Se la circolare è di tipologia "sciopero" l\'azione richiesta è "Adesione sì/no/presa visione".', 'design_scuole_italia'),
        'type' => 'radio_inline',
        'default' => "false",
        'options' => dsi_get_circolari_feedback_options(),
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




    $cmb_undercontent = new_cmb2_box( array(
        'id'           => $prefix . 'box_elementi_articolo',
        'title'         => __( 'Dettagli Circolare', 'design_scuole_italia' ),
        'object_types' => array( 'circolare' ),
        'context'      => 'normal',
        'priority'     => 'high',
    ) );
    /*
    $cmb_undercontent->add_field( array(
            'id' => $prefix . 'persone',
            'name'       => __('Persone ', 'design_scuole_italia' ),
            'desc' => __( 'Link a schede persone dell\'amminisitrazione citate', 'design_scuole_italia' ),
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
*/

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

    if ( dsi_get_option("mail_circolare_non_inviare", "setup") )
        return;

    if ( 'circolare' !== $post->post_type )
        return; // restrict the filter to a specific post type

    $notificato = get_post_meta($post->ID, "_dsi_notificato", true);

    if($notificato == "true")
        return; // già notificato, non procedo

    $require_feedback = dsi_get_meta("require_feedback", '', $post->ID);

    if($require_feedback == "false")
        return;

    // recupero la selezione destinatari
    $destinatari_circolari = dsi_get_meta("destinatari_circolari", '', $post->ID);
    $users = array();

    if($destinatari_circolari == "all"){
        $users = get_users( array( 'fields' => 'ID' ) );
    }else if($destinatari_circolari == "ruolo"){
        $ruoli_circolari = dsi_get_meta("ruoli_circolari", '', $post->ID);
        $users = get_users( array( 'role__in' => $ruoli_circolari, 'fields' => 'ID' ) );
    }else if($destinatari_circolari == "gruppo"){
        $gruppi_circolari = dsi_get_meta("gruppi_circolari", '', $post->ID);
        $users = get_objects_in_term( $gruppi_circolari, "gruppo-utente" );
    }

    if(is_array($users) && count($users)){
        foreach ($users as $user){
            // in caso di destinatari di tipo "gruppo" get_objects_in_term restituisce un array di interi, negli altri casi l'array contiene oggetti WP_User
            if (is_a($user, 'WP_User')) {
                $userId=$user->ID;
            } else {
                $userId=$user;
            }
            dsi_notify_circolare_to_user($userId, $post);
        }
        update_post_meta($post->ID, "_dsi_notificato", "true");
    }
}


/**
 * Firma circolare
 */
add_action("get_header", "dsi_save_sign_init", 100);

function dsi_save_sign_init(){
    global $post, $current_user;
    if(is_single()){

        if(isset($_REQUEST["sign"]) && $_REQUEST["sign"] != ""){

            $nonce = $_REQUEST['dsi'];
            if ( ! wp_verify_nonce( $nonce, 'sign' ) ) {
                die( 'Security check' );
            } else {
                // registro la firma sul post
                $signed = get_post_meta($post->ID, "_dsi_has_signed", true);
                if(!$signed)
                    $signed = array();

                if(!in_array($current_user->ID, $signed)){
                    $signed[]=$current_user->ID;
                }
                update_post_meta($post->ID, "_dsi_has_signed", $signed);
                // registro la tipologia di firma sull'utente
                update_user_meta($current_user->ID, "_dsi_signed_".$post->ID, $_REQUEST["sign"]);

                // tolgo l'id post dalla lista circolari utente
                $lista_circolari = get_user_meta($current_user->ID, "_dsi_circolari", true);
                if(!$lista_circolari)
                    $lista_circolari = array();

                if(is_array($lista_circolari)){
                    if (($key = array_search($post->ID, $lista_circolari)) !== false) {
                        unset($lista_circolari[$key]);
                    }

                    update_user_meta($current_user->ID, "_dsi_circolari", $lista_circolari);
                }

                // aggiungo l'id in un array delle circolari firmate
                $lista_circolari_firmate = get_user_meta($current_user->ID, "_dsi_circolari_signed", true);
                if(!$lista_circolari_firmate)
                    $lista_circolari_firmate = array();

                if(is_array($lista_circolari_firmate)){
                    if(!in_array($post->ID, $lista_circolari_firmate)){
                        $lista_circolari_firmate[] = $post->ID;
                    }
                    update_user_meta($current_user->ID, "_dsi_circolari_signed", $lista_circolari_firmate);
                }


                // tolgo il flag dell'alert
                delete_user_meta($current_user->ID,"_dsi_last_notification");


            }
        }
    }
}

//  in caso di articolo di tipo circolare aggiungo il metabox di riferimento


function add_custom_meta_box()
{
    add_meta_box("circolari-meta-box", "Report Circolari", "dsi_circolari_meta_box", "circolare", "normal");
}

add_action("add_meta_boxes", "add_custom_meta_box");
function dsi_circolari_meta_box($post)
{
    if(dsi_is_circolare($post)) {
        $notificato =  get_post_meta($post->ID, "_dsi_notificato", "true");
        if($notificato){
            ?>
            <p><i>Notifica già inviata. Modifiche ulteriori agli attributi delle circolari non genereranno nuove notifiche.</i></p>
            <?php
        }

        ?>
        <h3>Lista Firmatari</h3>
        <?php
        $signed = get_post_meta($post->ID, "_dsi_has_signed", true);
        if(!$signed)
            $signed = array();
        if(is_array($signed) && count($signed) == 0){
            echo "<p>Nessuna firma ancora registrata</p>";
        }else{
            echo "<ul>";
            foreach ($signed as $sign){
                $user = get_user_by("id", $sign);
                $response = get_user_meta($user->ID, "_dsi_signed_".$post->ID, true);

                echo "<li>";
                echo dsi_get_display_name($sign);
                // echo $user->display_name;
                if($response){
                    echo " - ".strtoupper(str_replace("_", " ", $response));
                }
                echo "</li>";
            }

            echo "</ul>";
            echo '<br>';
            $url =  get_permalink($post->ID);
            $csv_link = add_query_arg( array( 'csv' => 'true' ), $url );
            echo '<a href="'.$csv_link.'" class="button" >Scarica elenco firmatari</a>';
        }

    }else{ ?><style type="text/css">#circolari-meta-box{display:none;}</style> <?php }


}

/**
 * Genera la notice alla circolare
 */
function dsi_circolari_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'post.php' ) {
        global $post;
        if($post->post_type == "circolare"){
            if(dsi_is_circolare($post)){
                $notificato =  get_post_meta($post->ID, "_dsi_notificato", "true");
                if($notificato) {
                    echo '<div class="notice notice-warning is-dismissible">
             <p>Attenzione: questa circolare è già stata notificata agli utenti indicati. Eventuali modifiche ai destinatari modificherà la raggiungibilità della circolare, ma NON genererà nuove notifiche.</p>
         </div>';
                }
            }
        }
    }
}
add_action('admin_notices', 'dsi_circolari_admin_notice');



/**
 * Aggiungo label sotto il titolo
 */
add_action( 'edit_form_after_title', 'sdi_circolare_add_content_after_title' );
function sdi_circolare_add_content_after_title($post) {
    if($post->post_type == "circolare")
        _e('<span><>il <b>Titolo</b> è il <b>Nome della Circolare</b></span><br><br>', 'design_scuole_italia' );
}


/**
 * Aggiungo testo prima del content
 */
add_action( 'edit_form_after_title', 'sdi_circolare_add_content_before_editor', 100 );
function sdi_circolare_add_content_before_editor($post) {
    if($post->post_type == "circolare")
        _e('<h1>Testo della Circolare</h1>', 'design_scuole_italia' );
}

/**
 * Aggiungo testo dopo l'editor
 */
add_action( 'edit_form_after_editor', 'sdi_circolare_add_content_after_editor', 100 );
function sdi_circolare_add_content_after_editor($post) {
    if($post->post_type == "circolare")
        _e('<br>Se si desidera inserire un video di YouTube è necessaria l\'opzione "Enable privacy-enhanced mode" che permette di pubblicare il video in modalità youtube-nocookie.<br><br>', 'design_scuole_italia' );
}

/**
 * aggiungo js
 */
add_action( 'admin_print_scripts-post-new.php', 'dsi_circolare_admin_script', 9 );
add_action( 'admin_print_scripts-post.php', 'dsi_circolare_admin_script', 9 );

function dsi_circolare_admin_script() {
    global $post_type;
    if( 'circolare' == $post_type )
        wp_enqueue_script( 'luogo-admin-script', get_template_directory_uri() . '/inc/admin-js/circolare.js' );
}


// aggiungo link per il download del pdf della circolare
add_filter( 'post_row_actions', 'dsi_circolare_modify_list_row_actions', 10, 2 );
function dsi_circolare_modify_list_row_actions( $actions, $post ) {
    if ( $post->post_type == "circolare" ) {
        $notificato =  get_post_meta($post->ID, "_dsi_notificato", "true");

        $url =  get_permalink($post->ID);
        // Maybe put in some extra arguments based on the post status.
        $pdf_link = add_query_arg( array( 'pdf' => 'true' ), $url );

        $new_actions['pdf'] = sprintf( '<a href="%1$s"><b>%2$s</b></a>', esc_url( $pdf_link ), esc_html( __( 'PDF', 'design_scuole_italia' ) ) );

        if($notificato) {
            $csv_link = add_query_arg( array( 'csv' => 'true' ), $url );
            $new_actions['csv'] = sprintf( '<a href="%1$s"><b>%2$s</b></a>', esc_url( $csv_link ), esc_html( __( 'Elenco Firmatari', 'design_scuole_italia' ) ) );
        }
         $actions = array_merge( $actions, $new_actions);
    }
    return $actions;
}

// aggiungo bottone generazione pdf
add_action( 'post_submitbox_misc_actions', function( $post ){
    // check something using the $post object
    if (( get_post_status( $post->ID ) === 'publish' ) && ( get_post_type($post->ID) == "circolare")){
        echo '<div class="misc-pub-section"><a href="'. add_query_arg( array( 'pdf' => 'true' ), get_permalink($post->ID)).'" class="button" >Genera PDF</a></div>';
    }
});

if(!function_exists('dsi_csv_generator')) {
    function dsi_csv_generator(){
        if(is_singular("circolare") && isset($_GET) && ($_GET["csv"] == "true")) {
            global $post;

            // output headers so that the file is downloaded rather than displayed
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="elenco-firmatari-'.sanitize_title($post->post_title).'.csv"');

            // do not cache the file
            header('Pragma: no-cache');
            header('Expires: 0');
    
            // create a file pointer connected to the output stream
            $file = fopen('php://output', 'w');

            // send the column headers          
            $NumeroCircolare = get_post_meta($post->ID, "_dsi_circolare_numerazione_circolare", "true");
            if(!$NumeroCircolare){
                $NumeroCircolare = "****/****";
            }
            fputcsv($file, array('Comunicazione n. '.$NumeroCircolare, 'Docente', "Notifica", "Feedback"));
             
            // Recupero l'elenco degli utenti e le informazioni necessarie
            $query_args['fields'] = array( 'ID', 'user_nicename',  'display_name');
            $users = get_users( $query_args );

            if ( $users ) {
/*
            Per ogni utente:
                1 - verifico se ha firmato la circolare
                2 - verifico se gli è stata notificata la circolare
                3 - scrivo la riga delle informazioni nel file .csv
*/                
                foreach ( $users as $user ) {

                // Mi procuro il nickname dell'utente
                    $nicknameUser = get_user_meta( $user->ID, 'nickname', true );

                // Verifico se ha firmato la circolare    
                    $RisFir = get_user_meta($user->ID, "_dsi_signed_".$post->ID, true);
                    /*
                        la funzione può restituire un valore booleano   (che tradurrò in firmato/non firmato)
                        oppure il feedback (Sì/No/Presa Visione)        (che copierò tale e quale)
                        oppure un valore vuoto oppure niente            
                        se non c'è o non ha trovato record              (che tradurrò in stringa vuota)
                    */

                    if(is_bool($RisFir)){                
                        if($RisFir){
                            $RisultatoFirma = "Firmato";
                        }else{
                            $RisultatoFirma = "Non Firmato";
                        }
                    }elseif(is_null($RisFir)){
                        $RisultatoFirma = "";
                    }elseif(!$RisFir){
                        $RisultatoFirma = "";                    
                    }else{
                        $RisultatoFirma = strtoupper(str_replace("_", " ", $RisFir));
                    }

                    // Controllo l'elenco delle circolari notificate all'utente ma non ancora firmate
                    //
                    // NB: tengo conto che nell'elenco compaiono solo le circolari ancora da firmare!
                    //     non compare né se è stata già firmata
                    //                 né se non è stata notificata
                    // (Alcuni feedback non dovrebbero mai apparire se tutto va bene...)

                    $lista_circolari = get_user_meta($user->ID, "_dsi_circolari", true);
                    if(!$lista_circolari)
                        $UtenteNotificato="Utente con lista circolari vuota";

                    if(is_array($lista_circolari)){
                        if(!in_array($post->ID, $lista_circolari)){
                            if($RisultatoFirma == "NON Firmato"){
                                $UtenteNotificato = "NON Notificata a questo utente";
                            }elseif ($RisultatoFirma == "") {     
                                $UtenteNotificato = "NON Notificata a questo utente";
                            }else{
                                $UtenteNotificato = "Notificata - Firmata";
                            }
                        }else{
                            $UtenteNotificato = "Notificata - Ancora da Firmare";
                        }
                    }else{
                        $UtenteNotificato="NON Notificata a questo utente";
                    }                

                    // Scrivo la riga nel file .csv solo per gli utenti "notificati"
                    if($UtenteNotificato == "NON Notificata a questo utente"){
                        // ... se si volesse un elenco di tutti gli utenti, non solo quelli notificati...
                    }else{    
                        fputcsv($file, array($user->ID, $nicknameUser, $UtenteNotificato, $RisultatoFirma));
                        // $user->display_name - Contiene il ruolo se si volesse aggiungere
                    }

                } // foreach
            } 
            
            exit();
        }
    }
}
add_action("template_redirect", "dsi_csv_generator");

