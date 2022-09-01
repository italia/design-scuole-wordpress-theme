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
			<div class="bg-white bg-white-left py-4">
			</div>
			<div class="header-utils-sticky">
				<div class="mb-4">
					<?php get_search_form("template-parts/search/search-form"); ?>
				</div>
				<?php get_template_part("template-parts/search/filters", "articolo"); ?>
			</div><!-- /article-filter -->

			<div class="row col-12" id="news">
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



