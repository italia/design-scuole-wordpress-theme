<?php

/**
 * funzione eseguita per inviare la notifica
 * @param $userID
 * @param $post
 * @return bool
 */
if(!function_exists("dsi_notify_circolare_to_user")){
    function dsi_notify_circolare_to_user($userID, $post){
        update_user_meta($userID,"last_notification", $post->ID);

        // aggiungo all'utente la circolare nella lista che lo riguarda
        $lista_circolari = get_user_meta($userID, "circolari", true);
        if(!$lista_circolari)
            $lista_circolari = array();

        if(is_array($lista_circolari)){
            if(!in_array($post->ID, $lista_circolari)){
                $lista_circolari[] = $post->ID;
            }
            update_user_meta($userID, "circolari", $lista_circolari);
        }


        $user = get_user_by("ID", $userID);
        wp_mail($user->user_email ,  _("Hai un nuovo messaggio su ".dsi_get_option("nome_scuola", "design_scuole_italia")), "C'è un nuovo messaggio per te sul sito della Scuola ".dsi_get_option("nome_scuola").": ".wp_logout_url());

        return true;
    }
}


/**
 * Gestione Widget admin
 *
 */

add_action( 'wp_dashboard_setup', 'dsi_add_dashboard_widget' );

function dsi_add_dashboard_widget() {
    wp_add_dashboard_widget(
        'dsi_circolari_widget',
        'Circolari da Leggere',
        'dsi_circolari_dashboard_widget'
    );
}

function dsi_circolari_dashboard_widget() {
    $userID = get_current_user_id();

    echo "<div class='circolari_post_class_wrap'>";

    // verifico le circolari associate all'utente
    $lista_circolari = get_user_meta($userID, "circolari", true);
    echo "<ul>";
    foreach ($lista_circolari  as $idcircolare) {
    $circolare = get_post($idcircolare);
    $numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $idcircolare);
    $require_feedback = dsi_get_meta("require_feedback", "", $idcircolare);
    $feedback_array = dsi_get_circolari_feedback_options();

    echo "<li>";
    echo "Circ. n. ".$numerazione_circolare."<br>";
    echo " <a href='".get_permalink($circolare)."'>".$circolare->post_title.'</a><br>';
    echo "".$feedback_array[$require_feedback].'<hr>';
    echo "</li>";
    }
    echo "</ul>";

    echo "</div>";
}


add_action('wp_dashboard_setup', 'dsi_remove_all_dashboard_meta_boxes', 100 );




