<?php
global $post, $current_user;

if(is_user_logged_in()){
    $require_feedback = dsi_get_meta("require_feedback", "", $post->ID);
    if(($require_feedback != "") && ($require_feedback != "false")){
        if(dsi_user_can_sign_circolare($current_user, $post)){
            $disabled = "";
            $has_signed = dsi_user_has_signed_circolare($current_user, $post);
            if($has_signed){
                $disabled = ' disabled" aria-disabled="true';
            } ?>
            <div class="col-12">
            <?php
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
        }
    }
 }
?>

