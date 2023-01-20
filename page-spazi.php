<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();

?>
<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/hero/hero_page"); ?>
    <section id="container-spazi" class="container px-4 mb-5">
        <div class="row my-5">
            <div class="col-12 col-md-6">
                <h2> Le strutture </h2>
                <p>
                    La scuola si compone di due sedi: la sede di via Perlasca e la sede di via Filzi.
                    L’edificio di via Perlasca , costruito secondo criteri improntati al risparmio energetico e alla sostenibilità ambientale, ospita gli studenti in ambienti luminosi e spaziosi, con laboratori attrezzati, una grande palestra, un auditorium e ampi spazi verdi all’esterno. L’offerta formativa si arricchisce con l’adozione di strumenti educativi atti a sensibilizzare a un corretto rapporto con i consumi energetici, nonché a valorizzare le risorse alternative con attività volte a promuovere la sostenibilità e l’efficienza energetica.

                </p>
            </div>
            <div class="col-12 col-md-5 offset-md-1">
                <img src="https://source.unsplash.com/random">
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 col-md-6 ">
                <img src="https://source.unsplash.com/random">
            </div>
            <div class="col-12 col-md-5 offset-md-1">
                <p>
                    L’edificio di via Filzi, sede scolastica storica di Mezzolombardo, è stato di recente rinnovato per ospitare classi e laboratori dell’istituto in crescita negli ultimi anni scolastici. I lavori di adeguamento e riqualificazione proseguono costantemente per garantire agli studenti la fruizione di un’esperienza scolastica in un ambiente adeguato alle loro necessità di apprendimento.

                </p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <h2> Dove siamo </h2>
                <div style="width: 100%; overflow: hidden;">
                    <iframe width="100%" height="600" frameborder="0" style="border:0; margin-top: -150px;" src="https://www.google.com/maps/d/u/0/embed?mid=1Lqf2ZbM8324bARC0U_fQJacC4AJhOV4&ehbc=2E312F">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 col-md-6">
                <h2> Certificazione Leed </h2>
                <p>
                    L'istituto si sviluppa su un volume di 63.000 metri cubi, una superficie coperta di 4,532 metri
                    quadrati e un parcheggio interrato di 75 posti macchina. Al primo piano ci sono 4 laboratori,
                    l'aula di meccanica e il posto per il custode. Al secondo piano, 40 aule più un'aula multimediale.
                    L'edificio contiene anche una palestra, un'aula magna e una mensa. E' dotato di pannelli solari per
                    l'acqua calda e di un impianto fotovoltaico da 20 Kw. Un edificio a «sostenibilità ambientale» che ha
                    ottenuto la certificazione Leed Gold.
                </p>
            </div>
            <div class="col-12 col-md-5 offset-md-1">
                <img src="https://source.unsplash.com/random">
            </div>
        </div>

        <!-- <div class="row"> 
                QUI CI VA LA GALLERIA 
            </div> -->

    </section>
</main>

<?php
get_footer();
