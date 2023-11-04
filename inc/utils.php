<?php
/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
if(!function_exists("dsi_get_option")) {
	function dsi_get_option( $key = '', $type = "dsi_options", $default = false ) {
		if ( function_exists( 'cmb2_get_option' ) ) {
			// Use cmb2_get_option as it passes through some key filters.
			return cmb2_get_option( $type, $key, $default );
		}

		// Fallback to get_option if CMB2 is not loaded yet.
		$opts = get_option( $type, $default );

		$val = $default;

		if ( 'all' == $key ) {
			$val = $opts;
		} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
			$val = $opts[ $key ];
		}

		return $val;
	}
}

/**
 * Define members check user function if not defined and return true
 * @param  int     $user_id
 * @param  int     $post_id
 * @return bool
 */
if(!function_exists("dsi_members_can_user_view_post")) {
    function dsi_members_can_user_view_post($user_id, $post_id) {
        if(!function_exists("members_can_user_view_post")) {
            return true;
        }else{
            return members_can_user_view_post($user_id, $post_id);
        }

    }
}

/**
 * Wrapper function for get_post_meta
 * @param string $key
 * @return mixed meta_value
 */
if(!function_exists("dsi_get_meta")){
	function dsi_get_meta( $key = '', $prefix = "", $post_id = "") {
        if ( ! dsi_members_can_user_view_post(get_current_user_id(), $post_id) ) return false;

		if($post_id == "")
			$post_id = get_the_ID();

		$post_type = get_post_type($post_id);

		if($prefix != "")
			return get_post_meta( $post_id, $prefix.$key, true );

        if(is_singular("servizio") || (isset($post_type) && $post_type == "servizio")){
            $prefix = '_dsi_servizio_';
            return get_post_meta( $post_id, $prefix.$key, true );
        }else if(is_singular("indirizzo") || (isset($post_type) && $post_type == "indirizzo")){
            $prefix = '_dsi_indirizzo_';
            return get_post_meta( $post_id, $prefix.$key, true );
        }else if (is_singular("luogo")  || (isset($post_type) && $post_type == "luogo")) {
			$prefix = '_dsi_luogo_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("struttura")  || (isset($post_type) && $post_type == "struttura")) {
			$prefix = '_dsi_struttura_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("evento")  || (isset($post_type) && $post_type == "evento")) {
			$prefix = '_dsi_evento_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("documento")  || (isset($post_type) && $post_type == "documento")) {
			$prefix = '_dsi_documento_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("post")  || (isset($post_type) && $post_type == "post")) {
			$prefix = '_dsi_articolo_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}/*else if (is_singular("programma_materia")  || (isset($post_type) && $post_type == "programma_materia")) { // todo: programma materia
			$prefix = '_dsi_materia_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}*/else if (is_singular("scheda_progetto")  || (isset($post_type) && $post_type == "scheda_progetto")) {
			$prefix = '_dsi_scheda_progetto_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("scheda_didattica")  || (isset($post_type) && $post_type == "scheda_didattica")) {
			$prefix = '_dsi_scheda_didattica_';
			return get_post_meta( $post_id, $prefix . $key, true );
		}else if (is_singular("circolare")  || (isset($post_type) && $post_type == "circolare")) {
            $prefix = '_dsi_circolare_';
            return get_post_meta( $post_id, $prefix . $key, true );
        }

		return get_post_meta( $post_id, $key, true );
	}
}


if(!function_exists("dsi_get_term_meta")){
    function dsi_get_term_meta( $key , $prefix, $term_id) {
            return get_term_meta($term_id, $prefix.$key, true );

    }
}
/**
 * Wrapper function for user avatar
 * @param object user
 * @return string url
 */
