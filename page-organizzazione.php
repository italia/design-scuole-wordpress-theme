<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>

<main id="main-container" class="main-container">
    <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    <section id="primary" class="container" >        
        <div id="organigramma_page" class="content my-5" role="main" data-target="index" >
        <?php the_content(); ?>
        </div><!-- end content -->
    </section><!-- end primary -->
</main>

<?php
get_footer();