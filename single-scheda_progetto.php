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
    <main id="main-container" class="main-container bluelectric ">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);
            $image_url = get_the_post_thumbnail_url($post, "item-gallery");
            $autore = get_user_by("ID", $post->post_author);
            ?>

            
            <section class="section bg-white">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-lg-8 col-md-8" id="article-title">
                            <div>
                                <div class="title-content" id="title-content">
                                    <h1 class="h2"><?php the_title(); ?></h1>
                                    <?php
                                    global $badgeclass;
                                    $badgeclass = "badge-outline-bluelectric";
                                    get_template_part("template-parts/common/badges-argomenti");
                                    ?>
                                    <?php
                                    $anno_scolastico =  dsi_get_meta("anno_scolastico");

                                    // recupero l'anno scolastico di riferimento del progetto
                                    if($anno_scolastico){
                                        ?>
                                        <i><?php _e("Anno scolastico", "design_scuole_italia"); ?> <?php echo dsi_convert_anno_scuola($anno_scolastico) ?></i>
                                        <?php
                                    }
                                    ?>
                                    <!-- <p class="mb-0"><?php echo dsi_get_meta("descrizione"); ?></p>-->
                                    
                                </div><!-- /title-content -->
                                <div class="" id="title-img">
                                    <?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
                                    <?php get_template_part("template-parts/single/bottom"); ?>
                                </div>
                            </div><!-- /header -->
                        

                            <div class="main-content ">
                                <?php if($user_can_view_post): ?>
                                <article class="article-wrapper pt-4 px-3">
                                    <h3 id="art-par-cosa"><?php _e("Presentazione", "design_scuole_italia"); ?></h3>
                                    <h4 class="mb-2"><?php _e("Data", "design_scuole_italia"); ?></h4>
                                    <p class="text-bluelectric"><strong><?php echo dsi_get_date_evento($post); ?></strong></p>
                                    <?php
                                    if(trim(get_the_content()) != "") {
                                    ?>

                                    <div class="px-0 wysiwig-text">
                                        <h4><?php _e("Descrizione del progetto", "design_scuole_italia"); ?></h4>
                                        <?php the_content(); ?>
                                    </div>
                                    <?php
                                    }
                                    ?><!-- /descrizione progetto -->

                                    <h4><?php _e("Obiettivi", "design_scuole_italia"); ?></h4>
                                    <div class="px-0 wysiwig-text">
                                        <?php
                                        $obiettivi = dsi_get_meta("obiettivi");
                                        echo wpautop($obiettivi);
                                        ?>
                                    </div><!-- /obiettivi -->
                            
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

                                            }
                                        } ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php if(is_array($link_strutture)) {
                                    ?><!-- /luoghi -->

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
                                    ?><!-- /responsabile -->


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
                                                <a href="<?php echo get_author_posts_url( $autore->ID);  ?>" aria-label="Vai alla sezione di <?php echo esc_attr(dsi_get_display_name( $autore->ID )); ?>">
                                                    <div class="card-body">
                                                        <?php get_template_part("template-parts/autore/card"); ?>
                                                    </div>
                                                </a>
                                            </div><!-- /card card-bg card-avatar rounded -->
                                        <?php
                                        }
                                        ?>
                                    </div><!-- /card-deck -->
                                    <?php } //partecipanti

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
                                    <?php } //collaborazione

                                    ?>
                                    <?php if($is_realizzato == "true"){ ?>
                                        <div class="row variable-gutters">
                                            <div class="col-lg-9 wysiwig-text">
                                                <h4 id="art-par-risultati"><?php _e("Risultati", "design_scuole_italia"); ?></h4>
                                                <?php echo wpautop($risultati); ?>
                                            </div>
                                        </div>
                                    <?php }  ?><!-- /risultati -->

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
                                    <?php } ?><!-- /servizi associati -->

                                    <?php else: ?>
                                        <div class="col-lg-12 p-5 m-5 text-center font-weight-bold wysiwig-text">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endif; ?>

                                </article>

                                <?php if ( is_array( $gallery ) && count( $gallery ) > 0 ) { ?>
                                <section class="section py-5" id="art-par-gallery">
                                    <div class="container py-4">
                                        <div class="title-section text-center mb-5">
                                            <h3 class="h4">Galleria</h3>
                                        </div><!-- /title-large -->
                                        <div class="row variable-gutters">
                                            <div class="col-12">
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
                                <?php } ?><!-- /gallery -->

                            </div><!-- / main-content -->
                        </div><!-- /col-lg-8 -->
                        
                        <div class="col-lg-3 col-md-3 col-12 offset-lg-1 offset-md-1">
                            <?php get_template_part("template-parts/single/more-scheda_progetto-vertical"); ?>
                            <?php if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) /*|| (is_array($file_documenti) && count($file_documenti)>0)*/){ ?>
                                <h4  id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <div class="card-deck card-deck-spaced" id="card-sidebar">
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
                            ?><!-- /documenti -->
                        </div>

                    </div><!-- /row -->
                </div><!-- /container -->
            </section><!-- /section -->

                <?php get_template_part("template-parts/header/status"); ?>


                
                
            
                    


        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
