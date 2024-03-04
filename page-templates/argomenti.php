<?php
/* Template Name: Argomenti
 *
 * Argomenti template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $argomento, $ct, $show_descrizione;
get_header();

?>
	<main id="main-container" class="main-container petrol">
		<?php
		
		get_template_part("template-parts/common/breadcrumb"); 

		get_template_part("template-parts/hero/argomenti");
		
		$argomenti_evidenza = dsi_get_option("argomenti_evidenza", "argomenti");
		$argomenti_evidenza_layout = dsi_get_option("argomenti_evidenza_layout", "argomenti");
		$show_descrizione = dsi_get_option("argomenti_evidenza_descrizione", "argomenti");
		
		$layout = "noicon";
		if($argomenti_evidenza_layout == "icona") $layout = "";
		if($argomenti_evidenza_layout == "immagine") $layout = "image";

		if($argomenti_evidenza) {
			?>
			<section class="section bg-gray-light py-5">
				<div class="container">
					<div class="title-section mb-4">
						<h2 class="h4">In evidenza</h2>
					</div><!-- /title-large -->
						<div class="row variable-gutters"><?php
                				foreach ($argomenti_evidenza as $idargomento){
                 					$argomento = get_term($idargomento, 'post_tag');
									if($argomento) { ?>
									<div class="col-lg-4 mb-4">
										<?php get_template_part("template-parts/argomento/card", $layout); ?>
									</div>
							<?php 	}
								}
						?></div>
				</div><!-- /container -->
			</section><!-- /section -->
			<?php
		}

		while ( have_posts() ) :
			the_post();

			$argomenti = get_terms(['taxonomy' => 'post_tag','hide_empty' => true]);
			$show_descrizione = dsi_get_option("argomenti_descrizione", "argomenti");

			?>
            <section class="section py-5">
				<div class="container">
					<div class="title-section mb-4">
						<h2 class="h4">Tutti gli argomenti</h2>
					</div><!-- /title-large -->
						<?php
						if($argomenti) {
						?><div class="row variable-gutters"><?php
							foreach ($argomenti as $argomento){ 
								?><div class="col-lg-4 mb-4">
									<?php get_template_part("template-parts/argomento/card"); ?>
								</div>
							<?php }
						?></div><?php
							} else {
								?><div class="alert alert-info" role="alert">
									Nessun argomento presente
								</div><?php
							}
						?>
				</div><!-- /container -->
			</section><!-- /section -->
<?php
		endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();
