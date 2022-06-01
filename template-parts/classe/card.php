<?php
global $classe;

?>

<div class="card card-bg card-icon rounded">
	<a href="<?php echo get_term_link($classe); ?>" aria-label="Vai alla scheda <?php echo $classe_name; ?>">
		<div class="card-body">
			<svg class="icon svg-marker-simple"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-service"></use></svg>
			<div class="card-icon-content">
				<p><strong><?php echo $classe->name; ?></strong></p>
			</div><!-- /card-icon-content -->
		</div><!-- /card-body -->
	</a>
</div><!-- /card card-bg card-icon rounded -->
<?php
