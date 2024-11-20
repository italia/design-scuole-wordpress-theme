<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>
<main id="main-container" class="main-container petrol">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>

    <section class="section bg-white py-2 py-lg-3 py-xl-5">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col-lg-5 col-md-8 offset-lg-3">
                    <div class="section-title">
                        <h1>
                            <?php
                            global $wp_query;
// Modifico la risposta in base al numero di risultati
                            if ($wp_query->found_posts < 1) {
                                $result = "Nessun risultato";
                            } else if ($wp_query->found_posts < 2) {
                                $result = $wp_query->found_posts . " risultato";
                            } else {
                                $result = $wp_query->found_posts . " risultati";
                            }
                            echo $result . " ";
                            ?>
                            <?php if (get_search_query() != "")
// Aggiungo il parametro di ricerca preceduto da "per" solo quando serve
                                echo "per \"" . get_search_query() . "\""; ?>
                        </h1>

                        <p class="d-block">

                            <?php if (isset($_GET["post_types"]) || isset($_GET["post_terms"]) || isset($_GET["type"]) ) {  
                            // Aggiungo la frase "in base ai filtri selezionati:" se ce ne sono
                            echo "in base ai filtri selezionati:<br>";
                            } ?>

                            <?php
// Aggiungo i badge dei filtri corrispondenti al "type"
                            if (!isset($_GET["post_types"])) {

                                $post_type_links = array();
                                $post_types = array();

                                if (isset($_GET["type"]) && $_GET["type"] == "school") {
                                    $post_types = array("documento", "luogo", "struttura", "page");
                                }

                                if (isset($_GET["type"]) && $_GET["type"] == "service") {
                                    $post_types = array("servizio", "indirizzo");
                                }

                                if (isset($_GET["type"]) && $_GET["type"] == "education") {
                                    $post_types = array("scheda_didattica", "scheda_progetto");
                                }

                                if (isset($_GET["type"]) && $_GET["type"] == "news") {
                                    $post_types = array("evento", "post", "circolare");
                                }

                                if (isset($_GET["type"]) && $_GET["type"] == "any") {
                                    $post_types = array("documento", "luogo", "struttura", "page", "servizio", "indirizzo", "scheda_didattica", "scheda_progetto", "evento", "post", "circolare");
                                }

                                foreach ($post_types as $post_type_name) {
                                    $post_type = get_post_type_object($post_type_name);

                                    if (!empty($post_type)) {
                                        // Check if the label is "Articoli"
                                        if ($post_type->label === "Articoli") {
                                            // Special link for "Articoli"
                                            $link = 'tipologia-articolo/articoli/';
                                        } else {
                                            // Default link
                                            if (isset($post_type->rewrite['slug']) && is_array($post_type->rewrite)) {
                                                $link = esc_url('/' . $post_type->rewrite['slug']);
                                            } else {
                                                // Handle the case where rewrite or slug is not available
                                                $link = esc_url('/');
                                            }
                                        }

                                        // Escape the label for output
                                        $post_type_links[] = '<a class="badge badge-sm badge-pill badge-outline-primary" href="' . $link . '">' . esc_html($post_type->label) . '</a>';
                                    }
                                }

                                echo implode(' ', $post_type_links);
                            }


                            if (isset($_GET["post_types"])) {
                                // Sanitize input
                                $post_types = array_map('sanitize_text_field', $_GET["post_types"]);

                                $post_type_links = array();

                                foreach ($post_types as $post_type_name) {
                                    $post_type = get_post_type_object($post_type_name);

                                    if (!empty($post_type)) {
                                        // Check if the label is "Articoli"
                                        if ($post_type->label === "Articoli") {
                                            // Special link for "Articoli"
                                            $link = 'tipologia-articolo/articoli/';
                                        } else {
                                            // Default link
                                            if (isset($post_type->rewrite['slug']) && is_array($post_type->rewrite)) {
                                                $link = esc_url('/' . $post_type->rewrite['slug']);
                                            } else {
                                                // Handle the case where rewrite or slug is not available
                                                $link = esc_url('/');
                                            }
                                        }

                                        // Escape the label for output
                                        $post_type_links[] = '<a class="badge badge-sm badge-pill badge-outline-primary" href="' . $link . '">' . esc_html($post_type->label) . '</a>';
                                    }
                                }

                                echo implode(' ', $post_type_links);
                            }
                            ?>

                            <?php
                            if (isset($_GET["post_terms"])) {
                            // aggiungo badges degli argomenti selezionati nel filtro    
                                $post_terms = $_GET["post_terms"];

                                $term_links = array();

                                foreach ($post_terms as $term_id) {
                                    $term = get_term($term_id);

                                    if (!is_wp_error($term) && !empty($term)) {
                                        $term_links[] = '<a class="badge badge-sm badge-pill badge-outline-primary" href="argomento/' . $term->slug . '">' . $term->name . '</a>';
                                    }

                                }
                                echo implode(' ', $term_links);
                            }
                            ?>


                        </p>
                    </div><!-- /title-section -->
                </div><!-- /col-lg-5 col-md-8 offset-lg-2 -->

                <div class="col-lg-3 col-md-4 offset-lg-1">
                    <?php get_template_part("template-parts/single/actions"); ?>
                </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->



    <section class="section bg-white border-top border-bottom d-block d-lg-none">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <h3 class="h6 text-uppercase mb-0 label-filter"><strong>Filtri</strong></h3>
            <a class="toggle-search-results-mobile toggle-menu menu-search push-body mb-0" href="#">
                <svg class="svg-filters">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-filters"></use>
                </svg>
            </a>
        </div>
    </section>
    <section class="section bg-gray-light">
        <div class="container">
            <div class="row variable-gutters sticky-sidebar-container">
                <div class="col-lg-3 bg-white bg-white-left">
                    <?php get_template_part("template-parts/search/filters"); ?>
                </div>
                <div class="col-lg-7 offset-lg-1 pt84">
                    <h2 class="sr-only">Risultati di ricerca</h2>
                    <?php if (have_posts()): ?>
                        <?php
                        /* Start the Loop */
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/list/article', get_post_type());

                        endwhile;


                        if ((get_query_var('paged') == $wp_query->max_num_pages || $wp_query->max_num_pages == 1) && !isset($_GET["post_terms"])) {
                            $s_query = get_search_query();
                            get_template_part('template-parts/search/argomenti');
                        }

                        ?>
                        <nav class="pagination-wrapper" aria-label="Navigazione della pagina">
                            <?php echo dsi_bootstrap_pagination(); ?>
                        </nav>
                        <?php
                    else:

                        get_template_part('template-parts/content', 'none');

                        if (!isset($_GET["post_terms"])) {
                            $s_query = get_search_query();
                            get_template_part('template-parts/search/argomenti');
                        }

                    endif;


                    ?>
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
</main>

<?php
get_footer();
