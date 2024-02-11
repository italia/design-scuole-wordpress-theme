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
            set_views($post->ID);

            $user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);

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
            $provider_autenticazione = dsi_get_meta("provider_autenticazione");
            //$canale_fisico = dsi_get_meta("canale_fisico");
          //  $canale_fisico_prenotazione = dsi_get_meta("canale_fisico_prenotazione");
            //$sedi = dsi_get_meta("sedi");
            $cosa_serve = dsi_get_meta("cosa_serve");
            $cosa_serve_list = dsi_get_meta("cosa_serve_list");

            $fasi_scadenze_intro = dsi_get_meta("fasi_scadenze_intro");
            $fasi_scadenze = dsi_get_meta("fasi_scadenze");
            $casi_particolari = dsi_get_meta("casi_particolari");
            $link_schede_documenti = dsi_get_meta("link_schede_documenti");
            $file_documenti = dsi_get_meta("file_documenti");
            $altre_info = dsi_get_meta("altre_info");

            $struttura_responsabile = dsi_get_meta("struttura_responsabile");
            $scuola_responsabile = dsi_get_meta("scuola_responsabile");

            $luoghi = dsi_get_meta("luoghi");
            $link_schede_progetti = dsi_get_meta("link_schede_progetti");


            $servizi_correlati = dsi_get_meta("servizi_correlati");
            $mail = dsi_get_meta("mail");
            $telefono = dsi_get_meta("telefono");

            $contatti_dedicati = dsi_get_meta("contatti_dedicati");

            if($contatti_dedicati != "on") {
                $contatti_centralino = dsi_get_option("contatti_centralino", "contacts");
                $contatti_PEO = dsi_get_option("contatti_PEO", "contacts");
                
                if($contatti_centralino) $telefono = $contatti_centralino;
                if($contatti_PEO) $mail = $contatti_PEO;
            }
            ?>
            <section class="section bg-white py-2 py-lg-3 py-xl-5">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-12 col-sm-3 col-lg-2 d-none d-sm-block">
                            <div class="section-thumb mx-3">
                                <?php
                                    $image_id= get_post_thumbnail_id($post);
                                    if(has_post_thumbnail($post))
                                        $image_url = get_the_post_thumbnail_url($post, "item-thumb");
                                    else
                                        $image_url = get_template_directory_uri() ."/assets/placeholders/logo-service.png";
                                    dsi_get_img_from_id_url( $image_id, $image_url );
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
                                <h1 data-element="service-title" class="mb-3"><?php the_title(); ?></h1>
                                <p data-element="service-description"><?php echo $descrizione; ?></p>
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
                        <?php if($user_can_view_post): ?>
                        <div class="col-lg-3 col-md-4 aside-border px-0">
                            <aside class="aside-main aside-sticky">
                                <div class="aside-title" id="page-index">
                                    <a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi" role="button" aria-expanded="true" aria-controls="lista-paragrafi" aria-label="apri/chiudi indice della pagina">
                                        <span><?php _e("Indice della pagina", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show" role="region" aria-labelledby="page-index">
                                    <ul class="link-list" data-element="page-index">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-descrizione" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Cos'è", "design_scuole_italia"); ?>"><?php _e("Cos'è", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php
                                        // do action per innestare elementi tramite plugin / child theme
                                        do_action("dsi_servizio_menu_after_description");
                                        ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-accedi" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Come si accede al servizio", "design_scuole_italia"); ?>"><?php _e("Come si accede al servizio", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php if(($cosa_serve) || (is_array($cosa_serve_list))) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-cosa-serve" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Cosa serve", "design_scuole_italia"); ?>"><?php _e("Cosa serve", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if(($fasi_scadenze_intro) || (is_array($fasi_scadenze) && count($fasi_scadenze)>0)) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-tempi-scadenze" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Tempi e scadenze", "design_scuole_italia"); ?>"><?php _e("Tempi e scadenze", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php  if(trim($casi_particolari) != ""){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-casi-particolari" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Casi particolari", "design_scuole_italia"); ?>"><?php _e("Casi particolari", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-documenti" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Documenti", "design_scuole_italia"); ?>"><?php _e("Documenti", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php
                                        if($telefono || $mail || (is_array($struttura_responsabile) && count($struttura_responsabile) > 0)){
                                            ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-contatti" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Contatti", "design_scuole_italia"); ?>"><?php _e("Contatti", "design_scuole_italia"); ?></a>
                                            </li>

                                            <?php
                                        }
                                        ?>
                                        <?php if(trim($altre_info) != ""){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-altre-info" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Ulteriori informazioni", "design_scuole_italia"); ?>"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </aside>

                        </div>
                        <div class="col-lg-8 col-md-8 offset-lg-1 pt84">
                            <article class="article-wrapper">
                                <h2 class="h4" id="art-par-descrizione"><?php _e("Cos'è", "design_scuole_italia"); ?></h2>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="article-description wysiwig-text" data-element="service-what-is">
                                            <?php the_content(); ?>
                                        </div>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->

                                <?php
                                // do action per innestare elementi tramite plugin / child theme
                                do_action("dsi_servizio_content_after_description");
                                ?>

                                <?php
                                // $esito = "";
                                if(trim($esito) != ""){
                                    ?>
                                    <h3 class="h6" data-element="used-for"><?php _e("A cosa serve", "design_scuole_italia"); ?></h3>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($esito); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <h2 class="h4" id="art-par-accedi"><?php _e("Come si accede al servizio", "design_scuole_italia"); ?></h2>
                                <?php
                                if(trim($come_si_fa) != ""){
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text" data-element="service-generic-access">
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
                                    <h3 class="h6"><?php _e("Procedure collegate all'esito", "design_scuole_italia"); ?></h3>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($procedura_esito); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                if((trim($canale_digitale) != "") || (trim($canale_digitale_link) != "")) {
                                    ?>
                                    <h3 class="h6"><?php _e("Servizio online", "design_scuole_italia"); ?></h3>
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
                                    <h3 class="h6"><?php _e("Autenticazione", "design_scuole_italia"); ?></h3>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo apply_filters("the_content", $autenticazione); ?>
                                        </div><!-- /col-lg-9 -->
									</div><!-- /row -->
									
									<div class="row variable-gutters mb-4">
										<?php if($provider_autenticazione && is_array($provider_autenticazione)){
										if(in_array("SPID", $provider_autenticazione)) {
										?>
											<div class="col-4 col-md-3">
												<div class="note">
													<img alt="Logo SPID" class="svg-filters" width="90" height="64" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mini-logo-spid.svg' ); ?>">
													<p><?php _e("Non hai SPID?", "design_scuole_italia"); ?><br/><a href="https://www.spid.gov.it" aria-label="scopri di più su SPID - link esterno - (apre pagina su nuova scheda)" data-focus-mouse="false">Scopri di più</a></p>
												</div>
											</div>
										<?php }
										if(in_array("CIE", $provider_autenticazione)) {
										?>
											<div class="col-4 col-md-3">
												<div class="note">
													<img alt="Logo CIE" class="svg-filters" width="90" height="64" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mini-logo-cie.svg' ); ?>">
													<p><?php _e("Non hai CIE?", "design_scuole_italia"); ?><br/><a href="https://www.cartaidentita.interno.gov.it/la-carta/" aria-label="scopri di più su CIE - link esterno - (apre pagina su nuova scheda)" data-focus-mouse="false">Scopri di più</a></p>
												</div>
											</div>
										<?php }
										if(in_array("CNS", $provider_autenticazione)) {
										?>
											<div class="col-4 col-md-3">
												<div class="note">
													<img alt="Logo CNS" class="svg-filters" width="90" height="64" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mini-logo-cns.svg' ); ?>">
													<p><?php _e("Non hai CNS?", "design_scuole_italia"); ?><br/><a href="https://sistemats1.sanita.finanze.it/portale/modalita-di-accesso-con-ts_cns" aria-label="scopri di più su CNS - link esterno - (apre pagina su nuova scheda)" data-focus-mouse="false">Scopri di più</a>.</p>
												</div>
											</div>
										<?php }
                                        if(in_array("eIDAS", $provider_autenticazione)) {
											?>
											<div class="col-4 col-md-3">
												<div class="note">
													<img alt="Logo eIDAS" class="svg-filters" width="90" height="64" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mini-logo-eidas.svg' ); ?>">
													<p><?php _e("Che cos'è eIDAS?", "design_scuole_italia"); ?><br/><a href="https://www.eid.gov.it/" aria-label="scopri di più su eIDAS (apre pagina su nuova scheda)">Scopri di più</a>.</p>
												</div>
											</div>
                                        <?php }	
									}?>
                                    </div><!-- /row -->
								<?php
                                }
                                if($servizi_correlati){ ?>
                                    <h3 class="h6"><?php _e("Servizi correlati", "design_scuole_italia"); ?></h3>
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
                                            <h3 class="h6"><?php _e("Luoghi in cui viene erogato il servizio", "design_scuole_italia"); ?></h3>
                                            <?php
                                            $c=0;
                                            foreach ($luoghi as $idluogo){
                                                $c++;
                                                $luogo = get_post($idluogo);
                                                get_template_part( "template-parts/luogo/card");
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }


                                if(($cosa_serve) || (is_array($cosa_serve_list))) {
                                    ?>
                                    <h2 class="h4" id="art-par-cosa-serve"><?php _e( "Cosa serve", "design_scuole_italia" ); ?></h2>

                                    <div class="row variable-gutters mb-2 pb-2">
                                        <div class="col-lg-9">
                                            <div class="col-lg-12  px-0 wysiwig-text" data-element="service-needed">
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
                                if($fasi_scadenze_intro || (is_array($fasi_scadenze) && count($fasi_scadenze)>0)) {
                                    ?>
                                    <h2 class="h4" id="art-par-tempi-scadenze"><?php _e("Tempi e scadenze", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php if($fasi_scadenze_intro) { ?>
                                    		    <div class="col-lg-12  px-0 wysiwig-text" data-element="service-calendar-text">
                                            	    <?php echo apply_filters("the_content", $fasi_scadenze_intro); ?>
                                                </div>
                                            <?php } ?>
                                            <div class="calendar-vertical mb-5" data-element="service-calendar-list">
                                                <?php
                                                foreach ($fasi_scadenze as $fase){
                                                    $arrdata =  explode("-", $fase["data_fase"]);
                                                    $monthName = date_i18n('M', mktime(0, 0, 0, $arrdata[1], 10)); // March

                                                    ?>
                                                    <div class="calendar-date">
                                                        <div class="calendar-date-description rounded">
                                                            <div class="calendar-date-description-content">
                                                                <?php if(isset($fase["titolo_fase"]) && ($fase["titolo_fase"] != "")) { ?>
                                                                    <h3 class="h5" class="text-purplelight"><?php echo $fase["titolo_fase"]; ?></h3>
                                                                    <?php
                                                                }
                                                                echo wpautop($fase["desc_fase"]); ?>
                                                            </div><!-- /calendar-date-description-content -->
                                                        </div><!-- /calendar-date-description -->
                                                        <h4 class="calendar-date-day">
                                                            <p><?php echo $arrdata[0]; ?></p>
                                                            <small><b><?php echo $monthName; ?></b></small>
                                                        </h4><!-- /calendar-date-day -->
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
                                    <h2 class="h4" id="art-par-casi-particolari"><?php _e("Casi particolari", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($casi_particolari); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                // check for anchor

                                if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){
                                    ?>
                                    <h2 class="h4" id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h2>
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
                                
                                if($telefono || $mail || (is_array($struttura_responsabile) && count($struttura_responsabile) > 0)){
                                    ?>
                                    <div class="row variable-gutters mb-4" >
                                        <div class="col-lg-9">
                                            <h2 class="h4" id="art-par-contatti"><?php _e("Contatti", "design_scuole_italia"); ?></h2>
                                            <div class="card card-bg bg-color rounded">
                                                <div class="card-body pb-1">
                                                    <ul>
                                                        <?php if($telefono){ ?><li><strong><?php _e("Telefono", "design_scuole_italia"); ?>:</strong> <?php echo "<a href='tel:+39$telefono'>$telefono</a>"; ?></li><?php } ?>
                                                        <?php if($mail){ ?><li><strong><?php _e("Email", "design_scuole_italia"); ?>:</strong> <?php echo "<a href = 'mailto: $mail'>$mail</a>"; ?></li><?php } ?>
                                                    </ul>
                                                </div></div>
                                        </div></div>

                                    <?php if(is_array($struttura_responsabile) && count($struttura_responsabile) > 0){
                                    global $struttura;
                                        //$struttura = get_post($struttura_responsabile[0]);
                                        echo "<h5>".__("Struttura responsabile del servizio", "design_scuole_italia")."</h5>";
                                        ?>
                                        <div class="row variable-gutters">
                                            <div class="col-lg-9">
                                                <div class="card-deck card-deck-spaced" data-element="structures">
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
                                    <?php } ?>
                                <?php } ?>

                                <?php                                

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

                                if(trim($altre_info) != ""){
                                    ?>
                                    <h2 class="h4" id="art-par-altre-info"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9" data-element="service-more-info">
                                            <?php echo wpautop($altre_info); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                if($link_schede_progetti){ ?>
                                    <h2 class="h6"><?php _e("Progetti collegati al servizio", "design_scuole_italia"); ?></h2>
                                    <div class="card-deck card-deck-spaced mb-4">
                                        <?php
                                        foreach ($link_schede_progetti as $idprogetto){
                                            $progetto = get_post($idprogetto);
                                            get_template_part("template-parts/progetto/card");
                                        }
                                        ?>
                                    </div><!-- /card-deck card-deck-spaced -->
                                <?php } 

                                ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <?php get_template_part("template-parts/single/bottom"); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->

                            </article>
                        </div><!-- /col-lg-8 -->
                        <?php else: ?>
                        <div class="col-lg-12 p-5 m-5 text-center font-weight-bold wysiwig-text">
                            <?php the_content(); ?>
                        </div>
                        <?php endif; ?>
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
