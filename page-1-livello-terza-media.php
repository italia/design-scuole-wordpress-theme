<?php
/* Template Name: 1 Livello - terza media
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

    <main id="main-container" class="main-container">

        <?php get_template_part("template-parts/hero/hero_page"); ?>

        <section id="text-block" class="section bg-white">
            <div class="container">
                <div class="row main-content variable-gutters">

                    <div class="col-lg-8 mt-5 mb-5">
                        <div class="pt-5 px-3">
                            <p>Nel 2012 l’Istituto Martino Martini è diventato <strong>centro EDA. </strong><br><br>

                                La sua offerta formativa include un corso finalizzato al conseguimento del diploma conclusivo del primo ciclo di istruzione, previo superamento dell’Esame di Stato finale <strong>(diploma di terza media)</strong>. <br><br>
                                Si rivolge agli adulti (che hanno compiuto sedici anni), italiani e stranieri, che desiderano completare gli studi interrotti da ragazzi. <br><br>
                                Il corso si svolge nel periodo ottobre-maggio.
                            </p>
                            
                            <?php the_content(); ?>
                        </div>
                    </div><!-- /col-lg-6 -->

                    <div id="sidebar" class="col-lg-3 offset-lg-1 px-5 px-3 px-lg-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12 col-lg-9" id="program-legend">
                                <h5>Modulistica</h5>                                
                                <ul class="link-list">
                                    <li> <h6> <?php echo get_post_meta( get_the_ID(), 'martini_titolo', true );?> </h6> </li>
                                    <li> <a href="<?php echo get_post_meta( get_the_ID(), 'martini_url', true );?>"> <?php the_title();?> </a> </li>
                                    <li> <a href="mailto:<?php echo get_post_meta( get_the_ID(), 'martini_email', true );?>" target=blank> <?php echo get_post_meta( get_the_ID(), 'martini_email', true );?> </a> </li>

                                    <li> <a href=""> 
                                        <!-- Qui ci deve andare il documento  -->
                                    </a> </li>
                                
                                </ul>
                            </div>
                        </aside>
                    </div> <!--/ sidebar -->

                </div><!-- /row -->
            </div><!-- /container -->
        </section>

    </main>


<?php
get_footer();