<?php
/* Template Name: Didattica
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
global $post, $tipologia_notizia, $ct;
get_header();

?>
    <main id="main-container" class="main-container bluelectric">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part("template-parts/home/hero", "didattica");

      //      get_template_part("template-parts/home/didattica", "orari");
            get_template_part("template-parts/home/didattica", "cicli");
        //    get_template_part("template-parts/home/didattica", "risorse");
            get_template_part("template-parts/home/didattica", "progetti");
            get_template_part("template-parts/home/didattica", "schede");

        endwhile; // End of the loop.
        ?>
    </main>

<?php
get_footer();



