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
            $percorsi = dsi_get_percorsi_of_scuola($post);
            // print_r($percorsi);
            //$sottotitolo = dsi_get_meta("sottotitolo");

            $link_struttura_didattica = dsi_get_meta("link_struttura_didattica");

            $esito = dsi_get_meta("esito");
            $programma = dsi_get_meta("programma");
            $descrizione = dsi_get_meta("descrizione");
            $come_si_fa = dsi_get_meta("come_si_fa");
            $procedura_esito = dsi_get_meta("procedura_esito");
            $canale_digitale = dsi_get_meta("canale_digitale");
            $canale_digitale_label = dsi_get_meta("canale_digitale_label");
            $canale_digitale_link = dsi_get_meta("canale_digitale_link");

            $autenticazione = dsi_get_meta("autenticazione");
            $provider_autenticazione = dsi_get_meta("provider_autenticazione");
            //$canale_fisico = dsi_get_meta("canale_fisico");
            // $canale_fisico_prenotazione = dsi_get_meta("canale_fisico_prenotazione");

            //$sedi = dsi_get_meta("sedi");
            $cosa_serve = dsi_get_meta("cosa_serve");
            $cosa_serve_list = dsi_get_meta("cosa_serve_list");

            $costi_vincoli = dsi_get_meta("costi_vincoli");
            $fasi_scadenze = dsi_get_meta("fasi_scadenze");
            $casi_particolari = dsi_get_meta("casi_particolari");
            $link_schede_documenti = dsi_get_meta("link_schede_documenti");
            $file_documenti = dsi_get_meta("file_documenti");
            $altre_info = dsi_get_meta("altre_info");

            $struttura_responsabile = dsi_get_meta("struttura_responsabile");
            $luoghi = dsi_get_meta("luoghi");


            $calendario_classi_descrizione = dsi_get_meta("calendario_classi_descrizione");
            $calendario_classi_file = dsi_get_meta("calendario_classi_file");
            $libri_testo_descrizione = dsi_get_meta("libri_testo_descrizione");
            $libri_testo_file = dsi_get_meta("libri_testo_file");
            $consigli_di_classe = dsi_get_meta("consigli_di_classe");


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
                            <div class="section-title">
                                <?php if(is_array($percorsi)){
                                    echo "<small class=\"h6 text-purplelight\">";
                                    $c=0;
                                    foreach ($percorsi as $percorso){

                                        if($c) echo ", ";
                                        echo strtoupper($percorso->name);
                                        $c++;
                                    }
                                    echo "</small>";
                                }  ?>
                                <h1 class="mb-3"><?php the_title(); ?></h1>

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
                        <?php if($user_can_view_post): ?>
                        <div class="col-lg-3 col-md-4 aside-border px-0">
                            <aside class="aside-main aside-sticky">
                                <div class="aside-title">
                                    <a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi" role="button" aria-expanded="true" aria-controls="lista-paragrafi" aria-label="apri/chiudi indice della pagina">
                                        <span><?php _e("Indice della pagina", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-descrizione" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Cos'è", "design_scuole_italia"); ?>"><?php _e("Cos'è", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php
                                        // do action per innestare elementi tramite plugin / child theme
                                        do_action("dsi_indirizzo_menu_after_description");
                                        if(trim($come_si_fa) != "") {
                                            ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-accedi"
                                                   title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Come si accede", "design_scuole_italia"); ?>"><?php _e("Come si accede", "design_scuole_italia"); ?></a>
                                            </li>
                                            <?php
                                        }
                                        if($programma){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-programma" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Programma di studio", "design_scuole_italia"); ?>"><?php _e("Programma di studio", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if(($calendario_classi_file || $calendario_classi_descrizione)){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-calendario" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Orario delle classi", "design_scuole_italia"); ?>"><?php _e("Orario delle classi", "design_scuole_italia"); ?></a>
                                            </li>

                                        <?php } ?>
                                        <?php if(($libri_testo_file || $libri_testo_descrizione)){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-libri" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Libri di testo", "design_scuole_italia"); ?>"><?php _e("Libri di testo", "design_scuole_italia"); ?></a>
                                            </li>

                                        <?php } ?>
                                        <?php if($consigli_di_classe){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-consigli" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Consigli di classe", "design_scuole_italia"); ?>"><?php _e("Consigli di classe", "design_scuole_italia"); ?></a>
                                            </li>

                                        <?php } ?>
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
                        <div class="col-lg-8 col-md-8 offset-lg-1 pt84">
                            <article class="article-wrapper">
                                <h2 id="art-par-descrizione" class="h4"><?php _e("Cos'è", "design_scuole_italia"); ?></h2>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="article-description wysiwig-text">
                                            <?php the_content(); ?>
                                        </div>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->

                                <?php
                                // do action per innestare elementi tramite plugin / child theme
                                do_action("dsi_indirizzo_content_after_description");
                                ?>
                                <?php
                                // $esito = "";
                                if(trim($esito) != ""){
                                    ?>
                                    <h3 class="h6"><?php _e("A cosa serve", "design_scuole_italia"); ?></h3>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($esito); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>

                                <?php
                                if(trim($come_si_fa) != ""){
                                    ?>
                                    <h2 id="art-par-accedi" class="h4"><?php _e("Come si accede", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($come_si_fa); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                if(trim($procedura_esito) != ""){
                                    ?>
                                    <h3 class="h6"><?php _e("Procedure collegate all'esito", "design_scuole_italia"); ?></h3>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
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
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($autenticazione); ?>
										</div><!-- /col-lg-9 -->
									</div><!-- /row -->
									<div class="row variable-gutters mb-4">
                                        <?php if($provider_autenticazione && is_array($provider_autenticazione)){
										if(in_array("SPID", $provider_autenticazione)) {
										?>
											<div class="col-4 col-md-3">
												<div class="note">
													<svg class="svg-filters" width="90" height="64" aria-label="spid" role="img"><title>Logo SPID</title><use xmlns:xlink="http://www.w3.org/1999/xlink" href="#svg-spid"></use></svg>
													<p><?php _e("Non hai SPID?", "design_scuole_italia"); ?><br/><a href="https://www.spid.gov.it" aria-label="scopri di più su SPID (apre pagina su nuova scheda)">Scopri di più</a>.</p>
												</div>
											</div>
										<?php }
										if(in_array("CIE", $provider_autenticazione)) {
										?>
											<div class="col-4 col-md-3">
												<div class="note cie">
													<svg class="svg-filters" width="90" height="64" aria-label="cie" role="img"><title>Logo CIE</title><use xmlns:xlink="http://www.w3.org/1999/xlink" href="#svg-cie"></use></svg>
													<p><?php _e("Non hai CIE?", "design_scuole_italia"); ?><br/><a href="https://www.cartaidentita.interno.gov.it/la-carta/" aria-label="scopri di più su CIE (apre pagina su nuova scheda)">Scopri di più</a>.</p>
												</div>
											</div>
										<?php }
										if(in_array("CNS", $provider_autenticazione)) {
											?>
											<div class="col-4 col-md-3">
												<div class="note cns">
													<img alt="Logo CNS" class="svg-filters" width="90" height="64" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-cns.png' ); ?>">
													<p><?php _e("Non hai CNS?", "design_scuole_italia"); ?><br/><a href="https://sistemats1.sanita.finanze.it/portale/modalita-di-accesso-con-ts_cns" aria-label="scopri di più su CNS (apre pagina su nuova scheda)">Scopri di più</a>.</p>
												</div>
											</div>
										<?php }	
                                        }?>
                                    </div><!-- /row -->
                                <?php
                                }
                                if(is_array($link_struttura_didattica) && count($link_struttura_didattica) > 0){
                                    global $struttura;
                                    echo "<h3 class='h6'>".__("Struttura responsabile dell'indirizzo di studio", "design_scuole_italia")."</h3>";
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="card-deck card-deck-spaced">
                                                <?php
                                                foreach ($link_struttura_didattica as $idstruttura) {
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
                                ?>
                                <?php if($servizi_correlati){ ?>
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
                                            <h3 class="h6"><?php _e("Luoghi in cui viene erogato l'indirizzo di studio", "design_scuole_italia"); ?></h3>
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

                                // struttura responsabile del servizio
                                //    struttura_responsabile
                                //    luoghi
                                $cosa_serve="";
                                if(trim($cosa_serve) != ""){
                                    ?>
                                    <h2 id="art-par-cosa-serve" class="h4"><?php _e( "Cosa serve", "design_scuole_italia" ); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="card card-bg bg-color rounded mb-3">
                                                <div class="card-body">
                                                    <?php echo $cosa_serve; ?>
                                                </div>
                                            </div>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>

                                <?php if($programma){ ?>
                                    <h2 id="art-par-programma" class="h4 mt-4"><?php _e("Programma di studio", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo apply_filters("the_content",$programma); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                <?php } ?>

                                <?php if(($calendario_classi_file || $calendario_classi_descrizione)){ ?>
                                    <h2 id="art-par-calendario" class="h4 mt-4"><?php _e("Orario delle classi", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="col-lg-12  px-0 wysiwig-text">
                                                <?php echo wpautop($calendario_classi_descrizione); ?>
                                            </div>
                                            <div class="card-deck card-deck-spaced">
                                                <?php global $idfile, $nomefile;
                                                if (is_array($calendario_classi_file) && count($calendario_classi_file) > 0) {

                                                    foreach ($calendario_classi_file as $idfile => $nomefile) {
                                                        get_template_part("template-parts/documento/file");
                                                    }
                                                }
                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                <?php } ?>

                                <?php if(($libri_testo_file || $libri_testo_descrizione)){ ?>
                                    <h2 id="art-par-libri" class="h4 mt-4"><?php _e("Libri di testo", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="col-lg-12  px-0 wysiwig-text">
                                                <?php echo  apply_filters("the_content",$libri_testo_descrizione); ; ?>
                                            </div>
                                            <div class="card-deck card-deck-spaced">
                                                <?php global $idfile, $nomefile;
                                                if (is_array($libri_testo_file) && count($libri_testo_file) > 0) {

                                                    foreach ($libri_testo_file as $idfile => $nomefile) {
                                                        get_template_part("template-parts/documento/file");
                                                    }
                                                }
                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                <?php } ?>

                                <?php if($consigli_di_classe) { ?>
                                    <h2 id="art-par-documenti" class="h4 mb-4"><?php _e("Consigli di classe", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php
                                                if (is_array($consigli_di_classe) && count($consigli_di_classe) > 0) {
                                                    global $documento;
                                                    foreach ($consigli_di_classe as $link_scheda_documento) {
                                                        $documento = get_post($link_scheda_documento);
                                                        get_template_part("template-parts/documento/card");
                                                    }
                                                }
                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->

                                    <?php
                                }
                                // print_r($fasi_scadenze);
                                if(is_array($fasi_scadenze) && count($fasi_scadenze)>0) {
                                    ?>
                                    <h2 id="art-par-tempi-scadenze" class="h4"><?php _e("Tempi e scadenze", "design_scuole_italia"); ?></h2>
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
                                                                <?php echo wpautop($fase["desc_fase"]); ?>
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
                                    <h2 id="art-par-casi-particolari" class="h4"><?php _e("Casi particolari", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($casi_particolari); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                // check for anchor


                                if(trim($altre_info) != ""){
                                    ?>
                                    <h2 id="art-par-altre-info" class="h4"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <?php echo wpautop($altre_info); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }

                                if($telefono || $mail){
                                    ?>
                                    <div class="row variable-gutters mb-4" >
                                        <div class="col-lg-9">
                                            <h2 id="art-par-contatti" class="h4"><?php _e("Contatti", "design_scuole_italia"); ?></h2>
                                            <div class="card card-bg bg-color rounded">
                                                <div class="card-body pb-1">
                                                    <ul>
                                                        <?php if($telefono){ ?><li><strong><?php _e("Telefono", "design_scuole_italia"); ?>:</strong> <?php echo "<a href='tel:+39$telefono'>$telefono</a>"; ?></li><?php } ?>
                                                        <?php if($mail){ ?><li><strong><?php _e("Email", "design_scuole_italia"); ?>:</strong> <?php echo "<a href = 'mailto: $mail'>$mail</a>"; ?></li><?php } ?>
                                                    </ul>
                                                </div></div>
                                        </div></div>

                                <?php }


                                if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){
                                    ?>
                                    <h3 class="h6 mb-4" id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h3>
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
                                    <h5 class="h6"><?php _e("Per saperne di più", "design_scuole_italia"); ?></h5>
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
