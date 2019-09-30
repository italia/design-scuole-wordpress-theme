<?php

/**
 * Welcome page
 */
remove_action('welcome_panel', 'wp_welcome_panel');
add_action( 'welcome_panel', 'dsi_welcome_panel' );

function dsi_welcome_panel(){
    ?>
    <div class="welcome-panel-content" style="padding-bottom:30px;">
        <img src="https://avatars1.githubusercontent.com/u/15377824?s=36&v=4"  style="float:left; margin:0px 20px;" />
        <h2><?php _e( 'Design Scuole Italia: il tema di Developers Italia per le Scuole Italiane', "design_scuole_italia" ); ?></h2>
    </div>
    <?php
}


/**
 * Mostra solo i metabox del progetto
 */
function dsi_remove_all_dashboard_meta_boxes()
{
    global $wp_meta_boxes;

    $keep_boxes = array();
    foreach ($wp_meta_boxes['dashboard']['normal']['core'] as $wp_meta_box) {
        if (substr($wp_meta_box["id"], 0, 4) == "dsi_") {
            $keep_boxes[] = $wp_meta_box;
        }
    }
    $wp_meta_boxes['dashboard']['normal']['core'] = $keep_boxes;
    $wp_meta_boxes['dashboard']['side']['core'] = array();
}

