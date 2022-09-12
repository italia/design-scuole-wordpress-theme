<?php

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'test_metabox',
        'title'         => __( 'Custom fields per Martino Martini', 'cmb2' ),
        'object_types'  => array( 'page', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Titolo di test', 'cmb2' ),
        'desc'       => __( 'In questo campo bisogna inserire il titolo', 'cmb2' ),
        'id'         => 'martini_titolo',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    // URL text field
    $cmb->add_field( array(
        'name' => __( 'Website URL test', 'cmb2' ),
        'desc' => __( 'In questo campo bisogna inserire un URL di un sito internet', 'cmb2' ),
        'id'   => 'martini_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    // Email text field
    $cmb->add_field( array(
        'name' => __( 'Email test', 'cmb2' ),
        'desc' => __( 'In questo campo bisogna inserire un email', 'cmb2' ),
        'id'   => 'martini_email',
        'type' => 'text_email',
        // 'repeatable' => true,
    ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'martini_sidebar_group',
        'type'        => 'group',
        'description' => __( 'Questo gruppo di fields serve per le informazioni che verranno riportate nella sidebar', 'cmb2' ),
        'repeatable'  => false,
        
        'options'     => array(
            'group_title'       => __( 'Sidebar', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Aggiungi un nuovo gruppo ', 'cmb2' ),
            'remove_button'     => __( 'Rimuovi', 'cmb2' ),
            'sortable'          => true,
            // 'closed'         => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ) );
    
    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Titolo',
        'id'   => 'side_martini_title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Descrizione',
        'description' => 'Scrivi una breve descrizione',
        'id'   => 'side_martini_description',
        'type' => 'textarea_small',
    ) );
    
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Immagine',
        'id'   => 'side_martini_image',
        'type' => 'file',
    ) );
    
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Didascalia immagine',
        'id'   => 'side_martini_image_caption',
        'type' => 'text',
    ) );

}

?>