<?php
/* Template Name: Persone
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
global $post;
get_header();

?>
    <main id="main-container" class="main-container bluelectric">
        <?php get_template_part("template-parts/common/breadcrumb"); ?>
        <?php
        while ( have_posts() ) :
            the_post();
			get_template_part("template-parts/hero/persone");

			// recupero la lista delle strutture
            $i=0;
            $strutture_persone = dsi_get_option("strutture_persone", "persone");
            if($strutture_persone) {
                foreach ($strutture_persone as $idstruttura) {
                    $i++;
                    $struttura = get_post($idstruttura);

                    $classcolor = "bg-white";
                    if ($i % 2)
                        $classcolor = "bg-gray-light";

                    $responsabile = dsi_get_meta("responsabile", "_dsi_struttura_", $struttura->ID);
                    $persone = dsi_get_meta("persone", "_dsi_struttura_", $struttura->ID);
                    $altri_componenti = dsi_get_meta("altri_componenti", "_dsi_struttura_", $struttura->ID);

                    ?>
                    <section class="section <?php echo $classcolor; ?> py-5">
                        <div class="container">
                            <div class="title-section text-center mb-5">
                                <h2 class="h4"><a
                                            href="<?php echo get_permalink($struttura); ?>"><?php echo $struttura->post_title; ?></a>
                                </h2>
                            </div><!-- /title-large -->
                            <?php if (is_array($responsabile) && count($responsabile) > 0) { ?>
                                <div class="row variable-gutters mb-4">
                                    <div class="col-lg-3">
                                        <h3 class="text-lg-right mb-3">

                                            <?php 
                                            /*
                                            Modifica per Liceo Pitagora
                                                Correzione naming ruoli persone
                                            START
                                            */
                                            if($struttura->post_title == "Dirigenza"){
											    _e("Dirigente Scolastico", "design_scuole_italia");
											} else if ($struttura->post_title == "Segreteria"){ 
											    _e("DSGA", "design_scuole_italia");
										    } else {
											 _e("Responsabile", "design_scuole_italia");
											};
                                            
                                            /*
                                            END

                                            Modifica per Liceo Pitagora
                                            */

                                            ?>
                                        <?php // _e("Responsabile", "design_scuole_italia"); ?>

                                    </h3>
                                    </div><!-- /col-lg-3 -->
                                    <div class="col-lg-9">
                                        <div class="row variable-gutters">
                                            <?php
                                            foreach ($responsabile as $idutente) {
                                                $autore = get_user_by("ID", $idutente);
                                                ?>
                                                <div class="col-lg-4">
                                                    <div class="card card-bg card-avatar rounded mb-3" style="color: black; background-color: #EA7653">
                                                        <div class="card-body">
                                                            <?php get_template_part("template-parts/autore/card"); ?>
                                                        </div><!-- /card-body -->
                                                    </div><!-- /card card-bg card-avatar rounded -->
                                                </div><!-- /col-lg-4 -->
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /row -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            <?php } ?>

                            <?php if (is_array($persone) && count($persone) > 0) { ?>
                                <div class="row variable-gutters mb-4">
                                    <div class="col-lg-3">
                                        <h4 class="text-lg-right mb-3">

                                        <?php 
                                        /*
                                            Modifica per Liceo Pitagora
                                                Correzione naming ruoli persone
                                            START
                                        */

                                        if($struttura->post_title == "Dirigenza"){
											 _e("Collaboratori Vicari", "design_scuole_italia");
											 } else if ($struttura->post_title == "Segreteria"){
											 _e("Assistenti Amministrativi", "design_scuole_italia");
											 } else {
											 _e("Persone", "design_scuole_italia");
										};
                                        
                                        /*
                                            END

                                            Modifica per Liceo Pitagora
                                        */

                                        ?>
                                            
                                        <?php // _e("Persone", "design_scuole_italia"); ?>
                                    
                                        </h4>
                                    </div><!-- /col-lg-3 -->
                                    <div class="col-lg-9">
                                        <div class="row variable-gutters">
                                            <?php
                                            foreach ($persone as $idutente) {
                                                $autore = get_user_by("ID", $idutente);
                                                ?>
                                                <div class="col-lg-4">
                                                    <div class="card card-bg bg-white card-avatar rounded mb-3">
                                                        <div class="card-body">
                                                            <?php get_template_part("template-parts/autore/card"); ?>
                                                        </div><!-- /card-body -->
                                                    </div><!-- /card card-bg card-avatar rounded -->
                                                </div><!-- /col-lg-4 -->
                                                <?php
                                            }
                                            ?>
                                        </div><!-- /row -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            <?php } ?>

                            <?php if ($altri_componenti != "") { ?>
                                <div class="row variable-gutters mb-4">
                                    <div class="col-lg-3">
                                        <h3 class="h4 text-lg-right mb-3"><?php _e("Componenti esterni", "design_scuole_italia"); ?></h3>
                                    </div><!-- /col-lg-3 -->
                                    <div class="col-lg-9">
                                        <div class="row variable-gutters">
                                            <span class="h5 text-lg-right mb-3 pt-1 pl-4">
                                                <?php echo $altri_componenti; ?>
                                            </span>
                                        </div><!-- /row -->
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                            <?php } ?>

                        </div><!-- /container -->
                    </section><!-- /section -->
                    <?php

                }
            }

        endwhile; // End of the loop.
        ?>
    </main>

<?php
get_footer();



