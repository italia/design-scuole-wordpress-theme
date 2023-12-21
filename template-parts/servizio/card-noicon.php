<?php
global $servizio;
if($servizio->post_status == "publish") {
    ?>
    <div class="card card-wrapper card-bg card-noicon rounded">
        <a href="<?php echo get_permalink($servizio); ?>">
            <div class="card-body">
                <div class="card-icon-content" id="card-desc-<?php echo $servizio->ID; ?>">
                    <p><strong><?php echo $servizio->post_title; ?></strong></p>
                    <small><?php echo dsi_get_meta("sottotitolo", '_dsi_servizio_', $servizio->ID); ?></small>
                </div><!-- /card-icon-content -->
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg rounded -->
    <?php
}