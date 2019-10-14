<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $luogo, $c, $struttura;
get_header();

$is_luogo_scuola = dsi_get_meta("is_luogo_scuola");

$link_schede_luoghi = dsi_get_meta("link_schede_luoghi");
$nome_luogo_custom = dsi_get_meta("nome_luogo_custom");
$link_strutture = dsi_get_meta("link_strutture");

?>
    <main id="main-container" class="main-container bluelectric">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

		<?php while ( have_posts() ) :  the_post();
			$image_url = get_the_post_thumbnail_url($post, "item-gallery");
			$autore = get_user_by("ID", $post->post_author);
			?>


        <section class="section bg-white article-title">
            <div class="title-img" <?php if(has_post_thumbnail($post)){ ?>style="background-image: url('<?php echo $image_url; ?>');" <?php } ?>></div>
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="title-content">
                            <h1 class="h2"><?php the_title(); ?></h1>
                            <?php
                            $anno_scolastico =  dsi_get_meta("anno_scolastico");

                            // recupero l'anno scolastico di riferimento del progetto
                            if($anno_scolastico){
                                ?>
                                <i><?php _e("Anno scolastico", "design_scuola_italia"); ?> <?php echo dsi_convert_anno_scuola($anno_scolastico) ?></i>
                                <?php
                            }
                            ?>
                            <p class="mb-0"><?php echo dsi_get_meta("descrizione"); ?></p>
                            <?php
                            global $badgeclass;
                            $badgeclass = "badge-outline-bluelectric";
                            get_template_part("template-parts/common/badges-argomenti");
                            ?>
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
                                        <span><?php _e("Indice del progetto", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-cosa" title="Vai al paragrafo <?php _e("Presentazione", "design_scuole_italia"); ?>"><?php _e("Presentazione", "design_scuole_italia"); ?></a>
                                        </li>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-risultati" title="Vai al paragrafo <?php _e("Risultati", "design_scuole_italia"); ?>"><?php _e("Risultati", "design_scuole_italia"); ?></a>
                                        </li>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-correlati" title="Vai al paragrafo <?php _e("Contenuti correlati", "design_scuole_italia"); ?>">Contenuti correlati<?php _e("", "design_scuole_italia"); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </aside>

                        </div>
                        <div class="main-content col-lg-8 col-md-8 offset-lg-1 pt84">
                            <article class="article-wrapper pt-4 px-3">

                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                <h4 id="art-par-cosa"><?php _e("Presentazione", "design_scuole_italia"); ?></h4>
                                <h6 class="mb-2"><?php _e("Data", "design_scuole_italia"); ?></h6>
                                <p class="text-bluelectric"><strong><?php echo dsi_get_date_evento($post); ?></strong></p>
                                <h6><?php _e("Obiettivi", "design_scuole_italia"); ?></h6>

								<?php
								$obiettivi = dsi_get_meta("obiettivi");
								echo wpautop($obiettivi);

								if((is_array($link_schede_luoghi) && count($link_schede_luoghi)) || ($nome_luogo_custom != "")) {
									?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                    <h6><?php _e( "Luogo", "design_scuole_italia" ); ?></h6>

									<?php
									$c = 0;
									if ( $is_luogo_scuola == "true" && is_array( $link_schede_luoghi ) && count( $link_schede_luoghi ) > 0 ) {
										foreach ( $link_schede_luoghi as $idluogo ) {
											$c ++;
											$luogo = get_post( $idluogo );
											get_template_part( "template-parts/luogo/card", "large" );
										}
									} else if ( $nome_luogo_custom != "" ) {
										get_template_part( "template-parts/luogo/card", "custom" );

									}
								}
								?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->

                                <?php
                                if(is_array($link_strutture)) {
                                    ?>
                                    <h6><?php _e("Responsabile", "design_scuole_italia"); ?></h6>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <div class="card-deck card-deck-spaced mb-2">
                                                <?php
                                                foreach ($link_strutture as $idstruttura) {
                                                    $struttura = get_post($idstruttura);
                                                    get_template_part("template-parts/struttura/card");
                                                }
                                                ?>
                                        </div><!-- /card-deck -->
                                    </div><!-- /col-lg-12 -->
                                </div><!-- /row -->
                                    <?php
                                }
                                ?>




                                        <?php
								global $classe;
                                $partecipanti = dsi_get_meta("partecipanti");
                                if(trim($partecipanti)){
                                    ?>
                                    <h6><?php _e( "Partecipanti", "design_scuole_italia" ); ?></h6>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                    <?php
                                    echo wpautop($partecipanti);
                                    ?>
                                    </div>
                                </div>
                                        <?php
                                }

                                $classi = dsi_get_meta("classi");
								if(is_array($classi) && count($classi)>0) {
									?>
                                    <h6><?php _e( "Classi coinvolte", "design_scuole_italia" ); ?></h6>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">

                                    <div class="card-deck card-deck-spaced mb-4">
										<?php
										foreach ( $classi as $idclasse ) {
											$classe = get_term( $idclasse );
											get_template_part( "template-parts/classe/card" );
										}
										?>
                                    </div>
                                    </div>
                                </div>
									<?php }  ?>
                                <?php if($post->post_content != ""){ ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                <h4 id="art-par-risultati"><?php _e("Risultati", "design_scuole_italia"); ?></h4>
                                <?php the_content(); ?>
                                <?php }  ?>
                                <?php get_template_part("template-parts/single/bottom"); ?>
                                    </div>
                                </div>
                            </article>
                        </div><!-- /col-lg-6 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

			<?php get_template_part("template-parts/single/more-scheda_progetto"); ?>

		<?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
