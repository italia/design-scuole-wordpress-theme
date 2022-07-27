<?php
/**
 * The template for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
global $documento;
?>
    <main id="main-container" class="main-container redbrown">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php get_template_part("template-parts/hero/documenti"); ?>

        <?php
        // recupero la lista delle tipologie
        $i=0;
        $strutture_documenti = dsi_get_option("strutture_documenti", "documenti");
        if($strutture_documenti) {
            foreach ($strutture_documenti as $id_tipologia_documento) {

                $tipologia_documento = get_term_by("id", $id_tipologia_documento, "tipologia-documento");
                if (!is_wp_error($tipologia_documento)) {


                    $documenti = get_posts("post_type=documento&tipologia-documento=" . $tipologia_documento->slug . "&posts_per_page=6");
                    if (is_array($documenti) && count($documenti) > 0) {
                        $i++;
                        $classcolor = "bg-white";
                        if ($i % 2)
                            $classcolor = "bg-gray-light";

                        ?>
                        <section class="section <?php echo $classcolor; ?> py-5">
                            <div class="container">
                                <?php
                                if (is_array($documenti) && count($documenti) > 0) {
                                    ?>
                                    <div class="title-section mb-5">
                                        <h2 class="h4">
                                            <?php if (is_array($documenti) && count($documenti) > 1) echo dsi_pluralize_string($tipologia_documento->name); else echo $tipologia_documento->name; ?>
                                        </h2>
                                    </div><!-- /title-section -->
                                    <div class="row variable-gutters">
                                        <?php foreach ($documenti as $documento) { ?>
                                            <div class="col-lg-4 mb-3 mb-lg-4">
                                                <?php get_template_part("template-parts/documento/card", "ico"); ?>
                                            </div><!-- /col-lg-4 -->
                                        <?php } ?>
                                    </div><!-- /row -->
                                    <div class="pt3 text-center">
                                        <a class="text-underline" href="<?php echo get_term_link($tipologia_documento) ?>"><strong><?php _e("Vedi tutti", "design_scuole_italia"); ?></strong></a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div><!-- /container -->
                        </section><!-- /section -->
                        <?php
                    }
                }
            }
        }
        ?>

    </main>
<?php
get_footer();
