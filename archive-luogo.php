<?php
/**
 * The template for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
global $luogo;

function multi_array_search($search_for, $search_in, $okey = false) {
    foreach ($search_in as $key => $element) {
        $key = $okey ? $okey : $key;
        if ( ($element === $search_for) || (is_array($element) && $key = multi_array_search($search_for, $element, $key)) ){
            return $key;
        }
    }
    return false;
}
?>
    <main id="main-container" class="main-container redbrown">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php get_template_part("template-parts/hero/luoghi"); ?>

        <?php
        // recupero la lista delle tipologie
        $i=0;
        $locations = $pippo = [];
        $strutture_luoghi = dsi_get_option("strutture_luoghi", "luoghi");
        if($strutture_luoghi) { ?>
            <section class="section bg-white section-map-wrapper">
                <div class="map-aside">
                <?php foreach ($strutture_luoghi as $id_tipologia_luogo) {

                    $tipologia_luogo = get_term_by("id", $id_tipologia_luogo, "tipologia-luogo");
                    if (!is_wp_error($tipologia_luogo)) {


                        $luoghi = get_posts("post_type=luogo&tipologia-luogo=" . $tipologia_luogo->slug . "&posts_per_page=-1&orderby=post_parent&order=ASC");
                        if (is_array($luoghi) && count($luoghi) > 0) {
                            ?><h3><?php if (count($luoghi) > 1) echo dsi_pluralize_string($tipologia_luogo->name); else echo $tipologia_luogo->name; ?></h3><?php
                             foreach ($luoghi as $luogo) {
                                 get_template_part("template-parts/luogo/card", "ico");
                             }
                        }
                    }
                } ?>
                </div>
                <div class="map-wrapper">
                    <div class="map" id="map"></div>
                </div>
            </section><!-- /section -->
            <?php
            //get_template_part("template-parts/luogo/map");

            foreach ($locations as $location_key => $value) {
                foreach ($value as $place_key => $place) {
                    if(!$place['lat'] || !$place['lng']) {
                        $pos = multi_array_search($place['indirizzo'], $locations);
                        if($pos) {
                            $locations[$pos][] = $place;
                            unset($locations[$location_key][$place_key]);
                            if(empty($locations[$location_key])) unset($locations[$location_key]);
                        }
                    }
                }
            }

            $first = array_pop(array_reverse($locations));
        }
        ?>
        <script>
            jQuery(function() {
                var mymap = L.map('map', {
                    zoomControl: true,
                    scrollWheelZoom: false
                }).setView([<?php echo $first[0]['lat'] ?>, <?php echo $first[0]['lng'] ?>], 13);

                <?php
                $markers = [];
                foreach ($locations as $location) {
                    $title = $links =[];
                    foreach ($location as $place) {
                        if($place['lat'] && $place['lng']) {
                            $lat = $place['lat'];
                            $lng = $place['lng'];
                            $indirizzo = $place['indirizzo'];
                        }
                        $title[] = htmlspecialchars($place['title']);
                        $links[] = '<b><a href="'.$place['permalink'].'">'.htmlspecialchars($place['title']).'</a></b>';
                    }
                    $markers[] = '[' . $lat . "," . $lng . ']'; ?>
                    var marker = L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>, {title: '<?php echo implode("-", $title); ?>'}]).addTo(mymap);
                    marker.bindPopup('<?php echo implode(", ", $links) ?><br><?php echo htmlspecialchars($indirizzo); ?>');
                    <?php
                }?>

                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                    attribution: '',
                    maxZoom: 18,
                    id: 'mapbox.streets',
                    accessToken: 'pk.eyJ1Ijoid2ViZ3JhZmlhIiwiYSI6ImNqdnMzdnl0azI0c3AzeWxlaThyaG8zN2kifQ.3oRpuS7XbsZp0o1sveLskQ'
                }).addTo(mymap);

                var arrayOfMarkers = [<?php echo implode(",", $markers); ?>];
                var bounds = new L.LatLngBounds(arrayOfMarkers);
                mymap.fitBounds(bounds);
            });
        </script>
    </main>
<?php
get_footer();
