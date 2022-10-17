<?php
global $luogo, $struttura, $c, $lg;

if(!$lg) $lg = 9;

if($lg == 9){
    $col1=5;
    $col2=7;
}else{
    $col1=6;
    $col2=6;
}

$card_title = $luogo->post_title;
$indirizzo = dsi_get_meta("indirizzo", '_dsi_luogo_', $luogo->ID);
$posizione_gps = dsi_get_meta("posizione_gps", '_dsi_luogo_', $luogo->ID);
$cap = dsi_get_meta("cap", '_dsi_luogo_', $luogo->ID);
$mail = dsi_get_meta("mail", '_dsi_luogo_', $luogo->ID);
$pec = dsi_get_meta("pec", '_dsi_luogo_', $luogo->ID);
$telefono = dsi_get_meta("telefono", '_dsi_luogo_', $luogo->ID);

// controllo se è un parent, in caso recupero i dati del genitore
if($luogo->post_parent == 0){
	
}else{
	$parent = get_post($luogo->post_parent);
	$card_title = $parent->post_title;
	if(!$indirizzo)	$indirizzo = dsi_get_meta("indirizzo", "_dsi_luogo_", $luogo->post_parent);
	if(!$posizione_gps["lat"] || !$posizione_gps["lng"]) $posizione_gps = dsi_get_meta("posizione_gps", "_dsi_luogo_", $luogo->post_parent);
	if(!$cap) $cap = dsi_get_meta("cap", "_dsi_luogo_", $luogo->post_parent);
	if(!$mail) $mail = dsi_get_meta("mail", "_dsi_luogo_", $luogo->post_parent);
	if(!$pec) $pec = dsi_get_meta("pec", "_dsi_luogo_", $luogo->post_parent);
	if(!$telefono) $telefono = dsi_get_meta("telefono", "_dsi_luogo_", $luogo->post_parent);
}

$orario_pubblico = dsi_get_meta("orario_pubblico", '_dsi_luogo_', $luogo->ID);

if(isset($struttura->ID) && dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID) != "")
	$telefono = dsi_get_meta("telefono", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID) && dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID) != "")
	$mail = dsi_get_meta("mail", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID) && dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID) != "")
$pec = dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID) && dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID) != "")
	$pec = dsi_get_meta("pec", '_dsi_struttura_', $struttura->ID);

if(isset($struttura->ID)){
	$arr_persone = dsi_get_meta("persone", '_dsi_struttura_', $struttura->ID);
	$persone = "";
	if(is_array($arr_persone)){
		foreach ($arr_persone as $id_persona){
			$persone .= dsi_get_display_name( $id_persona)." ";
		}
    }

}
?>

<div class="row variable-gutters">
	<div class="col-lg-<?php echo $lg; ?>">
		<div class="card rounded mb-5">
			<div class="card-header">
                <?php if(is_singular("luogo") && ($luogo->post_parent == 0)){ ?>
                    <strong><?php echo $card_title; ?></strong>
                <?php }else if(is_singular("luogo") && ($luogo->post_parent > 0)){
                    // sono nel luogo child, stampo il nome e il link del parent
                    ?>
                    <a href="<?php echo get_permalink($luogo->post_parent); ?>"><strong><?php echo get_the_title($luogo->post_parent); ?></strong></a>
                    <?php
                } else { ?>
                    <a href="<?php echo get_permalink($luogo); ?>"><strong><?php echo $luogo->post_title; ?></strong></a>
                <?php } ?>
			</div><!-- /card-header -->
			
		</div><!-- /card card-bg rounded -->
	</div><!-- /col-lg-9 -->
</div><!-- /row -->

<?php if(!empty($posizione_gps["lat"])): ?>
    <script>
        jQuery(function() {
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
