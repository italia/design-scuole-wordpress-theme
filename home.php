<?php
/**
 * The template for displaying home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>
    <main id="main-container" class="main-container redbrown">
        <?php
        if ( have_posts() ) :

            get_template_part("template-parts/home/hero", "home");
            get_template_part("template-parts/home/articoli", "eventi");
        ?>
        <section class="section bg-white">
        <?php get_template_part("template-parts/home/hero", "servizi"); ?>
        <?php get_template_part("template-parts/home/list", "servizi"); ?>
        </section>

        <?php
            //  get_template_part("template-parts/home/didattica", "cicli");
            //  get_template_part("template-parts/home/didattica", "risorse");

        endif; // End of the loop.
        ?>
    </main>
<?php
get_footer();