if(!function_exists("dsi_get_user_avatar")){
	function dsi_get_user_avatar( $user = false, $size=250 ) {
		if(!$user && is_user_logged_in()){
			$user = wp_get_current_user();
		}
        $foto_id = null;
		$foto_url = get_the_author_meta('_dsi_persona_foto', $user->ID);
		if($foto_url)
            $foto_id = attachment_url_to_postid($foto_url);

        if(isset($foto_id) && $foto_id)
            $avatar = wp_get_attachment_image_url($foto_id, "item-thumb");
		else
		    $avatar = get_avatar_url( $user->ID, array("size" => $size) );

		$avatar = apply_filters("dsi_avatar_url", $avatar, $user);
		return $avatar;
	}
}


add_filter( 'get_avatar' , 'dsi_custom_avatar' , 1 , 5 );

function dsi_custom_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    $user = false;

    if ( is_numeric( $id_or_email ) ) {

        $id = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );

    } elseif ( is_object( $id_or_email ) ) {

        if ( ! empty( $id_or_email->user_id ) ) {
            $id = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );
        }

    } else {
        $user = get_user_by( 'email', $id_or_email );
    }

    if ( $user && is_object( $user ) ) {

        $foto_url = get_the_author_meta('_dsi_persona_foto', $user->ID);
        if($foto_url)
            $foto_id = attachment_url_to_postid($foto_url);

        if(isset($foto_id) && $foto_id) {
            $avatar = wp_get_attachment_image_url($foto_id, "item-thumb");
            $avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
        }
    }

    return $avatar;
}



/**
 * Wrapper function for user role
 * @param object user
 * @return string role
 */
if(!function_exists("dsi_get_user_role")) {
	function dsi_get_user_role( $user = false ) {
		global $wp_roles;


		if ( ! $user && is_user_logged_in() ) {
			$user = wp_get_current_user();
		}

        $ruolo_scuola = get_the_author_meta('_dsi_persona_ruolo_scuola', $user->ID);
        $tipo_posto = get_the_author_meta('_dsi_persona_tipo_posto', $user->ID);
        $ruolo_non_docente = get_the_author_meta('_dsi_persona_ruolo_non_docente', $user->ID);
        $altri_ruoli_funzioni_strumentali = get_the_author_meta('_dsi_persona_altri_ruoli_funzioni_strumentali', $user->ID);
        $altri_ruoli_referente = get_the_author_meta('_dsi_persona_altri_ruoli_referente', $user->ID);

        $str_ruolo = "";
        if($ruolo_scuola == "dirigente"){
            $str_ruolo .= "Dirigente Scolastico ";
        }else if($ruolo_scuola == "docente"){
            $str_ruolo .= "Docente ";

            if($tipo_posto == "sostegno"){
                $str_ruolo .= "di sostegno ";
            }
        }else if($ruolo_scuola == "personaleata"){

            if($ruolo_non_docente == "direttore-amministrativo"){
                $str_ruolo .= "Direttore amministrativo";
            }else if($ruolo_non_docente == "tecnico"){
                $str_ruolo .= "Personale tecnico ";
            }else if($ruolo_non_docente == "amministrativo"){
                $str_ruolo .= "Personale amministrativo";
            }else if($ruolo_non_docente == "collaboratore"){
                $str_ruolo .= "Collaboratore scolastico";
            }else{
                $str_ruolo .= "Non docente";
            }

        }

        if($altri_ruoli_funzioni_strumentali != "" || $altri_ruoli_referente != ""){
            if($altri_ruoli_funzioni_strumentali != "" && $altri_ruoli_referente != ""){
                if($str_ruolo != "") $str_ruolo .=", "; 
                $str_ruolo .= "funzione strumentale e referente";
            } else if($altri_ruoli_funzioni_strumentali != ""){
                if($str_ruolo != "") $str_ruolo .=" e "; 
                $str_ruolo .= "funzione strumentale";
            } else if($altri_ruoli_referente != ""){
                if($str_ruolo != "") $str_ruolo .=" e "; 
                $str_ruolo .= "referente";
            }
        }

        if($str_ruolo != "")
            $str_ruolo = ucfirst($str_ruolo);

        return $str_ruolo;
	}
}




