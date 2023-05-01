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
    <section id="primary" class="container">
        <div id="organigramma_page" class="content my-5" role="main" data-target="index">
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
    </section><!-- end primary -->
</main>

<?php
get_footer();
