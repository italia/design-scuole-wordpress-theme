jQuery( document ).ready(function() {
    if(jQuery('input:radio[name="_dsi_evento_is_luogo_scuola"]').val() == "true"){
        jQuery(".cmb2-id--dsi-evento-posizione-gps-luogo-custom").hide();
    }else{
        jQuery(".cmb2-id--dsi-evento-posizione-gps-luogo-custom").show();
    }
    jQuery('input:radio[name="_dsi_evento_is_luogo_scuola"]').change(
        function(){
            if (jQuery(this).is(':checked') && jQuery(this).val() == 'true') {
                jQuery(".cmb2-id--dsi-evento-posizione-gps-luogo-custom").hide();
            }else{
                jQuery(".cmb2-id--dsi-evento-posizione-gps-luogo-custom").show();
            }
        });


    if (jQuery('select[name="_dsi_evento_tipo_evento"]').val() == 'gratis') {
        jQuery(".cmb2-id--dsi-evento-prezzo").hide();
    }else{
        jQuery(".cmb2-id--dsi-evento-prezzo").show();
    }
    jQuery('select[name="_dsi_evento_tipo_evento"]').change(
        function(){
            if (jQuery(this).val() == 'gratis') {
                jQuery(".cmb2-id--dsi-evento-prezzo").hide();
            }else{
                jQuery(".cmb2-id--dsi-evento-prezzo").show();
            }
        });
});
