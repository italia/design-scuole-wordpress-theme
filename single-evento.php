<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $luogo, $c;
$args = ["post", "evento", "circolare"];
get_template_part("template-parts/single/related-posts");

get_header();

$link_schede_luoghi = dsi_get_meta("link_schede_luoghi");
$nome_luogo_custom = dsi_get_meta("nome_luogo_custom");
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$file_documenti = dsi_get_meta("file_documenti");
$date = dsi_get_meta("date");
$fallback_image_url = get_template_directory_uri() ."/assets/placeholders/placeholder-1280x960.jpg";

$user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);
?>
    <main id="main-container" class="main-container greendark">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

		<?php while ( have_posts() ) :  the_post();
        set_views($post->ID);
			$image_url = get_the_post_thumbnail_url($post, "item-gallery");
			$autore = get_user_by("ID", $post->post_author);
			?>

				<?php if (has_post_thumbnail($post)) { ?>
                    <section class="section bg-white article-title">
                        <div class="title-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
                        <?php
                    } else { ?>
                        <section class="section bg-white article-title">
                            <div class="title-img" style="background-image: url('<?php echo $fallback_image_url; ?>');"></div>
                <?php } ?>
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-md-6 flex align-items-center">
                            <div class="title-content">
                                <h1 class="h2"><?php the_title(); ?></h1>
                                <h2 class="d-none"><?php echo get_post_type(); ?></h2>

                                <div class="h3 text-greendark mb-3"><?php echo dsi_get_date_evento($post); ?></div>
                                <p class="mb-0"><?php echo dsi_get_meta("descrizione"); ?></p>
								<?php 
                                $badgeclass = "badge-outline-greendark";
                                get_template_part("template-parts/common/badges-argomenti"); ?>
								<?php
								$link_schede_notizia = dsi_get_meta("link_schede_notizia");
								if(is_array($link_schede_notizia) && count($link_schede_notizia) > 0){
									foreach ($link_schede_notizia as $id_notizia){
										$notizia = get_post($id_notizia);
										?>
                                        <div class="text-icon">
                                            <a href="<?php echo get_permalink($notizia); ?>">
                                                <svg class="icon svg-link"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-link"></use></svg>
                                                <p><?php echo $notizia->post_title; ?></p>
                                            </a>
                                        </div>
										<?php
									}
								}
								?>
                            </div><!-- /title-content -->
                        </div><!-- /col-md-6 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

            <section class="section bg-white">
                <div class="container container-border-top">
                    <div class="row variable-gutters">
                        <?php if($user_can_view_post): ?>
                        <div class="col-lg-3 aside-border px-0">
                            <aside class="aside-main aside-sticky">
                                <div class="aside-title" id="event-legend">
                                    <a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi" role="button" aria-expanded="true" aria-controls="lista-paragrafi" aria-label="apri/chiudi indice della pagina">
                                        <span><?php _e("Indice dell'evento", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show" role="region" aria-labelledby="event-legend">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-cosa" title="Vai al paragrafo <?php _e("Cos'è", "design_scuole_italia"); ?>"><?php _e("Cos'è", "design_scuole_italia"); ?></a>
                                        </li>
										<?php 	if((is_array($link_schede_luoghi) && count($link_schede_luoghi)) || ($nome_luogo_custom != "")) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-luogo" title="Vai al paragrafo <?php _e("Luogo", "design_scuole_italia"); ?>"><?php _e("Luogo", "design_scuole_italia"); ?></a>
                                            </li>
										<?php }
										if($date) {
                                            ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-date"
                                                   title="Vai al paragrafo <?php _e("Date e Orari", "design_scuole_italia"); ?>"><?php _e("Date e Orari", "design_scuole_italia"); ?></a>
                                            </li>
                                            <?php } ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-costi" title="Vai al paragrafo <?php _e("Costi", "design_scuole_italia"); ?>"><?php _e("Costi", "design_scuole_italia"); ?></a>
                                        </li>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-contatti" title="Vai al paragrafo <?php _e("Contatti", "design_scuole_italia"); ?>"><?php _e("Contatti", "design_scuole_italia"); ?></a>
                                        </li>
										<?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-altro" title="Vai al paragrafo <?php _e("Ulteriori informazioni", "design_scuole_italia"); ?>">Ulteriori informazioni<?php _e("", "design_scuole_italia"); ?></a>
                                            </li>
										<?php } ?>
                                        <?php if ( is_array($posts_array) && count( $posts_array ) )  {   ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-correlati"
                                                title="Vai al paragrafo <?php _e("Circolari, notizie, eventi correlati", "design_scuole_italia"); ?>"><?php _e("Circolari, notizie, eventi correlati", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                     
                                    </ul>
                                </div>
                            </aside>

                        </div>
                        <div class="col-lg-6">
                            <article class="article-wrapper pt-4 px-3">
                                <h2 id="art-par-cosa" class="h4"><?php _e("Cos'è", "design_scuole_italia"); ?></h2>
                                <div class="col-lg-12 px-0 wysiwig-text">
                                <?php the_content(); ?>
                                </div>
								<?php
								global $gallery;
								$gallery = dsi_get_meta("gallery");
                            	if ( is_array( $gallery ) && count( $gallery ) > 0 ) {
                            	    ?>
								<h3  class="h6"><?php _e("Foto", "design_scuole_italia"); ?></h3>
                                <div class="row variable-gutters">
                                    <div class="col">
                                        <div class="it-carousel-wrapper inside-carousel splide" data-bs-carousel-splide>
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    <?php get_template_part( "template-parts/single/gallery", $post->post_type ); ?>
                                                </ul>
                                            </div><!-- /carousel-simple -->
                                        </div>
                                    </div><!-- /col -->
                                </div><!-- /row -->
		                            <?php
	                            }

								$video = dsi_get_meta("video");
								if($video) { ?>
								 <h3  class="h6 pt-5"><?php _e("Video", "design_scuole_italia"); ?></h3>
                                    <div class="video-container my-4">
										<?php echo wp_oembed_get ($video); ?>
                                    </div>
								<?php } ?>
                                <h3  class="h6"><?php _e("Destinatari", "design_scuole_italia"); ?></h3>
								<?php
								$descrizione_destinatari = dsi_get_meta("descrizione_destinatari");
								echo wpautop($descrizione_destinatari);
								?>

                                <?php
                                $persone_amministrazione = dsi_get_meta("persone_amministrazione");
                                if(is_array($persone_amministrazione)) {

                                    ?>
                                    <h3 class="h6"><?php _e("Parteciperanno", "design_scuole_italia"); ?></h3>

                                    <div class="card-deck card-deck-spaced mb-2">
                                        <?php
                                        foreach ($persone_amministrazione as $idutente) {
                                            $autore = get_user_by("ID", $idutente);
                                            ?>
                                            <div class="card card-bg card-avatar rounded">
                                                <?php
													$privacy_hidden = get_user_meta( $autore->ID, '_dsi_persona_privacy_hidden', true);
                        
													if($privacy_hidden == "false") {
														?><a href="<?php echo get_author_posts_url( $autore->ID);  ?>"><?php
													}
												?>
                                                    <div class="card-body">
                                                        <?php get_template_part("template-parts/autore/card"); ?>
                                                    </div>
                                                <?php
													if($privacy_hidden == "false") {
														?></a><?php
													}
												?>
                                            </div><!-- /card card-bg card-avatar rounded -->
                                            <?php
                                        }
                                        ?>
                                    </div><!-- /card-deck -->
                                    <?php
                                }

                                if((is_array($link_schede_luoghi) && count($link_schede_luoghi) > 0) || ($nome_luogo_custom != "" )) {
                                    ?>

                                    <h2 class="h4" id="art-par-luogo"><?php _e("Luogo", "design_scuole_italia"); ?></h2>

                                    <?php
                                    $c = 0;
                                    if (is_array($link_schede_luoghi) && count($link_schede_luoghi) > 0) {
                                        foreach ($link_schede_luoghi as $idluogo) {
                                            $c++;
                                            $luogo = get_post($idluogo);
                                            get_template_part("template-parts/luogo/card", "large");
                                        }
                                    } else if ($nome_luogo_custom != "") {
                                        get_template_part("template-parts/luogo/card", "custom");

                                    }
                                }
								?>
                                <?php
                                if($date) {
                                    ?>
                                    <h2 class="h4"  id="art-par-date"><?php _e("Date e Orari", "design_scuole_italia"); ?></h2>
                                    <div class="calendar-vertical mb-5">
                                        <?php

                                        $old_data = "";
                                        foreach ($date as $data) {

                                            ?>
                                            <div class="calendar-date">
                                                <div class="calendar-date-description rounded">
                                                    <div class="calendar-date-description-content">
                                                        <p><?php echo date_i18n("H:i", $data["data"]); ?><?php if (isset($data["descrizione"])) echo " - " . $data["descrizione"]; ?></p>
                                                    </div><!-- /calendar-date-description-content -->
                                                </div><!-- /calendar-date-description -->
                                                <h4 class="calendar-date-day">
                                                    <?php if ($old_data != date_i18n("dMY", $data["data"])) { ?>
                                                        <p><?php echo date_i18n("d", $data["data"]); ?></p>
                                                        <small><b><?php echo date_i18n("M", $data["data"]); ?></b></small>

                                                    <?php } ?>
                                                </h4><!-- /calendar-date-day -->
                                            </div><!-- /calendar-date -->
                                            <?php
                                            $old_data = date_i18n("dMY", $data["data"]);

                                        }
                                        /* else {

                                            $timestamp_inizio = dsi_get_meta("timestamp_inizio");
                                            $timestamp_fine = dsi_get_meta("timestamp_fine");
                                            $ora_inizio = date_i18n("H:i", $timestamp_inizio);
                                            $ora_fine = date_i18n("H:i", $timestamp_fine);

                                        ?>
                                        <div class="calendar-date">
                                            <div class="calendar-date-day">
                                                <small><?php echo date_i18n("Y", $timestamp_inizio); ?></small>
                                                <p><?php echo date_i18n("d", $timestamp_inizio); ?></p>
                                                <small><b><?php echo date_i18n("M", $timestamp_inizio); ?></b></small>

                                            </div><!-- /calendar-date-day -->
                                            <div class="calendar-date-description rounded">
                                                <div class="calendar-date-description-content">
                                                    <p><?php echo $ora_inizio; ?><?php if ($ora_fine != $ora_inizio) echo " - " . $ora_fine; ?></p>
                                                </div><!-- /calendar-date-description-content -->
                                            </div><!-- /calendar-date-description -->
                                        </div><!-- /calendar-date -->

                                            <div class="calendar-date">
                                                <div class="calendar-date-day">
                                                    <small><?php echo date_i18n("Y", $timestamp_fine); ?></small>
                                                    <p><?php echo date_i18n("d", $timestamp_fine); ?></p>
                                                    <small><b><?php echo date_i18n("M", $timestamp_fine); ?></b></small>

                                                </div><!-- /calendar-date-day -->
                                                <div class="calendar-date-description rounded">
                                                    <div class="calendar-date-description-content">
                                                        <p><?php echo $ora_inizio; ?><?php if ($ora_fine != $ora_inizio) echo " - " . $ora_fine; ?></p>
                                                    </div><!-- /calendar-date-description-content -->
                                                </div><!-- /calendar-date-description -->
                                            </div><!-- /calendar-date -->
                                        <?php
                                        } */ ?>

                                    </div><!-- /calendar-vertical -->
                                    <?php
                                }
								?>
                                <h2 class="h4" id="art-par-costi"><?php _e("Costi", "design_scuole_italia"); ?></h2>
								<?php
								$tipo_evento = dsi_get_meta("tipo_evento");
								$prezzo = dsi_get_meta("prezzo");
								if($tipo_evento == "gratis"){
									echo "<p>Evento Gratuito</p>";
								}else {
									foreach ($prezzo as $biglietto) {
										?>
                                        <div class="text-border-left">
                                            <div class="text-icon">
                                                <svg class="icon svg-ticket">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                         xlink:href="#svg-ticket"></use>
                                                </svg>
                                                <span><?php echo $biglietto["tipo_biglietto"]; ?></span>
                                            </div>
                                            <p class="price"><strong>€ <?php echo $biglietto["prezzo"]; ?></strong></p>
                                            <p><?php echo $biglietto["descrizione"]; ?></p>
                                        </div><!-- /text-border-left -->
										<?php
									}
								}
								?>

                                <h2 class="h4"  id="art-par-contatti"><?php _e("Contatti", "design_scuole_italia"); ?></h2>
								<?php
								$organizzato_da_scuola = dsi_get_meta("organizzato_da_scuola");
								$link_struttura = dsi_get_meta("link_struttura_organizzativa");
								if($organizzato_da_scuola == "si") {
									?>
                                    <div  class="h6"><?php _e( "Organizzato da", "design_scuole_italia" ); ?></div>
                                    <div class="card-deck card-deck-spaced">
										<?php
										global $icon_color, $second_icon_color;
										$icon_color        = "greendark";
										$second_icon_color = "#c8edc3";
										if(is_array($link_struttura)) {
										    foreach ($link_struttura as $id_struttura){
                                                $struttura = get_post( $id_struttura );

                                                get_template_part( "template-parts/struttura/card" );
                                            }

										}
										?>
                                    </div><!-- /card-deck card-deck-spaced -->
									<?php
								} ?>
                                <?php if((($organizzato_da_scuola != "si") && ((dsi_get_meta("contatto_telefono") != "") || (dsi_get_meta("contatto_persona") != "") || (dsi_get_meta("contatto_email") != ""))) || ((dsi_get_meta("website") != "") ||  (dsi_get_meta("patrocinato") != "") || (dsi_get_meta("sponsor") != "") )) { ?>
                                    <div class="in-evidence mb-5 py-4 pl-2 pr-2">
                                        <ul class="mb-0">
                                            <?php if (dsi_get_meta("website") != "") { ?>
                                                <li><strong
                                                        class="mr-2"><?php _e("Sito web:", "design_scuole_italia"); ?></strong>
                                                <a class="text-underline-hover" href="<?php echo dsi_get_meta("website"); ?>" aria-label="Vai a <?php echo dsi_get_meta("website"); ?> - link esterno"><?php echo dsi_get_meta("website"); ?></a>
                                                </li><?php } ?>
                                            <?php if (($organizzato_da_scuola != "si") && (dsi_get_meta("contatto_persona") != "")) { ?>
                                                <li><strong
                                                        class="mr-2"><?php _e("Referente:", "design_scuole_italia"); ?></strong> <?php echo dsi_get_meta("contatto_persona"); ?>
                                                </li><?php } ?>
                                            <?php if (($organizzato_da_scuola != "si") && (dsi_get_meta("contatto_telefono") != "")) { ?>
                                                <li><strong
                                                        class="mr-2"><?php _e("Telefono:", "design_scuole_italia"); ?></strong> <?php echo "<a href='tel:+39".dsi_get_meta("contatto_telefono")."'>".dsi_get_meta("contatto_telefono")."</a>"; ?>
	                                             </li><?php } ?>
                                            <?php if (($organizzato_da_scuola != "si") && (dsi_get_meta("contatto_email") != "")) { ?>
                                                <li><strong
                                                        class="mr-2"><?php _e("Email:", "design_scuole_italia"); ?></strong>
                                                <a href="mailto:<?php echo dsi_get_meta("contatto_email"); ?>"><?php echo dsi_get_meta("contatto_email"); ?></a>
                                                </li><?php } ?>
                                            <?php if (dsi_get_meta("patrocinato") != "") { ?>
                                                <li><strong
                                                        class="mr-2"><?php _e("Patrocinato da:", "design_scuole_italia"); ?></strong> <?php echo dsi_get_meta("patrocinato"); ?>
                                                </li><?php } ?>
                                            <?php if (dsi_get_meta("sponsor") != "") { ?>
                                                <li><strong
                                                        class="mr-2"><?php _e("Sponsor:", "design_scuole_italia"); ?></strong> <?php echo dsi_get_meta("sponsor"); ?>
                                                </li><?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>

								<?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){ ?>
                                    <h2 class="h4" id="art-par-altro"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h2>
                                    <div  class="h6"><?php _e("Documenti", "design_scuole_italia"); ?></div>
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
								<?php } ?>
								<?php get_template_part("template-parts/single/bottom"); ?>
                            </article>
                        </div><!-- /col-lg-6 -->
                        <div class="col-lg-3 aside-border-left px-0">
                            <div>
                                <div class="d-flex justify-content-end pb-4">
                                    <?php
                                    $timestamp_inizio = dsi_get_meta("timestamp_inizio");
                                    $timestamp_fine= dsi_get_meta("timestamp_fine");
                                    $data_inizio = date_i18n("Ymd", $timestamp_inizio);
                                    $data_fine = date_i18n("Ymd", $timestamp_fine);
                                    ?>
                                    <div class="actions-wrapper actions-main">
                                        <p><a class="text-underline text-greendark" target="_blank" href="https://calendar.google.com/calendar/r/eventedit?text=<?php echo urlencode(get_the_title()); ?>&dates=<?php echo $data_inizio; ?>/<?php echo $data_fine; ?>&details=<?php echo urlencode(dsi_get_meta("descrizione")); ?>:+<?php echo urlencode(get_permalink()); ?>&location=<?php echo urlencode(dsi_get_option("luogo_scuola")); ?>"> + aggiungi a Google Calendar</a></p>
                                    </div>
                                </div>

                                <?php
                                // get_template_part("template-parts/evento/calendar");
                                ?>
                                <div class="d-flex justify-content-end pb-4">
                                    <?php get_template_part("template-parts/single/actions"); ?>
                                </div>
                            </div>
                        </div><!-- /col-lg-3 -->
                        <?php else: ?>
                            <div class="col-lg-12 p-5 m-5 text-center font-weight-bold wysiwig-text">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

			<?php get_template_part("template-parts/single/more-posts"); ?>

		<?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
