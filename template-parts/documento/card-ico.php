<?php
global $documento;
$excerpt =  dsi_get_meta("descrizione", "", $documento->ID);

?>

<div class="card card-bg card-icon h-100 rounded">
    <a href="<?php echo get_permalink($documento); ?>">
        <div class="card-body">
            <svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-news"></use></svg>
            <div class="card-icon-content">
                <p><strong><?php echo $documento->post_title; ?></strong></p>
                <small><?php echo $excerpt; ?></small>
            </div><!-- /card-icon-content -->
        </div><!-- /card-body -->
    </a>
</div>