/**
 * Wrapper function for agomenti taxonomy list
 * @return array
 */
if(!function_exists("dsi_get_tipologia_struttura_of_post")) {
    function dsi_get_tipologia_struttura_of_post( $singular = false ) {
        global $post;

        if ( ! $singular) {
            $singular = $post;
        }

        $argomenti_terms = wp_get_object_terms( $singular->ID, 'tipologia-struttura' );
        return $argomenti_terms;
    }
}


/**
 * Wrapper function for agomenti taxonomy list
 * @return array
 */
if(!function_exists("dsi_get_tipologia_servizio_of_post")) {
    function dsi_get_tipologia_servizio_of_post( $singular = false ) {
        global $post;

        if ( ! $singular) {
            $singular = $post;
        }

        $argomenti_terms = wp_get_object_terms( $singular->ID, 'tipologia-servizio' );
        return $argomenti_terms;
    }
}


/**
 * Wrapper function for agomenti taxonomy list
 * @return array arguomenti
 */
if(!function_exists("dsi_get_tipologia_luogo_of_post")) {
    function dsi_get_tipologia_luogo_of_post( $singular = false ) {
        global $post;

        if ( ! $singular) {
            $singular = $post;
        }

        $argomenti_terms = wp_get_object_terms( $singular->ID, 'tipologia-luogo' );
        return $argomenti_terms;
    }
}

/**
 * Wrapper function for agomenti taxonomy list
 * @return array arguomenti
 */
if(!function_exists("dsi_get_argomenti_of_post")) {
	function dsi_get_argomenti_of_post( $singular = false ) {
		global $post;

		if ( ! $singular) {
			$singular = $post;
		}

		$argomenti_terms = wp_get_object_terms( $singular->ID, 'post_tag' );
		return $argomenti_terms;
	}
}

/**
 * recupero i percorsi di studio della scuola
 */
if(!function_exists("dsi_get_percorsi_of_scuola")) {
    function dsi_get_percorsi_of_scuola($singular = false ) {
        global $post;

        if ( ! $singular) {
            $singular = $post;
        }

        $argomenti_terms = wp_get_object_terms( $singular->ID, 'percorsi-di-studio' );
        return $argomenti_terms;
    }
}


/**
 * Wrapper function for agomenti taxonomy list
 * @return array arguomenti
 */
// todo: programma materia
/*
if(!function_exists("dsi_get_materie_of_post")) {
	function dsi_get_materie_of_post( $singular = false ) {
		global $post;

		if ( ! $singular) {
			$singular = $post;
		}

		$argomenti_terms = wp_get_object_terms( $singular->ID, 'materia' );
		return $argomenti_terms;
	}
}*/


/**
 * Wrapper function for agomenti taxonomy list
 * @return array arguomenti
 */
if(!function_exists("dsi_get_classi_of_post")) {
	function dsi_get_classi_of_post( $singular = false ) {
		global $post;

		if ( ! $singular) {
			$singular = $post;
		}

		$argomenti_terms = wp_get_object_terms( $singular->ID, 'classe' );
		return $argomenti_terms;
	}
}


/**
 * Function to get mapbox access token
 * @return string accesstoken
 */
if(!function_exists("dsi_get_mapbox_access_token")) {
	function dsi_get_mapbox_access_token() {
		global $post;

		$accesstoken = dsi_get_option( "mapbox_key", "setup" );
		if ( trim( $accesstoken ) == "" ) {
			$accesstoken = DSI_ACCESSTOKEN_MAPBOX;
		}

		return $accesstoken;
	}
}

/**
 * Event date start/stop
 * @param $post
 *
 */
