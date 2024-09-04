<?php

// la storia
$timeline = dsi_get_option( "timeline", "la_scuola" );
if(is_array($timeline) && count($timeline) > 0) {
	?>
	<section class="section-hero bg-blue-dark py-5">
		<div class="container section-padding bg-blue-dark">
			<div class="row variable-gutters mt-0 mt-xl-2">
				<div class="col">
					<div class="title-section text-center mb-5">
						<h2 class="mb-2" style="color: #ffffff;"><?php _e( "La storia della scuola", "design_scuole_italia" ); ?></h2>
						<p style="color: #ffffff;"><?php echo dsi_get_option( "descrizione_scuola", "la_scuola" ); ?></p>
					</div><!-- /title-section -->
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row variable-gutters">
				<div class="col">

				<div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols splide history-carousel" data-bs-carousel-splide>
                	<div class="splide__track">
						<ul class="splide__list">				
							<?php
							foreach ( $timeline as $item ) {
								$timestamp = is_numeric($item["data_timeline"]) && (int)$item["data_timeline"] == $item["data_timeline"] ? $item["data_timeline"] : strtotime($item["data_timeline"]);
								?>							
								<li class="splide__slide">
									<div class="it-single-slide-wrapper h-100">	
										<div class="card card-img card-serif">
											<div class="card-body px-0">
												<h3 class="mb-1"><?php echo $item["titolo_timeline"] ?></h3>
												<span class="h5"><?php echo date_i18n("F Y", $timestamp); ?></span>
												<p class="mt-3"><?php echo $item["descrizione_timeline"] ?></p>
											</div><!-- /card-body -->
										</div><!-- /card -->
									</div><!-- /item -->
								</li>
								<?php
							}
							?>
						</ul>
				   	</div><!-- /carousel-calendar -->
				</div>
				<div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols splide year-carousel" data-bs-carousel-splide>
                  <div class="splide__track">
                    <ul class="splide__list">
					<?php
						foreach ( $timeline as $item ) {
							$timestamp = is_numeric($item["data_timeline"]) && (int)$item["data_timeline"] == $item["data_timeline"] ? $item["data_timeline"] : strtotime($item["data_timeline"]);
								?>	
							<li class="splide__slide">
								<div class="it-single-slide-wrapper dot-text h-100"><?php echo date_i18n("Y", $timestamp); ?></div>
							</li>
							<?php
						}
					?>
                    </ul>
                  </div>
                </div><!-- /carousel-year -->

				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
}// end timeline