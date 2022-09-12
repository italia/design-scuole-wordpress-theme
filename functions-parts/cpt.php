<?php 
/*-------------------------------------------------
    ADD CUSTOM POST TYPE
--------------------------------------------------*/

    /*Replace = sicurezza*/

    function Martino_sicurezza() {
        register_post_type('sicurezza',
            array(
                'labels'                =>          array(
                    'name'              =>          'Sicurezza', //nome principale nella sidebar
                    'singular_name'     =>          'sicurezza',
                    'all_items'         =>          'All', //nome link per visualizzare tutti i post
                    'add_new'           =>          'Add file', //nome link per aggiungere nuovo post
                    'add_new_item'      =>          'Add file', //titolo della pagina di aggiunta di un nuovo post
                    'edit_item'         =>          'Edit file', //titolo della pagina di aggiunta di un nuovo post
                    'new_item'          =>          'New file',
                    'view_item'         =>          'See file',
                    'search_items'      =>          'Cerca', //testo nel pulsante di ricerca
                    'not_found'         =>          'Nessun elemento trovato',
                    'not_found_in_trash'=>          'Nessun elemento nel cestino',
                    'parent_item_colon' =>          '',
                ),
                'description'           =>          'File per la sicurezza',
                'public'                =>          true,
                'publicly_queryable'    =>          true,
                'exclude_from_search'   =>          false,
                'show_ui'               =>          true,
                'query_var'             =>          true,
                'menu_position'         =>          5,
                'menu_icon'             =>          'dashicons-lock', //Dashicon
                'rewrite'               =>          array(
                    'slug'              =>          'sicurezza',
                    'with-front'        =>          false,
                ),
                'has_archive'           =>          true,
                'capability_type'       =>          'post',
                'hierarchycal'          =>          false,
                'taxonomies'            =>          array('sicurezza'),
                'show_in_rest'          =>          false, //gutemberg disattivato
                'supports'              =>          array('title', 'page-attributes') //campi supportati
            ), flush_rewrite_rules() /*fine delle opzioni*/
        );
    }

    function cmb2_sicurezza_metabox() {

        /**
         * Initiate the metabox
         */
        $cmb = new_cmb2_box( array(
            'id'            => 'file_sicurezza',
            'title'         => __( 'Custom fields caricare i file relativi alla sicurezza', 'cmb2' ),
            'object_types'  => array( 'post', ),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
        ) );
        //Add file list
        $cmb->add_field( array(
            'name' => 'File Sicurezza',
            'desc' => '',
            'id'   => '_sicurezza_file_list',
            'type' => 'file_list',
            // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
            // 'query_args' => array( 'type' => 'image' ), // Only images attachment
            // Optional, override default text strings
            'text' => array(
                'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
                'remove_image_text' => 'Replacement', // default: "Remove Image"
                'file_text' => 'Replacement', // default: "File:"
                'file_download_text' => 'Replacement', // default: "Download"
                'remove_text' => 'Replacement', // default: "Remove"
            ),
        ) );
    }


    add_action('init', 'Martino_sicurezza');