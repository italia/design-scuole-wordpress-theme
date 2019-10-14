jQuery( document ).ready(function() {
    if(jQuery("#_dsi_persona_ruolo_scuola option:selected").val() != "docente"){
        jQuery(".cmb2-id--dsi-persona-incarico-docente").hide();
        jQuery(".cmb2-id--dsi-persona-durata-incarico-docente").hide();
        jQuery(".cmb2-id--dsi-persona-tipo-supplenza").hide();

    }

    if(jQuery("#_dsi_persona_ruolo_scuola option:selected").val() != "non-docente"){
        jQuery(".cmb2-id--dsi-persona-ruolo-non-docente").hide();
    }

});
