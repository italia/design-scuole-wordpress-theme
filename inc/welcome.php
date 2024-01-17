<?php
/**
 * parser readme.md
 */

require get_template_directory() . '/inc/vendor/parsedown.php';

/**
 * Gestione widget dashboard admin
 *
 */

add_action( 'wp_dashboard_setup', 'dsi_add_dashboard_widget' );

function dsi_add_dashboard_widget() {

    wp_add_dashboard_widget('dsi_circolari_widget', 'Circolari da Leggere / Firmare', 'dsi_circolari_dashboard_widget');

    wp_add_dashboard_widget('dsi_circolari_signed_widget', 'Circolari Firmate', 'dsi_circolari_signed_dashboard_widget');
    
    wp_add_dashboard_widget('dsi_menu_utente_widget', 'Menu utente', 'dsi_menu_utente_dashboard_widget', 'side');
}

function dsi_circolari_dashboard_widget() {
    $userID = get_current_user_id();

    echo "<div class='circolari_post_class_wrap'>";

    // verifico le circolari associate all'utente
    $lista_circolari = get_user_meta($userID, "_dsi_circolari", true);
    // salvo in un array alternativo gli id delle circolari, per eliminare dalla coda quelle rimosse
    $real_circolari = array();
    if(is_array($lista_circolari) && count($lista_circolari) > 0 ) {

        echo "<ul>";
        foreach ($lista_circolari  as $idcircolare) {
            $circolare = get_post($idcircolare);
            if($circolare) {
                $real_circolari[] = $idcircolare;
                $numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $idcircolare);
                $require_feedback = dsi_get_meta("require_feedback", "", $idcircolare);
                $feedback_array = dsi_get_circolari_feedback_options();

                echo "<li>";
                echo "Circ. n. " . $numerazione_circolare . "<br>";
                echo " <a href='" . get_permalink($circolare) . "'>" . $circolare->post_title . '</a><br>';
                echo "Feedback richiesto: " . $feedback_array[$require_feedback] . '<hr>';
                echo "</li>";
            }else{
                echo "<li>La circolare con id ".$idcircolare." è stata eliminata</li>";
            }
        }
        echo "</ul>";


        if(is_array($lista_circolari) && count($lista_circolari) != count($real_circolari)){
            update_user_meta($userID, "_dsi_circolari", $real_circolari, $lista_circolari);
        }
    }else{
        echo "<p>Nessuna circolare presente</p>";
    }
    echo "</div>";
}


function dsi_circolari_signed_dashboard_widget() {
    $userID = get_current_user_id();

    echo "<div class='circolari_post_class_wrap'>";

    // verifico le circolari associate all'utente
    $lista_circolari = get_user_meta($userID, "_dsi_circolari_signed", true);
    // salvo in un array alternativo gli id delle circolari, per eliminare dalla coda quelle rimosse
    $real_circolari = array();
    if(is_array($lista_circolari) && count($lista_circolari) > 0 ) {

        echo "<ul>";
        foreach ($lista_circolari as $idcircolare) {
            $circolare = get_post($idcircolare);
            if($circolare) {
                $real_circolari[] = $idcircolare;
                $numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $idcircolare);
                $firma = get_user_meta($userID, "_dsi_signed_" . $idcircolare, true);

                echo "<li>";
                echo "Circ. n. " . $numerazione_circolare . "<br>";
                echo " <a href='" . get_permalink($circolare) . "'>" . $circolare->post_title . '</a><br>';
                echo "Feedback registrato: " . strtoupper(str_replace("_", " ", $firma)) . '<hr>';

                echo "</li>";
            }else{
                echo "<li>La circolare con id ".$idcircolare." è stata eliminata</li>";
            }
        }
        echo "</ul>";

        // aggiorno l'array circolari se è differente da pregresso
        if(is_array($lista_circolari) && count($lista_circolari) != count($real_circolari)){
            update_user_meta($userID, "_dsi_circolari_signed", $real_circolari, $lista_circolari);
        }
    }else{
        echo "<p>Nessuna circolare presente</p>";
    }
    echo "</div>";
}

