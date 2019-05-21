<?php
if(is_singular("servizio")){
// controllo se il servizio è disabilitato

	$stato = dsi_get_meta("stato");
	if($stato == "false"){
		$desc_stato = dsi_get_meta("desc_stato");
		?>
		<section class="bg-alert py-2" id="alert">
			<div class="container">
				<div class="row variable-gutters">
					<div class="col d-flex align-items-center">
						<p class="m-0"><strong><?php echo $desc_stato; ?></strong></p>
					</div><!-- /col -->
				</div><!-- /row -->
			</div><!-- /container -->
		</section><!-- /sub-nav -->
<?php
	}

}
