<?php
$testo_sezione_organizzazione = dsi_get_option("testo_sezione_organizzazione", "organizzazione");
?>
<section class="section bg-bluelectric py-5 position-relative d-flex align-items-center overflow-hidden" >
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-md-12">
                <div class="hero-title text-left">
                    <h1 class="p-0 mb-2"><?php the_title(); ?></h1>
                    <p class="h4 font-weight-normal"><?php echo get_the_content(); ?></p>
                </div><!-- /hero-title -->
            </div><!-- /col-md-5 -->
        </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /section -->
