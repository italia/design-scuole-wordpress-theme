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

    wp_add_dashboard_widget('dsi_circolari_not_signed_widget', 'Circolari non firmate', 'dsi_circolari_not_signed_dashboard_widget');

    wp_add_dashboard_widget('dsi_circolari_widget', 'Notifiche di nuove circolari da leggere / firmare', 'dsi_circolari_dashboard_widget');

    wp_add_dashboard_widget('dsi_circolari_signed_widget', 'Circolari firmate', 'dsi_circolari_signed_dashboard_widget');
    
    wp_add_dashboard_widget('dsi_menu_utente_widget', 'Menu utente', 'dsi_menu_utente_dashboard_widget', 'side');
}

function dsi_circolari_dashboard_widget() {
    $userID = get_current_user_id();

    echo "<div class='circolari_post_class_wrap'><p>Di seguito vengono riportate le notifiche delle circolari a te rivolte, a partire dall'attivazione del tuo utente sul sito.</p>";

    // verifico le circolari associate all'utente
    $lista_circolari = get_user_meta($userID, "_dsi_circolari", true);

    if(is_array($lista_circolari) && count($lista_circolari) > 0 ) {

        // salvo in un array alternativo gli id delle circolari, per eliminare dalla coda quelle rimosse
        $real_circolari = array();
    
        foreach ($lista_circolari  as $idcircolare) {
            if ( get_post_status( $idcircolare ) ) {
                $require_feedback = dsi_get_meta("require_feedback", "", $idcircolare) != "false";
                $scadenza = dsi_get_meta("timestamp_scadenza_feedback", "", $idcircolare);

                if($require_feedback && ($scadenza = '' || $scadenza > time()))
                    $real_circolari[] = $idcircolare;
            }
        }
        
        if(count($lista_circolari) != count($real_circolari)){
            update_user_meta($userID, "_dsi_circolari", $real_circolari, $lista_circolari);
            $lista_circolari = $real_circolari;
        }

        $limit = 5;
        $pagenum = isset( $_GET['notifiche_circolari_pagenum'] ) ? absint( $_GET['notifiche_circolari_pagenum'] ) : 1;
        $offset = ( $pagenum - 1 ) * $limit;
        $total = count($lista_circolari);
        $num_of_pages = ceil( $total / $limit );

        $lista_circolari = array_slice($lista_circolari, $offset, $limit);

        echo "<ul>";
        foreach ($lista_circolari  as $idcircolare) {
            $circolare = get_post($idcircolare);

            if($circolare) {
                $numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $idcircolare);
                $require_feedback = dsi_get_meta("require_feedback", "", $idcircolare);
                $feedback_array = dsi_get_circolari_feedback_options();

                echo "<li>";
                echo "Circolare " . $numerazione_circolare . "<br>";
                echo " <a href='" . get_permalink($circolare) . "'>" . $circolare->post_title . '</a><br>';
                echo "Feedback richiesto: " . $feedback_array[$require_feedback] . '<hr>';
                echo "</li>";
            } 
        }
        echo "</ul>";

        $page_links = paginate_links( array(
            'base' => add_query_arg( 'notifiche_circolari_pagenum', '%#%' ),
            'format' => '',
            'prev_text' => __( 'Precedenti &laquo;', 'text-domain' ),
            'next_text' => __( 'Successive &raquo;', 'text-domain' ),
            'total' => $num_of_pages,
            'current' => $pagenum
        ) );
        
        if ( $page_links ) {
            echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
        }
    }else{
        echo "<p>Nessuna circolare presente</p>";
    }
    echo "</div>";
}


