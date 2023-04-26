<?php
/* Template Name: Attività linguistiche
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

<main id="main-container" class="main-container">
       
      
       <?php get_template_part("martini-template-parts/hero/hero_title"); ?> 


    <section id="text-block" class="section bg-white my-5">
        <div class="container">
            <div class="row variable-gutters">
                
                <div class="main-content col-sm-8 col-xxl-6 mb-5 px-3">
                    

                    <?php the_content(); ?>


                </div><!-- /col-lg-6 -->

               
                
            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();