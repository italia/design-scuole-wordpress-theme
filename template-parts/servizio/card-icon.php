<?php
global $servizio;

$image_id = get_post_thumbnail_id($servizio);
if (has_post_thumbnail($servizio))
    $image_url = get_the_post_thumbnail_url($servizio, "thumbnail");


if ($servizio->post_status == "publish") {
?>
    <div class="card card-wrapper card-bg card-icon rounded">
        <a href="<?php echo get_permalink($servizio); ?>">
            <div class="card-body">
                <div class="card-icon-content flex-grow-1" id="card-desc-<?php echo $servizio->ID; ?>">
                    <p><strong><?php echo $servizio->post_title; ?></strong></p>
                    <small><?php echo dsi_get_meta("sottotitolo", '_dsi_servizio_', $servizio->ID); ?></small>
                </div><!-- /card-icon-content -->
                <?php
                if (isset($image_url)) {
                ?>
                    <div class="avatar size-xl flex-shrink-0 ml-3">
                        <?php dsi_get_img_from_id_url( $image_id, $image_url );  ?>
                    </div>
                <?php
                }
                ?>
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg rounded -->
<?php
}
