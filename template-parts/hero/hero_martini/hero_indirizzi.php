<?php
global $post;

$testo_didattica = dsi_get_option("testo_didattica", "didattica");
if($testo_didattica == "")
    $testo_didattica = dsi_get_option("tipologia_scuola")." ".dsi_get_option("nome_scuola");
?>
    <section>
        <div id="hero" class="container-fluid">
            <div id="content" class="row align-items-center">
                <div class="col-12">
                        <h1> <?php the_title(); ?> </h1>
                        <h2 class="h4 font-weight-normal"><?php echo $testo_didattica; ?></h2>                    
                </div><!-- /col-md-6 -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->
