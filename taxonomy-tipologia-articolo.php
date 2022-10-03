<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
$class = "greendark";
/*
if(is_tax("tipologia-articolo")){
$slug = get_query_var('term');
if($slug == "articoli")
    $class = "redbrown";
}*/
?>
	<main id="main-container" class="main-container <?php echo $class; ?>">

	<?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?>


		<section class="section bg-white border-top border-bottom d-block d-lg-none mx-3 mx-lg-0">
			<div class="container d-flex justify-content-between align-items-center py-3">
				<h3 class="h6 text-uppercase mb-0 label-filter"><strong><?php _e("Filtri", "design_scuole_italia"); ?></strong></h3>
				<a class="toggle-search-results-mobile toggle-menu menu-search push-body mb-0" href="#" aria-label="filtri">
					<svg class="svg-filters"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-filters"></use></svg>
				</a>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<div class="variable-gutters sticky-sidebar-container pt-lg-5 pt-4 mx-3 mx-lg-0">
					<div>
					<?php get_template_part("template-parts/search/search-form"); ?>
						<?php get_template_part("template-parts/search/filters", "articolo"); ?>
					</div>
				</div>
			</div><!-- /container -->
				<div class="container p-lg-0 px-lg-2">
					<div class="row my-lg-5 my-4 mx-lg-2" id="container_archive">
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
					</div><!-- /row -->
				</div><!-- /container -->
			
		</section>
	</main>

<?php
get_footer();
