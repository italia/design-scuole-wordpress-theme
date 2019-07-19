<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $luogo, $c;
get_header();

$link_schede_luoghi = dsi_get_meta("link_schede_luoghi");
$nome_luogo_custom = dsi_get_meta("nome_luogo_custom");


?>
    <main id="main-container" class="main-container bluelectric">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

		<?php while ( have_posts() ) :  the_post();
			$image_url = get_the_post_thumbnail_url($post, "item-gallery");
			$autore = get_user_by("ID", $post->post_author);
			?>
            <section class="section bg-white article-title">
				<?php if(has_post_thumbnail($post)){ ?>
                    <div class="title-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
					<?php
					$colsize = 6;
				}else{
					$colsize = 12;
				} ?>
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-md-<?php echo $colsize; ?> flex align-items-center">
                            <div class="title-content">
                                <h1 class="h2"><?php the_title(); ?></h1>
                                <h3 class="text-bluelectric mb-3"><?php echo dsi_get_date_evento($post); ?></h3>
                                <p class="mb-0"><?php echo dsi_get_meta("descrizione"); ?></p>
								<?php
								global $badgeclass;
								$badgeclass = "badge-outline-bluelectric";
								get_template_part("template-parts/common/badges-argomenti");
								?>
                                <aside class="badges-wrapper badges-main mt-0">
                                    <h4><?php _e("Insegnante", "design_scuole_italia"); ?></h4>
                                    <div class="card card-avatar card-comments mt-3">
                                        <div class="card-body p-0">
				                            <?php get_template_part("template-parts/autore/card", "insegnante"); ?>
                                        </div><!-- /card-body -->
                                    </div><!-- /card card-avatar -->
                                </aside>
                            </div><!-- /title-content -->
                        </div><!-- /col-md-6 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

            <section class="section bg-white">
                <div class="container container-border-top">
                    <div class="row variable-gutters">
                        <div class="col-lg-3 aside-border px-0">
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
                        <div class="col-lg-6">
                            <article class="article-wrapper pt-4 px-3">
                                <h4 id="art-par-cosa"><?php _e("Presentazione", "design_scuole_italia"); ?></h4>
                                <h6><?php _e("Obiettivi", "design_scuole_italia"); ?></h6>

								<?php
								$obiettivi = dsi_get_meta("obiettivi");
								echo wpautop($obiettivi);

								if(count($link_schede_luoghi) || ($nome_luogo_custom != "")) {
									?>

                                    <h6><?php _e( "Luogo", "design_scuole_italia" ); ?></h6>

									<?php
									$c = 0;
									if ( is_array( $link_schede_luoghi ) && count( $link_schede_luoghi ) > 0 ) {
										foreach ( $link_schede_luoghi as $idluogo ) {
											$c ++;
											$luogo = get_post( $idluogo );
											get_template_part( "template-parts/luogo/card", "large" );
										}
									} else if ( $nome_luogo_custom != "" ) {
										get_template_part( "template-parts/luogo/card", "custom" );

									}
								}
								global $classe;
								$classi = dsi_get_meta("classi");
								if(is_array($classi) && count($classi)>0) {
									?>
                                    <h6><?php _e( "Classi partecipanti", "design_scuole_italia" ); ?></h6>
                                    <div class="card-deck card-deck-spaced mb-4">
										<?php
										foreach ( $classi as $idclasse ) {
											$classe = get_term( $idclasse );
											get_template_part( "template-parts/classe/card" );
										}
										?>
                                    </div>
									<?php }  ?>
                                <?php if($post->post_content != ""){ ?>
                                <h4 id="art-par-risultati"><?php _e("Risultati", "design_scuole_italia"); ?></h4>
                                <?php the_content(); ?>
                                <?php }  ?>
                                <?php get_template_part("template-parts/single/bottom"); ?>
                            </article>
                        </div><!-- /col-lg-6 -->
                        <div class="col-lg-3 aside-border-left px-0">
                            <div class="aside-sticky">
								<?php get_template_part("template-parts/evento/calendar"); ?>
                            </div>
                        </div><!-- /col-lg-3 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

			<?php get_template_part("template-parts/single/more-posts"); ?>

		<?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
