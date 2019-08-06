<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'dsi_create_argomento_taxonomy', 10 );

function dsi_create_argomento_taxonomy() {

	register_taxonomy_for_object_type( 'category', 'servizio' );
	register_taxonomy_for_object_type( 'category', 'documento' );
	register_taxonomy_for_object_type( 'category', 'materia' );
	register_taxonomy_for_object_type( 'category', 'luogo' );
	register_taxonomy_for_object_type( 'category', 'struttura' );
	register_taxonomy_for_object_type( 'category', 'evento' );
	register_taxonomy_for_object_type( 'category', 'programma_materia' );


}



add_filter('pre_get_posts', 'dsi_query_post_type');
function dsi_query_post_type($query) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ( is_category() ) {
			$post_type = get_query_var( 'post_type' );
			if ( $post_type ) {
				$post_type = $post_type;
			} else {
				$post_type = array(
					'post',
					'servizio',
					'documento',
					'materia',
					'luogo',
					'struttura',
					'evento',
					'programma_materia',
					'nav_menu_item'
				);
			} // don't forget nav_menu_item to allow menus to work!
			$query->set( 'post_type', $post_type );

			return $query;
		}
	}
}
?>