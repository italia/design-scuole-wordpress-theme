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
    <main id="main-container" class="main-container petrol">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

        <section class="section bg-white py-2 py-lg-3 py-xl-5">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-lg-5 col-md-8 offset-lg-3">
                        <div class="section-title">
                            <p><?php
                                if(get_search_query() != "")
                                    _e("Risultati della ricerca per:", "design_scuole_italia");
                                ?></p>
                            <h2 class="mb-0"><?php if(get_search_query() != "")
                                                        echo get_search_query();
                                                    else
                                                        _e("Ricerca generica", "design-scuole-italia");

                            ?></h2>
                            <p>
								<?php
                                $str = "";
								if(isset($_GET["type"]) && $_GET["type"] != "") {
									if ( $_GET["type"] == "any" ) {
										$str = __( "su <span>tutto il sito</span>", "design_scuole_italia" );
									} else if ( $_GET["type"] == "school" ) {
										$str = __( "nel <span>materiale relativo alla scuola</span>", "design_scuole_italia" );
									} else if ( $_GET["type"] == "news" ) {
										$str = __( "in <span>notizie ed eventi</span>", "design_scuole_italia" );
									} else if ( $_GET["type"] == "service" ) {
										$str = __( "nei <span>servizi</span>", "design_scuole_italia" );
									} else if ( $_GET["type"] == "education" ) {
										$str = __( "nella <span>didattica</span>", "design_scuole_italia" );
									} else if ( $_GET["type"] == "class" ) {
										$str = __( "nelle <span>materiale relativo alle classi</span>", "design_scuole_italia" );
									}
								}else{
									$str = __( "in base ai filtri selezionati", "design_scuole_italia" );
                                }
								echo " ".$str;
								?>
                            </p>
                        </div><!-- /title-section -->
                    </div><!-- /col-lg-5 col-md-8 offset-lg-2 -->

                    <div class="col-lg-3 col-md-4 offset-lg-1">
						<?php get_template_part("template-parts/single/actions"); ?>
                    </div><!-- /col-lg-3 col-md-4 offset-lg-1 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /section -->



        <section class="section bg-white border-top border-bottom d-block d-lg-none">
            <div class="container d-flex justify-content-between align-items-center py-3">
                <h3 class="h6 text-uppercase mb-0 label-filter"><strong>Filtri</strong></h3>
                <a class="toggle-search-results-mobile toggle-menu menu-search push-body mb-0" href="#">
                    <svg class="svg-filters"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-filters"></use></svg>
                </a>
            </div>
        </section>
        <section class="section bg-gray-light">
            <div class="container">
                <div class="row variable-gutters sticky-sidebar-container">
                    <div class="col-lg-3 bg-white bg-white-left">
	                    <?php get_template_part("template-parts/search/filters"); ?>
                    </div>
                    <div class="col-lg-7 offset-lg-1 pt84">
                        <h2 class="sr-only">Risultati di ricerca</h2>
						<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/list/article', get_post_type() );

							endwhile;


							if((get_query_var( 'paged' ) == $wp_query->max_num_pages || $wp_query->max_num_pages == 1) && !isset($_GET["post_terms"])){
                            	$s_query = get_search_query();
								get_template_part( 'template-parts/search/argomenti' );
                            }

							?>
                            <nav class="pagination-wrapper" aria-label="Navigazione della pagina">
								<?php echo dsi_bootstrap_pagination(); ?>
                            </nav>
						<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

							if(!isset($_GET["post_terms"])) {
                            	$s_query = get_search_query();
								get_template_part( 'template-parts/search/argomenti' );
                            }

						endif;


						?>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>
    </main>

<?php
get_footer();
