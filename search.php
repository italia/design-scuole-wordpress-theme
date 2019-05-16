<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<?php if ( have_posts() ) : ?>

                        <header class="page-header">
                            <h1 class="page-title">
		                        <?php
		                        /* translators: %s: search query. */
		                        printf( esc_html__( 'Search Results for: %s', 'design_scuole_italia' ), '<span>' . get_search_query() . '</span>' );
		                        ?>
                            </h1>
                        </header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
                </article>
            </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();
