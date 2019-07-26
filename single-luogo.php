<?php
/**
 * The template for displaying all single luogo
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $luogo, $servizio, $struttura;

$luogo = $post;
get_header();
?>


	<main id="main-container" class="main-container redbrown">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

		<?php while ( have_posts() ) :  the_post();
			$image_url = get_the_post_thumbnail_url($post, "item-gallery");
			$autore = get_user_by("ID", $post->post_author);

			$descrizione_breve = dsi_get_meta("descrizione_breve");
			$anno_costruzione = dsi_get_meta("anno_costruzione");
			$numero_piani = dsi_get_meta("numero_piani");
			$gallery = dsi_get_meta("gallery");
			$video = dsi_get_meta("video");
			$link_strutture = dsi_get_meta("link_strutture");
			$orario_pubblico = dsi_get_meta("orario_pubblico");
			$altre_info = dsi_get_meta("info");
			$servizi_presenti = dsi_get_meta("servizi_presenti");
			$modalita_accesso = dsi_get_meta("modalita_accesso");
			$gestito_da_nome  = dsi_get_meta("gestito_da_nome");
			$gestito_da_link  = dsi_get_meta("gestito_da_link");

			if($post->post_parent == 0){
				$indirizzo = dsi_get_meta("indirizzo");
				$posizione_gps = dsi_get_meta("posizione_gps");
				$cap = dsi_get_meta("cap");
				$mail = dsi_get_meta("mail");
				$telefono = dsi_get_meta("telefono");
			}else{
				$indirizzo = dsi_get_meta("indirizzo", "_dsi_luogo_", $post->post_parent);
				$posizione_gps = dsi_get_meta("posizione_gps", "_dsi_luogo_", $post->post_parent);
				$cap = dsi_get_meta("cap", "_dsi_luogo_", $post->post_parent);
				$mail = dsi_get_meta("mail", "_dsi_luogo_", $post->post_parent);
				$telefono = dsi_get_meta("telefono", "_dsi_luogo_", $post->post_parent);
            }



			?>
			<section class="section bg-white article-title">
				<?php if(has_post_thumbnail($post)){ ?>
					<div class="title-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
					<?php
					$colsize = 6;
				}else{
					$colsize = 12;
				} ?>			<div class="container">
					<div class="row variable-gutters">
						<div class="col-md-<?php echo $colsize; ?>">
							<div class="title-content">
								<h1><?php the_title(); ?></h1>
                                <p class="mb-0"><?php echo $descrizione_breve; ?></p>
									<?php get_template_part("template-parts/common/badges-argomenti"); ?>
							</div><!-- /title-content -->
						</div><!-- /col-md-6 -->
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
										<span><?php _e("Dettagli del luogo", "design_scuole_italia"); ?> <?php the_title(); ?></span>
										<svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
									</a>
								</div>
								<div id="lista-paragrafi" class="link-list-wrapper collapse show">
									<ul class="link-list">
										<?php if($video){ ?>
											<li>
												<a class="list-item scroll-anchor-offset" href="#art-par-video" title="Vai al paragrafo <?php _e("Video", "design_scuole_italia"); ?>"><?php _e("Video", "design_scuole_italia"); ?></a>
											</li>
										<?php } ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-dove" title="Vai al paragrafo <?php _e("Dove si trova", "design_scuole_italia"); ?>"><?php _e("Dove si trova", "design_scuole_italia"); ?></a>
										</li>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-desc" title="Vai al paragrafo <?php _e("Descrizione", "design_scuole_italia"); ?>"><?php _e("Descrizione", "design_scuole_italia"); ?></a>
										</li>
										<?php if($modalita_accesso){ ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-accesso" title="Vai al paragrafo <?php _e("Modalità di accesso", "design_scuole_italia"); ?>"><?php _e("Modalità di accesso", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
										<?php if($servizi_presenti){ ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-servizi" title="Vai al paragrafo <?php _e("Servizi presenti nel luogo", "design_scuole_italia"); ?>"><?php _e("Servizi presenti nel luogo", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
										<?php if($link_strutture){ ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-strutture" title="Vai al paragrafo <?php _e("Il luogo è sede di", "design_scuole_italia"); ?>"><?php _e("Il luogo è sede di", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
										<?php if($gestito_da_nome != ""){ ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-gestione" title="Vai al paragrafo <?php _e("Gestito da", "design_scuole_italia"); ?>"><?php _e("Gestito da", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
										<?php if(trim($altre_info) != ""){ ?>
											<li>
												<a class="list-item scroll-anchor-offset" href="#art-par-altre-info" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Ulteriori informazioni", "design_scuole_italia"); ?>"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></a>
											</li>
										<?php } ?>
										<?php if((trim($anno_costruzione) != "") || (trim($numero_piani) != "")){ ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-dettagli" title="Vai al paragrafo <?php _e("Dettagli edificio", "design_scuole_italia"); ?>"><?php _e("Dettagli edificio", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
										<?php if(is_array($gallery) && count($gallery) > 0){ ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-galleria" title="Vai al paragrafo <?php _e("Galleria", "design_scuole_italia"); ?>"><?php _e("Galleria", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
									</ul>
								</div>
							</aside>

						</div>
						<div class="col-lg-8 col-md-8 offset-lg-1">
							<article class="article-wrapper pt-4">
								<div class="row variable-gutters">
									<div class="col-lg-12 d-flex justify-content-end">
										<?php get_template_part("template-parts/single/actions"); ?>
									</div><!-- /col-lg-12 -->
								</div><!-- /row -->
								<?php
								if($video) {
									?>
									<h4 id="art-par-video"><?php _e("Video", "design_scuole_italia"); ?></h4>
									<div class="row variable-gutters mb-5">
										<div class="col-lg-9">
											<?php echo wp_oembed_get ($video); ?>
										</div><!-- /col-lg-9 -->
									</div><!-- /row -->
									<?php
								}
								?>
								<h4 id="art-par-dove"><?php _e("Dove si trova", "design_scuole_italia"); ?></h4>
								<?php get_template_part("template-parts/luogo/card"); ?>

								<h4 id="art-par-desc"><?php _e("Descrizione", "design_scuole_italia"); ?></h4>
								<div class="row variable-gutters">
									<div class="col-lg-9">
										<?php the_content(); ?>
									</div><!-- /col-lg-9 -->
								</div><!-- /row -->

								<?php if($modalita_accesso){ ?>
								<h4 id="art-par-accesso" class="mb-4"><?php _e("Modalità di accesso", "design_scuole_italia"); ?></h4>
								<div class="row variable-gutters mb-5">
									<div class="col-lg-9">

									<?php
									foreach ($modalita_accesso as $tacc){
									//	print_r($tacc);
										$titolo = "";
										if($tacc["tipologia_accesso"] == "accessibilita")
											$titolo = "Accessibilità";
										else
											$titolo = ucfirst($tacc["tipologia_accesso"]);
										?>
										<div class="card card-bg card-icon-big rounded mb-4">
											<div class="card-icon-container">
												<?php get_template_part("template-parts/svg/icona",$tacc["tipologia_accesso"]); ?>
											</div><!-- /card-icon-container -->
											<div class="card-content">
												<h4><?php echo $titolo; ?></h4>
												<div class="row variable-gutters">
													<div class="col-lg-12">
														<p><strong><?php echo $tacc["titolo_accesso"]; ?></strong></p>
														<small><?php echo $tacc["Indirizzo_accesso"]; ?></small>
													</div><!-- /col-lg-12 -->
												</div><!-- /row -->
											</div><!-- /card-content -->
										</div><!-- /card card-bg card-icon-main rounded -->

										<?php
									}
									?>
									</div><!-- /col-lg-9 -->
								</div><!-- /row -->
								<?php } ?>

								<?php if($servizi_presenti){ ?>
									<h4 id="art-par-servizi" class="mb-4"><?php _e("Servizi presenti", "design_scuole_italia"); ?></h4>
									<div class="row variable-gutters">
										<div class="col-lg-12">
											<div class="card-deck card-deck-spaced">
												<?php foreach ($servizi_presenti as $idservizio){
													$servizio = get_post($idservizio);
													get_template_part("template-parts/servizio/card");
												} ?>
											</div><!-- /card-deck card-deck-spaced -->
										</div><!-- /col-lg-12 -->
									</div><!-- /row -->
								<?php } ?>

								<?php if($link_strutture){ ?>
									<h4 id="art-par-strutture" class="mb-4"><?php _e("Il luogo è sede di", "design_scuole_italia"); ?></h4>
									<div class="row variable-gutters mb-4">
										<div class="col-lg-12">
											<div class="card-deck card-deck-spaced">
											<?php
											foreach ( $link_strutture as $id_struttura ) {
												$struttura = get_post($id_struttura);

												get_template_part("template-parts/struttura/card");
											}
											?>
											</div><!-- /card-deck card-deck-spaced -->
										</div><!-- /col-lg-12 -->
									</div><!-- /row -->
								<?php } ?>
								<?php if($gestito_da_nome != ""){ ?>
								<h4 id="art-par-gestione"><?php _e("Gestito da", "design_scuole_italia"); ?></h4>
								<div class="row variable-gutters mb-3">
									<div class="col-lg-9">
										<p class="mb-3"><?php echo $gestito_da_nome; ?></p>
										<?php if($gestito_da_link != ""){ ?>
										<div class="btn-wrapper mb-5">
											<a class="btn btn-redbrown" href="<?php echo $gestito_da_link; ?>"><?php _e("Vai alla pagina del gestore", "design_scuole_italia"); ?></a>
										</div>
										<?php } ?>
									</div><!-- /col-lg-9 -->
								</div><!-- /row -->
								<?php } ?>
								<?php

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
								<?php if((trim($anno_costruzione) != "") || (trim($numero_piani) != "")){ ?>
								<h4 id="art-par-dettagli"><?php _e("Dettagli edificio", "design_scuole_italia"); ?></h4>
								<div class="row variable-gutters">
									<div class="col-lg-9">
										<div class="big-data-rounded-icon">
											<div class="big-data-rounded-icon-wrapper">
												<svg width="100%" height="100%" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                                                    <rect id="Rectangle-path" x="0" y="0.035" width="32" height="32" style="fill:none;"/>
													<path d="M4.294,2.738l2.602,-2.602c0.085,-0.074 0.127,-0.123 0.328,-0.136l17.552,0c0.02,0.001 0.041,0.003 0.061,0.004c0.198,0.039 0.152,0.032 0.267,0.132l2.621,2.621c0.165,0.065 0.197,0.165 0.215,0.406l0,28.354c-0.026,0.36 -0.124,0.439 -0.463,0.463l-9.453,0c-1.348,0.045 -2.698,0 -4.047,0l-9.454,0c-0.359,-0.026 -0.438,-0.123 -0.463,-0.463l0,-28.354c0.019,-0.26 0.076,-0.374 0.234,-0.425Zm22.72,0.888l-22.028,0l0,27.428l8.513,0c-0.037,-1.645 0.013,-3.292 0.013,-4.938c0.008,-0.241 0.192,-0.437 0.431,-0.461c1.371,-0.047 2.743,-0.047 4.114,0c0.228,0.023 0.407,0.202 0.43,0.43c0.057,1.655 0.011,3.313 0.002,4.969l8.525,0l0,-27.428Zm-9.452,22.953l-3.124,0l0,4.475l3.124,0l0,-4.475Zm-6.261,-7.676c0.23,0.02 0.415,0.203 0.435,0.436c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.24 -0.193,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.196 -0.462,-0.436c-0.04,-1.359 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.196,-0.442 0.436,-0.463c1.367,-0.039 2.737,-0.039 4.104,0Zm6.751,0c0.23,0.02 0.415,0.203 0.435,0.436c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.24 -0.193,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.196 -0.462,-0.436c-0.04,-1.359 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.193,-0.441 0.436,-0.463c1.367,-0.039 2.737,-0.039 4.104,0Zm6.751,0c0.23,0.02 0.415,0.203 0.435,0.436c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.24 -0.193,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.193 -0.462,-0.436c-0.04,-1.359 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.193,-0.441 0.436,-0.463c1.367,-0.039 2.737,-0.039 4.104,0Zm-13.992,0.925l-3.124,0l0,3.125l3.124,0l0,-3.125Zm6.751,0l-3.124,0l0,3.125l3.124,0l0,-3.125Zm6.751,0l-3.124,0l0,3.125l3.124,0l0,-3.125Zm-13.012,-7.676c0.231,0.021 0.415,0.205 0.435,0.436c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.241 -0.196,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.196 -0.462,-0.436c-0.04,-1.358 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.193,-0.441 0.436,-0.463c1.367,-0.039 2.737,-0.039 4.104,0Zm6.751,0c0.23,0.021 0.415,0.203 0.435,0.436c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.24 -0.193,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.193 -0.462,-0.436c-0.04,-1.358 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.196,-0.442 0.436,-0.463c1.367,-0.039 2.737,-0.039 4.104,0Zm6.751,0c0.23,0.021 0.415,0.203 0.435,0.436c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.24 -0.193,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.193 -0.462,-0.436c-0.04,-1.358 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.196,-0.442 0.436,-0.463c1.367,-0.039 2.737,-0.039 4.104,0Zm-13.992,0.926l-3.124,0l0,3.124l3.124,0l0,-3.124Zm6.751,0l-3.124,0l0,3.124l3.124,0l0,-3.124Zm6.751,0l-3.124,0l0,3.124l3.124,0l0,-3.124Zm0.49,-7.676c0.23,0.02 0.415,0.202 0.435,0.435c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.241 -0.193,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.442,-0.196 -0.462,-0.436c-0.04,-1.358 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.193,-0.441 0.436,-0.462c1.367,-0.04 2.737,-0.04 4.104,0Zm-13.502,0c0.231,0.02 0.415,0.204 0.435,0.435c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.241 -0.196,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.193 -0.462,-0.436c-0.04,-1.358 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.196,-0.441 0.436,-0.462c1.367,-0.04 2.737,-0.04 4.104,0Zm6.751,0c0.231,0.02 0.415,0.204 0.435,0.435c0.04,1.358 0.001,2.718 0.001,4.077c-0.007,0.241 -0.193,0.441 -0.436,0.462c-1.358,0.04 -2.718,0.001 -4.077,0.001c-0.241,-0.007 -0.441,-0.196 -0.462,-0.436c-0.04,-1.358 -0.001,-2.718 -0.001,-4.077c0.007,-0.241 0.196,-0.441 0.436,-0.462c1.367,-0.04 2.737,-0.04 4.104,0Zm-7.241,0.925l-3.124,0l0,3.124l3.124,0l0,-3.124Zm13.502,0l-3.124,0l0,3.124l3.124,0l0,-3.124Zm-6.751,0l-3.124,0l0,3.124l3.124,0l0,-3.124Zm-11.921,-3.627l20.718,0l-1.775,-1.774l-17.168,0l-1.775,1.774Z"/>
                                                </svg>
											</div><!-- /big-data-rounded-icon-wrapper -->
											<div class="big-data-rounded-icon-content">
												<?php if($anno_costruzione){ ?>
												<h4><?php _e("Anno di costruzione", "design_scuole_italia"); ?></h4>
												<p><?php echo $anno_costruzione; ?></p>
												<?php } ?>
												<?php if($numero_piani){ ?>
												<h4><?php _e("Numero di piani", "design_scuole_italia"); ?></h4>
												<p><?php echo $numero_piani; ?></p>
												<?php } ?>
											</div>
										</div><!-- /big-data-rounded-icon -->
									</div><!-- /col-lg-9 -->
								</div><!-- /row -->
								<?php } ?>
							</article>
						</div><!-- /col-lg-8 -->
					</div><!-- /row -->
				</div><!-- /container -->
			</section>

			<?php if(is_array($gallery) && count($gallery) > 0){ ?>
			<section class="section bg-gray-light py-5" id="art-par-galleria">
				<div class="container py-4">
					<div class="title-section text-center mb-5">
						<h3 class="h4"><?php _e("Gallery", "design_scuole_italia"); ?> <?php the_title(); ?></h3>
					</div><!-- /title-large -->
                    <div class="row variable-gutters">
                        <div class="col">
                            <div class="owl-carousel carousel-theme carousel-simple">
                    <?php get_template_part("template-parts/single/gallery", $post->post_type); ?>
                            </div><!-- /carousel-large -->
                        </div><!-- /col -->
                    </div><!-- /row -->
				</div><!-- /container -->
			</section><!-- /section -->
			<?php } ?>
		<?php  	endwhile; // End of the loop. ?>


		<?php
        global $related_type;
		$related_type = "card-white";
        get_template_part("template-parts/single/more-posts"); ?>

    </main><!-- #main -->

<?php
get_footer();

