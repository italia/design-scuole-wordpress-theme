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

    // Pinned text field
    $cmb->add_field( array(
        'name'       => __( 'Informazioni aggiuntive', 'cmb2' ),
        'desc'       => __( 'In questo campo inserire le informazioni importanti per questa pagina ', 'cmb2' ),
        'id'         => 'martini_info',
        'type'       => 'wysiwyg',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
        'options' => array(
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => 4, // rows="..."
            'teeny' => false, // output the minimal editor config used in Press This
        ),
    ) );

    // Regular title field
    $cmb->add_field( array(
        'name'       => __( 'Titolo libero', 'cmb2' ),
        'desc'       => __( 'In questo campo bisogna inserire il titolo per altre informazioni come sessioni di esame o scadenze (es. "Calendario sessioni di esame")', 'cmb2' ),
        'id'         => 'martini_titolo',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Informazioni variabili', 'cmb2' ),
        'desc'       => __( 'In questo campo inserire le date di esame o le eventuali scadenze, o altre informazioni variabili da pagina a pagina', 'cmb2' ),
        'id'         => 'martini_info_variable',
        'type'       => 'wysiwyg',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
        'options' => array(
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => 4, // rows="..."
            'teeny' => false, // output the minimal editor config used in Press This
        ),
    ) );

    // Email text field
    $cmb->add_field( array(
        'name' => __( 'Email', 'cmb2' ),
        'desc' => __( 'In questo campo bisogna inserire un email', 'cmb2' ),
        'id'   => 'martini_email',
        'type' => 'text_email',
        'repeatable' => true,
    ) );

    // Telefono text field
    $cmb->add_field( array(
        'name' => __( 'Telefono', 'cmb2' ),
        'desc' => __( 'In questo campo bisogna inserire un contatto telefonico', 'cmb2' ),
        'id'   => 'martini_phone',
        'type' => 'text',
        'repeatable' => true,
    ) );

    // URL text field
    $cmb->add_field( array(
        'name' => __( 'Website URL', 'cmb2' ),
        'desc' => __( 'In questo campo bisogna inserire un URL di un sito internet', 'cmb2' ),
        'id'   => 'martini_url',
        'type' => 'text_url',
        'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        'repeatable' => true,
    ) );
    

    //  // File field
    // $cmb->add_field( array(
    //     'name' => 'Test File List',
    //     'desc' => '',
    //     'id'   => 'wiki_test_file_list',
    //     'type' => 'file_list',
    //     'text' => array(
    //         'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
    //         'remove_image_text' => 'Replacement', // default: "Remove Image"
    //         'file_text' => 'Replacement', // default: "File:"
    //         'file_download_text' => 'Replacement', // default: "Download"
    //         'remove_text' => 'Replacement', // default: "Remove"
    //     ),
    // ) );   

    // Documents download
    $cmb->add_field( array(
        'name' => 'Modulistica',
        'desc' => 'Documenti da scaricare',
        'id'   => 'documents_download',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Aggiungi documento', // default: "Add or Upload Files"
            'remove_image_text' => 'Replacement', // default: "Remove Image"
            'file_text' => 'Nome file', // default: "File:"
            'file_download_text' => 'Download', // default: "Download"
            'remove_text' => 'Elimina', // default: "Remove"
        ),
    ) );   

        // Gruppo contatti telefonici
    $martini_group_contact = $cmb->add_field( array(
        'id'          => 'martini_group_contact',
        'type'        => 'group',
        'description' => __( 'Inserisci i contatti telefonici', 'cmb2' ),
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'Contatto {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Aggiungi contatto', 'cmb2' ),
            'remove_button'     => __( 'Elimina contatto', 'cmb2' ),
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $martini_group_contact, array(
        'name' => 'Nome contatto',
        'id'   => 'martini_contatto',
        'type' => 'text',
    ) );

    $cmb->add_group_field( $martini_group_contact, array(
        'name' => 'Numero di telefono',
        'description' => 'inserisci qui il numero di telefono',
        'id'   => 'martini_numero_contatto',
        'type' => 'text',
    ) );

    // Email text field
    $cmb->add_group_field( $martini_group_contact, array(
        'name' => __( 'Email', 'cmb2' ),
        'desc' => __( 'inserisci qui la email', 'cmb2' ),
        'id'   => 'martini_email',
        'type' => 'text_email',
    ) );

    


}



/**
 * Sample template tag function for outputting a cmb2 file_list
 *
 * @param  string  $file_list_meta_id The field meta id. ('wiki_test_file_list')
 * @param  string  $img_size           Size of image to show
 */


function cmb2_output_file_list( $file_list_meta_id, $img_size = 'medium' ) {

    // Get the list of files
    $files = get_post_meta( get_the_ID(), $file_list_meta_id, 1 );

    echo '<div class="file-list-wrap">';
    // Loop through them and output an image
    foreach ( (array) $files as $attachment_id => $attachment_url ) {
        echo '<div class="file-list-image">';
        echo wp_get_attachment_image( $attachment_id, $img_size );
        echo '</div>';
    }
    echo '</div>';
};

?>