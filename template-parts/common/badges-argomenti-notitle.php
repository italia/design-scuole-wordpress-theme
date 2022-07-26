<?php
global $post;
global $badgeclass;
if(!isset($badgeclass))
	$badgeclass = "badge-outline-purplelight";

$argomenti = dsi_get_argomenti_of_post();
if(is_array($argomenti) && count($argomenti)) {
	?>
		<div class="badges mb-2">
			<?php foreach ( $argomenti as $item ) { ?>
				<a href="<?php echo get_term_link($item); ?>" class="badge badge-sm badge-pill <?php echo $badgeclass; ?>"><?php echo $item->name; ?></a>
			<?php } ?>
		</div><!-- /badges -->
	<?php
}