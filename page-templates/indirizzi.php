<?php
/* Template Name: Indirizzi
 *
 * indirizzi template file
 *
 * @package Design_Scuole_Italia
 */

global $post, $tipologia_indirizzo, $ct;
get_header();


?>
	<?php get_template_part("template-parts/common/breadcrumb"); ?>
		

    <main id="main-container" class="main-container">

        <?php get_template_part("template-parts/hero/hero_page"); ?>

        <section id="text-block" class="section bg-white">
            <div class="container-fluid container-border-top">
                <div class="row main-content variable-gutters">

                    <div class="container col-lg-8">
                        <div class="pt-5 px-3">
                            
                            <?php the_content(); ?>
                        </div>
                    </div><!-- /col-lg-6 -->

                    <div id="sidebar" class="col-lg-3 offset-lg-1px-5 px-3 px-lg-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12 col-lg-9" id="program-legend">
                               
                            </div>
                            
                        </aside>
                    </div> <!--/ sidebar -->
            </div><!-- /row -->
            </div><!-- /container -->
        </section>


    </main>


<?php
get_footer();