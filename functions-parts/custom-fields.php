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
        'name'       => __( 'Titolo', 'cmb2' ),
        'desc'       => __( 'In questo campo bisogna inserire il titolo', 'cmb2' ),
        'id'         => 'martini_titolo',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    // URL text field
    $cmb->add_field( array(
        'name' => __( 'Website URL', 'cmb2' ),
        'desc' => __( 'In questo campo bisogna inserire un URL di un sito internet', 'cmb2' ),
        'id'   => 'martini_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    // Email text field
    $cmb->add_field( array(
        'name' => __( 'Email', 'cmb2' ),
        'desc' => __( 'In questo campo bisogna inserire un email', 'cmb2' ),
        'id'   => 'martini_email',
        'type' => 'text_email',
        // 'repeatable' => true,
    ) );

     // File field
    $cmb->add_field( array(
        'name' => 'Test File List',
        'desc' => '',
        'id'   => 'wiki_test_file_list',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
            'remove_image_text' => 'Replacement', // default: "Remove Image"
            'file_text' => 'Replacement', // default: "File:"
            'file_download_text' => 'Replacement', // default: "Download"
            'remove_text' => 'Replacement', // default: "Remove"
        ),
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
}

?>