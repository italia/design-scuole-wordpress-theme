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
        <?php get_template_part("martini-template-parts/hero/hero_page"); ?>
        <section class="container mt-5 mb-5">
            <div class="col">
                <h2> La struttura </h2>
                <p>
                L’edificio, costruito secondo criteri improntati al risparmio energetico e alla sostenibilità ambientale, 
                ospita i discenti in ambienti luminosi e spaziosi, con laboratori attrezzati, una grande palestra, 
                un auditorium e ampi spazi verdi all’esterno. L’offerta formativa si arricchisce con l’adozione di 
                strumenti educativi atti a sensibilizzare a un corretto rapporto con i consumi energetici, 
                nonché a valorizzare le risorse alternative con attività volte a promuovere la sostenibilità e l’efficienza 
                energetica.
                </p>
            </div>
            <div class="col">
                <h2> La struttura </h2>
                <p>
                L’edificio, costruito secondo criteri improntati al risparmio energetico e alla sostenibilità ambientale, 
                ospita i discenti in ambienti luminosi e spaziosi, con laboratori attrezzati, una grande palestra, 
                un auditorium e ampi spazi verdi all’esterno. L’offerta formativa si arricchisce con l’adozione di 
                strumenti educativi atti a sensibilizzare a un corretto rapporto con i consumi energetici, 
                nonché a valorizzare le risorse alternative con attività volte a promuovere la sostenibilità e l’efficienza 
                energetica.
                </p>
            </div>

            <div class="gallery mt-5">
                <div class="items">
                    <?php the_content();?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();