function dsi_menu_utente_dashboard_widget()
{
    $theme_locations = get_nav_menu_locations();

    if ($theme_locations['menu-utente'] ?? false)
        $menu_obj = get_term($theme_locations['menu-utente'], 'nav_menu');

    if (!isset($menu_obj) || !$menu_obj->count) {
        echo '<p>Menu utente non configurato.</p>';
        if (current_user_can('administrator')) { ?>
            <p>
                Puoi configurare questa sezione per mostrare velocemente risorse utili per gli utenti registrati, come i documenti dedicati solo al personale.
            </p>
            <p>
                È possibile, ad esempio, creare un argomento "Area riservata" e collocarvi tutti i documenti riservati al personale, avendo cura di impostare la visibilità di ogni documento come privato. Quindi, per mostrare velocemente un collegamento all'argomento "Area riservata" in questa sezione, puoi configurare il menu in <em>Aspetto &gt; Menu &gt; Seleziona un menu da modificare &gt; Utente (Menu utente) </em> con una voce che conduca all'argomento "Area riservata". Se il menu Utente non è disponibile o se gli utenti autenticati non amministratori non riescono a vedere i contenuti privati, disattiva e riattiva il tema (attivandone un altro e poi riattivando quello delle scuole in <em>Aspetto &gt; Temi</em>).
            </p>
        <?php }
    } else { ?>
        <p>Qui puoi trovare velocemente collegamenti utili al personale scolastico.</p>
        <ul>
            <?php wp_nav_menu(array(
                "menu" => $menu_obj,
            )) ?>
        </ul>
<?php };
}

add_action('wp_dashboard_setup', 'dsi_remove_all_dashboard_meta_boxes', 100 );


/**
 * Mostra solo i metabox del progetto
 */
function dsi_remove_all_dashboard_meta_boxes()
{
    global $wp_meta_boxes;

    $keep_boxes = array();
    foreach ($wp_meta_boxes['dashboard']['normal']['core'] as $wp_meta_box) {
        if (substr($wp_meta_box["id"], 0, 4) == "dsi_") {
            $keep_boxes[] = $wp_meta_box;
        }
    }
    $wp_meta_boxes['dashboard']['normal']['core'] = $keep_boxes;

    $keep_boxes = array();
    foreach ($wp_meta_boxes['dashboard']['side']['core'] as $wp_meta_box) {
        if (substr($wp_meta_box["id"], 0, 4) == "dsi_") {
            $keep_boxes[] = $wp_meta_box;
        }
    }
    $wp_meta_boxes['dashboard']['side']['core'] = $keep_boxes;
}

/**
 * Forzo a 2 colonne la dashboard admin
 * @param $columns
 * @return mixed
 */
function dsi_screen_layout_columns($columns) {
    $columns['dashboard'] = 2;
    return $columns;
}

add_filter('screen_layout_columns', 'dsi_screen_layout_columns');

function dsi_screen_layout_dashboard() {
    return 2;
}

add_filter('get_user_option_screen_layout_dashboard', 'dsi_screen_layout_dashboard');


add_action ('admin_menu', function () {
  //  add_management_page('Manuale Tema Scuole', 'Manuale Tema Scuole', 'read', 'manuale-scuole', 'dsi_readme_render_manual', '');
});

function dsi_readme_render_manual(){
echo '<div class="wrap manuale">';

    $response = wp_remote_get( 'https://raw.githubusercontent.com/italia/design-scuole-wordpress-theme/master/README.md?test=1' );

    if ( is_array( $response ) && ! is_wp_error( $response ) ) {

        $body    = $response['body']; // use the content
        $Parsedown = new Parsedown();
        echo $Parsedown->text($body);

    }

echo "</div>";
}

add_action('admin_bar_menu', 'dsi_add_toolbar_manual', 100);
function dsi_add_toolbar_manual($admin_bar)
{
    $admin_bar->add_menu(array(
        'id' => 'manuale',
        'title' => 'Manuale',
        'href' => 'https://designers.italia.it/modello/scuole/',
        'meta' => array(
            'title' => __('Manuale'),
            'target' => '_blank'
        ),
    ));
}
