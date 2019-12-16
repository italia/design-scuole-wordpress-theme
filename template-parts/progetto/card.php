<?php
global $progetto;

?>

	<div class="card card-bg card-icon rounded">
		<a href="<?php echo get_permalink($progetto); ?>" aria-describedby="card-desc-<?php echo $progetto->ID; ?>">
			<div class="card-body">
				<svg class="icon svg-marker-simple"  aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-project"></use></svg>
				<div class="card-icon-content" id="card-desc-<?php echo $progetto->ID; ?>">
					<p><strong><?php echo $progetto->post_title; ?></strong></p>
					<small><?php  echo dsi_get_meta("descrizione" , '_dsi_scheda_progetto_', $progetto->ID); ?></small>
				</div><!-- /card-icon-content -->
			</div><!-- /card-body -->
		</a>
	</div><!-- /card card-bg card-icon rounded -->
<?php
