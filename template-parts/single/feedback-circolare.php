<?php
global $post, $current_user;

if(is_user_logged_in()){
    $require_feedback = dsi_get_meta("require_feedback", "", $post->ID);
    $timestamp_scadenza_feedback = dsi_get_meta("timestamp_scadenza_feedback", "", $post->ID);

    $dt = new DateTime("now", new DateTimeZone('Europe/Rome'));
    $datenow_time = $dt->format('d/m/Y H:i');
    $datenow_time = date_create_from_format('d/m/Y H:i',$datenow_time);

    if($timestamp_scadenza_feedback != "") {
        $timestamp_scadenza_feedback_time = date('d/m/Y H:i', $timestamp_scadenza_feedback);
        $timestamp_scadenza_feedback_time = date_create_from_format('d/m/Y H:i',$timestamp_scadenza_feedback_time);
    }

    
    if(($require_feedback != "") && ($require_feedback != "false")){
        if(dsi_user_can_sign_circolare($current_user, $post)){
            $disabled = "";
            $has_signed = dsi_user_has_signed_circolare($current_user, $post);
            if($has_signed){
                $disabled = ' disabled" aria-disabled="true';
            }
            if($timestamp_scadenza_feedback == "" || $timestamp_scadenza_feedback_time > $datenow_time || $has_signed) {
            ?>
            <div class="col-12">
            <?php
             if(($require_feedback == "si_no_visione") || ($require_feedback == "si_no")  || ($require_feedback == "presa_visione") ) {
                echo "Invia una risposta alla circolare <br/><br/>";
             }

            if(($require_feedback == "si_no_visione") || ($require_feedback == "si_no") ) {
                ?>
                <a href="<?php echo wp_nonce_url(add_query_arg('sign', "si", get_permalink($post)), 'sign', 'dsi'); ?>" role="button" class="btn <?php
                if($has_signed == "si") echo "btn-info"; else echo "btn-greendark"; echo $disabled; ?>">Si</a>
                <a href="<?php echo wp_nonce_url(add_query_arg('sign', "no", get_permalink($post)), 'sign', 'dsi'); ?>" role="button" class="btn <?php
                if($has_signed == "no") echo "btn-info"; else echo "btn-greendark"; echo $disabled;  ?>">No</a>
                <?php
            }
            if(($require_feedback == "si_no_visione") || ($require_feedback == "presa_visione") ) {
                ?>
                <a href="<?php echo wp_nonce_url(add_query_arg('sign', "presa_visione", get_permalink($post)), 'sign', 'dsi'); ?>" role="button" class="btn <?php
                if($has_signed == "presa_visione") echo "btn-info"; else echo "btn-greendark"; echo $disabled; ?>">Presa Visione</a>
            <?php

            }
            ?>
            </div>
            <?php
            } else {
                $last_user_notification = get_user_meta($current_user->ID, "_dsi_last_notification");

                if (is_array($last_user_notification) && in_array($post->ID, $last_user_notification)) {
                    delete_user_meta($current_user->ID,"_dsi_last_notification");
                }
                ?>
                <div class="alert alert-info" role="alert">
                    Non &egrave; pi&ugrave; possibile fornire un feedback per questa circolare
                </div>
                <?php
            }
        }
    }
 }
?>