function dsi_get_date_evento($post){
	if($post->post_type == "evento")
		$prefix = '_dsi_evento_';
	else if($post->post_type == "scheda_progetto")
		$prefix = '_dsi_scheda_progetto_';

	$ret = "";
	$timestamp_inizio = dsi_get_meta("timestamp_inizio", $prefix, $post->ID);
	$timestamp_fine= dsi_get_meta("timestamp_fine", $prefix, $post->ID);
	if($timestamp_inizio >= $timestamp_fine){
		$ret .=  date_i18n("j F Y", $timestamp_inizio);
		//$ret .= __(" alle ", "design_scuole_italia");
		//$ret .=  date_i18n("H:i", $timestamp_inizio);
		return $ret;
	}

	$data_inizio = date_i18n("j F Y", $timestamp_inizio);
	$data_fine = date_i18n("j F Y", $timestamp_fine);
	$ora_inizio = date_i18n("H:i", $timestamp_inizio);
	$ora_fine = date_i18n("H:i", $timestamp_fine);
	if($data_inizio == $data_fine){
		$ret .= __("Il ", "design_scuole_italia");
		$ret .= $data_inizio;
		/*
		if($post->post_type == "evento"){
			$ret .= __(" dalle ", "design_scuole_italia");
			$ret .= $ora_inizio;
			$ret .= __(" alle ", "design_scuole_italia");
			$ret .= $ora_fine;

		}*/

	}else{
		$ret .= __("dal ", "design_scuole_italia");
		$ret .= $data_inizio;
		/*
		if($post->post_type == "evento") {
			$ret .= __( " alle ", "design_scuole_italia" );
			$ret .= $ora_inizio;
		}*/
		$ret .= __(" al ", "design_scuole_italia");
		$ret .= $data_fine;
		/*
		if($post->post_type == "evento") {
			$ret .= __( " alle ", "design_scuole_italia" );
			$ret .= $ora_fine;
		}*/
	}

	return $ret;

}


/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 *
 * @return string
 * Accepts a WP_Query instance to build pagination (for custom wp_query()),
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 4.9.5
 * - Tested with Bootstrap 4.1
 * - Tested on Sage 9
 *
 * USAGE:
 *     <?php echo dsi_bootstrap_pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ...
 *       echo bootstrap_pagination($query);
 *     ?>
 */
function dsi_bootstrap_pagination( \WP_Query $wp_query = null, $echo = true ) {
	if ( null === $wp_query ) {
		global $wp_query;
	}
	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( '<svg class="icon icon-primary"><use xmlns:xlink="http://www.w3.org/1999/xlink" href="#svg-arrow-left-small"></use></svg><span class="sr-only">Pagina precedente</span>' ),
			'next_text'    => __( '<span class="sr-only">Pagina successiva</span><svg class="icon icon-primary"><use xmlns:xlink="http://www.w3.org/1999/xlink" href="#svg-arrow-right-small"></use></svg>' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);
	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<div class="pagination"><ul class="pagination">';
		foreach ($pages as $page) {
            $exploded = explode('>',$page);
            $i = 0;
            $aria_label = 'aria-label=';
            $data_element = 'data-element="pager-link"';
            foreach ($exploded as $str) {
                if (strpos($str, '<a') !== false) {
                    if (strpos($str, 'next') !== false) $aria_label .= "'Vai alla pagina successiva'";
                    elseif (strpos($str, 'prev') !== false) $aria_label .= "'Vai alla pagina precedente'";
                    else {
                        $page_num_array = explode('/',$str);
                        $page_num = $page_num_array[count($page_num_array) - 2];
                        $aria_label .= "'Vai alla pagina ".$page_num."'";
                        $exploded[$i] .= $aria_label;
                    }
                    $exploded[$i] .= $data_element;
                }
                ++$i;
            }
            $page = implode('>',$exploded);
			$pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
		}
		$pagination .= '</ul></div>';
		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
	return null;
}


/**
 * Ritorna l'associazione tra i type ricercabili e i post_type wordpress
 * @param string $type
 *
 * @return array
 */
