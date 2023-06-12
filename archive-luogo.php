<?php

/**
 * The template for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
global $luogo, $tipologia_luogo;
$mappa_primo_piano = dsi_get_option("posizione_mappa", "luoghi") === 'true' ? true : false;
?>
<main id="main-container" class="main-container redbrown">
    <?php get_template_part("template-parts/common/breadcrumb"); ?>

    <?php get_template_part("template-parts/hero/luoghi"); ?>

    <?php
    if ($mappa_primo_piano) {
        // recupero la lista delle tipologie
        $i = 0;
        $locations = [];
        $strutture_luoghi = dsi_get_option("strutture_luoghi", "luoghi");
        if ($strutture_luoghi) { ?>
            <section class="section bg-white section-map-wrapper">
                <div class="map-aside">
                    <?php foreach ($strutture_luoghi as $id_tipologia_luogo) {

                        $tipologia_luogo = get_term_by("id", $id_tipologia_luogo, "tipologia-luogo");
                        if (!is_wp_error($tipologia_luogo)) {
                            $luoghi = get_posts("post_type=luogo&tipologia-luogo=" . $tipologia_luogo->slug . "&posts_per_page=-1&orderby=post_parent&order=ASC");
                            if (is_array($luoghi) && count($luoghi) > 0) {
                    ?>
                                <h2 class="h3">
                                    <?php if (is_array($luoghi) && count($luoghi) > 1) {
                                        echo dsi_pluralize_string($tipologia_luogo->name);
                                    } else {
                                        echo $tipologia_luogo->name;
                                    } ?>
                                </h2>
                    <?php
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
            </section>
            <!-- /section -->
        <?php

            foreach ($locations as $location_key => $value) {
                foreach ($value as $place_key => $place) {
                    if (!$place['lat'] || !$place['lng']) {
                        $pos = dsi_multi_array_search($place['indirizzo'], $locations);
                        if ($pos) {
                            $locations[$pos][] = $place;
                            unset($locations[$location_key][$place_key]);
                            if (empty($locations[$location_key])) unset($locations[$location_key]);
                        }
                    }
                }
            }

            $locations = array_reverse($locations);
            $first = $locations[0];
        }
        ?>
        <script>
            window.addEventListener('load', function() {
                var mymap = L.map('map', {
                    zoomControl: true,
                    scrollWheelZoom: false
                }).setView([<?php echo $first[0]['lat'] ?>, <?php echo $first[0]['lng'] ?>], 13);

                let marker;
                <?php
                if (is_array($locations) && count($locations) > 0) {
                    // set markers is $location is not empty
                    $markers = [];
                    foreach ($locations as $location) {
                        $title = $links = [];
                        foreach ($location as $place) {
                            if ($place['lat'] && $place['lng']) {
                                $lat = $place['lat'];
                                $lng = $place['lng'];
                                $indirizzo = $place['indirizzo'];
                            }
                            $title[] = addslashes($place['title']);
                            $links[] = '<b><a href="' . $place['permalink'] . '">' . addslashes($place['title']) . '</a></b>';
                        }
                        $markers[] = '[' . $lat . "," . $lng . ']'; ?>
                        marker = L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>, {
                            title: '<?php echo implode("-", $title); ?>'
                        }]).addTo(mymap);
                        marker.bindPopup('<?php echo implode(", ", $links) ?><br><?php echo addslashes($indirizzo); ?>');
                <?php
                    }
                } ?>

                // add the OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '',
                    maxZoom: 18,
                }).addTo(mymap);

                var arrayOfMarkers = [<?php echo implode(",", $markers); ?>];
                var bounds = new L.LatLngBounds(arrayOfMarkers);
                mymap.fitBounds(bounds);
            });
        </script><?php
                } else {
                    // recupero la lista delle tipologie
                    $i = 0;
                    $strutture_luoghi = dsi_get_option("strutture_luoghi", "luoghi");
                    if ($strutture_luoghi) {
                        foreach ($strutture_luoghi as $id_tipologia_luogo) {

                            $tipologia_luogo = get_term_by("id", $id_tipologia_luogo, "tipologia-luogo");
                            if (!is_wp_error($tipologia_luogo)) {
                                $luoghi = get_posts("post_type=luogo&tipologia-luogo=" . $tipologia_luogo->slug . "&posts_per_page=-1&orderby=post_parent&order=ASC");
                                if (is_array($luoghi) && count($luoghi) > 0) {
                                    $i++;
                                    $classcolor = "bg-white";
                                    if ($i % 2)
                                        $classcolor = "bg-gray-light";

                    ?>
                        <section class="section <?php echo $classcolor; ?> py-4">
                            <div class="container">
                                <?php
                                    if (is_array($luoghi) && count($luoghi) > 0) {
                                ?>

                                    <div class="row variable-gutters mt-4">
                                        <div class="col-lg-10 offset-lg-1 mb-4">
                                            <h4 class="text-left mb-3">
                                                <a href="<?php echo get_term_link($tipologia_luogo); ?>"><?php if (is_array($luoghi) && count($luoghi) > 1) echo dsi_pluralize_string($tipologia_luogo->name);
                                                                                                            else echo $tipologia_luogo->name; ?></a>
                                            </h4>
                                        </div><!-- /col-lg-10 -->

                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="row variable-gutters">
                                                <?php foreach ($luoghi as $luogo) { ?>
                                                    <div class="col-lg-4 mb-4">
                                                        <?php get_template_part("template-parts/luogo/card", "ico"); ?>
                                                    </div><!-- /col-lg-4 -->
                                                <?php } ?>
                                            </div><!-- /row -->
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                <?php
                                    }
                                ?>
                            </div><!-- /container -->
                        </section><!-- /section -->
    <?php
                                }
                            }
                        }
                    }
                } ?>

</main>
<?php
get_footer();
