<?php

// la storia
$timeline = dsi_get_option( "timeline", "la_scuola" );
if(is_array($timeline) && count($timeline) > 0) {
	?>
	<section class="section section-padding bg-blue-dark">
		<div class="container">
			<div class="row variable-gutters mt-0 mt-xl-5">
				<div class="col">
					<div class="title-section text-center mb-5">
						<h3 class="mb-2" style="color: #ffffff;"><?php _e( "La Storia della scuola", "design_scuole_italia" ); ?></h3>
						<p style="color: #ffffff;"><?php echo dsi_get_option( "descrizione_scuola", "la_scuola" ); ?></p>
					</div><!-- /title-section -->
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row variable-gutters">
				<div class="col">

					<div class="owl-carousel carousel-theme carousel-calendar">
						<?php
						foreach ( $timeline as $item ) {
							?>
							<div class="item item-calendar">
								<div class="card card-img card-serif">
									<div class="card-body px-0">
										<h5><?php echo date_i18n("F Y", strtotime($item["data_timeline"])); ?></h5>
										<h3><?php echo $item["titolo_timeline"] ?></h3>
										<p><?php echo $item["descrizione_timeline"] ?></p>
									</div><!-- /card-body -->
								</div><!-- /card -->
							</div><!-- /item -->
							<?php
						}
						?>
					</div><!-- /carousel-calendar -->

					<div class="owl-carousel carousel-theme carousel-calendar-years">
						<?php
						foreach ( $timeline as $item ) {
							?>
							<div class="item item-calendar-year">
								<div class="dot-text">
									<span><?php echo date_i18n("Y", strtotime($item["data_timeline"])); ?></span>
								</div><!-- /dot-text -->
							</div><!-- /item -->
							<?php
						}
						?>
					</div><!-- /carousel-calendar-years -->
				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
}// end timeline