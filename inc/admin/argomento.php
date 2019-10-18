<?php
/**
 * trasformo la categoria nativa wp in argomento non gerarchico
 */
add_action( 'init', 'dsi_create_argomento_taxonomy', 10 );

function dsi_create_argomento_taxonomy() {


    global $wp_rewrite;

    $rewrite =  array(
        'hierarchical'              => true, // Maintains tag permalink structure
        'slug'                      => get_option('category_base') ? get_option('category_base') : 'category',
        'with_front'                => ! get_option('category_base') || $wp_rewrite->using_index_permalinks(),
        'ep_mask'                   => EP_CATEGORIES,
    );

    // Redefine tag labels (or leave them the same)

    $labels = array(
        'name'                       => _x( 'Argomenti', 'Taxonomy General Name', 'design_scuole_italia' ),
        'singular_name'              => _x( 'Argomento', 'Taxonomy Singular Name', 'design_scuole_italia' ),
        'menu_name'                  => __( 'Argomenti', 'design_scuole_italia' ),
        'all_items'                  => __( 'Tutti gli argomenti', 'design_scuole_italia' ),
        'new_item_name'              => __( 'Nuovo argomento', 'design_scuole_italia' ),
        'add_new_item'               => __( 'Aggiungi un argomento', 'design_scuole_italia' ),
        'edit_item'                  => __( 'Modifica argomento', 'design_scuole_italia' ),
        'update_item'                => __( 'Aggiorna argomento', 'design_scuole_italia' ),
        'view_item'                  => __( 'Visualizza argomento', 'design_scuole_italia' ),
        'separate_items_with_commas' => __( 'Separa gli argomenti con la virgola', 'design_scuole_italia' ),
        'add_or_remove_items'        => __( 'Aggiungi o rimuovi argomento', 'design_scuole_italia' ),
        'choose_from_most_used'      => __( 'Scegli tra i più utilizzati', 'design_scuole_italia' ),
        'popular_items'              => __( 'Argomenti popolari', 'design_scuole_italia' ),
        'search_items'               => __( 'Cerca argomento', 'design_scuole_italia' ),
        'not_found'                  => __( 'Non trovato', 'design_scuole_italia' ),
    );

    // Override structure of built-in WordPress category

    register_taxonomy(
        'category',
        'post',
        array(
            'hierarchical'          => false,
            'query_var'             => 'category_name',
            'labels'                    => $labels,
            'rewrite'                   => $rewrite,
            'public'                => true,
            'show_ui'               => true,
            'show_admin_column'     => true,
            '_builtin'              => true,
            'capabilities'          => array(
                'manage_terms' => 'manage_categories',
                'edit_terms'   => 'edit_categories',
                'delete_terms' => 'delete_categories',
                'assign_terms' => 'assign_categories',
            ),
            'show_in_rest'          => true,
            'rest_base'             => 'categories',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );



    register_taxonomy_for_object_type( 'category', 'servizio' );
	register_taxonomy_for_object_type( 'category', 'documento' );
	register_taxonomy_for_object_type( 'category', 'materia' );
	register_taxonomy_for_object_type( 'category', 'luogo' );
	register_taxonomy_for_object_type( 'category', 'struttura' );
	register_taxonomy_for_object_type( 'category', 'evento' );
    // todo: programma materia
	//	register_taxonomy_for_object_type( 'category', 'programma_materia' );

    register_taxonomy_for_object_type( 'category', 'circolare' );
    register_taxonomy_for_object_type( 'category', 'scheda_progetto' );
    register_taxonomy_for_object_type( 'category', 'scheda_didattica' );



}


/**
 * Filtro per estendere i post type alle categorie
 */
add_filter('pre_get_posts', 'dsi_query_post_type');
function dsi_query_post_type($query) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ( is_category() ) {
			$post_type = get_query_var( 'post_type' );
			if ( $post_type ) {
				//$post_type = $post_type;
			} else {
				$post_type = array(
					'post',
                    'circolare',
					'servizio',
					'documento',
					'materia',
					'luogo',
					'struttura',
					'evento',
					// 'programma_materia', // todo: programma materia
					'nav_menu_item'
				);
			} // don't forget nav_menu_item to allow menus to work!
			$query->set( 'post_type', $post_type );

			return $query;
		}
	}
}

