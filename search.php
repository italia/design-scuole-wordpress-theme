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
    <main id="main-container" class="main-container greendark">

		<?php get_template_part("template-parts/common/breadcrumb"); ?>
        <section class="section bg-white">
            <div class="container ">

                <div class="row variable-gutters">
                    <div class="col-lg-12">


                        <header class="page-header">
                            <h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Risultati della ricerca per : %s', 'design_scuole_italia' ), '<span>' . get_search_query() . '</span>' );

								if(isset($_GET["type"]) && $_GET["type"] != ""){
									if($_GET["type"] == "any")
										$str = __("su <span>tutto il sito</span>","design_scuole_italia");
									else if($_GET["type"] == "school")
										$str = __("nel <span>materiale relativo alla scuola</span>","design_scuole_italia");
									else if($_GET["type"] == "news")
										$str = __("in <span>notizie ed eventi</span>","design_scuole_italia");
									else if($_GET["type"] == "service")
										$str = __("nei <span>servizi</span>","design_scuole_italia");
									else if($_GET["type"] == "education")
										$str = __("nella <span>didattica</span>","design_scuole_italia");
									else if($_GET["type"] == "class")
										$str = __("nelle <span>materiale relativo alle classi</span>","design_scuole_italia");

									echo " ".$str;
								}
								?>
                            </h1>
                        </header><!-- .page-header -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-white pt-5">
            <div class="container ">

                <div class="row variable-gutters">
                    <div class="col-lg-12 row">
						<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								echo "<div class=\"col-lg-6 mb-4\">";
								get_template_part( 'template-parts/search/item', get_post_type() );
								echo "</div>";

							endwhile;
							?>
                            <nav class="pagination-wrapper justify-content-center col-12" aria-label="Navigazione centrata">
								<?php echo dsi_bootstrap_pagination(); ?>
                            </nav>
						<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();
