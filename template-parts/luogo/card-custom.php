<?php
global $post;
$c=0;

$nome_luogo_custom = dsi_get_meta("nome_luogo_custom");
$posizione_gps =  dsi_get_meta("posizione_gps_luogo_custom");
$indirizzo_luogo_custom = dsi_get_meta("indirizzo_luogo_custom");
$arrq = array();
if(dsi_get_meta("quartiere_luogo_custom") != "")
	$arrq[]=dsi_get_meta("quartiere_luogo_custom");
if(dsi_get_meta("circoscrizione_luogo_custom") != "")
	$arrq[]=dsi_get_meta("circoscrizione_luogo_custom");
?>

<div class="card card-bg rounded mb-5">
	<div class="card-header">
		<strong class="d-block"><?php echo  $nome_luogo_custom; ?></strong>
		<small class="d-block"><?php echo  $indirizzo_luogo_custom; ?></small>
		<small class="d-block"><?php echo implode(" - ", $arrq);  ?></small>
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
    jQuery(function() {
        var map = L.map('map_<?php echo $c; ?>', {
            zoomControl: false,
            scrollWheelZoom: false
        }).setView([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>], 15);
        var marker = L.marker([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>]).addTo(map);

        var gl = L.mapboxGL({
            accessToken: '<?php echo dsi_get_mapbox_access_token(); ?>',
            style: 'https://api.maptiler.com/maps/streets/style.json?key=99Tr9Jg5CtfMvLFq4mfX'
        }).addTo(map);
    });

    /*var mymap = L.map('map_<?php echo $c; ?>', {
        zoomControl: false,
        scrollWheelZoom: false
    }).setView([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>], 15);
    var marker = L.marker([<?php echo $posizione_gps["lat"]; ?>, <?php echo $posizione_gps["lng"]; ?>]).addTo(mymap);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: '',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: '<?php echo dsi_get_mapbox_access_token(); ?>'
    }).addTo(mymap);*/
</script>
