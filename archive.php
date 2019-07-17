<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>
    <main id="main-container" class="main-container">

		<?php get_template_part("template-parts/common/breadcrumb"); ?>
        <section class="section bg-white">
            <div class="container ">
                <div class="row variable-gutters">
                    <div class="col-lg-12">
                                <?php if ( have_posts() ) : ?>

                        <header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
                        </header><!-- .page-header -->
                        </header><!-- .page-header -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-white pt-5">
            <div class="container ">

                <div class="row variable-gutters">
                    <div class="col-lg-12 row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							echo "<div class=\"col-lg-6 mb-4\">";
							get_template_part( 'template-parts/search/item', get_post_type() );
							echo "</div>";

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
    </div>
    </div>
    </div>
    </section>
    </main>

<?php
get_footer();
