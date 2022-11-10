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
       
      
       <?php get_template_part("martini-template-parts/hero/hero_page"); ?> 


    <section id="text-block" class="section bg-white">
        <div class="container">
            <div class="row variable-gutters">
                
                <div class="py-5 px-3 col-lg-8">
                    <div class="py-2">    
                        <h2>Alternanza scuola-lavoro</h2>
                        <p class="pt-2">L’Alternanza scuola-lavoro è una modalità didattica innovativa, che attraverso l’esperienza pratica aiuta a consolidare le conoscenze acquisite a scuola e testare sul campo le attitudini di studentesse e studenti, ad arricchirne la formazione e a orientarne il percorso di studio e, in futuro di lavoro, grazie a progetti in linea con il loro piano di studi.
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
                       
                    </div>

                </div><!-- /col-lg-6 -->
                <div id="sidebar" class="col-lg-3 offset-lg-1 px-5 px-3 px-lg-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12 col-lg-9" id="program-legend">
                                <h5>Modulistica</h5>                                
                                <ul class="link-list">
                                    <li> <h6> <?php echo get_post_meta( get_the_ID(), 'martini_titolo', true );?> </h6> </li>
                                    <li> <a href="<?php echo get_post_meta( get_the_ID(), 'martini_url', true );?>"> <?php the_title();?> </a> </li>
                                    <li> <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'martini_email', true );?>" target=blank> <?php echo get_post_meta( get_the_ID(), 'martini_email', true );?> </a> </li>

                                    <li> <a href=""> 
                                        <!-- Qui ci deve andare il documento  -->
                                    </a> </li>
                                
                                </ul>
                            </div>
                        </aside>
                    </div> <!--/ sidebar -->
                  
                
            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();