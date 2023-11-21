<?php

/**
 * Action to add page templates used by theme
 */

add_action( 'after_switch_theme', 'dsi_create_pages_on_theme_activation' );

function dsi_create_pages_on_theme_activation() {
// verifico se è una prima installazione
    $dsi_has_installed = get_option("dsi_has_installed");



    // template page per la scuola
    $new_page_title    = __( 'Scuola', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/la-scuola.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'la-scuola'
    );
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        $scuola_page_id = $new_page_id;
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }else{
        $scuola_page_id = $page_check->ID;
    }


    // template page per La Home di Sezione Notizie
    $new_page_title    = __( 'Novità', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/notizie.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'novita'
    );
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }

    // template page per La Home di Sezione Servizi
    $new_page_title    = __( 'Servizi', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/servizi.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'servizi'
    );
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }

    // template page per La Home di Sezione Didattica
    $new_page_title    = __( 'Didattica', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/didattica.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'didattica'
    );
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        $didattica_page_id = $new_page_id;

        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }else{
        $didattica_page_id = $page_check->ID;
    }


    // template page per Le persone
    $new_page_title    = __( 'Le persone', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/persone.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'persone',
        'post_parent'  => $scuola_page_id

    );
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }


    // template page per I Numeri
    $new_page_title    = __( 'I numeri della scuola', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/numeri.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'numeri-scuola',
        'post_parent'  => $scuola_page_id
    );
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }

    // template page per lista argomenti
    $new_page_title    = __( 'Argomenti', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/argomenti.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
		'post_name' => 'argomento',
    );
	
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }

    // template page per Amministrazione Trasparente
    $new_page_title    = __( 'Amministrazione Trasparente', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/amministrazione-trasparente.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'amministrazione-trasparente'
    );


    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $amministrazione_trasparente_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $amministrazione_trasparente_page_id, '_wp_page_template', $new_page_template );
        }
    }else{
        $amministrazione_trasparente_page_id = $page_check->ID;
        update_post_meta( $amministrazione_trasparente_page_id, '_wp_page_template', $new_page_template );
    }


    // template page per Presentazione
    $new_page_title    = __( 'Presentazione', 'design_scuole_italia' ); // Page's title
    $new_page_content  = 'La nostra scuola: identità, insegnamenti e storia.';                           // Content goes here
    $new_page_template = 'page-templates/presentazione.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'presentazione',
        'post_parent'  => $scuola_page_id
    );

    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $presentazione_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $presentazione_page_id, '_wp_page_template', $new_page_template );
        }
    }else{
        $presentazione_page_id = $page_check->ID;
        update_post_meta( $presentazione_page_id, '_wp_page_template', $new_page_template );
    }


    // template page per La Storia
    $new_page_title    = __( 'La storia', 'design_scuole_italia' ); // Page's title
    $new_page_content  = 'La nostra storia';                           // Content goes here
    $new_page_template = 'page-templates/storia.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'presentazione',
        'post_parent'  => $scuola_page_id
    );

    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $presentazione_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $presentazione_page_id, '_wp_page_template', $new_page_template );
        }
    }else{
        $presentazione_page_id = $page_check->ID;
        update_post_meta( $presentazione_page_id, '_wp_page_template', $new_page_template );
    }

    // template page per pagina dei cicli scolastici
    $new_page_title    = __( 'Offerta formativa', 'design_scuole_italia' ); // Page's title
    $new_page_content  = '';                           // Content goes here
    $new_page_template = 'page-templates/cicli-scolastici.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'offerta-formativa',
        'post_parent'  => $didattica_page_id
    );

    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $cicli_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $cicli_page_id, '_wp_page_template', $new_page_template );
        }
    }else{
        $cicli_page_id = $page_check->ID;
        update_post_meta( $cicli_page_id, '_wp_page_template', $new_page_template );
    }

    /**
     * popolamento delle materie
     */
    // todo: programma materia
    /*
    $materie = array(
        "Matematica",
        "Storia",
        "Fisica",
        "Lingua inglese",
        "Lingua francese",
        "Lingua spagnola",
        "Lingua tedesca",
        "Italiano",
        "Geografia",
        "Chimica",
        "Educazione Tecnica",
        "Ragioneria",
        "Filosofia",
        "Latino",
        "Greco",
        "Informatica",
        "Lettere",
        "Religione cattolica",
        "Scienze",
        "Biologia",
        "Elettronica",
        "Diritto ed economia",
        "Musica",
        "Pianoforte",
        "Violino",
        "Chitarra",
        "Flauto",
        "Storia dell'arte",
        "Disegno",
        "Scienze motorie"
    );

    foreach ( $materie as $materia ) {
        wp_insert_term( $materia, 'materia' );
    }
*/



    /*
    * popolo i percorsi di studio
     *
     */


    // converto gli indirizzi di studio in percorsi

    global $wpdb;
    $args = array(
        'taxonomy'               => 'indirizzi-di-studio',
        'orderby'                => 'name',
        'order'                  => 'ASC',
        'hide_empty'             => false,
    );
    $the_query = new WP_Term_Query($args);
    foreach($the_query->get_terms() as $term){
        if(term_exists($term->slug, "percorsi-di-studio")){
            $remove = $wpdb->delete(
                $wpdb->prefix . 'term_taxonomy',  array( 'term_id' => $term->term_id )
            );
        }else{
            $update = $wpdb->update(
                $wpdb->prefix . 'term_taxonomy',
                [ 'taxonomy' => "percorsi-di-studio" ],
                [ 'term_taxonomy_id' => $term->term_id ],
                [ '%s' ],
                [ '%d' ]
            );

        }
    }


    $arrdida = dsi_didattica_array();


    //   print_r($arrdida);
    // exit();
    $order=0;
    foreach ( $arrdida as $key => $value ) {

        if (!is_array($value)) {
            if (!term_exists( $value , 'percorsi-di-studio')){
                $newterm= wp_insert_term($value, 'percorsi-di-studio');
//                wp_update_term($newterm["term_id"], 'percorsi-di-studio', array('order' => $order));
                update_term_meta($newterm["term_id"], "dsi_order", $order);

                $order++;
            }
        } else {
            if (!term_exists( $key , 'percorsi-di-studio')){
                $parent = wp_insert_term($key, 'percorsi-di-studio');
                $parent_id = $parent["term_id"];
                update_term_meta($parent["term_id"], "dsi_order", $order);
                $order++;
                // ciclo sul livello successivo
                foreach ($value as $vkey => $vvalue) {
                    if (!is_array($vvalue)) {
                        if (!term_exists( $vvalue , 'percorsi-di-studio'))
                            wp_insert_term($vvalue, 'percorsi-di-studio', array("parent" => $parent_id));
                    } else {
                        if (!term_exists( $vkey , 'percorsi-di-studio')) {
                            $vparent = wp_insert_term($vkey, 'percorsi-di-studio', array("parent" => $parent_id));
                            $vparent_id = $vparent["term_id"];
                            // ciclo sul livello successivo
                            foreach ($vvalue as $vvkey => $vvvalue) {
                                if (!is_array($vvvalue)) {
                                    if (!term_exists( $vvvalue , 'percorsi-di-studio'))
                                        wp_insert_term($vvvalue, 'percorsi-di-studio', array("parent" => $vparent_id));
                                } else {
                                    if (!term_exists( $vvkey , 'percorsi-di-studio')) {
                                        $vvparent = wp_insert_term($vvkey, 'percorsi-di-studio', array("parent" => $vparent_id));
                                        $vvparent_id = $vvparent["term_id"];
                                        // ciclo sul livello successivo
                                        foreach ($vvvalue as $vvvkey => $vvvvalue) {
                                            if (!is_array($vvvvalue)) {
                                                wp_insert_term($vvvvalue, 'percorsi-di-studio', array("parent" => $vvparent_id));
                                            } else {
                                                $vvparent = wp_insert_term($vvvkey, 'percorsi-di-studio', array("parent" => $vvparent_id));

                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
            }

        }

    }
    // aggiorno le description dei percorsi
    $arrdidadesc = dsi_didattica_desc_array();
    foreach ($arrdidadesc as $key => $desc) {
        if($desc != ""){
            $term = get_term_by("name", $key, 'percorsi-di-studio');
            if($term)
                wp_update_term($term->term_id, 'percorsi-di-studio', array("description" => $desc));
        }
    }



    /*
    * popolo le tipologie di amministrazione trasparente
     *
     */

    $ammtrasps = dsi_amministrazione_trasparente_array();
    foreach ( $ammtrasps as $couple ) {
        $parentname = $couple[0];
        $parentchild = $couple[1];
        if (!term_exists( $parentname , 'amministrazione-trasparente')) {
            $parent = wp_insert_term($parentname, 'amministrazione-trasparente');
            if(!is_wp_error($parent)){
                $parent_id = $parent["term_id"];
                foreach ($parentchild as $child){
                    wp_insert_term($child, 'amministrazione-trasparente', array("parent" => $parent_id));
                }
            }
        }
    }
    dsi_amministrazione_trasparente_genera_descrizioni();
    /*
    * popolo le tipologie di struttura
     *
     */
    wp_insert_term( 'Associazione scolastica', 'tipologia-struttura' );
    wp_insert_term( 'Commissione', 'tipologia-struttura' );
    wp_insert_term( 'Dipartimento', 'tipologia-struttura' );
    wp_insert_term( 'Dirigenza Scolastica', 'tipologia-struttura' );
    // wp_insert_term( 'Istituto', 'tipologia-struttura' );
    $istituto = get_term_by("name", "Istituto", 'tipologia-struttura');
    if($istituto)
        wp_delete_term($istituto->term_id, "tipologia-struttura");

    wp_insert_term( 'Organo Collegiale', 'tipologia-struttura' );
//    wp_insert_term( 'Organo Consiliare', 'tipologia-struttura' );
    $organoconsiliare = get_term_by("name", "Organo Consiliare", 'tipologia-struttura');
    if($organoconsiliare)
        wp_delete_term($organoconsiliare->term_id, "tipologia-struttura");

    $term_scuola = term_exists( 'Scuola', 'tipologia-struttura' );
    if ( $term_scuola !== 0 && $term_scuola !== null ) {
        wp_update_term($term_scuola["term_id"], "tipologia-struttura", array("name" => "Scuola / Istituto"));
    }else{
        wp_insert_term( 'Scuola / Istituto', 'tipologia-struttura', array("slug" => "scuola"));
    }
    wp_insert_term( 'Segreteria', 'tipologia-struttura' );

    wp_insert_term( 'Auditorium', 'tipologia-luogo' );
    wp_insert_term( 'Aula Magna', 'tipologia-luogo' );
    wp_insert_term( 'Biblioteca', 'tipologia-luogo' );
    wp_insert_term( 'Edificio scolastico', 'tipologia-luogo' );
    wp_insert_term( 'Laboratorio', 'tipologia-luogo' );
    wp_insert_term( 'Mensa', 'tipologia-luogo' );
    wp_insert_term( 'Palestra', 'tipologia-luogo' );
//    wp_insert_term( 'Giardino', 'tipologia-luogo' );
    $giardino = get_term_by("name", "Giardino", 'tipologia-luogo');
    if($giardino)
        wp_delete_term($giardino->term_id, "tipologia-luogo");

    wp_insert_term( "Spazio all'aperto", 'tipologia-luogo' );
    wp_insert_term( 'Teatro', 'tipologia-luogo' );



    wp_insert_term( 'Progetto di integrazione', 'tipologia-progetto' );
    wp_insert_term( 'Progetto di orientamento', 'tipologia-progetto' );
    wp_insert_term( 'Progetto territorio e ambiente', 'tipologia-progetto' );
    wp_insert_term( 'Progetto area umanistica', 'tipologia-progetto' );
    wp_insert_term( 'Progetto area scientifica', 'tipologia-progetto' );
    wp_insert_term( 'Altro', 'tipologia-progetto' );



    wp_insert_term( 'Famiglie e studenti', 'tipologia-servizio' );
    wp_insert_term( 'Personale scolastico', 'tipologia-servizio' );
    // wp_insert_term( 'Percorsi di studio', 'tipologia-servizio' );

    /*
        $del = get_term_by('name', 'Circolari', 'tipologia-articolo');
        if($del) wp_delete_term($del->term_id, 'tipologia-articolo');

        $del = get_term_by('name', 'Notizia', 'tipologia-articolo');
        if($del) wp_delete_term($del->term_id, 'tipologia-articolo');

        $del = get_term_by('name', 'Articolo', 'tipologia-articolo');
        if($del) wp_delete_term($del->term_id, 'tipologia-articolo');
    */
    wp_insert_term( 'Notizie', 'tipologia-articolo' );
    wp_insert_term( 'Articoli', 'tipologia-articolo' );
    wp_insert_term( 'Rassegna Stampa', 'tipologia-articolo' );


    wp_insert_term( 'Documento Generico', 'tipologia-documento' );
    wp_insert_term( 'Bandi e Gare', 'tipologia-documento' );
    wp_insert_term( 'Contratto', 'tipologia-documento' );
    wp_insert_term( 'Delibera', 'tipologia-documento' );
    wp_insert_term( 'Verbale', 'tipologia-documento' );
    wp_insert_term( 'Regolamento', 'tipologia-documento' );
    wp_insert_term( 'Documento Programmatico', 'tipologia-documento' );
    wp_insert_term( 'Documento Didattico', 'tipologia-documento' );
    wp_insert_term( 'Modulistica', 'tipologia-documento' );
    wp_insert_term( 'Albo online', 'tipologia-documento' );


    wp_insert_term( 'Bandi e gare', 'albo-pretorio' );
    wp_insert_term( 'Contratti - Personale ATA', 'albo-pretorio' );
    wp_insert_term( 'Contratti - Personale Docente', 'albo-pretorio' );
    wp_insert_term( 'Contratti e convenzioni', 'albo-pretorio' );
    wp_insert_term( 'Convocazioni', 'albo-pretorio' );
    wp_insert_term( 'Delibere Consiglio di Istituto', 'albo-pretorio' );
    wp_insert_term( 'Documenti altre P.A.', 'albo-pretorio' );
    wp_insert_term( 'Esiti esami', 'albo-pretorio' );
    wp_insert_term( 'Graduatorie', 'albo-pretorio' );
    wp_insert_term( 'Organi collegiali', 'albo-pretorio' );
    wp_insert_term( 'Organi collegiali - Elezioni', 'albo-pretorio' );
    wp_insert_term( 'Privacy', 'albo-pretorio' );
    wp_insert_term( 'Programmi annuali e Consuntivi', 'albo-pretorio' );
    wp_insert_term( 'Regolamenti', 'albo-pretorio' );
    wp_insert_term( 'Sicurezza', 'albo-pretorio' );

    wp_insert_term( 'Circolari per docenti e personale ATA', 'tipologia-circolare' );
    wp_insert_term( 'Circolari per alunni e famiglie', 'tipologia-circolare' );

    /**
     * creo il menu Scuola
     */
    $name = __('La Scuola', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if($menu_object) {
        $menu_scuola = $menu_object->term_id;
    }else {

        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by('id', $menu_id, 'nav_menu');
        $menu_scuola = $menu_id;

//        $presentazione_landing_url = dsi_get_template_page_url("page-templates/presentazione.php");
        $presentazione_id = dsi_get_template_page_id("page-templates/presentazione.php");
//echo "---".$presentazione_id;
//exit();
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Presentazione', "design_scuole_italia"),
            'menu-item-object-id' => $presentazione_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('I luoghi', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'luogo',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));
      
        $persone_id = dsi_get_template_page_id("page-templates/persone.php");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Le persone', "design_scuole_italia"),
            'menu-item-object-id' => $persone_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
            'menu-item-classes' => 'footer-link',
        ));

        $numeri_id = dsi_get_template_page_id("page-templates/numeri.php");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('I numeri della scuola', "design_scuole_italia"),
            'menu-item-object-id' => $numeri_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Le carte della scuola', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'documento',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Organizzazione', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'struttura',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        $storia_id = dsi_get_template_page_id("page-templates/storia.php");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('La storia', "design_scuole_italia"),
            'menu-item-object-id' => $storia_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
            'menu-item-classes' => 'footer-link',
        ));

        $locations_primary_arr = get_theme_mod('nav_menu_locations');
        $locations_primary_arr["menu-scuola"] = $menu->term_id;
        set_theme_mod('nav_menu_locations', $locations_primary_arr);
        update_option('menu_check', true);
    }
    
    /**
     * creo il menu Servizi
     */
    $name = __('Servizi', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if($menu_object) {
        $menu_servizi = $menu_object->term_id;
    }else {

        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by('id', $menu_id, 'nav_menu');
        $menu_servizi = $menu_id;


        $term = get_term_by("name", "Personale Scolastico", "tipologia-servizio");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Personale scolastico', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'taxonomy',
            'menu-item-object' => 'tipologia-servizio',
            'menu-item-object-id' => $term->term_id,
            'menu-item-classes' => 'footer-link',
        ));


        $term = get_term_by("name", "Famiglie e Studenti", "tipologia-servizio");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Famiglie e studenti', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'taxonomy',
            'menu-item-object' => 'tipologia-servizio',
            'menu-item-object-id' => $term->term_id,
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Percorsi di studio', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'indirizzo',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Tutti i servizi', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'servizio',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        $locations_primary_arr = get_theme_mod('nav_menu_locations');
        $locations_primary_arr["menu-servizi"] = $menu->term_id;
        set_theme_mod('nav_menu_locations', $locations_primary_arr);
        update_option('menu_check', true);
    }
    /**
     * creo il menu Novità
     */
    $name = __('Novità', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if($menu_object) {
        $menu_notizie = $menu_object->term_id;
    }else {

        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by('id', $menu_id, 'nav_menu');
        $menu_notizie = $menu_id;

        $term = get_term_by("name", "Notizie", "tipologia-articolo");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Le notizie', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'taxonomy',
            'menu-item-object' => 'tipologia-articolo',
            'menu-item-object-id' => $term->term_id,
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Le circolari', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'circolare',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Calendario eventi', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'evento',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        $term = get_term_by("name", "Albo online", "tipologia-documento");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Albo online', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'taxonomy',
            'menu-item-object' => 'tipologia-documento',
            'menu-item-object-id' => $term->term_id,
            'menu-item-classes' => 'footer-link',
        ));


        $locations_primary_arr = get_theme_mod('nav_menu_locations');
        $locations_primary_arr["menu-notizie"] = $menu->term_id;
        set_theme_mod('nav_menu_locations', $locations_primary_arr);
        update_option('menu_check', true);
    }
    /**
     * creo il menu Didattica
     */
    $name = __('Didattica', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if($menu_object) {
        $menu_didattica = $menu_object->term_id;
    }else {

        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by('id', $menu_id, 'nav_menu');
        $menu_didattica = $menu_id;

//        $cicli_landing_url = dsi_get_template_page_url("page-templates/cicli-scolastici.php");
        $cicli_id = dsi_get_template_page_id("page-templates/cicli-scolastici.php");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Offerta formativa', "design_scuole_italia"),
            'menu-item-object-id' => $cicli_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Le schede didattiche', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'scheda_didattica',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('I progetti delle classi', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-object' => 'scheda_progetto',
            'menu-item-type' => 'post_type_archive',
            'menu-item-classes' => 'footer-link',
        ));

        $locations_primary_arr = get_theme_mod('nav_menu_locations');
        $locations_primary_arr["menu-didattica"] = $menu->term_id;
        set_theme_mod('nav_menu_locations', $locations_primary_arr);
        update_option('menu_check', true);
    }
    /**
     * creo il menu Footer
     */
    $name = __('Footer', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if($menu_object) {
        $menu_footer = $menu_object->term_id;
    }else {

        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by('id', $menu_id, 'nav_menu');
        $menu_footer = $menu_id;

        $ammtrasp_landing_url = dsi_get_template_page_url("page-templates/amministrazione-trasparente.php");

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Amministrazione Trasparente', "design_scuole_italia"),
            'menu-item-url' => $ammtrasp_landing_url,
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-classes' => 'footer-link',
        ));

        $term = get_term_by("name", "Albo online", "tipologia-documento");
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Albo online', "design_scuole_italia"),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'taxonomy',
            'menu-item-object' => 'tipologia-documento',
            'menu-item-object-id' => $term->term_id,
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Privacy Policy', "design_scuole_italia"),
            'menu-item-url' => get_privacy_policy_url(),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-classes' => 'footer-link',
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Dichiarazione di accessibilità', "design_scuole_italia"),
            'menu-item-url' => "",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-classes' => 'footer-link',
        ));

        $locations_primary_arr = get_theme_mod('nav_menu_locations');
        $locations_primary_arr["menu-footer"] = $menu->term_id;
        set_theme_mod('nav_menu_locations', $locations_primary_arr);
    }
    /**
     * creo il menu Top
     */
    $name = __('Top', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if($menu_object) {
        $menu_top = $menu_object->term_id;
    }else{
        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by( 'id', $menu_id, 'nav_menu' );
        $menu_top = $menu_id;

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Tutti gli argomenti', "design_scuole_italia"),
            'menu-item-url' =>  '/argomento',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
        ));

        /*
            wp_update_nav_menu_item($menu->term_id, 0, array(
                'menu-item-title' => __('Privacy Policy', "design_scuole_italia"),
                'menu-item-url' =>  get_privacy_policy_url(),
                'menu-item-status' => 'publish',
                'menu-item-type' => 'custom', // optional
            ));
        */

        $locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
        $locations_primary_arr["menu-topright"] = $menu->term_id;
        set_theme_mod( 'nav_menu_locations', $locations_primary_arr );
    }

    /**
     * creo il menu Link Esterni
     */
    $name = __('Link Esterni', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if($menu_object) {
        $menu_link_esterno = $menu_object->term_id;
    }else{

        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by('id', $menu_id, 'nav_menu');
        $menu_link_esterno = $menu_id;

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('MIUR', "design_scuole_italia"),
            'menu-item-url' => "https://www.miur.gov.it/",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-target' => '_blank',
            'menu-item-classes' => 'footer-link',
            'menu-item-attr-title' => __('Ministero dell\'Istruzione - MIUR - link esterno - apertura nuova scheda', "design_scuole_italia"),
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Ufficio Scolastico Regionale', "design_scuole_italia"),
            'menu-item-url' => "#",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-target' => '_blank',
            'menu-item-classes' => 'footer-link',
            'menu-item-attr-title' => __('Ufficio Scolastico Regionale - link esterno - apertura nuova scheda', "design_scuole_italia"),
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Ufficio Scolastico Territoriale', "design_scuole_italia"),
            'menu-item-url' => "#",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-target' => '_blank',
            'menu-item-classes' => 'footer-link',
            'menu-item-attr-title' => __('Ufficio Scolastico Territoriale - link esterno - apertura nuova scheda', "design_scuole_italia"),
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Scuola in Chiaro', "design_scuole_italia"),
            'menu-item-url' => "https://cercalatuascuola.istruzione.it/cercalatuascuola/",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-target' => '_blank',
            'menu-item-classes' => 'footer-link',
            'menu-item-attr-title' => __('Scuola in Chiaro - link esterno - apertura nuova scheda', "design_scuole_italia"),
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Iscrizioni On Line', "design_scuole_italia"),
            'menu-item-url' => "https://www.istruzione.it/iscrizionionline//",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-target' => '_blank',
            'menu-item-classes' => 'footer-link',
            'menu-item-attr-title' => __('Iscrizioni On Line - link esterno - apertura nuova scheda', "design_scuole_italia"),
        ));

        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Invalsi', "design_scuole_italia"),
            'menu-item-url' => "https://www.invalsi.it",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-target' => '_blank',
            'menu-item-classes' => 'footer-link',
            'menu-item-attr-title' => __('Invalsi - link esterno - apertura nuova scheda', "design_scuole_italia"),
        ));


        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title' => __('Comune', "design_scuole_italia"),
            'menu-item-url' => "#",
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom', // optional
            'menu-item-target' => '_blank',
            'menu-item-classes' => 'footer-link',
            'menu-item-attr-title' => __('Comune - link esterno - apertura nuova scheda', "design_scuole_italia"),
        ));
    }

    /**
     * creo il menu utente (visibile in bacheca)
     */
    $name = __('Utente', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_object = wp_get_nav_menu_object( $name );
    if(!$menu_object) {
        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by( 'id', $menu_id, 'nav_menu' );

        $locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
        $locations_primary_arr["menu-utente"] = $menu->term_id;
        set_theme_mod( 'nav_menu_locations', $locations_primary_arr );
    }

    /**
     * aggiungo i menu come widget
     */

    $active_widgets = get_option( 'sidebars_widgets' );
    $active_widgets["footer-1"][0] = 'nav_menu-0' ;
    $nav_menu[ 0 ] = array (
        'title'        => 'Link Esterni',
        'nav_menu'     => $menu_link_esterno,
        'menu-item-classes' => 'footer-link',
    );
    unset( $active_widgets["footer-1"][1]);
    unset( $active_widgets["footer-1"][2]);

    $active_widgets["footer-2"][0] = 'nav_menu-1' ;
    $nav_menu[ 1 ] = array (
        'title'        => 'La Scuola',
        'nav_menu'     => $menu_scuola,
        'menu-item-classes' => 'footer-link',
    );

    $active_widgets["footer-3"][0] = 'nav_menu-2' ;
    $active_widgets["footer-3"][1] = 'nav_menu-5' ;

    $nav_menu[ 2 ] = array (
        'title'        => 'I Servizi',
        'nav_menu'     => $menu_servizi,
        'menu-item-classes' => 'footer-link',
    );
    $nav_menu[ 5 ] = array (
        'title'        => 'Didattica',
        'nav_menu'     => $menu_didattica,
        'menu-item-classes' => 'footer-link',
    );

    $active_widgets["footer-4"][0] = 'nav_menu-4' ;
    $active_widgets["footer-4"][1] = 'nav_menu-6' ;
    $nav_menu[ 4 ] = array (
        'title'        => 'Novità',
        'nav_menu'     => $menu_notizie,
        'menu-item-classes' => 'footer-link',
    );
    $nav_menu[ 6 ] = array (
        'title'        => '',
        'nav_menu'     => $menu_top,
    );


    update_option( 'widget_nav_menu',  $nav_menu);
    update_option( 'sidebars_widgets',  $active_widgets);




    /**
     * creo i permessi e le capabilities
     */

    $admins = get_role( 'administrator' );
//    $custom_types = array("eventi", "documenti", "luoghi", "programmi", "schede_didattica", "schede_progetto", "strutture", "servizi");
    $custom_types = array("eventi", "documenti", "luoghi", "schede_didattica", "schede_progetto", "strutture", "servizi", "indirizzi_di_studio", "circolari");
    $caps = array("edit_","edit_others_","publish_","read_private_","delete_","delete_private_","delete_published_","delete_others_","edit_private_","edit_published_");
    foreach ($custom_types as $custom_type){
        foreach ($caps as $cap){
            $admins->add_cap( $cap.$custom_type);
        }
    }

    /**
     * do il permesso a tutti gli utenti che hanno effettuato l'accesso di vedere i contenuti privati, in modo che si possano pubblicare elementi visibili solo al personale scolastico
    */
    if ( ! function_exists( 'get_editable_roles' ) ) {
        require_once ABSPATH . 'wp-admin/includes/user.php';
    }

    foreach (get_editable_roles() as $role => $_) {
        $custom_types = array("posts", "eventi", "documenti", "luoghi", "schede_didattica", "schede_progetto", "strutture", "servizi", "indirizzi_di_studio", "circolari");
        foreach ($custom_types as $custom_type){
            get_role($role)->add_cap( 'read_private_' . $custom_type);
        }
    }

//    $custom_tax = array("materie", "tipologia_articoli", "classi", "tipologia_documenti", "tipologia_eventi", "tipologia_luoghi", "tipologia_servizi","tipologia_strutture","percorsi-di-studio");
    $custom_tax = array("tipologia_articoli",  "tipologia_documenti", "tipologia_eventi", "tipologia_luoghi", "tipologia_servizi", "tipologia_progetti","tipologia_strutture","tipologia_circolare","percorsi-di-studio");
    $caps_terms = array("manage_","edit_","delete_","assign_");
    foreach ($custom_tax as $ctax){
        foreach ($caps_terms as $cap){
            $admins->add_cap( $cap.$ctax);
        }
    }
    // members cap for multisite
    $admins->add_cap( "create_roles");
    $admins->add_cap( "edit_roles");
    $admins->add_cap( "delete_roles");

    //TODO: ricordarsi di aggiungere restrict_content per i ruoli abilitati


    // controllo se è una prima installazione
    if(!$dsi_has_installed){

        // creo le opzioni per ginger
        $field_export = "{\"ginger_general\":{\"enable_ginger\":\"1\",\"ginger_cache\":\"no\",\"ginger_opt\":\"in\",\"ginger_scroll\":\"1\",\"ginger_click_out\":\"1\",\"ginger_force_reload\":\"0\",\"ginger_keep_banner\":\"0\",\"ginger_cookie_duration\":\"365000\",\"ginger_logged_users\":\"0\",\"pagine_escluse\":[{\"select-input\":\"\"}]},\"ginger_banner\":{\"ginger_banner_type\":\"bar\",\"ginger_banner_position\":\"bottom\",\"ginger_banner_text\":\"I cookie ci aiutano a migliorare il sito. Utilizzando il sito, accetti un utilizzo dei cookie da parte nostra.\",\"ginger_Iframe_text\":\"I cookie ci aiutano a migliorare il sito. Utilizzando il sito, accetti un utilizzo dei cookie da parte nostra.\",\"accept_cookie_button_text\":\"Accetta Cookie\",\"disable_cookie_button_text\":\"Disabilita i Cookie\",\"disable_cookie_button_status\":\"1\",\"theme_ginger\":\"light\",\"background_color\":\"#51758c\",\"text_color\":\"#ffffff\",\"button_color\":\"#ffffff\",\"button_text_color\":\"#444444\",\"link_color\":\"#e5e5e5\",\"ginger_css\":\"\"},\"gingerjscustom\":false,\"ginger_jscustom\":false,\"gingeradsense\":false,\"gingerwpml\":false,\"ginger_wpml_options\":false,\"gingerpolylang\":false,\"ginger_polylang_options\":false,\"gingeranalytics\":false,\"gingeranalytics_option\":false}";
        if($newconf = json_decode(stripslashes($field_export), true)) {
            $newconf = json_decode(json_encode($newconf), true);
            foreach ($newconf as $key => $val) {
                update_option($key, $val);
            }
        }

        // opzioni per avcp
        update_option('avcp_denominazione_ente', "denominazione_ente");
        update_option('avcp_codicefiscale_ente', "codicefiscale_ente");


        // converto i percorsi di studio in indirizzi
        $q = 'numberposts=-1&post_status=any&post_type=percorso_di_studio';
        $items = get_posts($q);
        foreach ($items as $item) {
            $update['ID'] = $item->ID;
            $update['post_type'] = "indirizzo";
            wp_update_post( $update );
        }

    }

    global $wp_rewrite;
    $wp_rewrite->init(); //important...
    $wp_rewrite->set_tag_base("argomento" );
    $wp_rewrite->flush_rules();

    update_option("dsi_has_installed", true);
}


function dsi_add_update_theme_page() {
    add_theme_page( 'Ricarica i dati', 'Ricarica i dati', 'edit_theme_options', 'reload-data-theme-options', 'dsi_reload_theme_option_page' );
}
add_action( 'admin_menu', 'dsi_add_update_theme_page' );

function dsi_reload_theme_option_page() {
    if(isset($_GET["action"]) && $_GET["action"] == "reload"){
        dsi_create_pages_on_theme_activation();
    }

    echo "<div class='wrap'>";
    echo '<h1>Ricarica i dati di attivazione del tema</h1>';

    echo '<a href="themes.php?page=reload-data-theme-options&action=reload" class="button button-primary">Ricarica i dati di attivazione (menu, tipologie, etc)</a>';
    echo "</div>";
}
