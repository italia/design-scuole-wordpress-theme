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
    <?php get_template_part("template-parts/hero/hero_page"); ?>
    <section id="container-spazi" class="container px-4 mb-5">
        <div id="organigramma_page" class="content mx-5 my-5" role="main" data-target="index" >
        <?php the_content(); ?>
        </div><!-- end content -->
        <div class="row my-5">
            <div class="col-12">
                <h2> Dove siamo </h2>
                <div style="width: 100%; overflow: hidden;">
                    <iframe width="100%" height="600" frameborder="0" style="border:0; margin-top: -150px;" src="https://www.google.com/maps/d/u/0/embed?mid=1Lqf2ZbM8324bARC0U_fQJacC4AJhOV4&ehbc=2E312F">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();