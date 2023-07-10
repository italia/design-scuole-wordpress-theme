<?php
global $luogo, $struttura, $c;


// controllo se è un parent, in caso recupero i dati del genitore
if ($luogo->post_parent == 0) {
	$card_title = $luogo->post_title;
	$indirizzo = dsi_get_meta("indirizzo", '_dsi_luogo_', $luogo->ID);
	$posizione_gps = dsi_get_meta("posizione_gps", '_dsi_luogo_', $luogo->ID);
	$cap = dsi_get_meta("cap", '_dsi_luogo_', $luogo->ID);
	//$mail = dsi_get_meta("mail", '_dsi_luogo_', $luogo->ID);
	//$telefono = dsi_get_meta("telefono", '_dsi_luogo_', $luogo->ID);
} else {
	$parent = get_post($luogo->post_parent);
	$card_title = $parent->post_title;
	$indirizzo = dsi_get_meta("indirizzo", "_dsi_luogo_", $luogo->post_parent);
	$posizione_gps = dsi_get_meta("posizione_gps", "_dsi_luogo_", $luogo->post_parent);
	$cap = dsi_get_meta("cap", "_dsi_luogo_", $luogo->post_parent);
	//$mail = dsi_get_meta("mail", "_dsi_luogo_", $luogo->post_parent);
	//$telefono = dsi_get_meta("telefono", "_dsi_luogo_", $luogo->post_parent);
}

$orario_pubblico = dsi_get_meta("orario_pubblico", '_dsi_luogo_', $luogo->ID);
/*
if(isset($struttura->ID) && dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID) != "")
	$telefono = dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID) && dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID) != "")
	$mail = dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID) && dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID) != "")
	$pec = dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID);
*/
if (isset($struttura->ID)) {
	$arr_persone = dsi_get_meta("persone", '_dsi_struttura_', $struttura->ID);
	$persone = "";
	if (is_array($arr_persone)) {
		foreach ($arr_persone as $id_persona) {
			$persone .= dsi_get_display_name($id_persona) . " ";
		}
	}
}
?>

<div class="row variable-gutters">
	<div class="col-lg-9">
		<div class="card card-bg rounded mb-5">
			<div class="card-header">
				<?php if (is_singular("luogo")) { ?>
					<strong><?php echo $card_title; ?></strong>
				<?php } else { ?>
					<a href="<?php echo get_permalink($luogo); ?>"><strong><?php echo $luogo->post_title; ?></strong></a>
				<?php } ?>
			</div><!-- /card-header -->
			<div class="card-body p-0">
				<div class="row variable-gutters">
					<div class="col-lg-5 pr-0 pt-0 p-b0">
						<div class="map-wrapper">
							<div class="map" id="map_<?php echo $c; ?>"></div>
						</div>
					</div><!-- /col-lg-4 -->
					<div class="col-lg-7">
						<div class="py-4">
							<ul class="location-list mt-2">
								<?php if (isset($indirizzo) && $indirizzo != "") { ?>
									<li>
										<div class="location-title">
											<span><?php _e("indirizzo", "design_scuole_italia"); ?></span>
										</div>
										<div class="location-content">
											<?php echo wpautop($indirizzo); ?>
										</div>
									</li>
								<?php } ?>
								<?php if (isset($cap) && $cap != "") { ?>
									<li>
										<div class="location-title">
											<span><?php _e("CAP", "design_scuole_italia"); ?></span>
										</div>
										<div class="location-content">
											<p><?php echo $cap; ?></p>
										</div>
									</li>
								<?php } ?>
								<?php if (isset($orario_pubblico) && $orario_pubblico != "") { ?>
									<li>
										<div class="location-title">
											<span><?php _e("Orari", "design_scuole_italia"); ?></span>
										</div>
										<div class="location-content">
											<?php echo wpautop($orario_pubblico); ?>
										</div>
									</li>
								<?php } ?>
								<?php /* if(isset($mail) && $mail != ""){ ?>
									<li>
										<div class="location-title">
											<span><?php _e( "Email", "design_scuole_italia" ); ?></span>
										</div>
										<div class="location-content">
											<p><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></p>
										</div>
									</li>
								<?php } ?>
								<?php if(isset($pec) && $pec != ""){ ?>
									<li>
										<div class="location-title">
											<span><?php _e( "PEC", "design_scuole_italia" ); ?></span>
										</div>
										<div class="location-content">
											<p><a href="mailto:<?php echo $pec; ?>"><?php echo $pec; ?></a></p>
										</div>
									</li>
								<?php } ?>
								<?php
                                if(isset($telefono) && $telefono != ""){
	                                ?>
									<li>
										<div class="location-title">
											<span><?php _e( "Telefono", "design_scuole_italia" ); ?></span>
										</div>
										<div class="location-content">
											<p><?php echo $telefono; ?></p>
										</div>
									</li>
								<?php } */ ?>
								<?php if (isset($persone) && $persone != "") { ?>
									<li>
										<div class="location-title">
											<span><?php _e("Rif.", "design_scuole_italia"); ?></span>
										</div>
										<div class="location-content">
											<p><?php echo $persone; ?></p>
										</div>
									</li>
								<?php } ?>
							</ul><!-- /location-list -->
						</div>
					</div><!-- /col-lg-8 -->
				</div><!-- /row -->
			</div><!-- /card-body -->
		</div><!-- /card card-bg rounded -->
	</div><!-- /col-lg-9 -->
</div><!-- /row -->
<script>
	window.addEventListener('load', function() {
		var mymap = L.map('map_<?php echo $c; ?>', {
			zoomControl: false,
			scrollWheelZoom: false
		}).setView([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>], 15);
		L.marker([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>]).addTo(mymap);

		// add the OpenStreetMap tiles
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '',
			maxZoom: 18,
		}).addTo(mymap);
	});
</script>
