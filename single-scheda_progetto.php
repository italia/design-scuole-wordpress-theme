<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $luogo, $c, $struttura, $gallery;
get_template_part("template-parts/single/related-posts", $args = array( "scheda_progetto")); 
get_header();

$is_luogo_scuola = dsi_get_meta("is_luogo_scuola");

$link_schede_luoghi = dsi_get_meta("link_schede_luoghi");
$nome_luogo_custom = dsi_get_meta("nome_luogo_custom");
$link_strutture = dsi_get_meta("link_strutture");
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$link_schede_servizi = dsi_get_meta("link_schede_servizi");
$partecipanti = dsi_get_meta("partecipanti");

//$file_documenti = dsi_get_meta("file_documenti");
$is_realizzato = dsi_get_meta("is_realizzato");
$risultati = dsi_get_meta("risultati");
$gallery = dsi_get_meta("gallery");

$user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);
$persone_show_card = dsi_get_option("persone_show_card", "persone");
?>
    <main id="main-container" class="main-container bluelectric">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);
            $image_url = get_the_post_thumbnail_url($post, "item-gallery");

            if(!has_post_thumbnail($post)){ 
                $image_url = get_template_directory_uri() . '/assets/placeholders/placeholder-1280x960.jpg';
            }

            $autore = get_user_by("ID", $post->post_author);
            ?>


            <section class="section bg-white article-title">
                <div class="title-img" <?php if($image_url){ ?>style="background-image: url('<?php echo $image_url; ?>');" <?php } ?>></div>
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
                                    <i><?php _e("Anno scolastico", "design_scuole_italia"); ?> <?php echo dsi_convert_anno_scuola(intval($anno_scolastico)) ?></i>
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

            <?php get_template_part("template-parts/header/status"); ?>


            <section class="section bg-white">
                <div class="container container-border-top">
                    <div class="row variable-gutters">
                        <?php if($user_can_view_post): ?>
                        <div class="col-lg-3 col-md-4 aside-border px-0">
                            <aside class="aside-main aside-sticky">
                                <div class="aside-title" id="project-legend">
                                    <a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi" role="button" aria-expanded="true" aria-controls="lista-paragrafi" aria-label="apri/chiudi indice della pagina">
                                        <span><?php _e("Indice del progetto", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show" role="region" aria-labelledby="project-legend">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-cosa" title="Vai al paragrafo <?php _e("Presentazione", "design_scuole_italia"); ?>"><?php _e("Presentazione", "design_scuole_italia"); ?></a>
                                        </li>
										<?php
                                        $obiettivi = dsi_get_meta("obiettivi");

                                        if($obiettivi != "") {
                                        	?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-obiettivi" title="Vai al paragrafo <?php _e("Obiettivi", "design_scuole_italia"); ?>"><?php _e("Obiettivi", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
										<?php if((is_array($link_schede_luoghi) && count($link_schede_luoghi)) || ($nome_luogo_custom != "")) { ?>
										<li>
											<a class="list-item scroll-anchor-offset" href="#art-par-luogo" title="Vai al paragrafo <?php _e("Luogo", "design_scuole_italia"); ?>"><?php _e("Luogo", "design_scuole_italia"); ?></a>
										</li>
										<?php } ?>
                                        <?php if(is_array($link_strutture) || (is_array($partecipanti_utenti) && count($partecipanti_utenti)>0) || trim($collaborazione) != "" ) { 
                                        ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-responsabili" title="Vai al paragrafo <?php _e("Responsabili", "design_scuole_italia"); ?>"><?php _e("Responsabili", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php }
                                        if(trim($partecipanti) != "") { 
                                        ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-partecipanti" title="Vai al paragrafo <?php _e("Partecipanti", "design_scuole_italia"); ?>"><?php _e("Partecipanti", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php }
                                        if($is_realizzato == "true"){
                                            ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-risultati" title="Vai al paragrafo <?php _e("Risultati", "design_scuole_italia"); ?>"><?php _e("Risultati", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) /*|| (is_array($file_documenti) && count($file_documenti)>0)*/){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-documenti" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Documenti", "design_scuole_italia"); ?>"><?php _e("Documenti", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php }       
                                        if(is_array($link_schede_servizi) && count($link_schede_servizi)>0){ ?>
                                         	<li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-servizi" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Servizi associati al progetto", "design_scuole_italia"); ?>"><?php _e("Servizi associati", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php }                                      
                                        if ( is_array( $gallery ) && count( $gallery ) > 0 ) {
                                            ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-gallery" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Galleria multimediale", "design_scuole_italia"); ?>"><?php _e("Galleria multimediale", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } 
                                        if ( is_array($posts_array) && count( $posts_array ) )  {   ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-correlati"
                                                   title="Vai al paragrafo <?php _e("Contenuti correlati", "design_scuole_italia"); ?>"><?php _e("Contenuti correlati", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php }   ?>
                                    </ul>
                                </div>
                            </aside>

                        </div>

                        <div class="col-lg-8 col-md-8 offset-lg-1 pt84">

                            <article class="article-wrapper pt-4 px-3">

                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <h2 class="mb-2 h3" id="art-par-cosa"><?php _e("Presentazione", "design_scuole_italia"); ?></h2>
                                        <h3 class="mb-2 h4"><?php _e("Durata", "design_scuole_italia"); ?></h3>
                                        <p class="text-bluelectric"><strong><?php echo dsi_get_date_evento($post); ?></strong></p>
                                        <?php
                                        if(trim(get_the_content()) != "") {
                                            ?>
                                            <h3 class="mb-2 h4"><?php _e("Descrizione del progetto", "design_scuole_italia"); ?></h3>
                                            <div class="col-lg-12 px-0 wysiwig-text">
                                                <?php the_content(); ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        $obiettivi = dsi_get_meta("obiettivi");

                                        if($obiettivi != "") {
                                        	?>
                                            <h3 class="mb-2 h4" id="art-par-obiettivi"><?php _e("Obiettivi", "design_scuole_italia"); ?></h3>
                                       		<div class="col-lg-12 px-0 wysiwig-text">
                                            <?php
                                        		echo wpautop($obiettivi);
                                        	?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php if((is_array($link_schede_luoghi) && count($link_schede_luoghi)) || ($nome_luogo_custom != "")) {
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <h3 class="mb-2 h4" id="art-par-luogo"><?php _e( "Luogo", "design_scuole_italia" ); ?></h3>
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
                                            } ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php } ?>

                                    <?php if(is_array($link_strutture) || (is_array($partecipanti_utenti) && count($partecipanti_utenti)>0) || trim($collaborazione) != "" ) { ?>
                                        <h2 class="h3 mb-3" id="art-par-responsabili"><?php _e("Responsabili", "design_scuole_italia"); ?></h2>
                                    <?php  } ?>

                                    <?php if(is_array($link_strutture)) {
                                    ?>
                                        <h3 class="mb-2 h4"><?php _e("Organizzato da", "design_scuole_italia"); ?></h3>
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

                                    $partecipanti_utenti = dsi_get_meta("partecipanti_utenti");

                                    if(is_array($partecipanti_utenti) && count($partecipanti_utenti)>0 && $persone_show_card != "false"){ ?>
                                    <h3 class="h4"><?php _e("Referenti", "design_scuole_italia"); ?></h3>
                                    <div class="card-deck card-deck-spaced mb-2">
                                        <?php
                                        foreach ($partecipanti_utenti as $idutente) {
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
                                                        <?php get_template_part("template-parts/autore/card-insegnante"); ?>
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
                                    <?php }

                                    $collaborazione = dsi_get_meta("collaborazione");
                                    if(trim($collaborazione) != "") {
                                        ?>
                                        <h3 class="h4"><?php _e( "In collaborazione con", "design_scuole_italia" ); ?></h3>
                                        <div class="row variable-gutters">
                                            <div class="col-lg-12 wysiwig-text">
                                                <?php echo wpautop($collaborazione); ?>
                                            </div>
                                        </div>
                                    <?php }



                                $partecipanti = dsi_get_meta("partecipanti");
                                if(trim($partecipanti)){
                                    ?>
                                    <h2 class="h3" id="art-par-partecipanti"><?php _e( "Partecipanti", "design_scuole_italia" ); ?></h2>
                                    <div class="row variable-gutters wysiwig-text">
                                        <div class="col-lg-12">
                                            <?php
                                            echo wpautop($partecipanti);
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                    
                                /*
                                // todo: programma materia
                                global $classe;
                                $classi = dsi_get_meta("classi");
                                if(is_array($classi) && count($classi)>0) {
                                    ?>
                                    <h4><?php _e( "Classi coinvolte", "design_scuole_italia" ); ?></h4>
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
                                <?php }
                                */

                                ?>
                                <?php if($is_realizzato == "true"){ ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            <h4 id="art-par-risultati"><?php _e("Risultati", "design_scuole_italia"); ?></h4>
                                            <?php echo wpautop($risultati); ?>
                                        </div>
                                    </div>
                                <?php }  ?>
                                <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) /*|| (is_array($file_documenti) && count($file_documenti)>0)*/){ ?>
                                    <h4  id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h4>
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

                                                /*
                                                global $idfile, $nomefile;
                                                if(is_array($file_documenti) && count($file_documenti)>0) {

                                                    foreach ( $file_documenti as $idfile => $nomefile ) {
                                                        get_template_part( "template-parts/documento/file" );
                                                    }
                                                }*/

                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <?php if($link_schede_servizi){ ?>
                                    <h4 id="art-par-servizi"><?php _e("Servizi associati al progetto", "design_scuole_italia"); ?></h4>
                                    <div class="card-deck card-deck-spaced mb-4">
                                        <?php
                                        foreach ($link_schede_servizi as $idservizio){
                                            $servizio = get_post($idservizio);
                                            get_template_part("template-parts/servizio/card");
                                        }
                                        ?>
                                    </div><!-- /card-deck card-deck-spaced -->
                                <?php } ?>

                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <?php get_template_part("template-parts/single/bottom"); ?>
                                    </div>
                                </div>
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
            
            <?php if ( is_array( $gallery ) && count( $gallery ) > 0 ) { ?>
            <section class="section bg-gray-light py-5" id="art-par-gallery">
                <div class="container py-4">
                    <div class="title-section text-center mb-5">
                        <h3 class="h4">Galleria multimediale</h3>
                    </div><!-- /title-large -->
                    <div class="row variable-gutters">
                        <div class="col">
                            <div class="it-carousel-wrapper simple-two-carousel splide" data-bs-carousel-splide>
                                <div class="splide__track">
                                    <ul class="splide__list">
                                    <?php get_template_part( "template-parts/single/gallery", $post->post_type ); ?>
                                    </ul>
                                </div><!-- /carousel-simple -->
                            </div>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>
            <?php } ?>
                            
            <?php get_template_part("template-parts/single/more-scheda_progetto"); ?>

        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
