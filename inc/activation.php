<?php

/**
 * Action to add page templates used by theme
 */
add_action( 'after_switch_theme', 'dsi_create_pages_on_theme_activation' );

function dsi_create_pages_on_theme_activation() {

	// template page per la scuola
	$new_page_title    = __( 'La Scuola', 'design_scuole_italia' ); // Page's title
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
		if ( ! empty( $new_page_template ) ) {
			update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
		}
	}


	// template page per La Home di Sezione Nozizie
	$new_page_title    = __( 'Notizie', 'design_scuole_italia' ); // Page's title
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
		'post_slug'    => 'notizie'
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
		if ( ! empty( $new_page_template ) ) {
			update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
		}
	}


    // template page per Le Persone
    $new_page_title    = __( 'Persone', 'design_scuole_italia' ); // Page's title
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
        'post_slug'    => 'persone'
    );
    // If the page doesn't already exist, create it
    if ( ! isset( $page_check->ID ) ) {
        $new_page_id = wp_insert_post( $new_page );
        if ( ! empty( $new_page_template ) ) {
            update_post_meta( $new_page_id, '_wp_page_template', $new_page_template );
        }
    }


    // template page per I Numeri
    $new_page_title    = __( 'i numeri della Scuola', 'design_scuole_italia' ); // Page's title
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
        'post_slug'    => 'numeri-scuola'
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



    // template page per Presentazione
    $new_page_title    = __( 'Presentazione', 'design_scuole_italia' ); // Page's title
    $new_page_content  = 'Una selezione di articoli della scuola che raccontano chi siamo';                           // Content goes here
    $new_page_template = 'page-templates/presentazione.php';       // The template to use for the page
    $page_check        = get_page_by_title( $new_page_title );   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
        'post_type'    => 'page',
        'post_title'   => $new_page_title,
        'post_content' => $new_page_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_slug'    => 'presentazione'
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

    /**
	 * popolamento delle materie
	 */
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




    /*
    * popolo le tipologie di didattica
     *
     */
    $arrdida = dsi_didattica_array();

 //   print_r($arrdida);
   // exit();
    foreach ( $arrdida as $key => $value ) {

        if (!is_array($value)) {
            if (!term_exists( $value , 'percorsi-di-studio'))
                wp_insert_term($value, 'percorsi-di-studio');
        } else {
            if (!term_exists( $key , 'percorsi-di-studio')){
                $parent = wp_insert_term($key, 'percorsi-di-studio');
                $parent_id = $parent["term_id"];
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
	wp_insert_term( 'Scuola', 'tipologia-struttura' );
	wp_insert_term( 'Segreteria', 'tipologia-struttura' );
	wp_insert_term( 'Presidenza', 'tipologia-struttura' );
	wp_insert_term( 'Commissione', 'tipologia-struttura' );
	wp_insert_term( 'Organi Consiliari', 'tipologia-struttura' );
    wp_insert_term( 'Associazioni scolatiche', 'tipologia-struttura' );

	wp_insert_term( 'Palestra', 'tipologia-luogo' );
	wp_insert_term( 'Mensa', 'tipologia-luogo' );
	wp_insert_term( 'Edificio scolastico', 'tipologia-luogo' );
	wp_insert_term( 'Biblioteca', 'tipologia-luogo' );
	wp_insert_term( 'Auditorium', 'tipologia-luogo' );
	wp_insert_term( 'Teatro', 'tipologia-luogo' );
	wp_insert_term( 'Laboratorio', 'tipologia-luogo' );

	wp_insert_term( 'Famiglie e Studenti', 'tipologia-servizio' );
	wp_insert_term( 'Personale Scolastico', 'tipologia-servizio' );
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


    wp_insert_term( 'Documento Generico', 'tipologia-documento' );
    wp_insert_term( 'Albo Pretorio', 'tipologia-documento' );

    wp_insert_term( 'Documento Generico', 'tipologia-documento' );
    wp_insert_term( 'Albo Pretorio', 'tipologia-documento' );

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


    /**
	 * creo il menu Scuola
	 */
	$name = __('La Scuola', "design_scuole_italia");

	wp_delete_nav_menu($name);
	$menu_id = wp_create_nav_menu($name);
	$menu = get_term_by( 'id', $menu_id, 'nav_menu' );

//	$term = get_term_by("name", "Articoli", "tipologia-articolo");
    $presentazione_landing_url = dsi_get_template_page_url("page-templates/presentazione.php");

    wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Presentazione', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-type' => 'custom',
		'menu-item-url' => $presentazione_landing_url,
	));

	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('I luoghi della scuola', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-object' => 'luogo',
		'menu-item-type' => 'post_type_archive'
	));

	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Le carte della scuola', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-object' => 'documento',
		'menu-item-type' => 'post_type_archive'
	));
	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Organizzazione', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-object' => 'struttura',
		'menu-item-type' => 'post_type_archive'
	));

    $persone_landing_url = dsi_get_template_page_url("page-templates/persone.php");
	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Le persone', "design_scuole_italia"),
		'menu-item-url' => $persone_landing_url,
		'menu-item-status' => 'publish',
		'menu-item-type' => 'custom', // optional
	));

    $numeri_landing_url = dsi_get_template_page_url("page-templates/numeri.php");
	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('I numeri della scuola', "design_scuole_italia"),
		'menu-item-url' => $numeri_landing_url,
		'menu-item-status' => 'publish',
		'menu-item-type' => 'custom', // optional
	));

	$locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
	$locations_primary_arr["menu-scuola"] = $menu->term_id;
	set_theme_mod( 'nav_menu_locations', $locations_primary_arr );
	update_option( 'menu_check', true );

	/**
	 * creo il menu Servizi
	 */
	$name = __('Servizi', "design_scuole_italia");

	wp_delete_nav_menu($name);
	$menu_id = wp_create_nav_menu($name);
	$menu = get_term_by( 'id', $menu_id, 'nav_menu' );


	$term = get_term_by("name", "Famiglie e Studenti", "tipologia-servizio");
	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Servizi per famiglie e studenti', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-type' => 'taxonomy',
		'menu-item-object' => 'tipologia-servizio',
		'menu-item-object-id' => $term->term_id,
	));

	$term = get_term_by("name", "Personale Scolastico", "tipologia-servizio");
	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Servizi per il personale scolastico', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-type' => 'taxonomy',
		'menu-item-object' => 'tipologia-servizio',
		'menu-item-object-id' => $term->term_id,
	));

	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Tutti i servizi', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-object' => 'servizio',
		'menu-item-type' => 'post_type_archive'
	));

	$locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
	$locations_primary_arr["menu-servizi"] = $menu->term_id;
	set_theme_mod( 'nav_menu_locations', $locations_primary_arr );
	update_option( 'menu_check', true );

	/**
	 * creo il menu Notizie
	 */
	$name = __('Notizie', "design_scuole_italia");

	wp_delete_nav_menu($name);
	$menu_id = wp_create_nav_menu($name);
	$menu = get_term_by( 'id', $menu_id, 'nav_menu' );

	$term = get_term_by("name", "Notizie", "tipologia-articolo");
	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Le notizie', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-type' => 'taxonomy',
		'menu-item-object' => 'tipologia-articolo',
		'menu-item-object-id' => $term->term_id,
	));

    wp_update_nav_menu_item($menu->term_id, 0, array(
        'menu-item-title' => __('Le circolari', "design_scuole_italia"),
        'menu-item-status' => 'publish',
        'menu-item-object' => 'circolare',
        'menu-item-type' => 'post_type_archive'
    ));

	wp_update_nav_menu_item($menu->term_id, 0, array(
		'menu-item-title' => __('Gli eventi', "design_scuole_italia"),
		'menu-item-status' => 'publish',
		'menu-item-object' => 'evento',
		'menu-item-type' => 'post_type_archive'
	));

	$locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
	$locations_primary_arr["menu-notizie"] = $menu->term_id;
	set_theme_mod( 'nav_menu_locations', $locations_primary_arr );
	update_option( 'menu_check', true );


    /**
     * creo il menu Didattica
     */
    $name = __('Didattica', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_id = wp_create_nav_menu($name);
    $menu = get_term_by( 'id', $menu_id, 'nav_menu' );

    // todo
    wp_update_nav_menu_item($menu->term_id, 0, array(
        'menu-item-title' => __('I cicli scolastici e le classi', "design_scuole_italia"),
        'menu-item-url' => "#",
        'menu-item-status' => 'publish',
        'menu-item-type' => 'custom', // optional
    ));


    wp_update_nav_menu_item($menu->term_id, 0, array(
        'menu-item-title' => __('Le schede didattiche', "design_scuole_italia"),
        'menu-item-status' => 'publish',
        'menu-item-object' => 'scheda_didattica',
        'menu-item-type' => 'post_type_archive'
    ));

    wp_update_nav_menu_item($menu->term_id, 0, array(
        'menu-item-title' => __('I progetti delle classi', "design_scuole_italia"),
        'menu-item-status' => 'publish',
        'menu-item-object' => 'scheda_progetto',
        'menu-item-type' => 'post_type_archive'
    ));

    $locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
    $locations_primary_arr["menu-didattica"] = $menu->term_id;
    set_theme_mod( 'nav_menu_locations', $locations_primary_arr );
    update_option( 'menu_check', true );

    /**
     * creo il menu Footer
     */
    $name = __('Footer', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_id = wp_create_nav_menu($name);
    $menu = get_term_by( 'id', $menu_id, 'nav_menu' );

    $ammtrasp_landing_url = dsi_get_template_page_url("page-templates/amministrazione-trasparente.php");

    wp_update_nav_menu_item($menu->term_id, 0, array(
        'menu-item-title' => __('Amministrazione Trasparente', "design_scuole_italia"),
        'menu-item-url' =>  $ammtrasp_landing_url,
        'menu-item-status' => 'publish',
        'menu-item-type' => 'custom', // optional
    ));

    $locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
    $locations_primary_arr["menu-footer"] = $menu->term_id;
    set_theme_mod( 'nav_menu_locations', $locations_primary_arr );

    /**
     * creo il menu Top
     */
    $name = __('Top', "design_scuole_italia");

    wp_delete_nav_menu($name);
    $menu_id = wp_create_nav_menu($name);
    $menu = get_term_by( 'id', $menu_id, 'nav_menu' );


    wp_update_nav_menu_item($menu->term_id, 0, array(
        'menu-item-title' => __('Privacy Policy', "design_scuole_italia"),
        'menu-item-url' =>  get_privacy_policy_url(),
        'menu-item-status' => 'publish',
        'menu-item-type' => 'custom', // optional
    ));

    $locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
    $locations_primary_arr["menu-topright"] = $menu->term_id;
    set_theme_mod( 'nav_menu_locations', $locations_primary_arr );


    /**
     * creo i permessi e le capabilities
     */

    $admins = get_role( 'administrator' );

    $custom_types = array("eventi", "documenti", "luoghi", "programmi", "schede_didattica", "schede_progetto", "strutture", "servizi");
    $caps = array("edit_","edit_others_","publish_","read_private_","delete_","delete_private_","delete_published_","delete_others_","edit_private_","edit_published_");
    foreach ($custom_types as $custom_type){
        foreach ($caps as $cap){
            $admins->add_cap( $cap.$custom_type);
        }
    }

    $custom_tax = array("materie", "tipologia_articoli", "classi", "tipologia_documenti", "tipologia_eventi", "tipologia_luoghi", "tipologia_servizi","tipologia_strutture");
    $caps_terms = array("manage_","edit_","delete_","assign_");
    foreach ($custom_tax as $ctax){
        foreach ($caps_terms as $cap){
            $admins->add_cap( $cap.$ctax);
        }
    }

}



