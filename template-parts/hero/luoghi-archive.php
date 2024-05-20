<?php
$testo_sezione_luoghi = dsi_get_option("testo_sezione_luoghi", "luoghi");
?>
<section class="section bg-bluelectric bg-red-gradient py-5 position-relative d-flex align-items-center overflow-hidden" >
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-12">
                <div class="hero-title text-left">
                    <?php the_archive_title( '<h1 class="p-0 mb-2">', '</h1>' ); ?>
                    <?php
                    remove_filter('get_the_post_type_description', 'wpautop');
                    the_archive_description("<h2 class=\"h4 font-weight-normal\">","</h2>");
                    add_filter( 'get_the_post_type_description', 'wpautop' );
                    ?>
                </div><!-- /hero-title -->
            </div><!-- /col-md-5 -->
        </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /section -->
