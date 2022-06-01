<?php
global $post, $gallery;
$gallery = dsi_get_option("immagini_luoghi", "la_scuola");
$testoluoghi = dsi_get_option("descrizione_gallery_luoghi", "la_scuola");

if(is_array($gallery) && count($gallery) > 0){
	?>
	<section class="section bg-white py-5">
		<div class="container">
			<div class="title-section text-center mb-4">
				<h3 class="h4 mb-3"><?php _e("I luoghi della scuola", "design_scuole_italia"); ?></h3>
				<p class="max-width-620"><?php echo $testoluoghi; ?></p>
			</div><!-- /title-large -->
			<div class="row variable-gutters">
				<div class="col">
					<div class="it-carousel-wrapper simple-two-carousel big splide" data-bs-carousel-splide>
						<div class="splide__track">
							<ul class="splide__list">
								<?php get_template_part("template-parts/single/gallery", $post->post_type); ?>
							</ul>
						</div>
					</div><!-- /carousel-large -->
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row variable-gutters my-5">
				<div class="col d-flex justify-content-center">
					<a class="btn btn-redbrown" href="<?php echo get_post_type_archive_link("luogo"); ?>"><?php _e("Vedi tutti i luoghi", "design_scuole_italia"); ?></a>
				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
}
