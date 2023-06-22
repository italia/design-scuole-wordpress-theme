<?php
// Attenzione, non c'e' controllo se i posts sono vuoti.

$home_show_events = dsi_get_option("home_show_events", "homepage");

// Raccolgo gli ultimi 3 post, indipendentemente dal tipo
$args = array('post_type' => 'post',
                    'posts_per_page' => 3,
                );
$posts = get_posts($args);

// Se nelle impostazioni ho selezionato anche gli eventi, raccolgo gli ultimi 3
if ($home_show_events == "true_event") {
            $args = array('post_type' => 'evento',
                'posts_per_page' => 3,
                'meta_key' => '_dsi_evento_timestamp_inizio',
                'orderby'   =>  array('meta_value' => 'ASC', 'date' => 'ASC'),
                'meta_query' => array(
                    array(
                        'key' => '_dsi_evento_timestamp_inizio'
					),
					// Se l'evento e' finito, non lo mostro piu'
                    array(
                        'key' => '_dsi_evento_timestamp_fine',
                        'value' => time(),
                        'compare' => '>=',
                        'type' => 'numeric'
                    )
                )
			);
			// Creo un unico array, potenzialmente di 6 oggetti.
			$posts2 = get_posts($args);
			$posts = array_merge($posts, $posts2);
}

?>



    <section class="section bg-white py-2 py-lg-3 py-xl-5">
    <div class="container">
        <div class="row variable-gutters">
                <?php
                foreach ( $posts as $post ) {
                    if($post) {
                        ?>
                        <div class="col-lg-4 mb-4">
                            <?php
                            if ($post->post_type == "evento")
                                get_template_part("template-parts/evento/card");
                            else
                                get_template_part("template-parts/single/card-vertical-thumb-page", $post->post_type);
                            ?>
                        </div><!-- /col-lg-4 -->
                        <?php
                    }
                }
            ?>
        </div><!-- /row -->

    </div><!-- /container -->
        <?php
        $landing_url = dsi_get_template_page_url("page-templates/notizie.php");
        if($landing_url) {
            ?>
            <div class="text-center mt-4">
                <a class="text-underline" href="<?php echo $landing_url; ?>"><strong><?php _e("Scopri di più", "design_scuole_italia"); ?></strong></a>
            </div>
            <?php
        }
        ?>
</section><!-- /section --><?php

