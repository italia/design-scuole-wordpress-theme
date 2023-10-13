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

    <main id="main-container" class="main-container">

        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php
        while ( have_posts() ) :
            the_post();
            set_views($post->ID);
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
                            <div class="col-lg-12 wysiwig-text">
                                <?php
                                the_content();
                                ?>
                            </div>
                        </div>
                        <div class="row variable-gutters">
                            <?php if(dsi_get_option("show_contatore_commenti", "setup") != "false") { ?>
                            <div class="col-lg-12">
                                <?php
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                                ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row variable-gutters">
                            <div class="col-lg-12">
                                <?php get_template_part( "template-parts/single/bottom" ); ?>
                            </div><!-- /col-lg-9 -->
                        </div><!-- /row -->

                    </article>
                </div>
            </section>
        <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->


<?php
get_footer();
