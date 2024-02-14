<?php
global $argomento, $show_descrizione;
    ?>
    <div class="card card-bg card-wrapper card-noicon rounded">
        <a href="<?php echo get_term_link($argomento); ?>">
            <div class="card-body">
                <div class="card-icon-content" id="card-desc-argomento-<?php echo $argomento->term_id; ?>">
                    <p><strong><?php echo $argomento->name; ?></strong></p>
                    <?php if($show_descrizione == "true") { ?><small><?php echo $argomento->description; ?></small> <?php } ?>
                </div><!-- /card-icon-content -->
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg rounded -->
    <?php