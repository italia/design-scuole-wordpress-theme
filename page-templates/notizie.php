<?php
/* Template Name: Notizie
 *
 * notizie template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $tipologia_notizia, $ct;
get_header();

?>
	<?php get_template_part("template-parts/common/breadcrumb"); ?>
		<?php get_template_part("template-parts/hero/hero_page"); ?>

	<main id="main-container" class="main-container greendark">
		<div class="container">
			<div class="bg-white bg-white-left">
				<?php get_template_part("template-parts/common/filtro-articoli"); ?>
				<div class="header-search d-flex align-items-center">
					<button type="button" class="d-flex align-items-center search-btn" data-toggle="modal" data-target="#search-modal" aria-label="Cerca nel sito" data-element="search-modal-button">
						<span class="d-none d-lg-block mr-2"><strong>Cerca</strong></span>
						<svg class="svg-search">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-search"></use>
						</svg>
					</button>
				</div>
			</div>
			<div class="header-utils-sticky">
				<?php get_template_part("template-parts/search/filters", "articolo"); ?>
			</div><!-- /article-filter -->

			<div class="" id="news">
				<?php
				while ( have_posts() ) :
					the_post();

					$tipologie_notizie = dsi_get_option("tipologie_notizie", "notizie");
					$ct=1;
					if(is_array($tipologie_notizie) && count($tipologie_notizie)){
						foreach ( $tipologie_notizie as $id_tipologia_notizia ) {
							$tipologia_notizia = get_term_by("id", $id_tipologia_notizia, "tipologia-articolo");
							get_template_part("template-parts/home/notizie", "tipologie");
							$ct++;
						}

					}
				endwhile; // End of the loop.
				?>
			</div>
		</div>
		

	</main>

<?php
get_footer();



