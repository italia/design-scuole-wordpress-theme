jQuery( document ).ready(function() {
    if(jQuery('input:radio[name="_dsi_classe_calendario_enabled"]:checked').val() == "0"){
        jQuery(".cmb2-id--dsi-classe-lunedi").hide();
        jQuery(".cmb2-id--dsi-classe-martedi").hide();
        jQuery(".cmb2-id--dsi-classe-mercoledi").hide();
        jQuery(".cmb2-id--dsi-classe-giovedi").hide();
        jQuery(".cmb2-id--dsi-classe-venerdi").hide();
        jQuery(".cmb2-id--dsi-classe-sabato").hide();
    }else{
        jQuery(".cmb2-id--dsi-classe-lunedi").show();
        jQuery(".cmb2-id--dsi-classe-martedi").show();
        jQuery(".cmb2-id--dsi-classe-mercoledi").show();
        jQuery(".cmb2-id--dsi-classe-giovedi").show();
        jQuery(".cmb2-id--dsi-classe-venerdi").show();
        jQuery(".cmb2-id--dsi-classe-sabato").show();
    }
    jQuery('input:radio[name="_dsi_classe_calendario_enabled"]').change(
        function(){
            if (jQuery(this).is(':checked') && jQuery(this).val() == '0') {
                jQuery(".cmb2-id--dsi-classe-lunedi").hide();
                jQuery(".cmb2-id--dsi-classe-martedi").hide();
                jQuery(".cmb2-id--dsi-classe-mercoledi").hide();
                jQuery(".cmb2-id--dsi-classe-giovedi").hide();
                jQuery(".cmb2-id--dsi-classe-venerdi").hide();
                jQuery(".cmb2-id--dsi-classe-sabato").hide();
            }else{
                jQuery(".cmb2-id--dsi-classe-lunedi").show();
                jQuery(".cmb2-id--dsi-classe-martedi").show();
                jQuery(".cmb2-id--dsi-classe-mercoledi").show();
                jQuery(".cmb2-id--dsi-classe-giovedi").show();
                jQuery(".cmb2-id--dsi-classe-venerdi").show();
                jQuery(".cmb2-id--dsi-classe-sabato").show();
            }
        });

});
