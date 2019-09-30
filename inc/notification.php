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
        $user = get_user_by("ID", $userID);
        wp_mail($user->user_email,  _("Hai un nuovo messaggio su ".dsi_get_option("nome_scuola"), "design_scuole_italia"), "C'è un nuovo messaggio per te sul sito della Scuola ".dsi_get_option("nome_scuola").": ".wp_logout_url());

        return true;
    }
}

