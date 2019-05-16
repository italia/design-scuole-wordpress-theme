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
		?>
		<section class="section py-2 bg-white">
			<div class="container">
				<div class="row variable-gutters">
					<div class="col-lg-5 col-md-8 offset-lg-2">
						<div class="section-title">
							<h2 class="mb-3"><?php the_title(); ?></h2>
							<p><?php echo dsi_get_meta("sottotitolo"); ?></p>
						</div><!-- /title-section -->
					</div><!-- /col-lg-5 col-md-8 offset-lg-2 -->
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
									<span>Indice della pagina</span>
									<svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
								</a>
							</div>
							<div id="lista-paragrafi" class="link-list-wrapper collapse show">
								<ul class="link-list">
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-01" title="Vai al paragrafo Descrizione">Descrizione</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-02" title="Vai al paragrafo Chi può fare richiesta">Chi può fare richiesta</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-03" title="Vai al paragrafo Come iscriversi">Iscrizione al servizio</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-04" title="Vai al paragrafo Cosa serve">Scadenze e aggiornamenti</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-05" title="Vai al paragrafo Graduatorie di accesso">Metodi di pagamento</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-06" title="Vai al paragrafo Casi particolari">Costi</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-07" title="Vai al paragrafo Scadenze e aggiornamenti">Pagamento online</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#art-par-08" title="Vai al paragrafo Allegati">Allegati</a>
									</li>
									<li>
										<a class="list-item scroll-anchor-offset" href="#contenuti-correlati" title="Vai al paragrafo Ulteriori informazioni">Contenuti correlati</a>
									</li>
								</ul>
							</div>
						</aside>

					</div>
					<div class="col-lg-8 col-md-8 offset-lg-1 pt84">
						<article class="article-wrapper">
							<h4 id="art-par-01">Descrizione</h4>
							<div class="row variable-gutters">
								<div class="col-lg-9">
									<?php echo wpautop(dsi_get_meta("descrizione")); ?>
								</div><!-- /col-lg-9 -->
							</div><!-- /row -->
							<h4 id="art-par-02">Chi può fare richiesta</h4>
							<div class="row variable-gutters">
								<div class="col-lg-9">
									<p>Il servizio di refezione è diretto agli studenti delle scuole statali, dell'infanzia, primarie e secondarie di I grado, agli alunni della scuola dell'infanzia comunale e a quelli delle scuole paritarie, la cui attività non abbia fini di lucro, ai sensi dell'art. 6 L. R. n. 53 del 19/06/1981.</p>
									<p>È presupposto per la concessione del servizio, il proseguimento delle attività scolastiche in orario pomeridiano (per gli studenti della scuola primaria dà diritto a usufruire del servizio refezione anche l'iscrizione al servizio di post scuola meridiano ).</p>
								</div><!-- /col-lg-9 -->
								<div class="col-lg-3">
									<div class="note">
										<p><strong>Nota 1</strong>. Per informazioni dettagliate sull'organizzazione del servizio, menù e tabelle dietetiche, diete speciali e controlli qualità / commissioni mensa si rimanda alle schede di dettaglio allegate.</p>
									</div>
								</div><!-- /col-lg-3 -->
							</div><!-- /row -->
							<h4 id="art-par-03">Iscrizione al servizio</h4>
							<div class="row variable-gutters">
								<div class="col-lg-9">
									<p>La domanda di iscrizione alla classe prima della scuola primaria comporta l’iscrizione automatica ai servizi di Refezione Scolastica e si intende valida per l'intero ciclo scolastico.</p>
									<p>Per gli alunni frequentanti le classi a tempo pieno e nei giorni di rientro delle classi a modulo, la frequenza al servizio refezione è obbligatoria, salvo situazioni particolari che devono essere richieste per iscritto dal genitore e autorizzate dal Dirigente Scolastico della scuola frequentata.</p>
								</div><!-- /col-lg-9 -->
								<div class="col-lg-3">
									<div class="note">
										<svg width="100%" height="100%" viewBox="0 0 68 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><rect x="0" y="0" width="68" height="34" style="fill:none;"/><g id="Group-8"><path id="XMLID_10_" d="M14.583,12.178c-2.957,-0.389 -5.026,-0.584 -6.207,-0.584c-1.18,0 -1.944,0.111 -2.291,0.32c-0.347,0.208 -0.514,0.555 -0.514,1.013c0,0.459 0.237,0.792 0.695,0.972c0.458,0.181 1.652,0.445 3.582,0.792c1.917,0.347 3.291,0.916 4.097,1.694c0.805,0.792 1.222,2.069 1.222,3.833c0,3.86 -2.403,5.79 -7.193,5.79c-1.569,0 -3.486,-0.208 -5.721,-0.639l-1.139,-0.208l0.139,-4.013c2.958,0.389 5.013,0.569 6.179,0.569c1.153,0 1.944,-0.111 2.361,-0.333c0.416,-0.222 0.625,-0.569 0.625,-1.014c0,-0.444 -0.223,-0.791 -0.667,-0.999c-0.444,-0.209 -1.583,-0.473 -3.43,-0.792c-1.847,-0.305 -3.221,-0.833 -4.138,-1.569c-0.916,-0.75 -1.374,-2.069 -1.374,-3.958c0,-1.902 0.638,-3.332 1.93,-4.29c1.291,-0.972 2.944,-1.444 4.971,-1.444c1.402,0 3.333,0.222 5.763,0.68l1.18,0.208l-0.07,3.972Z" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_73_" d="M18.658,33.159l0,-25.411l4.763,0l0,0.972c1.555,-0.93 2.916,-1.402 4.082,-1.402c2.403,0 4.18,0.722 5.333,2.166c1.138,1.444 1.721,3.888 1.721,7.359c0,3.458 -0.638,5.86 -1.902,7.207c-1.264,1.347 -3.346,2.027 -6.221,2.027c-0.791,0 -1.638,-0.069 -2.541,-0.208l-0.43,-0.069l0,7.373l-4.805,0l0,-0.014Zm7.915,-21.537c-0.889,0 -1.777,0.181 -2.68,0.542l-0.43,0.18l0,9.359c1.069,0.139 1.944,0.209 2.61,0.209c1.389,0 2.333,-0.403 2.847,-1.222c0.513,-0.806 0.763,-2.194 0.763,-4.152c0,-3.277 -1.041,-4.916 -3.11,-4.916Z" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_70_" d="M67.191,0.827l0,25.05l-4.762,0l0,-0.75c-1.667,0.792 -3.111,1.181 -4.333,1.181c-2.597,0 -4.416,-0.75 -5.443,-2.25c-1.028,-1.5 -1.542,-3.888 -1.542,-7.137c0,-3.264 0.611,-5.624 1.847,-7.124c1.222,-1.486 3.083,-2.235 5.569,-2.235c0.763,0 1.819,0.124 3.179,0.361l0.681,0.138l0,-7.234l4.804,0Zm-5.304,20.759l0.5,-0.111l0,-9.414c-1.305,-0.236 -2.486,-0.361 -3.513,-0.361c-1.93,0 -2.902,1.721 -2.902,5.151c0,1.861 0.208,3.18 0.638,3.972c0.431,0.791 1.139,1.18 2.125,1.18c1.014,0.014 2.055,-0.139 3.152,-0.417Z" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_5_" d="M43.198,18.488c-1.471,0 -2.693,-0.5 -3.638,-1.5c-0.958,-1 -1.43,-2.236 -1.43,-3.707c0,-1.486 0.472,-2.708 1.416,-3.68c0.945,-0.972 2.167,-1.472 3.639,-1.472c1.471,0 2.68,0.5 3.596,1.5c0.93,0.999 1.389,2.235 1.389,3.707c0,1.472 -0.459,2.694 -1.389,3.68c-0.916,0.986 -2.111,1.472 -3.583,1.472" style="fill:#06c;fill-rule:nonzero;"/><path id="XMLID_4_" d="M38.13,25.451c0,-1.486 0.472,-2.708 1.416,-3.68c0.945,-0.972 2.167,-1.472 3.639,-1.472c1.471,0 2.68,0.5 3.596,1.5c0.93,0.999 1.389,2.235 1.389,3.707" style="fill:#06c;fill-rule:nonzero;"/></g></svg>
										<p>Non hai SPID?<br/><a href="https://www.spid.gov.it">Scopri di più</a>.</p>
									</div>
								</div><!-- /col-lg-3 -->
							</div><!-- /row -->
							<div class="row variable-gutters">
								<div class="col-lg-9">
									<div class="btn-wrapper mb-4">
										<a class="btn btn-purplelight" href="#">Richiesta di iscrizione online</a>
									</div>
									<h6>Documenti da presentare</h6>

									<div class="card card-bg bg-color rounded mb-5">
										<div class="card-body">
											<ul class="mb-0">
												<li>Eventuale certificato riguardante allergie o intolleranze alimentari</li>
											</ul>
										</div>
									</div>

								</div><!-- /col-lg-9 -->
							</div><!-- /row -->
							<h4 id="art-par-04">Scadenze e aggiornamenti</h4>
							<div class="row variable-gutters">
								<div class="col-lg-9">
									<p>Le graduatorie verranno aggiornate ogni mese con nuove assegnazioni e trasferimenti in base ai posti disponibili.</p>
									<div class="calendar-vertical mb-5">
										<div class="calendar-date">
											<div class="calendar-date-day">
												<p>20</p>
												<small>feb</small>
											</div><!-- /calendar-date-day -->
											<div class="calendar-date-description rounded">
												<div class="calendar-date-description-content">
													<p>Apertura domande</p>
												</div><!-- /calendar-date-description-content -->
											</div><!-- /calendar-date-description -->
										</div><!-- /calendar-date -->
										<div class="calendar-date">
											<div class="calendar-date-day">
												<p>20</p>
												<small>mar</small>
											</div><!-- /calendar-date-day -->
											<div class="calendar-date-description rounded">
												<div class="calendar-date-description-content">
													<p>Termine presentazione domande</p>
												</div><!-- /calendar-date-description-content -->
											</div><!-- /calendar-date-description -->
										</div><!-- /calendar-date -->
										<div class="calendar-date">
											<div class="calendar-date-day">
												<p>14</p>
												<small>apr</small>
											</div><!-- /calendar-date-day -->
											<div class="calendar-date-description rounded">
												<div class="calendar-date-description-content">
													<p>Pubblicazione graduatorie</p>
												</div><!-- /calendar-date-description-content -->
											</div><!-- /calendar-date-description -->
										</div><!-- /calendar-date -->
										<div class="calendar-date">
											<div class="calendar-date-day">
												<p>28</p>
												<small>apr</small>
											</div><!-- /calendar-date-day -->
											<div class="calendar-date-description rounded">
												<div class="calendar-date-description-content">
													<p>Pagamento quota di iscrizione</p>
												</div><!-- /calendar-date-description-content -->
											</div><!-- /calendar-date-description -->
										</div><!-- /calendar-date -->
									</div><!-- /calendar-vertical -->
								</div><!-- /col-lg-9 -->
							</div><!-- /row -->

							<h4 id="art-par-05">Metodi di pagamento</h4>
							<div class="row variable-gutters">
								<div class="col-lg-9">
									<p>È possibile effettuare il pagamento del servizio tramite bollettino postale, indicando nel destinatario il nome della scuola e del comune di riferimento, oppure online con metodi classici o PagoPA.</p>
								</div><!-- /col-lg-9 -->
							</div><!-- /row -->

							<h4 id="art-par-06">Costi</h4>
							<div class="row variable-gutters">
								<div class="col-lg-9">
									<p>Ogni utente dovrà corrispondere una quota di contribuzione al costo del servizio differenziata sulla base della situazione economica del nucleo familiare.</p>
									<p>Per usufruire delle quote di pagamento ridotte è necessario presentare ogni anno la domanda di agevolazione tariffaria entro il mese di luglio e comunque non oltre l'inizio dell'anno scolastico. Le domande presentate successivamente all'inizio dell'anno scolastico danno diritto all'agevolazione tariffaria a decorrere dal primo giorno del mese di presentazione.</p>
									<p>In caso di mancata presentazione della domanda di riduzione tariffaria, verrà applicata d’ufficio la tariffa massima Il mancato pagamento delle tariffe comporterà l’attivazione della riscossione coattiva secondo le modalità previste dalla legge.</p>
									<p>Per informazioni dettagliate su tariffe e benefici tariffari si rimanda alla scheda allegata.</p>
								</div><!-- /col-lg-9 -->
							</div><!-- /row -->

							<h4 id="art-par-07" class="mb-4">Pagamento online</h4>
							<div class="row variable-gutters mb-5">
								<div class="col-lg-9">
									<a class="btn btn-primary btn-img" href="#">
										<svg width="100%" height="100%" viewBox="0 0 38 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><path id="icon-pagopa" d="M26.308,8.198l-0.011,3.033l-2.189,0l0,-10.231l4.046,0c1.305,0 1.957,0.358 1.968,1.063l0,4.982c0,0.705 -0.63,1.063 -1.901,1.063l-1.913,0l0,0.09Zm1.625,-6.011l-1.636,0l0,4.735l1.636,0l0,-4.735Zm-24.975,9.044l-0.011,3.034l-1.824,0l0,-10.22l3.383,0c1.094,0 1.636,0.358 1.647,1.063l0,4.982c0,0.705 -0.531,1.063 -1.592,1.063l-1.603,0l0,0.078Zm1.371,-6l-1.371,0l0,4.735l1.371,0l0,-4.735Zm7.474,5.922l-3.483,0c-1.028,0 -1.537,-0.358 -1.537,-1.063l0.011,-2.071c0,-0.694 0.531,-1.053 1.592,-1.064l1.603,0l0,-1.712l-1.381,0l-0.012,0.94l-1.791,0l0,-1.064c0,-0.694 0.542,-1.041 1.615,-1.041l1.791,-0.022c1.061,0 1.592,0.358 1.603,1.063l-0.011,6.034Zm-3.195,-1.187l1.381,0l-0.011,-1.824l-1.37,0l0,1.824Zm7.197,1.187l-1.603,0c-1.062,0 -1.592,-0.358 -1.592,-1.063l0,-4.982c0,-0.705 0.553,-1.063 1.647,-1.063l3.383,0l0,9.156c0,0.706 -0.531,1.064 -1.603,1.064l-1.824,0c-1.062,0 -1.603,-0.358 -1.603,-1.064l0,-1.063l1.824,0l0,0.929l1.371,0l0,-1.858l0,-0.056Zm-1.371,-1.187l1.371,0l0,-4.735l-1.371,0l0,4.735Zm8.856,0.124c-0.011,0.705 -0.553,1.063 -1.648,1.063l-1.769,0c-1.072,0 -1.614,-0.358 -1.614,-1.063l0,-4.993c0,-0.705 0.542,-1.063 1.614,-1.063l1.825,0c1.061,0 1.592,0.358 1.592,1.063l0,4.993Zm-1.813,-4.859l-1.382,0l0,4.735l1.37,0l0.012,-4.735Zm15.389,-3.112l0.011,8.597c0,7.892 -6.313,14.284 -14.107,14.284c-4.522,0 -8.535,-2.149 -11.122,-5.496l-1.404,1.13l-0.199,-6.313l4.389,2.989l-1.095,0.839c2.189,2.832 5.595,4.657 9.42,4.657c6.6,0 11.929,-5.396 11.929,-12.078l0,-2.609l-1.647,0l0,3.124l-2.189,0l0,-9.124c0,-0.716 0.641,-1.063 1.924,-1.063l2.189,0c1.271,0 1.901,0.358 1.901,1.063Zm-2.178,4.814l0,-4.69l-1.647,0l0,4.69l1.647,0Z" style="fill:#fff;fill-rule:nonzero;"/></svg>
										<span>Paga adesso</span>
									</a>
								</div><!-- /col-lg-9 -->
							</div><!-- /row -->

							<h4 id="art-par-08" class="mb-4">Allegati</h4>

							<h6>Documenti generali</h6>
							<div class="row variable-gutters">
								<div class="col-lg-12">
									<div class="card-deck card-deck-spaced">
										<div class="card card-bg card-icon rounded">
											<div class="card-body">
												<svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-pdf-document"></use></svg>
												<div class="card-icon-content">
													<p><strong>Modalità di iscrizione</strong></p>
													<small>255 kb</small>
												</div><!-- /card-icon-content -->
											</div><!-- /card-body -->
										</div><!-- /card card-bg card-icon rounded -->
										<div class="card card-bg card-icon rounded">
											<div class="card-body">
												<svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-pdf-document"></use></svg>
												<div class="card-icon-content">
													<p><strong>Modalità di pagamento</strong></p>
													<small>300 kb</small>
												</div><!-- /card-icon-content -->
											</div><!-- /card-body -->
										</div><!-- /card card-bg card-icon rounded -->
									</div><!-- /card-deck card-deck-spaced -->
								</div><!-- /col-lg-12 -->
							</div><!-- /row -->

							<h6>Approfondimenti</h6>
							<div class="row variable-gutters">
								<div class="col-lg-12">
									<div class="card-deck card-deck-spaced">
										<div class="card card-bg card-icon rounded">
											<div class="card-body">
												<svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-pdf-document"></use></svg>
												<div class="card-icon-content">
													<p><strong>Calendario menu 2018/2019</strong></p>
													<small>756 kb</small>
												</div><!-- /card-icon-content -->
											</div><!-- /card-body -->
										</div><!-- /card card-bg card-icon rounded -->
										<div class="card card-bg card-icon rounded">
											<div class="card-body">
												<svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-pdf-document"></use></svg>
												<div class="card-icon-content">
													<p><strong>Menu vegano 2018/2019</strong></p>
													<small>482 kb</small>
												</div><!-- /card-icon-content -->
											</div><!-- /card-body -->
										</div><!-- /card card-bg card-icon rounded -->
										<div class="card card-bg card-icon rounded">
											<div class="card-body">
												<svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#it-pdf-document"></use></svg>
												<div class="card-icon-content">
													<p><strong>Informativa allergeni</strong></p>
													<small>344 kb</small>
												</div><!-- /card-icon-content -->
											</div><!-- /card-body -->
										</div><!-- /card card-bg card-icon rounded -->
									</div><!-- /card-deck card-deck-spaced -->
								</div><!-- /col-lg-12 -->
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
