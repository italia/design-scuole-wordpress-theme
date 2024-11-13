<?php
global $classe;
// recupero le scuole selezionate
$scuole_didattica = dsi_get_option("scuole_didattica", "didattica");
if (is_array($scuole_didattica) && count($scuole_didattica) > 0) {
?>

    <section class="section section-padding py-0 bg-bluelectric section-tabs-bg">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col">
                    <div class="responsive-tabs-wrapper padding-top-200">
                        <div class="title-large">
                            <?php get_template_part("template-parts/didattica/section-title") ?>
                            <p class="h4 text-white label-didattica"><?php _e("La nostra offerta formativa", "design_scuole_italia"); ?></p>
                        </div><!-- /title-large -->
                        <div class="title-small">
                            <div class="h5"><?php
                                            // se sono più strutture è un istituto, altrimenti una scuola
                                            if (is_array($scuole_didattica) && count($scuole_didattica) == 1)
                                                _e("La scuola", "design_scuole_italia");
                                            else
                                                _e("L'Istituto", "design_scuole_italia"); ?></div>
                            <p><?php _e("A.S.", "design_scuole_italia"); ?> <?php echo dsi_convert_anno_scuola(dsi_get_current_anno_scolastico()); ?></p>

                        </div><!-- /title-section -->
                        <div class="tabs-img">
                            <img class="img-fluid" src="<?php echo  get_template_directory_uri(); ?>/assets/img/didattica-mockup.png" alt="">
                        </div>
                        <div class="responsive-tabs responsive-tabs-aside padding-bottom-200">
                            <ul>
                                <?php
                                foreach ($scuole_didattica as $idstruttura) {
                                    $scuola = get_post($idstruttura);
                                ?>
                                    <li><a href="#tab-<?php echo $idstruttura; ?>"><?php echo $scuola->post_title; ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                            <?php
                            $c = 0;
                            foreach ($scuole_didattica as $idstruttura) {
                                $scuola = get_post($idstruttura);

                            ?>
                                <div id="tab-<?php echo $idstruttura; ?>" class="responsive-tabs-content">
                                    <div class="accordion-large accordion-wrapper">

                                        <?php
                                        // recupero i percorsi di studio
                                        $indirizzi = dsi_get_meta("link_servizi_didattici", "", $idstruttura);
                                        if ($indirizzi) {
                                            foreach ($indirizzi as $idindirizzo) {
                                                $indirizzo = get_post($idindirizzo);
                                                if ($indirizzo && 'trash' !== get_post_status($idindirizzo)) {
                                                    $descrizione = dsi_get_meta("descrizione", "", $indirizzo->ID);
                                                    $sottotitolo = dsi_get_meta("sottotitolo", "", $indirizzo->ID);
                                        ?>
                                                    <hr />
                                                    <div class="accordion-large-title accordion-header">
                                                        <?php
                                                        if (is_home()) {
                                                        ?>
                                                            <h3><a href="javascript:void(0)"><?php echo $indirizzo->post_title; ?></a></h3>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <h2><a href="javascript:void(0)"><?php echo $indirizzo->post_title; ?></a></h2>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div><!-- /accordion-large-title -->
                                                    <div tabindex="0" class="accordion-large-content accordion-content">
                                                        <?php echo wpautop($descrizione); ?>
                                                        <p><a href="<?php echo get_permalink($indirizzo); ?>"
                                                                class="btn btn-bluelectric"
                                                                style="background-color:#0a00cb; text-decoration:none;"><?php _e("Per saperne di più", "design_scuole_italia"); ?></a>
                                                        </p>
                                                    </div><!-- /accordion-large-content -->

                                        <?php
                                                }
                                            }
                                        } else {
                                            echo '<div ><h5 class="text-white">';
                                            _e("Nessun indirizzo di studi associato a questa scuola.", "design_scuole_italia");
                                            echo '</h5></div>';
                                        }
                                        ?>

                                        <div class="text-center text-sm-left">
                                            <a class="btn btn-redbrown mt-4 mb-2" href="<?php echo get_permalink($idstruttura); ?>"><?php _e("Vai alla presentazione della scuola", "design_scuole_italia"); ?></a>
                                        </div>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div><!-- /responsive-tabs -->
                    </div><!-- /responsive-tabs-wrapper -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->

<?php
}
