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
        <?php
        get_template_part("template-parts/hero/strutture");

        // recupero la lista delle strutture
        $i=0;
        $strutture_organizzazione = dsi_get_option("strutture_organizzazione", "organizzazione");
        if (is_array($strutture_organizzazione) && count($strutture_organizzazione)) {
            foreach ($strutture_organizzazione as $id_tipologia_struttura) {    
                $tipologia_struttura = get_term_by("id", $id_tipologia_struttura, "tipologia-struttura");
                if (!is_wp_error($tipologia_struttura) && $tipologia_struttura) {
    
                    $haschild = false;
                    $strutture = get_posts("post_type=struttura&tipologia-struttura=" . $tipologia_struttura->slug . "&posts_per_page=-1&orderby=post_parent&order=ASC");
                    $strutture_parent = get_posts("post_type=struttura&tipologia-struttura=" . $tipologia_struttura->slug . "&post_parent=0&posts_per_page=-1&orderby=title&order=ASC");
                    if (is_array($strutture) && count($strutture) > 0) {
                        $i++;
                        $classcolor = "bg-white";
                        if ($i % 2)
                            $classcolor = "bg-gray-light";
                        foreach ($strutture_parent as $child){
                            $strutture_child = get_posts("post_type=struttura&tipologia-struttura=" . $tipologia_struttura->slug . "&post_parent=".$child->ID."&posts_per_page=1&orderby=title&order=ASC");
                            if(is_array($strutture_child) && count($strutture_child)>0)
                                $haschild = true;
                        }
                        ?>
                        <section class="section section-padding <?php echo $classcolor; ?>">
                            <div class="container">
                                <?php if($i == 1)
                                        echo '<h2 class="sr-only">elenco degli organi</h2>';
                                ?>
                                <?php if($haschild){ // adotto la struttura a 2 colonne ?>
                                    <div class="title-section mb-5">
                                        <h2 class="h4"><a href="<?php echo get_term_link($tipologia_struttura); ?>">
                                            <?php if (count($strutture) > 1) echo dsi_pluralize_string($tipologia_struttura->name); else echo $tipologia_struttura->name; ?>
                                        </a>
                                        </h2>
                                    </div><!-- /title-large -->
                                    <?php foreach ($strutture_parent as $struttura) { ?>
    
                                        <div class="row variable-gutters mb-4">
                                            <div class="col-lg-4  mb-4">
                                                <?php
                                                if(dsi_is_scuola($struttura))
                                                    get_template_part("template-parts/struttura/card", "dark-codice");
                                                else
                                                    get_template_part("template-parts/struttura/card", "dark");
                                                    ?>
                                            </div><!-- /col-lg-3 -->
                                            <div class="col-lg-8">
                                                <div class="row variable-gutters">
                                                    <?php
                                                    $strutture_child = get_posts("post_type=struttura&tipologia-struttura=" . $tipologia_struttura->slug . "&post_parent=" . $struttura->ID . "&posts_per_page=-1&orderby=title&order=ASC");
                                                    foreach ($strutture_child as $struttura) {
                                                        ?>
                                                        <div class="col-lg-6 lg-6 mb-4">
                                                            <?php
                                                            if(dsi_is_scuola($struttura))
                                                                get_template_part("template-parts/struttura/card", "codice");
                                                            else
                                                                get_template_part("template-parts/struttura/card");
                                                            ?>
                                                        </div><!-- /col-lg-4 -->
                                                        <?php
                                                    }
                                                    ?>
                                                </div><!-- /row -->
                                            </div><!-- /col-lg-9 -->
                                        </div><!-- /row -->
                                        <?php
                                    }
                                }else{ // struttura classica
                                    if (is_array($strutture) && count($strutture) > 0) {
                                        ?>
    
                                        <div class="title-section mb-5">
                                            <h2 class="h4"><a href="<?php echo get_term_link($tipologia_struttura); ?>"><?php if (count($strutture) > 1) echo dsi_pluralize_string($tipologia_struttura->name); else echo $tipologia_struttura->name; ?></a>
                                            </h2>
                                        </div><!-- /title-large -->
    
                                        <div class="row variable-gutters mt-4">
    
                                            <div class="col-lg-12">
                                                <div class="row variable-gutters">
                                                    <?php
                                                    foreach ($strutture as $struttura) {
                                                        ?>
                                                        <div class="col-lg-4 mb-4">
                                                            <?php get_template_part("template-parts/struttura/card"); ?>
                                                        </div><!-- /col-lg-4 -->
                                                        <?php
                                                    }
                                                    ?>
                                                </div><!-- /row -->
                                            </div><!-- /col-lg-9 -->
                                        </div><!-- /row -->
                                        <?php
                                    }
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
