<?php

add_action( 'init', 'dsi_create_argomento_taxonomy', 10 );

function dsi_create_argomento_taxonomy() {

    // elimino le categorie
    register_taxonomy('category', array());

    // rinomino i tag in argomenti
    global $wp_taxonomies;

    // The list of labels we can modify comes from
    //  http://codex.wordpress.org/Function_Reference/register_taxonomy
    //  http://core.trac.wordpress.org/browser/branches/3.0/wp-includes/taxonomy.php#L350
    $wp_taxonomies['post_tag']->labels = (object)array(
        'name'              => _x( 'Argomento', 'taxonomy general name', 'design_scuole_italia' ),
        'singular_name'     => _x( 'Argomento', 'taxonomy singular name', 'design_scuole_italia' ),
        'search_items'      => __( 'Cerca argomento', 'design_scuole_italia' ),
        'all_items'         => __( 'Tutti gli argomenti', 'design_scuole_italia' ),
        'edit_item'         => __( 'Modifica argomento', 'design_scuole_italia' ),
        'update_item'       => __( 'Aggiorna argomento', 'design_scuole_italia' ),
        'add_new_item'      => __( 'Aggiungi un argomento', 'design_scuole_italia' ),
        'new_item_name'     => __( 'Nuovo argomento', 'design_scuole_italia' ),
        'menu_name'         => __( 'Argomento', 'design_scuole_italia' ),
        'separate_items_with_commas' => __( 'Separata gli argomenti con la virgola', 'design_scuole_italia' ),
        'add_or_remove_items' => __( 'Aggiungi o rimuovi argomenti', 'design_scuole_italia' ),
        'choose_from_most_used' => __( 'Scegli tra gli argomenti più usati', 'design_scuole_italia' ),
    );

    $wp_taxonomies['post_tag']->label = 'Argomento';


	register_taxonomy_for_object_type( 'post_tag', 'servizio' );
	register_taxonomy_for_object_type( 'post_tag', 'documento' );
	register_taxonomy_for_object_type( 'post_tag', 'materia' );
	register_taxonomy_for_object_type( 'post_tag', 'luogo' );
	register_taxonomy_for_object_type( 'post_tag', 'struttura' );
	register_taxonomy_for_object_type( 'post_tag', 'evento' );
    	register_taxonomy_for_object_type( 'post_tag', 'circolare' );
    	register_taxonomy_for_object_type( 'post_tag', 'scheda_progetto' );
    	register_taxonomy_for_object_type( 'post_tag', 'scheda_didattica' );
    	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'post_tag', 'indirizzo' );
	register_taxonomy_for_object_type( 'post_tag', 'post' );

}

/**
 * Crea i metabox del post type post
 */
add_action( 'cmb2_init', 'dsi_add_argomento_metaboxes' );
function dsi_add_argomento_metaboxes() {

    $prefix = '_dsi_post_tag_';

    /**
     * Metabox to add fields to tags
     */
    $cmb_backend = new_cmb2_box( array(
        'id'               => $prefix . 'box_edit',
    	'object_types'     => array( 'term' ),
        'taxonomies'       => array( 'post_tag' ),
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $cmb_backend->add_field( array(
        'name' => __( 'Copertina', 'design_scuole_italia' ),
        'desc' => __( 'Copertina principale, viene mostrata nelle liste di panoramica', 'design_scuole_italia' ),
        'id'   => $prefix . 'immagine',
        'type' => 'file',
        'query_args' => array( 'type' => 'image' ), // Only images attachment
    ) );
}

/**
 * Filtro per estendere i post type ai tag
 */
add_filter('pre_get_posts', 'dsi_query_post_type');
function dsi_query_post_type($query) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ( is_tag() ) {
			$post_type = get_query_var( 'post_type' );
			if ( $post_type ) {
				//$post_type = $post_type;
			} else {
				$post_type = array(
					'post',
                    'circolare',
					'servizio',
					'documento',
				//	'materia',
					'luogo',
					'struttura',
					'evento',
                    'scheda_progetto',
                    'scheda_didattica',
					// 'programma_materia', // todo: programma materia
					'nav_menu_item'
				);
			} // don't forget nav_menu_item to allow menus to work!
			$query->set( 'post_type', $post_type );

			return $query;
		}
	}
}

