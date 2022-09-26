<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore, $luogo, $c, $badgeclass;
get_template_part("template-parts/single/related-posts", $args = array( "post", "events", "circolari" )); 
get_header();
$link_schede_documenti = dsi_get_meta("link_schede_documenti");
$file_documenti = dsi_get_meta("file_documenti");
$luoghi = dsi_get_meta("luoghi");
$persone = dsi_get_meta("persone");

$user_can_view_post = dsi_members_can_user_view_post(get_current_user_id(), $post->ID);
?>
    <main id="main-container" class="main-container greendark">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <section class="section bg-white py-lg-5 py-3">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="p-0">
                            <?php while ( have_posts() ) :  the_post();
                            set_views($post->ID);
                            get_template_part("template-parts/single/header-post");
                            ?>
                        </div><!-- /header post -->
                
                        <div class="main-content ">
                            <?php if($user_can_view_post): ?>
                            <div class="">
                                <article class="article-wrapper pt-lg-3 p-0">
                                    <div class="wysiwig-text text-black">
                                        <?php
                                        the_content();
                                        ?>
                                    </div><!-- /contenuto post -->
                                </article><!-- /contenuto articolo -->
                            </div><!-- /col-lg-8 contenuto articolo, luoghi e persone citati-->

                            <?php else: ?>
                                <div class="p-5 m-5 text-center font-weight-bold wysiwig-text">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                        </div><!-- /row--> 
                    </div>

                    <?php get_template_part("martini-template-parts/loop/sidebar_news"); ?>
                </div>
            </div><!-- /container -->
        </section>

        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
