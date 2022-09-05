<?php
/* Template Name: Asl
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

<main id="main-container" class="main-container">
       
      
       <?php get_template_part("template-parts/hero/hero_page"); ?> 


    <section id="text-block" class="section bg-white">
        <div class="container-fluid container-border-top">
            <div class="row variable-gutters">
                
                <div class="main-content col-lg-8 col-xxl-6">
                    <div class="pt-5 px-3">    
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

                    <div class="pt-5 px-3">    
                        <h2>Le finalità dell’ASL</h2>
                        <ul>
                            <li>Arricchire la formazione acquisita nei percorsi scolastici con l'acquisizione di competenze  osservabili «sul campo»</li> 
                            <li>Favorire l'orientamento dei giovani per valorizzarne le vocazioni personali, gli interessi e gli stili di apprendimento individuali</li>
                            <li>Acquisire competenze spendibili nel mondo del lavoro</li>
                            <li>Realizzare un organico collegamento delle istituzioni scolastiche e formative con il mondo del  lavoro e la società civile</li>
                            <li>Correlare l'offerta formativa allo sviluppo culturale, sociale ed economico del territorio</li>
                        </ul>
                       
                    </div>

                </div><!-- /col-lg-6 -->

                <div id="sidebar" class="col-lg-3 offset-lg-1 col-xxl-4 offset-xxl-2 aside-border px-3 py-5">
                    <aside class="aside-main aside-sticky">
                        <div class="aside-title col-10 col-xl-8" id="program-legend">
                            <h5>Contatti</h5>
                            <p id="quotes">È necessario contattare la dottoressa Fontana tramite email o telefono per concordare data e orario dell’appuntamento. In caso di necessità particolari, è possibile concordare l’appuntamento in altre date e orari. </p>
                        </div>
                        <div class="col-lg-3 offset-lg-1 col-xl-4 offset-xl-2 aside-border px-3 py-4">
                        <?php 
 
                                    if(trim($procedura_esito) != ""){ 
                                        ?> 
                                        <h6 class="h6"><?php _e("email", "design_scuole_italia"); ?></h6> 
                                        <div class="row variable-gutters"> 
                                            <div class="col-lg-9"> 
                                                <?php echo wpautop($procedura_esito); ?> 
                                            </div><!-- /col-lg-9 --> 
                                        </div><!-- /row --> 
                                        <?php 
                                    } 
                                    ?>

                        </div>
                        <!-- <div id="lista-paragrafi" class="link-list-wrapper collapse show" role="region"
                            aria-labelledby="program-legend"> -->
                            <ul class="link-list">
                                <h6>prova di un sottotitolo</h6>
    
                            </ul>
                        </div>
                    </aside>
                </div>
                  
                
            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();