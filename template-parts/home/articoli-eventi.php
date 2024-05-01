<?php

// global $calendar_card;

global $set_card_top_margin;

$tipologie_notizie = dsi_get_option("tipologie_notizie", "notizie");
$home_show_events = dsi_get_option("home_show_events", "homepage");
$home_show_circolari = dsi_get_option("home_show_circolari", "homepage");
$giorni_per_filtro = dsi_get_option("giorni_per_filtro", "homepage");
$data_limite_filtro = strtotime("-". $giorni_per_filtro . " day");
$post_per_tipologia = dsi_get_option("home_post_per_tipologia", "homepage");

$ct=0;

$column = 1;
if($home_show_events == "false")
    $column=$column+1;
if($home_show_circolari == "false")
    $column=$column+1;

if($post_per_tipologia == "") $post_per_tipologia = 1;

if(is_array($tipologie_notizie) && count($tipologie_notizie)){
    ?>
    <section class="section bg-white py-2 py-lg-3 py-xl-5">
    <div class="container">
    <div class="row variable-gutters">
    <?php
    foreach ( $tipologie_notizie as $id_tipologia_notizia ) {

        $tipologia_notizia = get_term_by("id", $id_tipologia_notizia, "tipologia-articolo");
    
        if($tipologia_notizia) {
            // se è selezionata solo una tipologia, pesco 2 elementi
            $ppp=$post_per_tipologia;
			
            if(count($tipologie_notizie) == 1 && $post_per_tipologia < $column)
                $ppp=$column;
			
            $args = array('post_type' => 'post',
                    'posts_per_page' => $ppp,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tipologia-articolo',
                            'field' => 'term_id',
                            'terms' => $tipologia_notizia->term_id,
                        ),
                	),
            );
        
        	if($giorni_per_filtro != "" || $giorni_per_filtro > 0) {
            	$filter = array(
                		'date_query' => array(
            				array(
								'after' => '-'. $giorni_per_filtro . ' day',
                				'inclusive' => true,
            				),
            			),
        		);
            
				$args = array_merge($args,$filter);
            	
            }
        
            $posts = get_posts($args);

            $lg = 4;
            if((count($tipologie_notizie) == 1))
                $lg = $column * 4;

            if (is_array($posts) && count($posts)) { 
            ?>
            <div class="col-lg-12">
                <div class="title-section pb-4">
                    <h2><?php echo $tipologia_notizia->name; ?></h2>
                </div><!-- /title-section -->

                <div style="display: flex; justify-content: space-between" id="row-circolare">
                <?php
                if((count($tipologie_notizie) == 1) && ($column > 1))
                    echo '<div class="row variable-gutters">';

                $set_card_top_margin = false;

                foreach ($posts as $post) {
                    if((count($tipologie_notizie) == 1) && ($column > 1))
                        echo '<div class="col-lg-' . (12/$column) . ' mb-4">';
                    
                    get_template_part("template-parts/single/card", "vertical-thumb");

                    if((count($tipologie_notizie) == 1) && ($column > 1))
                         echo '</div>';

                    $set_card_top_margin = true;
                }

                if((count($tipologie_notizie) == 1) && ($column > 1))
                    echo '</div>';
                ?>
                </div>
                <div class="py-4">
                    <a class="text-underline" href="<?php echo get_term_link($tipologia_notizia); ?>"><strong><?php _e("Vedi tutti", "design_scuole_italia"); ?></strong></a>
                </div>
            </div><!-- /col-lg-4 -->
            <?php
            }
        }
        $ct++;
    }

    if($home_show_events != "false") { ?>

        <div class="col-lg-12">

        <!-- <div class="title-section <?php if($home_show_events == "true_event") echo 'pb-4'; ?>"> -->
        <div class="title-section pb-4">
            <h2><?php _e("Prossimi Eventi", "design_scuole_italia"); ?></h2>
        </div><!-- /title-section -->

        <?php
        if ($home_show_events == "true_event") {
            $args = array('post_type' => 'evento',
                'posts_per_page' => 1,
                'meta_key' => '_dsi_evento_timestamp_inizio',
                'orderby'   =>  array('meta_value' => 'ASC', 'date' => 'ASC'),
                'meta_query' => array(
                    array(
                        'key' => '_dsi_evento_timestamp_inizio'
                    ),
                    array(
                        'key' => '_dsi_evento_timestamp_inizio',
                        'value' => time(),
                        'compare' => '>=',
                        'type' => 'numeric'
                    )
                )
            );
            $posts = get_posts($args);
            foreach ($posts as $post) {
                get_template_part("template-parts/evento/card");
            }
        }else {
            // $calendar_card = true;
            // get_template_part("template-parts/evento/full_calendar");
        }
        ?>
        <div class="py-4">
            <a class="text-underline" href="<?php echo get_post_type_archive_link("evento"); ?>?archive=true"><strong><?php _e("Consulta l'archivio", "design_scuole_italia"); ?></strong></a>
        </div>
        </div><!-- /col-lg-4 -->
    <?php
    }

    if($home_show_circolari != "false") { ?>
    <?php
    /*
    Modifica per Liceo Pitagora
        Correzione Circolari

    START
    */
    ?>
        <div class="col-lg-12">

            <div class="title-section pb-4">
                <h2><?php _e("Circolari", "design_scuole_italia"); ?></h2>
            </div><!-- /title-section -->

            <div style="display: flex; justify-content: space-between" id="row-circolare">
            <?php
            $args = array('post_type' => 'circolare',
                'posts_per_page' => 3
            );
            $posts = get_posts($args);
            foreach ($posts as $post) {
                get_template_part("template-parts/single/card", "circolare");
            }
            ?>

            </div>

            <div class="py-4">
                <a class="text-underline" href="<?php echo get_post_type_archive_link("circolare"); ?>"><strong><?php _e("Vedi tutte", "design_scuole_italia"); ?></strong></a>
            </div>

            
        </div>

      

        <?php
         /*
         END

         Modifica per Liceo Pitagora     
         */
        ?>

        <div class="col-lg-12">
        <div class="title-section pb-4">
                <h2><?php _e("Albo Online", "design_scuole_italia"); ?></h2>
            </div><!-- /title-section -->
            <?php echo do_shortcode('[wp-rss-aggregator feeds="albo-online"]'); ?>

            <div class="py-4">
                <a class="text-underline" href="https://nuvola.madisoft.it/bacheca-digitale/bacheca/KRPC02000L/1/IN_PUBBLICAZIONE/0/show"><strong><?php _e("Vedi tutti", "design_scuole_italia"); ?></strong></a>
            </div>
        </div>
    <?php
    }
    ?>

        </div><!-- /row -->
    </div><!-- /container -->
    </section><!-- /section --><?php

}
