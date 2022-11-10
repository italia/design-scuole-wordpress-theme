<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
if ( $page_id = get_option( 'page_for_posts' ) ) {
    echo get_the_title( $page_id );

    // the_content() doesn't accept a post ID parameter
    if ( $post = get_post( $page_id ) ) {
        setup_postdata( $post ); //  "posts" page is now current post for most template tags        
        the_content();
        wp_reset_postdata(); // So everything below functions as normal
    }
}
?>

<main id="main-container" class="main-container">
    <?php get_template_part("template-parts/hero/hero_martini/hero_page"); ?>
    <section id="primary" >
        
        <div class="content mx-5 my-5" role="main" data-target="index" >
        <?php the_content(); ?>
        </div><!-- end content -->
    </section><!-- end primary -->
</main>

<?php
get_footer();