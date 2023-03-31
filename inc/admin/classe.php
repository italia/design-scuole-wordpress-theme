<?php

// todo: programma materia
//add_action( 'init', 'dsi_register_classe_tax', 0 );
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
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'classe' ),
        'capabilities'      => array(
            'manage_terms'  => 'manage_classi',
            'edit_terms'    => 'edit_classi',
            'delete_terms'  => 'delete_classi',
            'assign_terms'  => 'assign_classi'
        )
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

    $options_anno = array();
    for($i = date("Y")-10; $i < (date("Y")+10); $i++){
        $options_anno[$i] = $i."/".($i+1);
    }
    $cmb_term->add_field( array(
        'name'    =>  __( 'Anno scolastico', 'design_scuole_italia' ),
        'id'   => $prefix.'anno_scolastico',
        'type'    => 'pw_select',
        'options' => $options_anno,
        'default' => dsi_get_current_anno_scolastico(),
    ) );

    $cmb_term->add_field(  array(
        'id' => $prefix.'struttura_organizzativa',
        'name'    => __( 'Seleziona la Scuola  di cui fa parte la classe', 'design_scuole_italia' ),
        'desc' => __( 'NB: La scuola è una <a href="edit.php?post_type=struttura">Struttura organizzativa</a> di tipologia "Scuola. Se non esiste creala prima <a href="edit.php?post_type=struttura">qui</a>"' , 'design_scuole_italia' ),
        'type'    => 'pw_select',
        'options' => dsi_get_strutture_scuole_options(),
    ) );

    $cmb_term->add_field(  array(
        'id' => $prefix.'percorso_studi',
        'name'    => __( 'Settore, Indirizzo o Percorso specifico', 'design_scuole_italia' ),
        'desc' => __( 'NB: Puoi selezionare i percorsi di studio che hai associato alle Strutture di tipo scuola' , 'design_scuole_italia' ),
        'type'    => 'pw_select',
        'options' => dsi_get_strutture_indirizzo_scuole_options(),
    ) );



/** calendario  **/
    $cmb_term->add_field(
		array(
			'name' => __( '<br>Calendario delle Lezioni', 'design_scuole_italia' ),
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


        $group_field_id = $cmb_term->add_field(array(
            'id' => $prefix . $ggkey,
            'type' => 'group',
            'name' => __(ucfirst($ggvalue), 'design_scuole_italia'),
            'description' => __('Inserisci gli orari del ' . $ggvalue, 'design_scuole_italia'),

            // 'repeatable'  => false, // use false if you want non-repeatable group
            'options' => array(
                'group_title' => __('Lezione {#}', 'design_scuole_italia'),
                // since version 1.1.4, {#} gets replaced by row number
                'add_button' => __('Aggiungi una lezione', 'design_scuole_italia'),
                'remove_button' => __('Rimuovi', 'design_scuole_italia'),
                'sortable' => true,
                 'closed'         => true, // true to have the groups closed by default
                // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
            ),
            'attributes' => array(
                'data-conditional-id' => $prefix . 'calendario_enabled',
                'data-conditional-value' => 1,
            ),
        ));

        $cmb_term->add_group_field($group_field_id, array(
            'name' => __('Ora inizio', 'design_scuole_italia'),
            'id' => 'ora_inizio',
            'type' => 'text_time',
        ));
        $cmb_term->add_group_field($group_field_id, array(
            'name' => __('Ora fine', 'design_scuole_italia'),
            'id' => 'ora_fine',
            'type' => 'text_time'
        ));


        $cmb_term->add_group_field($group_field_id, array(
                'name' => __('Materia', 'design_scuole_italia'),
                'id' => 'materia',
                'taxonomy' => 'materia', //Enter Taxonomy Slug
                'type' => 'taxonomy_select',

                'remove_default' => 'true'
            )
        );

    }


    /**  repeater libri **/

    $group_field_id = $cmb_term->add_field( array(
        'id'          => $prefix . 'libri',
        'name'        => __('<h1>Libri</h1>', 'design_scuole_italia' ),
        'type'        => 'group',
        'description' => __( 'Lista libri obbligatori', 'design_scuole_italia' ),
        'options'     => array(
            'group_title'    => __( 'Libro {#}', 'design_scuole_italia' ), // {#} gets replaced by row number
            'add_button'     => __( 'Aggiungi un libro', 'design_scuole_italia' ),
            'remove_button'  => __( 'Rimuovi', 'design_scuole_italia' ),
            'sortable'       => true,
            // 'closed'      => true, // true to have the groups closed by default
            //'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );

    $cmb_term->add_group_field( $group_field_id, array(
        'id' => 'titolo_libro',
        'description'    => __( 'Titolo del Libro', 'design_scuole_italia' ),
        'type'    => 'text'

    ) );

    $cmb_term->add_group_field( $group_field_id, array(
        'id' => 'autore_libro',
        'description'    => __( 'Autore del libro', 'design_scuole_italia' ),
        'type'    => 'text'

    ) );

    $cmb_term->add_group_field( $group_field_id, array(
        'id' => 'editore_libro',
        'description'    => __( 'Editore del libro', 'design_scuole_italia' ),
        'type'    => 'text'

    ) );

    $cmb_term->add_group_field( $group_field_id, array(
        'id' => 'isbn_libro',
        'description'    => __( 'Codice ISBN', 'design_scuole_italia' ),
        'type'    => 'text'

    ) );



}
//add_action( 'cmb2_admin_init', 'dsi_register_classe_metabox' );

//add_action( 'admin_print_scripts-edit-tags.php', 'dsi_classe_admin_script', 11 );
//add_action( 'admin_print_scripts-term.php', 'dsi_classe_admin_script', 11 );


function dsi_classe_admin_script() {

        wp_enqueue_script( 'classe-admin-script', get_template_directory_uri() . '/inc/admin-js/classe.js' );
}



function add_classe_columns($columns){
    $columns['anno'] = 'Anno';
    $columns['scuola'] = 'Scuola';
    return $columns;
}
add_filter('manage_edit-classe_columns', 'add_classe_columns');

function add_classe_column_content($content,$column_name,$term_id){
    $anno = dsi_get_term_meta("anno_scolastico", "_dsi_classe_", $term_id);
    $anno = dsi_convert_anno_scuola($anno);

    $idscuola = dsi_get_term_meta("struttura_organizzativa", "_dsi_classe_", $term_id);

    $scuola = get_post($idscuola);
    switch ($column_name) {
        case 'anno':
            $content = $anno;
        break;
        case 'scuola':
          if($scuola) $content = $scuola->post_title;
        break;
        default:
            break;
    }
    return $content;
}
add_filter('manage_classe_custom_column', 'add_classe_column_content',10,3);
