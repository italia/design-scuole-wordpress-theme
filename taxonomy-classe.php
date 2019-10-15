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
	<main id="main-container" class="main-container redbrown">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>

        <section class="section bg-white">
            <div class="container">
                <div class="row variable-gutters">
                    <div class="col-md-12 article-title-author-container">
                        <div class="title-content">
                            <?php the_archive_title( '<h1>', '</h1>' ); ?>
                        </div><!-- /title-content -->
                    </div><!-- /col-md-6 -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section>


        <section class="section bg-white">
            <div class="container ">
                <article class="article-wrapper">
                    <div class="row variable-gutters">
                        <div class="col-lg-12">
                            <?php
                            // todo
                            the_archive_description();
                            ?>
                            <p>Work in progress</p>
                        </div>
                    </div>
                </article>
            </div>
        </section>


	</main>

<?php
get_footer();
