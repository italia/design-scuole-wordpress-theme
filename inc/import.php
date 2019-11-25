<?php
/**
 * hooks per personalizzare l'import nativo nei casi più frequenti di mappatura dei contenuti
 */

function dsi_filter_wp_import_post_data_raw($post)
{

    // circolari
    if($post["post_type"] == "circolari"){
        $post["post_type"] = "circolare";

    }

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

    // amministrazione trasparente
    if($post["post_type"] == "amm-trasparente"){
        $post["post_type"] = "documento";

        $new_terms = array();
        if(isset($post["terms"])) {
            foreach ($post["terms"] as $terms) {
                if ($terms["domain"] == "tipologie") {
                    $terms["domain"] = "amministrazione-trasparente";
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

