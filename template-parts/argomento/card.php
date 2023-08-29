<?php
global $argomento;
    ?>
    <div class="card card-bg card-icon rounded h-100">
        <a href="<?php echo get_term_link($argomento); ?>">
            <div class="card-body">
                <svg class="icon svg-marker-simple" aria-hidden="true">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bookmark-solid"></use>
                </svg>
                <div class="card-icon-content"  id="card-desc-<?php echo $argomento->term_id; ?>">
                    <p><strong><?php echo $argomento->name; ?></strong></p>
                    <small><?php echo $argomento->description; ?></small>
                </div><!-- /card-icon-content -->
            </div><!-- /card-body -->
        </a>
    </div><!-- /card card-bg card-icon rounded -->