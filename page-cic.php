<?php
/* Template Name: Presentazione
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();

$presentazione_landing_url = dsi_get_template_page_url("page-templates/presentazione.php");
?>

    <main id="main-container" class="main-container">

        <?php get_template_part("template-parts/hero/hero_page"); ?>

        <section id="text-block" class="section bg-white">
            <div class="container container-border-top">
                <div class="row variable-gutters">

                    <div class="main-content col-lg-8">
                        <div class="article-wrapper pt-4 px-3">
                            <H3>Centro di Informazione e Consulenza</H3>
                            <p>Il CIC (Centro di Informazione e Consulenza) è un servizio offerto a studenti, genitori e personale scolastico, curato e gestito dalla dott.ssa Francesca Fontana, psicologa e psicoterapeuta (Iscrizione all’Ordine della Provincia di Trento n. 349).
                                La consulenza psicologica si configura come uno spazio di ascolto e di confronto libero e gratuito in un luogo riservato e nel rispetto del segreto professionale.
                                L’accesso al servizio permetterà alla persona che richiederà il colloquio di trovare ascolto e riflettere con la psicologa su difficoltà e problematiche di varia natura (emotive, relazionali, scolastiche, familiari, ecc.) che possono creare disagio e malessere nella vita quotidiana sia a scuola sia nelle proprie relazioni. L’obiettivo è quello di aiutare a migliorare le proprie capacità di affrontare e risolvere le difficoltà.
                            </p>
                            <?php the_content(); ?>
                        </div>
                    </div><!-- /col-lg-6 -->

                    <div id="sidebar" class="col-lg-3 offset-lg-1 aside-border px-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="aside-title" id="program-legend">
                                <H3>Prova di un titolo</H3>
                                <a class="toggle-link-list">
                                <span>
                                    <!-- <?php _e("Indice del Programma", "design_scuole_italia"); ?> Qui ci deve andare il contenuto ma dobbiamo capire come gestirlo -->
                                </span>
                                </a>
                            </div>
                            <!-- <div id="lista-paragrafi" class="link-list-wrapper collapse show" role="region"
                                aria-labelledby="program-legend"> -->
                            <ul class="link-list">
                                <h6>prova di un sottotitolo</h6>

                            </ul>
                    </div>
                    </aside>
                </div>

                <!-- <div class="col-lg-12 p-5 m-5 text-center font-weight-bold wysiwig-text">
                    <?php the_content(); ?>
                </div> -->

            </div><!-- /row -->
            </div><!-- /container -->
        </section>


    </main>


<?php
get_footer();