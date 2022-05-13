<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post;
get_template_part("template-parts/single/related-posts", $args = array( "post", "events", "circolari" )); 
get_header();

?>
    <main id="main-container" class="main-container">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

		<?php while ( have_posts() ) :  the_post();
        set_views($post->ID); ?>

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
                <div class="container">
                    <div class="main-content row variable-gutters">
                        <div class="col-lg-12">
                            <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
                                    <div class="col-lg-12 wysiwig-text">
                                        <?php
                                        the_content();
                                        ?>
                                    </div><!-- /col-lg-8 -->
                                </div><!-- /row -->
                            </article>
                        </div><!-- /col-lg-8 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>


			<?php get_template_part("template-parts/single/more-posts"); ?>

            <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
