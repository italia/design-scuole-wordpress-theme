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
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
        <section id="container-spazi">
            <div class="row  justify-content-around my-5">
                <div class="col-12 col-md-5">
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
                <div class="col-12 col-md-5">
                    <img src="https://source.unsplash.com/random">
                </div>
            </div>
            <div class="row mt-5 mx-5">
                <div class="col-12">
                    <h2> Dove siamo </h2>
                    <p id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2760.6432560458743!2d11.091425415561254!3d46.217551290879264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47827cb02fff368d%3A0x1cf5704527b68a6d!2sIstituto%20di%20Istruzione%20Martino%20Martini!5e0!3m2!1sit!2sit!4v1658760735666!5m2!1sit!2sit" 
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    </p>
                </div>
            </div>
            <div class="row justify-content-around mb-5 mt-5">
                <div class="col-12 col-md-5">
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
                <div class="col-12 col-md-5 " >
                    <img src="https://source.unsplash.com/random">
                </div>
            </div>
        </section>

        <section class="container">            
            <div class="row mb-5 mt-5">
                <?php the_content();?>
            </div>
        </section>

    </main>

<?php
get_footer();