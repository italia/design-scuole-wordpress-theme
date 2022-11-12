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
        ?>

        <section id="text-block" class="section bg-white">
            <div class="container-fluid container-border-top">
                <div class="row main-content variable-gutters">
                    <div class="container col-lg-8">
                        <div class="pt-5 px-3">
                            <h2>Centro di Informazione e Consulenza</h2>
                            <p>Il CIC (Centro di Informazione e Consulenza) è un servizio offerto a studenti, genitori e personale scolastico, curato e gestito dalla <strong>dott.ssa Francesca Fontana, psicologa e psicoterapeuta</strong> (Iscrizione all’Ordine della Provincia di Trento n. 349). <br>
                                La consulenza psicologica si configura come uno <strong>spazio di ascolto</strong> e di <strong>confronto libero e gratuito</strong> in un <strong>luogo riservato</strong> e nel rispetto del <strong>segreto professionale.</strong> <br>
                                L’accesso al servizio permetterà alla persona che richiederà il colloquio di trovare ascolto e riflettere con la psicologa su difficoltà e problematiche di varia natura (emotive, relazionali, scolastiche, familiari, ecc.) che possono creare disagio e malessere nella vita quotidiana sia a scuola sia nelle proprie relazioni. L’obiettivo è quello di aiutare a migliorare le proprie capacità di affrontare e risolvere le difficoltà.
                            </p>
                            <?php the_content(); ?>
                        </div>
                    </div><!-- /col-lg-6 -->

                    <div id="sidebar" class="col-lg-3 offset-lg-1 px-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12 col-lg-9" id="program-legend">
                                <h5>Contatti</h5>
                                <p id="quotes">È necessario contattare la dottoressa Fontana tramite email o telefono per concordare data e orario dell’appuntamento. In caso di necessità particolari, è possibile concordare l’appuntamento in altre date e orari. </p>
                            </div>   
                                <div class="col-12 col-lg-9 py-3 mailfield">
                                    <h6>Email</h6>
                                    
                                    <?php if($mail){ ?> <a href="mailto:$mail"><?php echo $mail;  ?></a><?php } ?>
                                </div>
                            <div class="col-12 col-lg-9 py-3">
                                <h5>Modulistica</h5>
                                <a>CONSENSO INFORMATO</a> 
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