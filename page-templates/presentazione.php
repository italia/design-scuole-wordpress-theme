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

            <?php get_template_part("template-parts/hero/page"); ?>
        <section class="section bg-gray-light">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">

                    <div class="col-lg-10 offset-lg-1 pt84">
                            <?php
                            // recupero i post salvati nella pagina di configurazione
                            $presentazione = dsi_get_option("articoli_presentazione", "presentazione");
                            if(is_array($presentazione)){
                                foreach ($presentazione as $idpost){
                                    $post = get_post($idpost);
                                    if($post)
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
