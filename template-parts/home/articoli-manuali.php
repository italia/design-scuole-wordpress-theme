<?php

$home_articoli_manuali = dsi_get_option("home_articoli_manuali", "homepage");

if(is_array($home_articoli_manuali) && count($home_articoli_manuali)){


?>

    <section class="section bg-white py-2 py-lg-3 py-xl-5">
    <div class="container">
        <div class="title-section pb-4">
            <h2 class="h2"><?php _e("In Evidenza", "design_scuole_italia"); ?></h2>
        </div><!-- /title-section -->
        <div class="row variable-gutters">
                <?php
                foreach ( $home_articoli_manuali as $idpost ) {
                    $post = get_post($idpost);
                    if($post) {
                        ?>
                        <div class="col-lg-4 mb-4">
                            <?php
                            if ($post->post_type == "evento")
                                get_template_part("template-parts/evento/card");
                            else
                                get_template_part("template-parts/single/card-vertical-thumb", $post->post_type);
                            ?>
                        </div><!-- /col-lg-4 -->
                        <?php
                    }
                }
            ?>
        </div><!-- /row -->

    </div><!-- /container -->
        <?php
        $landing_url = dsi_get_template_page_url("page-templates/notizie.php");
        if($landing_url) {
            ?>
            <div class="text-center mt-4">
                <a class="text-underline" href="<?php echo $landing_url; ?>"><strong><?php _e("Scopri di più", "design_scuole_italia"); ?></strong></a>
            </div>
            <?php
        }
        ?>
</section><!-- /section --><?php
}