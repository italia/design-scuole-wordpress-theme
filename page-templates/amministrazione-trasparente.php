<?php
/* Template Name: Amministrazione Trasparente
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>

    <main id="main-container" class="main-container">

        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <section class="section bg-white">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-md-12 article-title-author-container">
                            <div class="title-content">
                                <h1><?php the_title(); ?></h1>
                            </div><!-- /title-content -->
                        </div><!-- /col-md-6 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>

            <section class="section bg-white">
                <div class="container ">
                    <article class="article-wrapper">
                        <div class="row variable-gutters">
                            <div class="col-lg-12">
                                <?php
                                the_content();
                                ?>
                            </div>
                        </div>

                    </article>
                </div>
            </section>
        <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->


<?php
get_footer();
