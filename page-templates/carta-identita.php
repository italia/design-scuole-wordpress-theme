<?php
/* Template Name: Carta di Identità
 *
 * carta identità template file
 *
 * @package Design_Scuole_Italia
 */

get_header();

?>
	<main id="main-container" class="main-container redbrown">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>
		<?php
		while ( have_posts() ) :
			the_post();

			$img_identita = dsi_get_option("immagine", "carta_identita");
			$colid=6;
			$showimage = true;
			if($img_identita == ""){
			    // se non è stata caricata una immagine apro a schermo pieno
				$colid = 12;
				$showimage = false;
            }
			?>

			<section class="section bg-white section-hero">
				<div class="container">
					<div class="row variable-gutters">
						<div class="col-md-<?php echo $colid; ?>">
							<div class="hero-title">
								<small><?php the_title(); ?></small>
								<h1><?php echo dsi_get_option("tipologia_scuola"); ?> <span class="text-redbrown"><?php echo dsi_get_option("nome_scuola"); ?></span></h1>
							</div><!-- /hero-title -->
						</div><!-- /col-md-<?php echo $colid; ?> -->
					</div><!-- /row -->
				</div><!-- /container -->
                <?php if($showimage){ ?>
                <div class="hero-img" style="background: url('<?php echo $img_identita; ?>')  no-repeat center top; background-size: cover; "></div>
                <?php } ?>
			</section><!-- /section -->
            <?php
            // check citazione
			$citazione = dsi_get_option("citazione", "carta_identita");
			if(trim($citazione) != ""){
			    ?>
                <section class="section py-4 bg-redbrown big-quote-wrapper">
                    <div class="big-quote-bg">
                        <svg width="100%" height="100%" viewBox="0 0 1280 463" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
              <g id="Quote-Desktop" serif:id="Quote/Desktop">
                  <rect id="red-to-red" x="0" y="0" width="1280" height="463" style="fill:url(#_Linear1);"/>
                  <path id="Path-11" d="M1193.68,448.626l-1193.68,-215.78l0,-232.846l1280,0l0,463l-86.32,-14.374Z" style="fill:url(#_Linear2);"/>
                  <path id="Path-11-Copy" d="M915.875,0l364.125,3l0,460l-364.125,-463Z" style="fill:url(#_Linear3);"/>
                  <rect id="Rectangle" x="0" y="0" width="1280" height="179.71" style="fill:url(#_Linear4);"/>
              </g>
                            <defs>
                                <linearGradient id="_Linear1" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(-1280,-60.5791,60.5791,-1280,1280,261.79)">
                                    <stop offset="0" style="stop-color:#d1344c;stop-opacity:1"/>
                                    <stop offset="1" style="stop-color:#ab2b3e;stop-opacity:1"/>
                                </linearGradient>
                                <linearGradient id="_Linear2" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(516.161,-33.3395,-33.3395,-516.161,1.47553,263.61)">
                                    <stop offset="0" style="stop-color:#f83e5a;stop-opacity:1"/>
                                    <stop offset="0.52" style="stop-color:#f83e5a;stop-opacity:0.784314"/>
                                    <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"/>
                                </linearGradient>
                                <linearGradient id="_Linear3" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(91.0761,-255.538,-255.538,-91.0761,985.332,477.64)">
                                    <stop offset="0" style="stop-color:#c2bfff;stop-opacity:0"/>
                                    <stop offset="0.52" style="stop-color:#f83e5a;stop-opacity:0.784314"/>
                                    <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"/>
                                </linearGradient>
                                <linearGradient id="_Linear4" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse" gradientTransform="matrix(7.04e-05,-162.496,209.621,5.45735e-05,658.576,179.71)">
                                    <stop offset="0" style="stop-color:#d1344c;stop-opacity:0"/>
                                    <stop offset="1" style="stop-color:#d1344c;stop-opacity:1"/>
                                </linearGradient>
                            </defs>
            </svg>
                    </div>
                    <div class="container">
                        <div class="row variable-gutters justify-content-center">
                            <div class="col-md-10">
                                <div class="big-quote">
                                    <h2><?php echo $citazione; ?></h2>
                                </div><!-- /big-quote -->
                            </div><!-- /col-md-10 -->
                        </div><!-- /row -->
                    </div><!-- /container -->
                </section><!-- /section -->
                <?php
            }

			$gallery = dsi_get_option("immagini", "carta_identita");
			if(is_array($gallery) && count($gallery) > 0){
			    ?>
                <section class="section section-padding bg-gray-light">
                    <div class="container">
                        <div class="row variable-gutters">
                            <div class="col">
                                <div class="owl-carousel carousel-theme carousel-simple">
                                    <?php
                                    foreach ($gallery as $ida=>$urlg){
	                                    $attach = get_post($ida);
	                                    $imageatt =  wp_get_attachment_image_src($ida, "item-gallery");

                                    ?>
                                        <div class="item gallery-item">
                                            <a href="<?php echo $urlg; ?>">
                                                <figure>
                                                    <img src="<?php echo $imageatt[0]; ?>">
                                                    <figcaption><?php echo $attach->post_title; ?></figcaption>
                                                </figure>
                                            </a>
                                        </div><!-- /item -->
                                    <?php
                                    }
                                    ?>
                                </div><!-- /carousel-large -->
                            </div><!-- /col -->
                        </div><!-- /row -->
                    </div><!-- /container -->
                </section><!-- /section -->
                <?php
            }

			$studenti = dsi_get_option( "studenti", "carta_identita" );
			$classi = dsi_get_option( "classi", "carta_identita" );
			$media = intval($studenti / $classi);
			?>

			<section class="section section-padding pb-3 bg-white">
				<div class="container">
					<div class="row variable-gutters">
						<div class="col-md-6">
							<div class="title-section">
								<h3 class="mb-3 mb-xl-5"><?php _e("La scuola in numeri", "design_scuole_italia"); ?></h3>
								<p><?php echo dsi_get_option("numeri_descrizione", "carta_identita"); ?></p>
							</div><!-- /title-section -->
						</div><!-- /col-md-6 -->
					</div><!-- /row -->
					<div class="row variable-gutters">
						<div class="col-md-4">
							<div class="big-data">
								<p><?php echo $studenti; ?></p>
								<div class="big-data-details">
									<svg class="svg-smile"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-smile"></use></svg>
									<p><?php _e("Numero alunni", "design_scuole_italia"); ?></p>
								</div><!-- /big-data-details -->
							</div><!-- /big-data -->
						</div><!-- /col-md-4 -->
						<div class="col-md-4">
							<div class="big-data">
								<p><?php echo $classi; ?></p>
								<div class="big-data-details">
									<svg class="svg-classes"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-classes"></use></svg>
									<p><?php _e("Numero classi", "design_scuole_italia"); ?></p>
								</div><!-- /big-data-details -->
							</div><!-- /big-data -->
						</div><!-- /col-md-4 -->
						<div class="col-md-4">
							<div class="big-data-rounded">
								<div class="big-data-rounded-content">
									<p><?php echo $media; ?></p>
									<small><?php _e("Media alunni / classe", "design_scuole_italia"); ?></small>
								</div><!-- /big-data-rounded-content -->
							</div><!-- /big-data-rounded -->
						</div><!-- /col-md-4 -->
					</div><!-- /row -->
                    <?php
                    $url_scuoleinchiaro = dsi_get_option( "url_scuoleinchiaro", "carta_identita" );
                    if($url_scuoleinchiaro != ""){
                        ?>
                        <div class="row variable-gutters mb-4">
                            <div class="col d-flex justify-content-center">
                                <a class="btn btn-redbrown" href="<?php echo $url_scuoleinchiaro; ?>" target="_blank"><?php _e("Vedi tutto su scuole in chiaro", "design_scuole_italia"); ?></a>
                            </div><!-- /col -->
                        </div><!-- /row -->
                        <?php
                    }
                    ?>
				</div><!-- /container -->
			</section><!-- /section -->

            <?php
			// le carte
            $gruppo_carte = dsi_get_option( "link_schede_documenti", "carta_identita" );
            if(is_array($gruppo_carte) && count($gruppo_carte) > 0) {
	            ?>
                <section class="section section-padding bg-redbrown bg-white-strip">
                    <div class="container">
                        <div class="row variable-gutters mt-0 mt-xl-5">
                            <div class="col">
                                <div class="title-section text-center mb-5">
                                    <h3 class="mb-2"><?php _e( "Le carte dalla scuola", "design_scuole_italia" ); ?></h3>
                                    <p><?php echo dsi_get_option( "descrizione_carte", "carta_identita" ); ?></p>
                                </div><!-- /title-section -->
                            </div><!-- /col -->
                        </div><!-- /row -->
                        <div class="row variable-gutters">
                            <div class="col">
                                <div class="owl-carousel carousel-theme carousel-cards">
                                    <?php
                                    foreach ( $gruppo_carte as $carta ) {
                                        $doc = get_post($carta);
                                        ?>
                                        <div class="item item-card">
                                            <div class="card card-icon card-bg card-large card-folded card-no-shadow rounded">
                                                <div class="card-title card-title-icon">
                                                    <svg class="svg-classes">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             xlink:href="#svg-classes"></use>
                                                    </svg>
                                                    <h3><a href="<?php echo get_permalink($doc); ?>"><?php echo $doc->post_title; ?></a></h3>
                                                </div><!-- /card-body -->
                                                <div class="card-body card-body-min-height">
                                                    <p><?php  echo get_the_excerpt($doc); ?></p>
                                                </div><!-- /card-body -->
                                                <div class="card-bottom">
                                                    <a class="read-more" href="<?php echo get_permalink($doc); ?>">Scopri</a>
                                                </div><!-- /card-bottom -->
                                            </div><!-- /card -->
                                        </div><!-- /item -->
                                        <?php
                                    }
                                    ?>
                                </div><!-- /carousel-calendar -->
                            </div><!-- /col -->
                        </div><!-- /row -->
                    </div><!-- /container -->
                </section><!-- /section -->
	            <?php
            }// fine carte


            // la storia
			$timeline = dsi_get_option( "timeline", "carta_identita" );
			if(is_array($timeline) && count($timeline) > 0) {
				?>
                <section class="section section-padding bg-blue-dark">
                    <div class="container">
                        <div class="row variable-gutters mt-0 mt-xl-5">
                            <div class="col">
                                <div class="title-section text-center mb-5">
                                    <h3 class="mb-2" style="color: #ffffff;"><?php _e( "La Storia della scuola", "design_scuole_italia" ); ?></h3>
                                    <p style="color: #ffffff;"><?php echo dsi_get_option( "descrizione_scuola", "carta_identita" ); ?></p>
                                </div><!-- /title-section -->
                            </div><!-- /col -->
                        </div><!-- /row -->
                        <div class="row variable-gutters">
                            <div class="col">

                                <div class="owl-carousel carousel-theme carousel-calendar">
                                    <?php
                                    foreach ( $timeline as $item ) {
                                        ?>
                                        <div class="item item-calendar">
                                                <div class="card card-img card-serif">
                                                    <div class="card-body px-0">
                                                        <h5><?php echo date_i18n("F Y", strtotime($item["data_timeline"])); ?></h5>
                                                        <h3><?php echo $item["titolo_timeline"] ?></h3>
                                                        <p><?php echo $item["descrizione_timeline"] ?></p>
                                                    </div><!-- /card-body -->
                                                </div><!-- /card -->
                                        </div><!-- /item -->
                                        <?php
                                    }
                                    ?>
                                </div><!-- /carousel-calendar -->

                                <div class="owl-carousel carousel-theme carousel-calendar-years">
                                    <?php
                                    foreach ( $timeline as $item ) {
	                                    ?>
                                        <div class="item item-calendar-year">
                                            <div class="dot-text">
                                                <span><?php echo date_i18n("Y", strtotime($item["data_timeline"])); ?></span>
                                            </div><!-- /dot-text -->
                                        </div><!-- /item -->
	                                    <?php
                                    }
                                    ?>
                                </div><!-- /carousel-calendar-years -->
                            </div><!-- /col -->
                        </div><!-- /row -->
                    </div><!-- /container -->
                </section><!-- /section -->
				<?php
			}// end timeline
		endwhile; // End of the loop.
		?>

        <section class="section section-padding bg-blue-dark">
            <div class="container">
                    <p><?php _e("Eccetto dove diversamente specificato, questo articolo è stato rilasciato sotto Licenza Creative Commons Attribuzione 3.0 Italia.", "design_scuole_italia"); ?></p>
            </div>
        </section>
	</main>

<?php
get_footer();



