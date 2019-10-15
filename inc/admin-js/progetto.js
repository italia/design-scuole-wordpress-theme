jQuery( document ).ready(function() {
    if(jQuery('input:radio[name="_dsi_scheda_progetto_is_luogo_scuola"]:checked').val() == "true"){
        jQuery(".cmb2-id--dsi-scheda-progetto-posizione-gps-luogo-custom").hide();
    }else{
        jQuery(".cmb2-id--dsi-scheda-progetto-posizione-gps-luogo-custom").show();
    }
    jQuery('input:radio[name="_dsi_scheda_progetto_is_luogo_scuola"]').change(
        function(){
            if (jQuery(this).is(':checked') && jQuery(this).val() == 'true') {
                jQuery(".cmb2-id--dsi-scheda-progetto-posizione-gps-luogo-custom").hide();
            }else{
                jQuery(".cmb2-id--dsi-scheda-progetto-posizione-gps-luogo-custom").show();
            }
        });



    if(jQuery('input:radio[name="_dsi_scheda_progetto_is_realizzato"]:checked').val() == "true"){
        jQuery(".cmb2-id--dsi-scheda-progetto-risultati").show();
    }else{
        jQuery(".cmb2-id--dsi-scheda-progetto-risultati").hide();
    }
    jQuery('input:radio[name="_dsi_scheda_progetto_is_realizzato"]').change(
        function(){
            if (jQuery(this).is(':checked') && jQuery(this).val() == 'true') {
                jQuery(".cmb2-id--dsi-scheda-progetto-risultati").show();
            }else{
                jQuery(".cmb2-id--dsi-scheda-progetto-risultati").hide();
            }
        });
});
