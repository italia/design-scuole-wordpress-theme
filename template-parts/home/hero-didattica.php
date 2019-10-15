<?php
global $post;

$testo_didattica = dsi_get_option("testo_didattica", "didattica");
if($testo_didattica == "")
    $testo_didattica = dsi_get_option("tipologia_scuola")." ".dsi_get_option("nome_scuola");
?>
    <section class="section bg-bluelectric section-hero-blue">
        <div class="container">
            <div class="row variable-gutters">
                <div class="col-md-6">
                    <div class="hero-title">
                        <h4 class="text-white font-weight-normal"><?php echo $testo_didattica; ?></h4>
                        <h1><span class="d-line d-xl-block"><?php the_title(); ?></h1>
                    </div><!-- /hero-title -->
                </div><!-- /col-md-6 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->
