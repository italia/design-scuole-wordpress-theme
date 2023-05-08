<?php
/* Page name Le carte della scuola */
get_header();
?>

<?php get_template_part("martini-template-parts/hero/hero_title"); ?>
<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>
    <!-- loop per le pagine -->
    <div class="container mb-5 martini-list">
        <div>
            <?php
            if (is_page('orari')) {
                $terms = get_terms(array(
                    'taxonomy' => 'orari',
                ));
                foreach ($terms as $term) {
                    get_template_part("template-parts/list/page-list", null, array(
                        "id" => $term->ID,
                        "link" => get_term_link($term),
                        "title" => $term->name,
                    ));
                }
            } else {
                $loop = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_parent' => $post->ID,
                    'post_type' => 'page',
                    'post_status' => '',
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));

                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        get_template_part("template-parts/list/page-list");
                    endwhile;
                }
            }
            ?>
        </div>
        <div>
            <!-- Pubblicità legale -->
            <section class="martini-list--item px-0 py-4 align-items-center">
                <div class="row container-martini px-0 px-2 align-items-center">
                    <div class="col-12 col-md-6">
                        <a href="https://www.martinomartini.eu/alboonline/visualizza_albo.php" target="_blank">
                            <h4 class="mb-0">Pubblicità legale</h4>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 align-items-start text-md-right">
                        <a class="btn-sm-default" href="https://www.martinomartini.eu/alboonline/visualizza_albo.php" target="_blank">
                            <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                        </a>
                    </div>
                </div>
            </section>
            <!-- Amministrazione trasparente -->
            <section class="martini-list--item px-0 py-4 align-items-center">
                <div class="row container-martini px-0 px-2 align-items-center">
                    <div class="col-12 col-md-6">
                        <a href="https://aprilascuola.provincia.tn.it/sei/#/soggetto/0221179501/scuola/amministrazione-trasparente" target="_blank">
                            <h4 class="mb-0">Amministrazione trasparente</h4>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 align-items-start text-md-right">
                        <a class="btn-sm-default" href="https://aprilascuola.provincia.tn.it/sei/#/soggetto/0221179501/scuola/amministrazione-trasparente" target="_blank">
                            <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
<?php
get_footer();