function dsi_get_post_types_grouped($type = "", $tag = false){
	if($type == "")
		$type = "any";
	if($type === "school")
		$post_types = array("documento", "luogo", "struttura", "page", "amm-trasparente");
	else if($type === "news")
		$post_types = array("evento", "post", "circolare");
	else if($type === "education")
		$post_types = array("scheda_didattica", "scheda_progetto"); // todo: programma materia 		$post_types = array("programma_materia", "scheda_didattica", "scheda_progetto");
	else if($type === "service")
		$post_types = array("servizio", "indirizzo");
	else
		$post_types = array("evento", "post","circolare", "documento", "luogo", "scheda_didattica", "scheda_progetto", "servizio", "indirizzo", "struttura", "page", "amm-trasparente"); // todo: programma materia $post_types = array("evento", "post","circolare", "documento", "luogo", "materia", "programma_materia", "scheda_didattica", "scheda_progetto", "servizio", "struttura", "page");

	// rimuovo post types che non hanno la categoria
	if($tag){
		if (($key = array_search("page", $post_types)) !== false) {
			unset($post_types[$key]);
		}

	}
	return $post_types;

}


/**
 * @param $post_type
 *
 * ritorna il gruppo di appartenenza del post type
 * @return string
 *
 */
function dsi_get_post_types_group($post_type){
	$group = "news";
	if(in_array($post_type, array("documento", "luogo", "struttura", "page"))) // todo: programma materia if(in_array($post_type, array("documento", "luogo", "programma_materia", "struttura", "page")))
		$group = "school";
	else if(in_array($post_type, array("programma", "scheda_didattica", "scheda_progetto")))
		$group = "education";
	else if(in_array($post_type, array("servizio", "indirizzo")))
		$group = "service";


	return $group;
}

/**
 * @param $post_type
 *
 * ritorna il gruppo in italiano
 * @return string
 */
function dsi_get_italian_name_group($group) {
	$gruppo = "Novità";
	if($group == "school")
		$gruppo = "La Scuola";
	else if($group == "education")
		$gruppo = "Didattica";
	else if($group == "service")
		$gruppo = "Servizi";
	
    return $gruppo;
}

/**
 * @param $post_type
 *
 * ritorna il suffisso della classe relativa al colore
 * @return string
 */
function dsi_get_post_types_color_class($post_type) {
	$class = "greendark";
	$group = dsi_get_post_types_group($post_type);
	if($group == "school")
		$class = "redbrown";
	else if($group == "education")
		$class = "bluelectric";
	else if($group == "service")
		$class = "purplelight";
	return $class;
}

/**
 * @param $post_type
 *
 * ritorna il nome dell'svg utilizzato per la preview del post type
 * @return string
 */
function dsi_get_post_types_icon_class($post_type) {
	$icon = "newspaper";
	$group = dsi_get_post_types_group($post_type);
	if($group == "school")
		$icon = "school-building";
	else if($group == "education")
		$icon = "school";
	else if($group == "service")
		$icon = "hand-point-up";

	if($post_type == "documento")
		$icon = "generic-document";
		return $icon;
}


/**
 *
 * Contatore dei post totali raggruppati in base al gruppo di ricerca di appartenenza
 *
 * @param $post_types
 *
 * @return bool|int
 */
function dsi_count_grouped_posts($post_types){
	if(!is_array($post_types))
		return false;
	$count = 0;
	foreach ($post_types as $post_type){
		$count_posts = wp_count_posts($post_type);
		if(isset($count_posts->publish))
			$count += $count_posts->publish;
	}
	return $count;

}

/**
 * recupera la url del template in base al nome
 * @param $TEMPLATE_NAME
 *
 * @return string|null
 */
function dsi_get_template_page_url($TEMPLATE_NAME){
	$pages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => $TEMPLATE_NAME,
        'hierarchical' => 0
	));

    if($pages){
        foreach ($pages as $page){
            if($page->ID)
                return get_page_link($page->ID);
        }
    }
	return null;
}

