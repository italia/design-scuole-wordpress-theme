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

        <?php get_template_part("template-parts/hero/notizie", "archive"); ?>

        <?php 
        get_template_part( 'template-parts/search/toggle-search-filters-mobile' );
        ?>
        
        <section class="section bg-gray-light">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">
                    <div class="col-lg-3 bg-white bg-white-left">
                        <?php get_template_part("template-parts/search/filters", "evento"); ?>
                    </div>
                    <div class="col-lg-7 offset-lg-1 pt84">
                        <?php
                        if ( have_posts() ) : ?>
                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'template-parts/list/article', get_post_type() );
                            endwhile;
                            ?>
                            <nav class="pagination-wrapper" aria-label="Navigazione della pagina">
                                <?php echo dsi_bootstrap_pagination(); ?>
                            </nav>
                        <?php
                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                        <?php
                        if(is_post_type_archive("evento") && !isset($_GET["date"])) {
                            if (isset($_GET["archive"]) && ($_GET["archive"] == "true")) { ?>
                                <p><a class="btn btn-block btn-secondary"
                                      href="<?php echo get_post_type_archive_link("evento"); ?>"><?php _e("Consulta gli eventi in svolgimento e futuri", "design_scuole_italia"); ?></a>
                                </p>
                            <?php } else { ?>
                                <p><a class="btn btn-block btn-secondary"
                                      href="<?php echo get_post_type_archive_link("evento"); ?>?archive=true"><?php _e("Consulta l'archivio", "design_scuole_italia"); ?></a>
                                </p>
                            <?php }
                        }
                        ?>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
    </main>

<?php
get_footer();
