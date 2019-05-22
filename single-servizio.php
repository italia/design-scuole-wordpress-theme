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
            $esito = dsi_get_meta("esito");
			$descrizione = dsi_get_meta("descrizione");
			$come_si_fa = dsi_get_meta("come_si_fa");
			$procedura_esito = dsi_get_meta("procedura_esito");
			$canale_digitale = dsi_get_meta("canale_digitale");
			$autenticazione = dsi_get_meta("autenticazione");
			$spid = dsi_get_meta("spid");
			$canale_fisico = dsi_get_meta("canale_fisico");
			$canale_fisico_prenotazione = dsi_get_meta("canale_fisico_prenotazione");
			$sedi = dsi_get_meta("sedi");
			$cosa_serve = dsi_get_meta("cosa_serve");
			$costi_vincoli = dsi_get_meta("costi_vincoli");
			$fasi_scadenze = dsi_get_meta("fasi_scadenze");
			$casi_particolari = dsi_get_meta("casi_particolari");
			$link_schede_documenti = dsi_get_meta("link_schede_documenti");
			$file_documenti = dsi_get_meta("file_documenti");
			$altre_info = dsi_get_meta("altre_info");

			?>
            <section class="section py-2 bg-white">
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
                            <div class="section-title">
                                <h2 class="mb-3"><?php the_title(); ?></h2>
                                <p><?php echo dsi_get_meta("sottotitolo"); ?></p>
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
                                            <a class="list-item scroll-anchor-offset" href="#art-par-accedi" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Accedi al servizio", "design_scuole_italia"); ?>"><?php _e("Accedi al servizio", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php if(is_array($cosa_serve) && count($cosa_serve) > 0) { ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-cosa-serve" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Cosa serve", "design_scuole_italia"); ?>"><?php _e("Cosa serve", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php } ?>
	                                    <?php  if(trim($costi_vincoli) != ""){ ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-costi-vincoli" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Costi e vincoli", "design_scuole_italia"); ?>"><?php _e("Costi e vincoli", "design_scuole_italia"); ?></a>
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
                                        <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){ ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-documenti" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Documenti", "design_scuole_italia"); ?>"><?php _e("Documenti", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php } ?>
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
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="article-description">
                                            <?php echo wpautop($descrizione); ?>
                                        </div><!-- /article-description -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <h4 id="art-par-descrizione"><?php _e("Cos'è", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
										<?php the_content(); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <h4 id="art-par-accedi"><?php _e("Accedi al servizio", "design_scuole_italia"); ?></h4>
								<?php
								if(trim($esito) != ""){
									?>
                                    <h6><?php _e("Esito", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($esito); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
									<?php
								}
								if(trim($come_si_fa) != ""){
									?>
                                    <h6><?php _e("Come si fa", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($come_si_fa); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
									<?php
								}
								if(trim($procedura_esito) != ""){
									?>
                                    <h6><?php _e("Procedure collegate all'esito", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($procedura_esito); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
									<?php
								}
								if(trim($canale_digitale) != ""){
									?>
                                    <h6><?php _e("Canale digitale", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($canale_digitale); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
									<?php
								}
								if(trim($autenticazione) != ""){
									?>
                                    <h6><?php _e("Autenticazione", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($autenticazione); ?>
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
								if(trim($canale_fisico) != ""){
									?>
                                    <h6><?php _e("Canale fisico", "design_scuole_italia"); ?></h6>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <p><?php echo $canale_fisico; ?></p>
											<?php if(trim($canale_fisico_prenotazione) != ""){  ?>
                                                <div class="btn-wrapper mb-5">
                                                    <a class="btn btn-purplelight" href="<?php echo $canale_fisico_prenotazione; ?>"><?php _e("Prenota", "design_scuole_italia"); ?></a>
                                                </div>
											<?php } ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
									<?php
								}

								// sedi
								if(is_array($sedi) && count($sedi)>0) {
									?>
                                    <h6><?php _e( "Sedi", "design_scuole_italia" ); ?></h6>
								<?php
								$c=0;
								foreach ($sedi as $sede){
								$c++;
								//   print_r($sede);
								?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="card card-bg rounded mb-5">
                                                <div class="card-header">
                                                    <strong><?php echo $sede["nome"]; ?></strong>
                                                </div><!-- /card-header -->
                                                <div class="card-body p-0">
                                                    <div class="row variable-gutters">
                                                        <div class="col-lg-5 pr-0 pt-0 p-b0">
                                                            <div class="map-wrapper">
                                                                <div class="map" id="map_<?php echo $c; ?>"></div>
                                                            </div>
                                                        </div><!-- /col-lg-4 -->
                                                        <div class="col-lg-7">
                                                            <div class="py-4">
                                                                <ul class="location-list mt-2">
																	<?php if(isset($sede["indirizzo"])){ ?>
                                                                        <li>
                                                                            <div class="location-title">
                                                                                <span><?php _e( "indirizzo", "design_scuole_italia" ); ?></span>
                                                                            </div>
                                                                            <div class="location-content">
                                                                                <?php echo wpautop($sede["indirizzo"]); ?>
                                                                            </div>
                                                                        </li>
																	<?php } ?>
																	<?php if(isset($sede["cap"])){ ?>
                                                                        <li>
                                                                            <div class="location-title">
                                                                                <span><?php _e( "CAP", "design_scuole_italia" ); ?></span>
                                                                            </div>
                                                                            <div class="location-content">
                                                                                <p><?php echo $sede["cap"]; ?></p>
                                                                            </div>
                                                                        </li>
																	<?php } ?>
																	<?php if(isset($sede["orario"])){ ?>
                                                                        <li>
                                                                            <div class="location-title">
                                                                                <span><?php _e( "Orari", "design_scuole_italia" ); ?></span>
                                                                            </div>
                                                                            <div class="location-content">
                                                                                <?php echo wpautop($sede["orario"]); ?>
                                                                            </div>
                                                                        </li>
																	<?php } ?>
																	<?php if(isset($sede["mail"])){ ?>
                                                                        <li>
                                                                            <div class="location-title">
                                                                                <span><?php _e( "Email", "design_scuole_italia" ); ?></span>
                                                                            </div>
                                                                            <div class="location-content">
                                                                                <p><a href="mailto:<?php echo $sede["mail"]; ?>"><?php echo $sede["mail"]; ?></a></p>
                                                                            </div>
                                                                        </li>
																	<?php } ?>
																	<?php if(isset($sede["pec"])){ ?>
                                                                        <li>
                                                                            <div class="location-title">
                                                                                <span><?php _e( "PEC", "design_scuole_italia" ); ?></span>
                                                                            </div>
                                                                            <div class="location-content">
                                                                                <p><a href="mailto:<?php echo $sede["pec"]; ?>"><?php echo $sede["pec"]; ?></a></p>
                                                                            </div>
                                                                        </li>
																	<?php } ?>
																	<?php if(isset($sede["telefono"])){ ?>
                                                                        <li>
                                                                            <div class="location-title">
                                                                                <span><?php _e( "Telefono", "design_scuole_italia" ); ?></span>
                                                                            </div>
                                                                            <div class="location-content">
                                                                                <p><?php echo $sede["telefono"]; ?></p>
                                                                            </div>
                                                                        </li>
																	<?php } ?>
																	<?php if(isset($sede["persone"])){ ?>
                                                                        <li>
                                                                            <div class="location-title">
                                                                                <span><?php _e( "Rif.", "design_scuole_italia" ); ?></span>
                                                                            </div>
                                                                            <div class="location-content">
                                                                                <p><?php echo $sede["persone"]; ?></p>
                                                                            </div>
                                                                        </li>
																	<?php } ?>
                                                                </ul><!-- /location-list -->
                                                            </div>
                                                        </div><!-- /col-lg-8 -->
                                                    </div><!-- /row -->
                                                </div><!-- /card-body -->
                                            </div><!-- /card card-bg rounded -->
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <script>
                                        var mymap = L.map('map_<?php echo $c; ?>', {
                                            zoomControl: false,
                                            scrollWheelZoom: false
                                        }).setView([<?php echo $sede["posizione_gps"]["lat"]; ?>, <?php echo $sede["posizione_gps"]["lng"]; ?>], 15);
                                        var marker = L.marker([<?php echo $sede["posizione_gps"]["lat"]; ?>, <?php echo $sede["posizione_gps"]["lng"]; ?>]).addTo(mymap);
                                        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
                                            attribution: '',
                                            maxZoom: 18,
                                            id: 'mapbox.streets',
                                            accessToken: '<?php echo dsi_get_mapbox_access_token(); ?>'
                                        }).addTo(mymap);
                                    </script>
									<?php
								}
								}

								if(is_array($cosa_serve) && count($cosa_serve) > 0) {
									?>
                                    <h4 id="art-par-cosa-serve"><?php _e( "Cosa serve", "design_scuole_italia" ); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
											<?php
											foreach ( $cosa_serve as $serve ) {
												?>
                                                <div class="card card-bg bg-color rounded mb-3">
                                                    <div class="card-body">
                                                        <ul class="mb-0">
                                                            <li><?php echo $serve; ?></li>
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
								if(trim($costi_vincoli) != ""){
									?>
                                    <h4 id="art-par-costi-vincoli"><?php _e("Costi e vincoli", "design_scuole_italia"); ?></h4>
                                    <div class="row variable-gutters">
                                         <div class="col-lg-9"><?php echo wpautop($costi_vincoli); ?></div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
									<?php
								}
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
                                                            <p><?php echo $arrdata[0]; ?></p>
                                                            <small><?php echo $monthName; ?></small>
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
                                <h4 id="art-par-casi-particolari"><?php _e("Casi particolari", "design_scuole_italia"); ?></h4>
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
                                <h4  class="mb-4" id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h4>
                                <?php
                            }

				            if(is_array($link_schede_documenti) && count($link_schede_documenti)>0) {
				                ?>

                                <h6><?php _e("Link alle schede dei documenti", "design_scuole_italia"); ?></h6>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <div class="card-deck card-deck-spaced">
                                            <?php
                                            foreach ( $link_schede_documenti as $link_scheda_documento ) {

                                                $doc = get_post($link_scheda_documento);
                                                ?>
                                                <div class="card card-bg card-icon rounded">
                                                    <div class="card-body">
                                                        <svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-documents"></use></svg>
                                                        <div class="card-icon-content">
                                                            <p><strong><a href="<?php echo get_permalink($link_scheda_documento); ?>"><?php echo $doc->post_title; ?></a></strong></p>
                                                        </div><!-- /card-icon-content -->
                                                    </div><!-- /card-body -->
                                                </div><!-- /card card-bg card-icon rounded -->
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /card-deck card-deck-spaced -->
                                    </div><!-- /col-lg-12 -->
                                </div><!-- /row -->
				                <?php
			                    }

                    			if(is_array($file_documenti) && count($file_documenti)>0) {
		                		?>
                                <h6><?php _e("Link ai documenti", "design_scuole_italia"); ?></h6>
                                <div class="row variable-gutters mb-4">
                                    <div class="col-lg-12">
                                        <div class="card-deck card-deck-spaced">
                                            <?php
                                            foreach ( $file_documenti as $idfile => $nomefile ) {
                                                $icon = "svg-documents";
                                                if(substr($nomefile, -3) == "pdf")
	                                                $icon = "it-pdf-document";

                                                $attach = get_post($idfile);
                                                $filetocheck = get_attached_file($idfile);

                                                $filesize = filesize($filetocheck);
                                                ?>
                                                <div class="card card-bg card-icon rounded">
                                                    <div class="card-body">
                                                        <svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php echo $icon; ?>"></use></svg>
                                                        <div class="card-icon-content">
                                                            <p><strong><a target="_blank" href="<?php echo $attach->guid; ?>"><?php echo $attach->post_title; ?></a></strong></p>
                                                            <small><?php echo intval($filesize/1024); ?> kb</small>
                                                        </div><!-- /card-icon-content -->
                                                    </div><!-- /card-body -->
                                                </div><!-- /card card-bg card-icon rounded -->
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /card-deck card-deck-spaced -->
                                    </div><!-- /col-lg-12 -->
                                </div><!-- /row -->
				                    <?php
			                    }

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
								?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="article-footer">
                                            <p><strong><?php _e("Pubblicato", "design_scuole_italia"); ?>:</strong> <?php
	                                            $date_publish = new DateTime($post->post_date);
	                                            echo $date_publish->format('d.m.Y');
	                                            ?> <span>-</span> <strong><?php _e("Revisione", "design_scuole_italia"); ?>:</strong> <?php
	                                            $date_update = new DateTime($post->post_modified);
	                                            echo $date_update->format('d.m.Y');
                                                ?></p>
                                            <p><?php _e("Eccetto dove diversamente specificato, questo articolo è stato rilasciato sotto Licenza Creative Commons Attribuzione 3.0 Italia.", "design_scuole_italia"); ?></p>
                                        </div><!-- /article-footer -->
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
