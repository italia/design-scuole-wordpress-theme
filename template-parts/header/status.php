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
					<div class="col d-flex align-items-center justify-content-center">
						<p class="m-0"><strong><?php echo $desc_stato; ?></strong></p>
					</div><!-- /col -->
				</div><!-- /row -->
			</div><!-- /container -->
		</section><!-- /sub-nav -->
<?php
	}

}else if(is_singular("documento")){
    global $post;
    if($post->post_status == "annullato"){
        $motivo_annullamento = dsi_get_meta("motivo_annullamento");

        ?>
        <section class="bg-alert py-2" id="alert">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col d-flex align-items-center justify-content-center">
                        <p class="m-0"><strong><?php _e("Documento Annullato", "design_scuole_italia"); ?></strong>
                            <?php
                            if($motivo_annullamento != "")
                                echo ": ".$motivo_annullamento;
                            ?>
                        </p>
                    </div><!-- /col -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /sub-nav -->
<?php
    }else  if($post->post_status == "scaduto"){
        ?>
        <section class="bg-alert py-2" id="alert">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col d-flex align-items-center justify-content-center">
                        <p class="m-0"><strong><?php _e("Documento Scaduto", "design_scuole_italia"); ?></strong></p>
                    </div><!-- /col -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /sub-nav -->
        <?php
    }
}else if(is_singular("scheda_progetto")){
    $is_realizzato = dsi_get_meta("is_realizzato");
    if($is_realizzato == "true"){
        ?>
        <section class="bg-bluelectric py-2" id="alert">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col d-flex align-items-center">
                        <p class="m-0"><strong><?php _e("Progetto Realizzato", "design_scuole_italia"); ?></strong></p>
                    </div><!-- /col -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /sub-nav -->
        <?php
    }

}
