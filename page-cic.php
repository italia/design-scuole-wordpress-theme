<?php
/* Template Name: Cic
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
            <div class="container">
                <div class="row main-content variable-gutters">
                    <div class="py-5 px-3 col-lg-8">
                        <div class="py-2">
                            <h2>Centro di Informazione e Consulenza</h2>
                            <p>Il CIC (Centro di Informazione e Consulenza) è un servizio offerto a studenti, genitori e personale scolastico, curato e gestito dalla <strong>dott.ssa Francesca Fontana, psicologa e psicoterapeuta</strong> (Iscrizione all’Ordine della Provincia di Trento n. 349). <br>
                                La consulenza psicologica si configura come uno <strong>spazio di ascolto</strong> e di <strong>confronto libero e gratuito</strong> in un <strong>luogo riservato</strong> e nel rispetto del <strong>segreto professionale.</strong> <br>
                                L’accesso al servizio permetterà alla persona che richiederà il colloquio di trovare ascolto e riflettere con la psicologa su difficoltà e problematiche di varia natura (emotive, relazionali, scolastiche, familiari, ecc.) che possono creare disagio e malessere nella vita quotidiana sia a scuola sia nelle proprie relazioni. L’obiettivo è quello di aiutare a migliorare le proprie capacità di affrontare e risolvere le difficoltà.
                            </p>
                            
                            <?php the_content(); ?>
                        </div>
                    </div><!-- /col-lg-6 -->

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
                    </div>  <!--/ sidebar -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>



    </main>


<?php
endwhile;
get_footer();