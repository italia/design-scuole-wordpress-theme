<?php


/**
 * wp-admin-menu-classes.php
 */
require get_template_directory() . '/inc/vendor/wp-admin-menu-classes.php';


// todo: programma materia
//add_action( 'parent_file', 'dsi_menu_highlight' );

/**
 * sistema evidenziazione menu in caso di selezione classe
 * @param $parent_file
 * @return string
 */

/*
function dsi_menu_highlight( $parent_file ) {
    global $current_screen;

    $taxonomy = $current_screen->taxonomy;
    if ( $taxonomy == 'classe' ) {
        $parent_file = 'edit-tags.php?taxonomy=classe&post_type=programma_materia';
    }

    return $parent_file;
}
*/

add_action('admin_menu','dsi_custom_admin_menu');
function dsi_custom_admin_menu() {
   // swap_admin_menu_sections('Pagine','Articoli');              // Swap location of Posts Section with Pages Section
   // rename_admin_menu_section('Media','Photos & Video');    // Rename Media Section to "Photos & Video"
    remove_admin_menu_section("WP<b>Gov</b>.it");
   // remove_admin_menu_item("Articoli", "Tipologia");

    //rename_admin_menu_section("Bacheca", "Bacheca Scuola");

    rename_admin_menu_section("Easy Appointments", "Gestione Prenotazioni");
    //rename_admin_menu_item("Articoli", "Tag", "Argomenti");
    swap_admin_menu_sections('Pagine','Gestione Prenotazioni');
    swap_admin_menu_sections('Media','Documenti');
    swap_admin_menu_sections('Strutture','Articoli');



// todo: programma materia
/*
 * remove_submenu_page('edit.php?post_type=programma_materia', 'edit-tags.php?taxonomy=classe&amp;post_type=programma_materia');
        $classe = add_menu_page(
            'Classi',
            'Classi',
            'manage_options',
            'edit-tags.php?taxonomy=classe&post_type=programma_materia',
            '',
            'dashicons-format-quote',
            8
        );
*/

}

