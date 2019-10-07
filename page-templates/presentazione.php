<?php
/* Template Name: Presentazione
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();

$presentazione_landing_url = dsi_get_template_page_url("page-templates/presentazione.php");
?>

    <main id="main-container" class="main-container">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <?php if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) :
        the_post();
        ?>

        <section class="section bg-white py-2 py-lg-3 py-xl-5">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-lg-5 col-md-8 offset-lg-3">
                        <div class="section-title">
                            <?php the_title( '<h2 class="mb-0">', '</h2>' ); ?>
                            <?php the_content(); ?>
                        </div><!-- /title-section -->
                    </div><!-- /col-lg-5 col-md-8 offset-lg-2 -->

                    <div class="col-lg-3 col-md-4 offset-lg-1">
                        <?php get_template_part("template-parts/single/actions"); ?>
                    </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /section -->

        <section class="section bg-gray-light">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">
                    <div class="col-lg-3 bg-white bg-white-left">
                        <?php //get_template_part("template-parts/search/filters", "articolo"); ?>
                    </div>
                    <div class="col-lg-7 offset-lg-1 pt84">
                            <?php
                            // recupero i post salvati nella pagina di configurazione
                            $presentazione = dsi_get_option("articoli_presentazione", "presentazione");
                            if(is_array($presentazione)){
                                foreach ($presentazione as $idpost){
                                    $post = get_post($idpost);
                                    get_template_part( 'template-parts/list/article', $post->post_type );
                                }
                            }
                           ?>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
        <?php
        endwhile;
           endif;
        ?>
    </main>


<?php
get_footer();
