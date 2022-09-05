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
            <div class="container-fluid container-border-top">
                <div class="row main-content variable-gutters">

                    <div class="container col-lg-8">
                        <div class="pt-5 px-5">
                            
                            <?php the_content(); ?>
                        </div>
                    </div><!-- /col-lg-6 -->

                    <div id="sidebar" class="col-lg-3 offset-lg-1px-5 px-5 px-lg-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12 col-lg-9" id="program-legend">
                                <h5>Modulistica</h5>
                                
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