<?php
/* Template Name: Orientamento in uscita
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();

$presentazione_landing_url = dsi_get_template_page_url("page-templates/cic.php");
?>

<main id="main-container" class="main-container">
       
      
       <?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?> 


    <section id="image-block" class="section bg-white">
        <div class="container">
            <div class="row variable-gutters">
                
                <div class="main-content col-lg-6 col-xxl-6">
                    <div class="row variable-gutters mb-3">
                        <div class="pt-5 px-3">    
                            <h2>Orientamento in uscita</h2>
                            <p>L’Orientamento in uscita vuole aiutare gli studenti a maturare una scelta consapevole dopo il conseguimento del diploma, in ambito universitario o lavorativo. Di fronte alla vastità delle opzioni e ai mutamenti continui che investono il mondo della formazione e il mondo del lavoro è fondamentale sapersi orientare. Un lavoro efficace in tal senso permette più facilmente ai giovani di conoscere, cercare, trovare e sfruttare le opportunità offerte dal panorama italiano e non solo.
                            </p>
                        </div>
                    </div><!-- row -->
                    <div class="row d-md-inline mt-5">
                        <a id="btn-lg-default" href="#" target="blank" class="col-12 col-md-6">
                            <button class="wauto">Orienta UNITN</button>
                        </a>
                        <a id="btn-lg-default" href="#" target="blank" class="col-12 col-md-6">
                            <button class="wauto">Il portale dell'orientamento</button>
                        </a>
                    </div><!--.row -->
                </div><!-- content -->
                
                <div class="col-sm-12 col-md-6">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                </div>  

            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();