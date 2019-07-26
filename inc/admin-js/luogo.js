jQuery( document ).ready(function() {
    if(jQuery("#_dsi_luogo_childof option:selected").val() == 0){
        jQuery(".cmb2-id--dsi-luogo-posizione-gps").show();
        jQuery("#_dsi_luogo_box_elementi_struttura").show();
    }else{
        jQuery(".cmb2-id--dsi-luogo-posizione-gps").hide();
        jQuery("#_dsi_luogo_box_elementi_struttura").hide();
    }
    jQuery("select#_dsi_luogo_childof").change(function(){
        if(jQuery("#_dsi_luogo_childof option:selected").val() == 0){
            jQuery(".cmb2-id--dsi-luogo-posizione-gps").show();
            jQuery("#_dsi_luogo_box_elementi_struttura").show();
        }else{
            jQuery(".cmb2-id--dsi-luogo-posizione-gps").hide();
            jQuery("#_dsi_luogo_box_elementi_struttura").hide();
        }
    });
});
