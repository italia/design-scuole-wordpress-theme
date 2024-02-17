<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>
<style>
    :root {
        --bootstrap-italia-version: "1.6.2";
    }
</style>

<main id="main-container" class="main-container titillium">

    <?php get_template_part("template-parts/common/breadcrumb"); ?>

    <?php
    while (have_posts()) :
        the_post();
        set_views($post->ID);
    ?>
        <section class="section bg-white">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-md-12 article-title-author-container">
                        <div class="title-content">
                            <h1 class="titillium"><?php the_title(); ?></h1>
                        </div><!-- /title-content -->
                    </div><!-- /col-md-6 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>

        <section class="section bg-white">
            <div class="container ">
                <article class="article-wrapper">


                    <div class="row variable-gutters">
                        <div class="col-lg-12 titillium">
                            <?php
                            the_content();
                            ?>
                        </div>
                    </div>
                    <div class="row variable-gutters">
                        <div class="col-lg-12 titillium">
                            <?php
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="row variable-gutters">
                        <div class="col-lg-12">
                            <?php get_template_part("template-parts/single/bottom"); ?>
                        </div><!-- /col-lg-9 -->
                    </div><!-- /row -->

                </article>
            </div>
        </section>
        <!-- Scheda per controllo crawler -->
        <div class="container d-none">
            <?php get_template_part("martini-template-parts/scheda-servizio"); ?>
        </div>
    <?php
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->


<?php
get_footer();
