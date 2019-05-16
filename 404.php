<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Design_Scuole_Italia
 */


get_header();
?>

    <main id="main-container" class="main-container">

		<?php get_template_part("template-parts/common/breadcrumb"); ?>
        <section class="section bg-white">
            <div class="container ">
                <article class="article-wrapper">
                    <div class="box_404 text-center clearfix">
                        <h1 class="xl"><?php esc_html_e( '404', 'design_scuole_italia' ); ?></h1>
                        <h2><?php esc_html_e( 'Pagina non trovata', 'design_scuole_italia' ); ?></h2>
                        <p><?php _e( 'Oops! La pagina che cerchi non è stata trovata, <a href="javascript:history.back();" title="Torna alla pagina precedente">torna indietro</a> o utilizza il menu per continuare la navigazione.', 'design_scuole_italia' ); ?></p>

                    </div>
                </article>
            </div>
        </section>
    </main><!-- #main -->


<?php
get_footer();