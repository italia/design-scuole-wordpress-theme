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
	<main id="main-container" class="main-container greendark">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part("template-parts/hero/notizie");


			$tipologie_notizie = dsi_get_option("tipologie_notizie", "notizie");
			$ct=1;
			if(is_array($tipologie_notizie) && count($tipologie_notizie)){
				foreach ( $tipologie_notizie as $id_tipologia_notizia ) {
					$tipologia_notizia = get_term_by("id", $id_tipologia_notizia, "tipologia-articolo");
					get_template_part("template-parts/home/notizie", "tipologie");
					$ct++;
				}

			}

            get_template_part("template-parts/home/notizie", "circolari");

            get_template_part("template-parts/home/eventi");


		endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();



