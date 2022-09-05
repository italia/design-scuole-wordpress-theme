<?php
/* Template Name: Mi oriento
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

<main id="main-container" class="main-container">
       
      
       <?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?> 


    <section id="image-block" class="section bg-white">
        <div class="container">
            <div class="row variable-gutters">
                
                <div class="main-content col-lg-6 col-xxl-6">
                    <div class="row variable-gutters mb-3">
                        <div class="px-3">    
                            <h2>Il nuovo servizio di School Counseling del Martino Martini</h2>
                            <p>Sei in difficoltà con il tuo percorso scolastico e non sai se hai fatto la scelta giusta? Hai bisogno di aiuto nella scelta del percorso di Alternanza Scuola Lavoro? Vuoi orientarti meglio rispetto alle scelte post-diploma? Hai desideri e talenti ma non sai come realizzarli? Hai bisogno di aiuto nella compilazione del tuo CV o nella redazione del tuo portfolio? 
                            </p>
                            <p>Scrivi a <a href="mailto:mioriento@martinomartini.eu">mioriento@martinomartini.eu</a> e prendi appuntamento.</p>
                        </div>
                    </div><!-- row -->
                </div><!-- content -->
                
                <div class="col-sm-12 col-md-5 offset-md-1">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                </div>  

            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();