<?php

$visualizza_banner = dsi_get_option("visualizza_banner", "homepage");
if($visualizza_banner == "si") {
    $banner_group = dsi_get_option("banner_group", "homepage");
    $class = "single-banner";
    if(count($banner_group) > 1)
        $class = "owl-carousel carousel-theme carousel-simple";
    ?>
    <section class="section bg-gray-light py-3">
        <div class="container py-2">
            <div class="row variable-gutters">
                <div class="col">
                    <p class="text-center"><?php _e("Pubblicità e Informazione", "design_scuole_italia"); ?></p>
                    <div class="<?php echo $class; ?>">
                        <?php
                        foreach ($banner_group as $banner){
                            $image_url = wp_get_attachment_image_url($banner["banner_id"], 'banner' );
                            ?>
                            <div class="banner">
                                <?php if($banner["url"] != "") echo '<a href="'.$banner["url"].'">'; ?>
                                    <figure class="text-center px-2">
                                        <img src="<?php echo $image_url; ?>" style="max-width: 100%;" alt="banner" />
                                    </figure>
                                <?php if($banner["url"] != "") echo '</a>'; ?>
                            </div><!-- /item -->
                            <?php
                        }
                        ?>
                    </div><!-- /carousel-large -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->
    <?php
}
