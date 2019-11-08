<?php
/* Template Name: Servizi
 *
 * Servizi template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $tipologia_servizio, $ct;
get_header();

?>
	<main id="main-container" class="main-container purplelight">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part("template-parts/hero/servizi");

			$tipologie_servizi = dsi_get_option("tipologie_servizi", "servizi");
			$ct=0;
			if(is_array($tipologie_servizi) && count($tipologie_servizi)){
				foreach ( $tipologie_servizi as $id_tipologia_servizio ) {
                    $tipologia_servizio = get_term_by("id", $id_tipologia_servizio, "tipologia-servizio");
					get_template_part("template-parts/home/servizi", "tipologie");
					$ct++;
			    }

            }
            get_template_part("template-parts/home/percorsi");


		endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();



