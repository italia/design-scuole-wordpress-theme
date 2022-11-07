<?php
/**
 * Servizio template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();

$titolo_pagina = get_post_meta( get_the_ID(), '_dsi_indirizzo_corso_di_studio', true );

?>
<?php get_template_part("template-parts/hero/hero_martini/hero_indirizzi"); ?>      

    <main id="main-container" class="main-container  container">


        
        <?php
        while ( have_posts() ) :
            the_post();
            set_views($post->ID);
            $user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);

            // get all post meta cmb2
            $percorsi = dsi_get_percorsi_of_scuola($post);
            // print_r($percorsi);
            //$sottotitolo = dsi_get_meta("sottotitolo");

            // $link_struttura_didattica = dsi_get_meta("link_struttura_didattica");

            $carriera = dsi_get_meta("carriera");
            $programma = dsi_get_meta("programma");
            $descrizione = dsi_get_meta("descrizione");
            $corso_di_studio = dsi_get_meta("corso_di_studio");
            $iscrizione_selezioni = dsi_get_meta("iscrizione_selezioni");

            $calendario_classi_descrizione = dsi_get_meta("calendario_classi_descrizione");
            $calendario_classi_file = dsi_get_meta("calendario_classi_file");

            $programma_discipline_sportive = dsi_get_meta("programma_discipline_sportive");
            $programma_primo_biennio = dsi_get_meta("programma_primo_biennio");
            $programma_secondo_biennio = dsi_get_meta("programma_secondo_biennio");
            $programma_quinto_anno = dsi_get_meta("programma_quinto_anno");

            //$sedi = dsi_get_meta("sedi");
         
            $fasi_scadenze = dsi_get_meta("fasi_scadenze");
            
            $luoghi = dsi_get_meta("luoghi");
           
            $libri_testo_descrizione = dsi_get_meta("libri_testo_descrizione");
            $libri_testo_file = dsi_get_meta("libri_testo_file");

            $link_schede_documenti = dsi_get_meta("link_schede_documenti");
            $file_documenti = dsi_get_meta("file_documenti");
            $altre_info = dsi_get_meta("altre_info");

       
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

                        <div class="pt-3">
                            <a href="../"><p>< Torna all'offerta formativa</p></a>
                        </div>
                       

                        

                        <div class="article-wrapper pt-3">
                            
                            <div class="">
                                <?php if(is_array($percorsi)){
                                    echo "<small class=\"text-primary\">";
                                    foreach ($percorsi as $percorso){

                                        if($c) echo ", ";
                                        echo strtoupper($percorso->name);
                                        $c++;
                                    }
                                    echo "</small>";
                                }  ?>
                            </div><!-- /title-section -->
                        
                            
                            <div class="row">
                                <h2 id="art-par-descrizione"><?php _e("Cosa si studia", "design_scuole_italia"); ?></h2>
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
                            
                            <!-- TABELLA ORARIO SETTIMANALE -->
                             <?php if(($calendario_classi_file || $calendario_classi_descrizione)){ ?>
                                <!-- <h4 id="art-par-calendario" class="mt-4"><?php _e("Calendario delle classi", "design_scuole_italia"); ?></h4> -->

                                <div class="row variable-gutters pt-5">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12 px-0 wysiwig-text">
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


                            <!-- Programma discipline sportive -->
                            <div class="pt-5">
                                <?php if($programma_primo_biennio){ ?>
                                    <h4 id="art-par-programma" class="mt-4"><?php _e("Discipline sportive", "design_scuole_italia"); ?></h4>
                                <?php } ?>    

                                <div id="sportfield" class="row variable-gutters pt-3">
                                    <?php if($programma_primo_biennio){ ?>
                                            <div class="col-lg-4 wysiwig-text">
                                                <h6>Primo biennio</h6>
                                                <?php echo apply_filters("the_content",$programma_primo_biennio); ?>
                                            </div><!-- /col-lg-3 -->
                                    <?php } ?>

                                    <?php if($programma_secondo_biennio){ ?>
                                            <div class="col-lg-4 wysiwig-text">
                                                <h6>Secondo biennio</h6>
                                                <?php echo apply_filters("the_content",$programma_secondo_biennio); ?>
                                            </div><!-- /col-lg-3 -->
                                    <?php } ?>

                                    <?php if($programma_quinto_anno){ ?>
                                            <div class="col-lg-4 wysiwig-text">
                                                <h6>Quinto anno</h6>
                                                <?php echo apply_filters("the_content",$programma_quinto_anno); ?>
                                            </div><!-- /col-lg-3 -->
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="pt-5">
                                <?php if(($libri_testo_file || $libri_testo_descrizione)){ ?>
                                    <h4 id="art-par-libri"  class="mt-4"><?php _e("Libri di testo", "design_scuole_italia"); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-12">
                                            <div class="col-lg-12 px-0 wysiwig-text">
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
                            </div>

                            
                            <div class="pt-5">
                                    <?php         
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
                                }?>
                            </div>
                            
                            <div class="pt-5">
                                    <?php
                                if(trim($altre_info) != ""){
                                    ?>
                                    <h4 id="art-par-altre-info"><?php _e("Altre informazioni", "design_scuole_italia"); ?></h4>
                                    <div class="row variable-gutters">
                                        <div class="col-lg-9 wysiwig-text">
                                            
                                            <?php echo wpautop($altre_info); ?>
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
                                    
                                    <?php
                                }?>
                            </div>

                            
                            <div class="pt-5">
                                <?php
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
                                    ?>
                            </div>
            

                        </div>

                        <!-- TO DO: da verificare le categorie -->

                        <!--LOOP NEWS  -->
                        <div class="container col-12">
                            <?php get_template_part('martini-template-parts/loop/loop-progetti-generale') ?>
                        </div>
                        
                        
                    </div><!-- /col-lg-8 -->
                        <!-- /Main content of the page -->


                    <?php else: ?>
                    <div class="">
                        <?php the_content(); ?>
                    </div>
                    <?php endif; ?>



                    <!-- SIDEBAR -->
                    <div id="sidebar" class="col-lg-3 px-3 py-5">
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

                                <?php
                                if(is_array($luoghi) && count($luoghi) > 0){
                                    global $luogo;
                                ?>
                                <div class="row variable-gutters mb-4" >
                                    <div class="col-12">
                                        <h5><?php _e("Sede dell'indirizzo", "design_scuole_italia"); ?></h5>
                                            <div class="col-12 mailfield p-0 card-nobg">
                                                <ul>
                                                            <?php
                                                    $c=0;
                                                    foreach ($luoghi as $idluogo){
                                                        $c++;
                                                        $luogo = get_post($idluogo);
                                                        get_template_part( "template-parts/luogo/card-ico");
                                                    }
                                                    ?>
                                                </ul>
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
            
        <?php
        endwhile; // End of the loop.
        ?>


    </main>

<?php
get_footer();
