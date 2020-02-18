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
        }
    );

    let from = jQuery("#_dsi_evento_timestamp_inizio").datepicker();
    let to = jQuery("#_dsi_evento_timestamp_fine").datepicker();

    from.on( "change", function() {
        to.datepicker( "option", "minDate", this.value );
    });

    to.on( "change", function() {
        from.datepicker( "option", "maxDate", this.value );
    });
});
