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
    <main id="main-container" class="main-container">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <section class="py-lg-5 py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="p-0">
                            <?php while ( have_posts() ) :  the_post();
                            set_views($post->ID);
                            get_template_part("template-parts/single/header-post");
                            ?>
                        </div><!-- /header post -->
                
                        <div class="main-content">
                            <?php if($user_can_view_post): ?>
                            <article class="article-wrapper pt-lg-3 p-0">
                                <div class="wysiwig-text text-black">
                                    <h5 data-element="metadata" class="text-black font-weight-normal h6"><em><?php _e("", "design_scuole_italia"); ?> <?php
                                    $date_publish = new DateTime($post->post_date);
                                    echo $date_publish->format('d.m.Y')
                                    ?></em></h5>
                                    <?php
                                    the_content();
                                    ?>
                                </div><!-- /contenuto post -->
                            </article><!-- /contenuto articolo -->

                            <?php else: ?>
                                <div class="p-5 m-5 text-center font-weight-bold wysiwig-text">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                        </div><!-- /row--> 
                    </div>
                    
                    <div class="col-12 col-lg-4 pl-lg-4 pl-md-4 pl-0">
                        <?php get_template_part("martini-template-parts/loop/sidebar_news"); ?>
                    </div>
                </div>
            </div><!-- /container -->
        </section>

        <?php  	endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
