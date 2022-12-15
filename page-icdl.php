<?php
/* Template Name: ICDL
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

<main id="main-container" class="main-container">
       
      
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
        <div class="container container-border-top">
                <div class="row main-content variable-gutters">

                    <div class="container col-lg-8 mb-5">

                        <div class="row"> 
                            <div class="pt-5">    
                                <h2>ICDL full standard</h2>
                                <p>lI 1° aprile 2014 ICDL Full Standard, che oggi si chiama ICDL Full Standard, è stata accreditata come schema di certificazione delle competenze informatiche da Accredia, unico ente italiano di accreditamento preposto a validare i processi di certificazione delle persone.
                                </p>
                                
                                <h3>Perchè certificarsi?</h3>
                                <p>Nelle Scuole secondarie di secondo grado e in molti corsi di Laurea e dipartimenti Universitari ai possessori di una certificazione ICDL viene riconosciuto un credito formativo.
                                <br>
                                Nel mondo del lavoro costituisce un valore aggiunto con cui poter arricchire il proprio curriculum. 
                                <br>
                                Nella Pubblica Amministrazione, l'ICDL fa punteggio o è prerequisito in molti concorsi a titoli ed esami e in bandi di assunzione.</p>

                                <h3>Quali certificazioni?</h3>
                                <p>Nelle Scuole secondarie di secondo grado e in molti corsi di Laurea e dipartimenti Universitari ai possessori di una certificazione ICDL viene riconosciuto un credito formativo.
                                <br>
                                Nel mondo del lavoro costituisce un valore aggiunto con cui poter arricchire il proprio curriculum.
                                <br>
                                Nella Pubblica Amministrazione, l'ICDL fa punteggio o è prerequisito in molti concorsi a titoli ed esami e in bandi di assunzione.</p>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-4">
                                <h4>ICDL Base</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p><strong>Composta da 4 moduli base con percorso obbligatorio:</strong></p>
                                <ul>
                                    <li>Computer Essentials</li>
                                    <li>Online Essentials</li>
                                    <li>Word Processing</li>
                                    <li>Spreadsheets</li>
                                </ul>
                            </div>
                        </div> <!-- scheda titoletto + elenco -->

                        <div class="row mt-5">
                            <div class="col-lg-4">
                                <h4>ICDL Standard</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p><strong>Composta dai 4 moduli base + 3 a scelta fra quelli elencati:</strong></p>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p>Moduli a scelta:</p>
                                        <ul>
                                            <li>Computer Essentials</li>
                                            <li>Online Essentials</li>
                                            <li>Word Processing</li>
                                            <li>Spreadsheets</li>
                                        </ul>
                                    </div>
                                    <div class="offset-sm-2 col-sm-5">
                                        <p>Moduli a scelta:</p>
                                        <ul>
                                            <li>Online Collaboration</li>
                                            <li>Using Database</li>
                                            <li>Presentation</li>
                                            <li>IT Security</li>
                                            <li>Project Planning</li>
                                            <li>WebEditing</li>
                                            <li>ImageEditing</li>
                                            <li>CAD 2D</li>
                                            <li>Health/li>
                                            <li>Digital Marketing</li>
                                            <li>Computing</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- scheda titoletto + elenco -->

                        <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL Full Standard</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p><strong>Composta da 4 moduli base con percorso obbligatorio:</strong></p>
                                <ul>
                                    <li>CComputer Essentials</li>
                                    <li>Online Essentials</li>
                                    <li>Word Processing</li>
                                    <li>Spreadsheets</li>
                                    <li>Online Collaboration</li>
                                    <li>Presentation</li>
                                    <li>IT Security</li>
                                </ul>
                            </div>
                        </div> <!-- scheda titoletto + elenco -->

                        <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL Advanced Word Processing</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p>Si ottiene superando il solo modulo d'esame Advanced Word Processing (correzione automatica o manuale)</p>
                            </div>
                        </div> <!-- scheda titoletto + paragrafo-->

                        <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL Advanced Spreadsheets</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p>Si ottiene superando il solo modulo d'esame Advanced Spreadsheets (correzione automatica o manuale)</p>
                            </div>
                        </div> <!-- scheda titoletto + paragrafo-->

                         <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL Advanced Databases</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p>SSi ottiene superando il solo modulo d'esame Advanced Databases (correzione automatica o manuale)</p>
                            </div>
                        </div> <!-- scheda titoletto + paragrafo-->

                        <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL Advanced Presentation</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p>Si ottiene superando il solo modulo d'esame Advanced Presentation (correzione automatica o manuale)</p>
                            </div>
                        </div> <!-- scheda titoletto + paragrafo-->

                        <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL Expert</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p>Composta da 3 moduli Advanced a scelta</p>
                            </div>
                        </div> <!-- scheda titoletto + paragrafo-->

                        <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL CAD 2D</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p>Si ottiene superando il solo modulo d'esame CAD 2D</p>
                            </div>
                        </div> <!-- scheda titoletto + paragrafo-->

                        <div class="row mt-5 px-3">
                            <div class="col-lg-4">
                                <h4>ICDL CAD 2D</h4>
                            </div>
                            <div class="offset-lg-1 col-lg-7">
                                <p>Si ottiene superando il solo modulo d'esame CAD 2D</p>
                            </div>
                        </div> <!-- scheda titoletto + paragrafo-->

                        <!-- Secondo me sta roba però deve essere editabile -->


                        
                        <div class="row">
                            <div class="mt-5 px-3">    
                                <h3>Costi</h3>
                                <p>Il costo per il rilascio da parte dell'AICA delle certificazioni ICDL è formato da 2 voci:</p>
                                    <ul>
                                        <li>il costo per l'acquisto della Skills Card (iscrizione al programma di esami ICDL);</li>
                                        <li>il costo per l'iscrizione a ciascun esame.</li>
                                   </ul>
                                   <p>I prezzi praticati dall’Istituto Martini nell’a.s. 2021/2022 sono riportati nella seguente tabella:</p>
                            </div>
                                <div class="col-12 text-center">
                                        <img class="img-mobile" src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                                </div>
                        </div>

                        <div class="row">
                            <div class="mt-5 px-3">    
                                <h4>Esami IT Security “Io clicco sicuro” con la carta “IoStudio”</h4>
                                <p>Iocliccosicuro è un’iniziativa di AICA e di ioStudio - la Carta dello Studente, che ti permette di sostenere gratuitamente il modulo IT-Security di ICDL <br>
                                Se hai IoStudio - la Carta dello Studente, puoi sfruttare questa opportunità, dal sito 
                                <a href="https://iostudio.pubblica.istruzione.it/web/guest/home" target="blank">IoStudio la carta dello studente.</a>
                                </p>
                                <p>Per iscriverti segui questi passaggi: <br>
                                    Se non l’hai già fatto, ricordati di attivare il tuo account sul Portale dello Studente cliccando su “PRIMO ACCESSO” <br>
                                    Fai login con la tua Utenza e Password e seleziona tra le offerte la categoria “Corsi di Informatica”. 
                                </p>
                                <p>Scegli il progetto “iocliccosicuro - con ICDL puoi”.
                                Clicca sul pulsante VAI. <br>
                                Compila il form e segui le istruzioni per prepararti su micertificoICDL.it <br>
                                 Da quando ti registri qui, hai 12 mesi per studiare e, quando ti sentirai pronto, sostenere l’esame. 
                                </p>
                                <h6>Link per la nuova procedura di attivazione del progetto </h6>
                                <p>Per ulteriori informazioni 
                                <a href="https://www.aicanet.it/iocliccosicuro" target="blank">https://www.aicanet.it/iocliccosicuro</a> </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-5 px-3">    
                                <h3>Informazioni e link utili</h3>
                                <p>Possedendo una Skills Card Nuova ICDL, ci si può iscrivere ad una sessione di esami programmata da qualsivoglia Test Center. 
                                Per iscriversi a un esame non è necessario stampare la Skills Card, essendo un documento digitale registrato nel sistema informatico di AICA, è sufficiente riportare il numero sul modulo di iscrizione.
                                Il pagamento della quota di esame dà diritto a effettuare l'esame solo presso il Test Center al quale è stata pagata.
                                L'iscrizione deve essere eseguita con un preavviso superiore ai 5 giorni rispetto alla data della Sessione e, comunque, sulla base delle indicazioni del Test Center.
                                Il candidato può decidere di sostenere gli esami in Test Center differenti.
                                È possibile effettuare un versamento cumulativo di skills card ed esami.
                                Il possessore di una Skills card può accedere via web alla Card intestatagli, registrandosi sul sito di AICA, nella sezione ad accesso riservato denominata Linea diretta per il candidato, prendendo così visione dei propri dati anagrafici e degli esiti degli esami superati.
                                </p>
                                <p><strong>NOTA BENE:</strong> Coloro che possiedono una Skills card acquistata prima del 2014 possono richiedere il passaggio alla Nuova ICDL acquistando una nuova Skills card su cui gli esami sostenuti verranno convertiti, previo un esame UPDATE, nel seguente modo:</p>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <img class="img-mobile" src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                                </div>
                            </div>

                        <div class="row">
                            <div class="mt-5 px-3">    
                                <h5>Link utili</h5>
                                <p>
                                     N.B.: Alcune sezioni dei siti riportati qui di seguito sono consultabili solo previa registrazione alla piattaforma e ottenimento di credenziali da parte del gestore (gratuitamente o a pagamento). 
                                     <br>
                                     <br>
                                <a href="www.ICDL.it" target="blank"> www.ICDL.it </a> / <a href="www.aica.it" target="blank"> www.aica.it </a> / <a href="www.micertificoICDL.it" target="blank"> www.micertificoICDL.it </a> / <a href="www.aula01.it" target="blank"> www.aula01.it</a> 	
                                <br>  		   
                                <br>
                                   
                                    
                                </p>
                            </div>
                        </div>

                        <?php the_content(); ?>

                    </div>  <!-- Main content of page -->
                    
                    <div id="sidebar" class="col-lg-3 offset-lg-1 px-3 py-5">
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
                                <?php 
                                $emails = get_post_meta( get_the_ID(), 'martini_email', true );
                                $phone = get_post_meta( get_the_ID(), 'martini_phone', true );

                                
                                if(is_array ($emails) && count($emails) && strlen($emails[0])){ ?>
                                <h5>Contatti</h5> 
                                <ul class="link-list">
                                    
                                    <?php foreach ( $emails as $email){?>
                                    
                                    <li>
                                         <a href="mailto:<?php echo $email;?>" target=blank> <?php echo $email;?> </a> 
                                    </li>
                                    <?php }?>
                                   
                                </ul>
                                <?php } ?>

                                <?php
                                if(is_array ($phone) && count($phone) && strlen($phone[0])){ ?>
                                <h6>Telefono</h6>
                                <ul class="">
                                    
                                    <?php foreach ( $phone as $phone){?>
                                    
                                    <li>
                                         <a href="tel:<?php echo $phone;?>"> <?php echo $phone;?> </a> 
                                    </li>
                                    <?php }?>
                                   
                                </ul>

                                <?php } ?>


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
                    </div>  <!--/ sidebar -->
                </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
endwhile;
get_footer();