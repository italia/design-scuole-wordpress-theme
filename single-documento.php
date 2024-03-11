<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $gallery, $licenza, $struttura, $servizio;
$args = ["post", "evento", "circolare"];
get_template_part("template-parts/single/related-posts");
get_header();

$user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);
?>
    <main id="main-container" class="main-container redbrown">
        <?php get_template_part( "template-parts/common/breadcrumb" ); ?>
        <?php while ( have_posts() ) : the_post();
        set_views($post->ID);
            $image_url              = get_the_post_thumbnail_url( $post, "item-gallery" );
            $autore                 = get_user_by( "ID", $post->post_author );
            $gallery                = dsi_get_meta( "gallery" );
            $file_documenti         = dsi_get_meta( "file_documenti" );
            $licenza                = dsi_get_meta( "licenza" );
            $servizi_collegati      = dsi_get_meta( "servizi_collegati" );
            $link_servizi_didattici = dsi_get_meta("link_servizi_didattici");
           // $link_servizi_collegati = dsi_get_meta( "link_servizi_collegati" );
            $timeline               = dsi_get_meta( "timeline" );
            $ufficio                = dsi_get_meta( "ufficio" );
            $numerazione_albo       = dsi_get_meta( "numerazione_albo" );
            $altre_info = dsi_get_meta("altre_info");
            $protocollo = dsi_get_meta("protocollo");
            $riferimenti_normativi = dsi_get_meta("riferimenti_normativi");
            ?>
            <section class="section bg-white py-2 py-lg-3 py-xl-5">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-12 col-sm-3 col-lg-2 d-none d-sm-block">
                            <div class="section-thumb mx-3">
                                <?php
                                if(has_post_thumbnail($post)) {
                                    the_post_thumbnail("item-thumb");
                                }else{
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/placeholders/logo-service.png" alt="logo della Repubblica italiana">
                                 <?php } ?>
                            </div><!-- /section-thumb -->
                        </div><!-- /col-lg-2 -->
                        <div class="col-12 col-sm-9 col-lg-5 col-md-8">
                            <div class="section-title">
                                <?php if(dsi_is_albo($post) && $numerazione_albo){ ?>
                                    <small class="h6 text-redbrown"><?php echo $numerazione_albo; ?></small>
                                <?php } ?>
                                <h1 class="h2 mb-3"><?php the_title(); ?></h1>
                                <p><?php if(!post_password_required()) echo dsi_get_meta( "descrizione" ); ?></p>
                            </div><!-- /title-section -->
                            <!--   <div class="article-description-mobile">

                               </div>-->
                        </div><!-- /col-lg-5 col-md-8 -->
                        <div class="col-lg-3 col-md-4 offset-lg-1">
                            <?php get_template_part( "template-parts/single/actions" ); ?>
                            <?php
                                $badgeclass = "badge-outline-redbrown";
                                get_template_part( "template-parts/common/badges-argomenti" ); 
                            ?>
                        <div class="badges-wrapper badges-main mt-4">
                            <?php $post_tags = get_the_terms(get_the_ID(), 'tipologia-documento');
                                if ($post_tags) {
                                    echo '<h2 class="h4">Tipologia</h2>';
                                    foreach($post_tags as $tag) {
                                        echo '<a href="'.get_tag_link($tag->term_id).'" class="badge badge-sm badge-pill badge-outline-redbrown" aria-label="Tipologia: '.$tag->name.'">'. $tag->name .'</a> ';
                                    }
                                }
                            ?>
				        </div>		
                    </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
                </div><!-- /row -->
                </div><!-- /container -->
            </section><!-- /section -->

            <?php get_template_part("template-parts/header/status"); ?>


            <section class="section bg-white">
                <div class="container container-border-top">
                    <div class="row variable-gutters">
                        <?php if($user_can_view_post): ?>
                        <?php if(!post_password_required()) { ?>
                        <div class="col-lg-3 col-md-4 aside-border px-0">
                            <aside class="aside-main aside-sticky">
                                <div class="aside-title">
                                    <a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi"
                                       role="button" aria-expanded="true" aria-controls="lista-paragrafi" aria-label="apri/chiudi indice della pagina">
                                        <span><?php _e( "Indice della pagina", "design_scuole_italia" ); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="#svg-arrow-down-small"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-descrizione"
                                               title="Vai al paragrafo <?php _e( "Descrizione", "design_scuole_italia" ); ?>"><?php _e( "Descrizione", "design_scuole_italia" ); ?></a>
                                        </li>
                                        <?php if (!post_password_required() && is_array( $file_documenti ) && count( $file_documenti ) > 0 ) { ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-documento"
                                               title="Vai al paragrafo <?php _e( "Il Documento", "design_scuole_italia" ); ?>"><?php echo _n( 'Il Documento', 'I Documenti', count( $file_documenti ), 'design_scuole_italia' ); ?></a>
                                        </li>
                                        <?php }
                                        if ( !post_password_required() && is_array( $servizi_collegati ) && count($servizi_collegati) > 0 ) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-servizio"
                                                   title="Vai al paragrafo <?php _e( "Servizi collegati", "design_scuole_italia" ); ?>"><?php _e( "Servizi collegati", "design_scuole_italia" ); ?></a>
                                            </li>
                                        <?php }
                                        if ( !post_password_required() && is_array( $timeline ) && count( $timeline ) > 0 ) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-tempi"
                                                   title="Vai al paragrafo <?php _e( "Tempi e scadenze", "design_scuole_italia" ); ?>"><?php _e( "Tempi e scadenze", "design_scuole_italia" ); ?></a>
                                            </li>
                                        <?php }
                                        if ( !post_password_required() && is_array( $ufficio ) && count( $ufficio ) > 0 ) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-contatti"
                                                   title="Vai al paragrafo <?php _e( "Contatti", "design_scuole_italia" ); ?>"><?php _e( "Contatti", "design_scuole_italia" ); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if(($altre_info != "") || ($protocollo != "")  || ($riferimenti_normativi != "")) {   ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-info"
                                                   title="Vai al paragrafo <?php _e( "Ulteriori informazioni", "design_scuole_italia" ); ?>"><?php _e( "Ulteriori informazioni", "design_scuole_italia" ); ?></a>
                                            </li>
                                        <?php } ?>

                                        <?php if (!post_password_required() && is_array($posts_array) && count( $posts_array ) )  {   ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-correlati"
                                                   title="Vai al paragrafo <?php _e("Circolari, notizie, eventi correlati", "design_scuole_italia"); ?>"><?php _e("Circolari, notizie, eventi correlati", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </aside>

                        </div>
                        <?php } ?>
                        <div class="col-lg-8 col-md-8 offset-lg-1 pt84">
                            <article class="article-wrapper">
                                <h2 class="h4" id="art-par-descrizione"><?php _e( "Descrizione", "design_scuole_italia" ); ?></h2>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="article-description-nomove wysiwig-text">
                                            <?php the_content(); ?>
                                        </div><!-- /article-description -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->

                                <div class="row variable-gutters mb-4">
                                    <div class="col-lg-12">
                                        <?php if ( !post_password_required() &&  is_array( $gallery ) && count( $gallery ) > 0 ) { ?>
                                            <div class="it-carousel-wrapper simple-two-carousel splide" data-bs-carousel-splide>
                                                <div class="splide__track">
                                                    <ul class="splide__list">
                                                        <?php get_template_part( "template-parts/single/gallery", $post->post_type ); ?>
                                                    </ul>
                                                </div><!-- /carousel-simple -->
                                            </div>
                                        <?php }
                                        $autori = dsi_get_meta( "autori" );
                                        if ( !post_password_required() && is_array( $autori ) && count( $autori ) > 0 ) {
                                            ?>
                                            <h3 class="h6"><?php _e( "Autori", "design_scuole_italia" ); ?></h3>
                                            <div class="card-deck card-deck-spaced mb-2">
                                                <?php
                                                foreach ( $autori as $idutente ) {
                                                    $autore = get_user_by( "ID", $idutente );
                                                    ?>
                                                    <div class="card card-bg card-avatar rounded">
                                                        <?php
															$privacy_hidden = get_user_meta( $autore->ID, '_dsi_persona_privacy_hidden', true);
                        
															if($privacy_hidden == "false") {
																?><a href="<?php echo get_author_posts_url( $autore->ID);  ?>"><?php
															}
														?>
                                                            <div class="card-body">
                                                                <?php get_template_part( "template-parts/autore/card" ); ?>
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
                                        ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php if ( !post_password_required() && is_array( $file_documenti ) && count( $file_documenti ) > 0 ) { ?>
                                    <h3 class="h6" id="art-par-documento"><?php _e("Allegati", "design_scuole_italia"); ?></h3>
                                    <?php
                                    if (dsi_is_albo($post) && $post->post_status == "annullato") {
                                        ?>
                                        <div class="row variable-gutters mb-4">
                                            <div class="col-lg-12">
                                                <h5 class="text-redbrown"><?php _e("Allegati non disponibili - Atto annullato", "design_scuole_italia"); ?></h5>
                                            </div>
                                        </div>
                                        <?php
                                    } else if (dsi_is_albo($post) && $post->post_status == "scaduto") {
                                        $servizi_richiesta_atti = dsi_get_option("servizi_richiesta_atti", "setup");
                                        ?>
                                        <div class="row variable-gutters mb-4">
                                            <div class="col-lg-12">
                                                <h5 class="text-redbrown"><?php _e("Allegati non disponibili - Atto scaduto", "design_scuole_italia"); ?></h5>
                                                <?php if (is_array($servizi_richiesta_atti) && count($servizi_richiesta_atti) > 0) { ?>
                                                <p>Puoi richiedere il documento tramite <?php echo count($servizi_richiesta_atti) == 1 ? "il servizio dedicato" : "i servizi dedicati"; ?>.</p>
                                                <div class="card-deck card-deck-spaced">
                                                <?php foreach ($servizi_richiesta_atti as $idservizio){
                                                    $servizio = get_post($idservizio);
                                                    if($servizio) {
                                                        get_template_part("template-parts/servizio/card");
                                                    }
                                                } ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="row variable-gutters mb-4">
                                            <div class="col-lg-12">
                                                <div class="card-deck card-deck-spaced">
                                                    <?php global $idfile, $nomefile;
                                                    if (is_array($file_documenti) && count($file_documenti) > 0) {

                                                        foreach ($file_documenti as $idfile => $nomefile) {
                                                            get_template_part("template-parts/documento/file");
                                                        }
                                                    }
                                                    ?>
                                                </div><!-- /card-deck card-deck-spaced -->
                                            </div><!-- /col-lg-12 -->
                                        </div><!-- /row -->
                                        <?php
                                    }
                                }
                                if ( !post_password_required() && is_array( $servizi_collegati ) && count($servizi_collegati) > 0 ) { ?>
                                    <h2 class="h4" id="art-par-servizio"><?php _e( "Servizi collegati", "design_scuole_italia" ); ?></h2>
                                    <div class="row variable-gutters mb-4">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php foreach ($servizi_collegati as $idservizio){
                                                    $servizio = get_post($idservizio);
                                                    get_template_part("template-parts/servizio/card");
                                                } ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                if ( !post_password_required() && is_array( $link_servizi_didattici ) && count($link_servizi_didattici) > 0 ) { ?>
                                    <h2 class="h4" id="art-par-servizio-didattico"><?php _e( "Indirizzi di studio collegati", "design_scuole_italia" ); ?></h2>
                                    <div class="row variable-gutters mb-4">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php foreach ($link_servizi_didattici as $idservizio){
                                                    $servizio = get_post($idservizio);
                                                    get_template_part("template-parts/servizio/card");
                                                } ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                if ( !post_password_required() && is_array( $timeline ) && count( $timeline ) > 0 ) {
                                    ?>
                                    <h2 class="h4" id="art-par-tempi"><?php _e( "Tempi e scadenze", "design_scuole_italia" ); ?></h2>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <div class="calendar-vertical mb-5">
                                                <?php
                                                foreach ( $timeline as $item ) {
                                                    ?>
                                                    <div class="calendar-date">
                                                        <div class="calendar-date-description rounded">
                                                            <div class="calendar-date-description-content">
                                                                <p><?php echo $item["titolo_timeline"] ?></p>
                                                            </div><!-- /calendar-date-description-content -->
                                                        </div><!-- /calendar-date-description -->
                                                        <h4 class="calendar-date-day">
                                                            <p><?php echo date_i18n( "d", strtotime( $item["data_timeline"] ) ); ?></p>
                                                            <small><b><?php echo date_i18n( "M", strtotime( $item["data_timeline"] ) ); ?></b></small>
                                                        </h4><!-- /calendar-date-day -->
                                                    </div><!-- /calendar-date -->
                                                <?php } ?>
                                            </div><!-- /calendar-vertical -->
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                if ( !post_password_required() && is_array( $ufficio ) && count( $ufficio ) > 0 ) { ?>

                                    <h2 class="h4" id="art-par-contatti"><?php _e( "Contatti", "design_scuole_italia" ); ?></h2>
                                    <div class="h6"><?php _e( "Struttura responsabile del documento", "design_scuole_italia" ); ?></div>
                                    <div class="row variable-gutters mb-4">
                                        <div class="col-lg-12">
                                            <div class="card-deck card-deck-spaced">
                                                <?php

                                                foreach ( $ufficio as $id_struttura ) {
                                                    $struttura = get_post($id_struttura);
                                                    get_template_part("template-parts/struttura/card");

                                                }
                                                ?>
                                            </div><!-- /card-deck card-deck-spaced -->
                                        </div><!-- /col-lg-12 -->
                                    </div><!-- /row -->
                                <?php }



                                if(!post_password_required() && (($altre_info != "") || ($protocollo != "")  || ($riferimenti_normativi != ""))) {

                                    ?>
                                    <h2 class="h4" id="art-par-info"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h2>
                                    <div class="row variable-gutters mb-4">
                                        <div class="col-lg-9">
                                            <?php
                                            if ($altre_info) echo "<p>" . $altre_info . "</p>";
                                            if ($protocollo) {
                                                echo "<p>";
                                                _e("Protocollo: ", "design_scuole_italia");
                                                echo "<strong>" . $protocollo . "</strong>";
                                                $data_protocollo = dsi_get_meta("data_protocollo");
                                                if ($data_protocollo) {
                                                    _e(" del  ", "design_scuole_italia");
                                                    echo "<strong>" . $data_protocollo . "</strong>";
                                                }
                                                echo "</p>";
                                            }

                                            if ($riferimenti_normativi) {
                                                ?>
                                                <div class="h6"><?php _e("Riferimenti normativi", "design_scuole_italia"); ?></div>
                                                <div class="card card-bg bg-color rounded">
                                                    <div class="card-body">
                                                        <?php
                                                        echo $riferimenti_normativi;
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <?php get_template_part( "template-parts/single/bottom" ); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
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


            <?php get_template_part( "template-parts/single/more-posts" ); ?>

        <?php endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
