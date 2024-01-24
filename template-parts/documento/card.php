<?php
global $documento, $set_card_wrapper;
?>
<div class="card card-bg card-icon rounded <?php echo $set_card_wrapper ? "card-wrapper" : ""; ?>">
		<div class="card-body">
			<svg class="icon it-pdf-document" role="img" aria-label="pdf"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-news"></use></svg>
			<div class="card-icon-content">
				<p><strong><a href="<?php echo get_permalink($documento->ID); ?>"><?php echo $documento->post_title; ?></a></strong></p>
                <small><?php  echo dsi_get_meta("descrizione" , '_dsi_documento_', $documento->ID); ?></small>

            </div><!-- /card-icon-content -->
		</div><!-- /card-body -->
</div><!-- /card card-bg card-icon rounded -->