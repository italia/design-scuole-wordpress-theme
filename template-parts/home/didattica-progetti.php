<?php
global $progetto;
//$testo_sezione_progetti = dsi_get_option("testo_sezione_progetti", "didattica");
$args = array('post_type' => 'scheda_progetto',
    'posts_per_page' => 3
);
$posts = get_posts($args);
if(is_array($posts) && count($posts)) {
    ?>
    <section class="section bg-white">
    <section class="section bg-linear-vertical-blue-light">
        <div class="container py-5">
            <div class="row variable-gutters">
                <div class="col">
                    <div class="section-title text-center mb-4">
                        <h2><?php _e("I Progetti", "design_scuole_italia"); ?></h2>
                        <p class="mb-4"><?php _e("Scopri i progetti dell'Istituto", "design_scuole_italia") ?></p>
                        <!-- <div class="clearfix">
                            <a class="btn btn-bluelectric" style="min-width: 200px;"
                               href="<?php echo get_post_type_archive_link("scheda_progetto") ?>"><?php _e("Scopri", "design_scuole_italia"); ?></a>
                        </div> -->
                    </div><!-- /hero-title -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>

    <div class="container position-relative slided-top">
        <div class="row variable-gutters pb-5">
            <?php

            foreach ($posts as $progetto) { ?>
                <div class="col-lg-4">
                    <?php get_template_part("template-parts/progetto/card", "bluelight"); ?>
                </div>
            <?php } ?>
        </div><!-- /row -->
    </div><!-- /row -->
    <div class="pb-5 text-center mt-4">
        <a class="text-underline" href="<?php echo get_post_type_archive_link("scheda_progetto") ?>"><strong><?php _e("Vedi tutti i progetti", "design_scuole_italia"); ?></strong></a>
    </div>
    </div><!-- /container -->
    </section><?php
}
