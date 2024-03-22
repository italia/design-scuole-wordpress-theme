<?php
global $luogo, $struttura, $c, $lg;

if (!$lg) $lg = 9;

if ($lg == 9) {
	$col1 = 5;
	$col2 = 7;
} else {
	$col1 = 6;
	$col2 = 6;
}

$card_title = $luogo->post_title;
$indirizzo = dsi_get_meta("indirizzo", '_dsi_luogo_', $luogo->ID);
$posizione_gps = dsi_get_meta("posizione_gps", '_dsi_luogo_', $luogo->ID);
$cap = dsi_get_meta("cap", '_dsi_luogo_', $luogo->ID);
$mail = dsi_get_meta("mail", '_dsi_luogo_', $luogo->ID);
$pec = dsi_get_meta("pec", '_dsi_luogo_', $luogo->ID);
$telefono = dsi_get_meta("telefono", '_dsi_luogo_', $luogo->ID);

// controllo se è un parent, in caso recupero i dati del genitore
if ($luogo->post_parent == 0) {
} else {
	$parent = get_post($luogo->post_parent);
	$card_title = $parent->post_title;
	if (!$indirizzo)  $indirizzo = dsi_get_meta("indirizzo", "_dsi_luogo_", $luogo->post_parent);
	if (!$posizione_gps["lat"] || !$posizione_gps["lng"]) $posizione_gps = dsi_get_meta("posizione_gps", "_dsi_luogo_", $luogo->post_parent);
	if (!$cap) $cap = dsi_get_meta("cap", "_dsi_luogo_", $luogo->post_parent);
	if (!$mail) $mail = dsi_get_meta("mail", "_dsi_luogo_", $luogo->post_parent);
	if (!$pec) $pec = dsi_get_meta("pec", "_dsi_luogo_", $luogo->post_parent);
	if (!$telefono) $telefono = dsi_get_meta("telefono", "_dsi_luogo_", $luogo->post_parent);
}

$orario_pubblico = dsi_get_meta("orario_pubblico", '_dsi_luogo_', $luogo->ID);

if (isset($struttura->ID) && dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID) != "")
	$telefono = dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID);

if (isset($struttura->ID) && dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID) != "")
	$mail = dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID);

if (isset($struttura->ID) && dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID) != "")
	$pec = dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID);

if (isset($struttura->ID) && dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID) != "")
	$pec = dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID);

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
<?php if ($luogo)  { ?>
	<div class="row variable-gutters">
		<div class="col-lg-<?php echo $lg; ?>">
			<div class="card card-bg rounded mb-5">
				<div class="card-header">
					<?php if (is_singular("luogo") && ($luogo->post_parent == 0)) { ?>
						<strong><?php echo $card_title; ?></strong>
					<?php } else if (is_singular("luogo") && ($luogo->post_parent > 0)) {
						// sono nel luogo child, stampo il nome e il link del parent
					?>
						<a href="<?php echo get_permalink($luogo->post_parent); ?>"><strong><?php echo get_the_title($luogo->post_parent); ?></strong></a>
					<?php
					} else { ?>
						<a href="<?php echo get_permalink($luogo); ?>"><strong><?php echo $luogo->post_title; ?></strong></a>
					<?php } ?>
				</div><!-- /card-header -->
				<div class="card-body p-0">
					<div class="row variable-gutters">
						<div class="col-lg-<?php echo $col1; ?> pr-0 pt-0 p-b0">
							<div class="map-wrapper">
								<div class="map" id="map_<?php echo $c; ?>"></div>
							</div>
						</div><!-- /col-lg-4 -->
						<div class="col-lg-<?php echo $col2; ?>">
							<div class="py-4">
								<ul class="location-list mt-2" data-element="places">
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
									<?php if (isset($mail) && $mail != "") { ?>
										<li>
											<div class="location-title">
												<span><?php _e("Email", "design_scuole_italia"); ?></span>
											</div>
											<div class="location-content">
												<p><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></p>
											</div>
										</li>
									<?php } ?>
									<?php if (isset($pec) && $pec != "") { ?>
										<li>
											<div class="location-title">
												<span><?php _e("PEC", "design_scuole_italia"); ?></span>
											</div>
											<div class="location-content">
												<p><a href="mailto:<?php echo $pec; ?>"><?php echo $pec; ?></a></p>
											</div>
										</li>
									<?php } ?>
									<?php
									if (isset($telefono) && $telefono != "") {
									?>
										<li>
											<div class="location-title">
												<span><?php _e("Telefono", "design_scuole_italia"); ?></span>
											</div>
											<div class="location-content">
												<p><?php echo "<a href='tel:+39$telefono'>$telefono</a>"; ?></p>
											</div>
										</li>
									<?php } ?>
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
									<li>
										<div class="location-title">
											<svg class="icon svg-marker-simple" style="width: 14px; height: 14px;">
												<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-marker-simple"></use>
											</svg>
										</div>
										<div class="location-content">
											<p>
												<a href="https://www.google.com/maps/dir/'<?php echo $posizione_gps["lat"]; ?>,<?php echo $posizione_gps["lng"]; ?>'/@<?php echo $posizione_gps["lat"]; ?>,<?php echo $posizione_gps["lng"]; ?>,15z?hl=it" target="_blank"><?php _e("Naviga su Google Map", "design_scuole_italia"); ?></a>
											</p>
										</div>
									</li>
								</ul><!-- /location-list -->
							</div>
						</div><!-- /col-lg-8 -->
					</div><!-- /row -->
				</div><!-- /card-body -->
			</div><!-- /card card-bg rounded -->
		</div><!-- /col-lg-9 -->
	</div><!-- /row -->
<?php } ?>
<?php if (!empty($posizione_gps["lat"])) : ?>
	<script>
		window.addEventListener('load', function() {
			var mymap = L.map('map_<?php echo $c; ?>', {
				zoomControl: false,
				scrollWheelZoom: false
			}).setView([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>], 15);

			L.marker([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>]).addTo(mymap);

			// add the OpenStreetMap tiles
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 18,
				attribution: ''
			}).addTo(mymap);
		});
	</script>
<?php endif; ?>
