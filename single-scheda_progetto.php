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

//$file_documenti = dsi_get_meta("file_documenti");
$is_realizzato = dsi_get_meta("is_realizzato");
$risultati = dsi_get_meta("risultati");
$gallery = dsi_get_meta("gallery");

$user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);
?>
    <main id="main-container" class="main-container bluelectric">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);
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
                                        if ( is_array($posts_array) && count( $posts_array ) )  {   ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-correlati"
                                                   title="Vai al paragrafo <?php _e("Schede progetto correlate", "design_scuole_italia"); ?>"><?php _e("Schede progetto correlate", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php }                                         
                                        if ( is_array( $gallery ) && count( $gallery ) > 0 ) {
                                            ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-gallery" title="<?php _e("Vai al paragrafo", "design_scuole_italia"); ?> <?php _e("Galleria Immagini", "design_scuole_italia"); ?>"><?php _e("Galleria Immagini", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </aside>

                        </div>

                        <div class="col-lg-8 col-md-8 offset-lg-1 pt84">

                            <article class="article-wrapper pt-4 px-3">

                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <h3 id="art-par-cosa"><?php _e("Presentazione", "design_scuole_italia"); ?></h3>
                                        <h4 class="mb-2"><?php _e("Data", "design_scuole_italia"); ?></h4>
                                        <p class="text-bluelectric"><strong><?php echo dsi_get_date_evento($post); ?></strong></p>
                                        <?php
                                        if(trim(get_the_content()) != "") {
                                            ?>
                                            <div class="col-lg-12 px-0 wysiwig-text">
                                            <h4><?php _e("Descrizione del progetto", "design_scuole_italia"); ?></h4>
                                            <?php the_content(); ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <h4><?php _e("Obiettivi", "design_scuole_italia"); ?></h4>
                                        <div class="col-lg-12 px-0 wysiwig-text">
                                        <?php
                                        $obiettivi = dsi_get_meta("obiettivi");
                                        echo wpautop($obiettivi);
                                        ?>
                                        </div>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php if((is_array($link_schede_luoghi) && count($link_schede_luoghi)) || ($nome_luogo_custom != "")) {
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <h4><?php _e( "Luogo", "design_scuole_italia" ); ?></h4>
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
                                <?php if(is_array($link_strutture)) {
                                    ?>
                                    <h4><?php _e("Responsabile", "design_scuole_italia"); ?></h4>
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
                                    <h4><?php _e( "Partecipanti", "design_scuole_italia" ); ?></h4>
                                    <div class="row variable-gutters wysiwig-text">
                                        <div class="col-lg-12">
                                            <?php
                                            echo wpautop($partecipanti);
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                    $partecipanti_utenti = dsi_get_meta("partecipanti_utenti");

                                    if(is_array($partecipanti_utenti) && count($partecipanti_utenti)>0){ ?>
                                <div class="card-deck card-deck-spaced mb-2">
                                    <?php
                                    foreach ($partecipanti_utenti as $idutente) {
                                        $autore = get_user_by("ID", $idutente);
                                        ?>
                                        <div class="card card-bg card-avatar rounded">
                                            <a href="<?php echo get_author_posts_url( $autore->ID);  ?>">
                                                <div class="card-body">
                                                    <?php get_template_part("template-parts/autore/card"); ?>
                                                </div>
                                            </a>
                                        </div><!-- /card card-bg card-avatar rounded -->
                                        <?php
                                    }
                                    ?>
                                </div><!-- /card-deck -->
                                <?php }
                                /*
                                // todo: programma materia
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
                                $collaborazione = dsi_get_meta("collaborazione");
                                if(trim($collaborazione) != "") {
                                    ?>
                                    <h4><?php _e( "In collaborazione con", "design_scuole_italia" ); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12 wysiwig-text">
                                            <?php echo wpautop($collaborazione); ?>
                                        </div>
                                    </div>
                                <?php }

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
                                    <h4><?php _e("Servizi associati al progetto", "design_scuole_italia"); ?></h4>
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
                            
            <?php get_template_part("template-parts/single/more-scheda_progetto"); ?>
            
            <?php if ( is_array( $gallery ) && count( $gallery ) > 0 ) { ?>
            <section class="section bg-gray-light py-5" id="art-par-gallery">
                <div class="container py-4">
                    <div class="title-section text-center mb-5">
                        <h3 class="h4">Galleria</h3>
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

        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
