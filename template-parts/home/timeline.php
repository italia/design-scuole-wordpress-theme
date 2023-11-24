<?php

// la storia
$timeline = dsi_get_option( "timeline", "la_scuola" );
if(is_array($timeline) && count($timeline) > 0) {
	?>
	<section class="section section-padding bg-blue-dark">
		<div class="container">
			<div class="row variable-gutters mt-0 mt-xl-2">
				<div class="col">
					<div class="title-section text-center mb-5">
						<h3 class="mb-2" style="color: #ffffff;"><?php _e( "La storia della scuola", "design_scuole_italia" ); ?></h3>
						<p style="color: #ffffff;"><?php echo dsi_get_option( "descrizione_scuola", "la_scuola" ); ?></p>
					</div><!-- /title-section -->
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row variable-gutters">
				<div class="col">


				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
}// end timeline