<?php
/**
 * The template for displaying all single struttura organizzativa
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $servizio, $progetto, $autore, $luogo, $c;
get_header();
?>


    <main id="main-container" class="main-container redbrown">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>


        <?php while ( have_posts() ) :  the_post();

            $percorsi = dsi_get_percorsi_of_scuola($post);
            $link_servizi_didattici = dsi_get_meta("link_servizi_didattici");

            $image_url = get_the_post_thumbnail_url($post, "item-gallery");
            $descrizione = dsi_get_meta("descrizione");
            //$didattica = dsi_get_meta("didattica");
            $link_schede_servizi = dsi_get_meta("link_schede_servizi");
            $link_schede_progetti = dsi_get_meta("link_schede_progetti");

            $responsabile = dsi_get_meta("responsabile");
            $persone = dsi_get_meta("persone");
            $altri_componenti = dsi_get_meta("altri_componenti");


            $sedi = dsi_get_meta("sedi");
            $luoghi = dsi_get_meta("luoghi");

            $altre_info = dsi_get_meta("altre_info");
            $telefono = dsi_get_meta("telefono");
            $mail = dsi_get_meta("mail");
//			$pec = dsi_get_meta("pec");
            ?>

            <section class="section bg-white article-title">
                <div class="title-img" <?php if(has_post_thumbnail($post)){ ?> style="background-image: url('<?php echo $image_url; ?>');" <?php } ?>></div>
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="title-content">
                                <?php if(dsi_is_scuola($post) && is_array($percorsi)){
                                    echo "<small class=\"h6 text-redbrown\">";
                                    $c=0;
                                    foreach ($percorsi as $percorso){

                                        if($c) echo ", ";
                                        echo strtoupper($percorso->name);
                                        $c++;
                                    }
                                    echo "</small>";
                                }  ?>
                                <h1><?php the_title(); ?></h1>
                                <p class="mb-0"><?php echo $descrizione; ?></p>
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
                                        <span><?php _e("Dettagli", "design_scuole_italia"); ?></span>
                                        <svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
                                    </a>
                                </div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-cosa" title="Vai al paragrafo <?php _e("Cosa fa", "design_scuole_italia"); ?>"><?php _e("Cosa fa", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php if((is_array($responsabile) && count($responsabile)>0) || (is_array($persone) && count($persone)>0) || $altri_componenti != ""){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-organizzazione" title="Vai al paragrafo <?php _e("Organizzazione e contatti", "design_scuole_italia"); ?>"><?php _e("Organizzazione e contatti", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if(is_array($sedi) && count($sedi)>0) { ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-sede" title="Vai al paragrafo <?php _e("Sede", "design_scuole_italia"); ?>"><?php _e("Sede", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php } ?>
                                        <?php if($altre_info != ""){ ?>
                                            <li>
                                                <a class="list-item scroll-anchor-offset" href="#art-par-info" title="Vai al paragrafo <?php _e("Ulteriori informazioni", "design_scuole_italia"); ?>"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></a>
                                            </li>
                                        <?php }/*
                                         if($telefono || $mail || $pec){
                                        ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-more" title="Vai al paragrafo <?php _e("Per saperne di più", "design_scuole_italia"); ?>"><?php _e("Per saperne di più", "design_scuole_italia"); ?></a>
                                        </li>
                                         <?php }*/ ?>
                                    </ul>
                                </div>
                            </aside>

                        </div>
                        <div class="main-content col-lg-8 col-md-8 offset-lg-1">
                            <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
                                    <div class="col-lg-12 d-flex justify-content-end">
                                        <?php get_template_part("template-parts/single/actions"); ?>
                                    </div><!-- /col-lg-12 -->
                                </div><!-- /row -->
                                <h4 id="art-par-cosa"><?php _e("Cosa fa", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <?php the_content(); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->




                                <?php if(dsi_is_scuola($post) && $link_servizi_didattici){ ?>
                                    <h6><?php _e("Servizi Didattici", "design_scuole_italia"); ?></h6>
                                    <div class="card-deck card-deck-spaced mb-4">
                                        <?php
                                        foreach ($link_servizi_didattici as $idservizio){
                                            $servizio = get_post($idservizio);
                                            get_template_part("template-parts/servizio/card");
                                        }
                                        ?>
                                    </div><!-- /card-deck card-deck-spaced -->
                                <?php } ?>


                                <?php if($link_schede_servizi){ ?>
                                    <h6><?php _e("Servizi di cui la struttura è responsabile", "design_scuole_italia"); ?></h6>
                                    <div class="card-deck card-deck-spaced mb-4">
                                        <?php
                                        foreach ($link_schede_servizi as $idservizio){
                                            $servizio = get_post($idservizio);
                                            get_template_part("template-parts/servizio/card");
                                        }
                                        ?>
                                    </div><!-- /card-deck card-deck-spaced -->
                                <?php } ?>





                                <?php if($link_schede_progetti){ ?>
                                    <h6><?php _e("Progetti", "design_scuole_italia"); ?></h6>
                                    <div class="card-deck card-deck-spaced mb-4">
                                        <?php
                                        foreach ($link_schede_progetti as $idprogetto){
                                            $progetto = get_post($idprogetto);
                                            get_template_part("template-parts/progetto/card");
                                        }
                                        ?>
                                    </div><!-- /card-deck card-deck-spaced -->
                                <?php } ?>
                                <?php if((is_array($responsabile) && count($responsabile)>0) || (is_array($persone) && count($persone)>0) || $altri_componenti != "" ||  $telefono || $mail || $pec){ ?>
                                    <h4 id="art-par-organizzazione"><?php _e("Organizzazione e contatti", "design_scuole_italia"); ?></h4>
                                    <?php if(is_array($responsabile) && count($responsabile)>0){ ?>
                                        <h6><?php _e("Responsabile", "design_scuole_italia"); ?></h6>
                                        <div class="card-deck card-deck-spaced mb-2">
                                            <?php
                                            foreach ($responsabile as $idutente) {
                                                $autore = get_user_by("ID", $idutente);
                                                ?>
                                                <div class="card card-bg card-avatar rounded">
                                                    <a href="<?php echo get_author_posts_url($idutente); ?>">
                                                        <div class="card-body">
                                                            <?php get_template_part("template-parts/autore/card"); ?>
                                                        </div>
                                                    </a>
                                                </div><!-- /card card-bg card-avatar rounded -->
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /card-deck -->
                                    <?php } ?>


                                    <?php
                                    // se è un parent
                                    global $struttura;
                                    if($post->post_parent == 0){
                                        // controllo se il luogo ha child
                                        $args = array(
                                            'post_parent' => $post->ID,
                                            'post_type'   => 'struttura',
                                            'numberposts' => -1,
                                            'post_status' => 'publish'
                                        );
                                        $children = get_children( $args );
                                        if(is_array($children) && count($children)>0){

                                            echo "<h6>".__("Strutture dipendenti", "design_scuole_italia")."</h6>";
                                            echo '<div class="card-deck card-deck-spaced">';
                                            foreach ($children as $struttura) {
                                                get_template_part("template-parts/struttura/card");
                                            }
                                            echo "</div>";
                                        }
                                    }else{
                                        // è un child

                                        echo "<h6>".__("Dipende da", "design_scuole_italia")."</h6>";
                                        echo '<div class="card-deck card-deck-spaced">';
                                        $struttura = get_post($post->post_parent);
                                        get_template_part("template-parts/struttura/card");
                                        echo "</div>";
                                    }
                                    ?>

                                    <?php if(is_array($persone) && count($persone)>0){ ?>
                                        <h6><?php _e("Persone", "design_scuole_italia"); ?></h6>
                                        <div class="card-deck card-deck-spaced mb-2">
                                            <?php
                                            foreach ($persone as $idutente) {
                                                $autore = get_user_by("ID", $idutente);
                                                ?>
                                                <div class="card card-bg card-avatar rounded">
                                                    <a href="<?php echo get_author_posts_url($idutente); ?>">
                                                        <div class="card-body">
                                                            <?php get_template_part("template-parts/autore/card"); ?>
                                                        </div>
                                                    </a>
                                                </div><!-- /card card-bg card-avatar rounded -->
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /card-deck -->
                                    <?php } ?>

                                    <?php if($altri_componenti != ""){ ?>
                                        <h6><?php _e("Altri componenti", "design_scuole_italia"); ?></h6>
                                        <p><?php echo $altri_componenti; ?></p>
                                    <?php } ?>

                                    <?php
                                    if($telefono || $mail){
                                        ?>
                                        <div class="row variable-gutters">
                                            <div class="col-lg-9">
                                                <h6><?php _e("Contatti", "design_scuole_italia"); ?></h6>
                                                <div class="card card-bg bg-color rounded">
                                                    <div class="card-body pb-1">
                                                        <ul>
                                                            <?php if($telefono){ ?><li><strong><?php _e("Telefono", "design_scuole_italia"); ?>:</strong> <?php echo $telefono; ?></li><?php } ?>
                                                            <?php if($mail){ ?><li><strong><?php _e("Email", "design_scuole_italia"); ?>:</strong> <?php echo $mail; ?></li><?php } ?>
                                                        </ul>
                                                    </div></div>
                                            </div></div>

                                    <?php }
                                    ?>
                                <?php } ?>
                                <?php if(is_array($sedi) && count($sedi)>0) {
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <h4 id="art-par-sede" class="mt-4"><?php _e("Sede", "design_scuole_italia"); ?></h4>
                                            <?php
                                            $c=0;
                                            foreach ($sedi as $idluogo){
                                                $c++;
                                                $luogo = get_post($idluogo);
                                                get_template_part( "template-parts/luogo/card");

                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if(is_array($luoghi) && count($luoghi)>0) {
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-12">
                                            <h6><?php _e("Luoghi presenti nella struttura", "design_scuole_italia"); ?></h4>
                                            <?php
                                            $c=0;
                                            foreach ($luoghi as $idluogo){
                                                $c++;
                                                $luogo = get_post($idluogo);
                                                ?>
                                                <div class="col-lg-4 mb-4">
                                                    <?php
                                                    get_template_part( "template-parts/luogo/card", "ico");
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if($altre_info != ""){ ?>
                                    <h4 id="art-par-info" class="mb-4 mt-4"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9">
                                            <?php echo wpautop($altre_info); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                <?php }
                                /*
                                if($telefono || $mail || $pec){
                                ?>
                                <h4 id="art-par-more"><?php _e("Per saperne di più", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <ul>
                                            <?php if($telefono){ ?><li><strong><?php _e("Telefono", "design_scuole_italia"); ?>:</strong> <?php echo $telefono; ?></li><?php } ?>
                                            <?php if($mail){ ?><li><strong><?php _e("Email", "design_scuole_italia"); ?>:</strong> <?php echo $mail; ?></li><?php } ?>
                                            <?php if($pec){ ?><li><strong><?php _e("PEC", "design_scuole_italia"); ?>:</strong> <?php echo $pec; ?></li><?php } ?>
                                        </ul>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php } */ ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <?php get_template_part("template-parts/single/bottom"); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            </article>
                        </div><!-- /col-lg-8 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>
            <?php
            global $related_type;
            $related_type = "card-white";
            get_template_part("template-parts/single/more-posts"); ?>
        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->

<?php
get_footer();

