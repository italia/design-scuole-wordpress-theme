<?php
global $documento;
?>
<div class="card card-bg card-icon rounded">
		<div class="card-body">
			<svg class="icon it-pdf-document"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-news"></use></svg>
			<div class="card-icon-content">
				<p><strong><a href="<?php echo get_permalink($documento->ID); ?>"><?php echo $documento->post_title; ?></a></strong></p>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
</div><!-- /card card-bg card-icon rounded -->