<?php

add_action( 'init', 'dsi_register_classe_tax', 0 );
function dsi_register_classe_tax() {

	$labels = array(
		'name'              => _x( 'Classi', 'taxonomy general name', 'design_scuole_italia' ),
		'singular_name'     => _x( 'Classe', 'taxonomy singular name', 'design_scuole_italia' ),
		'search_items'      => __( 'Cerca Classe', 'design_scuole_italia' ),
		'all_items'         => __( 'Tutte le classi', 'design_scuole_italia' ),
		'edit_item'         => __( 'Modifica la Classe', 'design_scuole_italia' ),
		'update_item'       => __( 'Aggiorna la Classe', 'design_scuole_italia' ),
		'add_new_item'      => __( 'Aggiungi una Classe', 'design_scuole_italia' ),
		'new_item_name'     => __( 'Nuova Classe', 'design_scuole_italia' ),
		'menu_name'         => __( 'Classe', 'design_scuole_italia' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'classe' ),
	);

	register_taxonomy( 'classe', array( 'programma_materia' ), $args );
}


function dsi_register_classe_metabox() {
	$prefix = '_dsi_classe_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_term = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => esc_html__( 'Classe', 'design_scuole_italia' ), // Doesn't output for term boxes
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array( 'classe'), // Tells CMB2 which taxonomies should have these fields
		// 'new_term_section' => true, // Will display in the "Add New Category" section
	) );

	$cmb_term->add_field(
		array(
			'name' => __( 'Calendario delle Lezioni', 'design_scuole_italia' ),
			'type' => 'title',
			'id'   => $prefix.'calendario_title'
		)
	);
	$cmb_term->add_field( array(
		'name'    =>  __( 'Mostra il Calendario', 'design_scuole_italia' ),
		'id'   => $prefix.'calendario_enabled',
		'type'    => 'radio_inline',
		'options' => array(
			0 => __( 'No', 'design_scuole_italia' ),
			1   => __( 'Si', 'design_scuole_italia' ),
		),
		'default' => 0,
	) );

	$arr_ggs = array("lunedi"=>"lunedì","martedi"=>"martedì","mercoledi"=>"mercoledì","giovedi"=>"giovedì","venerdi"=>"venerdì","sabato"=>"sabato");
	foreach ($arr_ggs as $ggkey=>$ggvalue) {


		$group_field_id = $cmb_term->add_field( array(
			'id'          => $prefix . $ggkey,
			'type'        => 'group',
			'name'        => __(ucfirst($ggvalue), 'design_scuole_italia' ),
			'description' => __( 'Inserisci gli orari del '.$ggvalue, 'design_scuole_italia' ),

			// 'repeatable'  => false, // use false if you want non-repeatable group
			'options'     => array(
				'group_title'   => __( 'Lezione {#}', 'design_scuole_italia' ),
				// since version 1.1.4, {#} gets replaced by row number
				'add_button'    => __( 'Aggiungi una lezione', 'design_scuole_italia' ),
				'remove_button' => __( 'Rimuovi', 'design_scuole_italia' ),
				'sortable'      => true,
				// 'closed'         => true, // true to have the groups closed by default
				// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
			),
			'attributes'  => array(
				'data-conditional-id'    => $prefix . 'calendario_enabled',
				'data-conditional-value' => 1,
			),
		) );

		$cmb_term->add_group_field( $group_field_id, array(
			'name' => __( 'Ora inizio', 'design_scuole_italia' ),
			'id'   => 'ora_inizio',
			'type' => 'text_time'
		) );
		$cmb_term->add_group_field( $group_field_id, array(
			'name' => __( 'Ora fine', 'design_scuole_italia' ),
			'id'   => 'ora_fine',
			'type' => 'text_time'
		) );


		$cmb_term->add_group_field( $group_field_id, array(
				'name'     => __( 'Materia', 'design_scuole_italia' ),
				'id'       => 'materia',
				'taxonomy' => 'materia', //Enter Taxonomy Slug
				'type'     => 'taxonomy_select',

				'remove_default' => 'true'
			)
		);
		$cmb_term->add_group_field( $group_field_id, array(
			'id'               => 'programma',
			'name'             => __( 'Programma', 'design_scuole_italia' ),
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => dsi_get_program_options(),
		) );
	}
}
add_action( 'cmb2_admin_init', 'dsi_register_classe_metabox' );