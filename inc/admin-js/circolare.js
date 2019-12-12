jQuery( document ).ready(function() {
    jQuery( 'form[name="post"]' ).on("submit", function(e) {
        if(jQuery('input[name^="_dsi_circolare_tipologia"]:checked').length == 0){
            e.preventDefault();
            alert("Seziona una tipologia di circolare");
            return false;
        }
        return true;
    });
});