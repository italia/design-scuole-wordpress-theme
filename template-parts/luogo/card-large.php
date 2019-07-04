<?php
global $luogo, $struttura, $c;
$indirizzo = dsi_get_meta("indirizzo", '_dsi_luogo_', $luogo->ID);
$cap = dsi_get_meta("cap", '_dsi_luogo_', $luogo->ID);
$orario_pubblico = dsi_get_meta("orario_pubblico", '_dsi_luogo_', $luogo->ID);

$telefono = dsi_get_meta("telefono", '_dsi_luogo_', $luogo->ID);
if(isset($struttura->ID) && dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID) != "")
	$telefono = dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID);

$mail = dsi_get_meta("mail", '_dsi_luogo_', $luogo->ID);
if(isset($struttura->ID) && dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID) != "")
	$mail = dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID) && dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID) != "")
	$pec = dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID)){
	$arr_persone = dsi_get_meta("persone", '_dsi_struttura_', $struttura->ID);
	$persone = "";
	if(is_array($arr_persone)){
		foreach ($arr_persone as $id_persona){
			$utente = get_user_by("id", $id_persona);
			$persone .= $utente->display_name." ";
		}
	}

}



$posizione_gps = dsi_get_meta("posizione_gps", '_dsi_luogo_', $luogo->ID);



?>
<div class="card card-bg rounded mb-5">
	<div class="card-header">
		<strong class="d-block"><?php echo $luogo->post_title; ?></strong>
		<small class="d-block"><?php echo wpautop($indirizzo); ?></small>
		<!-- <small class="d-block">Quartiere Tufello - 4° Circoscrizione</small> //-->
	</div><!-- /card-header -->
	<div class="card-body p-0">
		<div class="row variable-gutters">
			<div class="col-lg-12">
				<div class="map-wrapper map-min-height">
					<div class="map" id="map_<?php echo $c; ?>"></div>
				</div>
			</div><!-- /col-lg-12 -->
		</div><!-- /row -->
	</div><!-- /card-body -->
</div><!-- /card card-bg rounded -->


<script>
    var mymap = L.map('map_<?php echo $c; ?>', {
        zoomControl: false,
        scrollWheelZoom: false
    }).setView([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>], 15);
    var marker = L.marker([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>]).addTo(mymap);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: '',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: '<?php echo dsi_get_mapbox_access_token(); ?>'
    }).addTo(mymap);
</script>
