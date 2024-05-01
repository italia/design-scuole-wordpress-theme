<?php
global $servizio;
if($servizio->post_status == "publish") {
    ?>
    <div class="card card-bg card-noicon rounded">
        <a href="<?php echo get_permalink($servizio); ?>" aria-label="<?php echo $servizio->post_title; ?>">
            <div class="card-body">
                <div class="card-icon-content" id="card-desc-<?php echo $servizio->ID; ?>"  style="text-align: center">
					 <?php
                                    $image_id= get_post_thumbnail_id($servizio);
                                    if(has_post_thumbnail($servizio))
                                        $image_url = get_the_post_thumbnail_url($servizio, "item-thumb");
                                    else
                                        $image_url = get_template_directory_uri() ."/assets/placeholders/logo-service.png";
                                    dsi_get_img_from_id_url( $image_id, $image_url );
                                ?>
                    <p><strong><?php echo $servizio->post_title; ?></strong></p>
                    <!-- <small><?php // echo dsi_get_meta("sottotitolo", '_dsi_servizio_', $servizio->ID); ?></small> -->
                </div><!-- /card-icon-content -->
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg rounded -->
    <?php
}