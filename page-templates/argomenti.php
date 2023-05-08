<?php
/* Template Name: Argomenti
 *
 * Argomenti template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $argomento, $ct;
get_header();

?>
	<main id="main-container" class="main-container petrol">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part("template-parts/hero/argomenti");

			$argomenti = get_terms(['taxonomy' => 'post_tag','hide_empty' => true]);

			?>
            <section class="section py-5">
				<div class="container">
					<div class="title-section mb-5">
						<h2 class="h4">Tutti gli argomenti</h2>
					</div><!-- /title-large -->
					<div class="container">
						<?php
						if($argomenti) {
						?><div class="row"><?php
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
					</div><!-- /row -->
				</div><!-- /container -->
			</section><!-- /section -->
<?php
			

		endwhile; // End of the loop.
		?>
	</main>

<?php
get_footer();
