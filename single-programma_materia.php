<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore;
get_template_part("template-parts/single/related-posts", $args = array( "programma_materia")); 
get_header();

$link_schede_materiale_didattico = dsi_get_meta("link_schede_materiale_didattico");
$file_documenti = dsi_get_meta("file_documenti");
$link_progetti = dsi_get_meta("link_progetti");
$altre_info = dsi_get_meta("note");

$user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);
?>
    <main id="main-container" class="main-container bluelectric">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

		<?php while ( have_posts() ) :  the_post();
            set_views($post->ID);
            $image_id= get_post_thumbnail_id($post);
            if(has_post_thumbnail($post))
                $image_url = get_the_post_thumbnail_url($post, "item-thumb");
            else
                $image_url = get_template_directory_uri() ."/assets/placeholders/logo-service.png";
			$autore = get_user_by("ID", $post->post_author);
			?>

            <section class="section bg-white py-2 py-lg-3 py-xl-5">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-12 col-sm-3 col-lg-2 d-none d-sm-block">
                            <div class="section-thumb mx-3">
                                <?php dsi_get_img_from_id_url( $image_id, $image_url ); ?>
                            </div><!-- /section-thumb -->
                        </div><!-- /col-lg-2 -->
                        <div class="col-12 col-sm-9 col-lg-5 col-md-8">
                            <div class="section-title">
                                <h2 class="mb-3"><?php the_title(); ?></h2>
                                <p><?php echo dsi_get_meta("descrizione"); ?></p>
                            </div><!-- /title-section -->
                        </div><!-- /col-lg-5 col-md-8 -->
                        <div class="col-lg-3 col-md-4 offset-lg-1">
                            <aside class="badges-wrapper badges-main mt-0">
                                <h2 class="h4"><?php _e("Insegnante", "design_scuole_italia"); ?></h2>
                                <div class="card card-avatar card-comments mt-3">
                                    <div class="card-body p-0">
										<?php get_template_part("template-parts/autore/card", "insegnante"); ?>
                                    </div><!-- /card-body -->
                                </div><!-- /card card-avatar -->
                            </aside>
							<?php
							global $badgeclass;
							$badgeclass = "badge-outline-bluelectric";
							get_template_part("template-parts/common/badges-argomenti");
							?>
							<?php get_template_part("template-parts/single/actions"); ?>


                        </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section><!-- /section -->



            <section class="section bg-white">
                <div class="container container-border-top">
                    <div class="row variable-gutters">
                        <?php if($user_can_view_post): ?>
                        <div class="col-lg-3 aside-border px-0">
                            <aside class="aside-main aside-sticky">
                                <div class="aside-title" id="program-legend">
                                    <a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi" role="button" aria-expanded="true" aria-controls="lista-paragrafi" aria-label="apri/chiudi indice del programma">
                                        <span><?php _e("Indice del Programma", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show" role="region" aria-labelledby="program-legend">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-materia" title="Vai al paragrafo <?php _e("La Materia", "design_scuole_italia"); ?>"><?php _e("La Materia", "design_scuole_italia"); ?></a>
                                        </li>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-contenuti" title="Vai al paragrafo <?php _e("I Contenuti", "design_scuole_italia"); ?>"><?php _e("I Contenuti", "design_scuole_italia"); ?></a>
                                        </li>
                                	<?php if(trim($altre_info) != ""){ ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-info" title="Vai al paragrafo <?php _e("Ulteriori Informazioni", "design_scuole_italia"); ?>"><?php _e("Ulteriori Informazioni", "design_scuole_italia"); ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ( is_array($posts_array) && count( $posts_array ) )  {   ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-correlati"
                                                   title="Vai al paragrafo <?php _e("Gli altri programmi della Classe", "design_scuole_italia"); ?>"><?php _e("Gli altri programmi della Classe", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </aside>

                        </div>
                        <div class="col-lg-6">
                            <article class="article-wrapper pt-4 px-3">
                                <h2 class="h4" id="art-par-materia"><?php _e("La Materia", "design_scuole_italia"); ?></h2>
								<?php the_content(); ?>
								<?php

								$video = dsi_get_meta("video");
								if($video) { ?>
                                    <div class="video-container my-4">
										<?php echo wp_oembed_get ($video); ?>
                                    </div>
								<?php } ?>
                                <div class="h6"><?php _e("Obiettivi", "design_scuole_italia"); ?></div>
                                <div class="col-lg-12 px-0 wysiwig-text">
                                <?php
								$obiettivi = dsi_get_meta("obiettivi");
								echo wpautop($obiettivi);
								?>
                                </div>
                                <div class="h6"><?php _e("Attività", "design_scuole_italia"); ?></div>

								<?php
								$attivita = dsi_get_meta("attivita");

								if(is_array($attivita) && count($attivita) > 0){
									foreach ($attivita as $step) {
										?>
                                        <div class="text-border-left">
                                            <div class="text-icon">
                                                <span><?php echo $step["titolo_attivita"]; ?></span>
                                            </div>
                                            <p><?php echo $step["descrizione_attivita"]; ?></p>
                                        </div><!-- /text-border-left -->
										<?php
									}
								}
								?>

                                <h2 class="h4" id="art-par-contenuti"><?php _e("I Contenuti", "design_scuole_italia"); ?></h2>
								<?php if((is_array($link_schede_materiale_didattico) && count($link_schede_materiale_didattico)>0) || (is_array($file_documenti) && count($file_documenti)>0)){ ?>

                                    <div class="h6"><?php _e("Risorse", "design_scuole_italia"); ?></div>
                                    <div class="card-deck card-deck-spaced">
										<?php
										if(is_array($link_schede_materiale_didattico) && count($link_schede_materiale_didattico)>0) {
											global $documento;
											foreach ( $link_schede_materiale_didattico as $link_scheda_documento ) {
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

								<?php if ( ( is_array( $link_progetti ) && count( $link_progetti ) > 0 )) {
								    ?>
                                <div class="h6"><?php _e("Progetti", "design_scuole_italia"); ?></div>
                                <div class="card-deck card-deck-spaced">
                                        <?php
									foreach ( $link_progetti as $link_progetto ) {
										$documento = get_post( $link_progetto );
										get_template_part( "template-parts/documento/card" );
									}
                                    ?></div>
                                    <?php }  ?>

                                <?php
                                if(trim($altre_info) != ""){
                                ?>
                                <h2 class="h4" id="art-par-info"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h2>
                                <div class="col-lg-12 px-0 wysiwig-text">
                                <?php echo wpautop($altre_info); ?>
                                </div>
                                <?php } ?>
								<?php get_template_part("template-parts/single/bottom"); ?>
                            </article>
                        </div><!-- /col-lg-6 -->
                        <div class="col-lg-3 aside-border-left">
                            <div class="aside-sticky">
								<?php
								global $badgeclass;
								$badgeclass = "badge-outline-bluelectric";
								get_template_part("template-parts/common/badges-materie");

								get_template_part("template-parts/common/badges-classi");

								?>

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



			<?php get_template_part("template-parts/single/more-programma_materia"); ?>

		<?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
