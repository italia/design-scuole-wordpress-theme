let $j = jQuery.noConflict();
let form = $j('.cmb-form');

$j(function() {
    $j('#toplevel_page_dsi_options').find('ul').addClass('hidden');

    form.data('serialize',form.serialize());
    $j('.nav-tab').each(function() {
        $j(this).click(function(e) {
            $j( "body" ).append('<div id="spinner-overlayer"></div>');
            if (form.serialize() !== form.data('serialize')) {
                $j('#spinner-overlayer').remove();
                e.preventDefault();
                e.stopPropagation();

                let link = $j(this).attr('href');

                let modal = $j('<div>').html("Attenzione, le informazioni inserite nel form non sono state salvate, si vuole proseguire comunque?");
                let args = {
                    title: "Attenzione!",
                    draggable: false,
                    resizable: false,
                    modal: true,
                    buttons: {
                        "Annulla": function() {
                            $j(this).dialog('destroy').remove();
                        },
                        "Continua": function() {
                            window.location.href = link;
                        }
                    }
                };
                modal.dialog(args);
            }
        });
    });

    form.submit(function() {
        $j( "body" ).append('<div id="spinner-overlayer"></div>');
    });
});