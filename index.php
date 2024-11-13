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
	<main id="main-container" class="main-container petrol">

		<?php get_template_part("template-parts/common/breadcrumb"); ?>
		<section class="section bg-white py-3 py-lg-3 py-xl-4 pb-xl-5">
			<div class="container ">
				<div class="row variable-gutters">
					<div class="col-lg-5 col-md-8 offset-lg-2">
						<div class="section-title">
							<?php the_archive_title( '<h1 class="h2 mb-0">', '</h1>' ); ?>
						</div><!-- /title-section -->
					</div><!-- /col-lg-5 col-md-8 offset-lg-2 -->
					<div class="col-lg-3 col-md-4 offset-lg-1">
						<?php get_template_part("template-parts/single/actions"); ?>
					</div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
				</div><!-- /row -->
			</div><!-- /container -->
		</section><!-- /section -->

		<section class="section bg-gray-light">
			<div class="container">
				<div class="row variable-gutters d-flex justify-content-center">
					<div class="col-lg-8 pt84">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
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
					</div>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
