<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $luogo, $c, $badgeclass;
$args = ["post", "evento", "circolare"];
get_template_part("template-parts/single/related-posts");

$numerazione_circolare = dsi_get_meta("numerazione_circolare");

// verifica se l'utente può vedere il contenuto della circolare
$accesso_circolare = circolare_access($post->ID);

get_header();
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$file_documenti = dsi_get_meta("file_documenti");
//$luoghi = dsi_get_meta("luoghi");
//$persone = dsi_get_meta("persone");
?>
<main id="main-container" class="main-container greendark">

	<?php get_template_part("template-parts/common/breadcrumb"); ?>

	<?php if($accesso_circolare != "false") { ?>

        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);


                get_template_part("template-parts/single/header-circolare");
            ?>

            <section class="section bg-white py-5">
                <div class="container border-top">
                    <div class="row variable-gutters">
                        <div class="col-lg-9 col-md-8 order-lg-1">
						    <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
                                    <div class="col-lg-8 wysiwig-text">
                                        <?php
                                        the_content();
                                        ?>
                                    </div>
                                </div>	

								<?php if (!post_password_required()) { ?>
								
                                <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)) { ?>
                                    <h2 class="h4 mb-4"><?php _e("Documenti", "design_scuole_italia"); ?></h2>
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
                                ?>
                                <?php
                                get_template_part( "template-parts/single/feedback-circolare");
/*
                                if(is_array($luoghi) && count($luoghi)>0){
                                    ?>
                                    <h2 class="h4 mb-4"><?php _e("Luoghi", "design_scuole_italia"); ?></h2>
                                    <?php
                                    $c=0;
                                    foreach ( $luoghi as $idluogo ) {
                                        $c ++;
                                        $luogo = get_post( $idluogo );
                                        get_template_part( "template-parts/luogo/card" , "large");
                                    }
                                    ?>
                                <?php } */ ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <?php get_template_part( "template-parts/single/bottom" ); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
								
							<?php } ?>	
                            </article>
                        </div><!-- /col-lg-8 -->
                        <div class="col-lg-3 col-md-4 order-lg-0">
                            <?php get_template_part("template-parts/single/actions"); ?>
                            <?php
                            $badgeclass = "badge-outline-greendark";
                            get_template_part("template-parts/common/badges-argomenti"); ?>
                            <?php
                            /*
                            if(is_array($persone) && count($persone)>0){
                                ?>
                                <div class="cards-aside mt-4">
                                    <h2 class="h4"><?php _e("Persone", "design_scuole_italia"); ?></h2>
                                    <?php
                                    foreach ($persone as $idutente) {
                                        $autore = get_user_by("ID", $idutente);
                                        ?>
                                        <div class="card card-avatar card-comments">
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
                                </div><!-- /cards-avatar -->
                            <?php } */ ?>
				<aside class="badges-wrapper badges-main mt-4">
					<?php $post_tags = get_the_terms(get_the_ID(), 'tipologia-circolare');
						if ($post_tags) {
							echo '<h2 class="h4">Tipologia</h2>';
							foreach($post_tags as $tag) {
                                echo '<a href="'.get_tag_link($tag->term_id).'" class="badge badge-sm badge-pill badge-outline-greendark" aria-label="Tipologia: '.$tag->name.'">'. $tag->name .'</a><br>';
							}
						}
					?>
				</aside>		
                        </div><!-- /col-lg-3 -->
                    </div><!-- /row -->

                </div><!-- /container -->
            </section>

            <?php get_template_part("template-parts/single/more-posts"); ?>

        <?php  	endwhile; // End of the loop. ?>
		
	<?php } else { ?> 
	
		<section class="section bg-white py-5">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-lg-9 col-md-8 order-lg-1">
						    <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
                                    <div class="col-lg-8 wysiwig-text">
										<p class="article-wrapper">Il contenuto della circolare n.<?php echo $numerazione_circolare?> è riservato.</p>
									</div>
								</div>
							</article>
						</div>
					</div>	
				</div>
		</section>
	<?php } ?> 
</main><!-- #main -->
<?php
get_footer();
