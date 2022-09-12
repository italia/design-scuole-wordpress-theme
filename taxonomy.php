<?php
$obj = get_queried_object();

if($obj->taxonomy == "tipologia-evento")
	get_template_part("archive-evento");
else if($obj->taxonomy == "tipologia-documento")
	get_template_part("archive-documento");
else if($obj->taxonomy == "tipologia-servizio")
	get_template_part("archive-servizio");
else if($obj->taxonomy == "tipologia-circolare")
    get_template_part("archive-circolare");
else if($obj->taxonomy == "tipologia-luogo")
	get_template_part("archive-luogo");
else if($obj->taxonomy == "tipologia-progetto")
    get_template_part("archive-scheda_progetto");
else
	get_template_part("archive");


/**
 * Create two taxonomies, genres and writers for the post type "sicurezza".
 *
 * @see register_post_type() for registering custom post types.
 */
function wpdocs_create_sicurezza_taxonomies() {

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Sicurezza della scuola', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Sicurezza della scuola', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Sicurezza della scuola', 'textdomain' ),
		'popular_items'              => __( 'Popular Sicurezza della scuola', 'textdomain' ),
		'all_items'                  => __( 'All Sicurezza della scuola', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Sicurezza della scuola', 'textdomain' ),
		'update_item'                => __( 'Update Sicurezza della scuola', 'textdomain' ),
		'add_new_item'               => __( 'Add New Sicurezza della scuola', 'textdomain' ),
		'new_item_name'              => __( 'New Sicurezza della scuola Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate Sicurezza della scuola with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove Sicurezza della scuola', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Sicurezza della scuola', 'textdomain' ),
		'not_found'                  => __( 'No Sicurezza della scuola found.', 'textdomain' ),
		'menu_name'                  => __( 'Sicurezza della scuola', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'Sicurezza della scuola' ),
	);

	register_taxonomy( 'Sicurezza della scuola', 'sicurezza', $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Disposizioni covid-19', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Disposizioni covid-19', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Disposizioni covid-19', 'textdomain' ),
		'popular_items'              => __( 'Popular Disposizioni covid-19', 'textdomain' ),
		'all_items'                  => __( 'All Disposizioni covid-19', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Disposizioni covid-19', 'textdomain' ),
		'update_item'                => __( 'Update Disposizioni covid-19', 'textdomain' ),
		'add_new_item'               => __( 'Add New Disposizioni covid-19', 'textdomain' ),
		'new_item_name'              => __( 'New Disposizioni covid-19 Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate Disposizioni covid-19 with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove Disposizioni covid-19', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Disposizioni covid-19', 'textdomain' ),
		'not_found'                  => __( 'No Disposizioni covid-19 found.', 'textdomain' ),
		'menu_name'                  => __( 'Disposizioni covid-19', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'Disposizioni covid-19' ),
	);

	register_taxonomy( 'Disposizioni covid-19', 'sicurezza', $args );
}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'wpdocs_create_sicurezza_taxonomies', 0 );
