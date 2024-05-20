<?php
$testo_sezione_luoghi = dsi_get_option("testo_sezione_luoghi", "luoghi");
?>
<section class="section bg-bluelectric bg-red-gradient py-5 position-relative d-flex align-items-center overflow-hidden" >
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-md-5">
                <div class="hero-title text-left">
                    <h1 class="p-0 mb-2"><?php _e("I luoghi", "design_scuole_italia"); ?></h1>
                    <p class="h4 font-weight-normal"><?php echo $testo_sezione_luoghi; ?></p>
                </div><!-- /hero-title -->
            </div><!-- /col-md-5 -->
        </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /section -->
