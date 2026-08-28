<?php

/**
 * Notifica una circolare a un utente: bacheca sempre, email se non disabilitate.
 *
 * @param int     $userID
 * @param WP_Post $post
 * @return bool
 */
if(!function_exists("dsi_notify_circolare_to_user")){
    function dsi_notify_circolare_to_user($userID, $post){
        update_user_meta($userID,"_dsi_last_notification", $post->ID);

        $lista_circolari = get_user_meta($userID, "_dsi_circolari", true);
        if(!$lista_circolari)
            $lista_circolari = array();

        if(is_array($lista_circolari)){
            if(!in_array($post->ID, $lista_circolari)){
                $lista_circolari[] = $post->ID;
            }
            update_user_meta($userID, "_dsi_circolari", $lista_circolari);
        }

        if ( dsi_get_option("mail_circolare_non_inviare", "setup") ) {
            return true;
        }

        $user = get_user_by("ID", $userID);
        if ( ! $user || ! is_email( $user->user_email ) ) {
            return true;
        }

        $mail_circolare_oggetto = dsi_get_option("mail_circolare_oggetto", "setup");
        if($mail_circolare_oggetto == "") $mail_circolare_oggetto = "Hai un nuovo messaggio su ".dsi_get_option("nome_scuola");

        $mail_circolare_messaggio = dsi_get_option("mail_circolare_messaggio", "setup");
        if($mail_circolare_messaggio == "") $mail_circolare_messaggio = "C'è un nuovo messaggio per te sul sito della Scuola ".dsi_get_option("nome_scuola")." ";

        $mail_circolare_messaggio .= ": ".get_permalink($post);

        wp_mail($user->user_email ,  $mail_circolare_oggetto, $mail_circolare_messaggio);

        return true;
    }
}

