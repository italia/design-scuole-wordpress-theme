<?php
/**
 * The template for displaying archive
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

        <?php get_template_part("template-parts/hero/hero_page", "archive"); ?>

        <section class="section">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-lg-12 pt84">
						<?php if ( have_posts() ) : ?> 
                            <article class="col-lg-3">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( "template-parts/single/card", "grandi", get_post_type() );

							endwhile;
							?>
                            </article>
                            <nav class="pagination-wrapper" aria-label="Navigazione della pagina">
								<?php echo dsi_bootstrap_pagination(); ?>
                            </nav>
						<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>

                        <?php if(isset($_GET["archive"]) && ($_GET["archive"] == "true")){ ?>
                            <p><a class="btn btn-block btn-secondary" href="<?php echo get_post_type_archive_link("scheda_progetto"); ?>" ><?php _e("Consulta i progetti dell'anno in corso", "design_scuole_italia"); ?></a></p>
                        <?php }else{ ?>
                            <p><a class="btn btn-block btn-secondary" href="<?php echo get_post_type_archive_link("scheda_progetto"); ?>?archive=true" ><?php _e("Consulta i progetti degli scorsi anni", "design_scuole_italia"); ?></a></p>
                        <?php } ?>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
    </main>

<?php
get_footer();
