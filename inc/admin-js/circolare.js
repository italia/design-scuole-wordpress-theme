jQuery( document ).ready(function() {
    let input = jQuery('input[name^="_dsi_circolare_tipologia"]');
    input.each(function() {
        jQuery(this).click(function(){
            input.removeClass('error');
            input.each(function() {
                jQuery('label[for='+this.id+']').removeClass('error');
            });
            jQuery('._dsi_circolare_tipologia').removeClass('error');
            jQuery('._dsi_circolare_tipologia_error').remove();
        });
    });


    jQuery( 'form[name="post"]' ).on("submit", function(e) {
        if(jQuery('input[name^="_dsi_circolare_tipologia"]:checked').length == 0){
            e.preventDefault();
            input.addClass('error');
            input.parent().parent().append('<li class="_dsi_circolare_tipologia_error"><small>Seziona una tipologia di circolare</small></li>');
            input.each(function() {
                jQuery('label[for='+this.id+']').addClass('error');
            });
            jQuery('._dsi_circolare_tipologia').addClass('error');
            return false;
        }
        return true;
    });
});