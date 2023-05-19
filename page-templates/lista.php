<?php
/* Template Name: Lista
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $tipologia_notizia, $ct;
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
    </div>
</main>
<?php
get_footer();
