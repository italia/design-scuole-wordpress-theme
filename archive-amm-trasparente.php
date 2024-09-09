<?php
/**
 * The template for Amministrazione Trasparente archive compatibility
 * https://it.wordpress.org/plugins/amministrazione-trasparente
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#archive
 *
 * @package Design_Scuole_Italia
 */

$class = "petrol";

if(is_post_type_archive("scheda_didattica")){
    $class = "bluelectric";
} else if(is_post_type_archive("scheda_progetto")){
    $class = "bluelectric";
}
get_header();
?>

    <main id="main-container" class="main-container <?php echo $class; ?>>">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

        <section class="section bg-white py-2 py-lg-3 py-xl-5">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-lg-8 col-md-8">
                        <div class="section-title">
							<?php the_archive_title( '<h1 class="h2 mb-0">', '</h1>' ); ?>
							<?php the_archive_description("<p>","</p>"); ?>
                        </div><!-- /title-section -->
                    </div><!-- /col-lg-5 col-md-8 offset-lg-2 -->

                    <div class="col-lg-3 col-md-4 offset-lg-1">
						<?php get_template_part("template-parts/single/actions"); ?>
                    </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /section -->
        
        <?php 
        get_template_part( 'template-parts/search/toggle-search-filters-mobile' );
        ?>

        <section class="section bg-gray-light">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">
                    <div class="col-lg-3 bg-white bg-white-left">
						<?php get_template_part("template-parts/search/filters", "amministrazione-plugin"); ?>
                    </div>
                    <div class="col-lg-7 offset-lg-1 pt84">
						<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/list/article', get_post_type() );

							endwhile;
							?>
                            <nav class="pagination-wrapper" aria-label="Navigazione della pagina">
								<?php echo dsi_bootstrap_pagination(); ?>
                            </nav>
						<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
    </main>

<?php
get_footer();