/**
 * recupera id page template in base al nome
 * @param $TEMPLATE_NAME
 *
 * @return string|null
 */
function dsi_get_template_page_id($TEMPLATE_NAME){
    $url = null;
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $TEMPLATE_NAME,
        'hierarchical' => 0
    ));
    if($pages){
        foreach ($pages as $page){
            if($page->ID)
                return $page->ID;
        }
    }

    return 0;
}

/**
 * ritorna l'array dei feedback delle circolari
 * @return array
 */
function dsi_get_circolari_feedback_options(){
    return array(
        "false" => __('Nessun Feedback ', 'design_scuole_italia'),
        'presa_visione' => __('Presa Visione', 'design_scuole_italia'),
        'si_no' => __('Si / No', 'design_scuole_italia'),
        'si_no_visione' => __('Si / No / Presa Visione', 'design_scuole_italia'),
    );
}

/**
 * controlla se l'utente è abilitato a firmare la circolare
 * @param $user
 * @param $post
 * @return bool
 */
function dsi_user_can_sign_circolare($user, $post){

    $destinatari_circolari = dsi_get_meta("destinatari_circolari", "", $post->ID);
    if($destinatari_circolari == "all"){
        return true;
    }elseif ($destinatari_circolari == "ruolo"){
        $ruoli_circolari = dsi_get_meta("ruoli_circolari", "", $post->ID);
		if ($ruoli_circolari) {	
			if( array_intersect($ruoli_circolari, $user->roles ) ) {
				return true;
			}
		}
		}elseif ($destinatari_circolari == "gruppo"){
			$gruppi_circolari = dsi_get_meta("gruppi_circolari", "", $post->ID);
			if(is_object_in_term($user->ID, "gruppo-utente", $gruppi_circolari)){
				return true;
			}
		}

    return false;
}


/**
 * Controllo se l'utente ha già firmato la circolare
 * @param $user
 * @param $post
 * @return bool
 */
function dsi_user_has_signed_circolare($user, $post){
    $signed = get_post_meta($post->ID, "_dsi_has_signed", true);
    if(!$signed)
        $signed = array();
    if(in_array($user->ID, $signed)){
        $sign = get_user_meta($user->ID, "_dsi_signed_".$post->ID, true);
        if($sign)
            return $sign;

        return true;
    }
    return false;
}

/**
 * check if is circolare
 * @param $post
 * @return bool
 */
function dsi_is_circolare($post){

    if($post->post_type == "circolare")
        return true;

    return false;
}


/**
 * check if is circolare
 * @param $post
 * @return bool
 */
function dsi_is_albo($post){

    if(has_term("albo-online", "tipologia-documento", $post))
        return true;

    return false;
}

/**
 * Converte l'anno scolastico nel formato da stampare
 */
function dsi_convert_anno_scuola($anno){
    if(is_int($anno)) {
        $nextanno = $anno + 1;
        return $anno . "/" . $nextanno;
    }else{
        return "";
    }

}

/**
 * controllo se una struttura è una scuola
 * @param $post
 * @return bool
 */
function dsi_is_scuola($post){

    if(has_term("scuola", "tipologia-struttura", $post))
        return true;

    return false;
}


/**
 * ritorna l'anno scolastico corrente
 * @param bool $year
 * @return false|int|string
 */
function dsi_get_current_anno_scolastico($year = true){
    $today_month = date("n");
    if($today_month > 6){
        if($year) return date("Y")-0; else return dsi_convert_anno_scuola(date("Y")-0);
    }else{
        if($year) return date("Y")-1; else return dsi_convert_anno_scuola(date("Y")-1);
    }

}


/**
 * restituisce intero
 * @param $value
 * @param $field_args
 * @param $field
 * @return int|string
 */
