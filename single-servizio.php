<?php
/**
 * Servizio template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>


    <main id="main-container" class="main-container purplelight">

        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <?php
        while ( have_posts() ) :
            the_post();

            // get all post meta cmb2
         //   $percorsi = dsi_get_percorsi_of_scuola($post);
            // print_r($percorsi);
            //$sottotitolo = dsi_get_meta("sottotitolo");
            $esito = dsi_get_meta("esito");
            $descrizione = dsi_get_meta("descrizione");
            $come_si_fa = dsi_get_meta("come_si_fa");
            $procedura_esito = dsi_get_meta("procedura_esito");
            $canale_digitale = dsi_get_meta("canale_digitale");
            $canale_digitale_label = dsi_get_meta("canale_digitale_label");
            $canale_digitale_link = dsi_get_meta("canale_digitale_link");

            $autenticazione = dsi_get_meta("autenticazione");
            $spid = dsi_get_meta("spid");
            //$canale_fisico = dsi_get_meta("canale_fisico");
          //  $canale_fisico_prenotazione = dsi_get_meta("canale_fisico_prenotazione");
            //$sedi = dsi_get_meta("sedi");
            $cosa_serve = dsi_get_meta("cosa_serve");
            $cosa_serve_list = dsi_get_meta("cosa_serve_list");

            $fasi_scadenze = dsi_get_meta("fasi_scadenze");
            $casi_particolari = dsi_get_meta("casi_particolari");
            $link_schede_documenti = dsi_get_meta("link_schede_documenti");
            $file_documenti = dsi_get_meta("file_documenti");
            $altre_info = dsi_get_meta("altre_info");

            $struttura_responsabile = dsi_get_meta("struttura_responsabile");
            $scuola_responsabile = dsi_get_meta("scuola_responsabile");

            $luoghi = dsi_get_meta("luoghi");


            $servizi_correlati = dsi_get_meta("servizi_correlati");
            $mail = dsi_get_meta("mail");
            $telefono = dsi_get_meta("telefono");
            ?>
            <section class="section bg-white py-2 py-lg-3 py-xl-5">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-12 col-sm-3 col-lg-2 d-none d-sm-block">
                            <div class="section-thumb mx-3">
                                <?php
                                if(has_post_thumbnail($post)){
                                    echo "<img src='".get_the_post_thumbnail_url($post, "item-thumb")."'>";
                                }
                                ?>
                            </div><!-- /section-thumb -->
                        </div><!-- /col-lg-2 -->
                        <div class="col-12 col-sm-9 col-lg-5 col-md-8">
                            <?php
                                if($scuola_responsabile) {
                                    ?>
                                    <small class="h6 text-purplelight text-uppercase"><?php echo get_the_title($scuola_responsabile); ?></small>
                                    <?php
                                }
                                    ?>
                            <div class="section-title">
                                <h2 class="mb-3"><?php the_title(); ?></h2>

                                <?php echo wpautop($descrizione); ?>

                            </div><!-- /title-section -->
                            <div class="article-description-mobile">

                            </div><!-- /article-description-mobile -->
                        </div><!-- /col-lg-5 col-md-8 -->

                        <div class="col-lg-3 col-md-4 offset-lg-1">
                            <?php get_template_part("template-parts/single/actions"); ?>
                            <?php get_template_part("template-parts/common/badges-argomenti"); ?>
                        </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section><!-- /section -->

            <?php get_template_part("template-parts/header/status"); ?>

            <section class="section bg-white">
                <div class="container container-border-top">
                    <div class="row variable-gutters">
                        <div class="col-lg-3 col-md-4 aside-border px-0">
                            <aside class="aside-main aside-sticky">
                                <div class="aside-title">
                                    <a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi" role="button" aria-expanded="true" aria-controls="lista-paragrafi">
                                        <span><?php _e("Indice della pagina", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-descrizione" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Cos'è", "design_scuole_italia"); ?>"><?php _e("Cos'è", "design_scuole_italia"); ?></a>
                                        </li>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-accedi" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Come si accede al servizio", "design_scuole_italia"); ?>"><?php _e("Come si accede al servizio", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php if(($cosa_serve) || (is_array($cosa_serve_list))) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-cosa-serve" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Cosa serve", "design_scuole_italia"); ?>"><?php _e("Cosa serve", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if(is_array($fasi_scadenze) && count($fasi_scadenze)>0) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-tempi-scadenze" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Tempi e scadenze", "design_scuole_italia"); ?>"><?php _e("Tempi e scadenze", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php  if(trim($casi_particolari) != ""){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-casi-particolari" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Casi particolari", "design_scuole_italia"); ?>"><?php _e("Casi particolari", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if(trim($altre_info) != ""){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-altre-info" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Ulteriori informazioni", "design_scuole_italia"); ?>"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php
                                        if($telefono || $mail){
                                            ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-contatti" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Contatti", "design_scuole_italia"); ?>"><?php _e("Contatti", "design_scuole_italia"); ?></a>
                                            </li>

                                            <?php
                                        }
                                        ?>
                                        <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-documenti" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Documenti", "design_scuole_italia"); ?>"><?php _e("Documenti", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </aside>

                        </div>
                        <div class="main-content col-lg-8 col-md-8 offset-lg-1 pt84">
                            <article class="article-wrapper">
                                <h4 id="art-par-descrizione"><?php _e("Cos'è", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="article-description wysiwig-text">
                                            <?php the_content(); ?>
                                        </div>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php
                                // $esito = "";
                                if(trim($esito) != ""){
                                    ?>
                                    <h6><?php _e("A cosa serve", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($esito); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <h4 id="art-par-accedi"><?php _e("Come si accede al servizio", "design_scuole_italia"); ?></h4>
                                <?php
                                if(trim($come_si_fa) != ""){
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($come_si_fa); ?>
                                            <?php /* if(trim($canale_fisico_prenotazione) != ""){  ?>
                                                <div class="btn-wrapper mb-5">
                                                    <a class="btn btn-purplelight" href="<?php echo $canale_fisico_prenotazione; ?>"><?php _e("Prenota", "design_scuole_italia"); ?></a>
                                                </div>
                                            <?php } */ ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                if(trim($procedura_esito) != ""){
                                    ?>
                                    <h6><?php _e("Procedure collegate all'esito", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($procedura_esito); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                if((trim($canale_digitale) != "") || (trim($canale_digitale_link) != "")) {
                                    ?>
                                    <h6><?php _e("Servizio online", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($canale_digitale); ?>
                                            <?php if(trim($canale_digitale_link) != ""){  ?>
                                                <div class="btn-wrapper mb-5">
                                                    <a class="btn btn-purplelight" href="<?php echo $canale_digitale_link; ?>"><?php echo $canale_digitale_label; ?></a>
                                                </div>
                                            <?php } ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                if(trim($autenticazione) != ""){
                                    ?>
                                    <h6><?php _e("Autenticazione", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo apply_filters("the_content", $autenticazione); ?>
                                        </div><!-- /col-lg-9 -->
                                        <?php  if($spid){ ?>
                                            <div class="col-lg-3">
                                                <div class="note">
                                                    <svg width="100%" height="100%" viewBox="0 0 68 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><rect x="0" y="0" width="68" height="34" style="fill:none;"/><g id="Group-8"><path id="XMLID_10_" d="M14.583,12.178c-2.957,-0.389 -5.026,-0.584 -6.207,-0.584c-1.18,0 -1.944,0.111 -2.291,0.32c-0.347,0.208 -0.514,0.555 -0.514,1.013c0,0.459 0.237,0.792 0.695,0.972c0.458,0.181 1.652,0.445 3.582,0.792c1.917,0.347 3.291,0.916 4.097,1.694c0.805,0.792 1.222,2.069 1.222,3.833c0,3.86 -2.403,5.79 -7.193,5.79c-1.569,0 -3.486,-0.208 -5.721,-0.639l-1.139,-0.208l0.139,-4.013c2.958,0.389 5.013,0.569 6.179,0.569c1.153,0 1.944,-0.111 2.361,-0.333c0.416,-0.222 0.625,-0.569 0.625,-1.014c0,-0.444 -0.223,-0.791 -0.667,-0.999c-0.444,-0.209 -1.583,-0.473 -3.43,-0.792c-1.847,-0.305 -3.221,-0.833 -4.138,-1.569c-0.916,-0.75 -1.374,-2.069 -1.374,-3.958c0,-1.902 0.638,-3.332 1.93,-4.29c1.291,-0.972 2.944,-1.444 4.971,-1.444c1.402,0 3.333,0.222 5.763,0.68l1.18,0.208l-0.07,3.972Z" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_73_" d="M18.658,33.159l0,-25.411l4.763,0l0,0.972c1.555,-0.93 2.916,-1.402 4.082,-1.402c2.403,0 4.18,0.722 5.333,2.166c1.138,1.444 1.721,3.888 1.721,7.359c0,3.458 -0.638,5.86 -1.902,7.207c-1.264,1.347 -3.346,2.027 -6.221,2.027c-0.791,0 -1.638,-0.069 -2.541,-0.208l-0.43,-0.069l0,7.373l-4.805,0l0,-0.014Zm7.915,-21.537c-0.889,0 -1.777,0.181 -2.68,0.542l-0.43,0.18l0,9.359c1.069,0.139 1.944,0.209 2.61,0.209c1.389,0 2.333,-0.403 2.847,-1.222c0.513,-0.806 0.763,-2.194 0.763,-4.152c0,-3.277 -1.041,-4.916 -3.11,-4.916Z" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_70_" d="M67.191,0.827l0,25.05l-4.762,0l0,-0.75c-1.667,0.792 -3.111,1.181 -4.333,1.181c-2.597,0 -4.416,-0.75 -5.443,-2.25c-1.028,-1.5 -1.542,-3.888 -1.542,-7.137c0,-3.264 0.611,-5.624 1.847,-7.124c1.222,-1.486 3.083,-2.235 5.569,-2.235c0.763,0 1.819,0.124 3.179,0.361l0.681,0.138l0,-7.234l4.804,0Zm-5.304,20.759l0.5,-0.111l0,-9.414c-1.305,-0.236 -2.486,-0.361 -3.513,-0.361c-1.93,0 -2.902,1.721 -2.902,5.151c0,1.861 0.208,3.18 0.638,3.972c0.431,0.791 1.139,1.18 2.125,1.18c1.014,0.014 2.055,-0.139 3.152,-0.417Z" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_5_" d="M43.198,18.488c-1.471,0 -2.693,-0.5 -3.638,-1.5c-0.958,-1 -1.43,-2.236 -1.43,-3.707c0,-1.486 0.472,-2.708 1.416,-3.68c0.945,-0.972 2.167,-1.472 3.639,-1.472c1.471,0 2.68,0.5 3.596,1.5c0.93,0.999 1.389,2.235 1.389,3.707c0,1.472 -0.459,2.694 -1.389,3.68c-0.916,0.986 -2.111,1.472 -3.583,1.472" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_4_" d="M38.13,25.451c0,-1.486 0.472,-2.708 1.416,-3.68c0.945,-0.972 2.167,-1.472 3.639,-1.472c1.471,0 2.68,0.5 3.596,1.5c0.93,0.999 1.389,2.235 1.389,3.707" style="fill:#06c;fill-rule:nonzero;"/></g></svg>
                                                    <p><?php _e("Non hai SPID?", "design_scuole_italia"); ?><br/><a href="https://www.spid.gov.it">Scopri di più</a>.</p>
                                                </div>
                                            </div><!-- /col-lg-3 -->
                                        <?php } ?>
                                    </div><!-- /row -->

                                    <?php
                                }


                                ?>
                                <?php if($servizi_correlati){ ?>
                                    <h6><?php _e("Servizi correlati", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php foreach ($servizi_correlati as $idservizio){
                                                    $servizio = get_post($idservizio);
                                                    get_template_part("template-parts/servizio/card");
                                                } ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                <?php  }


                                if(is_array($luoghi) && count($luoghi) > 0){
                                    global $luogo;
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <h6><?php _e("Luoghi in cui viene erogato il servizio", "design_scuole_italia"); ?></h6>
                                            <?php
                                            $c=0;
                                            foreach ($luoghi as $idluogo){
                                                $c++;
                                                $luogo = get_post($idluogo);
                                                get_template_part( "template-parts/luogo/card" , "nophone");
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }


                                if(($cosa_serve) || (is_array($cosa_serve_list))) {
                                    ?>
                                    <h4 id="art-par-cosa-serve"><?php _e( "Cosa serve", "design_scuole_italia" ); ?></h4>

                                    <div class="row variable-gutters mb-2 pb-2">
                                        <div class="col-lg-9">
                                            <div class="col-lg-12  px-0 wysiwig-text">
                                            <?php echo apply_filters("the_content", $cosa_serve); ?>
                                            </div>
                                            <?php if(is_array($cosa_serve_list)) {
                                                ?>
                                                <div class="card card-bg bg-color rounded mb-3">
                                                    <div class="card-body pb-0">
                                                        <ul>
                                                            <?php
                                                            foreach ($cosa_serve_list as $cosa_serve_item){
                                                                echo "<li>".$cosa_serve_item."</li>";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>

                                <?php

                                // print_r($fasi_scadenze);
                                if(is_array($fasi_scadenze) && count($fasi_scadenze)>0) {
                                    ?>
                                    <h4 id="art-par-tempi-scadenze"><?php _e("Tempi e scadenze", "design_scuole_italia"); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="calendar-vertical mb-5">
                                                <?php
                                                foreach ($fasi_scadenze as $fase){
                                                    $arrdata =  explode("-", $fase["data_fase"]);
                                                    $monthName = date_i18n('M', mktime(0, 0, 0, $arrdata[1], 10)); // March

                                                    ?>
                                                    <div class="calendar-date">
                                                        <div class="calendar-date-day">
                                                            <small><?php echo $arrdata[2]; ?></small>
                                                            <p><?php echo $arrdata[0]; ?></p>
                                                            <small><b><?php echo $monthName; ?></b></small>
                                                        </div><!-- /calendar-date-day -->
                                                        <div class="calendar-date-description rounded">
                                                            <div class="calendar-date-description-content">
                                                                <?php if(isset($fase["titolo_fase"]) && ($fase["titolo_fase"] != "")) { ?>
                                                                    <h5 class="text-purplelight"><?php echo $fase["titolo_fase"]; ?></h5>
                                                                    <?php
                                                                }
                                                                echo wpautop($fase["desc_fase"]); ?>
                                                            </div><!-- /calendar-date-description-content -->
                                                        </div><!-- /calendar-date-description -->
                                                    </div><!-- /calendar-date -->
                                                    <?php
                                                }
                                                ?>
                                            </div><!-- /calendar-vertical -->
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                if(trim($casi_particolari) != ""){
                                    ?>
                                    <h4 id="art-par-casi-particolari"><?php _e("Casi particolari", "design_scuole_italia"); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($casi_particolari); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                // check for anchor


                                if(trim($altre_info) != ""){
                                    ?>
                                    <h4 id="art-par-altre-info"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($altre_info); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                if($telefono || $mail){
                                    ?>
                                    <div class="row variable-gutters mb-4" >
                                        <div class="col-lg-9">
                                            <h4 id="art-par-contatti"><?php _e("Contatti", "design_scuole_italia"); ?></h4>
                                            <div class="card card-bg bg-color rounded">
                                                <div class="card-body pb-1">
                                                    <ul>
                                                        <?php if($telefono){ ?><li><strong><?php _e("Telefono", "design_scuole_italia"); ?>:</strong> <?php echo $telefono; ?></li><?php } ?>
                                                        <?php if($mail){ ?><li><strong><?php _e("Email", "design_scuole_italia"); ?>:</strong> <?php echo $mail; ?></li><?php } ?>
                                                    </ul>
                                                </div></div>
                                        </div></div>

                                <?php }

                                if(is_array($struttura_responsabile) && count($struttura_responsabile) > 0){
                                    global $struttura;
                                    //$struttura = get_post($struttura_responsabile[0]);
                                    echo "<h6>".__("Struttura responsabile del servizio", "design_scuole_italia")."</h6>";
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="card-deck card-deck-spaced">
                                                <?php
                                                foreach ($struttura_responsabile as $idstruttura) {
                                                    $struttura = get_post($idstruttura);
                                                    ?>
                                                    <?php get_template_part("template-parts/struttura/card"); ?>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                }

                                if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){
                                    ?>
                                    <h6  class="mb-4" id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php
                                                if(is_array($link_schede_documenti) && count($link_schede_documenti)>0) {
                                                    global $documento;
                                                    foreach ( $link_schede_documenti as $link_scheda_documento ) {
                                                        $documento = get_post( $link_scheda_documento );
                                                        get_template_part( "template-parts/documento/card" );
                                                    }
                                                }

                                                global $idfile, $nomefile;
                                                if(is_array($file_documenti) && count($file_documenti)>0) {

                                                    foreach ( $file_documenti as $idfile => $nomefile ) {
                                                        get_template_part( "template-parts/documento/file" );
                                                    }
                                                }

                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                if(isset($arrstrutture) && is_array($arrstrutture) && count($arrstrutture) > 0){
                                    ?>
                                    <h6><?php _e("Per saperne di più", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <ul>
                                                <?php
                                                foreach ($arrstrutture as $snome => $slink){
                                                    echo "<li><a href='".$slink."' >".$snome."</a></li>";
                                                }
                                                ?>
                                            </ul>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <?php get_template_part("template-parts/single/bottom"); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->

                            </article>
                        </div><!-- /col-lg-8 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>
            <?php get_template_part("template-parts/single/related"); ?>
        <?php
        endwhile; // End of the loop.
        ?>
    </main>

<?php
get_footer();
