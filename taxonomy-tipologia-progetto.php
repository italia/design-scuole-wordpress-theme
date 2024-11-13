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
    <main id="main-container" class="main-container redbrown">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php get_template_part("template-parts/hero/didattica", "archive"); ?>
        
        <?php 
        get_template_part( 'template-parts/search/toggle-search-filters-mobile' );
        ?>

        <section class="section bg-gray-light">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">
                    <div class="col-lg-3 bg-white bg-white-left">
                        <?php get_template_part("template-parts/search/filters", "scheda_progetto"); ?>
                    </div>
                    <div class="col-lg-7 offset-lg-1 pt84">
                        <?php if ( have_posts() ) : ?>
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
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>

    </main>
<?php
get_footer();
