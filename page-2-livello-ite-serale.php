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

        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>

        <section id="text-block" class="section bg-white">
            <div class="container">
                <div class="row main-content variable-gutters">

                    <div class="col-lg-8 my-5">
                        <div class="row pt-5">
                            <p>Il corso serale presente all’Istituto Martino Martini è il Tecnico Economico, indirizzo Amministrazione, Finanza e Marketing, articolazione AFM.</p>
                        </div>
                        <div id="image-block" class="row col-10 offset-1">
                            <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                        </div>
                        <div class="row pt-2">
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
                    </div> <!--/ sidebar -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>


    </main>


<?php
get_footer();