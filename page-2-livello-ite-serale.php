<?php
/* Template Name: 2 Livello - ITE serale
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

    <main id="main-container" class="main-container">

        <?php get_template_part("martini-template-parts/hero/hero_page"); ?>

        <section id="text-block" class="section bg-white">
            <div class="container">
                <div class="row main-content variable-gutters">

                    <div class="col-lg-8 my-5">
                        <div class="row pt-5 px-1">
                            <p>Il corso serale presente all’Istituto Martino Martini è il Tecnico Economico, indirizzo Amministrazione, Finanza e Marketing, articolazione AFM.</p>
                        </div>
                        <div id="image-block" class="row col-12">
                            <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                        </div>
                        <div class="row pt-2 px-1">
                            <p>Le lezioni si svolgono da lunedì a venerdì dalle ore 19.00 alle ore 23.20. Da lunedì a giovedì in presenza nella sede di via Perlasca n. 4 a Mezzolombardo, il venerdì a distanza tramite Meet. <br>
                            All'atto dell'iscrizione ogni studente sarà dotato di un account di tipo nome.cognome@martinomartini.eu che permetterà di accedere a Google Workspace, risorsa chiave per il corso serale, dove condivisione e collaborazione sono elementi imprescindibili per il successo formativo dei frequentanti. <br>
                            <br>
                            Gli aspetti più significativi del corso serale sono:
                                <ul class="pl-0">
                                    <li>Riduzione dell'orario settimanale di lezione (27 ore settimanali distribuite su 5 giorni)</li>
                                    <li>Riconoscimento di crediti formativi e professionali</li>
                                    <li>Adozione di percorsi didattici che valorizzano le esperienze culturali e professionali degli studenti</li>
                                    <li>Organizzazione delle attività didattiche secondo una logica modulare</li>
                                    <li>Flessibilità dei percorsi formativi</li>
                                </ul>
                            </p>
                            
                        </div>
                    </div><!-- /main content -->

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