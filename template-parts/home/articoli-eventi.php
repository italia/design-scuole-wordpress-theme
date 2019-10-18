<?php

$tipologie_notizie = dsi_get_option("tipologie_notizie", "notizie");
$ct=0;
if(is_array($tipologie_notizie) && count($tipologie_notizie)){


?><section class="section bg-white py-2 py-lg-3 py-xl-5">
    <div class="container">
        <div class="row variable-gutters">
            <?php
            foreach ( $tipologie_notizie as $id_tipologia_notizia ) {
                if($ct >= 2)
                    break;

                $tipologia_notizia = get_term_by("id", $id_tipologia_notizia, "tipologia-articolo");
                if($tipologia_notizia) {
                    ?>
                    <div class="col-lg-4">
                        <div class="title-section pb-4">
                            <h3 class="h2"><?php echo $tipologia_notizia->name; ?></h3>
                        </div><!-- /title-section -->
                        <?php
                        $args = array('post_type' => 'post',
                            'posts_per_page' => 1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'tipologia-articolo',
                                    'field' => 'term_id',
                                    'terms' => $tipologia_notizia->term_id,
                                ),
                            ),
                        );
                        $posts = get_posts($args);
                        foreach ($posts as $post) {
                            get_template_part("template-parts/single/card", "vertical-thumb");
                        }
                        ?>
                        <div class="py-4">
                            <a class="text-underline" href="<?php echo get_term_link($tipologia_notizia); ?>"><strong>Leggi
                                    tutte</strong></a>
                        </div>
                    </div><!-- /col-lg-4 -->

                    <?php
                }
                $ct++;
            }
            ?>

            <div class="col-lg-4">
                <div class="title-section pb-4">
                    <h3 class="h2"><?php _e("Eventi", "design_scuole_italia"); ?></h3>
                </div><!-- /title-section -->
                <?php
                $args = array('post_type' => 'evento',
                    'posts_per_page' => 1
                );
                $posts = get_posts($args);
                foreach ($posts as $post){
                    get_template_part("template-parts/evento/card");
                }
                ?>
                <div class="py-4">
                    <a class="text-underline" href="<?php echo get_post_type_archive_link("evento"); ?>"><strong><?php _e("Vedi tutti", "design_scuole_italia"); ?></strong></a>
                </div>
            </div><!-- /col-lg-4 -->
        </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /section --><?php

}