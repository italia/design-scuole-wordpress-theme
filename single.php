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
        <section class="section bg-white">
            <div class="container ">
                <article class="article-wrapper">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
                </article>
            </div>
        </section>
    </main><!-- #main -->
<?php
get_footer();