function dsi_sanitize_int( $value, $field_args, $field ) {
    // Don't keep anything that's not numeric
    if ( ! is_numeric( $value ) ) {
        $sanitized_value = '';
    } else {
        // Ok, let's clean it up.
        $sanitized_value = absint( $value );
    }
    return $sanitized_value;
}


if(!function_exists("dsi_pluralize_string")) {
    function dsi_pluralize_string($string){
    switch ($string){
        case "Biblioteca":
            $string = "Biblioteche";
            break;

        case "Palestra":
            $string = "Palestre";
            break;

        case "Edificio scolastico":
            $string = "Edifici scolastici";
            break;

        case "Teatro":
            $string = "Teatri";
            break;

        case "Laboratorio":
            $string = "Laboratori";
            break;

        case "Giardino":
            $string = "Giardini";
            break;

        case "Dirigenza Scolastica":
            $string = "Dirigenze Scolastiche";
            break;

        case "Segreteria":
            $string = "Segreterie";
            break;

        case "Scuola":
            $string = "Scuole";
            break;

        case "Commissione":
            $string = "Commissioni";
            break;

        case "Organo Collegiale":
            $string = "Organi Collegiali";
            break;

        case "Associazione scolastica":
            $string = "Associazioni scolastiche";
            break;

        case "Mensa":
            $string = "Mense";
            break;

        case "Documento Generico":
            $string = "Documenti Generici";
            break;

        case "Bandi e Gare":
            $string = "Bandi e Gare";
            break;

        case "Contratto":
            $string = "Contratti";
            break;

        case "Delibera":
            $string = "Delibere";
            break;

        case "Verbale":
            $string = "Verbali";
            break;

        case "Regolamento":
            $string = "Regolamenti";
            break;

        case "Documento Programmatico":
            $string = "Documenti Programmatici";
            break;

        case "Documento Didattico":
            $string = "Documenti Didattici";
            break;

        case "Modulistica":
            $string = "Modulistica";
            break;

        case "Albo online":
            $string = "Albo online";
            break;

        case "Progetto area scientifica":
            $string = "Progetti area scientifica";
            break;

        case "Progetto area umanistica":
            $string = "Progetti area umanistica";
            break;

        case "Progetto di integrazione":
            $string = "Progetti di integrazione";
            break;

        case "Progetto di orientamento":
            $string = "Progetti di orientamento";
            break;

        case "Progetto territorio e ambiente":
            $string = "Progetti territorio e ambiente";
            break;


        case "Indirizzo di Studio":
            $string = "Indirizzi di studio";
            break;

        case "Scuola / Istituto":
            $string = "Scuole / Istituti";
            break;

        case "":
            $string = "";
            break;

    }

        return $string;
    }
}

/**
 * funzione per la gestione del nome autore
 */

function dsi_get_display_name($user_id){

    $display = get_the_author_meta('display_name', $user_id);
    $nome = get_the_author_meta('first_name', $user_id);
    $cognome = get_the_author_meta('last_name', $user_id);
    if(($nome != "") && ($cognome != ""))
        return $nome." ".$cognome;
    else
        return $display;

}


/**
 *  Funzione per la ricerca di un valore in un array multiplo
 *  * @since  0.1.0
 * @param  string $search_for  Value to search
 * @param  array  $search_in Array where to search
 * @param  mixed  $okey Previous value
 * @return mixed
 */
if(!function_exists("dsi_multi_array_search")) {
    function dsi_multi_array_search($search_for, $search_in, $okey = false) {
        foreach ($search_in as $key => $element) {
            $key = $okey ? $okey : $key;
            if (($element === $search_for) || (is_array($element) && $key = dsi_multi_array_search($search_for, $element, $key))) {
                return $key;
            }
        }
        return false;
    }
}


/**
 *  Tronca un testo in base ai valori specificati
 *  * @since 0.1.0
 * @param $string initial text
 * @param $limit truncate length
 * @param string $break
 * @param string $pad
 * @return string
 */
