<?php
global $badgeclass;
if(!isset($badgeclass))
	$badgeclass = "badge-outline-purplelight";
$argomenti = dsi_get_argomenti_of_post();
if(is_array($argomenti) && count($argomenti)) {
	?>
	<aside class="badges-wrapper badges-main mt-4">
	<h2 class="h4"><?php _e("Argomenti", "design_scuole_italia"); ?></h2>
	<div class="badges">
		<?php foreach ( $argomenti as $item ) { ?>
			<a href="<?php echo get_term_link($item); ?>" class="badge badge-sm badge-pill <?php echo $badgeclass; ?>" data-element="topic-list"><?php echo $item->name; ?></a>
		<?php } ?>
	</div><!-- /badges -->
	</aside><!-- /badges-wrapper -->
	<?php
}