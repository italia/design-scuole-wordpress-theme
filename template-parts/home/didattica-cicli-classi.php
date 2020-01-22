<?php
// todo: programma materia
global $classe;
// recupero le scuole selezionate
$scuole_didattica = dsi_get_option("scuole_didattica", "didattica");
if(is_array($scuole_didattica) && count($scuole_didattica)>0) {
    ?>

    <section class="section section-padding py-0 bg-bluelectric section-tabs-bg">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col">
                    <div class="responsive-tabs-wrapper padding-top-200">
                        <div class="title-large">
                            <h2 class="h3"><?php _e("La didattica", "design_scuole_italia"); ?></h2>
                            <div class="h4 text-white"><?php _e("Cicli scolastici e percorsi di studio e formazione che trovi nell'istituto.", "design_scuole_italia"); ?></div>
                        </div><!-- /title-large -->
                        <div class="title-small">
                            <div class="h5">L'Istituto</div>
                        </div><!-- /title-section -->
                        <div class="tabs-img">
                            <img class="img-fluid" src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/didattica-mockup.png" title="<?php _e("Le classi", "design_scuole_italia"); ?>" alt="<?php _e("La didattica", "design_scuole_italia"); ?>">
                        </div>
                        <div class="responsive-tabs responsive-tabs-aside padding-bottom-200">
                            <ul>
                                <?php
                                foreach ($scuole_didattica as $idstruttura){
                                    $scuola = get_post($idstruttura);
                                    ?>
                                    <li><a href="#tab-<?php echo $idstruttura; ?>"><?php echo $scuola->post_title; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <?php
                            foreach ($scuole_didattica as $idstruttura) {
                                $scuola = get_post($idstruttura);

                                ?>
                                <div id="tab-<?php echo $idstruttura; ?>" class="responsive-tabs-content">
                                    <div class="accordion-large accordion-wrapper">

                                        <?php
                                        // recupero i percorsi di studi
                                        $percorsi = wp_get_object_terms($idstruttura, "percorsi-di-studio");
                                        if(is_array($percorsi) && count($percorsi)>0){
                                            foreach ($percorsi as $percorso){
                                                ?>
                                                <hr/>
                                                <div class="accordion-large-title accordion-header">
                                                    <h3><?php echo $percorso->name; ?></h3>
                                                </div><!-- /accordion-large-title -->
                                                <div class="accordion-large-content accordion-content">
                                                    <?php echo wpautop($percorso->description); ?>
                                                    <?php
                                                    // recupero le classi create associate a questa scuola / percorso
                                                    $args = array(
                                                        'hide_empty' => false, // also retrieve terms which are not used yet
                                                        'meta_query' => array(
                                                            array(
                                                                'key'       => '_dsi_classe_anno_scolastico',
                                                                'value'     => dsi_get_current_anno_scolastico(),
                                                            ),
                                                            array(
                                                                'key'       => '_dsi_classe_struttura_organizzativa',
                                                                'value'     => $idstruttura,
                                                            ),
                                                            array(
                                                                'key'       => '_dsi_classe_percorso_studi',
                                                                'value'     => $percorso->term_id,
                                                            )
                                                        ),
                                                        'taxonomy'  => 'classe',
                                                    );
                                                    $classi = get_terms( $args );

                                                    if(is_array($classi) && count($classi) > 0){

                                                        echo '<h5>Le classi:</h5><div class="card-deck card-deck-spaced mb-4">';
                                                        foreach ($classi as $classe){

                                                            get_template_part("template-parts/classe/card");
                                                        }
                                                        echo "</div>";
                                                    }
                                                    ?>
                                                </div><!-- /accordion-large-content -->

                                                <?php
                                            }
                                        }else{
                                            echo '<div ><h5 class="text-white">';
                                            _e("Nessun percorso di studi associato a questa scuola.", "design_scuole_italia");
                                            echo '</h5></div>';
                                        }
                                        ?>

                                        <a class="btn btn-redbrown mt-4" href="<?php echo get_permalink($idstruttura); ?>"><?php _e("Vai alla presentazione della Scuola", "design_scuole_italia"); ?></a>

                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div><!-- /responsive-tabs -->
                    </div><!-- /responsive-tabs-wrapper -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->
    <?php
}