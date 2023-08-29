<?php
/**
 * The template for displaying all single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package Design_Scuole_Italia
 */
get_header();
?>
    <main id="main-container" class="main-container redbrown">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <?php while ( have_posts() ) :  the_post();
        set_views($post->ID);
        $image_url = get_the_post_thumbnail_url($post, "item-gallery");
        ?>
        <?php if(has_post_thumbnail($post)){ ?>
        <section class="section bg-white article-title">
            <div class="title-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
            <?php
            $colsize = 6;
            }else{
            ?>
            <section class="section bg-white article-title article-title-small" style="height:auto">
                <?php
                $colsize = 12;
                } ?>			
				<div class="container">
                    <div class="row variable-gutters">
                        <div class="col-md-<?php echo $colsize; ?>">
                            <div class="title-content">
                                <h1><?php the_title(); ?></h1>
                                <?php 
                                $badgeclass = "badge-outline-redbrown";
                                get_template_part("template-parts/common/badges-argomenti"); ?>
                            </div><!-- /title-content -->
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section><!-- /section -->
            <section class="section bg-white">
                <div class="container container-border-top">
                    <div class="row variable-gutters">
                        <div class="col-lg-12 col-md-12">
                            <article class="article-wrapper pt-4">
                                <div class="row variable-gutters">
									<div class="col-lg-12 d-flex justify-content-end pb-2">
											<?php get_template_part("template-parts/single/actions"); ?>
										</div><!-- /col-lg-12 -->
									</div><!-- /row -->
								<div class="row variable-gutters">
										<div class="col-lg-12">
											 <div class="col-lg-12 px-0 wysiwig-text">
											<?php the_content(); ?>
											</div>
									</div><!-- /col -->
                                </div><!-- /row -->
							    <div class="row variable-gutters">
									<div class="col-lg-12">
											<?php get_template_part( "template-parts/single/bottom" ); ?>
										</div><!-- /col -->
								</div><!-- /row -->		
                            </article>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>
			<?php
            endwhile; // End of the loop. ?>
    </main><!-- #main -->
<?php
get_footer();
