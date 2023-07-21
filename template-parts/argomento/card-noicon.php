<?php
global $argomento;
    ?>
    <div class="card card-bg card-noicon rounded">
        <a href="<?php echo get_term_link($argomento); ?>">
            <div class="card-body">
                <div class="card-icon-content" id="card-desc-argomento-<?php echo $argomento->term_id; ?>">
                    <p><strong><?php echo $argomento->name; ?></strong></p>
                    <small><?php echo $argomento->description; ?></small>
                </div><!-- /card-icon-content -->
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg rounded -->
    <?php