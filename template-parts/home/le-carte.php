<?php
// le carte
$gruppo_carte = dsi_get_option( "link_schede_documenti", "la_scuola" );
if(is_array($gruppo_carte) && count($gruppo_carte) > 0) {
	?>
	<section class="section section-padding bg-redbrown bg-white-strip">
		<div class="container">
			<div class="row variable-gutters mt-0 mt-xl-5">
				<div class="col">
					<div class="title-section text-center mb-5">
						<h2 class="h3 mb-2"><?php _e( "Le carte della scuola", "design_scuole_italia" ); ?></h2>
						<p><?php echo dsi_get_option( "descrizione_carte", "la_scuola" ); ?></p>
					</div><!-- /title-section -->
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row variable-gutters">
				<div class="col">
					<div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide>
                  		<div class="splide__track">
                    		<ul class="splide__list">
							<?php
							foreach ( $gruppo_carte as $carta ) {
								$doc = get_post($carta);
								$desc = dsi_get_meta("descrizione", '', $doc->ID);
								?>
								<li class="splide__slide">
									<div class="it-single-slide-wrapper h-100">
										<div class="card card-icon card-bg card-large card-folded rounded">
											<div class="card-title card-title-icon">
												<svg class="it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-pdf-document"></use></svg>

												<h3><a href="<?php echo get_permalink($doc); ?>"><?php echo $doc->post_title; ?></a></h3>
											</div><!-- /card-body -->
											<div class="card-body card-body-min-height">
												<p><?php  echo $desc; ?></p>
											</div><!-- /card-body -->
											<div class="card-bottom">
												<a class="read-more" href="<?php echo get_permalink($doc); ?>"><?php _e("Scopri", "design_scuole_italia"); ?></a>
											</div><!-- /card-bottom -->
										</div><!-- /card -->
									</div><!-- /item -->
								</li>
								<?php
							}
							?>
							</ul>
						</div>
					</div><!-- /carousel-cards -->
				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section><!-- /section -->
	<section class="top-move-back pb-5">
		<div class="container">
			<div class="row variable-gutters mb-4">
				<div class="col d-flex justify-content-center">
					<a class="btn btn-redbrown" href="<?php echo get_post_type_archive_link("documento"); ?>"><?php _e("Tutti i documenti", "design_scuole_italia"); ?></a>
				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section>

	<?php
}// fine carte
