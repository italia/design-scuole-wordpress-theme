<?php

// global $calendar_card;

global $set_card_top_margin, $set_card_wrapper;
$set_card_wrapper = false;

$tipologie_notizie = dsi_get_option("tipologie_notizie", "notizie");
$home_show_events = dsi_get_option("home_show_events", "homepage");
$home_show_circolari = dsi_get_option("home_show_circolari", "homepage");

$giorni_per_filtro = dsi_get_option("giorni_per_filtro", "homepage");
$data_limite_filtro = strtotime("-". $giorni_per_filtro . " day");

$post_per_tipologia = dsi_get_option("home_post_per_tipologia", "homepage");
if($post_per_tipologia == "") $post_per_tipologia = 1;

$home_events_count = dsi_get_option("home_events_count", "homepage");
if($home_events_count == "") $home_events_count = 1;

$home_circolari_count = dsi_get_option("home_circolari_count", "homepage");
if($home_circolari_count == "") $home_circolari_count = 1;

$carousel_novita = dsi_get_option("carousel_novita", "homepage");
$carousel_novita = $carousel_novita == "true" ? true : false;

$ct=0;

$column = 3;

if(is_array($tipologie_notizie) && count($tipologie_notizie)){
    ?>
    <section class="section bg-white pb-2 pb-lg-3 pb-xl-5">
    <div class="container">
    <div class="row variable-gutters">
    <?php
    foreach ( $tipologie_notizie as $id_tipologia_notizia ) {

        $tipologia_notizia = get_term_by("id", $id_tipologia_notizia, "tipologia-articolo");
    
        if($tipologia_notizia) {
						
            $args = array('post_type' => 'post',
                    'posts_per_page' => $post_per_tipologia,
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

            if (is_array($posts) && count($posts)) { 
            ?>
            <div class="col-lg-12 pt-2 pt-lg-3 pt-xl-5">
                <div class="title-section pb-2">
                    <h2><?php echo $tipologia_notizia->name; ?></h2>
                </div><!-- /title-section -->

                <?php if ($carousel_novita) { ?>
                    <div class="it-carousel-wrapper carousel-notice it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide>
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php 
                                    foreach ($posts as $post) {
                                        echo '<li class="splide__slide"><div class="it-single-slide-wrapper h-100">';
                                            get_template_part("template-parts/single/card", "vertical-thumb");
                                        echo '</div></li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div><!-- /carousel-large -->
                <?php } else { ?>
                    <div class="row variable-gutters">
                        <?php 
                            foreach ($posts as $post) {
                                echo '<div class="col-lg-' . (12/$column) . ' mb-4">';
                                    get_template_part("template-parts/single/card", "vertical-thumb");
                                echo '</div>';
                            }
                        ?>
                    </div>
                <?php } ?>

                <div class="py-2">
                    <a class="text-underline" href="<?php echo get_term_link($tipologia_notizia); ?>"><strong><?php _e("Vedi tutti", "design_scuole_italia"); ?></strong></a>
                </div>
            </div><!-- /col-lg-12 -->
            <?php
            }
        }
        $ct++;
    }

    if($home_show_events != "false") { ?>

        <div class="col-lg-12 pt-2 pt-lg-3 pt-xl-5">

        <!-- <div class="title-section <?php if($home_show_events != "false") echo 'pb-4'; ?>"> -->
        <div class="title-section pb-4">
            <h2><?php $home_show_events == "true_event" ? _e("Prossimi eventi", "design_scuole_italia") : _e("Eventi", "design_scuole_italia"); ?></h2>
        </div><!-- /title-section -->

        <?php
        $events_shown = 0;
        if ($home_show_events != "false") {
            $args = array(
                'post_type' => 'evento',
                'posts_per_page' => $home_events_count,
                'meta_key' => '_dsi_evento_timestamp_inizio',
                'orderby' => 'meta_value',
                'order' => 'ASC'
            );

            if($home_show_events == "true_event_include_current") {
                $time_filter = array(
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => '_dsi_evento_timestamp_fine',
                            'value' => current_datetime()->modify('today')->getTimestamp(),
                            'compare' => '>=',
                            'type' => 'numeric'
                        ),
                        array(
                            'key' => '_dsi_evento_timestamp_inizio',
                            'value' => current_datetime()->modify('today')->getTimestamp(),
                            'compare' => '>=',
                            'type' => 'numeric'
                        ),
                    )
                );
            } else {
                $time_filter = array(
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
            }

            $args = array_merge($args,$time_filter);

            $posts = get_posts($args);
            $events_shown = count($posts);


            if ($carousel_novita) { ?>
                <div class="it-carousel-wrapper carousel-notice it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide>
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php 
                                foreach ($posts as $post) {
                                    echo '<li class="splide__slide"><div class="it-single-slide-wrapper h-100">';
                                    get_template_part("template-parts/evento/card");
                                    echo '</div></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div><!-- /carousel-large -->
            <?php } else { ?>
                <div class="row variable-gutters">
                    <?php 
                        foreach ($posts as $post) {
                            echo '<div class="col-lg-' . (12/$column) . ' mb-4">';
                            get_template_part("template-parts/evento/card");
                            echo '</div>';
                        }
                    ?>
                </div>
            <?php }
        }else {
            // $calendar_card = true;
            // get_template_part("template-parts/evento/full_calendar");
        }
        ?>
        <div class="py-4">
            <?php if($home_show_events == "true_event" || $events_shown == 0) { ?>
                <a class="text-underline" href="<?php echo get_post_type_archive_link("evento"); ?>?archive=true"><strong><?php _e("Consulta l'archivio", "design_scuole_italia"); ?></strong></a>
            <?php } else { ?>
                <a class="text-underline" href="<?php echo get_post_type_archive_link("evento"); ?>"><strong><?php _e("Consulta il calendario", "design_scuole_italia"); ?></strong></a>
            <?php } ?>
        </div>
        </div><!-- /col-lg-4 -->
    <?php
    }

    if($home_show_circolari != "false") { ?>
         <div class="col-lg-12 pt-2 pt-lg-3 pt-xl-5">

            <div class="title-section pb-4">
                <h2><?php _e("Circolari", "design_scuole_italia"); ?></h2>
            </div><!-- /title-section -->
            <?php
            $args = array('post_type' => 'circolare',
                'posts_per_page' => $home_circolari_count
            );
            $posts = get_posts($args);

            if ($carousel_novita) { ?>
                <div class="it-carousel-wrapper carousel-notice it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide>
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php 
                                foreach ($posts as $post) {
                                    echo '<li class="splide__slide"><div class="it-single-slide-wrapper h-100">';
                                    get_template_part("template-parts/single/card", "circolare");
                                    echo '</div></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div><!-- /carousel-large -->
            <?php } else { ?>
                <div class="row variable-gutters">
                    <?php 
                        foreach ($posts as $post) {
                            echo '<div class="col-lg-' . (12/$column) . ' mb-4">';
                            get_template_part("template-parts/single/card", "circolare");
                            echo '</div>';
                        }
                    ?>
                </div>
            <?php } ?>

            <div class="py-4">
                <a class="text-underline" href="<?php echo get_post_type_archive_link("circolare"); ?>"><strong><?php _e("Vedi tutte", "design_scuole_italia"); ?></strong></a>
            </div>

        </div>
    <?php
    }
    ?>

        </div><!-- /row -->
    </div><!-- /container -->
    </section><!-- /section --><?php

}
