<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
global $luogo;
?>
    <main id="main-container" class="main-container redbrown">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php
        get_template_part("template-parts/home/hero", "luoghi");
        $arr_luoghi = array();
        $c=0;
        // recupero la lista delle strutture
        $i=0;
        $strutture_luoghi = dsi_get_option("strutture_luoghi", "luoghi");
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
                                        <div class="col-lg-3  mb-4">
                                            <h4 class="text-lg-right mb-3">
                                                <a href="<?php echo get_term_link($tipologia_luogo); ?>"><?php echo $tipologia_luogo->name; ?></a>
                                            </h4>
                                        </div><!-- /col-lg-3 -->
                                        <div class="col-lg-9">
                                            <div class="row variable-gutters">
                                                <?php
                                                foreach ($luoghi as $luogo) {

                                                    $posizione_gps = dsi_get_meta("posizione_gps", "", $luogo->ID);
                                                    if($posizione_gps){
                                                        $indirizzo = dsi_get_meta("indirizzo", "", $luogo->ID);
                                                        $arr_luoghi[$c]["post_title"] = $luogo->post_title;
                                                        $arr_luoghi[$c]["permalink"] = get_permalink($luogo);
                                                        $arr_luoghi[$c]["gps"] = $posizione_gps;
                                                        $arr_luoghi[$c]["indirizzo"] = $indirizzo;
                                                        $c++;
                                                    }

                                                    ?>
                                                    <div class="col-lg-4 mb-4">
                                                        <?php get_template_part("template-parts/luogo/card", "ico"); ?>
                                                    </div><!-- /col-lg-4 -->
                                                    <?php
                                                }
                                                ?>
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
        ?>

        <?php if($c) { ?>
            <section class="section section-map">
                <div class="container d-flex justify-content-between align-items-center py-3">
                    <div class="map-wrapper">
                        <div class="map" id="map_all"></div>
                    </div>
                </div>
            </section>
            <script>
                var mymap = L.map('map_all', {
                    zoomControl: false,
                    scrollWheelZoom: false
                }).setView([<?php echo $arr_luoghi[0]["gps"]["lat"]; ?>, <?php echo $arr_luoghi[0]["gps"]["lng"]; ?>], 13);

                <?php foreach ($arr_luoghi as $marker){ ?>

                var marker = L.marker([<?php echo $marker["gps"]["lat"]; ?>, <?php echo $marker["gps"]["lng"]; ?>, { title: '<?php echo $marker["post_title"]; ?>'}]).addTo(mymap);
                marker.bindPopup('<b><a href="<?php echo $marker["permalink"] ?>"><?php echo $marker["post_title"]; ?></a></b><br><?php echo $marker["indirizzo"]; ?>');

                <?php } ?>

                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                    attribution: '',
                    maxZoom: 18,
                    id: 'mapbox.streets',
                    accessToken: '<?php echo dsi_get_mapbox_access_token(); ?>'
                }).addTo(mymap);

            </script>

        <?php } ?>
    </main>

<?php
get_footer();
