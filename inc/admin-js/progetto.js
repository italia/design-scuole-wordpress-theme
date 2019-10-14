jQuery( document ).ready(function() {
    if(jQuery('input:radio[name="_dsi_scheda_progetto_is_luogo_scuola"]').val() == "true"){
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
});
