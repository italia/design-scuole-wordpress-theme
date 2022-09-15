<?php
/**
 * Servizio template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();

?>

    <main id="main-container" class="main-container">

        <?php get_template_part("template-parts/hero/hero_martini/hero_indirizzi"); ?> 

        
        <?php
        while ( have_posts() ) :
            the_post();
            set_views($post->ID);
            $user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);

            // get all post meta cmb2
            $percorsi = dsi_get_percorsi_of_scuola($post);
            // print_r($percorsi);
            //$sottotitolo = dsi_get_meta("sottotitolo");

            $link_struttura_didattica = dsi_get_meta("link_struttura_didattica");

            $carriera = dsi_get_meta("carriera");
            $programma = dsi_get_meta("programma");
            $descrizione = dsi_get_meta("descrizione");
            $iscrizione_selezioni = dsi_get_meta("iscrizione_selezioni");
            
            

            //$sedi = dsi_get_meta("sedi");

            
            $fasi_scadenze = dsi_get_meta("fasi_scadenze");
            $casi_particolari = dsi_get_meta("casi_particolari");
            $link_schede_documenti = dsi_get_meta("link_schede_documenti");
            $file_documenti = dsi_get_meta("file_documenti");
            $altre_info = dsi_get_meta("altre_info");

            $struttura_responsabile = dsi_get_meta("struttura_responsabile");
            $luoghi = dsi_get_meta("luoghi");


            $calendario_classi_descrizione = dsi_get_meta("calendario_classi_descrizione");
            $calendario_classi_file = dsi_get_meta("calendario_classi_file");
            $libri_testo_descrizione = dsi_get_meta("libri_testo_descrizione");
            $libri_testo_file = dsi_get_meta("libri_testo_file");
            $consigli_di_classe = dsi_get_meta("consigli_di_classe");


            
            $mail = dsi_get_meta("mail");
            $telefono = dsi_get_meta("telefono");
            ?>
            


            <?php get_template_part("template-parts/header/status"); ?>

        <section id="text-block" class="section bg-white">
            <div class="container-fluid container-border-top">

                <div class="row main-content variable-gutters">
                    <?php if($user_can_view_post): ?>

                        <!-- Main content of the page -->
                    <div class="container col-lg-8">
                        <?php get_template_part("template-parts/common/breadcrumb"); ?>
                        <div class="article-wrapper pt-5 px-3">
                        
                            <h2 id="art-par-descrizione"><?php _e("Cosa si studia", "design_scuole_italia"); ?></h2>
                            <div class="row variable-gutters">
                                <div class="col-12">
                                    <div class="article-description wysiwig-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div><!-- /col-lg-9 -->
                            </div><!-- /row -->

                            <?php
                            // do action per innestare elementi tramite plugin / child theme
                            do_action("dsi_indirizzo_content_after_description");
                            ?>
                            

                            <?php
                            

                            
                            if(is_array($link_struttura_didattica) && count($link_struttura_didattica) > 0){
                                global $struttura;
                                echo "<h5 class='h6'>".__("Struttura responsabile dell'indirizzo di studio", "design_scuole_italia")."</h5>";
                                ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="card-deck card-deck-spaced">
                                            <?php
                                            foreach ($link_struttura_didattica as $idstruttura) {
                                                $struttura = get_post($idstruttura);
                                                ?>
                                                <?php get_template_part("template-parts/struttura/card"); ?>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }
                            ?>
                            <?php

                            if(is_array($luoghi) && count($luoghi) > 0){
                                global $luogo;
                                ?>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <h5 class="h6"><?php _e("Luoghi in cui viene erogato l'indirizzo di studio", "design_scuole_italia"); ?></h5>
                                        <?php
                                        $c=0;
                                        foreach ($luoghi as $idluogo){
                                            $c++;
                                            $luogo = get_post($idluogo);
                                            get_template_part( "template-parts/luogo/card" , "nophone");
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }

                            
                            ?>

                            <?php if($programma){ ?>
                                <h4 id="art-par-programma" class="mt-4"><?php _e("Programma di studio", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9 wysiwig-text">
                                        <?php echo apply_filters("the_content",$programma); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            <?php } ?>

                            <?php if(($calendario_classi_file || $calendario_classi_descrizione)){ ?>
                                <h4 id="art-par-calendario" class="mt-4"><?php _e("Calendario delle classi", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="col-lg-12  px-0 wysiwig-text">
                                            <?php echo wpautop($calendario_classi_descrizione); ?>
                                        </div>
                                        <div class="card-deck card-deck-spaced">
                                            <?php global $idfile, $nomefile;
                                            if (is_array($calendario_classi_file) && count($calendario_classi_file) > 0) {

                                                foreach ($calendario_classi_file as $idfile => $nomefile) {
                                                    get_template_part("template-parts/documento/file");
                                                }
                                            }
                                            ?>
                                        </div><!-- /card-deck card-deck-spaced -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            <?php } ?>

                            <?php if(($libri_testo_file || $libri_testo_descrizione)){ ?>
                                <h4 id="art-par-libri"  class="mt-4"><?php _e("Libri di testo", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="col-lg-12  px-0 wysiwig-text">
                                            <?php echo wpautop($libri_testo_descrizione); ?>
                                        </div>
                                        <div class="card-deck card-deck-spaced">
                                            <?php global $idfile, $nomefile;
                                            if (is_array($libri_testo_file) && count($libri_testo_file) > 0) {

                                                foreach ($libri_testo_file as $idfile => $nomefile) {
                                                    get_template_part("template-parts/documento/file");
                                                }
                                            }
                                            ?>
                                        </div><!-- /card-deck card-deck-spaced -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            <?php } ?>

                            <?php if($consigli_di_classe) { ?>
                                <h4 class="mb-4" id="art-par-documenti"><?php _e("Consigli di classe", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-12">
                                        <div class="card-deck card-deck-spaced">
                                            <?php
                                            if (is_array($consigli_di_classe) && count($consigli_di_classe) > 0) {
                                                global $documento;
                                                foreach ($consigli_di_classe as $link_scheda_documento) {
                                                    $documento = get_post($link_scheda_documento);
                                                    get_template_part("template-parts/documento/card");
                                                }
                                            }
                                            ?>
                                        </div><!-- /card-deck card-deck-spaced -->
                                    </div><!-- /col-lg-12 -->
                                </div><!-- /row -->

                                <?php
                            }
                            // print_r($fasi_scadenze);
                            if(is_array($fasi_scadenze) && count($fasi_scadenze)>0) {
                                ?>
                                <h4 id="art-par-tempi-scadenze"><?php _e("Tempi e scadenze", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <div class="calendar-vertical mb-5">
                                            <?php
                                            foreach ($fasi_scadenze as $fase){
                                                $arrdata =  explode("-", $fase["data_fase"]);
                                                $monthName = date_i18n('M', mktime(0, 0, 0, $arrdata[1], 10)); // March

                                                ?>
                                                <div class="calendar-date">
                                                    <div class="calendar-date-day">
                                                        <small><?php echo $arrdata[2]; ?></small>
                                                        <p><?php echo $arrdata[0]; ?></p>
                                                        <small><b><?php echo $monthName; ?></b></small>
                                                    </div><!-- /calendar-date-day -->
                                                    <div class="calendar-date-description rounded">
                                                        <div class="calendar-date-description-content">
                                                            <?php echo wpautop($fase["desc_fase"]); ?>
                                                        </div><!-- /calendar-date-description-content -->
                                                    </div><!-- /calendar-date-description -->
                                                </div><!-- /calendar-date -->
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /calendar-vertical -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php
                            }

                            if(trim($casi_particolari) != ""){
                                ?>
                                <h4 id="art-par-casi-particolari"><?php _e("Casi particolari", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9 wysiwig-text">
                                        <?php echo wpautop($casi_particolari); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php
                            }
                            // check for anchor


                            if(trim($altre_info) != ""){
                                ?>
                                <h4 id="art-par-altre-info"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9 wysiwig-text">
                                        <?php echo wpautop($altre_info); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php
                            }

                            


                            if((is_array($link_schede_documenti) && count($link_schede_documenti)>0) || (is_array($file_documenti) && count($file_documenti)>0)){
                                ?>
                                <h5 class="h6  mb-4" id="art-par-documenti"><?php _e("Documenti", "design_scuole_italia"); ?></h5>
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

                            if(isset($arrstrutture) && is_array($arrstrutture) && count($arrstrutture) > 0){
                                ?>
                                <h6><?php _e("Per saperne di più", "design_scuole_italia"); ?></h6>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <ul>
                                            <?php
                                            foreach ($arrstrutture as $snome => $slink){
                                                echo "<li><a href='".$slink."' >".$snome."</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                
                                <?php
                            }
                                ?>
            

                        </div>

                        <!--LOOP NEWS  -->
                        <section id="loop-news-home" class="container"> 
                            <div class="row mt-5 mt-lg-0">
                                <div class="col-lg-7 col-md-12">
                                    <h4>Ultime news </h4>
                                    <div class="row mt-3 mt-lg-0 ml-md-0 mr-md-0 justify-content-between">
                            
                            
                                        <?php
                                        $loop = new WP_Query( array( 
                                            'post_type'         => 'post', 
                                            'post_status'       => 'publish', 
                                            'orderby'           => 'count', 
                                            'order'             => 'DESC', 
                                            'posts_per_page'    => 3,)
                                        );
                                        
                                        while ($loop -> have_posts()) : $loop -> the_post(); ?> 

                                        <article class="col-lg-4 col-12 card"> 
                                            <a href="<?php the_permalink();?>">
                                                <div class="card-bg">
                                                    <div class="card-img-top card-img position-relative">
                                                        <?php the_post_thumbnail("news-thumb");?> 
                                                        <div class="posizione-badges"> 
                                                            <?php get_template_part("template-parts/common/badge-tag.php"); ?> 
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-title text-sx"> <?php the_title(); ?> </p>
                                                        <a href="#" id="btn-mini-default"> <button class="w-auto"><span>Scopri </span></button> </a>
                                                    </div><!--.card-body -->
                                                </div><!--.card-bg -->
                                    
                                        </article> <!--.card -->
                                        <?php endwhile; ?>
                                    </div><!--.row -->
                                
                                    <div class="col-12 pr-0 d-block d-lg-none">
                                        <a id="btn-lg-default-outline" href="#" target="blank" class="col-12 p-0">
                                        <button>Vai alla sezione</button>
                                        </a>
                                    </div>
                                </div><!--col-8-->
                            </div> <!--.row -->
                            

                            <!-- BUTTONS -->
                            <div class="row mt-3">
                                <div class="col-lg-7 p-0 d-none d-lg-block">
                                    <a id="btn-lg-default-outline" href="#" target="blank" class="col-12 p-0">
                                        <button>Vai alla selezione</button>
                                    </a>
                                </div>
                            </div><!--.row -->

                        </section>
                        
                    </div><!-- /col-lg-8 -->
                        <!-- /Main content of the page -->


                    <?php else: ?>
                    <div class="col-lg-12 p-5 m-5 text-center font-weight-bold wysiwig-text">
                        <?php the_content(); ?>
                    </div>
                    <?php endif; ?>

                    <!-- SIDEBAR -->

                    <div id="sidebar" class="col-lg-3 offset-lg-1 px-3 py-5">
                        <aside class="aside-main aside-sticky">
                            
                        <div class="col-12 col-lg-10" id="program-legend">

                            <?php
                                // do action per innestare elementi tramite plugin / child theme
                                do_action("dsi_indirizzo_content_after_description");
                                ?>

                                <?php
                                // $carriera = "";
                                if(trim($carriera) != ""){
                                    ?>
                                    <h5><?php _e("Carriera e opportunità successive", "design_scuole_italia"); ?></h5>
                                    <div class="row variable-gutters">
                                        <div class="col-12 col-lg-10 wysiwig-text">
                                            <?php echo wpautop($carriera); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>

                                <?php
                                if(trim($iscrizione_selezioni) != ""){
                                    ?>
                                    <h5><?php _e("Iscrizione e selezioni", "design_scuole_italia"); ?></h5>
                                    <div class="row variable-gutters">
                                        <div class="col-12 col-lg-10 wysiwig-text">
                                            <?php echo wpautop($iscrizione_selezioni); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>

                                <?php
                                if($telefono || $mail){
                                ?>
                                <div class="row variable-gutters mb-4" >
                                    <div class="col-12">
                                        <h5 id="art-par-contatti"><?php _e("Contatti", "design_scuole_italia"); ?></h5>
                                        <div>
                                            <div class="mailfield pb-1">
                                                <ul>
                                                    <?php if($telefono){ ?><li><strong><?php _e("Telefono", "design_scuole_italia"); ?>:</strong> <a href="tel:$telefono"><?php echo  $telefono; ?></a></li><?php } ?> 
                                                    
                                                    <?php if($mail){ ?><li><strong><?php _e("Email", "design_scuole_italia"); ?>:</strong> <a href="mailto:$mail"><?php echo $mail;  ?></a></li><?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                            </div>

                            
                        </aside>

                    </div>


                </div><!-- /row -->
            </div><!-- /container -->
        </section>
            <?php get_template_part("template-parts/single/related"); ?>
        <?php
        endwhile; // End of the loop.
        ?>
    </main>

<?php
get_footer();
