<?php



/**
 * Hide content editor for post types defined in settings
 */
add_action( 'admin_init', 'dsi_hide_editor' );

function dsi_hide_editor() {
	global $pagenow;
	if ( $pagenow == "post.php" ) {
		// Get the Post ID.
        if(isset($_GET['post']))
		    $post_id = $_GET['post'];
        else if(isset($_POST['post_ID']))
            $post_id = $_POST['post_ID'];

		if ( ! isset( $post_id ) ) {
			return;
		}

		// Get the name of the Page Template file.
		$template_file = get_post_meta( $post_id, '_wp_page_template', true );

		if ( $template_file == 'page-templates/la-scuola.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}

		if ( $template_file == 'page-templates/notizie.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}

		if ( $template_file == 'page-templates/servizi.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}

		if ( $template_file == 'page-templates/didattica.php' ) { // edit the template name
			remove_post_type_support( 'page', 'editor' );
		}

        if ( $template_file == 'page-templates/persone.php' ) { // edit the template name
            remove_post_type_support( 'page', 'editor' );
        }

        if ( $template_file == 'page-templates/numeri.php' ) { // edit the template name
            remove_post_type_support( 'page', 'editor' );
        }
	}
}

/**
 * Add css admin style
 */

function dsi_admin_css_load() {
	wp_enqueue_style( 'style-admin-css', get_stylesheet_directory_uri() . '/inc/admin-css/style-admin.css' );
}

add_action( 'admin_enqueue_scripts', 'dsi_admin_css_load' );


/**
 * filter for search
 */
function dsi_search_filters( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search ) {
		$allowed_types = array( "any", "school", "news", "education", "service" );
		if ( isset( $_GET["type"] ) && in_array( $_GET["type"], $allowed_types ) ) {
			$type = $_GET["type"];
			$post_types = dsi_get_post_types_grouped( $type );
			$query->set( 'post_type', $post_types );

		}

		if ( isset( $_GET["post_types"] ) ) {
			$query->set( 'post_type', $_GET["post_types"] );

		}
		if ( isset( $_GET["post_terms"] ) ) {
			$query->set( 'category__in', $_GET["post_terms"]);
		}

			// associazione tra types e post_type

	}
}

add_action( 'pre_get_posts', 'dsi_search_filters' );

/**
 * customize excerpt
 * @param $length
 *
 * @return int
 */
function dsi_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'dsi_excerpt_length', 999 );


/**
 * filter for events
 *  controllo le query sugli eventi e le modifico per estrarre gli eventi futuri
 */
function dsi_eventi_filters( $query ) {

    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive("evento") ) {
        if(isset($_GET["archive"]) && ($_GET["archive"] == "true")){
            $query->set('meta_key', '_dsi_evento_timestamp_inizio' );
            $query->set('orderby', array('meta_value' => 'DESC', 'date' => 'DESC'));
            $query->set( 'meta_query', array(
                array(
                    'key' => '_dsi_evento_timestamp_inizio'
                ),
                array(
                    'key' => '_dsi_evento_timestamp_fine',
                    'value' => time(),
                    'compare' => '<=',
                    'type' => 'numeric'
                )
            ));
        }else{
            $query->set('meta_key', '_dsi_evento_timestamp_inizio' );
            $query->set('orderby', array('meta_value' => 'DESC', 'date' => 'DESC'));
            $query->set( 'meta_query', array(
                array(
                    'key' => '_dsi_evento_timestamp_inizio'
                ),
                array(
                    'key' => '_dsi_evento_timestamp_fine',
                    'value' => time(),
                    'compare' => '>=',
                    'type' => 'numeric'
                )
            ));

        }
    }else if(! is_admin() && ! $query->is_main_query()){
        if ($query->get("post_type") == "evento"){
            $query->set('meta_key', '_dsi_evento_timestamp_inizio' );
            $query->set('orderby', array('meta_value' => 'DESC', 'date' => 'DESC'));
            $query->set( 'meta_query', array(
                array(
                    'key' => '_dsi_evento_timestamp_inizio'
                ),
                array(
                    'key' => '_dsi_evento_timestamp_fine',
                    'value' => time(),
                    'compare' => '>=',
                    'type' => 'numeric'
                )
            ));
        }
    }
}

add_action( 'pre_get_posts', 'dsi_eventi_filters' );

/**
 * Personalizzo archive title
 */
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {
        $title = __("Argomento", "design_scuole_italia").": ".single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_tax("tipologia-articolo") ) {

        $title = single_term_title('', false);
        if($title == "Articoli"){
            $title = "Presentazione";
        }
    } elseif ( is_tax("tipologia-documento") ) {
        $title = single_term_title('', false);
    } elseif ( is_tax("tipologia-servizio") ) {
        $title = __("Servizi per ", "design_scuole_italia").": ".single_term_title('', false);
    } elseif ( is_post_type_archive("luogo") ) {
        $title = __("I luoghi della scuola", "design_scuole_italia");
    } elseif ( is_post_type_archive("struttura") ) {
        $title = __("Organizzazione", "design_scuole_italia");
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title('', false);
    }

    return $title;

});


/**
 * fix plugin amministrazione aperta
 */

function dsi_ammap_getJs(){
    wp_deregister_script('ammap_functions');
    wp_dequeue_script('ammap_functions');

    wp_register_script( 'ammap_functions', plugins_url('amministrazione-aperta/js/ammap.js'));
    wp_enqueue_script( 'ammap_functions');
}
add_filter('admin_footer', 'dsi_ammap_getJs', 100);