function dsi_circolari_signed_dashboard_widget() {
    $userID = get_current_user_id();

    echo "<div class='circolari_post_class_wrap'><p>Di seguito vengono riportate le circolari a cui hai fornito riscontro.</p>";

    // verifico le circolari associate all'utente
    $lista_circolari = get_user_meta($userID, "_dsi_circolari_signed", true);

    if(is_array($lista_circolari) && count($lista_circolari) > 0 ) { 
        // salvo in un array alternativo gli id delle circolari, per eliminare dalla coda quelle rimosse
        $real_circolari = array();

        foreach ($lista_circolari  as $idcircolare) {
            if ( get_post_status( $idcircolare ) ) {
                $real_circolari[] = $idcircolare;
            }    
        }

        if(count($lista_circolari) != count($real_circolari)){
            update_user_meta($userID, "_dsi_circolari_signed", $real_circolari, $lista_circolari);
            $lista_circolari = $real_circolari;
        }

        $limit = 5;
        $pagenum = isset( $_GET['circolari_firmate_pagenum'] ) ? absint( $_GET['circolari_firmate_pagenum'] ) : 1;
        $offset = ( $pagenum - 1 ) * $limit;
        $total = count($lista_circolari);
        $num_of_pages = ceil( $total / $limit );

        $lista_circolari = array_slice($lista_circolari, $offset, $limit);

        echo "<ul>";
        foreach ($lista_circolari as $idcircolare) {
            $circolare = get_post($idcircolare);
            if($circolare) {
                $real_circolari[] = $idcircolare;
                $numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $idcircolare);
                $firma = get_user_meta($userID, "_dsi_signed_" . $idcircolare, true);

                echo "<li>";
                echo "Circolare " . $numerazione_circolare . "<br>";
                echo " <a href='" . get_permalink($circolare) . "'>" . $circolare->post_title . '</a><br>';
                echo "Feedback registrato: " . strtoupper(str_replace("_", " ", $firma)) . '<hr>';

                echo "</li>";
            }else{
                echo "<li>La circolare con id ".$idcircolare." è stata eliminata</li>";
            }
        }
        echo "</ul>";

        $page_links = paginate_links( array(
            'base' => add_query_arg( 'circolari_firmate_pagenum', '%#%' ),
            'format' => '',
            'prev_text' => __( 'Precedenti &laquo;', 'text-domain' ),
            'next_text' => __( 'Successive &raquo;', 'text-domain' ),
            'total' => $num_of_pages,
            'current' => $pagenum
        ) );
        
        if ( $page_links ) {
            echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
        }
    } else {
        echo "<p>Nessuna circolare presente</p>";
    }
    echo "</div>";
}

function dsi_circolari_not_signed_dashboard_widget() {
    $user = wp_get_current_user();

    echo "<div class='circolari_post_class_wrap'><p>Di seguito vengono riportate le circolari che attendono ancora un tuo riscontro.</p>";

    $args = array(
		'post_type' => 'circolare',
		'numberposts' => -1,
        'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_dsi_circolare_require_feedback',
                    'value' => array('presa_visione', 'si_no', 'si_no_visione'),
                    'compare' => 'IN'
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key' => '_dsi_circolare_timestamp_scadenza_feedback',
                        'compare' => 'NOT EXISTS'
                    ),
                    array(
                        'key' => '_dsi_circolare_timestamp_scadenza_feedback',
                        'value' => '',
                        'compare' => '='
                    ),
                    array(
                        'key' => '_dsi_circolare_timestamp_scadenza_feedback',
                        'value' => time(),
                        'compare' => '>'
                    )
                )
        )
    );

    $lista_circolari = get_posts($args);
    $circolari_firmabili_non_firmate = array();

    foreach ($lista_circolari  as $circolare) {
        if(dsi_user_can_sign_circolare($user, $circolare) && !dsi_user_has_signed_circolare($user, $circolare)) {
            $circolari_firmabili_non_firmate[] = $circolare;
        }
    }
    $lista_circolari = $circolari_firmabili_non_firmate;


    $limit = 5;
    $pagenum = isset( $_GET['circolari_non_firmate_pagenum'] ) ? absint( $_GET['circolari_non_firmate_pagenum'] ) : 1;
    $offset = ( $pagenum - 1 ) * $limit;
    $total = count($lista_circolari);
    $num_of_pages = ceil( $total / $limit );

    $lista_circolari = array_slice($lista_circolari, $offset, $limit);


    echo "<ul>";
    foreach($lista_circolari as $circolare) {
            $numerazione_circolare = dsi_get_meta("numerazione_circolare", "", $circolare->ID);
            $require_feedback = dsi_get_meta("require_feedback", "", $circolare->ID);
            $feedback_array = dsi_get_circolari_feedback_options();

            echo "<li>";
            echo "Circolare " . $numerazione_circolare . "<br>";
            echo " <a href='" . get_permalink($circolare) . "'>" . $circolare->post_title . '</a><br>';
            echo "Feedback richiesto: " . $feedback_array[$require_feedback] . '<hr>';
            echo "</li>";
    }
    echo "</ul>";

    $page_links = paginate_links( array(
        'base' => add_query_arg( 'circolari_non_firmate_pagenum', '%#%' ),
        'format' => '',
        'prev_text' => __( 'Precedenti &laquo;', 'text-domain' ),
        'next_text' => __( 'Successive &raquo;', 'text-domain' ),
        'total' => $num_of_pages,
        'current' => $pagenum
    ) );
    
    if ( $page_links ) {
        echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
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