if(!function_exists("dsi_truncate")) {
    function dsi_truncate($string, $limit, $break = " ", $pad = "..."){
        $string = html_entity_decode($string, ENT_QUOTES, "UTF-8");

        $string = strip_tags($string);
        if (mb_strlen($string) <= $limit)
            return $string;

        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($string, $break, $limit))) {
            if ($breakpoint < mb_strlen($string) - 1) {
                $string = mb_substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }
}

/**
 * get group related to current page
 */
if(!function_exists("dsi_get_current_group")) {
    function dsi_get_current_group() {
        if (is_front_page()) {
            return null;
        }
        if (is_tax()) {
            $taxonomy = get_queried_object() -> taxonomy;
            $term = get_queried_object() -> slug;
            if ($taxonomy == 'tipologia-servizio'){
               $tipo_post = 'servizio';
            }
            if ($taxonomy == 'tipologia-documento'){
                $tipo_post ='documento';
            }
            if ($taxonomy == 'tipologia-articolo'){
                $tipo_post = 'post';
            }
            if ($tipo_post == 'documento' && $term == 'albo-online') {
                return 'news';
            }
            return  dsi_get_post_types_group($tipo_post);
        }
        if (is_author()) {
            return 'school';
        }
        if ( is_archive()  ) {
            $tipo_post = get_queried_object() -> name;
            return  dsi_get_post_types_group($tipo_post);
        }
        if (is_page()) {
            $rel_url = wp_make_link_relative(get_permalink());
            $rel_url =  preg_replace('/^' . preg_quote('/', '/') . '/', '', $rel_url);
            $group_slug = strtok($rel_url, '/');
            switch($group_slug){
                case 'la-scuola':
                    return 'school';
                case 'didattica' :
                    return 'education';
                case 'novita': case 'evento': case 'circolare':
                    return 'news';
                case 'servizi':
                    return 'service';
            }
            return null;
        }
        $current_post_type = get_post_type();
        if ($current_post_type == 'documento') {
            $term = wp_get_post_terms(get_the_ID(),'tipologia-documento');
            if ($term[0]->slug == 'albo-online'){
                return 'news';
            }
        }
        if ( ($current_post_type != false)) {
            return dsi_get_post_types_group(get_post_type());
        }
        return null;
    }
}

// Returns an img tag with appropriate attributes from URL
if(!function_exists("dsi_get_img_from_url")) {
    function dsi_get_img_from_url( $url, $classes = '', $show_title = false) {
        $img_post = get_post( attachment_url_to_postid($url) );
        $image_alt = get_post_meta( $img_post->ID, '_wp_attachment_image_alt', true);
        $image_title = get_the_title( $img_post->ID );

        $img = '<img src="'.$url.'" ';        
        if ($classes) $img .= 'class="'.$classes.'" ';
        if ($image_alt) $img .= 'alt="'.$image_alt.'" ';
        if ($image_title && $show_title) $img .= 'title="'.$image_title.'" ';
        $img .= '/>';

        echo $img;
    }
}

// Returns an img tag with appropriate attributes from ID & URL
if(!function_exists("dsi_get_img_from_id_url")) {
    function dsi_get_img_from_id_url( $id, $url, $classes = '', $show_title = false) {
        $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
        $image_title = get_the_title( $id );
        if ($url) {
            $url_parts = parse_url($url);
            if (str_contains($url_parts['host'], "gravatar.com")) {
                $image_alt = "Avatar utente";
            }
        }
        $img = '<img src="'.$url.'" ';
        if ($classes) $img .= 'class="'.$classes.'" ';
        if ($image_alt) $img .= 'alt="'.$image_alt.'" ';
        if ($image_title && $show_title) $img .= 'title="'.$image_title.'" ';
        $img .= '/>';

        echo $img;
    }
}
