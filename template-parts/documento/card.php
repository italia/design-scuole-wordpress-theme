<?php
global $documento;
?>
<div class="card card-icon row">
		<div class="card-body col-2">
			<svg class="icon it-pdf-document" role="img" aria-label="pdf"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-news"></use></svg>
		</div>
		<div class="card-icon-content col-10 pl-2">
			<p><strong><a href="<?php echo get_permalink($documento->ID); ?>" aria-label="Apre documento <?php echo $documento->post_title; ?>"><?php echo $documento->post_title; ?></a></strong></p>

		</div><!-- /card-icon-content -->
		
</div><!-- /card card-bg card-icon rounded -->