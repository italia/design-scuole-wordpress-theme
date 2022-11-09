<?php
/* Template Name: Orientamento in uscita
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

<main id="main-container" class="main-container">
       
      
       <?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?> 


    <section id="image-block" class="section bg-white my-5">
        <div class="container">
            <div class="row variable-gutters">
                
                <div class="col-lg-6">
                    <div class="row variable-gutters mb-3">
                        <div class="px-3">    
                            <h4 class="mb-4">Orientamento in uscita</h4>
                            <p>L’Orientamento in uscita vuole aiutare gli studenti a maturare una scelta consapevole dopo il conseguimento del diploma, in ambito universitario o lavorativo. Di fronte alla vastità delle opzioni e ai mutamenti continui che investono il mondo della formazione e il mondo del lavoro è fondamentale sapersi orientare. Un lavoro efficace in tal senso permette più facilmente ai giovani di conoscere, cercare, trovare e sfruttare le opportunità offerte dal panorama italiano e non solo.
                            </p>
                        </div>
                    </div><!-- row -->
                    <div class="row d-md-inline mt-5">
                        <a href="#" target="blank" class="btn-lg-default w-100 col-12 col-md-6">
                            <button class="w-auto">Orienta UNITN</button>
                        </a>
                        <a href="#" target="blank" class="btn-lg-default w-100 col-12 col-md-6">
                            <button class="w-auto">Il portale dell'orientamento</button>
                        </a>
                    </div><!--.row -->
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