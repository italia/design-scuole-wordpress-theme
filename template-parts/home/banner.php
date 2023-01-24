<?php

$visualizza_banner = dsi_get_option("visualizza_banner", "homepage");
if($visualizza_banner == "si") {
    $banner_group = dsi_get_option("banner_group", "homepage");
    $class = "single-banner";
    ?>
    <section class="section bg-gray-light py-3">
        <div class="container py-2">
            <div class="row variable-gutters">
                <div class="col">
                    <p class="text-center"><?php _e("Pubblicità e Informazione", "design_scuole_italia"); ?></p>
                    <div class="it-carousel-wrapper carousel-notice it-carousel-landscape-abstract-three-cols splide">
                        <div class="splide__track ps-lg-3 pe-lg-3">
                            <ul class="splide__list it-carousel-all">
                                <?php
                                foreach ($banner_group as $banner){
                                    $image_url = wp_get_attachment_image_url($banner["banner_id"], 'banner' );
                                    $image_alt = get_post_meta( $banner["banner_id"], '_wp_attachment_image_alt', true);
                                    ?>
                                    <li class="splide__slide">
                                        <div class="banner">
                                            <?php if($banner["url"] != "") echo '<a href="'.$banner["url"].'">'; ?>
                                                <figure class="text-center px-2">
                                                    <img 
                                                    src="<?php echo $image_url; ?>" 
                                                    style="max-width: 100%;" 
                                                    alt="<?php echo $image_alt; ?>" />
                                                </figure>
                                            <?php if($banner["url"] != "") echo '</a>'; ?>
                                        </div><!-- /item -->
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div><!-- /carousel-large -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section><!-- /section -->
    <?php
}
