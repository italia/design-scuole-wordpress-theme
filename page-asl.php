<?php
/* Template Name: Asl
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

<main id="main-container-asl" class="main-container">
       
      
       <?php get_template_part("martini-template-parts/hero/hero_title"); ?> 

       <?php
        while ( have_posts() ) :
            the_post();
            set_views($post->ID);
            

            $mail = get_post_meta("martini_email");
            $phone = get_post_meta("martini_phone");
            $documenti = get_post_meta("documents_download");
            $link_url = get_post_meta("martini_url");
            $ulteriori_informazioni = get_post_meta("martini_info");
            $info_variabili_titolo = get_post_meta("martini_titolo");
            $info_variabili = get_post_meta("martini_info_variable");



        ?>


    <section id="text-block" class="section bg-white">
        <div class="container">
            <div class="row main-content variable-gutters">
                
                <div class="mb-5 pt-5 px-3 col-lg-8">
                    <div class="">    
                        <h2>Alternanza scuola-lavoro</h2>
                        <p>L’Alternanza scuola-lavoro è una modalità didattica innovativa, che attraverso l’esperienza pratica aiuta a consolidare le conoscenze acquisite a scuola e testare sul campo le attitudini di studentesse e studenti, ad arricchirne la formazione e a orientarne il percorso di studio e, in futuro di lavoro, grazie a progetti in linea con il loro piano di studi.
                        <br>
                        <br>
                        L’Alternanza scuola-lavoro, obbligatoria per tutte le studentesse e gli studenti degli ultimi tre anni delle scuole superiori, licei compresi, è una delle innovazioni più significative della legge 107 del 2015 (La Buona Scuola) in linea con il principio della scuola aperta.
                         <br>
                        <br>
                        Un cambiamento culturale per la costruzione di una via italiana al sistema duale, che riprende buone prassi europee, coniugandole con le specificità del tessuto produttivo ed il contesto socio-culturale italiano.
                         <br>
                        <br>
                        Con la delibera della giunta provinciale n. 631 del 15 maggio 2020 si è stabilito che il monte ore minimo di alternanza scuola-lavoro ai fini dell’ammissione all’esame di Stato sia di 150 ore per gli istituti tecnici e di 90 ore per i licei PER LE ATTUALI CLASSI QUINTE E QUARTE.
                        Ai fini dell’ammissione all’esame di Stato 2023/24 (ATTUALI TERZE) il monte ore di alternanza scuola-lavoro rimane, invece, quello stabilito dalla delibera n. 1616 del 18 ottobre 2019, ossia di 400 ore per gli istituti tecnici e professionali e 200 ore per i licei.
                        Tali esperienze verranno valutate dalla commissione stage e la valutazione contribuisce alla valutazione disciplinare per quanto riguarda le competenze specifiche maturate e come valutazione del percorso di cittadinanza per quanto riguarda le competenze trasversali.
                        Nel colloquio dell’Esame di Stato viene valutata la presentazione dell’esperienza di alternanza scuola-lavoro.
                         <br>
                        <br>
                        Nelle linee guida nazionali è specificato che: <br></p>
                        <p id="quotes"> “Il giovane mantiene lo status di studente, la responsabilità del percorso è in capo alla scuola e l’alternanza è presentata come una metodologia didattica e non costituisce affatto un  rapporto di lavoro. Le attività nella struttura ospitante possono essere realizzate anche in  periodi di sospensione della didattica, all’estero, nonché con la modalità dell’impresa formativa  simulata (=curricolare non pagata, salvo volontà del datore di lavoro). Per i soggetti disabili i  periodi di apprendimento mediante esperienze di lavoro sono dimensionati in modo da  promuovere l’autonomia anche ai fini dell’inserimento nel mondo del lavoro ” 
                        </p>
                    </div>

                    <div class="py-2">    
                        <h3>Le finalità dell’ASL</h3>
                        <ul class="list px-4 pt-2">
                            <li>Arricchire la formazione acquisita nei percorsi scolastici con l'acquisizione di competenze  osservabili «sul campo»</li> 
                            <li>Favorire l'orientamento dei giovani per valorizzarne le vocazioni personali, gli interessi e gli stili di apprendimento individuali</li>
                            <li>Acquisire competenze spendibili nel mondo del lavoro</li>
                            <li>Realizzare un organico collegamento delle istituzioni scolastiche e formative con il mondo del  lavoro e la società civile</li>
                            <li>Correlare l'offerta formativa allo sviluppo culturale, sociale ed economico del territorio</li>
                        </ul>

                         <?php the_content(); ?>
                       
                    </div>

                </div><!-- /col-lg-6 -->
                <div id="sidebar" class="col-lg-3 offset-lg-1 px-5 px-3 px-lg-3 py-3">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12 col-lg-9" id="program-legend">
                                

                                <!-- Altre informazioni -->
                                 <?php
                                $ulteriori_informazioni = get_post_meta( get_the_ID(), 'martini_info', true );
                                if(trim($ulteriori_informazioni) != ""){
                                    ?>
                                    <h5>Altre informazioni</h5> 
                                    <div class="row variable-gutters">
                                        <div id="quotes" class="col-12 wysiwig-text">
                                            <?php echo wpautop($ulteriori_informazioni); ?>
                                        </div>
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <!-- //Altre informazioni -->

                                <!-- Info variabili - titolo -->
                                 <?php
                                $info_variabili_titolo = get_post_meta( get_the_ID(), 'martini_titolo', true );
                                if(trim($info_variabili_titolo) != ""){
                                    ?>
                                    <h5><?php echo wpautop($info_variabili_titolo); ?></h5> 
                                    <?php
                                }
                                ?>
                                <!-- //Info variabili - titolo -->

                                <!-- Info variabili -->
                                 <?php
                                $info_variabili = get_post_meta( get_the_ID(), 'martini_info_variable', true );
                                if(trim($info_variabili) != ""){
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-12 wysiwig-text">
                                            <?php echo wpautop($info_variabili); ?>
                                        </div>
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <!-- //Info variabili -->

                                <!-- Campo contatti -->
                                    <div class="mailfield pb-1">
                                        <?php
                                        $martini_group_contact = get_post_meta(get_the_ID(), 'martini_group_contact', true);
                                        if (is_array($martini_group_contact) && !empty($martini_group_contact)) { ?>
                                        
                                        <h5>Contatti</h5>
                                        <ul>      
                                            <?php
                                            $martini_group_contact = get_post_meta(get_the_ID(), 'martini_group_contact', true);
                                            if (is_array($martini_group_contact) && !empty($martini_group_contact)) 

                                            foreach ($martini_group_contact as $martini_contact) {
                                                $martini_contatto = esc_html($martini_contact["martini_contatto"], 'nome contatto');
                                                $martini_contatto = esc_html($martini_contact["martini_numero_contatto"], 'numero contatto');
                                                $martini_contatto = esc_html($martini_contact["martini_email"], 'email'); ?>

                                                <li>
                                                    <?php if ($martini_contact["martini_contatto"] != "") echo '<h6 class"mailfield"> ' . $martini_contact["martini_contatto"] . ' </h6>'; ?>
                                                    <?php if ($martini_contact["martini_numero_contatto"] != "") echo '<a href="tel:'.$martini_contact["martini_numero_contatto"].'"> ' . $martini_contact["martini_numero_contatto"] . ' </a>'; ?>
                                                    <br>
                                                    <?php if ($martini_contact["martini_email"] != "") echo '<a href="mailto:'. $martini_contact["martini_email"] . '"> ' . $martini_contact["martini_email"] . ' </a>'; ?>
                                                </li>
                                            
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                        <?php } ?>
                                    </div>
                                    <!--/Campo contatti -->
                                
                                <!-- Campo modulistica -->
                                <?php 
                                $multidocuments_download = get_post_meta( get_the_ID(), 'documents_download', true );
                                if(is_array ($multidocuments_download) && !empty($multidocuments_download)){ ?>
                                <h5>Modulistica</h5> 
                                <ul class="link-list uppercase_text">
                                    
                                    <?php foreach ( $multidocuments_download as $docID => $documenti){?>
                                    
                                    <li>
                                         <a href="<?php echo $documenti;?>" target=blank> <?php echo get_the_title($docID);?> </a> 
                                    </li>
                                    <?php }?>
                                    
                                </ul>
                                <?php } ?>
                                <!--/Campo modulistica -->

                                <!-- Campo link -->
                                <?php 
                                $link_url = get_post_meta( get_the_ID(), 'martini_url', true );
                                
                                if(is_array ($link_url) && count($link_url) && strlen($link_url[0])){ ?>
                                <h5>Link utili</h5> 
                                <ul class="link-list">
                                    
                                    <?php foreach ( $link_url as $link_url){?>
                                    
                                    <li>
                                         <a href="<?php echo $link_url;?>" target=blank> <?php echo $link_url;?> </a> 
                                    </li>
                                    <?php }?>
                                   
                                </ul>
                                <?php } ?>
                                <!--/Campo link -->

                            </div>
                        </aside>
                    </div> <!--/ sidebar -->
                  
                
            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
endwhile;
get_footer();