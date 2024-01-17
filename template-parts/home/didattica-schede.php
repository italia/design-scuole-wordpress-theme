<?php
$args = array('post_type' => 'scheda_didattica',
    'posts_per_page' => 9,
);
$posts = get_posts($args);

if(is_array($posts) && count($posts)) {

    ?>
    <section class="section bg-light py-5">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col">
                    <div class="section-title mb-5">
                        <h2><?php _e("Le schede didattiche", "design_scuole_italia"); ?></h2>
                    </div>

                    <div class="splide splide-double mb-1" data-bs-carousel-splide>
                        <div class="splide__track" >
                            <ul class="splide__list">
                                <?php
                                foreach ($posts as $post) { ?>
                                    <li class="splide__slide mb-0">
                                        <div class="item rounded">
                                            <?php get_template_part("template-parts/didattica/card"); ?>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- /carousel-single -->
                </div><!-- /col -->
            </div><!-- /row -->

        </div><!-- /container -->
        <div class="pb-5 text-center mt-2">
            <a class="text-underline" href="<?php echo get_post_type_archive_link("scheda_didattica") ?>"><strong><?php _e("Vedi tutte le schede didattiche", "design_scuole_italia"); ?></strong></a>
        </div>
    </section><!-- /section --><?php
}
