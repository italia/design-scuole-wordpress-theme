<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $autore;
get_template_part("template-parts/single/related-posts", $args = array( "post", "events", "circolari" )); 
get_header();

?>
    <main id="main-container" class="main-container greendark">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

		<?php while ( have_posts() ) :  the_post();
        set_views($post->ID);
		$image_url = get_the_post_thumbnail_url($post, "item-gallery");
		$autore = get_user_by("ID", $post->post_author);
		?>
            <?php if(has_post_thumbnail($post)){ ?>
            <section class="section bg-white article-title article-title-author">

            <div class="title-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
            <?php
	            $colsize = 6;
            }else{
            ?>
                <section class="section bg-white article-title article-title-small article-title-author">
		            <?php
                $colsize = 12;
            } ?>
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-md-<?php echo $colsize; ?> article-title-author-container">
                        <div class="title-content">
                            <h1><?php the_title(); ?></h1>
                        </div><!-- /title-content -->
                        <div class="card card-avatar card-comments">
                            <div class="card-body p-0">
                                <?php get_template_part("template-parts/autore/card"); ?>
                                <?php if ( comments_open() || get_comments_number() ){
                                    ?>
                                    <div class="comments ml-auto">
                                        <p><?php echo $post->comment_count; ?></p>
                                    </div><!-- /comments -->
                                    <?php
                                } ?>
                            </div><!-- /card-body -->
                        </div><!-- /card card-avatar -->
                    </div><!-- /col-md-6 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
            <section class="section bg-white py-5">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-lg-3 col-md-4">
	                        <?php get_template_part("template-parts/single/actions"); ?>
	                        <?php get_template_part("template-parts/common/badges-argomenti"); ?>
                        </div>
                        <div class="main-content col-lg-9 col-md-8">
                            <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
                                    <div class="col-lg-8 ">
                                        <div class="col-lg-12 px-0 wysiwig-text">
                                       <?php
                                        the_content();
                                        ?>
                                        </div>

                                        <?php
                                        //the_post_navigation();

                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if ( comments_open() || get_comments_number() ) :
	                                        comments_template();
                                        endif;

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
