<?php
/**
 * The template for displaying archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Design_Scuole_Italia
 */

get_header();
global $luogo;
?>
    <main id="main-container" class="main-container redbrown">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>

        <?php get_template_part("template-parts/hero/luoghi"); ?>

        <?php
        // recupero la lista delle tipologie
        $i=0;
        $strutture_luoghi = dsi_get_option("strutture_luoghi", "luoghi");
        if($strutture_luoghi) {
            foreach ($strutture_luoghi as $id_tipologia_luogo) {

                $tipologia_luogo = get_term_by("id", $id_tipologia_luogo, "tipologia-luogo");
                if (!is_wp_error($tipologia_luogo)) {


                    $luoghi = get_posts("post_type=luogo&tipologia-luogo=" . $tipologia_luogo->slug . "&posts_per_page=-1&orderby=post_parent&order=ASC");
                    if (is_array($luoghi) && count($luoghi) > 0) {
                        $i++;
                        $classcolor = "bg-white";
                        if ($i % 2)
                            $classcolor = "bg-gray-light";

                        ?>
                        <section class="section <?php echo $classcolor; ?> py-4">
                            <div class="container">
                                <?php
                                if (is_array($luoghi) && count($luoghi) > 0) {
                                    ?>

                                    <div class="row variable-gutters mt-4">
                                        <div class="col-lg-10 offset-lg-1 mb-4">
                                            <h4 class="text-left mb-3">
                                                <a href="<?php echo get_term_link($tipologia_luogo); ?>"><?php if (count($luoghi) > 1) echo dsi_pluralize_string($tipologia_luogo->name); else echo $tipologia_luogo->name; ?></a>
                                            </h4>
                                        </div><!-- /col-lg-3 -->

                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="row variable-gutters">
                                                <?php foreach ($luoghi as $luogo) { ?>
                                                    <div class="col-lg-4 mb-4">
                                                        <?php get_template_part("template-parts/luogo/card", "ico"); ?>
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

            get_template_part("template-parts/luogo/map");
        }
        ?>

    </main>
<?php
get_footer();
