<?php
global $badgeclass;
if(!isset($badgeclass))
	$badgeclass = "badge-outline-purplelight";
$argomenti = dsi_get_argomenti_of_post();
if(count($argomenti)) {
	?>
	<aside class="badges-wrapper badges-main mt-4">
	<div class="badges">
		<?php foreach ( $argomenti as $item ) { ?>
			<a href="<?php echo get_term_link($item); ?>" title="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>" aria-label="<?php _e("Vai all'argomento", "design_scuole_italia"); ?>: <?php echo $item->name; ?>"
			   class="badge badge-sm badge-pill <?php echo $badgeclass; ?>" data-element="topic-list"><?php echo $item->name; ?></a>
		<?php } ?>
	</div><!-- /badges -->
	</aside><!-- /badges-wrapper -->
	<?php
}