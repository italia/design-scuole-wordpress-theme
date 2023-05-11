<?php

add_action('init', 'register_progetti_post_type'); 
function register_progetti_post_type() {
    /** progetti **/
    $labels = array(
        'name'          => _x('Progetto', 'Post Type General Name', 'martino_martini'),
        'singular_name' => _x('Progetto', 'Post Type Singular Name', 'martino_martini'),
        'add_new'       => _x('Aggiungi un Progetto', 'Post Type Singular Name', 'martino_martini'),
        'add_new_item'  => _x('Aggiungi un Progetto', 'Post Type Singular Name', 'martino_martini'),
        'edit_item'      => _x('Modifica il Progetto', 'Post Type Singular Name', 'martino_martini'),
        'view_item'      => _x('Visualizza il Progetto', 'Post Type Singular Name', 'martino_martini'),
    );
    $args   = array(
        'label'         => __('progetti', 'martino_martini'),
        'labels'        => $labels,
        'supports'      => array('title', 'editor', 'thumbnail'),
        'hierarchical'  => true,
        'public'        => true,
        'taxonomies'    => ['tipologia_progetti'],
        'menu_position' => 20,
        'menu_icon'     => 'dashicons-media-document',
        'has_archive'   => true,
        'map_meta_cap'    => true,
    );
    register_post_type('progetti', $args);

    register_taxonomy('tipologia_progetti', ['progetti'], [
        'label' => __('Tipologia Progetto', 'martino_martini'),
        'hierarchical' => true,
        'rewrite' => ['slug' => 'tipologia_progetti'],
        'show_admin_column' => true,
        'show_in_rest' => true,
        'labels' => [
            'singular_name' => __('Tipologia di progetto', 'martino_martini'),
            'all_items' => __('Tutte le Tipologie di Progetto', 'martino_martini'),
            'edit_item' => __('Modifica Tipologia di progetto', 'martino_martini'),
            'view_item' => __('Visualizza Tipologia di progetto', 'martino_martini'),
            'update_item' => __('Aggiorna Tipologia di progetto', 'martino_martini'),
            'add_new_item' => __('Aggiungi nuova Tipologia di progetto', 'martino_martini'),
            'new_item_name' => __('Nuova Tipologia di progetto Name', 'martino_martini'),
            'search_items' => __('Cerca Tipologia di Progetto', 'martino_martini'),
            'parent_item' => __('Parent Tipologia di progetto', 'martino_martini'),
            'parent_item_colon' => __('Parent Tipologia di progetto:', 'martino_martini'),
            'not_found' => __('Tipologia di Progetto non trovata', 'martino_martini'),
        ]
    ]);
    register_taxonomy_for_object_type('tipologia_progetti', 'progetti');
};

// registro un nuovo field
add_action('cmb2_init', 'martini_add_progetti_metaboxes');
function martini_add_progetti_metaboxes()
{

    $prefix = '_martini_progetti_';

    $cmb_aftercontent = new_cmb2_box(array(
        'id'           => $prefix . 'box_elementi_dati',
        'title'        => __('Progetti', 'martino_martini'),
        'object_types' => array('progetti'),
        'context'      => 'normal',
        'priority'     => 'high',
    ));

    // Gruppo Galleria
    $cmb_aftercontent->add_field(array(
        'name' => 'Galleria',
        'desc' => '',
        'id'   => $prefix . 'wiki_galleria',
        'type' => 'file_list',
        'preview_size' => array(100, 100), // Default: array( 50, 50 )
        'query_args' => array('type' => 'image'), // Only images attachment
        'text' => array(
            'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
            'remove_image_text' => 'Replacement', // default: "Remove Image"
            'file_text' => 'Replacement', // default: "File:"
            'file_download_text' => 'Replacement', // default: "Download"
            'remove_text' => 'Replacement', // default: "Remove"
        ),
    ));

    // Gruppo referenti
    $martini_group_referenti = $cmb_aftercontent->add_field(array(
        'id'          => $prefix . 'group_referenti',
        'type'        => 'group',
        'description' => __('Inserisci i referenti', 'cmb2'),
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __('Referente progetto {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __('Aggiungi referente', 'cmb2'),
            'remove_button'     => __('Elimina referente', 'cmb2'),
        ),
    ));

    // Nome del referente
    $cmb_aftercontent->add_group_field($martini_group_referenti, array(
        'name' => 'Nome referente',
        'id'   => $prefix . 'nome_referente',
        'type' => 'text',
    ));

    // Email del referente
    $cmb_aftercontent->add_group_field($martini_group_referenti, array(
        'name' => __('Email', 'cmb2'),
        'desc' => __('inserisci qui la email', 'cmb2'),
        'id'   => $prefix . 'email_martini',
        'type' => 'text_email',
    ));


    // Gruppo link
    $martini_group_link = $cmb_aftercontent->add_field(array(
        'id'          => $prefix . 'group_link',
        'type'        => 'group',
        'description' => __('Inserisci i link', 'cmb2'),
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __('Link progetto {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __('Aggiungi link', 'cmb2'),
            'remove_button'     => __('Elimina link', 'cmb2'),
        ),
    ));

    // Nome del link
    $cmb_aftercontent->add_group_field($martini_group_link, array(
        'name' => 'Nome link',
        'id'   => $prefix . 'nome_link',
        'type' => 'text',
    ));

    // URL del link
    $cmb_aftercontent->add_group_field($martini_group_link, array(
        'name' => __('URL', 'cmb2'),
        'desc' => __('inserisci qui URL', 'cmb2'),
        'id'   => $prefix . 'url_link',
        'type' => 'text_url',
    ));
}
