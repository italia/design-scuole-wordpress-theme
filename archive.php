<?php
/**
 * The template for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#archive
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
							<?php the_archive_title( '<h2 class="mb-0">', '</h2>' ); ?>
							<?php the_archive_description("<p>","</p>"); ?>
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
                <h3 class="h6 text-uppercase mb-0 label-filter"><strong><?php _e("Filtri", "design_scuole_italia"); ?></strong></h3>
                <a class="toggle-search-results-mobile toggle-menu menu-search push-body mb-0" href="#">
                    <svg class="svg-filters"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-filters"></use></svg>
                </a>
            </div>
        </section>
        <section class="section bg-gray-light">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">
                    <div class="col-lg-3 bg-white bg-white-left">
						<?php get_template_part("template-parts/search/filters", "argomento"); ?>
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
                            <nav class="pagination-wrapper justify-content-center col-12" aria-label="Navigazione centrata">
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
