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
                        <section class="section <?php echo $classcolor; ?> py-4">
                            <div class="container">
                                <?php
                                if (is_array($documenti) && count($documenti) > 0) {
                                    ?>

                                    <div class="row variable-gutters mt-4">
                                        <div class="col-lg-10 offset-lg-1 mb-4">
                                            <h4 class="text-left mb-3">
                                                <a href="<?php echo get_term_link($tipologia_documento); ?>"><?php if (count($documenti) > 1) echo dsi_pluralize_string($tipologia_documento->name); else echo $tipologia_documento->name; ?></a>
                                            </h4>
                                        </div><!-- /col-lg-3 -->
                                        <?php

                                        ?>
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="row variable-gutters">
                                                <?php foreach ($documenti as $documento) { ?>
                                                    <div class="col-lg-4 mb-4">
                                                        <?php get_template_part("template-parts/documento/card", "ico"); ?>
                                                    </div><!-- /col-lg-4 -->
                                                <?php } ?>
                                            </div><!-- /row -->
                                        </div><!-- /col-lg-9 -->
                                    </div><!-- /row -->
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
