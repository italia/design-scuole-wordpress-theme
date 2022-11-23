<?php
/**
 * hooks per personalizzare l'import nativo nei casi più frequenti di mappatura dei contenuti
 */

function dsi_filter_wp_import_post_data_raw($post)
{

    // eventi
    if($post["post_type"] == "event"){
        $post["post_type"] = "evento";

        $new_terms = array();
        if(isset($post["terms"])){
            foreach ($post["terms"] as $terms){
                if($terms["domain"] == "event-category"){
                    $terms["domain"] = "tipologia-evento";
                }
                $new_terms[] = $terms;
            }
            $post["terms"] = $new_terms;
        }

    }

    return $post;
}

// add the filter
add_filter( 'wp_import_post_data_raw', 'dsi_filter_wp_import_post_data_raw', 10, 1 );

