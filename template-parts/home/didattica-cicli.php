<?php
global $classe;
// recupero le scuole selezionate
$scuole_didattica = dsi_get_option("scuole_didattica", "didattica");
if(is_array($scuole_didattica) && count($scuole_didattica)>0) {
    ?>

    <section class="section section-padding py-0 bg-bluelectric section-tabs-bg">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col">
                    <div class="responsive-tabs-wrapper padding-top-200">
                        <div class="title-large">
                            <h3><?php _e("La didattica", "design_scuole_italia"); ?></h3>
                            <h4 class="text-white label-didattica"><?php _e("I servizi didattici offerti dalle scuole", "design_scuole_italia"); ?></h4>
                        </div><!-- /title-large -->
                        <div class="title-small">
                            <h5><?php _e("L'Istituto", "design_scuiole_italia"); ?></h5>
                            <p><?php _e("A.S.", "design_scuiole_italia"); ?> <?php echo dsi_convert_anno_scuola(dsi_get_current_anno_scolastico()) ; ?></p>

                        </div><!-- /title-section -->
                        <div class="tabs-img">
                            <img class="img-fluid" src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/didattica-mockup.png" title="<?php _e("La didattica", "design_scuole_italia"); ?>" alt="<?php _e("La didattica", "design_scuole_italia"); ?>">
                        </div>
                        <div class="responsive-tabs responsive-tabs-aside padding-bottom-200">
                            <ul>
                                <?php
                                foreach ($scuole_didattica as $idstruttura){
                                    $scuola = get_post($idstruttura);
                                    ?>
                                    <li><a href="#tab-<?php echo $idstruttura; ?>"><?php echo $scuola->post_title; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <?php
                            foreach ($scuole_didattica as $idstruttura) {
                                $scuola = get_post($idstruttura);

                                ?>
                                <div id="tab-<?php echo $idstruttura; ?>" class="responsive-tabs-content">
                                    <div class="accordion-large accordion-wrapper">

                                        <?php
                                        // recupero i percorsi di studi
                                        $percorsi = wp_get_object_terms($idstruttura, "percorsi-di-studio");
                                        if(is_array($percorsi) && count($percorsi)>0){
                                            foreach ($percorsi as $percorso){

                                                // per ogni percorso controllo che esista un servizio didattico con quel percorso di questa scuola
                                                $servizi_didattici = get_posts("post_type=servizio&tipologia-servizio=servizi-didattici&percorsi-di-studio=".$percorso->slug."&posts_per_page=-1&orderby=title&order=ASC");
                                                if($servizi_didattici){
                                                    foreach ($servizi_didattici as $servizio){
                                                        $descrizione = dsi_get_meta("descrizione", "", $servizio->ID);
                                                        $sottotitolo = dsi_get_meta("sottotitolo", "", $servizio->ID);
                                                        ?>
                                                        <hr/>
                                                        <div class="accordion-large-title accordion-header">
                                                            <h3><?php echo $servizio->post_title; ?></h3>
                                                            <p><small><?php echo $sottotitolo; ?></small></p>
                                                        </div><!-- /accordion-large-title -->
                                                        <div class="accordion-large-content accordion-content">
                                                            <?php echo wpautop($descrizione); ?>
                                                            <p><a href=""  class="btn btn-bluelectric" style="background-color:#0a00cb; text-decoration:none;"><?php _e("Vai alla scheda didattica", "design_scuole_italia"); ?></a> </p>
                                                        </div><!-- /accordion-large-content -->

                                                        <?php

                                                    }
                                                }
                                            }
                                        }else{
                                            echo '<div ><h5 class="text-white">';
                                            _e("Nessun percorso di studi associato a questa scuola.", "design_scuole_italia");
                                            echo '</h5></div>';
                                        }
                                        ?>

                                        <a class="btn btn-redbrown mt-4 mb-2" href="<?php echo get_permalink($idstruttura); ?>"><?php _e("Vai alla presentazione della Scuola", "design_scuole_italia"); ?></a>

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