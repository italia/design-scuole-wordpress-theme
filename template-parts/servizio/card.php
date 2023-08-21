<?php
global $servizio;
if($servizio->post_status == "publish") {
    ?>
    <div class="card card-bg card-icon rounded">
        <a href="<?php echo get_permalink($servizio); ?>">
            <div class="card-body">
                <svg class="icon svg-marker-simple" aria-hidden="true">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-service"></use>
                </svg>
                <div class="card-icon-content"  id="card-desc-<?php echo $servizio->ID; ?>">
                    <p><strong><?php echo $servizio->post_title; ?></strong></p>
                    <small><?php echo dsi_get_meta("descrizione", '_dsi_servizio_', $servizio->ID); ?></small>
                </div><!-- /card-icon-content -->
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg card-icon rounded -->
    <?php
}
