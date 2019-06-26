<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'dsi_create_argomento_taxonomy', 10 );

function dsi_create_argomento_taxonomy() {

	register_taxonomy_for_object_type( 'category', 'servizio' );
	register_taxonomy_for_object_type( 'category', 'documento' );
	register_taxonomy_for_object_type( 'category', 'materia' );
	register_taxonomy_for_object_type( 'category', 'luogo' );
	register_taxonomy_for_object_type( 'category', 'struttura' );

}
?>