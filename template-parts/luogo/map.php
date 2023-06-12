<?php
$arr_luoghi = array();
$c = 0;
$luoghi = get_posts("post_type=luogo&posts_per_page=-1&post_parent=0");
foreach ($luoghi as $luogo) {
    $posizione_gps = dsi_get_meta("posizione_gps", "", $luogo->ID);
    if ($posizione_gps && $posizione_gps["lat"] && $posizione_gps["lng"]) {
        $indirizzo = dsi_get_meta("indirizzo", "", $luogo->ID);
        $arr_luoghi[$c]["post_title"] = $luogo->post_title;
        $arr_luoghi[$c]["permalink"] = get_permalink($luogo);
        $arr_luoghi[$c]["gps"] = $posizione_gps;
        $arr_luoghi[$c]["indirizzo"] = $indirizzo;
        $c++;
    }
}

if ($c) { ?>
    <section class="section section-map-full">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <div class="map-wrapper">
                <div class="map" id="map_all"></div>
            </div>
        </div>
    </section>
    <script>
        window.addEventListener('load', function() {
            var mymap = L.map('map_all', {
                zoomControl: true,
                scrollWheelZoom: false
            }).setView([<?php echo $arr_luoghi[0]["gps"]["lat"]; ?>, <?php echo $arr_luoghi[0]["gps"]["lng"]; ?>], 13);

            let marker;
            <?php foreach ($arr_luoghi as $marker) { ?>

                marker = L.marker([<?php echo $marker["gps"]["lat"]; ?>, <?php echo $marker["gps"]["lng"]; ?>, {
                    title: '<?php echo addslashes($marker["post_title"]); ?>'
                }]).addTo(mymap);
                marker.bindPopup('<b><a href="<?php echo $marker["permalink"] ?>"><?php echo addslashes($marker["post_title"]); ?></a></b><br><?php echo addslashes($marker["indirizzo"]); ?>');

            <?php } ?>

            // add the OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '',
                maxZoom: 18,
            }).addTo(mymap);

            var arrayOfMarkers = [<?php foreach ($arr_luoghi as $marker) { ?>[<?php echo $marker["gps"]["lat"]; ?>, <?php echo $marker["gps"]["lng"]; ?>], <?php } ?>];
            var bounds = new L.LatLngBounds(arrayOfMarkers);
            mymap.fitBounds(bounds);
        });
    </script>
<?php } ?>
